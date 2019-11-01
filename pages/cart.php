<?php
    //include '../../core.php';
	include '../base.php';
    include '../../service/db_con.php';
    $user = $_SESSION['user_id'];
    if(!$user){
        header("Location: /iwt/login.php");
    }
    $sql = "SELECT *
    FROM cartitem
    INNER JOIN recipe
    ON cartitem.recipe_id = recipe.recipe_id
    WHERE user_id = '$user'";

    $result = $con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../static/css/spinner.css">
    <link rel="stylesheet" href="../static/css/style_cart_order-list.css">
    <title>Burger Builder | Cart</title>
</head>
<body>
    <div class="container">
        <?php navbar();?>
        <div class="main">
            <div class="cart-list">
            <?php
                $totalOfAllItems = 0;
                $count = 0;
                if($result -> num_rows > 0){
                    echo '<div class="right"> 
                    <div class="cart-list__cards">';
                    while($row = $result->fetch_assoc()){
                        $totalPrice = $row['price'] * $row['qty'];
                        $totalOfAllItems += $totalPrice;
                        $count += 1;
                        echo '<div class="cart-list__cards__card" id="parent'.$count.'">
                        <div class="card-img"><img class="img" src="../static'.$row['image'].'" alt="" /></div>
                        <div class="details">
                            <div class="title">Recipe '.$row['recipe_id'].'</div>
                            <div class="description">'.$row['qty'].'</div>
                            <div class="price-box"><span>'.$totalPrice.'</span>/=</div>
                        </div>
                        <div class="card-remove"><button class="btn btn-warning"  onclick=removeItem("'.$row['recipe_id'].'")>Remove</button></div>
                        </div> ';
                    }
                    echo'</div>
                    </div>    
                    <div class="cart-list__checkout-box">
                        <div class="total-label">Total:</div>
                        <div class="total-price"><span id="total-price-span">'.$totalOfAllItems.'</span>/=</div>
                        <div class="checkout"><a href="payment.html"><button class="btn btn-secondary">CHECKOUT</button></a></div>
                    </div>';  
                }else{
                    echo "<div class='not-found-box'>
                    <div class='emoji'>:(</div>
                    <div class='message'>
                        <div class='message__primary'>Oops..!</div>
                        <div class='message__secondary'>You don't have any products in cart. Let's start <a href='product_list.php'>browsing<a></div>
                    </div>
                    </div>";
                }
            ?>                
            </div>
        </div>
    </div>
   <script type='text/javascript' src='../static/js/ajax.js'></script>
   <script src='../static/js/chunk_cart.js'></script>
</body>
</html>