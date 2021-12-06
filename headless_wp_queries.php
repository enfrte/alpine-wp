<?php 

/**
 * Add your WP queries here.
 * Uses nowdoc style stings
 * Convention - Prefix with wpquery_
 */

// Get all posts
$wpquery_get_posts =  <<<'NOWDOC'
query get_posts {
	posts {
		nodes {
		title
		date
		content
		}
	}
}
NOWDOC;

