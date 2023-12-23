
<?php
    $nav = $_GET['act'] ?: "home";
    switch($nav){
        case 'home':
            include "./view/components/home.php";
            break;
        case 'about':
            include "./view/components/about-us.php";
            break;
        case 'menu':
            include "./view/components/menu.php";
            break;
        case 'contact':
            include "./view/components/contact.php";
            break;
        case 'blog':
            include "./view/components/blog.php";
            break;
        case 'cart':
            include "./view/components/cart.php";
            break;
        case 'menu-single':
            include "./view/components/menu-single.php";
            break;
        case 'edit-user':
            include "./view/components/edit-user.php";
            break;
    }
?>