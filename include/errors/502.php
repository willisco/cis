<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/x-icon" href="images/logo2.png">
	<title>error 502 | NMIS</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
  <?php if(Session::exist('R_ERRORS')):?>
  <div class="container">
     <div class="row">
      <br><br><br>
       <div class="jumbotron">
        <h2><u>ERROR 502| Registration errors</u></h2>
         <p>
          <?php foreach(Session::get('R_ERRORS') as $error) {
             echo "<li>$error</li>";
          }
            ?>
           &nbsp;&nbsp;<a href="views/index.php?page=add_member" class="btn btn-default" style="display: inline; text-decoration: none;color: blue; font-weight: bolder;">Try again </a>
            </p><hr>
       </div>
          
     </div>
  </div>
  <?php else:?>
  <div class="container">
  	 <div class="row">
  	  <br><br><br>
  	   <div class="jumbotron">
  	   	 <p>
          <?php 
          echo Session::get('add_new_errors');
          //echo date('Y', strtotime(Input::get('birth_date'))).'<br>';
          print_array($_POST);
          ?>
	        Sorry, an error occurred while adding new member &nbsp;&nbsp;<a href="view/index.php" class="btn btn-default" style="display: inline; text-decoration: none;color: blue; font-weight: bolder;">Try again </a>
            </p><hr>
  	   </div>
  	 	    
  	 </div>
  </div>
 <?php endif;?>
</body>
</html>