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
    <title>Company</title>
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
          
            
            
            <section class="recent">
                <div class="activity-grid">
                    <div class="activity-card">
                        <h3>Add Phone Number</h3>

                      
                        <form class="row g-3" form action="company.php" method="POST" >
 
                           <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
                          </div> </br>
 
                            <div class="form-group">
                              <input type="text" name="NumTel" class="form-control" id="NumTel" placeholder="Phone Number" required>
                            </div>
                           <div class="form-group">
                            <button type="submit" name="add" class="btn btn-primary mb-3">Add </button> 



                             <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                    }elseif(count($info) != 0){
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        
                            <?php
                            foreach($info as $showerror){
                                echo $showerror;
                            }
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                       
                        <?php
                    }
                    ?>
 </div>
</form>



                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name </th>
                                        <th> Num°</th>
                                        <th>Action</th>
                                        <th> </th>
                                        
                                    </tr>
                                </thead>

                       
                                <tbody>
                                <?php
            include_once "add_number.php" ;
			if ($result->num_rows > 0 ) {
				//output data of each row
				while ($row = $result->fetch_assoc()) {
		?>
                                    <tr>
                                    <td><?php echo $row['name']; ?></td>
				                          	<td><?php echo $row['NumTel']; ?></td>
				                           	<td>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                                        
                                    </tr>
                                    <?php		}
			}
		?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                  
                        </div>
                    </div>
                </div>
            </section>
            
        </main>
        
    </div>
    
</body>
</html>