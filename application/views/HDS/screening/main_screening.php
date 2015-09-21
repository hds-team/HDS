<script>
  $(document).ready(function() 
  {
    $("#tabs").tabs();
  });
</script>
  <div class="grid_1">
    <div class="da-panel"></div>
  </div>
  <div class="grid_2">
    <div class="da-panel"> 
      <div class="da-panel-header">
        <span class="da-panel-title">
          <img src="<?php echo base_url(); ?>images/icons/black/16/pencil.png" alt="">
          ระบบ
        </span>
      </div> <!-- da-panel-header -->
      <div class="da-panel-content">
          <?php
            $data['class'] = "da-form";
            echo form_open('HDS/screening/index', $data); 
          ?>
            <div class="da-form-inline">
                  <div class="da-form-row">
                      <label>เลือกระบบ <span class="required">*</span></label>
                      <div class="da-form-item large">
                        <select name="system">
                          <option <?php if($system_select == 0) echo "selected"; ?>>เลือกระบบ</option>
                        <?php
                          foreach($system->result() as $row)
						  {
                        ?>
                            <option value="<?php echo $row->StID; ?>" <?php if($system_select == $row->StID) echo "selected"; ?>><?php echo $row->StNameT; ?><span style="font-color : red;"> (<?php echo $system_notification[$row->StID];?>)</span></option>
                        <?php 
                            $sum_notification += $system_notification[$row->StID];
                          }
                        ?>
                          <option value="99" <?php if($system_select == 99) echo "selected"; ?>>ทั้งหมด<span style="font-color : red;"> (<?php echo $sum_notification;?>)</span></option>
                        </select>
                      </div>
                  </div>
              </div>
              <div class="da-button-row">
                <input type="submit" value="ตกลง" class="da-button green">
              </div>
            <?php echo form_close(); ?>
      </div><!-- da-panel-content -->
    </div><!-- da-panel -->
  </div>
  <div class="grid_1">
    <div class="da-panel"></div>
  </div>
<div class="clear"></div>
  <div class="da-panel" style="<?php if($system_st == 0) echo "display: none"; ?>">
    <div class="da-panel-header">
        <span class="da-panel-title">
            <img src="<?php echo base_url('images/icons/color/ui_tab_content.png'); ?>" alt="">
             ตรวจสอบงาน
        </span>
    </div>
    <div class="da-panel-content" id="tabs">
        <ul>
            <li><a href="#petition"><span>คัดกรองคำร้อง</span></a></li>
            <li><a href="#check"><span>ตรวจสอบงานแก้ไข</span></a></li>
            <li><a href="#check_now"><span>ตรวจสอบสถานะ</span></a></li>
        </ul>
        <div id="petition" style="padding: 0;">
          <?php echo $petition; ?>
        </div>
        <div id="check" style="padding: 0;">
          <?php echo $check; ?>
        </div>
        <div id="check_now" style="padding: 0;">
          <?php echo $check_now; ?>
        </div>
    </div><!-- tabs -->
  </div><!-- da-panel -->
