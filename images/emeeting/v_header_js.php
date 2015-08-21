<?php echo link_tag('css/emt_css/emt_css.css');?>
<?php echo link_tag('css/emt_css/validate.css');?>
<?php echo link_tag('css/emt_css/message/message.css');?>
<?php echo link_tag('css/emt_css/autocomplate.css');?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url();?>images/eresearcher/ic1.ico" rel="shortcut icon" type="image/x-icon" />



<!------------------------------------------ Script New ----------------------------------------------->



<!-- CSS Reset -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>css/reset.css" media="screen" />
<!--  Fluid Grid System -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>css/fluid.css" media="screen" />
<!-- Theme Stylesheet 
<link rel="stylesheet" type="text/css" href="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>css/dandelion.theme.css" media="screen" />-->
<!--  Main Stylesheet -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>css/dandelion.css" media="screen" />
<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>css/demo.css" media="screen" />

<!-- jQuery JavaScript File -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/jquery-1.7.2.min.js"></script>

<!-- jQuery-UI JavaScript Files -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/jquery-ui-1.8.20.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/jquery.ui.timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/jquery.ui.touch-punch.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/css/jquery.ui.all.css" media="screen" />

<!-- Plugin Files -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/source/jquery.ui.core.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/source/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/i18n/jquery.ui.datepicker-th.js"></script>-->

<!-- FileInput Plugin -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/jquery.fileinput.js"></script>
<!-- Placeholder Plugin -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/jquery.placeholder.js"></script>
<!-- Mousewheel Plugin -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/jquery.mousewheel.min.js"></script>
<!-- Scrollbar Plugin -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/jquery.tinyscrollbar.min.js"></script>
<!-- Tooltips Plugin  
<script type="text/javascript" src="<?php// echo base_url().$this->config->item("emt_dandelion_folder");?>plugins/tipsy/jquery.tipsy-min.js"></script>
<link rel="stylesheet" href="<?php//  echo base_url().$this->config->item("emt_dandelion_folder");?>plugins/tipsy/tipsy.css" />-->

<!-- Validation Plugin 
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>plugins/validate/jquery.validate.js"></script>-->

<!-- DataTables Plugin -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>plugins/datatables/jquery.dataTables.js"></script>

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/demo/demo.validation.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/demo/demo.tables.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/demo/demo.form.js"></script>

<!-- Core JavaScript Files -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/core/dandelion.core.js"></script>

<!-- Customizer JavaScript File (remove if not needed) -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/core/dandelion.customizer.js"></script>



<!-------------------------------------------- Script Old ------------------------------------------------------>



<script type="text/javascript" src="<?php echo base_url();?>js/emt_js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/emt_js/emt_js.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/emt_js/validate.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/emt_js/message.js"></script>
<script type="text/javascript">
	var site_url = "<?php echo site_url().$this->config->item('emt_folder'); ?>";
	var ajax_url = site_url + "emeetingAjax/";
</script>
<script type="text/javascript" src="<?php echo base_url();?>js/emt_js/autocomplate.js"></script>