        <div class="username">User : <?php echo $_SESSION['name'];?></div>
        <a href="<?=site_url();?>index" >Home Page</a>|
        <a href="<?=site_url();?>login/user_home" >User Home</a>|
        <a href="<?=site_url();?>add_property" >Add Property</a>|
        <a href="<?=site_url();?>manage_properties" >Manage Properties</a>|
        <a href="<?=site_url();?>update_profile" >Update Profile</a>|
        <a href="<?=site_url();?>change_pass">Change password</a>|
        <a href="<?=site_url();?>logout">Logout</a>