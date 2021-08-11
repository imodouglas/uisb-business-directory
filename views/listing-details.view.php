<?php 
    include 'includes/env.inc.php';

    $slug = trim($_SERVER['REQUEST_URI'], "/");

    $alert = new AlertController();
    $user = new UserController();
    $business = new BusinessController();
    $review = new ReviewController();

    $biz = $business->getBusiness($slug);

    if($biz == false){
        include 'views/404.view.php';
    } else {
        if(isset($_POST['add-review'])){
            $result = $review->addReview($biz['id'], $_POST['name'], $_POST['email'], $_POST['review'], $_POST['rating']);
            if($result == false){
                echo $alert->alert('An error occured');
            }
        }

        include 'includes/pages/page-listing.inc.php';
    }

    
?>