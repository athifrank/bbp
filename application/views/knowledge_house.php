<?php
// require_once('accounts/action/jcode.php'); 
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
            <div class="pcontent lh">
             <?php
	     echo '<table border="0" width="800" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#cccccc">'; 
		
		$getimg=$getimages->result_array();
		$countRows = $getimages->num_rows(); 
		$i = 0; 
		if ($countRows > 0) 
		{ 
		foreach($getimg as $rowimages)
		{
		$title=$rowimages['title'];
		$img=$rowimages['img'];
		$img1=$img;
		if ($i % 3 == 0) echo ($i > 0? '</tr>' : '') . '<tr>'; 
		echo '<td>';
		echo '<table  width="200" align="center" cellpadding="0" cellspacing="1" >
		<tr bgcolor="#ffffff">
		<td align="center">';
		echo'<a href="'.site_url().'knowledge_house/view/' . $rowimages['id'] . '">';
		
		echo '<h5 class="text_available1">';
		echo  '<img src="'.base_url().''.$img1.'" height="145" width="200"/ >';
		echo "<br />";
		echo $title;
		echo '</h5>';
	
		echo '</a>
		</td>
		</tr>
		<tr bgcolor="#e9e9e9">
		<td align="center">';
	
		
		
		
	
		
		echo '
		</td>
		</tr>
		</table>
		</td>'; 
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
