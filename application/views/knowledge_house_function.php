<?php
	include('accounts/action/jcode.php');
	
	function folder_display()	 
	{

		echo '<table border="1">'; 
		$getimages =  mysql_query("SELECT * from knowledge_house");
		$countRows = mysql_num_rows($getimages); 
		$i = 0; 
		if ($countRows > 0) 
		{ 
		while ($rowimages = mysql_fetch_assoc($getimages)) 
		{
		$title=$rowimages['title'];
		if ($i % 4 == 0) echo ($i > 0? '</tr>' : '') . '<tr>'; 
		echo '<td>';
		echo'<a href="view_image.php?gid=' . $rowimages['gid'] . '">';
		echo '<font color="white" size="2" class="gallery_image">';
		echo $title;
		echo '</font>';
		echo '</a></td>'; 
		if ($i == $countRows - 1) 
		echo '</tr>'; 
		$i++; 
		} 
		} 
		echo '</table>';

	
	}
?>