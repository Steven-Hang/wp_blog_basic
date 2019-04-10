<?php
/*
 * The Sidebar containing the main widget areas.
 */
?>
<div id="secondary" class="widget-area" role="complementary">
<div class="widget-container">

<aside id="recent-post" class="widget w_recent"> 
      <h3 class="widget-title">Recent Posts</h3>           
               <ul>
                  <?php
                     $args = array( 'numberposts' => '3' );
                     $recent_posts = wp_get_recent_posts( $args );
                     foreach( $recent_posts as $recent ){
                        echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a></li> ';
                     }
                     wp_reset_query();
                  ?>
               </ul>
         </aside>
         <aside id="archives" class="widget w_archives">
         <h3 class="widget-title">Archives</h3>
            <?php wp_get_archives('type=yearly'); ?>
            
         </aside>
      <aside id="recent_comments" class="widget w_recent-comments">
      
      </aside>
      </div>
</div>