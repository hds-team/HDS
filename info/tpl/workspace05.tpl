
    <!-- Build-in modules -->
    <table width="95%" border="0" cellspacing="0" cellpadding="0" summary="" bgcolor="#FFFFFF" align="center">
        <tr><td colspan="2"><img src="{INFOURL}img/spacer.gif" width="1" height="3" ></td></tr>
        <tr valign="middle">
            <td align="center" colspan="2">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" summary="">
                    <tr>
                        <td rowspan="2" valign="top" align="left" style="width: 69px;"><img src="{SYSTEMICO}" ></td>
                        <td valign="top" align="left" style="font-size: 16pt; font-weight: bold; color: #11387D;">{SYSTEMNAME}</td>
                        <td rowspan="2" valign="top" align="right" style="width: 1px;"><img src="{INFOURL}img/spacer.gif" width="1" height="48" ></td>
                        <td rowspan="2" valign="bottom" align="right" style="width: 100px; cursor: pointer;"><img src="{INFOURL}img/level-up.gif"  onclick="window.location.replace('{INFOURL}infosys.php?__m=config')"></td>
                    </tr>
                    <tr><td valign="top" align="left" style="font-size: 14pt; font-weight: normal; color: #898989;">{SYSTEMSGRP}</td></tr>
                </table>
            </td>
        </tr>
        <tr><td colspan="2"><img src="{INFOURL}img/spacer.gif" width="1" height="4" ></td></tr>
        <tr><td colspan="2" bgcolor="#009933"><img src="{INFOURL}img/spacer.gif" width="1" height="4" ></td></tr>
        <tr><td colspan="2"><img src="{INFOURL}img/spacer.gif" width="1" height="9" ></td></tr>
        <tr><td id="bodyspace" valign="top" style="width: 762px">{EXTENDED}</td><td style="width: 1px;"><img id="bodyspace_height" src="{INFOURL}img/spacer.gif" width="1" height="214" ></td></tr>
    </table>
    <script type="text/javascript" language="JavaScript">
    function adjustSpaceHeight ( )
    {
        var LeftCntId = document.getElementById("LeftContent");
        var bdyspaceId = document.getElementById("bodyspace_height");
        if (LeftCntId && bdyspaceId)
            bdyspaceId.height = LeftCntId.offsetHeight - 72;
    }
    setTimeout("adjustSpaceHeight()", 50);
    </script>