<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
	include_once(getcwd().'/ckeditor/ckeditor_php5.php');
	class Lib_ckeditor extends CKEditor
	{
		function __construct($basePath='')
		{
			if(is_null($basePath) || $basePath =='')
				$basePath = base_url().'/ckeditor/';
			parent::__construct($basePath);
			$this->config['height'] = 100;
			$this->config['width'] = 465;
			$this->config['resize_enabled'] = false;
			$this->config['toolbar'] = array(
						array('Bold', 'Italic', 'Underline', 'Strike','Subscript','Superscript','-','Cut','Copy','Paste','Undo','Redo','-','Link', 'Unlink'), // put '-' in array for apart segtion of tools
					);
		}
	}
?>