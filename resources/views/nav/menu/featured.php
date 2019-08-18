<?php if ( has_nav_menu( $data->location ) ) : ?>
	<nav <?php Hybrid\Attr\display( 'menu', $data->location, [ 'id' => 'featured-navigation' ] ) ?>>
		<?php wp_nav_menu( [
			'theme_location'  => $data->location,
			'depth'			  => -1,
			'container'       => '',
			'container_class' => 'nav-menu',
  			'container_id'    => 'featured-menu-container',
			'menu_id'         => 'featured-menu',
			'menu_class'      => 'menu__items',
			'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
			'item_spacing'    => 'discard'
		] ) ?>
	</nav>
<?php endif ?>
