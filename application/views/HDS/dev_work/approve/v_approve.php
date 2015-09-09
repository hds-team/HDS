
<div class="da-panel-content">
    <table class="da-table">
        <thead>
            <th>ลำดับ</th>
            <th>หัวเรื่อง</th>
            <th>วันที่</th>
            <th>ประเภท</th>
            <th>หมวด</th>
            <th>ผู้ส่ง</th>
            <th>ดำเนินการ</th>
        </thead>
        <?php $index = 0;
            foreach($approve->result() as $row)
            {
        ?>
        <tbody>
            <td><center><?php echo $index+1; ?></center></td>
            <td><?php echo $row->rq_subject; ?></td>
            <td><?php echo $row->rp_date;?></td>
            <td><?php echo $row->ct_name; ?></td>
            <td><?php echo $row->kn_name; ?></td>
            <td><?php echo $row->UsName; ?></td>
            <td><input type="submit" value="รับทราบ" class="da-button green"> </td>
        </tbody>
        <?php 
            $index++;
            } 
        ?>
    </table>
</div><!-- content-->

    
    
