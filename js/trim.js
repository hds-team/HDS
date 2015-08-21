// ==========================================================================
// Fuctions to mimic LTrim, RTrim, and Trim...

// Author          Aurélien Tisné	(CS)
// Date            03 avr. 2003 23:11:39
// Last Update     $Date$
// Version         $Revision$
// ==========================================================================

// --------------------------------------------------------------------------
// Remove leading blanks from our string.

// I               str - the string we want to LTrim
// Return          the input string without any leading whitespace

// Date            03 avr. 2003 23:12:13
// Author          Aurélien Tisné	(CS)
// --------------------------------------------------------------------------
function LTrim(str)
{
  var whitespace = new String(" \t\n\r");

  var s = new String(str);

  if (whitespace.indexOf(s.charAt(0)) != -1) {
    // We have a string with leading blank(s)...

    var j=0, i = s.length;

    // Iterate from the far left of string until we
    // don't have any more whitespace...
    while (j < i && whitespace.indexOf(s.charAt(j)) != -1)
    j++;


    // Get the substring from the first non-whitespace
    // character to the end of the string...
    s = s.substring(j, i);
  }

  return s;
}

// --------------------------------------------------------------------------
// Remove trailing blanks from our string.

// I               str - the string we want to RTrim
// Return          the input string without any trailing whitespace

// Date            03 avr. 2003 23:13:50
// Author          Aurélien Tisné	(CS)
// --------------------------------------------------------------------------
function RTrim(str)
{
  // We don't want to trip JUST spaces, but also tabs,
  // line feeds, etc.  Add anything else you want to
  // "trim" here in Whitespace
  var whitespace = new String(" \t\n\r");

  var s = new String(str);

  if (whitespace.indexOf(s.charAt(s.length-1)) != -1) {
    // We have a string with trailing blank(s)...

    var i = s.length - 1;       // Get length of string

    // Iterate from the far right of string until we
    // don't have any more whitespace...
    while (i >= 0 && whitespace.indexOf(s.charAt(i)) != -1)
      i--;


    // Get the substring from the front of the string to
    // where the last non-whitespace character is...
    s = s.substring(0, i+1);
  }

  return s;
}


// --------------------------------------------------------------------------
// Remove trailing and leading blanks from our string.

// I               str - the string we want to Trim
// Return          the trimmed input string

// Date            03 avr. 2003 23:15:09
// Author          Aurélien Tisné	(CS)
// --------------------------------------------------------------------------
function Trim(str)
{
  return RTrim(LTrim(str));
}

// EOF
