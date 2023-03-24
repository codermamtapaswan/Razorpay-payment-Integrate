<?php
include("database.php");
$subscriptionData = "SELECT * FROM `subscription_plan`";
$res = $con->query($subscriptionData);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Razorpay payment Integration</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1 class="demo-title">
    Choose Plan <br>
  </h1>
  <div class="pricing-table">
    <?php
      
       while($plan = mysqli_fetch_assoc($res)) {
         $plans[] = $plan;
        }
        foreach ($plans as $row)
        { ?>
        <!--  -->
        <div class="ptable-item">
          <div class="ptable-single">
            <div class="ptable-header">
              <div class="ptable-title">
                <h2><?php echo $row['Name'];?></h2>
              </div>
              <div class="ptable-price">
                <h2><small></small><?php echo $row['amount'];?><span>INR</span></h2>
              </div>
            </div>
            <div class="ptable-body">
              <div class="ptable-description">
                <ul>
                  <li>Pure HTML & CSS</li>
                  <li>Responsive Design</li>
                  <li>Well-commented Code</li>
                  <li>Easy to Use</li>
                </ul>
              </div>
            </div>
            <div class="ptable-footer">
              <div class="ptable-action">
                <a href="pay.php?id=<?php echo $row['id'];?>">Buy Now</a>
              </div>
            </div>
          </div>
        </div>
      <!--  -->
    <?php }
    ?>
  </div>
</body>
</html>