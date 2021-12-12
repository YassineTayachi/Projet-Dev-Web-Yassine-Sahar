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
    <title>Contact</title>
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
                <span class="ti-comment"></span>
                &nbsp;	&nbsp;
                
                <button class="" type="button" style="text-decoration: none; border-radius: 4px; 
  background-color: #6665ee;
  border: none; padding: 6px 18px;
  " ><a style="text-decoration: none; color: white;" href="logout-user.php">Logout</a></button>
               
            </div>
        </header>
        
        <main>
            
            <h2 class="dash-title">Contact Us </h2>
            
            
            
        </main>
        
    </div>
    
</body> 
</html>