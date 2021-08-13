	<h3><?= $post['title'] ;?></h3>
	<small class="post-date">Posted on: <?= $post['created_at'] ;?> in <strong><?= $post['name'] ;?></strong></small><br>
	<img src="<?php echo site_url('assets/images/posts/'. $post['post_image']);?>" alt="No pic" class="post-thumb">
	<br><br>
	<div class="post-body">
		<?= $post['body'] ;?>
	</div>
	<hr>
	<a href="edit/<?php echo $post['slug']; ?>" class="btn btn-warning pull-left">Edit</a>
	<?php echo form_open("posts/delete/". $post['id']);?>
	<input type="submit" class="btn btn-danger pull-right" value="Delete" onclick="javascript: return confirm('Are you sure you want to delete this post?');">
	</form>
	<br><br><br><br>

