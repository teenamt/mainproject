<?php
session_start();
if(isset($_SESSION['login_id'])){
  $l=$_SESSION['login_id'];
  



  include('../co.php');
 ?>
<!doctype html>
<html lang="en">
  <head>
  	<title>User Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main2.css">
    
<style>
  .bg{
      background-image:  url("images/home-care2.png");
    background-size: cover;
    background-repeat: no-repeat;
   
    background-attachment: fixed;
    display: table;
    width: 100%;
    height: 100vh;
  }
  .error{
    color: black;
  }
  </style>
  </head>
  <body class="bg">
		
		<div class="wrapper d-flex align-items-stretch">
			<?php
      include('menu1.php');
      ?>
        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Homenurse Home</h2>
        <a href="viewleavestatus.php"><button class="mb-2 mr-2 btn-icon btn btn-danger">View Leave Status</button></a>
         <div id="content" class="p-4 p-md-5 pt-5">
       
         
        <div class="wrap-contact100"style="background-color: #fff1f152;width: 400px;margin-left: 200px">
        
      <form action="#" method="POST" class="contact100-form validate-form" id="myform">
        <span class="contact100-form-title">
          Apply Leave
        </span>

        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100"style="font-size: 20px;font-style: bold;color: black ">Select Date</span>
          <input class="input100" type="date" name="datee" placeholder="Enter the date">
          <span class="focus-input100"></span>
        </div>

        
        <div class="wrap-input100 input100-select">
          <span class="label-input100"style="font-size: 20px;font-style: bold;color: black ">Select Session</span>
          <div>
            <select class="input100"style="background-color: #e2e0e0" name="session">
              <option>Morning</option>
              <option>Afternoon</option>
              <option>Full Day</option>
          
            </select>
          </div>
          <span class="focus-input100"></span>
        </div>

        

        <div class="wrap-input100 validate-input" data-validate = "Enter the reason">
          <span class="label-input100"style="font-size: 20px;font-style: bold;color: black ">Reason</span>
          <textarea class="input100"style="color: black" name="reason" placeholder="Enter the Reason..."></textarea>
          <span class="focus-input100"></span>
        </div>

        <div class="container-contact100-form-btn">
          <div class="wrap-contact100-form-btn">
            <div class="contact100-form-bgbtn"></div>
            <button class="contact100-form-btn" name="submit">
              <span>
                Apply
                <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
              </span>
            </button>
          </div>
        </div>
      </form>
    </div>
        
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       <script src="leave.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>

<?php

include '../co.php';
    
    if(isset($_POST['submit']))
    {
      $as=$_POST['datee'];
      $c=$_POST['session'];
      $d=$_POST['reason'];
     
    
      
    $s=mysqli_query($co,"select hnid from homenursereg where logid='$l'");
              $r=mysqli_fetch_array($s,MYSQLI_ASSOC);
              $lid=$r['hnid'];
    $ss=mysqli_query($co,"select * from appointment where hnid='$lid'");
               
               $rowcount=mysqli_num_rows($ss);
                        if($rowcount!=0)
                        {

                  while($row=mysqli_fetch_array($ss))
                          
                    {
                      $u=$row['userid'];
                      $p=$row['pid'];
                    }
                  }

    $sql="INSERT INTO `leave`(hnid,userid,pid,logid,ldate,session,reason,lstatus) VALUES ('$lid','$u','$p','$l','$as','$c','$d',0)";
      
      $ch=mysqli_query($co,$sql);
              
       if($ch)
          
          {?>
            <script>
             alert("Leave applied successfully");
             <?php echo mysqli_error($co); ?>
             </script>
             <?php
          }
        else
          {
        echo "error :".$sql."<br>".mysqli_error($co);
          }
      }
    
        mysqli_close($co);

?>



<?php
}
else {
  echo "<script>window.location.href='../index.php'</script>";
}
 ?>
