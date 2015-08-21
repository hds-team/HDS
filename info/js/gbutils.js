//
// JavaScript Document
// - Generic Utilities -
// - zsiam@hotmail.com -
//

//
// Browser's Tools
//
function Browserdetect ( )
{
    var ua = navigator.userAgent;
    var uaname = new Array("Netscape", "Firefox", "Opera", "MSIE", "Mozilla");
    var engine = new Array("Gecko", "MSIE", "Opera");
    var compat = new Array("Mozilla", "Opera");
    var pattern = /([0-9\.]+)(.*?)$/;
    var replaces = "$1";
    var i, pos = 0, version = null;

    for (i = 0; i < uaname.length; i++) {
        if ((pos = ua.indexOf(uaname[i])) >= 0) {
            version = ua.substring(pos + uaname[i].length + 1);
            this.uaname = uaname[i];
            this.uavers = version.replace(pattern, replaces);
            break;
        }
    }
    for (i = 0; i < engine.length; i++) {
        if ((pos = ua.indexOf(engine[i])) >= 0) {
            version = ua.substring(pos + engine[i].length + 1);
            this.enname = engine[i];
            this.envers = version.replace(pattern, replaces);
            break;
        }
    }
    for (i = 0; i < compat.length; i++) {
        if ((pos = ua.indexOf(compat[i])) >= 0) {
            version = ua.substring(pos + compat[i].length + 1);
            this.cmname = compat[i];
            this.cmvers = version.replace(pattern, replaces);
            break;
        }
    }
    if (!this.uaname) {
        this.uaname = this.enname = this.cmname = "Other";
        this.uavers = this.envers = this.cmvers = 0.0;
    } else {
        if (this.uaname == uaname[4]) {
            if ((pos = ua.indexOf("rv:")) >= 0) {
                version = ua.substring(pos + 3);
                this.uavers = version.replace(pattern, replaces);
            }
        }
    }
}

function browserlimited ( )
{
    var engine = { Gecko: 20030624, MSIE: 6.0, Opera: 7.54 };
    var compat = { Mozilla: 4.0, Opera: 7.54 };
    var bws = new Browserdetect();
    var limited = null;

    if (bws.enname != "Other") {
        var envers = parseFloat(bws.envers);
        var cmvers = parseFloat(bws.cmvers);
        if (envers >= engine[bws.enname] && cmvers >= compat[bws.cmname])
            limited = bws;
    }
    return limited;
}


//
// Cookie's Tools
//
function extractCookies()
{
    var cookies = new Object();
    var cookie = document.cookie;
    var beginning, middle, end;
    var name, value;

    beginning = 0;
    while (beginning < cookie.length) {
        middle = cookie.indexOf("=", beginning);
        end = cookie.indexOf(";", beginning);
        if (end == -1)
            end = cookie.length;
        if ((middle > end) || (middle == -1)) {
            name = cookie.substring(beginning, end);
            value = "";
        } else {
            name = cookie.substring(beginning, middle);
            value = cookie.substring(middle + 1, end);
        }
        cookies[name] = unescape(value);
        beginning = end + 2;
    }
    return cookies;
}

function deleteCookie (name) 
{
    var cookies = extractCookies();
    var cookie = document.cookie;
    if (cookies[name]) {
        var past = new Date();
        var expires = "";
        past.setHours(past.getHours() - 48);
        expires = past.toUTCString();
        cookie = name + "=deleted; expires=" + expires;
        cookie = name + "; expires=" + expires;
    }
}

function setCookie (name, value, expires, domain, path)
{
    var cookie = "";
    var parts = new Array(null, "", "expires", "domain", "path");
    var argc = setCookie.arguments.length;
    var argv = setCookie.arguments;
    if (argc > 1) {
        parts[1] = name;
        for (var i = 1; i < argc && i < 5; i++) {
            if ((i + 1) == argc)
                cookie += parts[i] + "=" + argv[i];
            else
                cookie += parts[i] + "=" + argv[i] + "; "
        }
        document.cookie = cookie;
    }
}

function setExpires (minutes)
{
    var expires = new Date();
    expires.setMinutes(expires.getMinutes() + minutes);
    return expires.toUTCString();
}

function cookiesEnabled (cName, cValue)
{
    var enabled = false;
    cName = !cName ? "__N__" : cName;
    cValue = !cValue ? "__V__" : cValue;
    setCookie(cName, cValue);
    var cookie = extractCookies();
    if (cookie[cName] == cValue) {
        enabled = true;
        deleteCookie(cName);
    }
    return enabled;
}

function getOffsetLeft (el)
{
    var x = el.offsetLeft;
    if (el.offsetParent != null)
        x += getOffsetLeft(el.offsetParent);
    return x;
}

function getOffsetTop (el)
{
    var y = el.offsetTop;
    if (el.offsetParent != null)
        y += getOffsetTop(el.offsetParent);
    return y;
}

function trim (str, tchar, add)
{
    var trimed = "";
    if (add)
        tchar = tchar ? (tchar + " \t") : " \t";        
    else
        tchar = tchar ? tchar : " \t";
    if (str) {
        var begin = 0;
        var end = str.length - 1;
        for (begin = 0; isin(str.charAt(begin)); begin++)
            ;
        for (   ; isin(str.charAt(end)); end--)
            ;
        for (   ; begin <= end; begin++)
            trimed += str.charAt(begin);
    }
    function isin (c) {
        for (var i = 0; i < tchar.length; i++)
            if (c == tchar.charAt(i))
                return true;
        return false;
    }
    return trimed;
}

function addslashes (fName, inputPair)
{
    if (typeof (document.forms[fName]) == "object" && typeof (inputPair) == "object") {
        var fRefn = document.forms[fName];
        for (var i in inputPair) {
            if (typeof (fRefn.elements[i]) == "object")
                fRefn.elements[i].value = inputPair[i];
        }
    }
}

function getContainerWith (node, tagName, idName)
{
    while (node != null) {
        if (node.tagName && node.tagName == tagName && node.id && node.id == idName)
            break;
        node = node.parentNode;
    }
    return node;
}

function cleanIframe (ifName)
{
    if (!ifName)
        ifName = "transparent";
    if (frames[ifName])
        setTimeout("frames['" + ifName + "'].location.replace('about:blank')", 50);
}

function goToSubURL (el)
{
    window.location.replace(el.href);
    return false;
}