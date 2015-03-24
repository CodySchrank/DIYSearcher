<title>DIY SEARCHER</title>
<link rel="stylesheet" type="text/css" href="/assets/css/skeleton/normalize.css">
<link rel="stylesheet" type="text/css" href="/assets/css/skeleton/skeleton.css">
<link rel="stylesheet" type="text/css" href="/assets/css/header.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<script type="text/javascript">
	$(document).ready(function(){

		$('#search').hover(function(){
			$(this).prev().css('visibility', 'visible').focus();
		},function(){
			console.log('lost focus');
		}).click(function(){
			$.post($(this).parent().attr('action'),$(this).parent().serialize());
		}).prev().focusout(function(){
			$(this).css('visibility', 'hidden');
		});
		
	});
</script>
