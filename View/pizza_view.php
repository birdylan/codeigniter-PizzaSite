<html>
<head>
<link rel="stylesheet" type="text/css"  href="<?php echo $base.'css/'.$css?>"><!-- Css dosyamızı burada include ettik -->
</head>
<body>
<div id="header">
<?php $this->load->view('pizza_header'); ?><!-- header dosyamızı burada include ettik -->
</div>
<div id="menu">
<?php 	$this->load->view('pizza_menu'); ?><!-- menü dosyamızı burada include ettik -->
</div>

<h3>Siparişler</h3>

<table border="1">
<tr><th>İsim</th><th>Pizza</th><th>İnce Kenar</th><th>Adet</th><th>Adres</th><th>Tip</th><th>Fiyat</th><th>Düzenle</th><th>Sil</th></tr>
<?php foreach($orders as $row){ ?>
<tr>
<td>
<?php echo $row->name;?>
</td>
<td>
<?php echo $row->pizza;?>
</td>
<td>
<?php if($row->thin_edge)
{
	echo "Evet";
}
else
{
	echo "Hayır";
}
?>
</td>
<td>
<?php echo $row->unit;?>
</td>
<td>
<?php echo $row->address;?>
</td>
<td>
<?php echo $row->type;?>
</td>
<td>
<?php echo $row->cost;?>
</td>
<td>
<?php echo anchor('pizza/order/'.$row->id,'Düzenle');?>
</td>
<td>
<?php echo anchor('pizza/del/'.$row->id,'Sil') ;?>
</td>
</tr>
<?php } ?>

</table>


<div id="footer">
<?php $this->load->view('pizza_footer'); ?><!-- footer dosyamızı burada include ettik -->
</div>

</body>
</html>
