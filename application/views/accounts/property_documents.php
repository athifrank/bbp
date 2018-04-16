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
<?php  $this->load->view('accounts/pages/head'); ?>
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
    	<div class="ptitle">Manage news</div>
    	<div class="pcontent">
                <div class="display_msg">
                <?php
				/* 
				    $run->error();
					$a=$_REQUEST['a'];
					if($a == 'kii') echo '<div id="h1" class="red">* All fields are required</div>';
		  			if($a == 'i10') echo '<div id="h1" class="red">Input file not selected</div>';
					if($a == 'i11') echo '<div id="h1" class="red">The file you attempted to upload is not allowed</div>';
					if($a == 's11') echo '<div id="h1" class="red">The file you attempted to upload is too large</div>';
					if($a == 'd11') echo '<div id="h1" class="red">You cannot upload to the specified directory, please CHMOD it to 777.</div>';
					if($a == 'e12') echo '<div id="h1" class="red">Error: check the file and try again!</div>';
					if($a == 'k10') echo '<div id="h1" class="gre">One new document added to the list</div>';
					if($a == 'kie') echo '<div id="h1" class="gre">One document deleted from the list</div>';
					if($a == 'qne') echo '<div id="h1" class="gre">Server busy Please try again!</div>'; */
				?>
				<div id="h1" class="red"><?php echo $this->session->flashdata('all');?></div>
				<div id="h2" class="red"><?php echo $this->session->flashdata('one');?></div>
                <div id="h3" class="red"><?php echo $this->session->flashdata('err');?></div>
				 <div id="h4" class="red"><?php echo $this->session->flashdata('del');?></div>
				<div id="h4" class="red"><?php echo $this->session->flashdata('server');?></div>
                </div>
                <form action="<?=site_url();?>property_documents_admin/upload_doc" method="post" enctype="multipart/form-data">
			    <table width="980">
        		<tr> 
                  <td width="400"><input type="text" style="width:380px;" name="tit"
            		value="Document Title" 
					onBlur="if(this.value=='')this.value='Document Title'" 
					onfocus="if(this.value=='Document Title')this.value=''" /></td>

                  <td width="500">
						<input type="file" name="userfile" id="file"/><input type="hidden" name="page" value="1" >
                  </td>
                  </tr>
                  <tr>
                    <td height="40" width="152"><input type="submit"  value="Save" /> <input type="reset"  value="Reset" /></td>
              </tr>
             </table>
          </form>
          
          <table width="980" class="link">
                    	<tr>
                        	<td class="th" width="30">S.No.</td>
                            <td class="th" width="650">Document</td>
                            <td class="th" width="100">Created date</td>
                            <td class="th" width="100" colspan="3">Manage</td>
                        </tr>
                        <?php
						/* 
							$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
							$page = ($page == 0 ? 1 : $page);
							$perpage = 15;//limit in each page
							$startpoint = ($page * $perpage) - $perpage; 
                            $run->db_open();
                            $query = mysql_query("SELECT * FROM documents order by id desc LIMIT $startpoint,$perpage"); */
							
                            $no =$query->num_rows();
                            if(empty ($no))
                            {
                                echo '<tr><td class="td" colspan="6">No records found</td>';
                            }
							$sno = 1;
                            $ro=$query->result_array();
							foreach($ro as $row)
                            {
                                $id=$row['id'];
								$tit=$row['tit'];
								$fname=$row['fname'];
                                $date=$row['date'];
					
								
                                echo '<tr><td class="td" width="50">'.$sno.'</td>
                                      <td class="td" width="650"><a href="'.base_url().'savefiles/'.$fname.'">'.$tit.'</a></td>
									  <td class="td" width="100">'.$date.'</td>
                                      <td class="td" width="50"><a href="'.site_url().'property_documents_admin/edit_document/'.$id.'"><img src="'.base_url().'assets/images/edit.png" title="Edit Document" /></a></td>
                                      <td class="td" width="50"><a href="'.site_url().'property_documents_admin/del_document/'.$id.'"><img src="'.base_url().'assets/images/delete.png" title="Delete Document"/></a></td></tr>';
								$sno++;
                            }
                          
                          ?>
                    </table>
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
