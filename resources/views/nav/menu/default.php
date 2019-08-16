<?php if ( has_nav_menu( $data->location ) ) : ?>
	<h3 class="menu__title">
		<a href="#site-navigation" role="button" id="primary-menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-label="<?php esc_html_e( 'Open primary menu', 'finkom' ); ?>" aria-expanded="false">
			<span><?php Hybrid\Menu\display_name( $data->location ) ?><span>
		</a>
	</h3>
	<nav <?php Hybrid\Attr\display( 'menu', $data->location, [ 'id' => 'site-navigation' ] ) ?>>
		<h3 class="menu__title">
			<a href="#" role="button" id="primary-menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-label="<?php esc_html_e( 'Close primary menu', 'finkom' ); ?>" aria-expanded="false"></a>
			<?php Hybrid\Menu\display_name( $data->location ) ?>
		</h3>
		<?php wp_nav_menu( [
			'theme_location'  => $data->location,
			'container'       => '',
			'container_class' => 'nav-menu',
  			'container_id'    => 'primary-menu-container',
			'menu_id'         => 'primary-menu',
			'menu_class'      => 'menu__items',
			'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
			'item_spacing'    => 'discard'
		] ) ?>

	</nav>
	<a href="#" class="backdrop" tabindex="-1" aria-hidden="true" hidden></a>
<?php endif ?>
