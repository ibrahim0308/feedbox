
<html>
<head>
<title  >  Basket  </title>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
</head>


<body>
 <div class="container">
 <button class="btn btn-primary my-5"> <a href="Dashboard.php"
 class="text-light"> Dashboard </a>
</button>
 

<h1>Customers</h1>
<table id= "Basket">
<tr>
    <th scope="col">idBasket</th>
    <th scope="col">idProduct</th>
    <th scope="col">ProductName</th>
    
</tr>
</body>

<?php

$connect= mysqli_connect("localhost","root","","FoodSales");

if(!$connect)
{
    die("connection failed:".mysqli_connect_error());
}
else
{
    echo "connection is succesful";
}



$sql = "SELECT * FROM Basket";
$Result= $connect->query($sql);

if($Result){
    while($row=mysqli_fetch_assoc($Result)){
        $id=$row['idBasket'];
        $Name=$row['idProduct'];
        $Surname=$row['ProductName'];
        
        echo '<tr>
        <th scope="row">'.$idBasket.'</th>
        <td>'.$idProduct.'</td>
        <td>'.$ProductName.'</td>
        <td>
        
       </td>
       </tr>';
    }
}

?>

</html>