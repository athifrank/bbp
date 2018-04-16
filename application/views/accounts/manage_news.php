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
			/* 	    $run->error();
					$a=$_REQUEST['a'];
					if($a == 'kii')echo'<div class="red" id="h1">* All fields are required</div>';
					if($a == '1ji')echo'<div class="gre" id="h1">* One Message Deleted</div>';
					if($a == 'qne')echo'<div class="red" id="h1">* Server busy please try later</div>';
					if($a == 'ki9')echo'<div class="gre" id="h1">* One Message added</div>'; */
				?>
				<div class="red" id="h1"><?php echo $this->session->flashdata('all');?></div>
				<div class="red" id="h2"><?php echo $this->session->flashdata('one');?></div>
				<div class="red" id="h3"><?php echo $this->session->flashdata('server');?></div>
                <div class="red" id="h4"><?php echo $this->session->flashdata('del');?></div>
                </div>
                <form action="<?=site_url();?>manage_news/add_news" method="post">
			    <table width="980">
        		<tr>
                  <td width="150">
                  	<select name="type"  onChange="showDiv(this.value);" style="width:140px;" >
						<option value="1">Text type</option>
						<option value="2">Link type</option>
					</select>
                  </td>
  
                  <td width="310"><input type="text" style="width:300px;" name="msg"
            		value="Property news" 
					onBlur="if(this.value=='')this.value='Property news'" 
					onfocus="if(this.value=='Property news')this.value=''" /></td>

                  <td width="500"><div id="2" class="hiddenDiv"><input type="text" style="width:300px;" name="url" 
            		value="Url" 
					onBlur="if(this.value=='')this.value='Url'" 
					onfocus="if(this.value=='Url')this.value=''" class="tdbox1"/>
                    <span style="color:#999; font-size:9px;">eg:http://www.google.com/</span>
                    </div>
                  </td>
                  </tr>
                  <tr>
                    <td height="40" width="152"><input type="submit"  value="Save" /> <input type="reset"  value="Reset" /></td>
                    <td></td>
                    <td></td>

                  
              </tr>
             </table>
          </form>
          
          <table width="980">
                    	<tr>
                        	<td class="th" width="30">S.No.</td>
                            <td class="th" width="600">Message</td>
                            <td class="th" width="100">Created date</td>
                            <td class="th" width="150" colspan="3">Manage</td>
                        </tr>
                        <?php
							/* $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
							$page = ($page == 0 ? 1 : $page);
							$perpage = 15;//limit in each page
							$startpoint = ($page * $perpage) - $perpage; 
                            $run->db_open();
                            $query = mysql_query("SELECT * FROM news order by id desc LIMIT $startpoint,$perpage"); */
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
								$msg=substr($row['msg'], 0, 85);
								$msg1=strlen($msg);
                                $type=$row['type'];
                                $date=$row['date'];
					
								if($msg1 == 85) $msg1='...'; else $msg1='';
								
                                echo '<tr><td class="td" width="50">'.$sno.'</td>
                                      <td class="td" width="600">'.$msg; echo $msg1.'</td>
									  <td class="td" width="100">'.$date.'</td>
                                      <td class="td" width="50"><a href="'.site_url().'manage_news/view_news/'.$id.'"><img src="'.base_url().'assets/images/'.$type.'.png" title="View Message" /></a></td>
                                      <td class="td" width="50"><a href="'.site_url().'manage_news/edit_news/'.$id.'"><img src="'.base_url().'assets/images/edit.png" title="Edit Message" /></a></td>
                                      <td class="td" width="50"><a href="'.site_url().'manage_news/delete/'.$id.'"><img src="'.base_url().'assets/images/delete.png" title="Delete Message"/></a></td></tr>';
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
	<?php  $this->load->view("pages/footer");?>
</div> 

</body>
</html>
