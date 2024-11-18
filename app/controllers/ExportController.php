<?php

require_once '../app/models/User.php';
require_once '../app/vendor/tcpdf/tcpdf.php';


class ExportController extends Controller
{

    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

	public function index()
	{
        $this->view('export');
	}

    private function cleanOutput(): void 
    {
        // Clean all levels of output buffering
        while (ob_get_level()) {
            ob_end_clean();
        }
    }


    public function exportPDF() {
        $this->cleanOutput();
    
        try {
            $pdfContent = $this->generatePDF();
    
            // Set headers to force browser rendering
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="users_export.pdf"');
            header('Cache-Control: max-age=0');
    
            // Echo the PDF content
            echo $pdfContent;
            exit;
        } catch (Exception $e) {
            $this->cleanOutput();
            error_log("PDF Download Error: " . $e->getMessage());
            $_SESSION['error'] = "Failed to download PDF. Please try again.";
            header('Location: ' . ROOT . '/export');
            exit;
        }
    }

    public function exportExcel() {
        $this->cleanOutput();
    
        // Excel file name for download
        $fileName = "users_data.xls";
    
        // Column names
        $fields = ['ID', 'FIRST NAME', 'LAST NAME', 'USERNAME', 'ROLE'];
    
        // Display column names as the first row
        $excelData = implode("\t", array_values($fields)) . "\n";
    
        // Get user data from the model
        $users = $this->userModel->getAll();
    
        if (!empty($users)) {
            // Output each row of the data
            foreach ($users as $user) {
                $role = $user->role == 1 ? 'User' : 'Admin';
                $lineData = [
                    $user->id,
                    $user->first_name,
                    $user->last_name,
                    $user->username,
                    $role
                ];
    
                // Filter each data value for tab-separated format
                array_walk($lineData, function (&$str) {
                    $str = preg_replace("/\t/", "\\t", $str);
                    $str = preg_replace("/\r?\n/", "\\n", $str);
                    if (strstr($str, '"')) {
                        $str = '"' . str_replace('"', '""', $str) . '"';
                    }
                });
    
                $excelData .= implode("\t", array_values($lineData)) . "\n";
            }
        } else {
            $excelData .= "No records found...\n";
        }
    
        // Headers for download
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$fileName\"");
    
        // Render the Excel data
        echo $excelData;
        exit;
    }
    
    private function generatePDF() 
    {
        try {
            // Get user data
            $users = $this->userModel->getAll();

            // Create new PDF document
            $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

            // Disable header and footer
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            
            // Set document information
            $pdf->SetCreator('Your Application');
            $pdf->SetTitle('Users Export');

            // Set margins
            $pdf->SetMargins(15, 15, 15);

            // Add a page
            $pdf->AddPage();

            // Add the raccoon GIF (positioned in the top left corner)
            $pdf->Image('assets/raccoon-dance.gif', 10, 10, 30, 30, 'GIF');

            // Set font for title
            $pdf->SetFont('helvetica', 'B', 16);
            $pdf->Cell(0, 15, 'User List Export', 0, 1, 'C');
            
            // Set font for subtitle
            $pdf->SetFont('helvetica', '', 12);
            $pdf->Cell(0, 10, 'Exported User Data', 0, 1, 'C');

            // Add some spacing after the title
            $pdf->Ln(10);

            // Set font for table header
            $pdf->SetFont('helvetica', 'B', 11);

            // Create the table header with improved styling
            $html = '<table border="1" cellpadding="6" cellspacing="0">
                        <tr style="background-color: #4472C4; color: #FFFFFF; text-align: center;">
                            <th><b>ID</b></th>
                            <th><b>First Name</b></th>
                            <th><b>Last Name</b></th>
                            <th><b>Username</b></th>
                            <th><b>Role</b></th>
                        </tr>';

            // Set font for table content
            $pdf->SetFont('helvetica', '', 11);

            // Add data rows with alternating background colors
            $rowIndex = 0;
            foreach ($users as $user) {
                $role = $user->role == 1 ? 'User' : 'Admin';
                $bgcolor = $rowIndex % 2 == 0 ? '#FFFFFF' : '#F2F2F2';
                $html .= '<tr style="background-color: ' . $bgcolor . '">
                            <td>'.htmlspecialchars($user->id).'</td>
                            <td>'.htmlspecialchars($user->first_name).'</td>
                            <td>'.htmlspecialchars($user->last_name).'</td>
                            <td>'.htmlspecialchars($user->username).'</td>
                            <td>'.htmlspecialchars($role).'</td>
                        </tr>';
                $rowIndex++;
            }

            $html .= '</table>';

            // Output the HTML content
            $pdf->writeHTML($html, true, false, true, false, '');

            // Return PDF as string
            return $pdf->Output('', 'S');

        } catch (Exception $e) {
            error_log("PDF Generation Error: " . $e->getMessage());
            $_SESSION['error'] = "Failed to generate PDF. Please try again.";
            header('Location: ' . ROOT . '/export');
            exit;
        }
    }
}
