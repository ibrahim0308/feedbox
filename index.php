<!DOCTYPE html>
<html lang="en">
<head>
  <title>register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- LIKE CSS BUT HAS MORE DETAILS AND ITS FOR LOOKS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- SCRIPT FOR JAVASCRIPT, REFRENCING -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
<!-- BOOTSRAP FOR HOW IT LOOKS -->
<div class="card text-center" style="padding:20px;">
  <h3>register</h3>
</div><br>

<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-6">      
        <!-- ISSET MEANS ARRANGED IF ERROR MSG ARRANGED ALERT WILL COME -->
        <?php if (isset($errorMsg)) { ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $errorMsg; ?>
          </div>
        <?php } ?>
        <!-- ADDING THE FORM, USING BOOTSTRAP -->
        <form action="" method="POST">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" required="">
          </div>
          <div class="form-group">  
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" placeholder="Enter Username" required="">
          </div>
          <div class="form-group">  
            <label for="Email">Email:</label>
            <input type="text" class="form-control" name="Email" placeholder="Enter Email" required="">
          </div>
          <div class="form-group">  
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required="">
          </div>
          <div class="form-group">  
            <label for="role">Role:</label>
            <select class="form-control" name="role" required="">
              <option value="">Select Role</option>
             //Specified the roles
              <option value="admin">Admin</option>
              <option value="customer">customer</option>
            </select>
          </div>
          <div class="form-group">
            <!-- IF ALREADY REGISTERED AN ERROR MSG WILL COME IF NOT U WILL REGISTER -->
            <p>Already have account ?<a href="login.php"> Login</a></p>
            <input type="submit" name="submit" class="btn btn-primary">
          </div>
        </form>
      </div>
  </div>
</div>
</body>
</html>




  <?php
    // Include database connection file
  // CONNECTING TO THE DATABASE
$connect= mysqli_connect("localhost","root","","FoodSales");

if(!$connect)
{
    die("connection failed:".mysqli_connect_error());
}
else
{
    return "connection is succesful";
}

  if (isset($_POST['submit'])) {

    $Email=$_POST['Email'];
    // VALIDATION FOR THE MAIL

    if (filter_var($Email,FILTER_VALIDATE_EMAIL)===false){
        
        exit ("Please enter the email in a valid format");
    }

    
    // METHOD FOR ARRANGING THE DATA TO THE DATABASE
    $username = $con->real_escape_string($_POST['username']);
    // HASHING THE PASSWORD WITH MD5
    $password = $con->real_escape_string(md5($_POST['password']));
    $name     = $con->real_escape_string($_POST['name']);
 
    $role     = $con->real_escape_string($_POST['role']);

    
    // FOR SENDING THE DATA TO THE DATABASE 
    $query  = "INSERT INTO kullanicilar (name,username,Email,password,role) VALUES ('$name','$username','".$_POST["Email"]."','$password','$role')";
    $result = $con->query($query);

    // IF REGISTERES U WILL BE OKAY IF NOT THE ERROR MSG WILL POP UP
    if ($result==true) {
      header("Location:login.php");
      die();
    }else{
      $errorMsg  = "You are not Registred..Please Try again";
    }   

  }

?>
