
    <table cellpadding="0" cellspacing="0" border="0" align="left" summary="">
    <tr>
      <td valign="top"><img src="{INFOURL}img/spacer.gif" width="2" height="220" ></td>
      <td>
        <span style="font-size: 12pt; font-family: MS Sans Serif, sans-serif; font-weight: bold; color: #11387D; margin: 0px; padding: 0px;">����¹���ʼ�ҹ</span>
        <p style="font-weight: bold; font-family: MS Sans Serif, sans-serif; color: #666666;">��鹵͹�������¹���ʼ�ҹ - ����͡�͡�����ŵ���������ҧ��ҧ�ú���������꡷����� "���Թ���" ��������¹���ʼ�ҹ</p>
        <div style="height: 2px;">
          <hr style="border: 1px solid #1A6BF9">
        </div>
        <form name="chpasswd" style="margin: 0px;" method="post" action="{INFOINDEX}?__m=config&__sb=chpasswd&__mx=change" id="chpasswd" target="transparent">
          <table cellpadding="0" cellspacing="0" border="0" summary="">
            <tr>
              <td valign="top" align="right"><label style="font-weight: bold; font-family: MS Sans Serif, sans-serif; color: #666666;">����������к� :&nbsp;</label></td>
              <td valign="top">
                <span style="font-weight: bold; font-family: MS Sans Serif, sans-serif; color: #0000FF; font-size: 10pt;">{USERLOGIN}</span>
                <div style="height: 25px; font-size: 8pt;">
                  &nbsp;
                </div>
              </td>
            </tr>
            <tr>
              <td valign="top" align="right"><label style="font-weight: bold; font-family: MS Sans Serif, sans-serif; color: #666666;">���ʼ�ҹ�Ѩ�غѹ :&nbsp;</label></td>
              <td valign="top">
                <input name="CurPWD" type="password" maxlength="16" value="" style="height: 12px; color: #0000FF; width: 160px;" onkeyup="ValidPasswd(this.form, this)" onfocus="this.select()" onchange="ReValidate(this.form, this)">
                <div style="height: 25px; font-size: 8pt; color: #777777;">
                  �����׹�ѹ�������Ңͧ���ʼ�ҹ
                </div>

              </td>
            </tr>

            <tr>
              <td valign="top" align="right"><label style="font-weight: bold; font-family: MS Sans Serif, sans-serif; color: #666666;">���ʼ�ҹ���� :&nbsp;</label></td>
              <td valign="top">
                <input name="NewPW1" type="password" maxlength="16" value="" style="height: 12px; color: #FF0000; width: 160px;" onkeyup="ValidPasswd(this.form, this)" onfocus="this.select()" onchange="ReValidate(this.form, this)">
                <div style="height: 25px; font-size: 8pt; color: #777777;">
                  �����¡��� 6 ����ѡ�� �����ժ�ͧ��ҧ
                </div>
              </td>
            </tr>
            <tr>
              <td valign="top" align="right"><label style="font-weight: bold; font-family: MS Sans Serif, sans-serif; color: #666666;">�׹�ѹ���ʼ�ҹ���� :&nbsp;</label></td>
              <td valign="top">
                <input name="NewPW2" type="password" maxlength="16" value="" style="height: 12px; color: #FF0000; width: 160px;" onkeyup="ValidPasswd(this.form, this)" onfocus="this.select()" onchange="ReValidate(this.form, this)">&nbsp;<img id="checkePwd" src="{INFOURL}img/ok.gif"  style="display: none;">
                <div style="height: 25px; font-size: 8pt; color: #777777;">
                  �����׹�ѹ�����١��ͧ���ʼ�ҹ����
                </div>
                </td>
            </tr>
          </table>
            <div style="height: 2px;">
              <hr style="border: 1px solid #1A6BF9">
            </div>
          <div style="text-align: right">
            <nobr><input id="Continue" type="submit" name="Continue" value=" ���Թ��� " style="font-weight: bold;" disabled="disabled">&#160;&#160;<input type="button" name="Cancel" value="   ¡��ԡ  " style="font-weight: bold;" onclick="window.location.replace('{INFOURL}infosys.php?__m=config')"></nobr>
          </div>
        </form>
        <table cellpadding="0" cellspacing="0" border="0" width="618" style="font-size:0;">
          <tr>
            <td>&#160;</td>
          </tr>
        </table>
      </td>
      <td valign="top"><span style="font-size:0;">&#160;</span></td>
    </tr>
    </table>
    <script type="text/javascript" language="JavaScript">
    function ReValidate (el, elc)
    {
        if (!ValidPasswd.active)
            ValidPasswd (el, elc);
        ValidPasswd.active = false;
    }
    function ValidPasswd (el, elc)
    {
        ValidPasswd.active = true;
        if (/\s/.test(elc.value)) {
            alert("���ʼ�ҹ��ͧ��������¡��� 6 ����ѡ�� ��������ժ�ͧ��ҧ  ");
            ValidPasswd.alerted = true;
        }
        ViewCheckImage(el, elc);
    }
    function ViewCheckImage (el, elc)
    {
        if (el && elc) {
            var imgId = document.getElementById("checkePwd");
            var SmtId = document.getElementById("Continue");
            if (imgId && SmtId) {
                var Trimed1 = trim(el.NewPW1.value);
                var Trimed2 = trim(el.NewPW2.value);
                if (Trimed1 == Trimed2 && Trimed1 != "" && Trimed1.length >= 6) {
                    if (trim(el.CurPWD.value) == "" || /\s/.test(el.CurPWD.value)) {
                        imgId.style.display = "none";
                        SmtId.disabled = true;
                        if (!ValidPasswd.alerted)
                            alert("��س�������ʼ�ҹ�����͹ ��������ժ�ͧ��ҧ  ");
                        el.CurPWD.focus();
                    } else if (/\s/.test(elc.value)) {
                        imgId.style.display = "none";
                        SmtId.disabled = true;
                        elc.focus();
                    } else {
                        imgId.style.display = "";
                        SmtId.disabled = false;
                    }
                } else {
                    imgId.style.display = "none";
                    SmtId.disabled = true;
                }
                ValidPasswd.alerted = false;
            }
        }
    }
    function ResetCurPWD ( )
    {
        var imgId = document.getElementById("checkePwd");
        var SmtId = document.getElementById("Continue");
        if (imgId && SmtId) {
            imgId.style.display = "none";
            SmtId.disabled = true;
            chpasswd.CurPWD.focus();
        }
    }
    </script>