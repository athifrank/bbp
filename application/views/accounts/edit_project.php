<?php 
/*       require_once('action/jcode.php'); 
	  $run->admin_login_check(); */
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
<script type="text/javascript" src="<?=base_url();?>assets/js/gen_validatorv4.js"></script>
<!-- Ajax Autoload-->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/jquery-ui-1.8.2.custom.css" />
  <script type="text/javascript" src="<?=base_url();?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?=base_url();?>assets/js/jquery-ui-1.8.2.custom.min.js"></script> 
  <script> 
  jQuery(document).ready(function(){
			$('#location_list').autocomplete({source:'<?=site_url();?>suggest_location', minLength:1});
		});
		setTimeout(function() {$('#h1').fadeOut('slow');}, 5000);
  </script>

<!-- Load TinyMCE -->
<script type="text/javascript" src="<?=base_url();?>assets/js/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript">
	$().ready(function() {
		$('textarea.tinymce').tinymce({
			// Location of TinyMCE script
			script_url : '<?=base_url();?>assets/js/tiny_mce/tiny_mce.js',

			// General options
			theme : "advanced",
			plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

			// Theme options
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
			theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
			theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,

			// Example content CSS (should be your site CSS)
			content_css : "../css/content.css",

			// Drop lists for link/image/media/template dialogs
			template_external_list_url : "lists/template_list.js",
			external_link_list_url : "lists/link_list.js",
			external_image_list_url : "lists/image_list.js",
			media_external_list_url : "lists/media_list.js",

			// Replace values for the template plugin
			template_replace_values : {
				username : "Some User",
				staffid : "991234"
			}
		});
	});
</script>
<style>
#myform_errorloc li{ list-style:none;}
</style>
<!-- /TinyMCE -->
</head>
<body>
<!----- Header_2 begins ----->
<div id="header_p" class="wrapper">
    <div class="logo"><img src="<?=base_url();?>assets/images/logo.png" /></div>
    <div class="menu">
		<?php $this->load->view("accounts/pages/admin_menu"); ?>
    </div>
</div>
<!----- Header_2 ends ----->

<div id="content" class="wrapper">
  <div id="parea">
    	<div class="ptitle">Add Projects <input type="button"  onclick="window.location.href='<?=site_url();?>manage_projects'"/></div>
    	<div class="pcontent">
                <div class="display_msg">
                <div id="myform_errorloc" class="red"></div>
                <?php
				/*     $run->error();
					$a=$_REQUEST['a'];
					if($a == 'kie')echo'<div class="gre" id="h1">* Project Updated</div>';
					if($a == 'qne')echo'<div class="red" id="h1">* Server busy please try later</div>'; */
					
				?>
				<div class="gre" id="h1"><?php echo $this->session->flashdata('up');?></div>
				<div class="gre" id="h2"><?php echo $this->session->flashdata('server');?></div>
                </div>
                
          		<div style="width:750px; margin:0 auto;">
                <form action="<?=site_url();?>manage_projects/edit_action" method="post" name="myform" id="myform">
			    <table width="750" height="500" align="center">
                <?php
					/* $id=$_REQUEST['b'];
					$run->db_open();
		 			$query = mysql_query("SELECT * FROM fp where pid=$id");
					$run->db_close();
		 			$row = mysql_fetch_array($query); */
					foreach($ro as $row){
					$tit=$row['tit'];
					$loc=$row['loc'];
					$ptype=$row['ptype'];
					$text=$row['text'];
				?>
        		<tr>
                  <td width="100" class="tdname">Project title*</td>
                   <td ><input type="text" style="width:600px;" name="tit" class="tdbox" value="<?php echo $tit; ?>" /></td>
                  </tr>
                  
                  <tr>
                  	<td class="tdname">Location*</td>
                  	<td><input type="text" class="tdbox" id="location_list" name="loc" style="width:600px;" value="<?php echo $loc; ?>"/></td>
                  </tr>
                  
                  <tr>  
                    <td class="tdname">Property Type*</td>
                  	<td ><select name="ptype" class="tdbox" style="width:600px;">
                        <option value="Apartment" <?php if($ptype == 'Apartment') echo 'selected="selected"'; ?> >Apartment</option>
                        <option value="Land" <?php if($ptype == 'Land') echo 'selected="selected"'; ?>>Land</option>
                        <option value="Row House" <?php if($ptype == 'Row House') echo 'selected="selected"'; ?>>Row House</option>
                        <option value="Villappartment" <?php if($ptype == 'Villappartment') echo 'selected="selected"'; ?>>Villappartment</option>
                        <option value="Villas" <?php if($ptype == 'Villas') echo 'selected="selected"'; ?>>Villas</option>
                        <option value="Commercial Property" <?php if($ptype == 'Commercial Property') echo 'selected="selected"'; ?>>Commercial Property</option>
                        <option value="Residential House" <?php if($ptype == 'Residential House') echo 'selected="selected"'; ?>>Residential House</option>
          				</select>
                    </td> 
                  </tr>
                  

                  
                  <tr>
                    <td class="tdname" colspan="5">Page Content*</td>
                  </tr>
                  <tr>
                  	<td colspan="2"><textarea id="elm1" name="text" style="width: 700px; height: 300px;" class="tinymce">
                    <?php echo $text; ?></textarea>
                    </td>
                    <input type="hidden" name="pid" value="<?php echo $id; ?>" />
                  </tr>
                
                  <tr>
                  <td colspan="2" height="40"><input type="submit"  value="Add" /> <input type="reset"  value="Reset" /></td>
                  </tr>
					<?php } ?>
             </table>
         	 </form>
        </div> 
        <br /><br />  
    </div>
          
   <div class="clear"></div>
   
   </div>
</div>
<!----- Content ends -----> 

<!----- Footer begins ----->
<div id="footer">
	<?php $this->load->view("pages/footer"); ?>
</div> 
<script language="JavaScript" type="text/javascript" xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("myform");
  frmvalidator.EnableOnPageErrorDisplaySingleBox();
  frmvalidator.EnableMsgsTogether();
  
  frmvalidator.addValidation("tit","req","Project title is required");
  frmvalidator.addValidation("loc","req","Location is required");   
  frmvalidator.addValidation("text","req","Page content is required");
  
//]]>
</script>
</body>
</html>
