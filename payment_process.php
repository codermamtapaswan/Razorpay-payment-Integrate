<?php
include("database.php");
session_start();


print_r($_POST);
if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['amount']) && isset($_POST['amount'])) {

    $fullName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $amount = $_POST['amount'];
    $panNumber = $_POST['panNumber'];
    $payment_status = "pending";

    $insertdata = "INSERT INTO `payment_details`(`firstname`, `lastname`,`panNumber`, `email`, `phone`, `amount`, `status`) VALUES ('$fullName','$lastName','$panNumber','$email','$phone','$amount','$payment_status')";

    $res = $con->query($insertdata);
    $_SESSION["id"] = mysqli_insert_id($con);
    $_SESSION["amount"] = $amount;
    $_SESSION["panNumber"] = $panNumber;
}

if(isset($_POST['payment_id']) && isset($_SESSION["id"])) {
    $payment_id = $_POST['payment_id'];
    $id = $_SESSION["id"];
    $status = "completed";

    $update = "UPDATE `payment_details` SET `payment_id`='$payment_id',`status`='$status' WHERE id = '$id'";
    $res = $con->query($update);
}

?>