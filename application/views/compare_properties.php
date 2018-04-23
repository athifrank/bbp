<?php
	/* 	$c=$_REQUEST['c'];
		$i=$_REQUEST['i'];
		$page=$_REQUEST['page'];
		if(empty($i))$i = 1;
		$cn = count($c);
		if(empty($c) || $cn == 1)
		header("Location: $page?i=$i&a=2i5");
		require_once('accounts/action/jcode.php'); */
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
 <br />
  <div id="parea">
        	<div class="ptitle">Compare Properties <input type="button"  onclick="javascript:history.back()"/></div>
            <div class="pcontent">
            	<div class="display_msg"></div>
              <div style="float:left;">
                	<table height="900" width="200">
                        <tr><td class="td" style="background:#ccc;"><div style="height:40px; width:200px; color:#000;">Project Title</div></td></tr>
                    	<tr><td class="td">Property</td></tr>
                        <tr><td class="td">Property Id</td></tr>
                        <tr><td class="td">Posted on</td></tr>
                        <tr><td class="td">Location</td></tr>
                        <tr><td class="td">Zone</td></tr>
                        <tr><td class="td">Property type</td></tr>
                        <tr><td class="td">Property from</td></tr>
                        <tr><td class="td">Area</td></tr>
                        <tr><td class="td">Price</td></tr>
                        <tr><td class="td">Authority approval</td></tr>
                        <tr><td class="td">Bank approval</td></tr>
                        <tr><td class="td">Total no. of Rooms</td></tr>
                        <tr><td class="td">No. of Bedroom</td></tr>
                        <tr><td class="td">No. of Hall</td></tr>
                        <tr><td class="td">No. of Bathrooms</td></tr>
                        <tr><td class="td">Floor number</td></tr>
                        <tr><td class="td">Car Parking</td></tr>
                        <tr><td class="td">Facing</td></tr>
                        <tr><td class="td">Latitude / Longitude</td></tr>
                        <tr><td class="td"><div style=" height:80px; width:200px;">Landmark</div></td></tr>
                        <tr><td class="td"><div style="height:80px; width:200px;">Amenities</div></td></tr>
                        <tr><td class="td"><div style="height:80px; width:200px;">Remarks</div></td></tr>
                        <tr><td class="td"><div style="height:80px; width:200px;">Name & Contact Details</div></td></tr>
                        <tr><td class="td">For more details</td></tr>
                    </table>
              </div>
          <?php 		
	  			/* $run->db_open();
				if($cn == 2)$query = mysql_query("SELECT * from properties WHERE id in ($c[0] ,$c[1])");
				else {$query = mysql_query("SELECT * from properties WHERE id in ($c[0] ,$c[1] ,$c[2])");}
				$run->db_close();
		 		while($row = mysql_fetch_array($query)) */
				foreach($com_pro as $row)
				{
				$id=$row['id'];
				$br=$row['br'];
				$tit=$row['tit'];
				$date=$row['date'];
				$loc=$row['loc'];
			    $zone=$row['zone'];
				$lmark=$row['lmark'];
				$area=$row['area'];
				$price=$row['price'];
				$aa=$row['aa'];
				$ptype=$row['ptype'];
				$pfrom=$row['pfrom'];
				$bank=$row['bank'];
				$nc=$row['nc'];
				$room=$row['room'];
				$broom=$row['broom'];
				$hall=$row['hall'];
				$troom=$row['troom'];
				$park=$row['park'];
				$floor=$row['floor'];
				$amen=$row['amen'];
				$rmark=$row['rmark'];
				$l1=$row['l1'];
				$l2=$row['l2'];
				$face=$row['face'];
				
				if($price == 0)$price = 'Contact for Price'; else $price=number_format("$price",2);
		?>
                <div style="float:left;">
                	<table height="900" width="255">
                    	<tr><td class="td" style="background-color:#CCC"><div style=" height:40px; width:250px; overflow:auto; color:#000;"><?php echo $tit;?></div></td></tr>
                    	<tr><td class="td"><?php echo $br;?></td></tr>
                        <tr><td class="td"><?php echo $id;?></td></tr>
                        <tr><td class="td"><?php echo $date;?></td></tr>
                        <tr><td class="td"><?php echo $loc;?></td></tr>
                        <tr><td class="td"><?php echo $zone;?></td></tr>
                        <tr><td class="td"><?php echo $ptype;?></td></tr>
                        <tr><td class="td"><?php echo $pfrom;?></td></tr>
                        <tr><td class="td"><?php echo $area;?></td></tr>
                        <tr><td class="td"><?php echo $price;?></td></tr>
                        <tr><td class="td"><?php echo $aa;?></td></tr>
                        <tr><td class="td"><?php echo $bank;?> </td></tr>
                        <tr><td class="td"><?php echo $troom;?></td></tr>
                        <tr><td class="td"><?php echo $broom;?></td></tr>
                        <tr><td class="td"><?php echo $hall;?></td></tr>
                        <tr><td class="td"><?php echo $troom;?></td></tr>
                        <tr><td class="td"><?php echo $floor;?></td></tr>
                        <tr><td class="td"><?php echo $park;?></td></tr>
                        <tr><td class="td"><?php echo $face;?></td></tr>
                        <tr><td class="td"><?php echo $l1.','.$l2;?></td></tr>
                        <tr><td class="td"><div style=" height:80px; width:250px; overflow:auto;"><?php echo str_replace(',', ',<br>', $lmark);//echo $run->string_br($lmark);?></div></td></tr>
                        <tr><td class="td"><div style="height:80px; width:250px; overflow:auto;"><?php echo str_replace(',', ',<br>', $amen);//echo $run->string_br($amen);?></div></td></tr>
                        <tr><td class="td"><div style="height:80px; width:250px; overflow:auto;"><?php echo str_replace(',', ',<br>', $rmark);//echo $run->string_br($rmark);?></div></td></tr>
                        <tr><td class="td"><div style="height:80px; width:250px; overflow:auto;"><?php echo str_replace(',', ',<br>', $nc);//echo $run->string_br($nc);?></div></td></tr>
                        <tr><td class="td"><a href="<?=site_url();?>slide_property/index/<?php echo $id;?>" style="color:inherit;" target="_blank">Click here</a></td> 
                    </table>
              </div>
		<?php } ?>
    	</div>	
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
