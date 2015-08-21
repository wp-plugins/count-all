<?php
/*
 * Plugin Name: Count All
 * Version: 0.3
 * Plugin URI: http://omgjava.blogspot.com
 * Description: Originally developed as a baby age counter. Can be used for anything else. Highly configurable, allows multiple instances.
 * Author: Agoston Horvath
 * Author URI: http://omgjava.wordpress.com
 */

/*
  Dedicated to my little daughter, Viktoria. May she rest in peace.
  http://www.youtube.com/watch?v=03ZlZp3C-t4
*/

/* 
   This plugin is based on Jesse Altman's great HelloWorld plugin:
   http://jessealtman.com/2009/06/08/tutorial-wordpress-28-widget-api/
   Many thanks to Jesse Altman for the great article!
*/

class CountAllWidget extends WP_Widget
{
 /**
  * Declares the HelloWorldWidget class.
  *
  */
    function __construct() {
      $widget_ops = array('classname' => 'widget_count_all', 'description' => __( "Count All Widget") );
      /*$control_ops = array('width' => 300, 'height' => 300);*/
      $control_ops = array();
      parent::__construct('CountAllWidget', __('Count All Widget'), $widget_ops, $control_ops);
    }

  /**
    * Displays the Widget
    *
    */
    function widget($args, $instance){
      extract($args);
      // we want to allow people to put html in these strings
      //$title = apply_filters('widget_title', empty($instance['title']) ? '&nbsp;' : $instance['title']);
      $title = $instance['title'];
      $content = $instance['content'];
      $date_in = $instance['date'];

      # Before the widget
      echo $before_widget;

      # The title
      echo $before_title . $title . $after_title;

      # get current date
      $now = new DateTime();
      $date = new DateTime($date_in);
      
      $datediff = $now->diff($date);
      
      # now format output
      $content = $datediff->format($content);

      # Make the Hello World Example widget
      echo $content;

      # After the widget
      echo $after_widget;
  }

  /**
    * Saves the widgets settings.
    *
    */
    function update($new_instance, $old_instance){
      $instance = $old_instance;
      // we want to allow people to put html in these fields
      //$instance['title'] = strip_tags(stripslashes($new_instance['title']));
      //$instance['lineTwo'] = strip_tags(stripslashes($new_instance['lineTwo']));
      $instance['title'] = $new_instance['title'];
      $instance['content'] = $new_instance['content'];
      $instance['date'] = $new_instance['date'];

    return $instance;
  }

  /**
    * Creates the edit form for the widget.
    *
    */
    function form($instance){
      //Defaults
      $instance = wp_parse_args( (array) $instance, array('title'=>'', 'content'=>'', 'date'=>'') );

      $title = htmlspecialchars($instance['title']);
      $content = htmlspecialchars($instance['content']);
      $date = htmlspecialchars($instance['date']);

      # Output the options
      # title
      echo '<p style="text-align:right;"><label for="' . $this->get_field_name('title') . '">' . __('Title:') . ' <input style="width: 200px;" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></label></p>';
      # content
      echo '<p style="text-align:right;"><label for="' . $this->get_field_name('content') . '">' . __('Content:') . ' <input style="width: 200px;" id="' . $this->get_field_id('content') . '" name="' . $this->get_field_name('content') . '" type="text" value="' . $content . '" /></label></p>';
      # date
      echo '<p style="text-align:right;"><label for="' . $this->get_field_name('date') . '">' . __('Date (YYYY-MM-DD HH:MM):') . ' <input style="width: 200px;" id="' . $this->get_field_id('date') . '" name="' . $this->get_field_name('date') . '" type="text" value="' . $date . '" /></label></p>';
  }

}// END class

/**
  * Register Hello World widget.
  *
  * Calls 'widgets_init' action after the Hello World widget has been registered.
  */
  function CountAllInit() {
    register_widget('CountAllWidget');
  }
  add_action('widgets_init', 'CountAllInit');
?>
