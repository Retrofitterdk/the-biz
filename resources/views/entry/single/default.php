<article <?php Hybrid\Attr\display( 'entry' ) ?>>

	<header class="entry__header">
		<?php Hybrid\Post\display_title() ?>
	</header>
	<div class="entry_media">
		<?php Hybrid\View\display( 'media', Hybrid\Post\hierarchy() ) ?>
	</div>
	<div class="entry__content">
		<?php the_content() ?>
	</div>
	<footer class="entry__footer">
		<?php Hybrid\View\display( 'meta/entryfooter', Hybrid\Post\hierarchy() ) ?>
	</footer>

</article>
