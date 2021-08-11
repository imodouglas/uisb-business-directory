<?php 
    include 'includes/env.inc.php';

    $alert = new AlertController();
    $user = new UserController();

    if(isset($_POST['login'])){
        $login = $user->login($_POST['email'], $_POST['password']);
        if($login == false){
           echo $alert->alert('Login credentials is incorrect!');
        } else {
            $_SESSION['uisb_user_session'] = $login['id'];
            echo "<script> window.location = '".substr($rootURL,0,-1).$_SERVER['REQUEST_URI']."'; </script>";
        }
    }

    if(isset($_POST['signup'])){
        if($_POST['password1'] == $_POST['password2']){
            $result = $user->createUser($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['phone'], $_POST['password1']);
            if($result !== false){
                $_SESSION['uisb_user_session'] = $result;
                echo "<script> window.location = '/add-listing'; </script>";
            } else {
                echo $alert->alert('An error occured!');    
            }
        } else {
            echo $alert->alert('Password mismatch!');
        }
    }
?>
<div class="full-screen flex-box">
    <div class="container pt100 pb100">
        <div class="row w100">
            <div class="col-sm-6">
                <div class="card-box mt10 mb10">
                    <form action="" method="post">
                        <h3 class="p10"> Login To Your Account </h3>
                        <div class="p10">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="p10">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="p10">
                            <button type="submit" class="btn btn-secondary form-control m0" name="login"> Login </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card-box mt10 mb10">
                    <form action="" method="post">
                        <h3 class="p10"> Create An Account </h3>
                        <div class="p10">
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name">
                        </div>
                        <div class="p10">
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="p10">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="p10">
                            <input type="number" name="phone" id="phone" class="form-control" placeholder="Phone No.">
                        </div>
                        <div class="p10">
                            <input type="password" name="password1" id="password1" class="form-control" placeholder="Password">
                        </div>
                        <div class="p10">
                            <input type="password" name="password2" id="password2" class="form-control" placeholder="Confirm Password">
                            <div style="display:none; font-size:13px; color:red" id='password-error'>Password Mismatch</div>
                        </div>
                        <div class="p10">
                            <button type="submit" class="btn btn-secondary form-control m0" name="signup"> Create Account </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#password2").keyup(()=>{
        if($("#password2").val() !== $("#password1").val()){
            $("#password-error").css("display", "block");
        } else {
            $("#password-error").css("display", "none");
        }
    });
</script>