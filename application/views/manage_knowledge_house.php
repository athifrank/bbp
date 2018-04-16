<?php require_once('action/jcode.php'); 
	  $run->admin_login_check();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include('pages/head.php'); ?>
</head>
<body>
<!----- Header_2 begins ----->
<div id="header_p" class="wrapper">
    <div class="logo"><img src="../images/logo.png" /></div>
    <div class="menu">
		<?php include("pages/admin_menu.php"); ?>
    </div>
</div>
<!----- Header_2 ends ----->

<div id="content" class="wrapper">
	<div id="parea">
        	<div class="ptitle">Manage Knowledge House</div>
               <div class="pcontent">
               <div class="display_msg">
                <?php
				    $run->error();
					$a=$_REQUEST['a'];
					if($a == 'qne')echo'<div class="red" id="h1">* Server busy please try later</div>';
					if($a == 'kii')echo'<div class="gre" id="h1">* One User details Removed</div>';
				?>
      			</div>
				<table width="180">
						<tr>
                        	<td class="th" width="250">
							<a href="add_knowledge_house.php">Add Knowledge House</a>
							</td>
                        </tr>
				</table>
				<br />
					<table width="980">
                    	<tr>
                        	<td class="th" width="450">Image</td>
                            <td class="th" width="350">Content</td>
                            <td class="th" width="150" colspan="3">Manage</td>
                        </tr>
						 <?php
						 	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
							$page = ($page == 0 ? 1 : $page);
							$perpage = 15;//limit in each page
							$startpoint = ($page * $perpage) - $perpage;  
                            $run->db_open();
                            $query = mysql_query("SELECT * FROM users order by id desc LIMIT $startpoint,$perpage");
                            $no = mysql_num_rows($query);
                            if(empty ($no))
                            {
                                echo '<tr><td class="td" colspan="6">No records found</td>';
                            }
                            while($row = mysql_fetch_array($query))
                            {
                                $name=$row['name'];
                                $email=$row['eid'];
                                $mobile=$row['mobi'];
								$city=$row['city'];
                                $id=$row['id'];
                                echo '<tr><td class="td" width="450">'.$name.'</td>
                                      <td class="td" width="350">'.$email.'</td>
                                      <td class="td" width="50"><a href="view_user.php?b='.$id.'"><img src="../images/view.png" title="View Details" /></a></td>
                                      <td class="td" width="50"><a href="edit_user.php?b='.$id.'"><img src="../images/edit.png" title="Edit" /></a></td>
                                      <td class="td" width="50"><a href="del_user.php?b='.$id.'"><img src="../images/delete.png" title="Delete"/></a></td></tr>';
                            }
                          
                          ?>
   				  </table>
                  <?php echo $run->pagination("users",$perpage,"manage_users.php?"); $run->db_close(); ?>		
   	  </div>
  </div>
</div>
<!----- Content ends -----> 

<!----- Footer begins ----->
<div id="footer">
	<?php include("../pages/footer.php");?>
</div> 

</body>
</html>
