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
    function set_value(ct_id, ct_name){
        $( "#ct_id").val(ct_id); //set value to input by id
        $( "#ct_name").val(ct_name); //set value to input by id
        $( "#dialog1" ).dialog( "open" ); //open dialog
    }
    function set_value2(){
        $( "#dialog" ).dialog( "open" ); //open dialog
    }
</script>
<style>
	.center{
		text-align: center;
	}
</style>
<div class="grid_1">
    .
</div>

<div class="grid_2">
    <div class="da-panel">
        <div class="da-panel-header">
        	<span class="da-panel-title">
					<b>เพิ่มประเภท</b>
            </span>
        </div>
         
        <div class="da-panel-content">
            <?php 
                $data['class'] = "da-form";
                echo form_open('HDS/fundamental/insert_category', $data); 
             ?>
            	<div class="da-form-row">
                	<label>ประเภท</label>
                     <div class="da-form-item large">
                    	<input type="text" name="category" required/>
                    </div>
                </div>
                <div class="da-button-row">
                	<input type="submit" value="ตกลง" class="da-button green" />  
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
				<b>เพิ่มประเภท</b>
        </span>
		<span class="da-panel-toggler"></span>
	</div>

    <div class="da-panel-content">
        <table id="da-ex-datatable-numberpaging" class="da-table">
            <thead>
                <tr>
                    <th style="width:8%"><center><b>ลำดับ</b></center></th>
                    <th><center><b>หมวด</b></center></th>
                    <th style="width:15%"><center><b>สถานะ</b></center></th>
                    <th style="width:18%" ><center><b>ดำเนินการ</b></center></th>
                </tr>
            </thead>
            <tbody>
               <?php
                    $index=0;
                    
                    foreach ($query->result() as $row)
                    {                        
                    ?>
                <tr>
                    <td class="center"><?php echo ++$index;?></td>
                    <td><?php echo $row->ct_name;?></td>
                    <td>
                        <center>
                        <?php 
                        if ($row->ct_status==1)
						{
                        ?>
                        <?php
                        echo "<a href ='".base_url("index.php/HDS/fundamental/update_status_category/".$row->ct_id."/0")."'>";
                        ?>
                        <img src="<?php echo base_url();?>images/icons/color/on.png" alt="" value='เปิด'></a>
                        <?php
						}
						else
						{
                        ?>
                        <?php
						echo "<a href ='".base_url("index.php/HDS/fundamental/update_status_category/".$row->ct_id."/1")."'>";
                        ?>
                        <img src="<?php echo base_url();?>images/icons/color/off.png" alt="" value='ปิด'></a>
						<?php
                        }
                        ?>
                        </center>
                    </td>
                    <td><center>
                            <div class="grid_2">
                              <img src="<?php echo base_url();?>images/icons/color/pencil.png" alt="" value='ลบ'id ='opener1' onclick="set_value('<?php echo $row->ct_id; ?>', '<?php echo $row->ct_name; ?>');">
                            </div>
                            <div class="grid_2">
                               <?php
                               if($row->rq_ct_id==null){
                                ?>
                               <?php
                              echo "<a href ='".base_url("index.php/HDS/fundamental/delete_category/".$row->ct_id."/")."'>";
                                ?>
                                <img src="<?php echo base_url();?>images/icons/color/cross.png" alt="" value='ลบ'></a>
                                <?php
                                }
                            else{
                                ?>
                                 <img src="<?php echo base_url();?>images/icons/black/16/cross_small.png" alt="" value='ลบ' id='opener' id='opener2' onclick='set_value2()'>
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
        <p>รายการนี้ถูกใช้งานอยู่ไม่สามารถลบได้</p>
    </div>

    <div id="dialog1" class="da-panel-content" title="แก้ไขประเภท" style="padding: 0px">
                <?php 
                $data['class'] = "da-form";
                echo form_open('HDS/fundamental/update_category', $data); 
                ?>
                           
            <input type="hidden" id="ct_id"name="ct_id">
                <div class="da-form-row">
                <label>ประเภท</label>
                     <div class="da-form-item large">
                    <input type="text" id="ct_name" name="ct_name" required>
                     </div>
                </div>
            <div class="da-button-row">
                <input type="reset" value="Reset" class="da-button gray left">
                <input type="submit" value="แก้ไข" class="da-button red">
                <?php echo form_close(); ?>
            </div>
        </form>
    </div>  