<!-- Footer -->
<div class="footer">
   <h2>Recent Posts</h2>
      
      <ul>
         <?php
            $args = array( 'numberposts' => '3' );
            $recent_posts = wp_get_recent_posts( $args );
            foreach( $recent_posts as $recent ){
               echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
            }
            wp_reset_query();
         ?>
      </ul>

    <h2>Archives</h2>
    <?php wp_get_archives('type=yearly'); ?>
    <h2>Categories</h2>
      <?php the_category(', '); ?>
    <br>
 
<?php wp_footer();?>
</div>
    </body>
</html>