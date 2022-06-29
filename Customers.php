<html>
<head>
<title  >  Customers  </title>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
</head>


<body>
    
<div class="container">
 <button class="btn btn-primary my-5"> <a href="AddCustomer.php"
 class="text-light"> Add Customer </a>
</button>

<div class="container">
 <button class="btn btn-primary my-5"> <a href="Dashboard.php"
 class="text-light"> Dashboard</a>
</button>
 

 

<h1>Customers</h1>
<table id= "Customer">
<tr>
    <th scope="col">id</th>
    <th scope="col">name</th>
    <th scope="col">username</th>
    <th scope="col">Email</th>
    <th scope="col">password</th>



</tr>
</body>

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



$sql = "SELECT * FROM kullanicilar Where role = 'customer'";
$Result= $connect->query($sql);

if($Result){
    while($row=mysqli_fetch_assoc($Result)){
        $id=$row['id'];
        $name=$row['name'];
        $username=$row['username'];
        $Email=$row['Email'];
        $password=$row['password'];




        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$name.'</td>
        <td>'.$username.'</td>
        <td>'.$Email.'</td>
        <td>'.$password.'</td>


        
       </tr>';
    }
}

?>

</html>