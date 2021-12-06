<?php
	/**
	 * The template for displaying the homepage.
	 */

	require 'config.php';
	require 'headless_wp_queries.php';
	require 'header.php';
?>

	<section class="item-section" 
		x-data="{
			res: {data: {posts: {nodes: []}}},
			query: `<?php echo $wpquery_get_posts; ?>`,
			loaded_posts: false,
		}"
		x-init="fetch('<?php echo WP_GRAPH_QL; ?>', 
			{
				method: 'POST',
				headers: {
					'Content-Type': 'application/json',
				},  
				body: JSON.stringify({ query }),
			})
			.then(response => response.json())
			.then(fetchData => { 
				res = fetchData;
				loaded_posts = true;
			})">
	
		<template x-if="!loaded_posts">
			<article class="tc">
				<h4 class="moon-gray">Loading posts from very slow host...</h4>
			</article>
		</template>

		<template x-for="d in res.data.posts.nodes" :key="d.databaseId">
			<article class="center mw6 mw6-ns mv0 br0 hidden ba b--black-10 bg-moon-gray">
				<h2 class="f3 br0 black-60 mv0 pv3 ph3" x-text="d.title"></h2>
				<div class="pa3 bt b--black-10">
					<div class="f6 f5-ns lh-copy measure">Date: <span x-text="d.date"></span></div>
					<div class="f6 f5-ns lh-copy measure" x-html="d.content"></div>
				</div>
			</article>
		</template>
	</section>
	
<?php require 'footer.php'; ?>
