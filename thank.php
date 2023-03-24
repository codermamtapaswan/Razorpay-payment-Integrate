<?php
include("database.php");
session_start();
$id = $_SESSION["id"];
$panNumber = $_SESSION["panNumber"]; 

// $paymentData1 = "SELECT amount FROM `payment_details` WHERE email ='$email' AND status ='completed'";
// $res = $con->query($paymentData1);
// $row = mysqli_fetch_all($res);

$paymentData = "SELECT * FROM  payment_details INNER JOIN subscription_plan ON payment_details.amount = subscription_plan.amount";
$res = $con->query($paymentData);
$row = mysqli_fetch_all($res);

// echo"<pre>";
// print_r($row);
// echo"<pre>";
?>

<table style="border:1px solid black; width:80%;">

  <tr style="border:1px solid black; text-align:center;">
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Phone No.</th>
    <th>Amount</th>
    <th>Services</th>
    <th>Payment Status</th>
  </tr>
  <?php
  $i = 0;
    foreach ($row as $value) {
      if ($row[$i][3] === $panNumber) {
      ?>
          <tr style="text-align:center;">
            <td><?=$row[$i][1];?></td>
            <td><?=$row[$i][2];?></td>
            <td><?=$row[$i][4];?></td>
            <td><?=$row[$i][5];?></td>
            <td><?=$row[$i][6];?></td>
            <td><?=$row[$i][10];?></td>
            <td><?=$row[$i][8];?></td>
          </tr>
      <?php
      }
      $i++;
    }
  ?>
</table>