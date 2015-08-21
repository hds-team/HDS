<style type="text/css"> .onmouse:hover{background-color:#f2efef;}</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<?php  
		foreach($system as $systemp){
			$lastarray = $systemp['StNameT'];
			
			}
		  ?>
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: ''
            },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
            	percentageDecimals: 1
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'คิดเป็น',
                data: [ <?php foreach($system as $syspercen){
										if($syspercen['StNameT'] == NULL){
											$syspercen['StNameT'] = 'อื่นๆ';
										}
										$temp = ($syspercen['num'] * 100) / $many; 
										$percen = round($temp,2);?>
										['<?php echo $syspercen['StNameT']; ?>',<?php echo $percen;?>]
										<?php if($syspercen['StNameT'] == $lastarray){
													echo "";
										}
										else{
											echo ",";
										} }?>
                    /*['Firefox',   25.0],
                    ['IE',       46.8],
					{
                        name: 'Chrome',
                        y: 12.8,
                        sliced: true,
                        selected: true
                    }
					,
                    ['Safari',    8.5],
                    ['Opera',     6.2],
                    ['Others',   0.7]*/
                ]
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
                	<div id="da-content-area" >
						<div class="grid_3">
							<div class="da-panel">
								<div class="da-panel-header">
									<span class="da-panel-title">
										<img src="<?php echo base_url();?>images/icons/color/wand.png">
										อัตราส่วนผู้ใช้ทุกระบบ
									</span>
								</div>
						<div id="container" style="min-width: 400px; height: 400px; margin: 10 auto">
						</div>
						</div>
						</div>
						
                    	<div class="grid_1">
                        	<div class="da-panel-widget">
                                <h1>รายงานผู้ใช้ในระบบ</h1>
								<hr />
                                <ul class="da-summary-stat">
                                	<li>
                                    	<a href="#">
                                            <span class="da-summary-icon" style="background-color:#e15656;">
                                                <img src="<?php echo base_url();?>images/1378991964_people - Copy.png" alt="" />
                                            </span>
                                            <span class="da-summary-text">
                                                <span class="value" ><?php echo $many." ผู้ใช้";?></span>
                                                <span class="label">ผู้ใช้ทั้งหมด</span>
                                            </span>
                                        </a>
                                    </li>
									<?php foreach ($system as $sys) { 
												if($sys['ColorHeadTop']){
													$bgcl = $sys['ColorHeadTop'];
												}
												else{
													$bgcl = "#656565";
												}
												if($sys['StIcon']){
													$hic = $sys['StIcon'];
													$icondate = $sys['IcDate'];
												}
												else{
													$hic = "cog.png";
													$icondate = "oldpic";
												}
												if($sys['StNameT'] == NULL){
													$sys['StNameT'] = 'อื่นๆ';
												}	
												$path = $this->config->item('uploads_url');
												$pathString = $path."system&image=".$hic."&date=".$icondate;
									?>
                                    <li>
                                    	<a href="<?php echo base_url();?>index.php/UMS/showReport/reportSystem/<?php echo $sys['StID'];?>">
                                            <span class="da-summary-icon" style="background-color:<?php echo $bgcl; ?>;">
                                                <img src="<?php echo $pathString; ?>" alt="" />
                                            </span>
                                            <span class="da-summary-text">
                                                <span class="value"><?php echo $sys['num']."ผู้ใช้";?></span>
                                                <span class="label"><?php echo $sys['StNameT'];?></span>
                                            </span>
                                        </a>
                                    </li>
									<?php }?>
                                </ul>
                            </div>
                        </div>
						
					</div>
				</div>	
