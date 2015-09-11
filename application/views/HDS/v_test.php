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

  //-------------- TIMELINE
  $(".timeline-item").hover(function () {
    $(".timeline-item").removeClass("active");
    $(this).toggleClass("active");
    $(this).prev(".timeline-item").toggleClass("close");
    $(this).next(".timeline-item").toggleClass("close");
  });

  </script>
  <!-- Timeline styl -->
  <style>

    div {
        font-family: Helvetica, Arial, sans-serif;
        box-sizing: border-box;
    }
    .timeline {
        width: 400px;
    }
    .timeline .timeline-item {
        width: 100%;
    }
    .timeline .timeline-item .info, .timeline .timeline-item .year {
        color: #eee;
        display: block;
        float:left;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        transition: all 1s ease;
    }
    .timeline .timeline-item.close .info, .timeline .timeline-item.close .year {
        color: #ccc;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        transition: all 1s ease;
    }
    .timeline .timeline-item .year {
        font-size: 24px;
        font-weight: bold;
        width: 22%;
    }
    .timeline .timeline-item .info {
        width: 100%;
        width: 78%;
        margin-left: -2px;
        padding: 0 0 40px 35px;
        border-left: 4px solid #aaa;
        font-size: 14px;
        line-height: 20px;
    }
    .timeline .timeline-item .marker {
        background-color: #fff;
        border: 4px solid #aaa;
        height: 20px;
        width: 20px;
        border-radius: 100px;
        display: block;
        float: right;
        margin-right: -14px;
        z-index: 2000;
        position: relative;
    }
    .timeline .timeline-item.active .info, .timeline .timeline-item:hover .info {
        color: #444;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        transition: all 1s ease;
    }
    .timeline .timeline-item.active .year, .timeline .timeline-item:hover .year {
        color: #9DB668;
    }
    .timeline .timeline-item .marker .dot {
        background-color: white;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        transition: all 1s ease;
        display: block;
        border: 4px solid white;
        height: 12px;
        width: 12px;
        border-radius: 100px;
        float: right;
        z-index: 2000;
        position: relative;
    }
    .timeline .timeline-item.active .marker .dot, .timeline .timeline-item:hover .marker .dot {
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        transition: all 1s ease;
        background-color: #9DB668;
        box-shadow: inset 1px 1px 2px rgba(0, 0, 0, 0.2);
    }
  </style>

<body>
    <!--Button Open Dialog-->
    <button id="opener">Narmal Dialog</button>
    <?php 
        $id = 20;
        $value = "TEST VALUE"; // value pass to dialog
    ?>
    <!--Pass value onclick to set_value function -->
    <button id="opener1" onclick="set_value('<?php echo $id; ?>', '<?php echo $value; ?>');">Form Dialog</button>

    <!-- Content Dailog -->

    <div id="dialog" title="Basic dialog">
      <p>ใช้สำหรับแสดงรายละเอียด</p>
    </div>

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
  <!-- Timeline -->
  <div class="timeline">
      <div class="timeline-item active">
          <div class="year">2008 <span class="marker"><span class="dot"></span></span>
          </div>
          <div class="info">That song the artist formerly known as prince sang no longer applies.</div>
      </div>
      <div class="timeline-item">
          <div class="year">2008 <span class="marker"><span class="dot"></span></span>
          </div>
          <div class="info">The in-house Gawker chat room is filled with photos of Rob Ford, and for one reason: Rob Ford takes a good goddamn photo.</div>
      </div>
      <div class="timeline-item">
          <div class="year">2008 <span class="marker"><span class="dot"></span></span>
          </div>
          <div class="info">That song the artist formerly known as prince sang no longer applies.</div>
      </div>
      <div class="timeline-item">
          <div class="year">2008 <span class="marker"><span class="dot"></span></span>
          </div>
          <div class="info">The in-house Gawker chat room is filled with photos of Rob Ford, and for one reason.The in-house Gawker chat room is filled with photos of Rob Ford, and for one reason.The in-house Gawker chat room is filled with photos of Rob Ford, and for one reason.</div>
      </div>
      <div class="timeline-item">
          <div class="year">2008 <span class="marker"><span class="dot"></span></span>
          </div>
          <div class="info">That song the artist formerly known as prince sang no longer applies.</div>
      </div>
      <div class="timeline-item">
          <div class="year">2008 <span class="marker"><span class="dot"></span></span>
          </div>
          <div class="info">The in-house Gawker chat room is filled with photos of Rob Ford, and for one reason.The in-house Gawker chat room is filled with photos of Rob Ford, and for one reason.The in-house Gawker chat room is filled with photos of Rob Ford, and for one reason.</div>
      </div>
      <div class="timeline-item">
          <div class="year">2008 <span class="marker"><span class="dot"></span></span>
          </div>
          <div class="info">The in-house Gawker chat room is filled with photos of Rob Ford, and for one reason.The in-house Gawker chat room is filled with photos of Rob Ford, and for one reason.The in-house Gawker chat room is filled with photos of Rob Ford, and for one reason.</div>
      </div>
  </div> 
</body>
</html>
