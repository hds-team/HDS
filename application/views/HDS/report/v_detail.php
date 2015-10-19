<style>
    th{
        text-align: center;
    }
    .center{
        text-align: center;
    }
</style>
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
                        <th><b>ลำดับ</b></th>
                        <th><b>หัวเรื่อง</b></th>
                        <th><b>วันที่</b></th>
                        <th><b>ระบบ</b></th>
                        <th><b>สถานะ</b></th>
                        <th><b>รายละเอียด</b></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $index = 1;
                        foreach($list->result() as $row)
						{
                    ?>
                    <tr>
                        <td class="center"><?php echo $index++; ?></td>
                        <td><left><?php echo $row->rq_subject; ?></left></td>
                        <td class="center"><?php echo $this->date_time->DateThai($row->rq_date); ?></td>
                        <td class="center"><?php echo $row->StNameT; ?></td>
                        <td class="center">
                            
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
                            
                        </td>
                        <td class="center"><a href="<?php echo base_url('index.php/HDS/reply/detail_sys/'.$row->rq_id.'/0/1');?>"><img src="<?php echo base_url('images/icons/color/magnifier.png'); ?>"></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
