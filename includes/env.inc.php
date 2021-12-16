<?php

$companyName = "UISB Professionals' Hub";
$companyPhone = "08012345678";
$companyEmail = "info@uisbprohub.com";
$rootURL = "https://uisbprohub.com/";


if(isset($_SESSION['uisb_user_session'])){
    $userSession = $_SESSION['uisb_user_session'];
} else if(isset($_SESSION['uisb_admin_session'])){
    $userSession = $_SESSION['uisb_admin_session'];
}

?>