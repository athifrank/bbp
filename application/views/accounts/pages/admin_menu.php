	 <div class="username">User : <?php echo $_SESSION['admin_name'];?></div>
     <ul class="dropdown">
            <li><a href="<?=site_url();?>admin/logout">Logout</a></li>
            <li><a href="<?=site_url();?>change_pass1">Change password  |</a></li>
            <li><a href="#">Manage Homepage  |</a>
        		<ul class="sub_menu">
        			 <li><a href="<?=site_url();?>manage_location" >Manage Location</a></li>
        			 <li><a href="<?=site_url();?>manage_thumbnails" >Manage Thumbnails</a></li>
        			 <li><a href="<?=site_url();?>manage_updates" >Manage Updates</a></li>
                     <li><a href="<?=site_url();?>manage_news" >Manage news</a></li>
                     <li><a href="<?=site_url();?>property_documents_admin" >Property Documents</a></li>
                     <li><a href="<?=site_url();?>featured_projects" >Featured Projects</a></li>
					 <li><a href="<?=site_url();?>manage_knowledge_house" >Knowledge House</a></li>
        			
        		</ul>
        	</li>
            <li><a href="<?=site_url();?>manage_users" >Manage Users  |</a></li>
            <li><a href="<?=site_url();?>users_properties" >User Properties  |</a></li>
            <li><a href="<?=site_url();?>admin_properties" >Admin Properties  |</a></li>
        	<li><a href="<?=site_url();?>add_property1" >Add Properties  |</a></li>
            <li><a href="<?=site_url();?>admin/home" >Admin Home  |</a></li>
            <li><a href="<?=site_url();?>index" >Home Page |</a></li>
        
        </ul>