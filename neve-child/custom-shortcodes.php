<?php

function motivation_function($atts) {
	$value = shortcode_atts( array(
        'width' => '',
        'height' => '',
    ), $atts );
    return '<img src="https://c4.wallpaperflare.com/wallpaper/955/10/446/earned-rest-hd-no-rest-is-worth-anything-except-the-rest-that-is-earned-wallpaper-preview.jpg" 
    alt="motivation-image" width="' . $value['width'] . '" height="' . $value['height'] . '" class="left-align" />';
}

function home_text_function($atts) {
	$value = shortcode_atts( array(
        'font-size' => '',
    ), $atts );
	return '<p style="font-size:' . $value['font-size'] . ';text-align:center;margin-bottom:15px;">Head over to the Shop Page for top-quality equipment</p>';
}

function map_function($atts) {
	$value = shortcode_atts( array(
        'width' => '',
        'height' => '',
    ), $atts );
    return '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1922.2857762348833!2d14.505287441343803!3d35.87629975297686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x130e5ac2d87c4891%3A0x48ee141582b02a26!2sMCAST!5e0!3m2!1sen!2smt!4v1618920372329!5m2!1sen!2smt" 
			width="' . $value['width'] . '" height="' . $value['height'] . '" style="border:0;" allowfullscreen="" loading="lazy"></iframe>';
}

function user_name_function() {
	$user = wp_get_current_user();	
	if(!empty($user)){
		$loggedUser = wp_get_current_user();		
		return '<p style="font-size:30px;"><b>Hi ' . $loggedUser->display_name . ' ! Welcome to our store. Below you will find our latest blogs.</b></p>';
	}else{
		return '<p style="font-size:30px;"><b>Hi ! Welcome to our store. Below you will find our latest blogs.</b></p>';	
	}
}

function footer_text_function() {
	return '<p style="font-size:15px;text-align:center;">&copy; 2021. Fitness Equipment</p>';
}

function custom_button_shortcode( $atts, $content = null ) {
   
    extract( shortcode_atts( array(
        'url'    => '',
        'title'  => '',
        'target' => '',
        'text'   => '',
    ), $atts ) );
 
    $content = $text ? $text : $content;
 
    if ( $url ) {
 
        $link_attr = array(
            'href'   => esc_url( $url ),
            'title'  => esc_attr( $title ),
            'target' => ( 'blank' == $target ) ? '_blank' : '',
            'class'  => 'custombutton'
        );
 
        $link_attrs_str = '';
 
        foreach ( $link_attr as $key => $val ) {
 
            if ( $val ) {
 
                $link_attrs_str .= ' ' . $key . '="' . $val . '"';
 
            }
 
        }
        return '<a' . $link_attrs_str . '><span>' . do_shortcode( $content ) . '</span></a>';
    }
 
    else {
 
        return '<span class="custombutton"><span>' . do_shortcode( $content ) . '</span></span>';
    } 
}

function facebook_button( $atts, $content = null ) {
   
	    extract( shortcode_atts( array(
        'url'    => 'https://www.facebook.com/FitnessGymEquipment',
        'title'  => '',
        'target' => '',
        'text'   => 'Fitness Page',
    ), $atts ) );
 
    $content = $text ? $text : $content;
 
    if ( $url ) {
 
        $link_attr = array(
            'href'   => esc_url( $url ),
            'title'  => esc_attr( $title ),
            'target' => ( 'blank' == $target ) ? '_blank' : '',
            'class'  => 'custombutton'
        );
 
        $link_attrs_str = '';
 
        foreach ( $link_attr as $key => $val ) {
 
            if ( $val ) {
 
                $link_attrs_str .= ' ' . $key . '="' . $val . '"';
 
            }
 
        }
        return '<a' . $link_attrs_str . '><span>' . do_shortcode( $content ) . '</span></a>';
    }
 
    else {
 
        return '<span class="custombutton"><span>' . do_shortcode( $content ) . '</span></span>';
    } 
}

add_shortcode( 'facebooklink', 'facebook_button' );
add_shortcode( 'custombutton', 'custom_button_shortcode' );
add_shortcode('motivation', 'motivation_function');
add_shortcode('hometext', 'home_text_function' );
add_shortcode('map', 'map_function');
add_shortcode('user', 'user_name_function');
add_shortcode('footer', 'footer_text_function');
?>