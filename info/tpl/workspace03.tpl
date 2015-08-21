
    <!-- System Submenu -->
    <table width="95%" border="0" cellspacing="0" cellpadding="0" summary="" bgcolor="#FFFFFF" align="center">
        <tr><td colspan="2"><img src="{INFOURL}img/spacer.gif" width="1" height="3" ></td></tr>
        <tr valign="middle">
            <td align="center" colspan="2">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" summary="">
                    <tr>
                        <td rowspan="2" valign="top" align="left" style="width: 69px;"><img src="{SYSTEMICO}" ></td>
                        <td valign="top" align="left" style="font-size: 16pt; font-weight: bold; color: #11387D;">{SYSTEMNAME}</td>
                        <td rowspan="2" valign="top" align="right" style="width: 1px;"><img src="{INFOURL}img/spacer.gif" width="1" height="48" ></td>
                        <td rowspan="2" valign="bottom" align="right" style="width: 100px; cursor: pointer;"><img id="sysx_detail" src="{INFOURL}img/level-up.gif"  onclick="window.location.replace('{INFOURL}infosys.php')"></td>
                    </tr>
                    <tr><td valign="top" align="left" style="font-size: 14pt; font-weight: normal; color: #898989;">{SYSTEMSGRP}</td></tr>
                </table>
            </td>
        </tr>
        <tr><td colspan="2"><img src="{INFOURL}img/spacer.gif" width="1" height="4" ></td></tr>
        <tr><td colspan="2" bgcolor="#009933"><img src="{INFOURL}img/spacer.gif" width="1" height="4" ></td></tr>
        <tr><td colspan="2"><img src="{INFOURL}img/spacer.gif" width="1" height="9" ></td></tr>
        <tr><td id="bodyspace" valign="top" style="width: 762px;">{EXTENDED}</td><td style="width: 1px;"><img id="bodyspace_height" src="{INFOURL}img/spacer.gif" width="1" height="214" ></td></tr>
    </table>
    <div id="sysx_content" style="display: none; position: absolute; height: 20px;">
        <span id="sysx_text" style="margin: 2px; font-weight: bold; color: #6699FF;">{SYSXDETAIL}</span>
    </div>
    <script type="text/javascript" language="JavaScript">
    function adjustSpaceHeight ( )
    {
        var LeftCntId = document.getElementById("LeftContent");
        var bdyspaceId = document.getElementById("bodyspace_height");
        if (LeftCntId && bdyspaceId)
            bdyspaceId.height = LeftCntId.offsetHeight - 72;
    }
    setTimeout("adjustSpaceHeight()", 50);
    function showSysContent ( )
    {
        var posId = document.getElementById("sysx_detail");
        var conId = document.getElementById("sysx_content");
        var txtId = document.getElementById("sysx_text");
        if (posId && conId && txtId) {
            if (txtId.innerHTML != "") {
                conId.style.display = "";
                conId.style.width = (txtId.offsetWidth + 10) + "px";
                conId.style.left = (getOffsetLeft(posId) - conId.offsetWidth) + "px";
                conId.style.top = (getOffsetTop(posId) + 9) + "px";
            }
        }
    }
    setTimeout("showSysContent()", 100);
    </script>