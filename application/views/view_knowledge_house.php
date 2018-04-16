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
        	<div class="ptitle">Knowledge House<input type="button"  onclick="history.back();"/></div>           	
            <div class="pcontent1">
             <?php
		echo '<table border="0">'; 
		$getimg=$getimages->result_array();
		$countRows =$getimages->num_rows(); 
		$i = 0; 
		if ($countRows > 0) 
		{ 
		foreach($getimg as $rowimages)
		{ 
		if ($i % 4 == 0) echo ($i > 0? '</tr>' : '') . '<tr>';
        	
		echo '<td>';	
		echo'<div class="pcontent1">
		<p class="sub_title">';
		echo $title=$rowimages['title'];
		echo'<br />';
		echo '</p>';
		echo '<font style="font-weight:normal;text-align:left;font-size:12px;font-family: Arial, Helvetica, sans-serif;color:#0173e6;">';
		echo'<br />';
		echo $discription=$rowimages['discription'];
		echo '</font>';
		echo '<font style="font-weight:normal;text-align:left;font-size:12px;font-family: Arial, Helvetica, sans-serif">';
		echo $content=$rowimages['content'];
		echo '</font>';
		echo '</div>';
		
		echo'</td>'; 
		if ($i == $countRows - 1) 
		echo '</tr>'; 
		$i++; 
		} 
		} 
		echo '</table>'; 
        ?>
				
            </div>
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






















		
		