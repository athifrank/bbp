<?php 
/*     require_once "action/jcode.php"; 
	  $run->admin_login_check();
	  $run->error();*/
	  $_SESSION['p']=''; 
	  
	  defined('BASEPATH') OR exit('No direct script access allowed');
	  	if (!(isset($_SESSION['admin']) && $_SESSION['admin'] != '')) 
		{
			$this->load->view('accounts/page_expired1');
		}
	  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('accounts/pages/head'); ?>
<!-- Image view-->
	<script type="text/javascript" src="<?=base_url();?>assets/fancybox/jquery.min.js"></script>
	<script>!window.jQuery && document.write('<script src="<?=base_url();?>assets/js/jquery-1.4.3.min.js"><\/script>');</script>
	<script type="text/javascript" src="<?=base_url();?>assets/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

	<script type="text/javascript">
		$(document).ready(function() {
			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
				return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

		});
	</script>
</head>
<body>
<!----- Header_2 begins ----->
<div id="header_p" class="wrapper">
    <div class="logo"><img src="<?=base_url();?>assets/images/logo.png" /></div>
    <div class="menu">
		<?php  $this->load->view("accounts/pages/admin_menu"); ?>
    </div>
</div>
<!----- Header_2 ends ----->

<div id="content" class="wrapper">
  <div id="parea">
        <?php
		   /*  $a=$_REQUEST['a']; 
			$pid=$_REQUEST['i'];
			$run->db_open();
			$query = mysql_query("SELECT thumbs,tit FROM fp where pid=$pid");
			$row = mysql_fetch_array($query);
			$t=$row['thumbs'];
			$tit=$row['tit']; */
		?>
    	<div class="ptitle">Gallery - <span style="font-weight:normal; color:#000;"><?php echo $tit; ?></span> <input type="button"  onclick="window.location.href='<?=site_url();?>manage_projects'"/></div>
    	<div class="pcontent">
        <div class="display_msg">
               <?php
				/* 	if($a == 'kii') echo '<div id="h1" class="red">* All fields are required</div>';
		  			if($a == 'i10') echo '<div id="h1" class="red">Input file not selected</div>';
					if($a == 'i11') echo '<div id="h1" class="red">The file you attempted to upload is not allowed</div>';
					if($a == 's11') echo '<div id="h1" class="red">The file you attempted to upload is too large</div>';
					if($a == 'd11') echo '<div id="h1" class="red">You cannot upload to the specified directory, please CHMOD it to 777.</div>';
					if($a == 'e12') echo '<div id="h1" class="red">Error: check the file and try again!</div>';
					if($a == 'k10') echo '<div id="h1" class="gre">One new image added to the gallery</div>';
					if($a == 'kie') echo '<div id="h1" class="gre">One image deleted from the gallery</div>';
					if($a == 'dm3') echo '<div id="h1" class="red">*Select the thumbnail to update</div>';
					if($a == 'ki7') echo '<div id="h1" class="red"><img src="../images/star.gif"/> Default thumbnail changed</div>';
					if($a == 'qne') echo '<div id="h1" class="gre">Server busy Please try again!</div>'; */
					
			?>
			<div id="h1" class="red"><?php echo $this->session->flashdata('all');?></div>
			<div id="h2" class="red"><?php echo $this->session->flashdata('one');?></div>
			<div id="h3" class="red"><?php echo $this->session->flashdata('err');?></div>
			<div id="h4" class="red"><?php echo $this->session->flashdata('select');?></div>
			<div id="h5" class="red"><?php echo $this->session->flashdata('changed');?></div>
			<div id="h6" class="red"><?php echo $this->session->flashdata('del');?></div>
			<div id="h7" class="red"><?php echo $this->session->flashdata('server');?></div>
          </div>
          <br />
				 
			    <div style="margin:0 auto; width:800px;">
                <div style="margin:0 auto; width:570px;">
                <table>
                <form action="<?=site_url();?>manage_projects/upload_gallery" method="post" enctype="multipart/form-data">
                	<tr>
                        <td width="240"><input type="text" name="tit" class="tdbox" value="Title" 
					onBlur="if(this.value=='')this.value='Title'" 
					onfocus="if(this.value=='Title')this.value=''" />
						<input type = "hidden" name = "title" value = "<?php echo $tit; ?>">
                        <input type="hidden" name="pid" value="<?php echo $pid; ?>" ></td>
                    	<td width="220"><input type="file" name="userfile" id="file">
                        
                        </td>
                        <td width="50"><input type="submit" value="Upload"></td>
                        <td width="50"><input type="reset" value="Reset"></td>
                  </tr>
                  <tr><td></td><td colspan="3" height="40"><span class="hint">Only .jpg files are allowed,(Max 10Mb)</span></td></tr>
                   </form>
                  </table>
                  </div>
                  
                                   
					<table width="800">
                    	<tr>
                            <td class="th" width="50">Select</td>
                        	<td class="th" width="350">Title</td>
                            <td class="th" width="350">Filename</td>
                            <td class="th" width="50">Delete</td>
                        </tr>
                        <form action="<?=site_url();?>manage_projects/default_thumb" method="post">
						
						<?php	
							
                            //$query = mysql_query("SELECT * FROM gallery where pid=$pid");
                            $no =$query->num_rows();
                            if(empty ($no))
                            {
                                echo '<tr><td class="td" colspan="6">No records found</td>';
                            }
                            $re=$query->result_array();
							foreach($re as $row)
                            {
								$gid=$row['gid'];
								$tit=$row['tit'];	
								$fname=$row['fname'];
								
                                echo '<tr>
										<td class="td"><input type="radio" name="crop" value="'.$fname.'" width="50"/></td>
									    <td class="td" width="350">'.$tit.'</td>
                                        <td class="td" width="350">';
										if($t == $fname) echo '<img src="'.base_url().'assets/images/star.gif"/>'.$fname; else echo $fname;
								echo'</td>
										<td class="td" width="50"><a href="'.site_url().'manage_projects/del_gallery/'.$gid.'/'.$pid.'"><img src="'.base_url().'assets/images/delete.png" title="Delete"/></a></td>
                                      </tr>';
                            }
                          
                          ?>
                           
   				  </table>
                  <br />
                  <input type="hidden" value="<?php echo $pid; ?>" name="id"  />
                  <input type="submit"  value="Make default thumbnail"
                  style="background-color:#464646; width:150px; -moz-border-radius:5px; border-radius:5px; -webkit-border-radius:5px;" />
                  </form>
                  
                  
             </div>
             <div style="margin:20px auto; width:800px;">
             	<?php 
					/* $query = mysql_query("SELECT banner b FROM fp where pid=$pid");
					$row=mysql_fetch_array($query);
					$b=$row['b']; */
					if($b == 'no.jpg')
					{
						echo '<div style="width:350px; text-align:center; border:#CCCCCC 2px solid; height:80px; font-size:14px; color:#666; padding-top:20px;">Project banner not found<br> <div style="font-size:12px; margin-top:5px;">click <a href="'.site_url().'manage_projects/crop/'.$pid.'">here</a> to add banner</div></div>';
					}
					else
					{
						echo '<a rel="example_group" href="'.base_url().''.$b.'">
						<img src="'.base_url().''.$b.'" style="width:350px; height:80px; border:2px #000 solid;"></a>
						<div style="font-size:12px; margin-top:5px;">click <a href="'.site_url().'manage_projects/crop/'.$pid.'">here</a> to update banner</div>';
					}
				?>
             </div>
             
  
    </div>
   </div>
</div>
<!----- Content ends -----> 

<!----- Footer begins ----->
<div id="footer">
	<?php $this->load->view("pages/footer");?>
</div> 

</body>
</html>
