<?php
foreach($posts as $post) : 
?>
<div class="blog-post">
	<h2 class="blog-post-title">
		<a href="<?php echo $config->get('base_url') . $post->url; ?>"><?php echo $post->title; ?></a>
	</h2>
	<p class="blog-post-meta"><?php echo date('Y-m-d H:i:s', $post->date); ?></p>
	<p>
		<?php echo $post->content; ?>
		<?php if($post->hasMore) : ?>
		<a class="btn btn-primary" href="<?php echo $config->get('base_url') . $post->url; ?>">继续阅读</a>
		<?php endif; ?>
	</p>
</div><!-- /.blog-post -->
<?php endforeach; ?>

<?php echo $paginator; ?>