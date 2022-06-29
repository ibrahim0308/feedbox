<html>
<head>
<title  >  AdminProducts  </title>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
</head>


<body>
 <div class="container">
 <button class="btn btn-primary my-5"> <a href="AddProduct..php"
 class="text-light"> Add Product </a>
</button>

<div class="container">
 <button class="btn btn-primary my-5"> <a href="Dashboard.php"
 class="text-light"> Dashboard</a>
</button>
 

<h1>Products</h1>
<table id= "Product">
<tr>
    <th scope="col">idProduct</th>
    <th scope="col">Name</th>
    
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



$sql = "SELECT * FROM product";
$Result= $connect->query($sql);

if($Result){
    while($row=mysqli_fetch_assoc($Result)){
        $idProduct=$row['idProduct'];
        $Name=$row['Name'];
        
        echo '<tr>
        <th scope="row">'.$idProduct.'</th>
        <td>'.$Name.'</td>
       
        <td>
       
       
       <button class= "btn btn-danger"> <a href="DeleteProduct.php?deleteid='.$idProduct.'"
       class= "text-light">Delete</a></button>
       </td>
       </tr>';
    }
}

?>

</html>