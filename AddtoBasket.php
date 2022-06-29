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




	session_start();
	if(isset($_GET['Addid']) & !empty($_GET['Addid'])){
			$items = $_GET['Addid'];
			$_SESSION['Basket'] = $items;
 
            $query  = "INSERT INTO Basket (idProduct,ProductName,) VALUES ('idProduct','$ProductName') where idProduct='$idProduct'";
            $result = $connect->query($query);

			header('location: Basket.php?status=success');
	}else{
		header('location: Basket.php?status=failed');
	}
?>