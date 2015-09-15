  <script>
  //---------- DIALOG CODE
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
    });

    //----------- set value on click to input
    function set_value(id, value){
        $( "#id").val(id); //set value to input by id
        $( "#value").val(value); //set value to input by id
        $( "#dialog1" ).dialog( "open" ); //open dialog
    }
  </script>
  <!-- Timeline styl -->

<body>
    <?php 
        $id = 20;
        $value = "TEST VALUE"; // value pass to dialog
    ?>
    <!--Pass value onclick to set_value function -->
    <button id="opener1"  class="da-button blue" onclick="set_value('<?php echo $id; ?>', '<?php echo $value; ?>');">Form Dialog</button>
    <!-- Form  Dialog-->
    <div id="dialog1" class="da-panel-content" title="Basic dialog" style="padding: 0px">
        <form class="da-form">
            <div class="da-form-row">
                <label>Input Text ID</label>
                <div class="da-form-item large">
                    <input type="text" id="id">
                </div>
            </div>
            <div class="da-form-row">
                <label>Input Text Value</label>
                <div class="da-form-item large">
                    <input type="text" id="value">
                </div>
            </div>
            <div class="da-button-row">
                <input type="reset" value="Reset" class="da-button gray left">
                <input type="submit" value="Submit" class="da-button red">
            </div>
        </form>
    </div>  
  <BR>
</body>
</html>
