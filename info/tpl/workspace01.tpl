
    <!-- System Menu -->
    <!--table width="95%" border="0" cellspacing="0" cellpadding="0" summary="" bgcolor="#FFFFFF" align="center">
        <tr><td colspan="2"><img src="{INFOURL}img/spacer.gif" width="1" height="3" ></td></tr>
        <tr valign="middle">
            <td align="center" colspan="2">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" summary="">
		 <tr><td>&nbsp;</td></tr>
                    <tr valign="middle">
                        <td align="left" style="width: 36px;"><img src="{INFOURL}img/subsys.gif" ></td>
                        <td align="left"><span style="font-size: 16pt; color: #A3A3A3; font-family: 'Ms sans serif', sans-serif; font-weight: bold;">{INFOTITLE}</span></td>
                        <td align="right" style="width: 30px;"><img src="{INFOURL}img/spacer.gif" ></td>
                        <td align="right" style="width: 30px;"><img src="{INFOURL}img/spacer.gif"  width="1" height="23"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr><td colspan="2"><img src="{INFOURL}img/spacer.gif" width="1" height="4" ></td></tr>
        <tr><td colspan="2" bgcolor="#009933"><img src="{INFOURL}img/spacer.gif" width="1" height="4" ></td></tr>
        <tr><td colspan="2"><img src="{INFOURL}img/spacer.gif" width="1" height="9" ></td></tr>
        <tr><td id="bodyspace" valign="top" style="width: 762px">{EXTENDED}</td><td style="width: 1px;"><img id="bodyspace_height" src="{INFOURL}img/spacer.gif" width="1" height="214" ></td></tr>
    </table-->
     <table width="95%" border="0" cellspacing="0" cellpadding="0" summary="" bgcolor="#FFFFFF" align="center">
        <tr><td id="bodyspace" valign="top" style="width: 762px">{EXTENDED}</td><td style="width: 1px;"></td></tr>
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