<!-- order page
 -	 Shows order form and cart contents
-->

<link href="<?=CSS?>pc/pages/order.css" rel="stylesheet" type="text/css" />

<!-- load jquery (if it's not already loaded) -->
	<script type="text/javascript">
	if(typeof jQuery == 'undefined'){
		document.write('<script type="text/javascript" src="<?=JS?>jquery/jquery.min.js"></'+'script>');
	  }
	</script>
<!-- ----------------------------------------- -->

<!-- CartAjax -->
	<script type="text/javascript" src="<?=JS?>cart/CartAjax.js"></script>
	<script>
		$(document).ready(function() {
            (new CartAjax).initListeners({
                cartId: 'cart-view',
                removeItemButtonClass: 'removeItem'
            });
		});
	</script>
<!-- ---------------------------------------- -->


<div id="order-page" class="pagePadding">
    <div class="inner-container">
        <!-- cart -->
        <div class="cart" id="cart-view">
            <h1 class="textAlignCenter">Ваш заказ</h1>
            <?php if(is_array($cart['items']) && $cart['totalPrice']>0):?>
                <?php foreach($cart['items'] as $item): ?> 
                    <div class="item">
                        <div class="description">
                            <?=$item['model']?>, 
                            <?=$item['color']?>, 
                            <?=$item['price']?> грн
                        </div>
                        <div class="imgContainer" id="<?=$item['id']?>" >
                            <img class="glasses" src="<?=IMG?><?=$item['mini_img_path']?>" />
                        </div>
                        <a id="<?=$item['id']?>" class="removeItem" href="javascript:void(0)">
                            <img src="<?=IMG?>mobile/layout/cartRemoveIcon.svg" />
                        </a>
                    </div>
                <?php endforeach; ?>
                <div class="total-price">Общая стоимость заказа: <?=$cart['totalPrice']?> грн (+ доставка)</div>
            <?php else:?>
                <div>Ваша корзинка пуста</div>
                <div>
                    <a href="<?=base_url()?>">Выбрать и добавить в корзинку очки</a> <br />
                    Или заказывайте по телефону 063 206 60 97
                </div>
            <?php endif;?>
        </div>

        <br />

        <div id="orderForm">
            <form class="order" method="POST" action="<?=site_url()?>/shop/submitOrder">
                <h2 class="textAlignCenter">Оформление заказа</h2>
                <div class="fieldName">Фамилия, имя, отчество</div>
                <input name="name" type="text" class="glowing-border" value="<?=set_value('name')?>" />
                <br />
                <div class="fieldName">Телефон</div>
                <input name="phone"  id="phoneInput" type="text" class="glowing-border" value="<?=set_value('phone')?>"/>
                <br />
                <div class="fieldName">E-mail</div>
                <input name="email" type="text" class="glowing-border" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" />
                <br />
                <div class="fieldName">Адрес</div>
                <input name="address" type="text" class="glowing-border" value="<?=set_value('address')?>"/>
                <br />
                <div class="fieldName">Доставка</div>
                <select name="delivery" class="glowing-border">
                    <option
                        value="Новая Почта"
                        <?php if(isset($_POST['delivery'])  && $_POST['delivery']=='Новая Почта') echo 'selected="selected"'?>
                    >
                        Новая Почта
                    </option>
                    <option
                        value="Курьерская"
                        <?php if(isset($_POST['delivery']) && $_POST['delivery']=='Курьерская') echo 'selected="selected"'?>
                    >
                        Курьерская (только г. Киев, правый берег)
                    </option>
                </select>
                <div class="fieldName">№ Отделения Новой Почты</div>
                <input
                    name="novaPoshtaOffice"
                    type="text"
                    class="glowing-border novaPoshtaOffice"
                    value="<?php if(isset($_POST['novaPoshtaOffice'])) echo $_POST['novaPoshtaOffice']; ?>"
                />
                <br />
                <div class="fieldName">Способ оплаты</div>
                <select name="paymentMethod" class="glowing-border">
                    <option
                        value="Оплата при получении"
                        <?php if(isset($_POST['paymentMethod']) && $_POST['paymentMethod']=='Полата при получении') echo 'selected="selected"';  ?>
                    >
                        Оплата при получении
                    </option>
                    <option
                        value="Предоплата на карточку ПриватБанк"
                        <?php if(isset($POST['paymentMethod']) && $_POST['paymentMethod']=='Предоплата на карточку ПриватБанк') echo 'selected="selected"'; ?>
                    >
                        Предоплата на карточку ПриватБанк (номер будет сообщен по смс)
                    </option>
                </select>
                <br />
                <div class="fieldName">Доп. информация</div>
                <textarea name="additionalInfo" class="glowing-border" rows="5"><?php if(isset($_POST['additionalInfo'])) echo $_POST['additionalInfo']; ?></textarea>

                <?=validation_errors('<div class="validationError">', '</div>')?>

                <input type="submit" value="Готово" />

            </form>
        </div>
    </div> <!-- end .page-container -->
</div> <!-- end #order-page -->
