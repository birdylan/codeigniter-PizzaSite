<html>
<head>
<link rel="stylesheet" type="text/css"
      href="<?php echo $base.'css/'.$css?>">
</head>
<body>
<div id="header">
<?php $this->load->view('pizza_header'); ?>
</div>
<div id="menu">
<?php 	$this->load->view('pizza_menu'); ?>
</div>

<?php echo heading($baslik,2)//ilk fonksiyonumuz bu ?>

<?php echo form_open('pizza/order'); ?>
<?php echo $isim .':'.form_input($temiz_isim).br(); ?>
<?php echo form_hidden('id',$temiz_id['value']); ?>


<?php echo $pizza.':'.form_dropdown('pizza',$pizzalar,$temiz_pizza['value']).br(); ?>

<?php echo $tip.':'.form_dropdown('tip',$tipler,$temiz_tip['value']).br(); ?>

<?php echo $adet.':'.form_input($temiz_adet).br(); ?>

<?php echo $kenar.':'.form_checkbox($temiz_kenar).br(); ?>

<?php echo $adres.':'.form_textarea($temiz_adres).br(); ?>

<?php echo form_submit('mysubmit','Sipariş Ver!');  ?>
<?php echo form_close(); ?>



<div id="footer">
<?php $this->load->view('pizza_footer'); ?>
</div>

</body>
</html>
