<!-- code.highcharts.com -->

<script src="http://github.highcharts.com/highcharts.js"></script>
<script src="http://github.highcharts.com/modules/exporting.js"></script>
<script src="http://github.highcharts.com/modules/drilldown.js"></script>

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
                    $this->config->item('UMS').'.umdepartment/dpID/rq_comp_id/UMS' => 'องค์กร',
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
        var index = $("#filter_by option:selected").index();

        var url = "<?php echo base_url('index.php/'.$this->config->item('sys_name').'/stats/get_stat_chart'); ?>"+"/"+key+"/"+from+"/"+to;
        console.log(url);
        $.getJSON(url, function(res){
            //console.log(res);
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
            var chart = $('#container').highcharts();

            //---------- Remove all series
            /*
            while(chart.series.length > 0)
                chart.series[0].remove(true);
            */
            //---------- Add Series
            var ary_temp = new Array();
            var options = {
                    chart: {
                        renderTo: 'container',
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

                    }],
            
                    drilldown: {
                        series: [{}]
                    }
                };
                options.series = new Array();
                options.series[0] = new Object();
                options.series[0].data = new Array();
                
                if(index == 5)
                { 
                    options.drilldown = new Object();
                    options.drilldown.series = new Array();
                }
                

            for(var i=0; i < res.name.length; i++)
            {
                arr[i][0] = res.name[i];
                arr[i][1] = parseInt(res.value[i]);

                
                
                //options.series[i].name = res.name[i];
                
                //options.series[0].data = new Array();
                options.series[0].data[i] = new Object();
                options.series[0].data[i] = {
                        name: res.name[i],
                        y: parseInt(res.value[i]),
                        drilldown: res.id[i]
                };

                if(index == 5)
                { 
                    options.drilldown.series[i] = new Object();
                    options.drilldown.series[i].id = res.id[i];
                    options.drilldown.series[i].name = res.name[i];
                }

                /*###########################################################
                  Add drilldown
                ###########################################################*/

                group_by = "ctr_id";
                name = "ctr_value";
                url = "<?php echo base_url('index.php/'.$this->config->item('sys_name').'/stats/get_drilldown'); ?>"+"/"+res.id[i]+"/"+group_by+"/"+name+"/"+from+"/"+to;
                console.log(url);
                $.ajaxSetup({
                    async: false
                });
                

                $.getJSON(url, function(res_drill){
                    var arr_j = new Array(res_drill.name.length);
                                    
                    for(var j=0; j < arr_j.length; j++)
                    {
                        arr_j[j] = new Array(2);
                    }

                    //---------- Add Drilldown
                    var tp_id = "";

                    var str_ary = "["

                    for(var j=0; j < res_drill.name.length; j++)
                    {
                        arr_j[j][0] = res_drill.name[j];
                        arr_j[j][1] = parseInt(res_drill.value[j]);
                        //tp_id = res_drill.tp_id[j]

                    }

                    options.drilldown.series[i].data = arr_j;
                    //options.drilldown.series[i].drilldown = res_drill.id[i];
                    console.log(options);
                    

                });
                var chart = new Highcharts.Chart(options);
            }
    
            //------ Example Data 
            Data =  [
                        ['test',"194.1"],
                        ['test', "95.6"],
                        ['test', "54.4"]
                    ];
            //------ Add value to graph
            //addSerie(arr,title);
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
                data: []
            }],
        
        drilldown: {
            series: []
        }
        
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

function drill_add(where, i, from, to){
    
        group_by = "ctr_id";
        name = "ctr_value";
        temp = "";
        url = "<?php echo base_url('index.php/'.$this->config->item('sys_name').'/stats/get_drilldown'); ?>"+"/"+where+"/"+group_by+"/"+name+"/"+from+"/"+to;
       
        return $.getJSON(url);
}



</script>


