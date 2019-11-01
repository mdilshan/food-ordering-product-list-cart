<?php 
    //session_start();
	include '../../core.php';
	
    function navbar(){
        if(isset($_SESSION['user_id'])){
            echo '<header class="header">';
            echo    '<div class="header__logo"><a href="index.html">Burger Builder</a></div>';
            echo        '<nav class="navbar">';
            echo            '<ul class="navbar__list">';
            echo                 '<li class="navbar__list__item">';
            echo                     '<a href="index.html" class="navbar__list__item__link">Home</a>';
            echo                 '</li>'; 
            echo                 '<li class="navbar__list__item">';
            echo                     '<a href="custom_product.php" class="navbar__list__item__link">Burger Builder</a>';
            echo                 '</li>';
            echo                 '<li class="navbar__list__item ">';
            echo                     '<a href="product_list.php" class="navbar__list__item__link active">Burger List</a>';
            echo                 '</li>';
            echo                 '<li class="navbar__list__item">';
            echo                     '<a href="aboutUs.html" class="navbar__list__item__link">About Us</a>';
            echo                 '</li>';
            echo             '</ul>';
            echo         '</nav>';
            echo         '<div class="header__avatar-box">';
            echo             '<a href="/iwt/profile.php"><img src="static/img/avatar.png" alt="profile" class="avatar"></a>';
            echo         '</div>';
            echo     '</header>';
        }else{
            echo '<header class="header">';
            echo    '<div class="header__logo"><a href="index.html">Burger Builder</a></div>';
            echo        '<nav class="navbar">';
            echo            '<ul class="navbar__list">';
            echo                 '<li class="navbar__list__item">';
            echo                     '<a href="index.html" class="navbar__list__item__link">Home</a>';
            echo                 '</li>'; 
            echo                 '<li class="navbar__list__item">';
            echo                     '<a href="builder.html" class="navbar__list__item__link">Burger Builder</a>';
            echo                 '</li>';
            echo                 '<li class="navbar__list__item ">';
            echo                     '<a href="list.html" class="navbar__list__item__link active">Burger List</a>';
            echo                 '</li>';
            echo                 '<li class="navbar__list__item">';
            echo                     '<a href="aboutUs.html" class="navbar__list__item__link">About Us</a>';
            echo                 '</li>';
            echo             '</ul>';
            echo         '</nav>';
            echo         '<div class="header__avatar-box">';
            echo             '<a href="login.php" class="avatar"><button>Register<button></a>';
            echo             '<a href="login.php" class="avatar">Login</a>';
            echo         '</div>';
            echo     '</header>';            
        }
    }

    function footer(){
        echo '<footer class="footer">';
        echo '<div class="flex-grid-col-3">';
        echo    '<div class="flex-col footer__col">';
        echo         '<h5>Burger Builder</h5>';
        echo        '<p>All rights reserved</p>';
        echo        '<p>2019</p>';
        echo    '</div>';
        echo    '<div class="flex-col footer__col">';
        echo        '<h5>Design And Developed By</h5>';
        echo        '<p>SLIIT WEEKEND</p>';
        echo        '<p>GROUP - 01</p>';
        echo    '</div>';
        echo    '<div class="flex-col footer__col">';
        echo        '<h5>Links</h5>';
        echo        '<ul>';
        echo            '<li> <a href="#">Home</a> </li>';
        echo            '<li> <a href="#">Burger Builder</a> </li>';
        echo            '<li> <a href="#">Burger List</a> </li>';
        echo            '<li> <a href="#">About Us</a> </li>';
        echo        '</ul>';
        echo    '</div>';
        echo '</div>';
        echo '</footer>';
    }
?>
