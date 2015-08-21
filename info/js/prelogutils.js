//
// Pre-Login Utilities.
//

function preAuthen (fRefn)
{
    var uRefn = fRefn.elements["Username"];
    var pRefn = fRefn.elements["Password"];
    var rRefn = fRefn.elements["Remember"];
    var eRefn = fRefn.elements["eRemember"];
    var uFlag = (trim(uRefn.value) == "");
    var pFlag = (trim(pRefn.value) == "");
    var retval = true;

    if (uFlag || pFlag) {
        var alertmsg = document.getElementById("alertzone");
        if (alertmsg) {
            alertmsg.style.display = "block";
            if (uFlag)
                uRefn.focus();
            else if (pFlag)
                pRefn.focus();
        }
        retval = false;
    } else {
        rRefn.value = "uc";
        eRefn.value = "uc";
        if (ReadUserInfo.haveCookie && ReadUserInfo.usinfo) {
            if (ReadUserInfo.usinfo[1] == pRefn.value) {
                rRefn.value = "ce";
                eRefn.value = "ce";
            }
        }
    }
    return retval;
}

function printErrMsg ( )
{
    var fRefn = document.forms["SignInFrm"];
    var pRefn = fRefn.elements["Password"];
    var rContRefn = document.getElementById("RightContent");
    var alertmsg = document.getElementById("alertzone");
    var AlertMesgId = document.getElementById("AlertMesg");
    if (alertmsg && rContRefn && AlertMesgId) {
        if (printDebugMsg.oldContent)
            rContRefn.innerHTML = printDebugMsg.oldContent;
        alertmsg.style.display = "";
        AlertMesgId.style.color = "#F4211E";
        hideAlertMsg.Response = false;
    }
}

function redirectURL (newURL)
{
    window.location.replace(newURL);
}

function reloadPage ( )
{
    window.history.go(0);
}

function printDebugMsg (mesg)
{
    var rContRefn = document.getElementById("RightContent");
    var alertmsg = document.getElementById("alertzone");
    if (rContRefn && alertmsg && mesg) {
        printDebugMsg.oldContent = rContRefn.innerHTML;
        alertmsg.style.display = "none";
        rContRefn.innerHTML = mesg;
    }
}

function ReadUserInfo ( )
{
    var usinfo = "infosys_userinfo";
    var fname = "SignInFrm";
    var cookie = extractCookies();
    if (cookie[usinfo]) {
        setDefaultUsInfo(fname, cookie[usinfo]);
        ReadUserInfo.haveCookie = true;
    }
}

function setDefaultUsInfo (fname, usinfo_value)
{
    var fref = document.forms[fname];
    var usinfo = usinfo_value.split("{[<->]}");
    if (usinfo[0] && usinfo[1]) {
        fref.elements["Username"].value = usinfo[0];
        fref.elements["Password"].value = usinfo[1];
        fref.elements["Remember"].checked = true;
        ReadUserInfo.usinfo = usinfo;
    }
}

function hideAlertMsg ( )
{
    var AlertMesgId = document.getElementById("AlertMesg");
    var alertMsZone = document.getElementById("alertzone");
    if (alertMsZone && AlertMesgId && !hideAlertMsg.Response) {
        AlertMesgId.style.color = "#11387D";
        hideAlertMsg.Response = true;
        alertMsZone.style.display = "none"; // extended code
    }
}

//
// Calendar
//
var eoZindex = 1000;
var targetDate = new Date();

function setCalendar (event)
{
    var el, tableEl, rowEl, cellEl, linkEl;
    var tmpDate, tmpDate2;
    var i, j;
    document.body.style.display = "none";
    el = document.getElementById("calendarHeader").firstChild;
    el.nodeValue = targetDate.getMonthName() + "\u00a0" + (targetDate.getFullYear() + 543);

    tmpDate = new Date(Date.parse(targetDate));
    tmpDate.setDate(1);
    while (tmpDate.getDay() != 0) {
        tmpDate.addDays(-1);
    }

    tableEl = document.getElementById("calendar");
    for (i = 2; i <= 7; i++) {
        rowEl = tableEl.rows[i];
        tmpDate2 = new Date(Date.parse(tmpDate));
        tmpDate2.addDays(6);
        if (tmpDate.getMonth()  != targetDate.getMonth() && tmpDate2.getMonth() != targetDate.getMonth())
            rowEl.className = "empty";
        else
            rowEl.className = "";
        for (j = 0; j < rowEl.cells.length; j++) {
            cellEl = rowEl.cells[j];
            linkEl = cellEl.firstChild;
            if (tmpDate.getMonth() == targetDate.getMonth()) {
                linkEl.date = new Date(Date.parse(tmpDate));
                s = tmpDate.toString().split(" ");
                linkEl.title = s[0] + " " + s[1] + " " + s[2] + ", " + s[s.length - 1];
                linkEl.title = "วัน" + tmpDate.thaiDay[s[0]] + "ที่ " + s[2] + " " + tmpDate.monthNames[tmpDate.getMonth()]; 
                linkEl.firstChild.nodeValue = tmpDate.getDate();
                linkEl.style.display = "";
            } else {
                linkEl.style.display = "none";
            }
            if (cellEl.oldClass == null)
                cellEl.oldClass = cellEl.className;
            if (Date.parse(tmpDate) == Date.parse(targetDate))
                cellEl.className = cellEl.oldClass + " target";
            else
                cellEl.className = cellEl.oldClass;
            tmpDate.addDays(1);
        }
    }
    document.body.style.display = "";
    setCalendar.trans.style.width = tableEl.offsetWidth + "px";
    setCalendar.trans.style.height = tableEl.offsetHeight + "px";
}

