<script>
  $(document).ready(function() {
    $("#tabs").tabs();
    $("#tab-1").tabs();
    $("#tab-2").tabs();
    $("#tab-3").tabs();
  });
</script>
<div class="row">
  <div class="da-panel">
    <div class="da-panel-header">
      <span class="da-panel-title">
            <img src="images/icons/black/16/pencil.png" alt="">
            ระบบ
        </span>
    </div><!-- da-panel-header -->
    <div class="da-panel-content">
      <form class="da-form">
          <div class="da-form-inline">
                <div class="da-form-row">
                    <label>เลือกระบบ <span class="required">*</span></label>
                    <div class="da-form-item large grid_2">
                      <span class="formNote">This is a large form element</span>
                      <select width=20%>
                      </select>
                    </div>
                </div>
            </div>
            <div class="da-button-row">
              <input type="submit" value="Submit" class="da-button green">
            </div>
        </form>
    </div><!-- da-panel-content -->
  </div><!-- da-panel -->
</div><!-- row -->
<div class="row">
  <div class="da-panel">
    <div class="da-panel-header">
        <span class="da-panel-title">
            <img src="<?php echo base_url('images/icons/color/ui_tab_content.png'); ?>" alt="">
				ตรวจสอบงาน
        </span>
    </div><!-- da-panel-header -->
    <div id="tabs">
        <ul>
            <li><a href="#tab-1"><span>รอดำนเนินการ</span></a></li>
            <li><a href="#tab-2"><span>กำลังดำเนินการ</span></a></li>
            <li><a href="#tab-3"><span>ผลการอนุมัต</span></a></li>
        </ul>
        <div id="tab-1" style="padding: 0;">
          <?php echo $pending; ?>
        </div>
        <div id="tab-2" style="padding: 0;">
          <?php echo $ongoing; ?>
        </div>
        <div id="tab-3" style="padding: 0;">
          <?php echo $approve; ?>
        </div>
        <!-- End Nested Tabs -->
    </div><!-- da-panel-header -->
  </div><!-- da-panel -->
</div><!-- row -->

