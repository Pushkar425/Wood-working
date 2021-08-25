<?php
get_header();?>
    
<h1 id='category'><?php single_cat_title(); ?></h1>
<div id="page">
    <?php
        if ( have_posts() ) {
            $i=0;
            while ( have_posts() ) {
                $i++;
                the_post();
    ?>
    <div class="content">    
        <div class="post">
            <h2 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
            <?php $id=get_post_field( 'post_author' )?>
            <p class="meta">Posted by <a href="<?php echo get_the_author_meta('user_url',$id); ?>"><?php the_author();?></a> on <a href="<?php //echo get_the_date();?>"><?php echo get_the_date();?></a>
            &nbsp;&bull;&nbsp; <a href="#" class="comments">Comments (64)</a> &nbsp;&bull;&nbsp; <a href="<?php the_permalink();?>" class="permalink">Full article</a></p>
            <div class="entry">
                <?php $thumb_id = get_post_thumbnail_id();
                    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                    $thumb_url = $thumb_url_array[0];
                ?>
                <?php if($i == 1){?>
                <p><img src="<?php echo $thumb_url;?>" width="143" height="143" alt="" class="alignleft border" >This is <strong>Wood Working </strong>, a free, fully standards-compliant CSS template designed by <a href="http://www.freecsstemplates.org/" rel="nofollow">. This free template is released under a <a href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attributions</a>license, so you’re pretty much free to do whatever you want with it (even use it commercially) provided you keep the links in the footer intact. Aside from that, have fun with it </p>
                <?php
                    str_replace("&nbps;","",the_content());?>
                <?php }else{?>
                    <p><img src="<?php echo $thumb_url;?>"width="143" height="143" alt="" class="alignleft border" ><?php 
                    the_content();}?></p>
            </div>
        </div>
    </div>                
    <?php
            }
        }
    ?>
</div>
                
<?php get_sidebar();?>
<?php
get_footer();


?>