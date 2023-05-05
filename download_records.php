<?php
ob_start();
session_start();
if (!isset($_SESSION['acc_id'])) {
        echo '<script>alert("You must be logged in order to access this part of the page.");</script>';
        print '<script>window.location.assign("login.php");</script>';
}
if(!($_SESSION['acc_privilege'] == 'Admin')){
    print '<script>alert("Sorry. You are not authorized to access this page.");</script>';
    print '<script>window.location.assign("index.php");</script>';
}
    
require_once __DIR__ . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Connect to the database
$dsn = 'mysql:host=localhost;dbname=brgy';
$username = 'root';
$password = '';
$pdo = new PDO($dsn, $username, $password);

// Query the database
$query = 'SELECT * FROM documents';
$stmt = $pdo->query($query);

// Create a new spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Write the data to the spreadsheet
$row = 1;
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC); // Get all rows
if (count($rows) > 0) {
    $col_names = array_keys($rows[0]); // Get column names from the first row
    $sheet->fromArray($col_names, NULL, 'A1'); // Write column names to the first row
    $row++;
    foreach ($rows as $row_data) {
        $col = 1;
        foreach ($row_data as $cell_data) {
            $sheet->setCellValueByColumnAndRow($col, $row, $cell_data);
            $col++;
        }
        $row++;
    }
}

// Save the spreadsheet to a file with current date and time
$datetime = date('Ymd_His');
$filename = "BRGY837_DOCUMENTS_{$datetime}.xlsx";
$writer = new Xlsx($spreadsheet);
$writer->save(__DIR__ . '/files/' . $filename);

// Force the browser to download the file
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Length: ' . filesize(__DIR__ . '/files/' . $filename));
ob_clean();
flush();
readfile(__DIR__ . '/files/' . $filename);
exit;


?>
