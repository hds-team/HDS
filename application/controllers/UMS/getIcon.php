<?php 
		if (isset( $_GET['type']) && isset( $_GET['image'])) {
			$type =  $_GET['type'];
			$image =  $_GET['image'];
			$path = "/xampp/htdocs/uploads/{$type}/{$image}";
			if (is_readable($path)) {
				$info = getimagesize($path);
				if ($info !== FALSE) {
					header("Content-type: {$info['mime']}");
					readfile($path);
					exit();
				}
			}
		}
			
?>