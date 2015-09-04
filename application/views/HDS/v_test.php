  <script>
  $(function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      resizable: false,
      modal: true
    });

    $( "#dialog1" ).dialog({
      autoOpen: false,
      resizable: false,
      width: 800,
      modal: true
    });
 
    $( "#opener" ).click(function() {
      $( "#dialog" ).dialog( "open" );
    });

    $( "#opener1" ).click(function() {
      $( "#dialog1" ).dialog( "open" );
    });



  });
  </script>

<body>

<button id="opener">Open Dialog</button>

<div id="dialog" title="Basic dialog">
  <p>22222222222222222for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
</div>

<button id="opener1">Open Dialog</button>

<div id="dialog1" class="da-panel-content" title="Basic dialog" style="padding: 0px">
        <form class="da-form">
            <div class="da-form-row">
                <label>Usual File Input</label>
                <div class="da-form-item large">
                    <input type="file">
                </div>
            </div>
            <div class="da-form-row">
                <label>Auto Complete</label>
                <div class="da-form-item large">
                    <span class="formNote">Type something to trigger auto complete</span>
                    <input type="text" id="da-ex-autocomplete" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
                </div>
            </div>
            <div class="da-form-row">
                <label>Colorpicker</label>
                <div class="da-form-item">
                    <span class="formNote">Click to choose a color</span>
                    <input type="text" id="da-ex-colorpicker">
                </div>
            </div>
            <div class="da-form-row">
                <label>Default Spinner</label>
                <div class="da-form-item">
                    <span class="ui-spinner ui-widget"><input type="text" id="da-ex-s1" value="10" maxlength="524288"><span class="ui-spinner-buttons"><span class="ui-spinner-up ui-spinner-button ui-state-default ui-corner-tr"><span class="ui-icon ui-icon-triangle-1-n">&nbsp;</span></span><span class="ui-spinner-down ui-spinner-button ui-state-default ui-corner-br"><span class="ui-icon ui-icon-triangle-1-s">&nbsp;</span></span></span></span>
                </div>
            </div>
            <div class="da-form-row">
                <label>Decimal Spinner</label>
                <div class="da-form-item">
                    <span class="ui-spinner ui-widget"><input type="text" id="da-ex-s2" value="10" maxlength="524288"><span class="ui-spinner-buttons"><span class="ui-spinner-up ui-spinner-button ui-state-default ui-corner-tr"><span class="ui-icon ui-icon-triangle-1-n">&nbsp;</span></span><span class="ui-spinner-down ui-spinner-button ui-state-default ui-corner-br"><span class="ui-icon ui-icon-triangle-1-s">&nbsp;</span></span></span></span>
                </div>
            </div>
            <div class="da-form-row">
                <label>Currency Spinner</label>
                <div class="da-form-item">
                    <span class="ui-spinner ui-widget"><input type="text" id="da-ex-s3" value="10" maxlength="524288"><span class="ui-spinner-buttons"><span class="ui-spinner-up ui-spinner-button ui-state-default ui-corner-tr"><span class="ui-icon ui-icon-triangle-1-n">&nbsp;</span></span><span class="ui-spinner-down ui-spinner-button ui-state-default ui-corner-br"><span class="ui-icon ui-icon-triangle-1-s">&nbsp;</span></span></span></span>
                </div>
            </div>
            <div class="da-button-row">
                <input type="reset" value="Reset" class="da-button gray left">
                <input type="submit" value="Submit" class="da-button red">
            </div>
        </form>
</div>



	<!-- Main Wrapper. Set this to 'fixed' for fixed layout and 'fluid' for fluid layout' -->
	<div id="da-wrapper" class="fluid">
    
        <!-- Content -->
        <div id="da-content">
            
            <!-- Container -->
            <div class="da-container clearfix">
            
            	<div id="da-error-wrapper">
                	
                   	<div id="da-error-pin"></div>
                    <div id="da-error-code">
                    	error <span>404</span>
                    </div>
                
                	<h1 class="da-error-heading">Whoops, it seems you are lost</h1>
                </div>
            
            </div>
            
        </div>
    </div>
    
</body>
</html>
