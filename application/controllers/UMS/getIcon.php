<?php 
		echo "GET ICON";
		if (isset( $_GET['type']) && isset( $_GET['image'])) {
			$type =  $_GET['type'];
			$image =  $_GET['image'];
			echo "<BR>TYPE : ".$type;
			echo "<BR>IMG : ".$image;
			$path = "/uploads/{$type}/{$image}";
			echo "<BR>PATH : ".$path;
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