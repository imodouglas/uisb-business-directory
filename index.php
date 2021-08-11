<?php
    session_start();
    require 'includes/env.inc.php';
    include 'includes/autoloader.php';

    /** Head Tags */
    include 'includes/head.inc.php';
?>
<body>
    <?php
        include 'includes/navbar.inc.php';
        
        include 'includes/router.inc.php';

        /** User Authentication */
        function userAuth($url){
            if(isset($_SESSION['uisb_user_session']) || isset($_SESSION['uisb_admin_session'])){
                return $url;
            } else {
                return 'views/login.view.php';
            }
        }

        /** Admin Authentication */
        function adminAuth($url){
            if(isset($_SESSION['uisb_admin_session'])){
                return $url;
            } else {
                return 'views/login.view.php';
            }
        }
        

        /** Index Page */
        route('/', function(){ 
            include 'views/index.view.php';
        });

        /** 
         * REGULAR USER ROUTES BEGINS HERE
         */

        /** Homepage after login */
        route('/home', function(){ 
            $url = userAuth('views/home.view.php');
            include $url;
        });


        /** Listing Page */
        route('/listings', function(){ 
            $url = 'views/listings.view.php';
            include $url;
        });


        /** Search Result */
        route('/search', function(){ 
            $url = 'views/search.view.php';
            include $url;
        });


        /** Add Listing */
        route('/add-listing', function(){ 
            $url = userAuth('views/add-listing.view.php');
            include $url;
        });

        /** My Listing */
        route('/my-listings', function(){ 
            $url = userAuth('views/my-listings.view.php');
            include $url;
        });

        /** User profile page */
        route('/profile', function(){ 
            $url = userAuth('views/profile.view.php');
            include $url;
        });

        /** Reset password page */
        route('/reset-password', function(){ 
            $url = 'views/reset-password.view.php';
            include $url;
        });

        /** 
         * REGULAR USER ROUTES ENDS HERE
         */



        /** 
         * ADMIN ROUTES BEGINS HERE
         */

        /** Homepage After Login */
        route('/admin', function(){ 
            $url = adminAuth('views/admin-home.view.php');
            include $url;
        });

        /** Manage Investments Page */
        route('/admin/investments', function(){ 
            $url = adminAuth('views/admin-investments.view.php');
            include $url;
        });

        route('/admin/investments/(.+)/?', function($id){ 
            $id = $id;
            $url = adminAuth('views/admin-investment.view.php');
            include $url;
        });

        /** Manage Users Page */
        route('/admin/users', function(){ 
            $url = adminAuth('views/admin-users.view.php');
            include $url;
        });


        /** Manage A User Page */
        route('/admin/user/(.+)/?', function($id){ 
            $id = $id;
            $url = adminAuth('views/admin-user.view.php');
            include $url;
        });


        /** Manage Payouts */
        route('/admin/payouts', function(){ 
            $url = adminAuth('views/admin-payouts.view.php');
            include $url;
        });



        /** 
         * ADMIN ROUTES ENDS HERE
         */

        /** Logout */
        route('/logout', function(){
            session_destroy();
            echo "<script> window.location = './'; </script>";
        });

        /** View Categories */
        route('/category/(.+)', function($slug){ 
            $url = 'views/category-listings.view.php';
            include $url;
        });

        /** View Businesses */
        route('/(.+)', function($slug){ 
            $url = 'views/listing-details.view.php';
            include $url;
        });

        $action = $_SERVER['REQUEST_URI'];
        dispatch($action);
    ?>

    <?php
        include 'includes/footer.inc.php';

        /** Javacripts */
        include 'includes/scripts.inc.php';
    ?>
</body>
</html>