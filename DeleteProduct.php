<html>
<head>
<title  >  Products  </title>  
</head>

<?php
$connect= mysqli_connect("localhost","root","","foodsales");

if(!$connect)
{
    die("connection failed:".mysqli_connect_error());
}
else
{
    echo "connection is succesful" ; 
}


if(isset($_GET['deleteid']))
{
  $idProduct=$_GET['deleteid'];

  $sql = "DELETE FROM product WHERE idProduct=$idProduct";
  $Result=mysqli_query($connect,$sql);
}

if ($Result) {
    echo "<script> alert('Record deleted successfully') </script>";
  } else {
    echo  "<script> alert('Error deleting record:') </script>" . $connect->error;
  }
  
  ?>
  
  <a href = "select.php">See the customer list</a> <br><br>




