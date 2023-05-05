<?php
require_once 'vendor/autoload.php';
function createID($control_number, $app_date, $fname, $lname, $address, $birthdate, $birthplace, $weight, $height, $status, $tin, $sss, $ec_name, $ec_address, $ec_contact, $filename) {

    // Load the template file
    $template = new \PhpOffice\PhpWord\TemplateProcessor('files/template_id.docx');
    
    // Set the values of the placeholders in the template with the form data
    $template->setValue('CONTROL_NUMBER', $control_number);
    $template->setValue('APP_DATE', $app_date);
    $template->setValue('FIRST_NAME', $fname);
    $template->setValue('LAST_NAME', $lname);
    $template->setValue('ADDRESS', $address);
    $template->setValue('BIRTHDATE', $birthdate);
    $template->setValue('BIRTHPLACE', $birthplace);
    $template->setValue('WEIGHT', $weight);
    $template->setValue('HEIGHT', $height);
    $template->setValue('STATUS', $status);
    $template->setValue('TIN', $tin);
    $template->setValue('SSS', $sss);
    $template->setValue('EC_NAME', $ec_name);
    $template->setValue('EC_ADDRESS', $ec_address);
    $template->setValue('EC_CONTACT', $ec_contact);
    
    // Generate a unique filename for the updated template
    $filename = uniqid() . '.docx';
    
    // Save the updated template as a .docx file
    $template->saveAs('docx/' . $filename);
    
    return $filename;
}

function createClearance($control_number, $app_date, $fname, $lname, $address, $purpose, $filename) {
     // Load the template file
     $template = new \PhpOffice\PhpWord\TemplateProcessor('files/template_clearance.docx');
    
     // Set the values of the placeholders in the template with the form data
     $template->setValue('CONTROL_NUMBER', $control_number);
     $template->setValue('APP_DATE', $app_date);
     $template->setValue('FIRST_NAME', $fname);
     $template->setValue('LAST_NAME', $lname);
     $template->setValue('ADDRESS', $address);
     $template->setValue('PURPOSE', $purpose);
     
     // Generate a unique filename for the updated template
     $filename = uniqid() . '.docx';
     
     // Save the updated template as a .docx file
     $template->saveAs('docx/' . $filename);
     
     return $filename;
}

function createIndigency($control_number, $app_date, $fname, $lname, $address, $purpose, $filename) {
    // Load the template file
    $template = new \PhpOffice\PhpWord\TemplateProcessor('files/template_indigency.docx');
   
    // Set the values of the placeholders in the template with the form data
    $template->setValue('CONTROL_NUMBER', $control_number);
    $template->setValue('APP_DATE', $app_date);
    $template->setValue('FIRST_NAME', $fname);
    $template->setValue('LAST_NAME', $lname);
    $template->setValue('ADDRESS', $address);
    $template->setValue('PURPOSE', $purpose);
    
    // Generate a unique filename for the updated template
    $filename = uniqid() . '.docx';
    
    // Save the updated template as a .docx file
    $template->saveAs('docx/' . $filename);
    
    return $filename;
}

function createCertificate($control_number, $app_date, $fname, $lname, $address, $purpose, $filename) {
    // Load the template file
    $template = new \PhpOffice\PhpWord\TemplateProcessor('files/template_certificate.docx');
   
    // Set the values of the placeholders in the template with the form data
    $template->setValue('CONTROL_NUMBER', $control_number);
    $template->setValue('APP_DATE', $app_date);
    $template->setValue('FIRST_NAME', $fname);
    $template->setValue('LAST_NAME', $lname);
    $template->setValue('ADDRESS', $address);
    $template->setValue('PURPOSE', $purpose);
    
    // Generate a unique filename for the updated template
    $filename = uniqid() . '.docx';
    
    // Save the updated template as a .docx file
    $template->saveAs('docx/' . $filename);
    
    return $filename;
}

?>


