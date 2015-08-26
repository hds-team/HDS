<script>
  $(document).ready(function() {
    $("#tabs").tabs();
    $("#tab-1").tabs();
    $("#tab-2").tabs();
    $("#tab-3").tabs();
  });
</script>
<div class="da-panel">
    <div class="da-panel-header">
        <span class="da-panel-title">
            <img src="<?php echo base_url('images/icons/color/ui_tab_content.png'); ?>" alt="">
             ตรวจสอบงาน
        </span>
    </div>
    <div id="tabs">
        <ul>
            <!-- LOOP SYSTEM -->
            <li><a href="#tab-1"><span>ระบบ1</span></a></li>
        </ul>
        <!-- LOOP TAB OF SYSTEM -->
        <div id="tab-1" >
          <div>
          <!-- Nested Tabs! -->
              <ul>
                <li><a href="#tab-1_nested-1"><span>คำร้อง</span></a></li>
                <li><a href="#tab-1_nested-2"><span>ตรวจสอบ</span></a></li>
                <li><a href="#tab-1_nested-3"><span>ตรวจแล้ว</span></a></li>
              </ul>
              <div id="tab-1_nested-1">
                <?php echo $petition; ?>
              </div>
              <div id="tab-1_nested-2">
                <?php echo $check; ?>
              </div>
              <div id="tab-1_nested-3">
                <?php echo $check_now; ?>
              </div>
              <!-- End Nested Tabs -->
          </div>
        </div>
    </div>
</div>

