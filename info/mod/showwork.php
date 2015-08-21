<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<?php		include "../infosys_global.php";
		//$fileNameArr = array("eoffice2info.php","ebudget2info.php");
		$fileNameArr = array("eoffice2info.php");
		$contentArr = array();
		$ct = 0;
		$psId = (! isset($_REQUEST['psId'])? "" : $_REQUEST['psId']);
		$psWgID = (! isset($_REQUEST['psWgID'])? "" : $_REQUEST['psWgID']);
		for($fn=0; $fn<count($fileNameArr); $fn++) { 
			//if(file_exists("../service/".$fileNameArr[$fn])) {
				if(file_get_contents("http://".$GLOBALS["HOST_NAME"].$GLOBALS["ROOT_URL"]."service/".$fileNameArr[$fn]."?psId=".$psId."&weburl=".$GLOBALS["ROOT_URL"])) {
					$contentArr[$ct] = $fn;
					
					$ct++;
				}
			//}
		}
		if($psWgID!='9'){
			echo "<table width=\"95%\"><tr><td><fieldset>";
			if($ct) { echo "<br><legend><font color=\"#FFCC66\" size=3><b>งานที่ต้องดำเนินการ</b></font></legend>"; }
			echo "<table width=\"100%\" border=0 >\n";
			for($ct=0; $ct<count($contentArr); $ct+=2) {
				echo "\t<tr>\n";
				if(isset($contentArr[$ct]))
					echo "\t\t<td width=\"50%\" align=\"left\" valign=\"top\" style=\"WORD-BREAK:BREAK-ALL\">".file_get_contents("http://".$GLOBALS["HOST_NAME"].$GLOBALS["ROOT_URL"]."service/".$fileNameArr[$contentArr[$ct]]."?psId=".$psId."&weburl=".$GLOBALS["ROOT_URL"])."</td>\n";
				if(isset($contentArr[$ct+1]))
					echo "\t\t<td width=\"50%\" align=\"left\" valign=\"top\" style=\"WORD-BREAK:BREAK-ALL\">".file_get_contents("http://".$GLOBALS["HOST_NAME"].$GLOBALS["ROOT_URL"]."service/".$fileNameArr[$contentArr[$ct+1]]."?psId=".$psId."&weburl=".$GLOBALS["ROOT_URL"])."</td>\n";
				echo "\t</tr>\n";
			}
			echo "</table></fieldset></td></tr></table>";
			if($ct) { echo "<br>"; }		
		}
		
?>
</body>
</html>