<section class="menu menu2 cid-sF24s4xUj3" once="menu" id="menu2-0">
    
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="<?php echo $rootURL; ?>">
                        <img src="<?php echo $rootURL ?>assets/images/logo.png" alt="<?php echo $companyName; ?>" style="height: 3rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-7" href="<?php echo $rootURL; ?>"><?php echo $companyName ?></a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                    <li class="nav-item">
                        <a class="nav-link link text-white display-4" href="/about">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-white display-4" href="/listings">Listings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-white display-4" href="/contact">Contacts</a>
                    </li>
                </ul>
                
                <div class="navbar-buttons">
                    <?php if(!isset($userSession)){ ?>
                        <a class="btn btn-secondary display-4" href="/add-listing"> <i class="fas fa-plus"></i> &nbsp;Add Listing</a>
                    <?php } else { ?>
                        <button class="btn btn-secondary display-4" onclick="accountOptions()"> <i class="fas fa-user-circle"></i> &nbsp; My Account</button>
                        <div id="sub-menu" style="position:absolute; width:200px; background:#333; display:none" align="left"> 
                        
                            <a href="#">
                                <div style="color:#fff; border-bottom:#777 thin solid" class="w100 p10"> <i class="fas fa-user"></i> &nbsp; My Profile </div>
                            </a>
                            <a href="/my-listings">
                                <div style="color:#fff; border-bottom:#777 thin solid" class="w100 p10"> <i class="fas fa-list"></i> &nbsp; My Listings </div>
                            </a>
                            <a href="/add-listing">
                                <div style="color:#fff; border-bottom:#777 thin solid" class="w100 p10"> <i class="fas fa-plus"></i> &nbsp; Add Listing </div>
                            </a>
                            <a href="/logout">
                                <div style="color:#fff; border-bottom:#777 thin solid" class="w100 p10"> <i class="fas fa-sign-out-alt"></i> &nbsp; Logout </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>
</section>

<script>
    const accountOptions = () => {
        $("#sub-menu").slideToggle('fast');
    }
</script>