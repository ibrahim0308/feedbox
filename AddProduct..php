<html>
<head>
<title  >  Customers  </title>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
</head>


<?php

$connect= mysqli_connect("localhost","root","","foodsales");

if(!$connect)
{
    die("connection failed:".mysqli_connect_error());
}
else
{
    echo "connection is succesful";
}

?>

    <form method="post" action="AddProduct..php">
Name:<input type="text" Name="Name"><br><br>


<input type="submit" name="button">



</form>
  
<a href = "select.php">See the customer list</a> <br><br>
<a href = "Delete.php">See Deleted list</a><br><br>
<a href = "Update.php">See Updated list</a><br><br>

<?php

use LDAP\Result;

if(isset($_POST["button"]))
{
    

    $sql= "INSERT INTO product (Name) VALUES ('".$_POST["Name"]."')";

    $Result=mysqli_query($connect,$sql);
    if($Result)
    {
        echo "<script> alert('Your data has been sent') </script>";
    }
    else{
        echo "data could not be sent";
    }
}