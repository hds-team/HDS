
    <!-- Detail of request -->
    <div class="da-panel">
        <div class="da-panel-header">
            <span class="da-panel-title">
                <img src="images/icons/black/16/computer_imac.png" alt="Panel">
                รายละเอียกคำร้อง 
            </span>
            
        </div>
		<?php 
			foreach($request->result() as $row)
			{
				$rq_id = $row->rq_id;
		?>
			<div class="da-panel-content with-padding">
				<p>หัวข้อ : <?php echo " ".$row->rq_subject; ?></p>
				<p>ประเภท : <?php echo " ".$row->st_name; ?></p>
				<p>หมวด : <?php echo " ".$row->kn_name; ?></p>
				<p>วันที่ : <?php echo " ".$this->date_time->DateThai($row->rq_date); ?></p>
				<p>ผู้ส่ง : <?php echo " ".$row->UsName; ?></p>
				<p>รายละเอียด : <?php echo " ".$row->rq_detail; ?></p>
			</div>
		<?php
			}
		?>
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
    <!-- Meassage -->
    <div class="clear"></div><!-- new line -->
    <div class="grid_2">
        <div class="da-panel-widget">
            Plain grid area
        </div>
    </div>

    <div class="clear"></div><!-- new line -->
    <div class="grid_2">.</div><!-- pull right -->
    <div class="grid_2">
        <div class="da-panel-widget">
            Plain grid area
        </div>
    </div>

    <div class="clear"></div><!-- new line -->
    <div class="grid_2">.</div><!-- pull right -->
    <div class="grid_2">
        <div class="da-panel-widget">
            Plain grid area
        </div>
    </div>
    <div class="clear"></div><!-- new line -->
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
	