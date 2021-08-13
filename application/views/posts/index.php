<h2><?= $title ?></h2>
<?php foreach ($posts as $post) : ?>
	<h3><?= $post['title'] ;?></h3>

	<div class="row">
		<div class="col-md-3">
			<img src="<?php echo site_url('assets/images/posts/'. $post['post_image']);?>" alt="No pic" class="post-thumb">
		</div>
		<div class="col-md-9">
			<small class="post-date">Posted on: <?= $post['created_at'] ;?> in <strong><?= $post['name'] ;?></strong></small><br>
			<?= word_limiter($post['body'], 60) ;?>
			<br><br>
			<p><a class="btn btn-primary" href="<?php echo site_url('posts/'). $post['slug'];?>">Read More &nbsp;<span class="glyphicon glyphicon-eye-open"></span></a></p>
		</div>
	</div>

<?php endforeach; ?>
<div class="pagination-links"><?php echo $this->pagination->create_links(); ?></div>

<br><br><br>
