<?php 
    include '../../service/db_con.php';
    include '../base.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Burger Builder | list</title>
    <link rel="stylesheet" href="../static/css/spinner.css">
    <link rel="stylesheet" href="../static/css/style_cart_order-list.css">
    <style> 
            #myInput {
                background-position: 10px 12px;
                /*background-image: url(search.png);
                background-repeat: no-repeat;
                */width: 100%;
                font-size: 16px;
                padding: 12px 20px 12px 40px;
                border: 1px solid #ddd;
                margin-bottom: 12px;
            }
                
    </style>
</head>
    <div class="container">
        <?php navbar();?>
        <main class='main'>
            <input type="text" id="myInput" placeholder="Search for burgers.." title="Type in a name">
            <?php
                $sqlQuery = "SELECT * from Recipe";
                $result = $con->query($sqlQuery);
                $data = array();

                if($result -> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $data[] = $row;      
                    }
                    $chunkData = array_chunk($data,3);
                    echo '<div class="product-modal"></div>';
                    for($i=0; $i<count($chunkData); $i++){
                        echo '<div class="flex-grid-col-3">';
                        for($j=0; $j<count($chunkData[$i]); $j++){
                            echo '<div class="flex-col item-box" onclick= getDetailOfProduct("'.$chunkData[$i][$j]["recipe_id"].'")><img class="item" src="../static'.$chunkData[$i][$j]["image"].'" alt="bbq"><h3>'.$chunkData[$i][$j]["name"].'</h3></div>';
                        }
                        echo '</div>'; 
                    }
                }else{
                    echo '<h1>No data exists</h1>';
                }
            ?>
        </main>           
    </div>
    <a href="cart.php"><img src="../static/images/cart.png" alt="cart" class="cart-icon"></img></a>
    <?php footer(); ?>
    <script type='text/javascript' src='../static/js/ajax.js'></script>
    <script type='text/javascript' src='../static/js/chunk_model.js'></script>
    <script type='text/javascript' src='../static/js/chunk_product_list.js'></script>
</html>