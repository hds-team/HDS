<script>
  $(document).ready(function() {
    var today = new Date();

    $( ".datepicker_limit" ).datepicker({ 
        dateFormat: 'dd/mm/yy',
        minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate())
    });

    $( ".datepicker_none_limit" ).datepicker({ 
        dateFormat: 'dd/mm/yy'
    });

    $( ".datepicker_rang" ).datepicker({ 
        dateFormat: 'dd/mm/yy',
        minDate: new Date($( "#date_start" ).datepicker('getDate'))
    });


    $("#rq_tell").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) 
        {
            return false;
        }
    });

    //------- Multi upload
    $('.Multifile').MultiFile(5);

    //------- Auto Coomplete
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

    $( "#tags" ).autocomplete({
      source: availableTags
    });

    //------- Add Field input contact
    var i = $('#contact_group label').size() + 1;
    var option = '<?php foreach($hds_contact_type->result() as $ctt){ ?><option value="<?php echo $ctt->ctt_id; ?>"><?php echo $ctt->ctt_name; ?></option><?php } ?>';

    $('#add').click(function(){
        $('#contact_group').append('<label id="contact_lb'+i+'"><select style="width:30%" name="ctl_ctt_id[]">'+option+'</select> <input id="rq_tell'+i+'" type="text" name="ctl_value[]" required style="width:50%"> <a id="del" ><img src="<?php echo base_url(); ?>images/icons/color/cross.png" title="ลบ" style="width:3%"></a></label>');
        i++;
    });

    $('#del').live('click', function() { 
        if( i > 2 ) {
                $(this).parents('label').remove();
                i--;
        }
        return false;
    });

  });
</script>

<?php
    $datepicker = "";
    if($display == "none"){
        
        $datepicker = "datepicker_limit";
    }else{
        $datepicker = "datepicker_none_limit";
    }
?>
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
                        <input class="<?php echo $datepicker; ?>" id="date_start" type="text" name="lg_exp">
                    </div>
                </div>
            </div>
            
            <div class="da-form-row">
                <div class="grid_4">
                    <label>ช่องทางติดต่อ</label>
                    <div class="da-form-item large" id="contact_group">
                        <label>
                            <select style="width:30%" name="ctl_ctt_id[]">
                            <?php 
                            foreach($hds_contact_type->result() as $ctt){
                            ?>
                                <option value="<?php echo $ctt->ctt_id; ?>"><?php echo $ctt->ctt_name; ?></option>
                            <?php
                                }
                            ?>
                            </select>
                            <input id="rq_tell0" type="text" name="ctl_value[]" required style="width:50%">
                            <a id="add"><img src="<?php echo base_url(); ?>images/icons/color/add.png" title="เพิ่ม" style="width:3%"></a>
                        </label>
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
                                if($display == ""){
                                    $systems_query = $hds_system_coop;
                                }
                                else
                                {
                                    $systems_query = $hds_system;
                                }
                                foreach($systems_query->result() as $system){
                            ?>
                                <option value="<?php echo $system->StID; ?>" <?php if($this->session->userdata('StID') == $system->StID ) echo "selected"; ?>><?php echo $system->StNameT; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="grid_2" style="display: <?php echo $display; ?>">
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
            <div class="da-form-row" style="display: <?php echo $display; ?>">
                <div class="grid_2">
                    <label>วันที่ส่ง</label>
                    <div class="da-form-item large">
                        <input class="datepicker_rang" type="text" name="rq_date">
                    </div>
                </div>
                <div class="grid_2">
                    <label>ผู้ส่ง</label>
                    <div class="da-form-item large">
                        <input id="tags" type="text" size="50" name="UsName" <?php if($display != "none") echo "required"; ?>> 
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
                <div class="grid_2">
                    <label>ไฟล์แนบ</label>
                    <div class="da-form-item large">
                        <input type="file" class="Multifile" name="userfile[]"/>
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

<!-- UPload Multi -->
<script src="https://jquery-multifile-plugin.googlecode.com/svn/trunk/jquery.MultiFile.js" type="text/javascript"></script>

