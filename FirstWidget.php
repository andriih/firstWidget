<?php
	
	/*
	Plugin Name: FirstWidget
	Description: FirstWidget
	Plugin URI: http://#
	Author: Andrii Hnatyshyn
	Author URI: http://#
	Version: 1.0
	License: GPL2
	Text Domain: Text Domain
	Domain Path: Domain Path
	*/
	add_action('widgets_init' , 'awp_first_widget' );

	function awp_first_widget () //
	{
		register_widget('AWP_Widget');

	}

	class AWP_Widget  extends WP_Widget
	{
		function __construct() //реєстрація віджета  в панелі адмінки
		{
			$args = [
				'name' => 'First Widget',
				'description' => 'First Widget',
				'classname' => 'awp-test',

			];
			parent::__construct('awp_fp','',$args);
		}

		public function widget ($args,$instance) // функція що відповідає за показ віджета на сторінці
		{
// var_dump($instance);
// var_dump($args);

			extract($args);
			extract($instance);

			$title = apply_filters('widget_title' , $title);
			$text = apply_filters('widget_text' , $text);

			echo $before_widget;
				echo $before_title.$title.$after_title;
				echo $text;
			echo $after_widget;
		}

		public function form ($instance)
		{
		extract($instance);
		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Заголовок:</label>
				<input  id = "<?php echo $this->get_field_id('title'); ?>" type = "text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php if(isset($title)) echo esc_attr($title );  ?>">
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('text'); ?>">Текст:</label>
				<textarea id = "<?php echo $this->get_field_id('text'); ?>" type = "text" name="<?php echo $this->get_field_name('text'); ?>"  cols="20" rows="5" ><?php if(isset($text)) echo esc_attr($text);  ?></textarea>
			</p>
		<?php
		}

		function update($new_instance,  $$old_instance)
		{
			$new_instance['title'] = !empty($new_instance['title']) ? strip_tags($new_instance['title']) : '';
			$new_instance['text'] = str_replace('<p>', '', $new_instance['text']);
			$new_instance['text'] = str_replace('</p>', '<br>', $new_instance['text']);
			return $new_instance;

		};
	}
?>

