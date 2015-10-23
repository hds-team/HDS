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
    function set_value(ctr_id, ctr_value){
        $( "#ctr_id").val(ctr_id); //set value to input by id
        $( "#ctr_value").val(ctr_value); //set value to input by id
        $( "#dialog1" ).dialog( "open" ); //open dialog
    }
</script>
<div class="grid_1">
    <div class="da-panel"></div>
</div>

<div class="grid_2">
    <div class="da-panel">
        <div class="da-panel-header">
        	<span class="da-panel-title">
					เพิ่มช่องทางการติดต่อ
            </span>
        </div>
        <div class="da-panel-content">
            <?php 
                $data['class'] = "da-form";
                echo form_open('', $data); 
             ?>
            	<div class="da-form-row">
                	<label>ช่องทางการติดต่อ</label>
                    <div class="da-form-item large">
                    	<input type="text" name="ctr_value" required/>
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
                    <th><center>ช่องทางการติดต่อ</center></th>
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
                    <td><?php echo $row->ctr_value; ?></td>
                    <td>
                        <center>
                        <?php 
                        if ($row->ctr_tp_id==1)
						{
                        echo "<a href ='".base_url("index.php/HDS/fundamental/update_status_level/".$row->ctr_id."/0")."'><input type='submit' value='เปิด' class='da-button green' style='width:60%' /></a>";
						}
						else
						{
							echo "<a href ='".base_url("index.php/HDS/fundamental/update_status_level/".$row->ctr_id."/1")."'><input type='submit' value='ปิด' class='da-button red' style='width:60%' /></a>";
						}
                        ?>
                        </center>
                    </td>
                    <td><center>
                            <div class="grid_2">
                              <button id="opener1"  class="da-button blue" style="width:60%" onclick="set_value('<?php echo $row->ctr_id; ?>', '<?php echo $row->ctr_value; ?>');">แก้ไข</button>
                            </div>
                            <div class="grid_2">
                               <?php 
                               if($row->rq_ctr_id==null){
                              echo "<a href ='".base_url("index.php/HDS/fundamental/delete_level/".$row->ctr_id."/")."'><input type='submit' value='ลบ' class='da-button red' style='width:60%' /></a>";
                                }
                           else{
                               echo "<input type='submit' value='ลบ' id='opener' class='da-button gray' style='width:60%' />"; 
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