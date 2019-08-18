<?php if ( has_nav_menu( $data->location ) ) : ?>
	<nav <?php Hybrid\Attr\display( 'menu', $data->location, [ 'id' => 'site-navigation' ] ) ?>>
	<div class="menu__wrapper wrapper">
		<?php wp_nav_menu( [
			'theme_location'  => $data->location,
			'depth'			  => 2,
			'container'       => '',
			'container_class' => 'nav-menu',
  			'container_id'    => 'primary-menu-container',
			'menu_id'         => 'primary-menu',
			'menu_class'      => 'menu__items',
			'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
			'item_spacing'    => 'discard'
		] ) ?>
		</div>
	</nav>
	<a href="#" class="backdrop" tabindex="-1" aria-hidden="true" hidden></a>
<?php endif ?>
