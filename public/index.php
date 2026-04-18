<?php
include_once __DIR__ . '/../includes/header.php';

//----determine which page to load----//
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        include __DIR__ . '/home.php';
        break;

    case 'catalog':
        include __DIR__ . '/catalog.php';
        break;

    case 'cart':
        include __DIR__ . '/cart.php';
        break;

    case 'checkout':
        include __DIR__ . '/checkout.php';
        break;
    
    default:
        echo "h1>404 - Page Not Found</h1>";
        break;

}

include_once __DIR__ . '/../includes/footer.php';
