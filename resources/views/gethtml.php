<?php echo "haha"; print_r(get_loaded_extensions()); ?>
<?php
/**
 * Craw html
 * xxx
 */
// require 'wp-load.php';
require('simple_html_dom.php');

global $wpdb;

die('123 132');

$html = file_get_html( 'http://ngaydep.com/tu-vi-tron-doi-cua-12-con-giap.html' );
if( $html == false ){
	echo "<pre>"; var_dump( $html ); die(' --- tu vi tron doi --- ');
}

$links = array();
foreach( $html->find( '.link_year' ) as $el ){
	$links[] = 'http://ngaydep.com/' . trim( $el->href );
}

// Quet url on site
foreach( $links as $link )
{
	$html = file_get_html( $link );
	if( $html == false ){
		continue;
	}

	$title = '';
	foreach( $html->find( '.summary_tvtd .mtl h2' ) as $el )
	{
	    $title = trim( $el->text() );
	}

	$congiap = array();
	foreach( $html->find( '.summary_tvtd .mtm a' ) as $el ){
	   $congiap[] = trim( $el->class );
	}

	$name_b = array();
	foreach( $html->find( '.mtm p b' ) as $el ){
		$name_b[] = trim( $el->text() );
	}

	$content = '';
	foreach( $html->find( '.content p' ) as $el ){
	   $content .= $el->text() . '<br>';
	}

	// Create post object
	$my_post = array(
	    'post_type'  => 'trondoi',
	    'post_title'    => wp_strip_all_tags( $title ),
	    'post_content'  => $content,
	    'post_status'   => 'publish',
	    'post_author'   => 1,
	    'meta_input' => array(
	        '_yoast_wpseo_focuskw_text_input' => $title,
	        '_edit_last' => 1,
	        '_yoast_wpseo_focuskw' => $title,
	        'hlc_nhanmang' => $name_b[0],
	        'hlc_namsinh' => $name_b[1],
	        'hlc_menh' => $name_b[2],
	        'hlc_giainghia' => $name_b[3],
	        'hlc_congiap' => $congiap[0],
	    )
	);

	// Insert the post into the database
	$post_id = wp_insert_post( $my_post );

} // End for
