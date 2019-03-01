<?php
if ( post_password_required() ){
    return;
}
?>

<div id="comments" class="comments-area">
    <?php if( have_comments()); ?>
    <ol class="comment-list">
        <?php
            wp_list_comments();

        ?>
    <?php comment_form(); ?>
</div>