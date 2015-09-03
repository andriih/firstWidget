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

	function awp_first_widget ()
	{
		register_widget('AWP_Widget');

	}

	class AWP_Widget  extends WP_Widget
	{
		function __construct()
		{
			$args = [
				'name' => 'First Widget',
				'description' => 'First Widget',
				'classname' => 'awp-test',

			];
			parent::__construct('awp_fp','',$args);
		}

		public function widget ()
		{
			
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
				<textarea id = "<?php echo $this->get_field_id('text'); ?>" type = "text" name="<?php echo $this->get_field_name('text'); ?>" value="<?php if(isset($text)) echo esc_attr($text);  ?>" cols="20" rows="5" ></textarea>
			</p>
		<?php
		}
	}
?>

