
<?php foreach ($alerts as $alert): ?>
<?php [$class, $content] = $alert; ?>
	<div role="alert" class="alert alert-<?= $class ?> alert-dismissible fade show">
		<?= $content ?>

		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
			<span aria-hidden="true"></span>
		</button>
	</div>
<?php endforeach; ?>