<?php
require("../pglife/includes/database_connect.php");
$full_name = $_POST['full_name'];
$phone = $_POST['phone'];
$email = $POST['email'];
$password = $_POST['password'];
$password = sha1($password);
$college_name = $_POST['college_name'];
$gender = $_POST['gender'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn,$sql);
if(!$result)
{
    $response = array("success" => false, "message" => " something went wrong! ");
    echo json_encode($response);
    return;
}

$row_count = mysqli_num_rows($result);
if($row_count !=0 )
{
    $response = array("success" => false, "message" => "something wend wrong! ");
    echo json_encode($response);
    return;

}

$sql = "INSERT INTO users (email, password, full_name, phone, gender, college_name) VALUE('$email', '$password', '$full_name', '$phone', '$gender', '$college_name')";
$result = mysqli_query($conn,$sql);
if(!$result)
{
    $response = array("success" => false, "message" => "someting went wrong! ");
    echo json_encode($response);
    return;
}
$response = array("success" => true, "message" => "your account has been created successfully!");
echo json_encode($response);
mysqli_close($conn);
?>