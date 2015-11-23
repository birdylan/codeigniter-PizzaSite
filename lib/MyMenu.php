<?php
class MyMenu{
 	function show_menu(){
  		$obj =& get_instance();
  		$obj->load->helper('url');
  		$menu  = "<ul>";
  		$menu .= "<li>";
  		$menu .= anchor("pizza/index","Siparisler");
  		$menu .= "</li>";
  		$menu .= "<li>";
  		$menu .= anchor("pizza/order","Siparis Ver");
  		$menu .= "</li>";
  		$menu .= "</ul>";

  		return $menu;
 	}
}
?>
