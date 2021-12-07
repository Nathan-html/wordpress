<?php
/*
Plugin Name: Shortcode date du post
Description: Ajout d'un shortcode | si le post « La tartiflette, un bilan mitigé » a été publié le 01/09/2021 et que nous somme le 20/09/2021,
            cela affichera : L’article « La tartiflette, un bilan mitigé » est en ligne depuis le 01/09/2021, cela fait 19 jours.
Author: Nathan Flacher
Version: 1.0
*/

// Create the shortcode
add_action( 'init', 'date_post_shortcode' );
function date_post_shortcode() {
	add_shortcode( 'depuis', 'date_post_function' );
}

function date_post_function(){
    // get_the_date -> Retrieve the date on which the post was written.
    $dateWritten = get_the_date( 'd m y' );
    // $currentDate -> Retrieves the current time.
    $currentDate = current_time( 'd m y' );

    // $dateMessage = "<p>l’article « ". get_the_title() ." » est en ligne depuis le ". $dateWritten .", cela fait ". strtotime($dateWritten) - strtotime($currentDate) ." jours.</p>";
    $dateMessage = "<p>l’article « ". get_the_title() ." » est en ligne depuis le ". get_the_date( 'd' ). "/". get_the_date( 'm' ) ."/". get_the_date( 'y' ) .", cela fait ". strtotime($dateWritten) - strtotime($currentDate) ." jours.</p>";
    
    return $dateMessage ;
}