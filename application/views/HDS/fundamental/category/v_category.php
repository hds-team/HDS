<div class="grid_1">
    .
</div>

<div class="grid_2">
    <div class="da-panel">
        <div class="da-panel-header">
        	<span class="da-panel-title">
                เพิ่มประเภท
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
                    	<input type="text" name="category" />
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
            <img src="images/icons/black/16/list.png" alt="">
            เพิ่มประเภท
        </span>
        
    <span class="da-panel-toggler"></span></div>
    <div class="da-panel-content">
        <table class="da-table">
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
                    <td><center><?php echo $row->ct_name;?></center></td>
                    <td><center>
                        <?php echo $row->ct_status;?>
                    </center></td>
                    <td><center>
                            <div class="grid_2">
                                <input type="submit" value="แก้ไข" class="da-button blue" style="width:60%" />
                            </div>
                            <div class="grid_2">
                                <input type="submit" value="ลบ" class="da-button red" style="width:60%" />
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
