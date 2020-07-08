<?php
$table = get_sub_field('table');
$header_heading = get_sub_field('header_heading');
?>
<section class="section section-table">
	<div class="section__inner">
		<?php if ($header_heading) : ?>
			<div class="section-table__header rich-text">
				<h3 class="heading-3"><?php echo $header_heading; ?></h3>
			</div>
		<?php endif; ?>
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
							<? endforeach; ?>
						</tr>
					<?php endforeach; ?>
					</tbody>
			<?php endif; ?>
		</table>
	</div>
</section>
