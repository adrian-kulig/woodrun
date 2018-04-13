<?php

//  reservations:

	add_action( 'wp_ajax_nopriv_ae_reservation_ajax', 'ae_reservation_ajax' );  
	add_action( 'wp_ajax_ae_reservation_ajax', 'ae_reservation_ajax' ); 

	function ae_reservation_ajax(){
		
		ob_start();
		
		$args = array(
		
			'category'    => 4,
			'numberposts' => -1
		
		);
		
		$trips = get_posts( $args );
		
		if ( $trips ) {
		
		?>
			
		<option value="">Wybierz ofertę...</option>
		
		<?php foreach( $trips as $trip ) { ?>
		
		<option id="trip-<?php echo $trip->ID; ?>"><?php echo $trip->post_title; ?></option>
		
		<?php }; ?>
		
		<?php
		
		};
		
		$result = ob_get_contents();
		ob_end_clean();
		
		die( $result );
		
	} 
	
	
	add_action( 'wp_ajax_nopriv_ae_reservation_ajax_details', 'ae_reservation_ajax_details' );  
	add_action( 'wp_ajax_ae_reservation_ajax_details', 'ae_reservation_ajax_details' ); 

	function ae_reservation_ajax_details(){
		
		ob_start();
		
		$result = ob_get_contents();
		ob_end_clean();
		
		die( $result );
		
	} 	

?>