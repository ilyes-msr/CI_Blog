<h2><?= $title ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('posts/create'); ?>
	<div class="form-group">
		<label>Title</label>
		<input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $title;?>">
	</div>
	<div class="form-group">
		<label>Body</label>
		<textarea class="form-control" name="body" placeholder="Add Body" id="editor1"><?php echo $body;?></textarea>
	</div>
	<div class="form-group">
		<label>Category</label>
		<select class="form-control" name="category_id" required="required">
			<option value="">Select</option>
			<?php foreach ($categories as $category) : ?>
				<option value="<?= $category['id'] ?>" <?php if(isset($category_id) and $category['id'] === $category_id) echo 'selected';?>>
					<?= $category['name'] ?>
				</option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group">
		<label>Upload Image</label>
		<input type="file" name="userfile" size="20">
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
