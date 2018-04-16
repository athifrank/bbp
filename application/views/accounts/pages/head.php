<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bangalore Best Property</title>

<link href="<?=base_url();?>assets/images/favicon.png" rel="shortcut icon" />
<link href="<?=base_url();?>assets/css/style.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url();?>assets/css/portal.css" type="text/css" rel="stylesheet" />

<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.dropdownPlain.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/gen_validatorv4.js"></script>
<script type="text/javascript">
setTimeout(function() {$('#h1').fadeOut('slow');}, 3000);
setTimeout(function() {$('#h2').fadeOut('slow');}, 3000);
setTimeout(function() {$('#h3').fadeOut('slow');}, 3000);
setTimeout(function() {$('#h4').fadeOut('slow');}, 3000);
setTimeout(function() {$('#h5').fadeOut('slow');}, 6000);
setTimeout(function() {$('#h6').fadeOut('slow');}, 6000);
setTimeout(function() {$('#h7').fadeOut('slow');}, 6000);
setTimeout(function() {$('#h8').fadeOut('slow');}, 3000);

setTimeout(function() {$('#h9').fadeOut('slow');}, 3000);

setTimeout(function() {$('#h10').fadeOut('slow');}, 3000);
setTimeout(function() {$('#h11').fadeOut('slow');}, 3000);


</script>

<script type="text/javascript"><!--
		var lastDiv = "";
function showDiv(divName) {
	// hide last div
	if (lastDiv) {
		document.getElementById(lastDiv).className = "hiddenDiv";
	}
	//if value of the box is not nothing and an object with that name exists, then change the class
	if (divName && document.getElementById(divName)) {
		document.getElementById(divName).className = "visibleDiv";
		lastDiv = divName;
	}
}
//-->
</script>

<!-- Ajax Autoload-->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/jquery-ui-1.8.2.custom.css" />
  <script type="text/javascript" src="<?=base_url();?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?=base_url();?>assets/js/jquery-ui-1.8.2.custom.min.js"></script> 
  <script> 
  jQuery(document).ready(function(){
			$('#location_list').autocomplete({source:'action/suggest_location.php', minLength:1});
		});
		setTimeout(function() {$('#h1').fadeOut('slow');}, 5000);
  </script>
<script type="text/javascript"> 
			$(document).ready(function(){ 
		    	$("#item_select").change(function() 
		    	{ 
					var s_item = $("#item_select").val();
					if (s_item == 'Apartment' || s_item == 'Residential House' || s_item == 'Villappartment' || s_item == 'Villas' || s_item == 'Row House')
						$('.bhk').show();
					else
					$('.bhk').hide();
				}); 
		});
		</script> 
  <style>.bhk{display:none;}</style>

