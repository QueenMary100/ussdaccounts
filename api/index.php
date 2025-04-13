<?php 
// Start output buffering to prevent header issues
ob_start();

// Safely read variables sent via POST from AT gateway with null coalescing operator
$sessionid = $_POST["sessionid"] ?? '';
$service = $_POST["servicecode"] ?? '';
$phonenumber = $_POST["phonenumber"] ?? '';
$text = $_POST["text"] ?? '';

// Initialize response variable
$response = "";

// Determine user input and build appropriate response
if ($text == "") {
    $response = "CON What would you want to check?\n";
    $response .= "1. My account No\n";
    $response .= "2. My phone Number\n";
} elseif ($text == "1") {
    $response = "CON Choose account information you want to view\n";
    $response .= "1. Account No\n";
    $response .= "2. Account Balance\n";   
} elseif ($text == "2") {
    $response = "END Your phone number is \n".$phonenumber;
} elseif ($text == "1*1") {
    $accountnumber = "AC100N";
    $response = "END Your account number is \n".$accountnumber;
} elseif ($text == "1*2") {  // Fixed typo here (removed extra single quote)
    $balance = "KSH 10000";
    $response = "END Your account balance is \n".$balance;
} else {
    // Handle unexpected input
    $response = "END Invalid input. Please try again.";
}

// Set proper content type header
header('Content-type: text/plain');  // Fixed space in header
echo $response;

// Flush output buffer
ob_end_flush();
?>