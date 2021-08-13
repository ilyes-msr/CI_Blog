<h2><?= $title ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('posts/update'); ?>
	<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
	<div class="form-group">
		<label>Title</label>
		<input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $post['title'];?>">
	</div>
	<div class="form-group">
		<label>Body</label>
		<textarea class="form-control" name="body" id="editor1" placeholder="Add Body"><?php echo (!empty($post['body']))? $post['body'] : '';?></textarea>
	</div>
	<div class="form-group">
		<label>Category</label>
		<select class="form-control" name="category_id">
			<?php foreach ($categories as $category) : ?>
				<option value="<?= $category['id'] ?>" <?php if($category['id'] == $post['category']) echo 'selected';?>><?= $category['name'] ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<button type="submit" class="btn btn-warning">Edit</button>
</form>
