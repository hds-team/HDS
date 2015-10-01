<script>
  $(document).ready(function() 
  {
    $("#tabs").tabs();
  });

  //----HDS Dialog Script

  $(function() {
    $( "#report_input_screen" ).dialog({
      autoOpen: false,
      resizable: false,
      modal: true,
      width: 800
    });

    $( "#report_btn_screen" ).click(function() {
      $( "#report_input_screen" ).dialog( "open" );
    });
    
    $( "#datepicker_screening" ).datepicker({ dateFormat: 'dd/mm/yy' });

  });

  //----- Auto Complete
  $(function() {
    var availableTags = [
        <?php
          $count = $hds_member->num_rows();
          foreach($hds_member->result() as $row)
          {
            if($count == 1)
            {
              echo '"'.$row->UsName.'"';
            }
            else
            {
              echo '"'.$row->UsName.'",';
            }
            $count--;
          }
        ?>
    ];

    var id = [
      [
          <?php
            $count = $hds_member->num_rows();
            foreach($hds_member->result() as $row)
            {
              if($count == 1)
              {
                echo '"'.$row->UsName.'"';
              }
              else
              {
                echo '"'.$row->UsName.'",';
              }
              $count--;
            }
          ?>
      ],
      [
        <?php
          $count = $hds_member->num_rows();
          foreach($hds_member->result() as $row)
          {
            if($count == 1)
            {
              echo '"'.$row->UsID.'"';
            }
            else
            {
              echo '"'.$row->UsID.'",';
            }
            $count--;
          }
        ?>
      ]
    ];
 
    $( "#tags" ).autocomplete({
      source: availableTags
    });
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
            $sum_notification = 0;
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
    <div class="grid_3">
      <div class="da-panel"></div>
    </div>
    <div class="grid_1">
      <button id="report_btn_screen" class="da-ex-buttons ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false" style="float:right;"><span class="ui-button-text">ส่งคำร้อง</span></button>
    </div>
<div class="clear"></div>

<!-- TAB -->
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

<!-- HDS Dialog Report -->
<div id="report_input_screen" class="da-panel-content" title="แบบฟอร์มคำร้อง" style="padding: 0px; display: none;">
  <?php 
      $data['class'] ="da-form";
      echo form_open_multipart('HDS/report/insert', $data); 
  ?>
      <input type="hidden" value="<?php echo $_SERVER['REQUEST_URI']; ?>" name="url">
      <div class="da-form-row">
          <div class="grid_4">
              <label>หัวเรื่อง</label>
              <div class="da-form-item large">
                  <input type="text" name="rq_subject" maxlength="50" required>
              </div>
          </div>
      </div>
      <div class="da-form-row">
          <div class="grid_2">
              <label>ประเภท</label>
              <div class="da-form-item large">
                  <select name="rq_ct_id">
                      <?php
                          foreach($hds_category->result() as $category){
                      ?>
                              <option value="<?php echo $category->ct_id; ?>"><?php echo $category->ct_name; ?></option>
                      <?php
                          }
                      ?>
                  </select>
              </div>
          </div>
          <div class="grid_2">
              <label>หมวด</label>
              <div class="da-form-item large">
                  <select name="rq_kn_id">
                      <?php
                          foreach($hds_kind->result() as $kind){
                      ?>
                              <option value="<?php echo $kind->kn_id; ?>"><?php echo $kind->kn_name; ?></option>
                      <?php
                          }
                      ?>
                  </select>
              </div>
          </div>
      </div>
      <div class="da-form-row">
          <div class="grid_2">
              <label>ระดับความสำคัญ</label>
              <div class="da-form-item large">
                  <select name="lg_lv_id">
                      <?php
                          foreach($hds_level->result() as $level){
                      ?>
                              <option value="<?php echo $level->lv_id; ?>"><?php echo $level->lv_name; ?></option>
                      <?php
                          }
                      ?>
                  </select>
              </div>
          </div>
          <div class="grid_2">
              <label>กำหนดส่ง</label>
              <div class="da-form-item large">
                  <input id="datepicker_screening" type="text" name="lg_exp">
              </div>
          </div>
      </div>
      <div class="da-form-row">
          <div class="grid_2">
              <label>เบอร์โทร</label>
              <div class="da-form-item large">
                  <input id="rq_tell" type="text" name="rq_tell" maxlength="10" required>
              </div>
          </div>
          <div class="grid_2">
              <label>อีเมล์</label>
              <div class="da-form-item large">
                  <input type="text" name="rq_email" maxlength="100" required>
              </div>
          </div>
      </div>
      <div class="da-form-row">
          <div class="grid_2">
              <label>ระบบ</label>
              <div class="da-form-item large">
                  <select name="sys_id">
                      <?php
                          foreach($hds_system->result() as $system){
                      ?>
                          <option value="<?php echo $system->StID; ?>" <?php if($this->session->userdata('StID') == $system->StID ) echo "selected"; ?>><?php echo $system->StNameT; ?></option>
                      <?php
                          }
                      ?>
                  </select>
              </div>
          </div>
          <div class="grid_2">
              <label>องค์กร</label>
              <div class="da-form-item large">
                  <select name="comp_id">
                      <?php
                          foreach($hds_comp->result() as $comp){
                      ?>
                          <option value="<?php echo $comp->dpID; ?>"><?php echo $comp->dpName; ?></option>
                      <?php
                          }
                      ?>
                  </select>
              </div>
          </div>
      </div>
      <div class="da-form-row">
          <div class="grid_2">
            <label>ผู้ส่ง</label>
            <div class="da-form-item large">
              <input id="tags" type="text" size="50" name="UsName" required> 
            </div>
          </div>
      </div>
      <div class="da-form-row">
          <div class="grid_4">
              <label>รายละเอียด</label>
              <div class="da-form-item large">
                  <textarea name="rq_detail" rows="auto" cols="auto" maxlength="255" required></textarea>
              </div>
          </div>
      </div>
      <div class="da-form-row">
          <div class="grid_4">
              <label>ไฟล์แนบ</label>
              <div class="da-form-item">
                  <input type="file" class="da-custom-file" name="userfile">
              </div>
          </div>
      </div>
      <div class="da-button-row">
          <input type="reset" value="รีเซ็ท" class="da-button gray left">
          <input type="submit" value="ส่งคำร้อง" class="da-button blue">
      </div>
  <?php echo form_close(); ?>
</div>

