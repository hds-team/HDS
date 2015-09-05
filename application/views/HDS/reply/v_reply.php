    <!-- Detail of request -->
    <div class="da-panel">
        <div class="da-panel-header">
            <span class="da-panel-title">
                <img src="<?php echo base_url('images/icons/color/blog.png'); ?>" alt="">
                รายละเอียกคำร้อง 
            </span>
        <span class="da-panel-toggler"></span></div>
        <div class="da-panel-content">
            <table class="da-table da-detail-view">
                <tbody>
                    <?php 
                        foreach($request->result() as $row)
                        {
                    ?>
                    <tr class="odd">
                        <th>หัวข้อ</th>
                        <td><?php echo " ".$row->rq_subject; ?></td>
                    </tr>
                    <tr class="even">
                        <th>ประเภท</th>
                        <td><?php echo " ".$row->st_name; ?></td>
                    </tr>
                    <tr class="odd">
                        <th>หมวด</th>
                        <td><?php echo " ".$row->kn_name; ?></td>
                    </tr>
                    <tr class="even">
                        <th>วันที่</th>
                        <td><?php echo " ".$row->rq_date; ?></td>
                    </tr>
                    <tr class="odd">
                        <th>ผู้ส่ง</th>
                        <td><?php echo " ".$row->UsName; ?></td>
                    </tr>
                    <tr class="even">
                        <th>รายละเอียด</th>
                        <td><?php echo " ".$row->rq_detail; ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- File picture of request -->
    <div class="clear"></div><!-- new line -->
    <div class="da-panel">
        <div class="da-panel-header">
            <span class="da-panel-title">
                <img src="images/icons/color/layout.png" alt="" />
					รูปภาพประกอบ
            </span>
        </div>
        <div class="da-panel-content with-padding">
            <div class="da-gallery prettyPhoto">
                <ul>
                    <li>
                        <a href="gallery/9.jpg" rel="prettyPhoto[pp1]">
                            <img src="gallery/thumbs/9.jpg" alt="" />
                        </a>
                        <span class="da-gallery-hover">
                            <ul>
                                <li class="da-gallery-update"><a href="#">Update</a></li>
                                <li class="da-gallery-delete"><a href="#">Delete</a></li>
                            </ul>
                        </span>
                    </li>
                    <li>
                        <a href="gallery/10.jpg" rel="prettyPhoto[pp1]">
                            <img src="gallery/thumbs/10.jpg" alt="" />
                        </a>
                        <span class="da-gallery-hover">
                            <ul>
                                <li class="da-gallery-update"><a href="#">Update</a></li>
                                <li class="da-gallery-delete"><a href="#">Delete</a></li>
                            </ul>
                        </span>
                    </li>
                    <li>
                        <a href="gallery/11.jpg" rel="prettyPhoto[pp1]">
                            <img src="gallery/thumbs/11.jpg" alt="" />
                        </a>
                        <span class="da-gallery-hover">
                            <ul>
                                <li class="da-gallery-update"><a href="#">Update</a></li>
                                <li class="da-gallery-delete"><a href="#">Delete</a></li>
                            </ul>
                        </span>
                    </li>
                    <li>
                        <a href="gallery/12.jpg" rel="prettyPhoto[pp1]">
                            <img src="gallery/thumbs/12.jpg" alt="" />
                        </a>
                        <span class="da-gallery-hover">
                            <ul>
                                <li class="da-gallery-update"><a href="#">Update</a></li>
                                <li class="da-gallery-delete"><a href="#">Delete</a></li>
                            </ul>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div> 
    <div class="clear"></div><!-- new line -->
    <!-- Meassage -->
    <?php
     foreach($chat->result() as $row){
        if($row->ps_ut_id == $status){
            echo "<div class='grid_2'>.</div>"; // pull right
        }
    ?>

       <div class="grid_2">
            <div class="da-panel-widget">
                <?php echo $row->rp_detail; ?>
            </div>
        </div>

        <div class="clear"></div><!-- new line -->

    <?php
        }
    ?>
	<div class="da-panel">
		<div class="da-panel-header">
				<span class="da-panel-title">
				<img src="images/icons/black/16/pencil.png" alt="">
					ส่งข้อความ
			</span>
		</div>
		<div class="da-panel-content">
			
			<?php 
				$data['class']="da-form";
				echo form_open('HDS/reply/insert_reply', $data); 
			?><!--  form action='' method='' class='' > -->
				<input type="hidden" value="<?php echo $rq_id; ?>" name= "rq_id" />
				<div class="da-form-row">
					<label>ข้อความ</label>
					<div class="da-form-item large">
						<span class="formNote">An another form note</span>
						<textarea rows="auto" cols="auto" name="rp_detail"></textarea>
					</div>
				</div>
				<div class="da-button-row">
					<input type="reset" value="Reset" class="da-button gray left">
					<input type="submit" value="ส่งข้อความ" class="da-button green">
				</div>
			<?php
				echo form_close();
			?>	
		</div>
	</div>
	