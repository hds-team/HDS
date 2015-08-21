
<fieldset style="border: 1px solid #909090; width: 760px;">
    <table width="758" border="0" align="center" cellpadding="5" cellspacing="5" summary="">
    	<tr>
    		<td align="left" valign="top">
            {CHPASSWD}
            </td>
    		<td style="width: 1px;">
                <img id="extended_height" src="img/spacer.gif"  width="1" height="400">
            </td>
        </tr>
    </table>
    <script type="text/javascript" language="JavaScript">
    function adjustFieldsetHeight ( )
    {
        var LeftCntId = document.getElementById("LeftContent");
        var extspaceId = document.getElementById("extended_height");
        if (LeftCntId && extspaceId) {
            extspaceId.height = LeftCntId.offsetHeight - 109;
        }
    }
    setTimeout("adjustFieldsetHeight()", 150);
    </script>
</fieldset>