//
// Post-Login Utilities.
//

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

function alertRejectMsg (ErrMesg)
{
    alert(ErrMesg);
}

function menuActiveClick ( )
{
    window.location.replace(sysmenuMover.url);
}

function sysmenuMover (event, cId, url)
{
    if (!sysmenuMover.sysImgId) {
        sysmenuMover.sysImgId = document.getElementById("sys_img_" + cId);
        sysmenuMover.sysNameId = document.getElementById("sys_name_" + cId);
        sysmenuMover.sysGroupId = document.getElementById("sys_group_" + cId);
        sysmenuMover.url = url;
    }
    if (sysmenuMover.sysImgId && sysmenuMover.sysNameId && sysmenuMover.sysGroupId) {
        if (!sysmenuMover.mover) {
            sysmenuMover.mover = true;
            sysmenuMover.sysNameId.style.color = "#FFA642";
            sysmenuMover.sysGroupId.style.color = "#FFA642";
            window.status = sysmenuMover.sysNameId.innerHTML + " - " + sysmenuMover.sysGroupId.innerHTML;
            if (document.attachEvent) {
                document.attachEvent("onmouseout", sysmenuMover);
                document.attachEvent("onclick", menuActiveClick);
                window.event.cancelBubble = true;
                window.event.returnValue = false;
            } else if (document.addEventListener) {
                document.addEventListener("mouseout", sysmenuMover, true);
                document.addEventListener("click", menuActiveClick, true);
                event.preventDefault();
            }
        } else {
            sysmenuMover.mover = false;
            sysmenuMover.sysNameId.style.color = "#898989";
            sysmenuMover.sysGroupId.style.color = "#11387D";
            window.status = "";
            if (document.detachEvent) {
                document.detachEvent("onclick", menuActiveClick);
                document.detachEvent("onmouseout", sysmenuMover);
            } else if (document.removeEventListener) {
                document.removeEventListener("click", menuActiveClick, true);
                document.removeEventListener("mouseout", sysmenuMover, true);
            }
            sysmenuMover.sysImgId = null;
            sysmenuMover.sysNameId = null;
            sysmenuMover.sysGroupId = null;
        }
    }
}

function showInfoStatus (el)
{
    window.status = el.innerHTML;
    return true;
}

function hideInfoStatus (el)
{
    window.status = "";
    return true;
}