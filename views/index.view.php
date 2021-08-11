<?php
    include 'includes/env.inc.php';
    $category = new CategoryController();
    $business = new BusinessController();
    $review = new ReviewController();
    $config = new ConfigController();

    include 'includes/components/index/header.inc.php';
    include 'includes/components/index/categories.inc.php';
    include 'includes/components/index/businesses.inc.php';