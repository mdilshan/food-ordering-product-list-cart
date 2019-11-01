<?php
    include '../base.php';
    include '../../service/db_con.php';

    $sql = "SELECT * FROM layer";
    $result = $con->query($sql);
    $data = array();
    
    if($result -> num_rows > 0){
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
    }else{
        header('Status : 500 Internal Server Error');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../static/css/style_cart_order-list.css">
    <script src='../static/js/ajax.js'></script>
    <script src='../static/js/chunk_model.js'></script>
    <script>
        const __DATA__ = <?php echo json_encode($data);?>;
    </script>
</head>
<body>
    <div class="container">

        <?php navbar();?>
        <!--end of header -->
        <main>
            <div class="product-modal"></div>
            <div class="burger-details row">
                <div class='col-xm-4 col-sm-2 col-md-2 col-lg-2'>
                    <div class="burger-details__view ">
                        <div class="layer layer--1"><img src="../static/images/layers/burger-top.png" alt="" class="img img--1"></div>
                        <span class='dynamic-items'>
                        </span>
                        <div class="layer layer--6"><img src="../static/images/layers/BUN-BASE_MAIN.png" alt="" class="img img--6"></div>   
                    </div>
                </div>
                <div class='col-xm-4 col-sm-2 col-md-2 col-lg-2'>
                    <div class="burger-details__price">
                        <div>Current Price</div>
                        <div>
                            <span class='price-box'>00</span><span>/=</span>
                        </div>
                        <div>
                            <button class='btn btn-secondary' onclick="getDetailOfCustomProduct()" >Add to cart</button>
                        </div>
                     </div>
                </div>
            </div>
            <div class="control row">
                <div class='col-xm-4 col-sm-2 col-md-2 col-lg-2'>
                    <ul class="control__panel control__panel--left">
                        <li class="control__panel__list">
                            <button id="1D" class="control__panel__item-decrease" onclick="removeIngredients('Top', '1')" disabled>-</button>
                            <span class="control__panel__item-label">TOP</span>
                            <button id="1I" class="control__panel__item-increase" onclick="addIngredients('Top', '1')" disabled>+</button>
                        </li>
                        <li class="control__panel__list">
                            <button id="2D" class="control__panel__item-decrease" onclick="removeIngredients('cheese', '2')" >-</button>
                            <span class="control__panel__item-label">CHEESE</span>
                            <button id="2I" class="control__panel__item-increase" onclick="addIngredients('cheese', '2')">+</button>
                        </li>
                        <li class="control__panel__list">
                            <button id="3D"class="control__panel__item-decrease" onclick="removeIngredients('onion', '3')" >-</button>
                            <span class="control__panel__item-label">ONIONS</span>
                            <button id="3I" class="control__panel__item-increase" onclick="addIngredients('onion', '3')">+</button>
                        </li>
                    </ul>
                </div>
                <div class='col-xm-4 col-sm-2 col-md-2 col-lg-2'>
                    <ul class="control__panel control__panel--right">
                        <li class="control__panel__list">
                            <button id="4D"class="control__panel__item-decrease" onclick="removeIngredients('tommato', '4')" >-</button>
                            <span class="control__panel__item-label">TOMMATO</span>
                            <button id="4I" class="control__panel__item-increase" onclick="addIngredients('tommato', '4')">+</button>
                        </li>
                        <li class="control__panel__list">
                            <button id="5D"class="control__panel__item-decrease" onclick="removeIngredients('beef patty', '5')">-</button>
                            <span class="control__panel__item-label">PATTY</span>
                            <button id="5I" class="control__panel__item-increase" onclick="addIngredients('beef patty', '5')">+</button>
                        </li>
                        <li class="control__panel__list">
                            <button id="6D"class="control__panel__item-decrease" onclick="removeIngredients('Base', '6')" disabled>-</button>
                            <span class="control__panel__item-label">BASE</span>
                            <button id="6I" class="control__panel__item-increase" onclick="addIngredients('Base', '6')" disabled>+</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="submit-box">
                    <button class='btn btn-primary' onclick="getDetailOfCustomProduct()">ADD TO CART</button>
            </div>
        </main>
    </div>
    <a href="cart.php"><img src="../static/images/cart.png" alt="cart" class="cart-icon"></img></a>
    <footer class='footer'>
            <div class="flex-grid-col-3">
                <div class="flex-col footer__col">
                    <h5>Burger Builder</h5>
                    <p>All rights reserved</p>
                    <p>2019</p>
                </div>
                <div class="flex-col footer__col">
                    <h5>Design And Developed By</h5>
                    <p>SLIIT WEEKEND</p>
                    <p>GROUP - 01</p>
                </div>
                <div class="flex-col footer__col">
                    <h5>Links</h5>
                    <ul>
                        <li> <a href="#">Home</a> </li>
                        <li> <a href="#">Burger Builder</a> </li>
                        <li> <a href="#">Burger List</a> </li>
                        <li> <a href="#">About Us</a> </li>
                    </ul>
                </div>
            </div>
        </footer>
    <script src='../static/js/chunk_custom_product.js'></script>
</body>
</html>