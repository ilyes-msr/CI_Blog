<style>
	a {
		text-decoration: none;
		color: black;

	}
</style>
<h2><?= $title ?></h2>
<table class="table table-striped table-bordered table-hover">
	<thead class="thead-dark">
		<tr class="danger">
			<th>Category Name</th>
			<th>Creation Date</th>
			<th>Number of Posts</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($categories as $category) : ?>
	<tr>
		<td>
			<a href="<?php echo site_url('categories/posts/' . $category['id'])?>">
				<?= $category['name'] ;?>
			</a>
		</td>
		<td>
			<?= date("Y-m-d",strtotime($category['created_at']));?>
		</td>
		<td>
			<?= rand(10,35);?>
		</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
</table>
