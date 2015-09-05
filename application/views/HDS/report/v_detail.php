
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
                        <th>ลำดับ</th>
                        <th>หัวเรื่อง</th>
                        <th>วันที่</th>
                        <th>รายละเอียด</th>
                        <th>สถานะ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $index = 1;
                        foreach($list->result() as $row){
                    ?>
                    <tr>
                        <td><?php echo $index++; ?></td>
                        <td><?php echo $row->rq_subject; ?></td>
                        <td><?php echo $row->rq_date; ?></td>
                        <td><img src="<?php echo base_url('images/icons/color/magnifier.png'); ?>"></td>
                        <td><?php echo $row->st_name; ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
