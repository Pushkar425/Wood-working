<?php
    //register menu
    register_nav_menus(
        array('primary-menu'=> 'Header Menu')
    );

    //register sidebar
    register_sidebar(
        array('name'=>'Sidebar Location','id'=> 'sidebar')
    );
    add_theme_support('custom-header');

    //add styles
    function load_style(){
         wp_register_style('stylesheet',get_template_directory_uri().'/style.css',array(),false,'all');
         wp_enqueue_style('stylesheet');

     }
     add_action( 'wp_enqueue_scripts', 'load_style' );

    //create custom post type
    function create_posttype(){
        $supports =array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', );
        $labels= array(
                     'name' => _x('Article', 'Post Type General Name', 'Woodworking'),
                     'singular_name' =>_x( 'Article', 'Post Type Singular Name', 'Woodworking' ),
                     'menu_name'           => __( 'Article', 'admin menu' ),
                     'parent_item_colon'   => __( 'Parent Article', 'Woodworking' ),
                     'all_items'           => __( 'All Article', 'Woodworking' ),
                     'view_item'           => __( 'View Article', 'Woodworking' ),
                     'add_new_item'        => __( 'Add New Article', 'Woodworking' ),
                     'add_new'             => __( 'Add New', 'Woodworking' ),
                     'edit_item'           => __( 'Edit Article', 'Woodworking' ),
                     'update_item'         => __( 'Update Article', 'Woodworking' ),
                     'search_items'        => __( 'Search Article', 'Woodworking' ),
                     'not_found'           => __( 'Not Found', 'Woodworking' ),
                     'not_found_in_trash'  => __( 'Not found in Trash', 'Woodworking' ),
                 );
         $args= array(
             'supports'=>$supports,
             'labels'=> $labels,
             'public'=> true,
             'has_archive'=> false,
             //'capability_type'     => 'post',
             'rewrite'=> array('slug'=>'article'),
            );
        
            register_post_type('article',$args);
     }
     add_action( 'init', 'create_posttype' );

    //create custom texonomy
    function create_texonomy(){
         $labels=array(
             'name'=>'Article_Categories',
             'singular_name'=>'Article_Category',
             'search_items'=>'Search Category',
             'all_items'=>'All Articles',
             'parent_item'=>'Parent Category',
             'parent_item_colon'=>'Parent Article:',
             'edit_item'=>'Edit Article',
             'update_item'=>'Update Article',
             'add_new_item'=>'Add New Category',
             'new_item-name'=>'New Article Name',
             'menu_name'=>'Article Category'
         );
         $args= array(
             'hierarchical'=>true,
             'labels'=>$labels,
             'show_ui'=>true,
             'show_admin_column'=>true,
             'query_var'=>true,
             'rewrite'=>array('slug'=>'articleType')
         );
         register_taxonomy('type',array('article'),$args);
     }
     add_action('init','create_texonomy');





     //use WP_Widget;
     class Custom_Widget extends WP_Widget {
 
        function __construct() {
     
            parent::__construct(
                'custom_widget',  // Base ID
                'custom_post'   // Name
                //[ 'description' => __( 'A Custom Post Widget', 'Woodworking' ), ]// Args
            );
        }
     
        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args     Widget arguments.
         * @param array $instance Saved values from database.
         */
        public $args = array(
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
            'before_widget' => '<div class="widget-wrap">',
            'after_widget'  => '</div></div>'
        );
     
        public function widget( $args, $instance ) {
            extract( $args );
            $title = apply_filters( 'widget_title', $instance['title'] );
     
            echo $before_widget;
            if ( ! empty( $title ) ) {
                echo $before_title . $title . $after_title;
            }
                $warti = array('post_type'=>'article','post_status'=>'publish');
                $articlequery = new Wp_Query($warti);
                while($articlequery->have_posts()){
                    $articlequery->the_post();     
?>
                <li class="custom"><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
            <?php }
            
            echo $after_widget;
        }
     
        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form( $instance ) {
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }
            else {
                $title = __( 'Custom Posts', 'Woodworking' );
            }
            ?>
            <!--<p>
                <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:','Woodworking' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
             </p>-->
        <?php
        }
     
        /**
         * Sanitize widget form values as they are saved.
         *
         * @see WP_Widget::update()
         *
         * @param array $new_instance Values just sent to be saved.
         * @param array $old_instance Previously saved values from database.
         *
         * @return array Updated safe values to be saved.
         */
        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
     
            return $instance;
        }
     
    } 
    add_action( 'widgets_init', 'wpdocs_register_widgets' );
 
function wpdocs_register_widgets() {
    register_widget( 'Custom_Widget' );
}
 
    
?>