function addMonths (event, n)
{
    targetDate.addMonths(n);
    setCalendar(event);
}

function addYears (event, n)
{
    targetDate.addYears(n);
    setCalendar(event);
}

function setTargetDate (event, link)
{
    if (link.date != null) {
        targetDate = new Date(Date.parse(link.date));
        setCalendar(event);
    }
}

function displayDate (event)
{
    var oldVal = setCalendar.targetInput.value;
    setCalendar.targetInput.value = formatDate(targetDate);
    if (IsValidDate(setCalendar.targetInput)) {
        closeCalendar();
    } else {
        if (setCalendar.targetInput.tagName == "INPUT")
            setCalendar.targetInput.value = oldVal;
        else
            setCalendar.targetInput.innerHTML = oldVal;
    }
}

function formatDate ( )
{
    var mm, dd, yyyy;
    mm = String(targetDate.getMonth() + 1);
    dd = String(targetDate.getDate());
    yyyy = String(targetDate.getFullYear());
    return dd + "/" + mm + "/" + (parseInt(yyyy, 10) + 543);
}

Date.prototype.thaiDay = { Mon: "จันทร์", Tue: "อังคาร", Wed: "พุธ", Thu: "พฤหัสบดี", Fri: "ศุกร์", Sat: "เสาร์", Sun: "อาทิตย์"};
Date.prototype.monthNames = new Array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
Date.prototype.savedDate  = null;

Date.prototype.getMonthName = dateGetMonthName;
Date.prototype.getDays      = dateGetDays;
Date.prototype.addDays      = dateAddDays;
Date.prototype.addMonths    = dateAddMonths;
Date.prototype.addYears     = dateAddYears;

function dateGetMonthName ( )
{
    return this.monthNames[this.getMonth()];
}

function dateGetDays ( )
{
    var tmpDate, d, m;

    tmpDate = new Date(Date.parse(this));
    m = tmpDate.getMonth();
    d = 28;
    do {
        d++;
        tmpDate.setDate(d);
    } while (tmpDate.getMonth() == m);
    return d - 1;
}

function dateAddDays (n)
{
    this.setDate(this.getDate() + n);
    this.savedDate = this.getDate();
}

function dateAddMonths (n)
{
    if (this.savedDate == null)
        this.savedDate = this.getDate();
    this.setDate(1);
    this.setMonth(this.getMonth() + n);
    this.setDate(Math.min(this.savedDate, this.getDays()));
}

function dateAddYears (n)
{
    if (this.savedDate == null)
        this.savedDate = this.getDate();
    this.setDate(1);
    this.setFullYear(this.getFullYear() + n);
    this.setDate(Math.min(this.savedDate, this.getDays()));
}

function openCalendar (event, imgId, inputTxt, bxleft, bxtop)
{
    var calId = document.getElementById("calendar");
    var trans = document.getElementById("transcal");

    if (calId && trans && inputTxt) {
        if (typeof(openCalendar.DeactiveBg) == "function")
            openCalendar.DeactiveBg();
        else
            detectMouseDown(event);
        openCalendar.calId = calId;
        openCalendar.trans = trans;
        if (bxleft <= 0 && bxtop <= 0) {
            calId.style.top = (getOffsetTop(imgId) + imgId.offsetHeight + 1) + "px";
            calId.style.left = (getOffsetLeft(imgId) + imgId.offsetWidth - 17) + "px";
        } else {
            calId.style.top = bxtop + "px";
            calId.style.left = bxleft + "px";
        }
        calId.style.display = "";
        trans.style.left    = calId.style.left;
        trans.style.top     = calId.style.top;
        trans.style.width   = calId.offsetWidth + "px";
        trans.style.height  = calId.offsetHeight + "px";
        trans.style.display = "";
        trans.style.zIndex = eoZindex++;
        calId.style.zIndex = eoZindex++;
        if (!openCalendar.clicked) {
            setCalendar.trans = trans;
            setCalendar.targetInput = inputTxt;
            setCalendar(event);
            openCalendar.clicked = true;
        } else {
            closeCalendar();
        }
    }
}

