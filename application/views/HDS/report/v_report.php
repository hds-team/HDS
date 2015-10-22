<script>
  $(function() {
    var today = new Date();
    $( "#datepicker_2" ).datepicker({ 
        dateFormat: 'dd/mm/yy',
        minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate())
    });

    $("#rq_tell").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });

  });
</script>
<!-- HDS Dialog Report -->
<div class="da-panel">
    <div class="da-panel-header">
    <span class="da-panel-title">
          <img src="<?php echo base_url(); ?>images/icons/black/16/pencil.png" alt="">
          แบบฟอร์มคำร้อง
      </span>
    </div><!-- da-panel-header -->
    <div class="da-panel-content">
        <?php 
            $data['class'] ="da-form";
            echo form_open_multipart('HDS/report/insert', $data); 
        ?>
            <input type="hidden" value="<?php echo $_SERVER['REQUEST_URI']; ?>" name="url" >
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
                        <input id="datepicker_2" type="text" name="lg_exp">
                    </div>
                </div>
            </div>
            <div class="da-form-row">
                <div class="grid_2">
                    <label>เบอร์โทร</label>
                    <div class="da-form-item large">
                        <input id="rq_tell" max = "10" type="text" name="rq_tell" maxlength="10" required>
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
                            <option value="10" <?php if($this->session->userdata('StID') == 10 || $this->session->userdata('StID') == NULL) echo "selected"; ?>>ระบบจัดการผู้ใช้</option>
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
            </div>
            <div class="da-form-row">
                <div class="grid_3">
                    <label>เมนู</label>
                    <div class="da-form-item large">
                        <input type="text" name="rq_menu" required>
                    </div>
                </div>
            </div>
            <div class="da-form-row">
                <div class="grid_4">
                    <label>รายละเอียด</label>
                    <div class="da-form-item large">
                        <textarea name="rq_detail" rows="auto" cols="auto" required></textarea>
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
</div>
