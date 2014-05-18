<!-- css is included via php so that php variables can be used inside css file -->
<style> <?php $this->load->view('style/pages/main.css') ?> </style>

<!-- flex slider sources -->
	<!-- including jquery -->
	<script type="text/javascript">
	if(typeof jQuery == 'undefined'){
		document.write('<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></'+'script>');
	  }
	</script>

<link rel="stylesheet" href="<?=base_url()?>plugins/flexSlider/flexslider.css" type="text/css">
<script src="<?=base_url()?>plugins/flexSlider/jquery.flexslider.js"></script>

<script type="text/javascript" charset="utf-8">
  $(window).load(function() {
    $('.flexslider').flexslider();
  });
</script>
<!-- END flex slider sources -->


<div id="page1">
	<?php
		$model = 'Flynn';
		include 'sunglassesImagesByModelSlider.php';
	?>
</div> <!-- end page1 -->

<div id="page2">
	<?php
		$model = 'Ken Block Helm';
		include 'sunglassesImagesByModelSlider.php';
	?>
</div> <!-- end page2 -->

<div id="page3">
	<div class="page-body">
		<h1>Just a hot chick</h1>
		<img src="<?=base_url()?>images/spyFlynnGirl.jpg" />
	</div>
</div> <!-- end page3 -->


<?php include 'mousewheelSliding.js'; ?>
