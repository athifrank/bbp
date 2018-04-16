$(
	function () {
		$( "#left12" ).imageScroller( {speed:'5000',loading:'<div style="width:50px; height:50px; margin:10px auto;"><img src="./images/loading.gif" style="width:50px; height:50px;" /></div>'} );
		
		$( "#right" ).imageScroller( {speed:'4000', direction:'right'} );
		
		$( "#top" ).imageScroller( {direction:'top'} );

		$( "#bottom" ).imageScroller( {speed:'3500', direction:'bottom'} );
	}
)