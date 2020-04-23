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
  </style>
  </head>
  <body class="bg">
		
		<div class="wrapper d-flex align-items-stretch">
			<?php
      include('menu1.php');
      ?>
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Homenurse Home</h2>
        <table style="width: 100%; background-color: #f7e4d7"class="table table-hover table-striped table-bordered" id="example1">
                    <thead>
                    <tr>
                      
                      <th>Patient name</th>
                        <th>Age</th>
                        
                               <th>Gender</th>
                                    <th>Relation</th>
                                    <th>Condition</th>

                                               </tr>
                    </thead>
                    <tbody>
                      <?php

                        $l=$_SESSION['login_id'];
                        $s="select * from homenursereg where logid='$l'";

                        $result=mysqli_query($co,$s);
                        $rowcount=mysqli_num_rows($result);
                        if($rowcount!=0)
                        {

                          while($row=mysqli_fetch_array($result))
                          {
                            $h=$row['hnid'];
                          }
                        }
                      $q=mysqli_query($co,"select patient.pname,patient.age,patient.gender,patient.type,patient.conditionid,interest.intid,interest.istatus,condition_tbl.conditionid,condition_tbl.condition,interest.hnid,interest.pid,homenursereg.hnid from patient,condition_tbl,interest,homenursereg where patient.pid=interest.pid &&  patient.conditionid=condition_tbl.conditionid && homenursereg.hnid=interest.hnid && interest.hnid=$h  && interest.istatus=1");
                     $n=mysqli_num_rows($q);

                      if($q -> num_rows>0)
                      {
                        while($row=$q -> fetch_assoc())
                         {


                           ?>

                           <tr>
                            
                         <td><?php echo $row['pname']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['condition']; ?></td>
                      

                          
                        </form>
              </td>



                    </tr>
                  <?php
                }
             }
             else {
               ?>
               <tr>
               <td colspan="9">
                <p style="color:black">no data found !</p>
               </td>
             </tr>
               <?php
             }

              ?>
                    </tbody>

                </table>
        
      </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
<?php
}
else {
  echo "<script>window.location.href='../index.php'</script>";
}
 ?>
