<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
	define('TTF_DIR',dirname(__FILE__).'/thai-fonts/');
	include_once(dirname(__FILE__).'/jpgraph/jpgraph.php');

	class Jpgraph
	{
		function Jpgraph($params = '')
		{
			if($params <> "")
			{
				foreach ($params as $index => $value)
				{
					include_once(dirname(__FILE__).'/jpgraph/'.$value.'.php');
				}
			}
		}
	}
?>