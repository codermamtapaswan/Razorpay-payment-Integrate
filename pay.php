<?php
include("database.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $subscriptionData = "SELECT * FROM `subscription_plan` WHERE id = '$id'";
    $res = $con->query($subscriptionData);
    $row = mysqli_fetch_assoc($res);
    // print_r($row);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multistep form</title>
  <link rel="stylesheet" href="assets/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head> 
    <body>
        <div class="container">
            <header>Subscription Form</header>
            <div class="progress-bar">
                <div class="step">
                    <p>Choose Plan</p>
                    <div class="bullet">
                        <span>1</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>Add Details</p>
                    <div class="bullet">
                        <span>2</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>Payment</p>
                    <div class="bullet">
                        <span>3</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
            </div>
            <div class="form-outer">
                <form>
                    <div class="page slide-page">
                        <div class="title">Your Plan:</div>
                        <button class="firstNext">
                            <?php echo $row['amount'];?>
                        </button>
                        <input type="hidden" id="amount" value="<?php echo $row['amount'];?>">              
                        <div class="field">
                            <button class="firstNext next">Next</button>
                        </div>
                    </div>
                    <div class="page">
                        <div class="title">Personal Details:</div>
                        <div class="field">
                            <div class="label">First Name</div>
                            <input type="text" required id="firstName"/>
                        </div>
                        <div class="field">
                            <div class="label">Last Name</div>
                            <input type="text" required id="lastName"/>
                        </div>
                        <div class="field">
                            <div class="label">Pan Car No.</div>
                            <input type="text" required id="panNumber"/>
                        </div>
                        <div class="field btns">
                            <button class="prev-1 prev">Previous</button>
                            <button class="next-1 next">Next</button>
                        </div>
                    </div>
                    <div class="page">
                        <div class="title">Contact Details:</div>
                        <div class="field">
                            <div class="label">Email</div>
                            <input type="text" required id="email"/>
                        </div>
                        <div class="field">
                            <div class="label">Phone No.</div>
                            <input type="number" required id="phoneNumber"/>
                        </div>
                        <div class="field btns">
                            <button class="prev-2 prev">Previous</button>
                            <button class="next-2 next">Next</button>
                        </div>
                    </div>
                    <div class="page">
                        <div class="title">Payment Method:</div>
                        <select id="payment-method"  class="field">
                            <option value="netbanking">Net Banking</option>
                            <option value="card">Card</option>
                            <option value="wallet">Wallet</option>
                            <option value="upi">UPI</option>
                        </select>
                        <div class="field btns">
                            <button class="prev-2 prev">Previous</button>
                            <button class="submit" type="button" onclick="payment_Now()">PayNow</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="assets/script.js"></script>
        <script>
          function payment_Now(){
            var fname = $("#firstName").val();
            var lname = $("#lastName").val();
            var panNumber = $("#panNumber").val();
            var email = $("#email").val();
            var phone = $("#phoneNumber").val();
            var amount = $("#amount").val();
            var payMethod = $("#payment-method").val();
            $.ajax({
              url:"payment_process.php",
              type:"POST",
              data:{
                fname:fname,
                lname:lname,
                email:email,
                phone:phone,
                panNumber:panNumber,
                amount:amount,
              },
              success:function(data){
                console.log(data);
                  var options = {
                    "key": "rzp_test_IN2KHmaIK9TZ3p", // Enter the Key ID generated from the Dashboard
                    "amount":amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                    "currency": "INR",
                    "name": "Acme Corp", //your business name
                    "description": "Test Transaction",
                    "image": "https://example.com/your_logo",
                    config: {
                            display: {
                            blocks: {
                                banks: {
                                name: 'Pay via Card',
                                instruments: [
                                    {
                                    method: payMethod
                                    }
                                ],
                                },
                            },
                            sequence: ['block.banks'],
                            preferences: {
                                show_default_blocks: false,
                            },
                            },
                        },
                    "handler": function (response){
                      $.ajax({
                        url:"payment_process.php",
                        type:"POST",
                        data:{
                          payment_id:response.razorpay_payment_id,
                        },
                        success:function(data){
                          console.log(data);
                          window.location.href = "thank.php";
                        } 
                      });
                    }
                }
                var rzp1 = new Razorpay(options);
                rzp1.open();
              }
            });
          } // end of payment_now function
    </script>
    </body>
</html>
