<?php
/*
Plugin Name: Couleur du titre
Description: Rajouter un champ de saisie nommé « Couleur du Titre » dans le footer. Le titre s’afficher de la couleur choisie.
Author: Nathan Flacher
Version: 1.0
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// A function for testing if you are in a page 💀 spoil : it's useless
// But it's works 🤣
//
// add_action( 'wp_head', 'are_you_in_a_page' );
// function are_you_in_a_page(){
//     $message = '<p style="text-align: center;">hello tu es sur une page 😱😱😱</p>';
//     return $message;
//     }

//define hooks
add_action( 'wp_footer', 'form_title_color' );
add_action( 'wp_head', 'title_color' );

function form_title_color(){
    // Display the form in html
    $input_color_title = '
    <form method="get" onsubmit="return $colorTitleSub = 1;" style="text-align:center; padding-bottom:32px;">
        <div><label for="color-title">Couleur du Titre (in english please)</label><div>
        <div><input type="text" name="color-title" placeholder="blue, red, rgb(45,20,150)"><div>
        <input type="submit" value="validate">
    </form>';
    echo $input_color_title;
}

function title_color(){
    // Define the color of the title to black by default
    $color_title = $_GET['color-title'] ?? 'black';
    // The style that change the look of the title 😎
    $style_color_title='<style>h1{color:'.$color_title.';}</style>';
    echo $style_color_title;

    // A text to show the current color of the title 💀 is not plan to be use
    // But you can if you want 🤣
    //
    // $say_color_of_title = '<p style="text-align: center;">Couleur du Titre : '. $color_title  . '</p>';
    // echo $say_color_of_title;
}