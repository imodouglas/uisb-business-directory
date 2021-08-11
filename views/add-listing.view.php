<?php 
    include 'includes/env.inc.php';

    $alert = new AlertController();
    $business = new BusinessController();
    $category = new CategoryController();
    $config = new ConfigController();

    if(isset($_POST['add-listing'])){
        if(isset($_FILES['logo']['name']) && $_FILES['logo']['name'] !== ""){
            $logo = $business->uploadImage($_FILES['logo']['name'], $_FILES['logo']['tmp_name'], $_POST['slug'].'_logo', 'assets/images/logos/', 400, 200);
        } else {
            $logo = 'logo-2.png';
        }

        if(isset($_FILES['image']['name']) && $_FILES['image']['name'] !== ""){
            $image = $business->uploadImage($_FILES['image']['name'], $_FILES['image']['tmp_name'], $_POST['slug'].'_'.rand(0001,9999), 'assets/images/businesses/', 1200, 800);
        } else {
            $image = 'image-holder.jpg';
        }

        $result = $business->addListing($userSession, $_POST['name'], $_POST['slug'], $_POST['email'], $_POST['phone'], $_POST['address'].', '.$_POST['state'].', '.$_POST['country'], $_POST['category'], $_POST['start_time'], $_POST['end_time'], $_POST['description'], $logo, $image);

        if($result == true){
            echo $alert->alert('Listing Added Successfully');
        } else {
            echo $alert->alert('An error occured. Try again!');
        }

    }
?>

<div class="full-screen flex-box">
    <div class="container pt100 pb100">
        <div class="row w100">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form action="" enctype="multipart/form-data" method="post">
                    <h3 class="pl10">Add A Listing</h3>
                    <hr>
                    <div class="p10">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Business Name" required />
                    </div>
                    <div class="p10 input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><?php echo "www.".trim($rootURL, "http://")."/"; ?></span>
                        </div>
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="business-link" required />
                    </div>
                    <div class="p10">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Business Email" required />
                    </div>
                    <div class="p10">
                        <input type="number" name="phone" id="phone" class="form-control" placeholder="Business Phone No." required />
                    </div>
                    <div class="p10">
                        <input type="text" name="address" id="address" class="form-control" placeholder="Business Address" required />
                    </div>
                    <div class="p10">
                        <select name="state" id="state" class="form-control" required >
                            <?php 
                                foreach($config->activeStates() AS $state){
                                    ($state['state_name'] == 'Lagos') ? $selected = "selected" : $selected  = "";
                                    echo "<option value='".$state['state_name']."' ".$selected.">".$state['state_name']." </option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="p10">
                        <select name="country" id="country" class="form-control" required >
                            <option value="Nigeria">Nigeria</option>
                        </select>
                    </div>
                    <div class="p10">
                        <select name="category" id="category" class="form-control" required >
                            <option value="">- SELECT A CATEGORY -</option>
                            <?php 
                                foreach($category->getCategories() AS $cat){
                                    echo "<option value='".$cat['id']."'> ".$cat['name']." </option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="p10">
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="About Your Business" required ></textarea>
                    </div>
                    <div class="p10">
                        <label for="logo" style="margin-bottom:0; font-size:13px" class="sub-text pl10"> Logo </label>
                        <input type="file" name="logo" id="logo" class="form-control" placeholder="Logo">
                    </div>
                    <div class="p10">
                        <label for="image" style="margin-bottom:0; font-size:13px" class="sub-text pl10"> Featured Image </label>
                        <input type="file" name="image" id="image" class="form-control" placeholder="Featured Image">
                    </div>
                    <div>
                        <div class="row m0">
                            <div class="col-sm-6 p10">
                                <label for="start_time" style="margin-bottom:0; font-size:13px" class="sub-text pl10"> Work Start Time </label>
                                <input type="time" name="start_time" id="start_time" class="form-control" placeholder="Work Start Time" />
                            </div>
                            <div class="col-sm-6 p10">
                                <label for="end_time" style="margin-bottom:0; font-size:13px" class="sub-text pl10"> Work End Time </label>
                                <input type="time" name="end_time" id="end_time" class="form-control" placeholder="Work End Time" />
                            </div>
                        </div>
                    </div>
                    <div class="p10">
                        <button type="submit" name="add-listing" class="btn btn-secondary form-control m0">Add Listing</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $("#slug").blur(function(){
        var eodomain = $("#slug").val();
        var newString = eodomain.replace(/[^-A-Z0-9]+/ig, "");
        newString = newString.toLowerCase();
        $("#slug").val(newString);
    });
</script>