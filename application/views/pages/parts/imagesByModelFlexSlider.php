<!-- sunglasses/imagesByModelFlexSlider
 -	 FlexSlider showing sunglasses images of model specified in $model variable.
-->

	<div class="pictures">
		<div class="modelName"><?=$model?></div>
		<div class="flexslider">
			<ul class="slides">
				<?php foreach($sunglasses as $sunglass): ?>
					<?php if($sunglass['model']==$model): ?>
						<li>
							<div class="container">
								<img class="flex <?=$sunglass['css_class']?>" src="<?=IMG?><?=$sunglass['img_path']?>" />
								 <p class="flex-caption">
								<div class="priceAndCart">
									<div class="price">
										<?=$sunglass['price']?> грн
									</div>
								<button class="orderButton" id="<?=$sunglass['id']?>"><img src="<?=IMG?>addToCart.png" /></button>
								</div>

								<div class="color">
									<?=$sunglass['color']?>
								</div>
								 </p>
							</div> <!-- end .container -->
						</li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>