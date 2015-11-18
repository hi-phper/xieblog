<div class="blog-post">
	<h2 class="blog-post-title">
		<a href="<?php echo $config->get('base_url')  . $post->url; ?>"><?php echo $post->title; ?></a>
	</h2>
	<p class="blog-post-meta"><?php echo date('Y-m-d H:i:s', $post->date); ?></p>
	<p>
		<?php echo $post->content; ?>
	</p>
</div><!-- /.blog-post -->