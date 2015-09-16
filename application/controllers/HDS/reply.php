<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(dirname(__FILE__)."/HDS_Controller.php");
class Reply extends HDS_Controller
{

	public function detail_sys($rq_id, $status=NULL)
	{
		include('reply_part/c_reply.php');
		$this->layout_output($data);
	}
	public function insert_reply()
	{
		include('reply_part/c_insert_reply.php');
	}
}