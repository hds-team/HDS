<script>
  //---------- DIALOG CODE
    $(function() 
	{
      $( "#dialog" ).dialog({
        autoOpen: false,
        resizable: false,
        modal: true
      });

      $( "#dialog1" ).dialog({
        autoOpen: false,
        resizable: false,
        width: 600,
        modal: true
      });
   
      $( "#opener" ).click(function() {
        $( "#dialog" ).dialog( "open" );
      });
    });

    //----------- set value on click to input
    function set_value(lv_id, lv_name){
        $( "#lv_id").val(lv_id); //set value to input by id
        $( "#lv_name").val(lv_name); //set value to input by id
        $( "#dialog1" ).dialog( "open" ); //open dialog
    }
</script>
<div class="grid_1">
    .
</div>

<div class="grid_2">
    <div class="da-panel">
        <div class="da-panel-header">
        	<span class="da-panel-title">
                เพิ่มระดับความสำคัญ

            </span>
        </div>
         
        <div class="da-panel-content">
            <?php 
                $data['class'] = "da-form";
                echo form_open('HDS/fundamental/insert_level', $data); 
             ?>
            	<div class="da-form-row">
                	<label>ระดับความสำคัญ
</label>
                     <div class="da-form-item large">
                    	<input type="text" name="level" required/>
                    </div>
                </div>
                <div class="da-button-row">
                	<input type="submit" value="Submit" class="da-button green" />  
                </div>
            <?php echo form_close(); ?>
        </div>
    </div><!--class="da-panel-->
</div>
            
<div class="clear"></div>
<!-- Content Area -->
<div class="da-panel collapsible">
    <div class="da-panel-header">
        <span class="da-panel-title">
            <img src="<?php echo base_url();?>images/icons/black/16/list.png" alt="">
				เพิ่มระดับความสำคัญ

        </span>
		<span class="da-panel-toggler"></span>
	</div>

    <div class="da-panel-content">
        <table id="da-ex-datatable-numberpaging" class="da-table">
            <thead>
                <tr>
                    <th><center>ลำดับ</center></th>
                    <th><center>หมวด</center></th>
                    <th><center>สถานะ</center></th>
                    <th width=250 ><center>ดำเนินการ</center></th>
                </tr>
            </thead>
            <tbody>
               <?php
                    $index=0;
                    
                    foreach ($query->result() as $row)
                    {                        
                    ?>
                <tr>
                    <td><center><?php echo ++$index;?></center></td>
                    <td><?php echo $row->lv_name;?></td>
                    <td>
                        <center>
                        <?php 
                        if ($row->lv_status==1)
						{
                        ?>
                        <?php
                        echo "<a href ='".base_url("index.php/HDS/fundamental/update_status_level/".$row->lv_id."/0")."'>";
                        ?>
                        <img src="<?php echo base_url();?>images/icons/color/on.png" alt="" value='เปิด'></a>
                        <?php
						}
						else
						{
                        ?>
                        <?php
						echo "<a href ='".base_url("index.php/HDS/fundamental/update_status_level/".$row->lv_id."/1")."'>";
                        ?>
                        <img src="<?php echo base_url();?>images/icons/color/off.png" alt="" value='ปิด'></a>
						<?php
                        }
                        ?>
                        </center>
                    </td>
                    <td><center>
                            <div class="grid_2">
                              <img src="<?php echo base_url();?>images/icons/color/pencil.png" alt="" value='ลบ'id ='opener1' onclick="set_value('<?php echo $row->lv_id; ?>', '<?php echo $row->lv_name; ?>');">
                            </div>
                            <div class="grid_2">
                               <?php
									if($row->lg_lv_id==null){
                                ?>
                               <?php
									echo "<a href ='".base_url("index.php/HDS/fundamental/delete_level/".$row->lv_id."/")."'>";
                                ?>
									<img src="<?php echo base_url();?>images/icons/color/cross.png" alt="" value='ลบ'></a>
                                <?php
                                }
                            else{
                                ?>
                                 <img src="<?php echo base_url();?>images/icons/color/cross.png" alt="" value='ลบ' id='opener' id='opener2' onclick='set_value2()'>
                            <?php
                            }
                               ?>
                            </div>
                        </center>
                    </td> 
                </tr>
                <?php 
                    }
                    ?>
            </tbody>
        </table>
    </div> <!--da-panel-content-->
</div> <!--da-panel collapsible-->
    <div id="dialog" title="แจ้งเตือน">
        <p>รากการนี้ถูกใช้งานอยู่ไม่สามารถลบได้</p>
    </div>

    <div id="dialog1" class="da-panel-content" title="แก้ไขระดับความสำคัญ
" style="padding: 0px">
                <?php 
                $data['class'] = "da-form";
                echo form_open('HDS/fundamental/update_level', $data); 
                ?>
                           
            <input type="hidden" id="lv_id"name="lv_id">
                <div class="da-form-row">
                <label>ระดับความสำคัญ
</label>
                     <div class="da-form-item large">
                    <input type="text" id="lv_name" name="lv_name" required>
                     </div>
                </div>
            <div class="da-button-row">
                <input type="reset" value="Reset" class="da-button gray left">
                <input type="submit" value="แก้ไข" class="da-button red">
                <?php echo form_close(); ?>
            </div>
        </form>
    </div>  