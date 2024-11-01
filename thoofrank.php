<?php
/*
Plugin Name: ThoofRank Button
Plugin URI: http://thoof.com/tools
Description: This plugin adds either a Thoof submit button, or a ThoofRank button to each article.
Author: Thoof
Author URI: http://thoof.com/
Version: 1.1
*/

function thoofrank(){
	remove_filter('the_content', 'append_thoofrank_filter');
	echo get_thoofrank_code();
}

function get_thoofrank_code(){
        $permalink =  get_permalink();
        $title = the_title('', '', false);

        $thoofrank = '<script type="text/javascript"> thoof_url = "'.$permalink.'"; thoof_title = "'.$title.'"; </script> <script type="text/javascript" src="http://www.thoof.com/thoof-rank.js"></script>';
        return $thoofrank;
}

function append_thoofrank_filter($post) {
        if (strpos($post, 'http://thoof.com/tr/') == false) {
                $post = $post . "<p/>" . get_thoofrank_code();
        }
        return $post;
}

add_filter('the_content', 'append_thoofrank_filter');
?>