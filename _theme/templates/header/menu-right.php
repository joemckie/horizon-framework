<?php 
global $right_menu;
$right_menu = !isset($right_menu) ? 'main_menu' : $right_menu;
do_action( 'horizon_before_menu' );
do_action( 'horizon_menu', $right_menu );
do_action( 'horizon_after_menu' );
?>