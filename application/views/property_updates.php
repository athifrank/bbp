<?php 
//require_once('accounts/action/jcode.php'); 
	defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include('pages/head.php')?>
</head>
<body>
<?php include('pages/header.php')?>
<!----- Banner begins -----> 
<div id="content" class="wrapper">
 <div id="property_result" class="left">
        	<div class="ptitle">Property Updates<input type="button"  onclick="history.back();"/></div>           	
            	<ul class="pupdates">
				<?php
				/* 			$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
							$page = ($page == 0 ? 1 : $page);
							$perpage = 10;//limit in each page
							$startpoint = ($page * $perpage) - $perpage; 
                            $run->db_open();
                            $query = mysql_query("SELECT * FROM updates order by id desc LIMIT $startpoint,$perpage");
                            $no = mysql_num_rows($query);
							$run->error(); */
                            if(empty ($pro_up))
                            {
                                echo '<li>No records found</li>';
                            }
                            foreach($pro_up as $row)
                            {
                                $id=$row['id'];
                                $type=$row['type'];
								$msg=$row['msg'];
                                $date=$row['date'];
								$link=$row['link'];
					
								
                                echo '<li>';
									  if(!empty($link)) echo'<a href="'.$link.'" target="_blank">'.$msg.'</a></li>';
									  else echo $msg.'</li>';
                            }
                          
                          ?>
                    </ul>
                    <?php // echo $run->pagination("updates",$perpage,"manage_updates.php?",''); $run->db_close(); ?>	
      </div>
      <div class="right">
	<?php include("pages/ads.php");?> 
  </div>
  <div class="clear"></div>
</div>
</div>
<!----- Content ends -----> 

<!----- Footer begins ----->
<div id="footer">
	<?php include("pages/footer.php");?>
</div> 

</body>
</html>
