<?php
#+#+# @author : Johnson Arokiaraj #+#+#
#+#+# @weburl : www.jcode.in  #+#+#+#+#

class jcode 
{

	function error() { #@ To avoid warning message
		error_reporting(0);
		@ini_set(‘display_errors’, 0);
	}

	function dates() { #@ Date function
		date_default_timezone_set('Asia/Kolkata'); #Time zone
		$date_array=getdate();
		#global variable
		global $date,$today,$day,$mon,$year,$time;
		#date 01-12-2011
		$date=$date_array['mday']."-".$date_array['mon']."-".$date_array['year']; #-> $date
		#wday Monday
		$wday=$date_array['weekday']; #-> $wday
		#day 01
		$day=$date_array['mday']; #-> $day
		#mon 12
		$mon=$date_array['mon']; #-> $mon
		#year 2011
		$year=$date_array['year']; #-> $year
		#00:00
		$time=date("H:i:s", time()); #-> $time
	}

	function user_login_check() { #@ User login check 	
		session_start();
		if (!(isset($_SESSION['user']) && $_SESSION['user'] != '')) 
		{
			header ("Location: page_expired.php");
		}
	}
	
	function admin_login_check() { #@ Admin login check 	
		session_start();
		if (!(isset($_SESSION['admin']) && $_SESSION['admin'] != '')) 
		{
			header ("Location: page_expired1.php");
		}
	}
	
/* 
	function db_open() { #@ Database Connection
	 #Hostname
	 $host='bbp2.db.5893251.hostedresource.com';
	 #DB_name
	 $dbnm='bbp2'; 
	 #DB_username
	 $user='bbp2';
	 #DB_username
	 $pass='lWPl04zJVSOQ'; 
	 global $con;
	 $con=mysql_connect($host,$user,$pass) or die('Connection problem check Database Server');
	 mysql_select_db($dbnm ,$GLOBALS['con']) or die('Database problem Cant open database');
	} */
	
	function db_close() { #@ Database Connection close
	    extract($GLOBALS);
		mysql_close($con);
	}
	
