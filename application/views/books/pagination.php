
<div class="container">
	<h3 class="title is-3">CodeIgniter Database Pagination</h3>
	<div class="column">
		<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
			<thead>
				<tr>
					<th>ID</th>
					<th>Contact Name</th>
					<th>Contact Number</th>
					<th>Email</th>
					<th>City</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($books as $book) : ?>
				<tr>
					<td><?= $book->book_id ?></td>
					<td><?= $book->book_name ?></td>
					<td><?= $book->book_type ?></td>
					<td><?= $book->content ?></td>
					<td><?= $book->b_rate ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<p id="pagination" class="pagination"><?php echo $links; ?></p>
	</div>
</div>