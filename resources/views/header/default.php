<!DOCTYPE html>
<html <?php Hybrid\Attr\display( 'html' ) ?>>

<head>
<?php wp_head() ?>
</head>

<body <?php Hybrid\Attr\display( 'body' ) ?>>

<div class="app">

	<header <?php Hybrid\Attr\display( 'header', 'app-header', [ 'class' => 'app-header' ] ) ?>>
		<div class="app-header__wrapper">
			<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'the-biz' ) ?></a>
			<div class="site-info app-header__branding">
				<?php the_custom_logo() ?>
				<?php Hybrid\Site\display_title(array(
						'tag'        => is_front_page() ? 'h1' : 'div',
						'class'      => 'site-info__title',
						'link_class' => 'site-info__title-link'
						)) ?>
				<?php Hybrid\Site\display_description(array(
					'tag'   => 'div',
					'class' => 'site-info__description',
				)) ?>
			</div>
			<?php the_custom_header_markup() ?>
			<div id="primary-menu-container" class="app-header__navigation">
				<?php Hybrid\View\display( 'nav/menu', 'featured', [ 'location' => 'featured' ] ) ?>
				<h3 class="app-header__toggle app-header__toggle--open">
					<a href="#site-navigation" role="button" id="primary-menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-label="<?php esc_html_e( 'Open primary menu', 'the-biz' ); ?>" aria-expanded="false">
						<span class="app-header__menu-name"><?php Hybrid\Menu\display_name( 'primary' ) ?></span>
					</a>
				</h3>
				<h3 class="app-header__toggle app-header__toggle--closed">
					<a href="#" role="button" class="menu-toggle" aria-controls="primary-menu" aria-label="<?php esc_html_e( 'Close primary menu', 'the-biz' ); ?>" aria-expanded="false">
						<span class="app-header__menu-name"><?php Hybrid\Menu\display_name( 'primary' ) ?></span>
					</a>
				</h3>
				<?php Hybrid\View\display( 'nav/menu', 'primary', [ 'location' => 'primary' ] ) ?>
			</div>
		</div>
	</header>
