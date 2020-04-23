

<?php
session_start();
  $l=$_SESSION['login_id'];

include "../co.php";
    if(isset($_POST['submit']))
    {
      $address=$_POST['address'];
    
       //$district=$_POST['district'];
        $city=$_POST['city'];
        $phone=$_POST['phone'];
       
      

      

      
      
  
         $sql="UPDATE homenursereg SET address='$address',city='$city',phone='$phone' WHERE logid ='$l'";
    
      
      $ch=mysqli_query($co,$sql);
              
       if($ch)
          
          {?>
            <script>
             alert(" Profile updated successfully");
             window.location='homenurse.php'
             </script>
             <?php
          }
        else
          {
            echo"error:".$sql."<br>".mysqli_error($co);
          }
      }
    
        mysqli_close($co);
  ?>
