<article <?php Hybrid\Attr\display( 'entry' ) ?>>

	<header class="entry__header">
		<?php Hybrid\Post\display_title() ?>

		<div class="entry__byline">
			<?php Hybrid\Media\display_image_sizes( [
				// Translators: %s is a list of image size links.
				'text' => esc_html__( 'Sizes: %s', 'the-biz' )
			] ) ?>
		</div>
	</header>

	<?php echo wp_get_attachment_image( get_the_ID(), 'large', false, [ 'class' => 'aligncenter' ] ) ?>

	<div class="entry__content">
		<?php the_content() ?>
		<?php Hybrid\View\display( 'nav/pagination', 'post' ) ?>
	</div>

	<?php $gallery = gallery_shortcode( [
		'columns'     => 4,
		'numberposts' => 8,
		'orderby'     => 'rand',
		'id'          => get_queried_object()->post_parent,
		'exclude'     => get_the_ID()
	] ) ?>

	<?php if ( $gallery ) : ?>

		<div class="media-gallery">
			<h3 class="media-gallery__title"><?php esc_html_e( 'Gallery', 'the-biz' ) ?></h3>
			<?php echo $gallery // phpcs:ignore WordPress.Security.EscapeOutput ?>
		</div>

	<?php endif ?>

	<div class="media-meta media-meta--image">

		<h3 class="media-meta__title"><?php esc_html_e( 'Image Info', 'the-biz' ) ?></h3>

		<ul class="media-meta__items">
			<?php Hybrid\Media\display_meta( 'dimensions',        [ 'tag' => 'li', 'label' => __( 'Dimensions', 'the-biz' )    ] ) ?>
			<?php Hybrid\Media\display_meta( 'created_timestamp', [ 'tag' => 'li', 'label' => __( 'Date', 'the-biz' )          ] ) ?>
			<?php Hybrid\Media\display_meta( 'camera',            [ 'tag' => 'li', 'label' => __( 'Camera', 'the-biz' )        ] ) ?>
			<?php Hybrid\Media\display_meta( 'aperture',          [ 'tag' => 'li', 'label' => __( 'Aperture', 'the-biz' )      ] ) ?>
			<?php Hybrid\Media\display_meta( 'focal_length',      [ 'tag' => 'li', 'label' => __( 'Focal Length', 'the-biz' )  ] ) ?>
			<?php Hybrid\Media\display_meta( 'iso',               [ 'tag' => 'li', 'label' => __( 'ISO', 'the-biz' )           ] ) ?>
			<?php Hybrid\Media\display_meta( 'shutter_speed',     [ 'tag' => 'li', 'label' => __( 'Shutter Speed', 'the-biz' ) ] ) ?>
			<?php Hybrid\Media\display_meta( 'file_name',         [ 'tag' => 'li', 'label' => __( 'Name', 'the-biz' )          ] ) ?>
			<?php Hybrid\Media\display_meta( 'mime_type',         [ 'tag' => 'li', 'label' => __( 'Mime Type', 'the-biz' )     ] ) ?>
			<?php Hybrid\Media\display_meta( 'file_type',         [ 'tag' => 'li', 'label' => __( 'Type', 'the-biz' )          ] ) ?>
			<?php Hybrid\Media\display_meta( 'file_size',         [ 'tag' => 'li', 'label' => __( 'Size', 'the-biz' )          ] ) ?>
		</ul>

	</div>

</article>
