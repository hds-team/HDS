<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title> {TITLE} </title>
    <meta http-equiv="Content-Type" content="text/html; charset=tis-620">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <link type="text/css" href="css/prelogin.css" rel="stylesheet">
    <script type="text/javascript" language="JavaScript" src="js/gbutils.js"></script>
    <script type="text/javascript" language="JavaScript" src="js/prelogutils.js"></script>
    <script type="text/javascript" language="JavaScript">
    </script>
</head>

<body>
<table class="mainbody" cellspacing="0" cellpadding="0" border="0" summary="">
    <tr>
        <td colspan="3" class="logozone"><img src="{SYSLOGO}" ></td>
    </tr>
    <tr>
        <td class="fixedleftzone"><img src="img/spacer.gif" width="190" height="1" ></td>
        <td class="fixedrightzone"><img src="img/spacer.gif" width="795" height="1" ></td>
        <td class="fixedwspacezone"><img src="img/spacer.gif" width="1" height="1" ></td>
    </tr>
    <tr>
        <td class="leftzone" align="center" valign="top" id="LeftContent">{LEFTSIDE}</td>
        <td class="rightzone" align="center" valign="top" id="RightContent">{RIGHTSIDE}</td>
        <td class="wspacezone"><img src="img/spacer.gif" width="1" height="530" ></td>
    </tr>
    <tr>
        <td colspan="3" class="footerzone"><img src="img/infosysfooter.jpg" ></td>
    </tr>
    <tr>
        <td colspan="3" class="fixedfooterzone"><img class="fixedfooterzone" src="img/spacer.gif" ></td>
    </tr>
</table>
<div style="display: none">
    <iframe id="transparent" name="transparent" src="blank.html"></iframe>
</div>

<iframe id="transcal" name="trans" style="display: none; position: absolute;" scrolling="no" frameborder="0"></iframe>
<table id="calendar" style="display: none; position: absolute; background-color: #eeeeee;" summary="">
    <tr class="header">
        <th id="calendarHeader" colspan="6" style="border-right: none !important">&nbsp;</th><th style="border-left: none !important"><img src="img/close_ico.gif"  style="float: right; cursor: pointer;" onclick="closeCalendar(true)"></th>
    </tr>
    <tr class="days">
        <th>อา</th>
        <th>จ</th>
        <th>อ</th>
        <th>พ</th>
        <th>พฤ</th>
        <th>ศ</th>
        <th>ส</th>
    </tr>
    <tr>
        <td class="weekend"><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td class="weekend"><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
    </tr>
    <tr>
        <td class="weekend"><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td class="weekend"><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
    </tr>
    <tr>
        <td class="weekend"><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td class="weekend"><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
    </tr>
    <tr>
        <td class="weekend"><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td class="weekend"><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
    </tr>
    <tr>
        <td class="weekend"><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td class="weekend"><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
    </tr>
    <tr>
        <td class="weekend"><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
        <td class="weekend"><a href="javascript://" onclick="setTargetDate(event, this); return false;" ondblclick="displayDate(event); return false;">&nbsp;</a></td>
    </tr>
    <tr class="footer">
        <td colspan="2" style="text-align:left;">
            <a class="button" href="javascript://" title="ปีก่อนหน้านี้" onclick="addYears(event, -1); return false;">&lt;&lt;</a>
            <a class="button" href="javascript://" title="เดือนก่อนหน้านี้" onclick="addMonths(event, -1); return false;">&lt;</a>
        </td>
        <td colspan="3" style="text-align:center;">
            <a class="button" href="javascript://" title="ใช้วันที่เลือกเอาไว้" onclick="displayDate(event); return false;">เลือก</a>
            <a class="button" href="javascript://" title="กำหนดปฏิทินให้เป็นวันปัจจุบัน" onclick="targetDate = new Date(); setCalendar(event); return false;">เริ่มใหม่</a>
        </td>
        <td colspan="2" style="text-align:right;">
            <a class="button" href="javascript://" title="เดือนถัดไป" onclick="addMonths(event, 1); return false;">&gt;</a>
            <a class="button" href="javascript://" title="ปีถัดไป" onclick="addYears(event, 1); return false;">&gt;&gt;</a>
        </td>
    </tr>
</table>

</body>

</html>
