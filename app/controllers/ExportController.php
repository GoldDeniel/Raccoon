<?php

require_once '../app/models/User.php';
class ExportController extends Controller
{

	public function index()
	{
        $this->view('export');
	}

    public function exportExcel() {

    }

    public function exportPDF() {
        
    }
}
