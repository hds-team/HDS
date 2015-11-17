<!-- code.highcharts.com -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<style>
.noclose .ui-dialog-titlebar-close
{
    display:none;
}
</style>
<?php
    $this->load->config('hds_config');
    $filter = array();
    $filter =   [
                    'hds_category/ct_id/rq_ct_id/HDS' => 'ประเภท',
                    'hds_kind/kn_id/rq_kn_id/HDS' => 'หมวด',
                    $this->config->item('UMS').'.umsystem/StID/rq_sys_id/UMS' => 'ระบบ',
                    $this->config->item('UMS').'.umdepartment/dpID/rq_comp_id/UMS' => 'องค์กรณ',
                    'hds_tor_proj/hds_contract.ctr_tp_id/x/HDS' => 'สัญญา TOR'
                ];
?>
<div class="da-panel">
	<div class="da-panel-header">
    	<span class="da-panel-title">
            <img src="<?php echo base_url('images/icons/black/16/computer_imac.png'); ?>" alt="Panel">
            กราฟรายงานสถิติจำนวนคำร้อง
        </span>
    </div>
    <div class="da-panel-content with-padding">
    	<div id="container" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
    </div>
</div>

<div class="da-panel collapsible" style="display: none;">
	<div class="da-panel-header">
    	<span class="da-panel-title">
            <img src="<?php echo base_url('images/icons/black/16/list.png'); ?>" alt="">
            ตารางสถิติคำร้อง
        </span>
        
    <span class="da-panel-toggler"></span></div>
    <div class="da-panel-content">
        <table id="da-ex-datatable-numberpaging" class="da-table">
        	<thead>
                <th class=" sorting_1">Gecko</th>
                <th class=" ">Firefox 1.0</th>
                <th class=" ">Win 98+ / OSX.2+</th>
                <th class=" ">1.7</th>
                <th class=" ">A</th>
	        </thead>
	            
	        <tbody role="alert" aria-live="polite" aria-relevant="all">
	    		<tr class="odd">
	                <td class=" sorting_1">Gecko</td>
	                <td class=" ">Firefox 1.0</td>
	                <td class=" ">Win 98+ / OSX.2+</td>
	                <td class=" ">1.7</td>
	                <td class=" ">A</td>
	            </tr>
	        </tbody>
    	</table>
    </div>
</div>

<!--
#################################################
Dialog Filter
#################################################
-->

<div id = "filter" class="da-panel-content" title="Filter" style="padding: 0px; display: none;">
	<div class="da-form-row">
		<div class="grid_4" id="confirm_text" align="center">
			<div class="da-panel-content">
		    	<form class="da-form">
                    <div class="da-form-row">
                        <label>เริ่ม</label>
                        <div class="da-form-item large">
                            <input type="text" id="from" tabindex="-1">
                        </div>
                    </div>
                    <div class="da-form-row">
                        <label>ถึง</label>
                        <div class="da-form-item large">
                            <input type="text" id="to" tabindex="-1">
                        </div>
                    </div>
		        	<div class="da-form-row">
		            	<label>ประเภทรายงาน</label>
		                <div class="da-form-item large">
                            <select id="filter_by">
                                <option>เลือก</option>
                                <?php
                                foreach($filter as $key => $value)
                                {
                                ?>
                                    <option value="<?php echo $key; ?>">
                                        <?php echo $value; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
		                </div>
		            </div>
		        </form>
		    </div>
		</div>
	</div>
</div>

<script>
var data_chart;
$(document).ready(function(){
    var data;

	$('#filter').dialog({
        closeOnEscape: false,
        autoOpen: true,
        resizable: false,
        modal: false,
        width: 500,
        
        dialogClass: "noclose"
	});


    $('#filter_by').change(function(){

        //-------- Get Date from controller
        var key = $('#filter_by').val();
        var from = $('#from').val().split("/").reverse().join("-");
        var to = $('#to').val().split("/").reverse().join("-");

        var url = "<?php echo base_url('index.php/'.$this->config->item('sys_name').'/stats/get_stat_chart'); ?>"+"/"+key+"/"+from+"/"+to;
        console.log(url);
        $.getJSON(url, function(res){
            console.log(res);
            //-------- Replace Graph head
            var title = $( "#filter_by option:selected" ).text();
            set_title(title);

            //------ Decllare Arr
            var arr = new Array(res.name.length);
            for(var i=0; i < res.name.length; i++)
            {
                arr[i] = new Array(2);
            }
            
            //------ Assign Value
            for(var i=0; i < res.name.length; i++)
            {
                arr[i][0] = res.name[i];
                arr[i][1] = parseInt(res.value[i]);
            }
           
            //------ Example Data 
            Data =  [
                        ['test',"194.1"],
                        ['test', "95.6"],
                        ['test', "54.4"]
                    ];
            //------ Add value to graph
            addSerie(arr);
        });
    });

    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'รายงานเปรียบเทียบจำนวนคำร้อง'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'จำนวนคำร้อง'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{point.y:.0f} คำร้อง</b>'
        },
        series: [{
            name: 'Population',
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });

    //-------- Date rang

    //------ Add for thai date
    var d = new Date();
    var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);

    $( "#from" ).datepicker({
        defaultDate: "+1w",
        onClose: function( selectedDate ) {
            $( "#to" ).datepicker( "option", "minDate", selectedDate );
        },
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true,
        isBuddhist: true,
        defaultDate: toDay,
        dayNames: ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'],
        dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
        monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
        monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'],
    });
    $( "#to" ).datepicker({
        defaultDate: "+1w",
        onClose: function( selectedDate ) {
            $( "#from" ).datepicker( "option", "maxDate", selectedDate );
        },
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true,
        isBuddhist: true,
        defaultDate: toDay,
        dayNames: ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'],
        dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
        monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
        monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'],
    });

});

function addSerie(res){
    var chart = $('#container').highcharts();
    chart.series[0].remove();
    chart.addSeries({
        data: res
    });
    
}

function set_title(str){
    var chart = $('#container').highcharts();
    chart.setTitle({
        text: 'กราฟรายงานสถิติจำนวนคำร้องต่อ'+str
    });
}



</script>


