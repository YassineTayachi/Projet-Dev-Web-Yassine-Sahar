<?php
include_once "controller.php";
if(!isset($_SESSION['loggedin'])){
  header("Location: Login.php"); 
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="./css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    

</head>
<body>
    
    <input type="checkbox" id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="brand">
                
                <span>VNT</span>
            </h3> 
            <label for="sidebar-toggle" class="ti-menu-alt"></label>
        </div>
        
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="index.php">
                        <span class="ti-home"></span>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="account.php">
                        <span class="ti-settings"></span>
                        <span>Account</span>
                    </a>
                </li>
                <li>
                    <a href="company.php">
                        <span class="ti-face-smile"></span>
                        <span>Company</span>
                    </a>

                </li>
                <li>
                    <a href="History.php">
                        <span class="ti-agenda"></span>
                        <span>Calls</span>
                    </a>
                </li>
                <li>
                    <a href="Historytrans.php">
                        <span class="ti-archive"></span>
                        <span>Transactions</span>
                    </a>
                </li>
               
               
                
                <li>
                    <a href="contact.php">
                        <span class="ti-book"></span>
                        <span>Contacts</span>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
    
    
    <div class="main-content">
        
           <header>
            <div class="search-wrapper">
                <span class="ti-search"></span>
                <input type="search" placeholder="Search">
            </div>
            
            <div class="social-icons">
                <span class="ti-bell"></span>
                <span class="ti-comment"></span>	&nbsp;	&nbsp;
                
                <button class="" type="button" style="text-decoration: none; border-radius: 4px; 
  background-color: #6665ee;
  border: none; padding: 6px 18px; 
  " ><a style="text-decoration: none; color: white;" href="logout-user.php">Logout</a></button>
                
            </div>
        </header>   
         
        <main>
            <center>
            <h2 class="dash-title">Welcome <strong><?php echo $name ; ?></strong> !</h2>
            
            </center>
            
            
            <section class="recent">
                <div class="activity-grid">
                
                    </div>
                    
                    <div class="summary">
                        <div class="summary-card">
                            <div class="summary-single">
                               
                                <div>
                                    <h3> My Balance : 
                                     </h3>
                                </div>
                               
                            </div>
                            <div class="summary-single">
                                
                                <div class="balance">
                                   
                                <?php 
                               $b=$balance['balance'];
                               if ($b!== NULL){
                                echo $balance['balance'].".00€";
                               }else{
                                echo "0.00€";
                               }
                                
                                
                                
                                ?>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="bday-card">
                            <div class="bday-flex">
                           
                              
                                <div class="bday-info">
                                    <h4>This is your PIN code to dial when you call :  <?php echo $PinCode['PIN_Code'];?> </h4>
                                    
                                </div>
 
                            </div>
                            
                            <div class="text-center">
                               
                            </div>
                        </div>
                        <br> 
                        <div class="bday-card">
                            <div class="bday-flex">
                               
                                <div class="bday-info">
                                    <h3> Buy credit amount (5€-500€)  </h3>
                                
                                </div>
                            </div>
                            <div >

<form action="charge.php" method="POST">
    <input name="amount" type="number" class='form-control' id="custom-amount" 
    placeholder="€5.00 - €500.00" min="5"  max="500" step="1.00" required>
    <br>
    
      <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="pk_test_51Ixb0lJ3LBtPODXZo8MknGPp1VCuMov7YHpJbNqOUgtEc6aLnECFWDqxPUH8GJeg0n6u4zcICzfKsZFvrvML66ZH00R3eEsnPa"
        data-amount=""
        data-name="VNT"
        data-description="Welcome to VNT payment"
        data-locale="auto"
        data-zip-code="true"
        data-billing-address="true"
        data-label=" Pay Now"
        data-currency="eur">
      </script>
     
</form>

  <script type="text/javascript">
    $(function() {
        $('.donate-button').click(function(event) {
            var amount = $('#custom-amount').val();        
            $('.stripe-button').attr('data-amount', amount)
        });
    });
</script>
                            
                                </div>
                            <div >
                            
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            
        </main>
        
    </div>
   

</body>
</html>