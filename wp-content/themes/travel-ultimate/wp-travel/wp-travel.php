<?php
remove_action( 'wp_travel_after_single_title', 'wp_travel_single_excerpt', 1 );

remove_action( 'wp_travel_after_single_itinerary_header', 'wp_travel_related_itineraries', 20 );

remove_action( 'wp_travel_after_single_itinerary_header', 'wp_travel_frontend_trip_facts', 10 );