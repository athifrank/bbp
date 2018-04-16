<?php 
//require_once('accounts/action/jcode.php'); 
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('pages/head')?>
</head>
<body>
<?php $this->load->view('pages/header')?>
<!----- Banner begins -----> 
<div id="content" class="wrapper">
 <div id="property_result" class="left">
        	<div class="ptitle">Property Documents<input type="button"  onclick="window.location.href='index.php'"/></div>           	
            	<ul class="pupdates">
				<?php

                            $no =$query->num_rows();
                            if(empty ($no))
                            {
                                echo '<li>No records found</li>';
                            }
							$ro = $query->result_array();
                            foreach($ro as $row)
                            {
                                $tit=$row['tit'];
								$fname=$row['fname'];
                                $date=$row['date'];
					
                                echo '<li><a href="'.base_url().'savefiles/'.$fname.'" target="_blank">'.$tit.'</a></li>';
                            }
                          
                          ?>
                    </ul>
      </div>
      <div class="right">
	<?php $this->load->view("pages/ads");?> 
  </div>
  <div class="clear"></div>
</div>
</div>
<!----- Content ends -----> 

<!----- Footer begins ----->
<div id="footer">
	<?php $this->load->view("pages/footer");?>
</div> 

</body>
</html>
