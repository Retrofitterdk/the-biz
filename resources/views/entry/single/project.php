<article <?php Hybrid\Attr\display( 'entry' ) ?>>

	<header class="entry__header">
		<?php Hybrid\Post\display_title() ?>
	</header>
	<div class="entry__summary">
		<?php the_excerpt() ?>
	</div>
	<div class="entry_media">
		<?php Hybrid\View\display( 'media', Hybrid\Post\hierarchy() ) ?>
	</div>
		<div class="entry__meta">
		<?php Hybrid\View\display( 'meta/entrymeta', 'project' ) ?>
		</div>
	<div class="entry__content">
		<?php the_content() ?>
		<?php Hybrid\View\display( 'nav/pagination', 'project' ) ?>
	</div>
	<footer class="entry__footer">
		<?php Hybrid\View\display( 'meta/entryfooter', 'project' ) ?>
	</footer>
</article>
