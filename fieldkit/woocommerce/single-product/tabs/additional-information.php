<?php
/**
 * Additional Information tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/additional-information.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$rich_text = get_field('body');
$rich_text_footer = get_field('footer_body');
?>

<?php if($rich_text): ?>
<div class="rich-text"><?php echo $rich_text; ?></div>
<?php endif; ?>


<?php
$table = get_field('table');
if($table):
?>
<section class="section section-table--primary">
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


<?php do_action( 'woocommerce_product_additional_information', $product ); ?>

<?php if($rich_text_footer): ?>
<div class="rich-text"><?php echo $rich_text_footer; ?></div>
<?php endif; ?>