	function random_key() #@ Generate Random Password
	{
		$chars = "abcdefghijkmnopqrstuvwxyz023456789";
		srand((double)microtime()*1000000);
		$i = 0;
		$pass = '' ;
		while ($i <= 7) 
		{
			$num = rand() % 33;
			$tmp = substr($chars, $num, 1);
			$pass = $pass . $tmp;
			$i++;
		}
		return $pass;
	}
	
	
	function pagination($tbl_name,$limit,$path,$where) #@ Pagination
	{
		$query = "SELECT COUNT(*) as num FROM $tbl_name $where";
		$row = mysql_fetch_array(mysql_query($query));
		$total_pages = $row['num'];
	
		$adjacents = "2";
	
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
		$page = ($page == 0 ? 1 : $page);
	
		if($page) $start = ($page - 1) * $limit;
		else $start = 0;
	
		$sql = "SELECT id FROM $tbl_name LIMIT $start, $limit";
		$result = mysql_query($sql);
	
		$prev = $page - 1;
		$next = $page + 1;
		$lastpage = ceil($total_pages/$limit);
		$lpm1 = $lastpage - 1;
	
		$pagination = "";
		if($lastpage > 1)
		{   
			$pagination .= "<div class='pagination'>";
			if ($page > 1)
			$pagination.= "<a href='".$path."page=$prev'>&#171; previous</a>";
			else
			$pagination.= "<span class='disabled'>&#171; previous</span>";   
	
			if ($lastpage < 7 + ($adjacents * 2))
			{   
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)	$pagination.= "<span class='current'>$counter</span>";
					else $pagination.= "<a href='".$path."page=$counter'>$counter</a>";                   
				}
			}
			elseif($lastpage > 5 + ($adjacents * 2))
			{
				if($page < 1 + ($adjacents * 2))       
				{
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
					{
						if ($counter == $page)	$pagination.= "<span class='current'>$counter</span>";
						else	$pagination.= "<a href='".$path."page=$counter'>$counter</a>";                   
					}
					$pagination.= "...";
					$pagination.= "<a href='".$path."page=$lpm1'>$lpm1</a>";
					$pagination.= "<a href='".$path."page=$lastpage'>$lastpage</a>";       
				}
				elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
					$pagination.= "<a href='".$path."page=1'>1</a>";
					$pagination.= "<a href='".$path."page=2'>2</a>";
					$pagination.= "...";
					for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page) $pagination.= "<span class='current'>$counter</span>";
						else $pagination.= "<a href='".$path."page=$counter'>$counter</a>";                   
					}
					$pagination.= "..";
					$pagination.= "<a href='".$path."page=$lpm1'>$lpm1</a>";
					$pagination.= "<a href='".$path."page=$lastpage'>$lastpage</a>";       
				}
				else
				{
					$pagination.= "<a href='".$path."page=1'>1</a>";
					$pagination.= "<a href='".$path."page=2'>2</a>";
					$pagination.= "..";
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page) $pagination.= "<span class='current'>$counter</span>";
						else $pagination.= "<a href='".$path."page=$counter'>$counter</a>";                   
					}
				}
			}
			if ($page < $counter - 1) $pagination.= "<a href='".$path."page=$next'>next &#187;</a>";
			else $pagination.= "<span class='disabled'>next &#187;</span>"; $pagination.= "</div>\n";       
		}
		return $pagination;
	}
	
	#Money format with seperator
	function money($number)
	{  
	    //$number = 1234.56;
		setlocale(LC_MONETARY, "en_IN");
        $money = money_format("%.2n", $number);
		#number_format($number);
		return $money;
	}
	
	#Replace Charcter
	function re_char ($text)
	{
		return $text = str_replace("\'", "&#39;", $text);
	}
	
	#Change first character in upper case 
	function uc_first($ucword)
	{
		return $ucword = ucwords(strtolower($ucword));
	}
	
	#Change all character in lower case 
	function lc_all($lcword)
	{
		return $lcword = strtolower($lcword);
	}
	
	#Character limit in a string
	function cut_string($string, $len)
	{
		$s1=strlen($string);
		if($s1 > $len) 
		$string=substr($string, 0, $len-3)."...";
		return $string;
		
	}
	
	#@ String br
	function string_br($string)
	{
		$string = $string.".";
		$string = str_replace(',', ',<br>', $string);
		return $string;
	}
	
	function code_mail($name,$mail,$code)
	{
		$url = 'http://www.bangalorebestproperty.com/accounts/activation.php?id='.$mail.'&code='.$code;
		$email ='noreply@bangalorebestproperty.com';
		$to    = $mail;
		$subject  = 'Account activation - bangalorebestproperty.com';
		$message  = '
<span style="font-size:24px; font-weight:bold;"><span style="color:#eb7200;">Bangalore</span> <span style="color:#4c9903;">Best</span> 
<span style="color:#0173e6;">Property</span></span><br /><hr  style="width:500px; float:left; border:#0173e6 2px solid;"/>
<p><br />Dear '.$name.', </p>
<p>Thank you for choosing us</p>
<p> To confirm your registration, you need to activate your account by clicking the activation link given below</p>
<p>Click here  to <a href="'.$url.'">activate</a> your account</p>
<p>Incase   any issues regarding account activation. click <a href="http://www.bangalorebestproperty.com/accounts/activation_mail.php">here</a> to resend activation link </p>
<p style="margin-top:30px;">Regards ,<br />Bangalorebestproperty.<br /><a href="http://www.bangalorebestproperty.com/">www.bangalorebestproperty.com</a></p>';
		$headers = "From: " . $email . "\r\n";
		$headers .= "Reply-To: ". $email . "\r\n";
		$headers .= "mailed-by: ". $email . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					
		$sent=mail($to, $subject, $message, $headers);
	}
}

$run = new jcode;
?>