<div class="grid_4">
    <div class="da-panel collapsible">
        <div class="da-panel-header">
            <span class="da-panel-title">
                <img src="<?php echo base_url('images/icons/black/16/list.png'); ?>" alt="" />
                รายการคำร้อง
            </span>
            
        </div>
        <div class="da-panel-content">
            <table id="da-ex-datatable-default" class="da-table">
                <thead>
                    <tr>
                        <th><center><b>ลำดับ</b></center></th>
                        <th><center><b>หัวเรื่อง</b></center></th>
                        <th><center><b>วันที่</b></center></th>
                        <th><center><b>ระบบ</b></center></th>
                        <th><center><b>สถานะ</b></center></th>
                        <th><center><b>รายละเอียด</b></center></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $index = 1;
                        foreach($list->result() as $row)
						{
                    ?>
                    <tr>
                        <td><center><?php echo $index++; ?></center></td>
                        <td><left><?php echo $row->rq_subject; ?></left></td>
                        <td><center><?php echo $this->date_time->DateThai($row->rq_date); ?></center></td>
                        <td><center><?php echo $row->StNameT; ?></center></td>
                        <td>
                            <center>
                                <?php
                                    switch($row->st_id){
                                        case 3: echo "รอดำเนินงาน";
                                                break;
                                        case 5:
                                        case 6: echo "กำลังดำเนินงาน";
                                                break;
                                        case 7: echo "เสร็จสิ้น";
                                                break;
                                        default: echo $row->st_name;
                                    } 
                                ?>
                            </center>
                        </td>
                        <td><center><a href="<?php echo base_url('index.php/HDS/reply/detail_sys/'.$row->rq_id.'/0/1');?>"><img src="<?php echo base_url('images/icons/color/magnifier.png'); ?>"></center></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
