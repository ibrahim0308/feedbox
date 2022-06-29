<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Products</title>
    <style type="text/css">
      .product-detail {
        padding:5px;
        margin-bottom: 10px;
        background-color: #18cc6d;
      }
      .other-detail {
        text-align: center;
       
      }

      .price {
        font-weight: 600;
        font-size: 20px;
        color: #FFF;
      }

      .product-img {
        height: 200px;
        object-fit: cover;
        width: 100%;
      }
      .price-style {
         background-color: #2d965f;
      }

      .btn-style {
        margin-bottom: 10px;
      }
    </style>
  </head>
  <body>
    <h1 class="text-center">Products</h1>

   <div class="container">
     <div class="row">
        <div class="col-md-6">
          <div class="row">
            <?php 
            $con = mysqli_connect('localhost','root','','foodsales');
            $sql = "SELECT * FROM product";
            $query = mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($query))
            {
              ?>
            <div class="col-md-6">
               <div class="product-detail">
                 
                  <div class="other-detail">
                    <h4><?=$row['ProductName']?></h4>
                    <div class="price-style">
                    <p class="price">$ <?=$row['price']?></p>
                    <!-- adding item to basket -->
                    <a href="AddtoBasket.php?action_type=add_item&idProduct=<?=$row['idProduct']
                    ?>&ProductName=<?=$row['ProductName']
                    ?>&quantity=1&price=<?=$row['price']?>" class="btn btn-warning btn-style">Add to Basket</a>
                    </div>
                  </div>
               </div>
            </div>
            <?php } ?>
          </div>
        </div>
        <div class="col-md-6">
          <h5 class="text-center">Products</h5>
          <?php 
          $Total=0;
          if(isset($_SESSION['cart'])) { ?>
          <table class="table table-bordered">
              <thead>
                 <th>SN</th>
                 <th>ProductName</th>
                 <th>Quantity</th>
                 <th>Price</th>
                 <th>Options</th>
              </thead>
              <tbody>
                <?php
                $index =0;
                $i=1;
                foreach($_SESSION['cart'] as $key => $val) {   
                  $totalPrice = $val['quantity'] * $val['price'];
                  $Total = $Total + $totalPrice;
                  ?>            
                <tr>
                   <td><?=$i++?></td> 
                   <td><?=$val['ProductName']?></td> 
                   <td><?=$val['quantity']?></td>  
                   <td><?=$totalPrice?></td> 
                   <td><a href="AddtoBasket.php?action_type=remove_item&index=<?=$key?>">Remove </a></td>
                </tr>
              <?php $index++; } ?>
              <tr>
                <td></td>
                <td></td>
                <td><b>Total</b></td>
                <td><?=$Total?></td>
                <td></td>
              </tr>
              </tbody>

          </table>
        <?php } ?>
        </div>
     </div>
   </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>