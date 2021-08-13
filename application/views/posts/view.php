<style>
	.comments-errors {
		color: red;
	}
</style>
<p class="category"><?= $post['name'] ;?></p> <p class="category"><?= 'Tekki posts' ?></p> <p class="category"><?= 'Just for you' ?></p>

<h3><?= $post['title'] ;?></h3>
	<p class="post-date">By <strong><?php echo $post['username'] ?> </strong>
		at
		<?php
			$dt = new DateTime($post['created_at']);
			echo $dt->format('M d, Y'); ;
		?>  </p> <br>
	<img src="<?php echo site_url('assets/images/posts/'. $post['post_image']);?>" alt="No pic" class="post-thumb">
	<br><br>
	<div class="post-body">
		<?= $post['body'] ;?>
	</div>
	<?php if ($post['userId'] == $this->session->userdata('user_id')) : ?>
	<a href="edit/<?php echo $post['slug']; ?>" class="btn btn-warning pull-left">Edit</a>
	<?php echo form_open("posts/delete/". $post['id']);?>
	<input type="submit" class="btn btn-danger pull-right" value="Delete" onclick="javascript: return confirm('Are you sure you want to delete this post?');">
	</form>
	<?php endif; ?>
	<br><br>
	<hr>
	<?php if($comments) : ?>
		<h3>Comments : </h3>
		<?php foreach ($comments as $comment) : ?>
			<div class="well">
				<h4><strong><?php echo $comment['username']; ?></strong> &nbsp;&nbsp;&nbsp;<small>
						<?php
						$timestamp = strtotime($comment['created_at']);
						$datetimearray = explode(" ", $comment['created_at']);

						echo $datetimearray[0] . ' at ' . $datetimearray[1] ;
						?>
					</small></h4>
				<p>&nbsp;&nbsp;&nbsp;<?php echo $comment['body']; ?></p>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
	<h3 id="heading">Add Comment</h3>
	<?php echo validation_errors() ;?>
	<?php echo form_open('comments/create/' . $post['id']); ?>
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" name="name" class="form-control" value="<?= isset($newComment['username'])? $newComment['username'] : ' '?>">
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="email" class="form-control" value="<?= isset($newComment['email'])? $newComment['email'] : ' '?>">
	</div>
	<div class="form-group">
		<label for="comment">Comment</label>
		<textarea name="comment" class="form-control" style="resize: none;"><?= isset($newComment['body'])? $newComment['body'] : ' '?></textarea>
	</div>
	<input type="hidden" name="slug" value="<?php echo $post['slug']?>">
	<button class="btn btn-primary" type="submit">Post Comment</button>
	</form>

	<br><br>
