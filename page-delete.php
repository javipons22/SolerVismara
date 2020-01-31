<?php 

/* 
	Template Name: DELETE
*/
$id = $_GET['id']; 
wp_delete_post($id);
header( "Location: ". get_site_url() ."/dashboard" );

?>