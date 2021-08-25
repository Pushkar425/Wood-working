<?php 
get_header();?>
<div id="page">
    <?php $id= get_post_field('post_author');?>
    <div class="content"> 
        <h1><?php echo get_the_author_meta('first_name',$id).' '.get_the_author_meta('last_name',$id);?></h1>   
        <div class="post">
            <h2 class="title"><?php echo get_the_author_meta('first_name',$id)?></h2>
            <div class="entry">
                    <p><img src="<?php echo get_avatar( get_the_author_email(), $id );?>"width="143" height="143" alt="" class="alignleft border" ><?php 
                    echo get_the_author_meta('user_description',$id);?></p>
            </div>
        </div>
    </div>                
                
</div>
                
<?php get_sidebar();?>
<?php
get_footer();
?>
