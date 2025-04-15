<?php
// Start output buffering
ob_start();

// Get POST variables from AT gateway
$sessionid = $_POST["sessionid"] ?? '';
$servicecode = $_POST["servicecode"] ?? '';
$phonenumber = $_POST["phonenumber"] ?? '';
$text = $_POST["text"] ?? '';

// Initialize response
$response = "";

// Handle USSD logic
if ($text == "") {
    // Show the main menu
    $response = "CON Welcome to MamaCare Services\n";
    $response .= "1. Pregnancy Tips\n";
    $response .= "2. Schedule Appointment\n";
    $response .= "3. Emergency Contacts\n";
    $response .= "4. Health Reminders";
} 
// Handle Pregnancy Tips
elseif ($text == "1") {
    $response = "CON Choose pregnancy tip category:\n";
    $response .= "1. First Trimester\n";
    $response .= "2. Second Trimester\n";
    $response .= "3. Third Trimester\n";
    $response .= "4. General Tips";
} 
elseif ($text == "1*1") {
    $response = "END First Trimester Tips:\n";
    $response .= "1. Take prenatal vitamins\n";
    $response .= "2. Stay hydrated\n";
    $response .= "3. Get plenty of rest\n";
    $response .= "4. Avoid harmful substances";
} 
elseif ($text == "1*2") {
    $response = "END Second Trimester Tips:\n";
    $response .= "1. Stay active with light exercise\n";
    $response .= "2. Eat balanced meals\n";
    $response .= "3. Monitor baby movements\n";
    $response .= "4. Regular checkups";
}
elseif ($text == "1*3") {
    $response = "END Third Trimester Tips:\n";
    $response .= "1. Prepare hospital bag\n";
    $response .= "2. Learn about labor signs\n";
    $response .= "3. Get adequate sleep\n";
    $response .= "4. Regular monitoring";
}
elseif ($text == "1*4") {
    $response = "END General Pregnancy Tips:\n";
    $response .= "1. Eat healthy foods\n";
    $response .= "2. Regular exercise\n";
    $response .= "3. Adequate rest\n";
    $response .= "4. Regular checkups";
}
// Handle Appointment Scheduling
elseif ($text == "2") {
    $response = "CON Schedule an appointment:\n";
    $response .= "1. Regular Checkup\n";
    $response .= "2. Ultrasound\n";
    $response .= "3. Vaccination\n";
    $response .= "4. Consultation";
}
elseif (strpos($text, "2*") === 0) {
    // Store appointment request (in real implementation, this would connect to a database)
    $response = "END Your appointment request has been received.\n";
    $response .= "Our healthcare team will contact you\n";
    $response .= "on " . $phonenumber . " to confirm.";
}
// Handle Emergency Contacts
elseif ($text == "3") {
    $response = "END Emergency Contacts:\n";
    $response .= "Ambulance: 911\n";
    $response .= "MamaCare Helpline: 0800-MAMA-CARE\n";
    $response .= "Nearest Hospital: City Hospital (0722-XXX-XXX)\n";
    $response .= "24/7 Nurse Support: 0733-XXX-XXX";
}
// Handle Health Reminders
elseif ($text == "4") {
    $response = "CON Health Reminders:\n";
    $response .= "1. Set Medicine Reminder\n";
    $response .= "2. Set Appointment Reminder\n";
    $response .= "3. Set Exercise Reminder\n";
    $response .= "4. View My Reminders";
}
elseif (strpos($text, "4*") === 0) {
    // Store reminder (in real implementation, this would connect to a database)
    $response = "END Your reminder has been set.\n";
    $response .= "You will receive SMS notifications\n";
    $response .= "on " . $phonenumber;
}
else {
    $response = "END Invalid input. Please try again.";
}

// Set content type header
header('Content-type: text/plain');
echo $response;

// End output buffering
ob_end_flush();
?>
