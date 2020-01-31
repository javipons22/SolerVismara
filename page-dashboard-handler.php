<?php 

/* 
	Template Name: dashboard handler
*/
$id = $_GET['id'];
$accion = $_GET['action'];

if ($accion == 'borrar')
{
    update_field('destacado', false , $id);
    header( "Location: ". get_site_url() ."/dashboard" );
}
else if ($accion == 'agregar')
{
    update_field('destacado', true , $id);
    header( "Location: ". get_site_url() ."/dashboard" );
}


?>