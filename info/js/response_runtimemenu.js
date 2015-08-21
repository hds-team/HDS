function GetRIHTML ( )
{
    var retval = "";
    var RefId = document.getElementById("ResTags");
    if (RefId)
        retval = RefId.innerHTML;
    return retval;
}