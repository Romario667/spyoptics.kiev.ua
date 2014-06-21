<!-- mobile/sunglasses page
 -
 -	 Shows sunglasses
 -
-->

<!-- Initiate JS touch controls -->
	<script src="<?=JS?>cart/CartAjax.js"></script>
	<script src="<?=TOOLS?>jquery-flip/jquery.flip.min.js"></script>
	<script src="<?=JS?>mobile/ShopControls.js"></script>
	<script>
		$(document).ready(function() {
			(new ShopControls).init();
			var cartAjax = new CartAjax();
			cartAjax.initListeners({
				cartId: "cart-view",
				removeItemButtonClass: "removeItem"
			});
		});
	</script>
<!-- ------------------------- -->

<link href="<?=CSS?>mobile/pages/sunglasses.css" rel="stylesheet" type="text/css" />

<div id="sunglasses-page">
	<div>
		Нажмите на очки, чтобы добавить/убрать очки из корзинки. <br />
        Нажмите на кнопку-корзинку вверху страницы, когда определитесь с выбором.
	</div>
	<div class="sunglasses">
        <!-- Ken Block Helm -->
		<?php foreach($sunglasses as $sunglass): ?>
            <?php if($sunglass['model'] == 'Ken Block Helm'): ?>
                <div class="sunglassesImgContainer" id="<?=$sunglass['id']?>" >
                    <img
                        src="<?=IMG?>mobile/pages/shop/inCart.svg" 
                        class = "isInCartMark"
                        <?php if($sunglass['inCart']): ?>
                            style = "display: inline-block";
                        <?php endif; ?>
                    />
                    <img class="sunglasses" src="<?=IMG.$sunglass['mini_img_path']?>" />
                </div>
            <?php endif; ?>
		<?php endforeach; ?>
        <!-- Flynn -->
		<?php foreach($sunglasses as $sunglass): ?>
            <?php if($sunglass['model'] == 'Flynn'): ?>
                <div class="sunglassesImgContainer" id="<?=$sunglass['id']?>" >
                    <img
                        src="<?=IMG?>mobile/pages/shop/inCart.svg" 
                        class = "isInCartMark"
                        <?php if($sunglass['inCart']): ?>
                            style = "display: inline-block";
                        <?php endif; ?>
                    />
                    <img class="sunglasses" src="<?=IMG.$sunglass['mini_img_path']?>" />
                </div>
            <?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>

