<section class="header6 cid-sF25fTWg7t mbr-fullscreen" id="header6-2">
    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);"></div>

    <div class="align-center container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <h1 class="mbr-section-title mbr-fonts-style mbr-white mb-3 display-1"><strong>UISB Business Directory </strong></h1>
                <p class="mbr-text mbr-white mbr-fonts-style display-7"> Search for anything you want from a UISB Professional! </p>
                <form action="/search" method="post">
                    <div class="row">
                        <div class="col-sm-6 mb10">
                            <input type="text" name="search" id="search" class="form-control" placeholder="Service, Product or Business name" />
                        </div>
                        <div class="col-sm-3 mb10">
                            <select name="location" id="location" class="form-control">
                                <?php 
                                    foreach($config->activeStates() AS $state){
                                        ($state['state_name'] == 'Lagos') ? $selected = "selected" : $selected  = "";
                                        echo "<option value='".$state['state_name']."' ".$selected.">".$state['state_name']." </option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-3 mb10">
                            <button type="submit" class="btn btn-secondary form-control"> Search </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>