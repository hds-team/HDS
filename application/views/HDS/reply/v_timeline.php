<!-- Timeline styl -->
<script src="//cdn.ckeditor.com/4.5.4/standard/ckeditor.js"></script>
<style>
    div {
        font-family: Helvetica, Arial, sans-serif;
        box-sizing: border-box;
    }
    .timeline {
        width: 800px;
    }
    .timeline .timeline-item {
        width: 100%;
    }
    .timeline .timeline-item .info, .timeline .timeline-item .year {
        color: #eee;
        display: block;
        float:left;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        transition: all 1s ease;
    }
    .timeline .timeline-item.close .info, .timeline .timeline-item.close .year {
        color: #ccc;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        transition: all 1s ease;
    }
    .timeline .timeline-item .year {
        font-size: 20px;
        font-weight: bold;
        width: 22%;
    }
    .timeline .timeline-item .info {
        width: 100%;
        width: 78%;
        margin-left: -2px;
        padding: 0 0 40px 35px;
        border-left: 4px solid #aaa;
        font-size: 14px;
        line-height: 20px;
    }
    .timeline .timeline-item .marker {
        background-color: #fff;
        border: 4px solid #aaa;
        height: 20px;
        width: 20px;
        border-radius: 100px;
        display: block;
        float: right;
        margin-right: -14px;
        z-index: 2000;
        position: relative;
    }
    .timeline .timeline-item.active .info, .timeline .timeline-item:hover .info {
        color: #444;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        transition: all 1s ease;
    }
    .timeline .timeline-item.active .year, .timeline .timeline-item:hover .year {
        color: #9DB668;
    }
    .timeline .timeline-item .marker .dot {
        background-color: white;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        transition: all 1s ease;
        display: block;
        border: 4px solid white;
        height: 12px;
        width: 12px;
        border-radius: 100px;
        float: right;
        z-index: 2000;
        position: relative;
    }
    .timeline .timeline-item.active .marker .dot, .timeline .timeline-item:hover .marker .dot {
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        transition: all 1s ease;
        box-shadow: inset 1px 1px 2px rgba(0, 0, 0, 0.2);
    }


</style>
<script>
    $(document).ready(function(){


    });
    var required = false;
    function show_alert(rp_msg_type){
        //------- Get data from CKEditer
        var rp_detail_id = 'rp_detail_'+rp_msg_type;
        var text = CKEDITOR.instances[rp_detail_id].getData();
        //var required = false;

        if(text !== "")
        {
            //alert("PASS");
            required = true;
            $("#rp_detail_confirm").val(text);
        }
        else
        {
            required = false;
            //alert("FAIL");
            text = "--------กรุณากรอกข้อมูล--------";
        }

        $("#confirm_text").html(text);

        //------- Get rq_id
        var rq_id = $("#rq_id_"+rp_msg_type).val()
        $("#rq_id_confirm").val(rq_id);

        //------- Get type
        $("#rp_msg_type_confirm").val(rp_msg_type);

        $( "#confirm" ).dialog( "open" );
    }

</script>
<?php
    if($timeline_content->num_rows() == 0)
    {
        echo "<BR><center>ไม่พบประวัติการสนทนา</center><BR>";
    }
?>
<div class="timeline grid_4" style="margin-top : 20px;">
    <?php
        $count = 0;
        foreach($timeline_content->result() as $rs)
        {
            if($count == 0)
            {
                $dot_color_check = $rs->GpID;
            }
            $count++;
    ?>
    <div class="timeline-item active">
        <div class="year">
            <h1 style="color: #9DB668"><b><?php echo $this->date_time->DateThai($rs->rp_date); ?></b></h1>
            <span class="marker">
                <span class="dot" style="background-color: 
                    <?php 
                        if($dot_color_check == $rs->GpID) 
                        {
                            // orang
                            echo '#FF9933';
                        }
                        else
                        {
                            //green
                            echo '#66FF66';
                        }
                    ?>"
                    >
                </span>
            </span>
        </div>
        <div class="info">
            <p><?php echo $rs->rp_detail."</p><p> โดย : ".$rs->UsName." (".$rs->GpNameT.")<BR>"; ?>
            <?php echo "เวลา : ".$rs->rp_time; ?></p>
        </div>
    </div>
    <?php
        }
    ?>
</div> 
<div class="clear"></div>

<!-- Input Box -->
<div class="da-panel grid_4" style="">
    <div class="da-panel-header">
        <span class="da-panel-title">
            <img src=<?php echo base_url("images/icons/black/16/pencil.png"); ?> alt="">
                <b>ส่งข้อความ</b>
        </span>
    </div>
    <div class="da-panel-content">
        
        <?php 
            $data['class']= "da-form";
            $data['id']= "timeline_form".$rp_msg_type;
            echo form_open('', $data); 
        ?>
            <input type="hidden" value="<?php echo $rq_id; ?>" id="rq_id_<?php echo $rp_msg_type; ?>" />
            <div class="da-form-row">
                <label>ข้อความ</label>
                <div class="da-form-item large">
                    <textarea id="rp_detail_<?php echo $rp_msg_type; ?>" rows="auto" cols="auto" width="100%" required></textarea>
                    <script>
                        CKEDITOR.replace( 'rp_detail_<?php echo $rp_msg_type; ?>' );
                    </script>
                </div>
            </div>
            <div class="da-button-row">
                <input type="reset" value="Reset" class="da-button gray left">
                <input type="button" class="da-button green" onclick="show_alert(<?php echo $rp_msg_type; ?>)" value="ส่งข้อความ">
            </div>
        <?php
            echo form_close();
        ?>  
    </div>
</div>