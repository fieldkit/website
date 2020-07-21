<?php
$table = get_field('table');
$body = get_field('body');
?>
<?php if ($body) : ?>
	<div class="rich-text">
		<?php echo $body; ?>
	</div>
<?php endif; ?>
<?php if ($table) : ?>
<section class="section section-table">
	<div class="section__inner">
		<table class="section-table__table">
			<?php if (!empty($table['header'])) : ?>
				<thead>
					<tr>
						<?php foreach ($table['header'] as $th) : ?>
							<th><?php echo $th['c']; ?></th>
						<?php endforeach; ?>
					</tr>
				</thead>
			<?php endif; ?>
			<?php if (!empty($table['body'])) : ?>
				<tbody>
					<?php foreach ($table['body'] as $tr) : ?>
						<tr>
							<?php foreach ($tr as $td) : ?>
								<td><?php echo $td['c']; ?></td>
							<?php endforeach; ?>
						</tr>
					<?php endforeach; ?>
					</tbody>
			<?php endif; ?>
		</table>
	</div>
</section>
<?php endif; ?>
