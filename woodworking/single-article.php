<?php
get_header();?>
<div id="page">
  <div class="content">
    <div class="post">
        <h2 class="title"><a href="#"><?php the_title();?></a></h2>
        <p class="meta">Posted by <a href="#"><?php the_author();?><?php the_author()?></a><?php echo get_the_date();?>
        &nbsp;&bull;&nbsp; <a href="#" class="comments">Comments (64)</a> &nbsp;&bull;&nbsp; <a href="#" class="permalink">Full article</a></p>
        <div class="entry">
            <?php $thumb_id = get_post_thumbnail_id();
              $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
              $thumb_url = $thumb_url_array[0];
            ?>
            <p><img src="<?php echo $thumb_url;?>" width="143" height="143" alt="" class="alignleft border" ></p>
            <?php
              the_content();?>
            <?php
                $publisher = get_post_meta(get_the_ID(),'article_publisher_name',true);
            ?>
          <h1>Plugin metabox content is: <?php echo $publisher;?></h1>
        </div>
    </div> 
  </div>
</div>
                
                                
<?php get_sidebar();?>
<?php get_footer() ?>