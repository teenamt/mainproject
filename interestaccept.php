 <?php
include "../co.php";

$b=$_POST['id1'];

//$sql=mysqli_query($co,"update hreg set status=1 where logid='$b'");
$sqll=mysqli_query($co,"update interest set istatus=1 where intid='$b'");
if ( $sqll ){
echo "<script>alert('accepted');
      window.location='homenurseinterestview.php';</script>";
}
else {
	echo "<script>alert('Error');</script>";
}


?>
