<div class="container" style="padding-top:150px; padding-bottom:100px">
    
    <div class="row">
        <div class="col-sm-8">
            <section>
                <div>
                    <h3>
                        <?php echo $biz['name']; ?>
                    </h3>
                    <p class="sub-text mt10" style="line-height:1.5">
                        <?php echo $biz['description']; ?>
                    </p>
                    <hr>
                    <div>
                        <img class="d-block w-100" src="assets/images/businesses/<?php echo $biz['image']; ?>">
                    </div>
                </div>
            </section>

            <!-- Contact Detail -->
            <section class="contacts2 cid-sF9En1w4Cl" id="contacts2-i">
                <div class="container">
                    <div class="row justify-content-center mt-4">
                        <div class="card col-12 col-md-6">
                            <div class="card-wrapper">
                                <div class="text-wrapper">
                                    <h6 class="card-title mbr-fonts-style mb-1 display-5">
                                        Phone
                                    </h6>
                                    <p class="mbr-text mbr-fonts-style display-7">
                                        <a href="tel:<?php echo $biz['phone']; ?>" class="text-primary">
                                            <?php echo $biz['phone']; ?>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card col-12 col-md-6">
                            <div class="card-wrapper">
                                <div class="text-wrapper">
                                    <h6 class="card-title mbr-fonts-style mb-1 display-5">
                                        Email
                                    </h6>
                                    <p class="mbr-text mbr-fonts-style display-7">
                                        <a href="mailto:<?php echo $biz['email']; ?>" class="text-primary">
                                            <?php echo $biz['email']; ?>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card col-12 col-md-6">
                            <div class="card-wrapper">
                                <div class="text-wrapper">
                                    <h6 class="card-title mbr-fonts-style mb-1 display-5">
                                        Address
                                    </h6>
                                    <p class="mbr-text mbr-fonts-style display-7">
                                        <?php echo $biz['address']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card col-12 col-md-6">
                            <div class="card-wrapper">
                                <div class="text-wrapper">
                                    <h6 class="card-title mbr-fonts-style mb-1 display-5">
                                        Working Hours
                                    </h6>
                                    <p class="mbr-text mbr-fonts-style display-7">
                                        <?php echo date("h:ia", strtotime($biz['work_start'])); ?> - <?php echo date("h:ia", strtotime($biz['work_end'])); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mt10">
                <hr>
                <h3 class="mt10" style="border-left:#f36128 2px solid; padding-left:10px"> Reviews </h3>

                <div>
                    <?php foreach($review->getReviews($biz['id']) AS $feedback){ ?>
                        <div class="card-review mt10">
                            <?php echo '<b>'.$feedback['name'].'</b> <br>'.$feedback['review'].' <br> '. $review->displayStars($feedback['rating']); ?>
                        </div>
                    <?php } ?>
                </div>
            </section>
            
        </div>
        <div class="col-sm-4">
            <div class="card-box mb10">
                <h3> Our Ratings </h3>
                <hr>
                <div class="mb10">
                    <?php for($i=1; $i <= round($review->stars($biz['id'])); $i++){ ?>
                        <i class="fas fa-star active-star"></i>
                    <?php } for($i=1; $i <= (5 - round($review->stars($biz['id']))); $i++){ ?>
                        <i class="fas fa-star inactive-star"></i>
                    <?php } ?>
                    <br>
                    <?php echo $review->stars($biz['id']); ?> star from <?php echo number_format($review->getReviews($biz['id'], 'count')); ?> reviews
                </div>
            </div>

            <div class="card-box mb10">
                <h3>Connect With Us</h3>
                <hr>
                <div class="social-list mt10">
                    <a target="_blank" href="#">
                        <span class="socicon-facebook socicon social-icon"></span>
                    </a>
                    <a href="#" target="_blank">
                        <span class="socicon-twitter socicon social-icon"></span>
                    </a>
                    <a href="#" target="_blank">
                        <span class="socicon-instagram socicon social-icon"></span>
                    </a>
                    <a href="#" target="_blank">
                        <span class="socicon-linkedin socicon social-icon"></span>
                    </a>  
                </div>
            </div>

            <div class="card-box mb10">
                <h3>Write a Review</h3>
                <hr>
                <div class="mt10">
                    <form action="" method="post">
                        <p>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Your Name*" required>
                        </p>
                        <p>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </p>
                        <p>
                            <textarea name="review" id="" cols="30" rows="5" class="form-control" placeholder="Write a review..."></textarea>
                        </p>
                        <p>
                            <select name="rating" id="" class="form-control">
                                <option value="">SELECT RATING</option>
                                <option value="1">1 Star</option>
                                <option value="2">2 Star</option>
                                <option value="3">3 Star</option>
                                <option value="4">4 Star</option>
                                <option value="5">5 Star</option>
                            </select>
                        </p>
                        <p>
                            <button type="submit" name="add-review" class="btn btn-secondary form-control">Submit Review</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>