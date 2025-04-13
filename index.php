<?php 
// reads the variables sent via post from AT gateway
$sessionid = $_POST["sessionid"];
$service = $_POST["servicecode"];
$phonenumber= $_POST["phonenumber"];
$text= $_POST["text"];

//condition to dertimine user input
if ($text == ""){
    $response = "CON what would you want to check?\n";
    $response .= "1. My account No\n";
    $response .= "2. My phone Number\n";
} elseif($text == "1"){
    $response = "CON Choose accounnt information you want to view\n";
    $response .= "1. Account No\n";
    $response .= "2. Account Balance\n";   
}elseif ($text == "2"){
    $response = "END Your phone number is \n".$phonenumber;
}elseif ($text=="1*1") {
    $accountnumber = "AC100N";
    $response = "END Your account number is \n".$accountnumber;
}elseif ($text =="1*'2") {
    $balance = "KSH 10000";
    $response = "END Your account balance is \n".$balance;
} 

header('Content-type :text/plain');
echo $response;

?>