<section class="features4 cid-sF28YHzl1m" id="features4-6">
    <div class="container">
        <div class="mbr-section-head">
            <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                <strong>Featured Businesses</strong>
            </h4>
        </div>
        <div class="row mt-4">

            <?php foreach($business->recentBusinesses() AS $biz){ ?>
                <div class="item features-image сol-12 col-md-6 col-lg-4">
                    <div class="item-wrapper">
                        <div class="item-img">
                            <a href="/<?php echo $biz['slug']; ?>" style="color:#333">
                                <img src="assets/images/businesses/<?php echo $biz['image']; ?>" alt="<?php echo $biz['name']; ?>" title="<?php echo $biz['name']; ?>">
                            </a>
                        </div>
                        <div class="item-content" align="center">
                            <div align="center"> 
                                <a href="category/<?php echo $category->getCategory($biz['category'])['slug']; ?>">
                                    <?php  echo "<div style='width: 50px; height:50px; border-radius:50%; background:url(".$rootURL."assets/images/logos/".$biz['logo']."); background-size:cover; background-position:center center'></div>"; ?>
                                    
                                </a>
                            </div>
                            <div class="mt10">
                                <a href="/<?php echo $biz['slug']; ?>" style="color:#333"> <h5><strong><?php echo $biz['name']; ?></strong></h5> </a>
                                <a href="category/<?php echo $category->getCategory($biz['category'])['slug']; ?>"> 
                                    <h6 class="key-text"><?php echo $category->getCategory($biz['category'])['name']; ?></h6>
                                </a>
                                <p>
                                    <i class="fas fa-map-marker key-text"></i> <?php echo $biz['address']; ?>
                                </p>
                                <p>
                                    <a href="tel:<?php echo $biz['phone']; ?>"><i class="fas fa-mobile key-text"></i> <?php echo $biz['phone']; ?> </a>
                                </p>

                                <hr>
                                
                                <div class="mb10">
                                    <?php echo $review->showStars($biz['id']); ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>