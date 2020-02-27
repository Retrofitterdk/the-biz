<?php if ( has_nav_menu( $data->location ) ) : ?>
	<nav <?php Hybrid\Attr\display( 'menu', $data->location, [ 'id' => 'social-navigation' ] ) ?>>
		<?php wp_nav_menu( [
			'theme_location'  => $data->location,
			'depth'			  => -1,
			'container'       => '',
			'container_class' => 'nav-menu',
  			'container_id'    => 'social-menu-container',
			'menu_id'         => 'social-menu',
			'menu_class'      => 'menu__items',
			'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
			'link_before'      => '<span class="screen-reader-text">',
			'link_after'      => '</span>',
			'item_spacing'    => 'discard'
		] ) ?>
	</nav>
<?php endif ?>
