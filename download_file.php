<?php
ob_start();
require_once 'services/create_document.php';
require_once 'services/db.php';


// Retrieve the document ID and type from the URL parameters
$doc_id = $_GET['doc_id'];
$doc_type = $_GET['doc_type'];

$random_number = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
$control_number = "837-" . str_pad($doc_id, 4, '0', STR_PAD_LEFT);

switch($doc_type) {

    case 'ID':
    // Retrieve the data for the ID document
    $query = "SELECT * FROM documents WHERE doc_id = $doc_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Extract the data into variables
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $address = $row['address'];
    $birthdate = $row['birthdate'];
    $birthplace = $row['birthplace'];
    $weight = $row['weight'];
    $height = $row['height'];
    $civil_status = $row['civil_status'];
    $tin = $row['tin'];
    $SSSno = $row['SSSno'];
    $ec_name = $row['ec_name'];
    $ec_address = $row['ec_address'];
    $ec_contact = $row['ec_contact'];
    $application_date = $row['application_date']; 
    $date_only = substr($application_date, 0, 10); 
    $formatted_date = date("jS \of F, Y", strtotime($date_only)); 


    $docname = $first_name . '_Barangay-ID837.docx';
    $filename = createID($control_number, $formatted_date, $first_name, $last_name, $address, $birthdate, $birthplace, $weight, $height, $civil_status, $tin, $SSSno, $ec_name, $ec_address, $ec_contact, $docname);

    break;

    case 'Clearance':
     // Retrieve the data for the clearance document
    $query = "SELECT * FROM documents WHERE doc_id = $doc_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    
    // Extract the data into variables
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $address = $row['address'];
    $purpose = $row['purpose'];
    $application_date = $row['application_date']; 
    $date_only = substr($application_date, 0, 10); 
    $formatted_date = date("jS \of F, Y", strtotime($date_only)); 

    
    $docname = $first_name . '_Barangay-Clearance837.docx';
    $filename = createClearance($control_number, $formatted_date, $first_name, $last_name, $address, $purpose, $docname);
    
     break;

     case 'Residency':
     // Retrieve the data for the residency document
    $query = "SELECT * FROM documents WHERE doc_id = $doc_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    
    // Extract the data into variables
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $address = $row['address'];
    $purpose = $row['purpose'];
    $application_date = $row['application_date']; 
    $date_only = substr($application_date, 0, 10); 
    $formatted_date = date("jS \of F, Y", strtotime($date_only)); 

    
    $docname = $first_name . '_Barangay-Residency837.docx';
    $filename = createResidency($control_number, $formatted_date, $first_name, $last_name, $address, $purpose, $docname);
    
    break;

    case 'Certificate':
     // Retrieve the data for the certificate document
    $query = "SELECT * FROM documents WHERE doc_id = $doc_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    
    // Extract the data into variables
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $address = $row['address'];
    $purpose = $row['purpose'];
    $application_date = $row['application_date']; 
    $date_only = substr($application_date, 0, 10); 
    $formatted_date = date("jS \of F, Y", strtotime($date_only)); 

    
    $docname = $first_name . '_Barangay-Certificate837.docx';
    $filename = createCertificate($control_number, $formatted_date, $first_name, $last_name, $address, $purpose, $docname);
    
    break;
    
    default:
     // Error handling code in case an unexpected value is received.
    echo "<script>alert('Error occurred. Please contact the system administrator for further assistance.')</script>";
    break;
}

// File path and name to be downloaded
$file = __DIR__ . '/docx/' . $filename;

// Set the filename and content type
header('Content-Disposition: attachment; filename="' . $docname . '"');
header('Content-Length: ' . filesize($file));
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Type: text/html; charset=utf-8');

// Force download of the file
if (file_exists($file)) {
    ob_clean(); // clear the output buffer
    readfile($file);
    exit;
} else {
    die('File does not exist.');
}


?>
