<?php 
include 'includes/env.inc.php';

$business = new BusinessController();
$category = new CategoryController();
$review = new ReviewController();

if(isset($_POST['search'])){
    include 'includes/pages/search.inc.php';
} else {
    include 'views/404.view.php';
}