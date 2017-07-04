<?php

/**
 * The WPAutoLanguage class is the one in charge to make everything related with the duplication
 **/
class WPAutoLanguage{
/**
 *  This method will add all the require hooks
 *  @since 1.0
 **/
  public function addHooks(){
    // A hook when the post is inserted
    add_action( 'wp_insert_post', [ $this , 'my_duplicate_on_publish' ] );
    
    // A hook to add the menu to the page
    add_action('admin_menu', [$this,'page_setup']);
     //add_menu_page( '1', '2', 'manage_options', 'test-plugin', 'page_init' );
  }
  
  /**
   * This method will process the post actions
   **/
  public function post_actions(){
    
    //if( isset( $_POST["action"] ) && $_POST["action"] === "wpautolanguage_update" ){
    
      /**
       * First get the list of languages
       **/
       
      /* $languages = icl_get_languages();
    
      $posts = get_posts(
           array(
            'numberposts'       => -1,
        )
      );*/
      // echo "<pre>";
      //  var_dump( $posts );
      // echo "</pre>";
      // die();
      /*foreach( $posts AS $post ){
       // echo ( $post->post_title ) . "<br />";
        
        foreach( $languages AS $key => $value ){
           //echo $key . "<br />";
            $eid = icl_object_id( $post->ID , 'post',false, $key );
            if( $eid === null ){
              echo 'Missing translation <br />';
            }else{
         //     echo $eid . '<br />';
            }
            
        }*/
        
        //$this -> duplicate_post_with_languages( $post->ID , $post->post_type );
        
     // }
    
      //echo "<pre>";
      //var_dump( $posts );
      //echo "</pre>";
      //die();
      
    //}
    
  }
  
  /**
   * This will generate and set up the menu
   **/
  public function page_setup(){
     add_menu_page('WMPL AutoDuplicate', 'WMPL AutoLanguage ', 'manage_options', 'wp-autoduplicate', [$this,"page_init"]);
  }
  
  /**
   * This method will print the HTML page for the admin area
   **/
  public function page_init(){
        echo file_get_contents( plugin_dir_path( __FILE__ ) . '../pages/main.php' );
  }
  
  /**
   * This method will auto duplicate the posts of the wordpres site. Its intented to work with the sitepress multi language plugin (WPML)
   **/
  public function my_duplicate_on_publish( $post_id ) {
        global $post;
        // don't save for autosave
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }
        // dont save for revisions
        if ( isset( $post->post_type ) && $post->post_type == 'revision' ) {
            return $post_id;
        }
     
        // we need this to avoid recursion see add_action at the end
        remove_action( 'wp_insert_post', 'my_duplicate_on_publish' );
     
        $this -> duplicate_post_with_languages( $post_id , $post );
     
        // must hook again - see remove_action further up
        add_action( 'wp_insert_post', 'my_duplicate_on_publish' );
    }
    
    
    private function duplicate_post_with_languages( $post_id , $post_type  ){
      // make duplicates if the post being saved
            // #1. itself is not a duplicate of another or
            // #2. does not already have translations
     
  
     
            $is_translated = apply_filters( 'wpml_element_has_translations', '', $post_id, $post->post_type );
    
     
            if ( !$is_translated ) {
            
                do_action( 'wpml_admin_make_post_duplicates', $post_id );
            }
    }
    
}
