<?php
  if ( function_exists( 'finkom_team_member_meta' ) ) :
    finkom_team_member_meta();
  endif;
?>
<?php Hybrid\Post\display_terms( [ 'taxonomy' => 'team-member-category' ] ) ?>
<?php Hybrid\Breadcrumbs\Trail::display() ?>