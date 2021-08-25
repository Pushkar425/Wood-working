<?php
get_header();?>
<div id="page">
     <div class="content">
          <div class="post">
               <h2 class="title"><a href="#"><?php the_title();?></a></h2>
               <p class="meta">Posted by <a href="#">Someone</a>on July 08, 2011
               &nbsp;&bull;&nbsp; <a href="#" class="comments">Comments (64)</a> &nbsp;&bull;&nbsp; <a href="#" class="permalink">Full article</a></p>
               <div class="entry">
                    <?php $thumb_id = get_post_thumbnail_id();
                         $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                         $thumb_url = $thumb_url_array[0];
                    ?>
                    <p><img src="<?php echo $thumb_url;?>" width="143" height="143" alt="" class="alignleft border" >This is <strong>Wood Working </strong>, a free, fully standards-compliant CSS template designed by <a href="http://www.freecsstemplates.org/" rel="nofollow">. This free template is released under a <a href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attributions</a>license, so you’re pretty much free to do whatever you want with it (even use it commercially) provided you keep the links in the footer intact. Aside from that, have fun with it </p>
                    <?phpthe_content();?>
               </div>
          </div>
     </div>   
<?php get_sidebar();?>
</div>
<?php get_footer() ?>