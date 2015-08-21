<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: 'จำนวนการเข้าใช้กลุ่มระบบในแต่ละเดือน'
            },
            subtitle: {
                text: 'ต่อเดือนทั้งปี'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'จำนวนครั้งที่เข้าใช้ระบบ'
                }
            },
            legend: {
                layout: 'vertical',
                backgroundColor: '#FFFFFF',
                align: 'left',
                verticalAlign: 'top',
                x: 100,
                y: 70,
                floating: true,
                shadow: true
            },
            tooltip: {
                formatter: function() {
                    return ''+
                        this.x +': '+ this.y +' mm';
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
                series: [{
                name: 'Tokyo',
                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 280, 54.4]
    
            }, {
                name: 'New York',
                data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]
    
            }, {
                name: 'London',
                data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]
    
            }, {
                name: 'Berlin',
                data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]
    
            }]
        });
    });
    
});
		</script>
<script src="<?php echo base_url();?>js/ums/highcharts.js"></script>
<script src="<?php echo base_url();?>js/exporting.js"></script>
	<!-- Main Content Wrapper -->
                <div id="da-content-wrap" class="clearfix">
                	<!-- Content Area --> 
					<?php 
						$countsystem = 0;
						foreach($log as $test){
							echo mb_substr($test['LogAction'],13,-($length+3),'UTF-8')."<br />";
					}?>
                	<div id="da-content-area">					
						<div class="grid_1">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="<?php echo base_url(); ?>images/icons/black/16/computer_imac.png" alt="" />
										<?php foreach($system as $temp){ $sysname = $temp['StNameT']; }?>
											<b><?php echo $sysname;?></b>
                                    </span>
                                </div>
								<?php foreach($system as $sys){ ?>
							 <div class="da-panel-content with-padding"> 
								<form class="da-form" style="padding-top:0px;">
								   <fieldset class="da-form-inline">
									
									<legend><b><?php echo $sys['GpNameT'];?></b></legend>
									<div class="Permission" onclick='window.location="<?php echo base_url();?>index.php/UMS/showReport/reportGroup/<?php echo $sys['GpID'];?>"'>
										<div class="Gear">
										</div>
										<div class="Desc" >
										<img src="<?php echo base_url();?>images/1378991964_people - Copy.png" alt="" />
											 <b><?php echo $sys['num']." "."ผู้ใช้";?></b>
										</div>
									</div>
								 </fieldset>	
								</form>								
							  </div> 
							<?php } ?>
							</div>
						</div>
						<div class="grid_3">
							<div class="da-panel">
						<div class="da-panel-header">
									<span class="da-panel-title">
										<img src="<?php echo base_url();?>images/icons/color/wand.png">
										จำนวนการเข้าใช้ระบบ
									</span>
								</div>
						<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
						</div>
						</div>
					</div>
				</div>	
				</div>
