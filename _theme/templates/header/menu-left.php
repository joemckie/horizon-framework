<?php
global $left_menu;
$left_menu = !isset($left_menu) ? 'main_menu' : $left_menu;
do_action( 'horizon_before_menu' );
do_action( 'horizon_menu', $left_menu );
do_action( 'horizon_after_menu' );
?>