function closeCalendar (flag)
{
    if (openCalendar.calId && openCalendar.trans) {
        var sDate = null;
        if (setCalendar.targetInput.tagName == "INPUT") {
            sDate = setCalendar.targetInput.value.split("/");
            if (!flag)
                setCalendar.targetInput.value = (sDate[0].length == 1 ? ("0" + sDate[0]) : sDate[0]) + "/" + (sDate[1].length == 1 ? ("0" + sDate[1]) : sDate[1]) + "/" + sDate[2];
        } else {
            sDate = setCalendar.targetInput.innerHTML.split("/");
            if (!flag)
                setCalendar.targetInput.innerHTML = (sDate[0].length == 1 ? ("0" + sDate[0]) : sDate[0]) + "/" + (sDate[1].length == 1 ? ("0" + sDate[1]) : sDate[1]) + "/" + sDate[2];
        }
        openCalendar.calId.style.display = "none";
        openCalendar.trans.style.display = "none";
        openCalendar.clicked = false;
        if (typeof(openCalendar.ActiveBg) == "function")
            openCalendar.ActiveBg();
        else
            cancelMdownDectect();
    }
}

function detectMouseDown (event)
{
    if (document.attachEvent) {
        document.attachEvent("onmousedown", mdownXCalendar);
        window.event.cancelBubble = false;
        window.event.returnValue = false;
    } else if (document.addEventListener) {
        document.addEventListener("mousedown", mdownXCalendar, true);
        event.preventDefault();
    }
}

function cancelMdownDectect ( )
{
    if (document.detachEvent)
        document.detachEvent("onmousedown", mdownXCalendar);
    if (document.removeEventListener)
        document.removeEventListener("mousedown", mdownXCalendar, true);
}

function mdownXCalendar (event)
{
    var elRef = null;
    if (window.event)
        elRef = window.event.srcElement;
    else
        elRef = event.target;
    if (elRef.nodeType == 3)
        elRef = elRef.parentNode;
    if (!getContainerWith(elRef, "TABLE", "calendar"))
        closeCalendar(true);
}

function IsValidDate (dateTxt)
{
    return openCalendar.Validator(dateTxt);
}

//onclick="selectMissionDate(event, this)"
function selectMissionDate (event, RefId)
{
    var inputTxt = document.forms["SignInFrm"].elements["nowDate"];
    if (RefId && inputTxt) {
        targetDate = new Date();
        openCalendar.Validator = DateValidatar;
        openCalendar(event, RefId, inputTxt, 0, 0);
    }
}

function DateValidatar ( )
{
    return true;
}

//
// Box-utils
//
function getContainerWithPairOf (node, PairOfTagAndId)
{
    while (node != null) {
        if (node.tagName && node.id && isInPairsOf(node.tagName, node.id, PairOfTagAndId))
            break;
        node = node.parentNode;
    }
    return node;
}

function isInPairsOf (tgName, idName, pairArray)
{
    for (var i = 0; i < pairArray.length; i += 2)
        if (pairArray[i] == tgName && pairArray[i+1] == idName)
            return true;
    return false;
}

// Get elements by id-name in specified node.
function getElmById (node, idName, idRef)
{
    if (node && node.childNodes && idName && idName.length && typeof(idRef) == "object") {
        for (var i = 0; i < node.childNodes.length; i++) {
            var el = node.childNodes[i];
            if (el.id && in_array(el.id, idName))
                idRef[el.id] = el;
            getElmById(el, idName, idRef);
        }
    }
}

// Get element by id in specified node.
function getElementById (node, idName)
{
    var elm = null;
    if (idName && node && node.childNodes) {
        for (var i = 0; i < node.childNodes.length && elm == null; i++) {
            elm = node.childNodes[i];
            if (elm.id && elm.id == idName)
                break;
            if (elm.nodeType == 1)
                elm = getElementById(elm, idName);
            else
                elm = null;
        }
    }
    return elm;
}

function in_array (key, array)
{
    for (var i = 0; i < array.length; i++)
        if (array[i] == key)
            return true;
    return false;
}

window.onload = ReadUserInfo;