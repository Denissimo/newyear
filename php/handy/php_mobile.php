<?

$temp = '

<h1>Оплата мобильного телефона</h1>
<!--start b-transfer-->

<div class="b-transfer">
<div class="b-transfer__el b-transfer__el_left b-transfer__el_no_transfer">
<h2>Счет для оплаты</h2>

<form class="b-form">
<div class="b-form__line"><label class="b-form__label">Счет</label>

<div class="b-form__input b-form__input_long b-fselect">
<div class="b-fselect__main" data-value="0"><span class="gray">Позитрон </span>...002119

<div class="b-fselect__right">180 560<span class="rubl">o</span></div>
</div>

<ul class="b-fselect__dropdown">
	<li data-value="0"><span class="gray">Позитрон </span>...002118

	<div class="b-fselect__right">180 560<span class="rubl">o</span></div>
	</li>
	<li data-value="1"><span class="gray">Позитрон </span>...002117
	<div class="b-fselect__right">180 562<span class="rubl">o</span></div>
	</li>
	<li data-value="2"><span class="gray">Позитрон </span>...002116
	<div class="b-fselect__right">180 563<span class="rubl">o</span></div>
	</li>
</ul>
</div>
</div>

<div class="b-form__line b-form__line_rubl"><label class="b-form__label">Сумма</label> <input class="b-form__input js-number-only js-price js-sum" name="" type="text" value="500" /></div>

<div class="b-form__line">
<div class="b-form__label">&nbsp;</div>

<div class="b-form__sdesc">На счету: 180 500<span class="rubl">o</span></div>
</div>
</form>
</div>

<div class="b-transfer__el b-transfer__el_right b-transfer__el_no_transfer">
<div class="b-transfer__operator">&nbsp;</div>

<h2>Куда платим</h2>

<form class="b-form">
<div class="b-form__line"><label class="b-form__label">Телефон</label>

<div class="b-form__tell-bl"><span>+7</span> <input id="phonecode" class="b-form__input js-number-only js-code" name="" type="text" /> <input id="phonenum" class="b-form__input js-number-only js-number-body" name="" type="text" /></div>
</div>

<div class="b-form__line b-form__line_rubl"><label class="b-form__label">Зачислим</label> <input class="b-form__input b-form__input_mobile js-number-only js-price js-total" data-cr="1" data-procent="2" name="" type="text" value="490" />
<div class="b-form__desc">Комиссия 2%</div>
</div>

<div class="b-form__line">
<div class="b-form__label">&nbsp;</div>

<div class="b-form__sdesc b-form__sdesc_i">Комиссия 2%</div>
</div>
</form>
</div>
</div>
<!--end b-transfer-->

<div class="btn_cont"><button class="btn">Перевести</button></div>

';
echo 'Оплата Мобильного';

echo $temp;













?>