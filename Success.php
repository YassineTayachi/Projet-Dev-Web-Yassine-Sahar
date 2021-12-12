<!DOCTYPE html>
<html lang="en">
<head>
  <title>Operation Success</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 


  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
         
          <center>
          <div class="modal-title">
           <i class='fas fa-check-circle' style='font-size:70px;color:green'></i>
              </div> <br>
         
          <h4 class="modal-title">   Operation Success </h4>



        </div>
        </center>
        <div class="modal-body">
        <center>
          <p><strong>Congratulation ! </strong> Your payment has been confirmed. <br>
          Check your email for transaction details.<br>
thank you.</p>
         </center>

        </div>
       
        <div class="modal-footer">
         <center>
          <button type="button" class="btn btn-default modal_close" data-dismiss="modal">Close</button>
             </center>
        </div>
     
      </div>
    </div>
  </div>
</div>
 <script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
        

    });
    $(document).ready(function() {
        $(".modal_close").bind("click", function() { 
            window.location.href = "http://localhost/SMART_project/index.php";
        });
    });

</script>

</body>
</html>