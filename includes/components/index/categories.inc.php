<section class="content4 cid-sF27x5WhkF" id="content4-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-md-12 col-lg-10">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2">
                    <strong>Featured Categories</strong>
                </h3>
            </div>
        </div>
    </div>
</section>

<section class="features1 cid-sF26FzaGtm" id="features2-3">
    <div class="container">
        <div class="row justify-content-center">
            <?php 
                foreach ($category->getCategories() AS $cat){
            ?>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card-wrapper">
                        <div class="card-box align-center">
                            <div align="center" class="mb10">
                                <a href="<?php echo $rootURL.'category/'.$cat['slug']; ?>">
                                    <img src="assets/images/icons/<?php echo $cat['slug']; ?>.png" style="width: 100px;">
                                </a>
                            </div>
                            <h4 class="card-title align-center mbr-black mbr-fonts-style display-7">
                                <strong><?php echo $cat['name']; ?></strong>
                            </h4>
                            <span class="sub-text"> <?php echo $cat['description']; ?> </span>
                        </div>
                    </div>
                </div>
            <?php } ?>


            
        </div>
    </div>
</section>