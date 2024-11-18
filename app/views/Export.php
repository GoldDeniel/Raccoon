<!DOCTYPE html>
<html>
<head>
    <title>Export</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/export.css">
</head>
<body>
    <?php include_once '../app/views/elements/header.php'; ?>
    <div class="export-container">
        <h1 class="export-title">Export user data</h1>
        <div class="button-container">
            <form method="post" action="<?php echo ROOT; ?>/export/exportExcel" style="display: inline;">
                <button type="submit" class="export-button">Excel</button>
            </form>
            <form method="post" action="<?php echo ROOT; ?>/export/exportPDF" style="display: inline;">
                <button type="submit" class="export-button">PDF</button>
            </form>
        </div>
    </div>
    <?php include_once '../app/views/elements/footer.php'; ?>
</body>
</html>