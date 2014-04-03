При редактированни формы отправки сообщения из админки, нужно в форму добавить три скрытых поля:

<input type="hidden" name="address" value="<?=get_option('address')?>">
<input type="hidden" name="siteEmail" value="<?=get_option('siteEmail')?>">
<input type="hidden" name="sub" value="<?=get_option('sub')?>">