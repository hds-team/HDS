// START tab script
// Adapted from "Javascript + CSS + DOM Magic" by Makiko Itoh

// define variables for "if n4 (Netscape 4), if IE (IE 4.x),
// and if n6 (if Netscape 6/W3C-DOM compliant)"
	
	var n4, ie, n6;

// detect browser support for certain key objects/methods
// and assemble a custom document object

	var doc,doc2,doc3,sty;
	
	if (document.layers) {
		doc = "document.";
		doc2 = ".document.";
		doc3 = "";
		sty = "";
		n4 = true;
	} else if (document.all) {
		doc = "document.all.";
		doc2 = "";
		doc3 = "";
		sty = ".style";
		ie = true;
	} else if (document.getElementById) {
		doc = "document.getElementById('";
		doc2 ="')";
		doc3 ="')";
		sty = "').style";
		n6 = true;
	}

// display block or none DIV element

	function blocknone(divname,tabidname,state,tabcolor,tabbg,cursortype) {
		if (n4) {
			divObj = eval (doc + divname);
			tabObj = eval (doc + tabidname);
		}
		else {
			divObj = eval (doc + divname + sty);
			tabObj = eval (doc + tabidname + sty);
		}
		divObj.display = state;
		tabObj.color = tabcolor;
		tabObj.backgroundColor = tabbg;
		tabObj.cursor = cursortype;
	}
	// variables that hold the value of the currently active (open) menu
	
	var active_tabcontent = null;
	var active_tab1 = null;
	
	// function closes all active menus and turns back to 'off' state
	
	function closeallmenus() {
		if (active_tabcontent != null) {
			blocknone(active_tabcontent,active_tab1,'none','#000000','#ABCDEF','pointer');
		}
	}
	
	// function controls tab content visibility
	
	function controlsubmenu(tabcontent,tabid) {
		closeallmenus();
		blocknone(tabcontent,tabid,'block','#000000','#ffc','text');
		active_tabcontent = tabcontent;
		active_tab1 = tabid
	}
//END guide tab script