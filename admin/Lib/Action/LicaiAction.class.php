<?php
// +----------------------------------------------------------------------
// | Fanwe 方维众筹商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://www.fanwe.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 云淡风轻(97139915@qq.com)
// +----------------------------------------------------------------------

require APP_ROOT_PATH.'app/Lib/shop_lip.php';

class LicaiAction extends CommonAction{
	public function index()
	{	
		require_once APP_ROOT_PATH.'system/libs/licai.php';
		
		$condition = " ";
		if(strim($_REQUEST["type"]) != "" && intval($_REQUEST["type"])!=-1)
		{
			$condition .= " and lc.type = ".intval($_REQUEST["type"]);
		}
		
		if(strim($_REQUEST["p_name"])!="")
		{
			$condition .= " and lc.name like '%".strim($_REQUEST["p_name"])."%'";
		}
		if(strim($_REQUEST["user_name"])!="")
		{
			$condition .= " and u.user_name like '%".strim($_REQUEST["user_name"])."%'";
		}
		
		$start_time = strim($_REQUEST['start_time']);
		$end_time = strim($_REQUEST['end_time']);

		$d = explode('-',$start_time);
		if (isset($_REQUEST['start_time']) && $start_time !="" && checkdate($d[1], $d[2], $d[0]) == false){
			$this->error("开始时间不是有效的时间格式:{$start_time}(yyyy-mm-dd)");
			exit;
		}
		
		$d = explode('-',$end_time);
		if ( isset($_REQUEST['end_time']) && strim($end_time) !="" &&  checkdate($d[1], $d[2], $d[0]) == false){
			$this->error("结束时间不是有效的时间格式:{$end_time}(yyyy-mm-dd)");
			exit;
		}
		
		if ($start_time!="" && strim($end_time) !="" && to_timespan($start_time) > to_timespan($end_time)){
			$this->error('开始时间不能大于结束时间:'.$start_time.'至'.$end_time);
			exit;
		}
		if(strim($start_time)!="")
		{
			$condition .= " and lc.begin_buy_date >= '".strim($start_time)."'";
			$this->assign("start_time",$start_time);
		}
		if(strim($end_time) !="")
		{
			$condition .= " and lc.begin_buy_date <= '".  strim($end_time)."'";
			$this->assign("end_time",$end_time);
		}
		
		//排序字段 默认为主键名
		if (isset ( $_REQUEST ['_order'] )) {
			if(strim($_REQUEST['_order']) != "id")
			{
				$order = strim($_REQUEST ['_order']);
				if($order == "show_time" || $order == "product_size" )
				{
					$order = "";
				}
			}
			else
			{
				$order = "lc.".strim($_REQUEST ['_order']);
			}			
		} else {
			$order = " lc.id ";
		}
		
		//排序方式默认按照倒序排列
		//接受 sost参数 0 表示倒序 非0都 表示正序
		if (isset($_REQUEST ['_sort'])){
			$sort = strim($_REQUEST ['_sort']) ? 'asc' : 'desc';
		} else {
			$sort = 'desc';
		}
		
		$sortImg = $sort; //排序图标
		$sortAlt = $sort == 'desc' ? l("ASC_SORT") : l("DESC_SORT"); //排序提示
		
		if($order == "")
		{
			$order_str = "";
		}
		else
		{
			$order_str = " order by ". str_replace("_format","",$order)." ".$sort;
		}
		
		$page = intval($_REQUEST['p']);
		if($page==0)
			$page = 1;
		
		$page_size = 20;
		
		$limit = (($page-1)*$page_size).",".$page_size;
		$result = array();
		$result['count'] = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."licai lc 
		left join ".DB_PREFIX."user u on u.id = lc.user_id 
		where 1=1 ".$condition);

	
		if($result['count'] > 0){
			
			$result['list'] = $GLOBALS['db']->getAll("SELECT lc.*,u.user_name 
			FROM ".DB_PREFIX."licai lc 
			left join ".DB_PREFIX."user u on u.id = lc.user_id 
			where 1=1 ".$condition.$order_str." limit ".$limit);
		}
		
		$sort = $sort == 'desc' ? 1 : 0; //排序方式
		
		$this->assign ( 'sort', $sort );
		$order = str_replace('lc.',"",$order);
		$this->assign ( 'order', $order );
		$this->assign ( 'sortImg', $sortImg );
		$this->assign ( 'sortType', $sortAlt );
		
		foreach($result["list"] as $k => $v)
		{
			//收益率
			$result["list"][$k]["average_income_rate_format"] = $v["average_income_rate"]."%";
			//产品期限
			if($v["end_date"] == "" || $v["end_date"] == "0000-00-00")
			{
				$v["end_date"] = "无期限";
			}
			$result["list"][$k]["show_time"] = $v["begin_buy_date"]."至".$v["end_date"];
			
			$result["list"][$k]["is_recommend_format"] = $v["is_recommend"] == 0 ?"否" :"是";
			//参与人数
			//$result["list"][$k]["member_count"] =intval($v["total_people"]);
			
			$result["list"][$k]["status_format"] = $v["status"] == 0 ?"无效":"有效";	
			
			
			switch($v["type"])
			{
				case 0: $result["list"][$k]["type_format"] = "余额宝";
					break;
				case 1: $result["list"][$k]["type_format"] = "固定定存";
					break;
				//case 2: $result["list"][$k]["type_format"] = "浮动定存";
				//	break;
				//case 3: $result["list"][$k]["type_format"] = "票据";
				//	break;
				//case 4: $result["list"][$k]["type_format"] = "基金";
				//	break;
			}
			
			//成交总额
			$result["list"][$k]["subscribing_amount_format"] = format_money_wan($v["subscribing_amount"]);
			
		}
		$this->assign("list",$result['list']);
		$this->assign("main_title","理财列表");
		$page = new Page($result['count'],$page_size);   //初始化分页对象 		
		$p  =  $page->show();
		$this->assign('page',$p);
		
		$this->display ();
	}
	public function edit()
	{
		$id = intval($_REQUEST ['id']);
		$vo = $GLOBALS['db']->getRow("SELECT * FROM ".DB_PREFIX."licai where  id = ".$id);
		 
		$vo["min_money"] = $vo["min_money"] / 10000;
		
		$vo["max_money"] = $vo["max_money"] / 10000;
		
		$this->assign ( 'vo', $vo );
		
		$bank = $GLOBALS['db']->getAll("SELECT * from ".DB_PREFIX."licai_bank where status = 1 ");
		$this->assign("bank",$bank);
		
		$fund_brand = $GLOBALS['db']->getAll("SELECT * from ".DB_PREFIX."licai_fund_brand where status = 1 ");
		$this->assign("fund_brand",$fund_brand);
		
		$fund_type = $GLOBALS['db']->getAll("SELECT * from ".DB_PREFIX."licai_fund_type where status = 1 ");
		$this->assign("fund_type",$fund_type);
		
		$this->display ();
	}
	public function update()
	{
		B('FilterString');
 		$data = M("Licai")->create();
		if($_REQUEST['investment_adviser']){
			$data['investment_adviser'] = $_REQUEST['investment_adviser'];
		}
		 
		$this->assign("jumpUrl",u(MODULE_NAME."/edit",array("id"=>$data['id'])));
		
		$log_info = M("Licai")->where("id=".intval($data['id']))->getField("name");
		
		//开始验证有效性
		
		if(!check_empty($data['name']))
		{
			$this->error("请输入名称");
		}	
		if(!check_empty($data['time_limit']) && (!check_empty($data['end_date'])|| $data['end_date'] == '0000-00-00'))
		{
			$this->error("项目结束时间和理财期限至少填写一个");
		}
		/*if(!check_empty($data['licai_sn']))
		{
			$this->error("请输入项目编号");
		}*/
		$data["min_money"] = $data["min_money"] * 10000;
		
		$data["max_money"] = $data["max_money"] * 10000;

		$data['begin_buy_date'] = trim($data['begin_buy_date']);
		$data['end_buy_date'] = trim($data['end_buy_date']);
		$data['end_date'] = trim($data['end_date']);
		
		$data['user_name'] = M("User")->where("id=".intval($data['user_id']))->getField("user_name");
		if(!$data['user_name'] )$data['user_id'] ="";
		
		//unset($data["type"]);
		 
		$list=M("Licai")->save ($data);
		
		if (false !== $list) {
			
			save_log($log_info.L("UPDATE_SUCCESS"),1);
			$this->success(L("UPDATE_SUCCESS"));
		} else {
			//错误提示
			save_log($log_info.L("UPDATE_FAILED"),0);
			$this->error(L("UPDATE_FAILED"),0,$log_info.L("UPDATE_FAILED"));
		}
	}
	public function foreverdelete() {
		//彻底删除指定记录
		$ajax = intval($_REQUEST['ajax']);
		$id = $_REQUEST ['id'];
		if (isset ( $id )) {
				$condition = array ('id' => array ('in', explode ( ',', $id ) ) );
				$rel_data = M("licai")->where($condition)->findAll();				
				foreach($rel_data as $data)
				{
					$info[] = $data['title'];	
				}
				if($info) $info = implode(",",$info);
				$list = M("licai")->where ( $condition )->delete();	
				//删除相关预览图
//				foreach($rel_data as $data)
//				{
//					@unlink(get_real_path().$data['preview']);
//				}
				if ($list!==false) {
					save_log($info.l("FOREVER_DELETE_SUCCESS"),1);
					clear_auto_cache("get_help_cache");
					$this->success (l("FOREVER_DELETE_SUCCESS"),$ajax);
				} else {
					save_log($info.l("FOREVER_DELETE_FAILED"),0);
					$this->error (l("FOREVER_DELETE_FAILED"),$ajax);
				}
			} else {
				$this->error (l("INVALID_OPERATION"),$ajax);
		}
	}
	public function export_csv($page = 1)
	{
		require_once APP_ROOT_PATH.'system/libs/licai.php';
		
		$pagesize = 10;
		set_time_limit(0);
		$limit = (($page - 1)*intval($pagesize)).",".(intval($pagesize));
	//	$limit=((0).",".(10));
		//echo $limit;exit;
		$condition = " ";
		if(strim($_REQUEST["type"]) != "" && intval($_REQUEST["type"])!=-1)
		{
			$condition .= " and lc.type = ".intval($_REQUEST["type"]);
		}
		if(strim($_REQUEST["p_name"])!="")
		{
			$condition .= " and lc.name like '%".strim($_REQUEST["p_name"])."%'";
		}
		if(strim($_REQUEST["user_name"])!="")
		{
			$condition .= " and u.user_name like '%".strim($_REQUEST["user_name"])."%'";
		}
		$start_time = strim($_REQUEST['start_time']);
		$end_time = strim($_REQUEST['end_time']);

		$d = explode('-',$start_time);
		if (isset($_REQUEST['start_time']) && $start_time !="" && checkdate($d[1], $d[2], $d[0]) == false){
			$this->error("开始时间不是有效的时间格式:{$start_time}(yyyy-mm-dd)");
			exit;
		}
		
		$d = explode('-',$end_time);
		if ( isset($_REQUEST['end_time']) && strim($end_time) !="" &&  checkdate($d[1], $d[2], $d[0]) == false){
			$this->error("结束时间不是有效的时间格式:{$end_time}(yyyy-mm-dd)");
			exit;
		}
		
		if ($start_time!="" && strim($end_time) !="" && to_timespan($start_time) > to_timespan($end_time)){
			$this->error('开始时间不能大于结束时间:'.$start_time.'至'.$end_time);
			exit;
		}
		if(strim($start_time)!="")
		{
			$condition .= " and lc.begin_buy_date >= '".strim($start_time)."'";
			$this->assign("start_time",$start_time);
		}
		if(strim($end_time) !="")
		{
			$condition .= " and lc.begin_buy_date <= '".  strim($end_time)."'";
			$this->assign("end_time",$end_time);
		}

		$list = $GLOBALS['db']->getAll("SELECT lc.*,u.user_name 
		FROM ".DB_PREFIX."licai lc 
		left join ".DB_PREFIX."user u on u.id = lc.user_id 
		where 1=1 ".$condition." limit ".$limit);
		
		foreach($list as $k => $v)
		{
			//收益率
			$list[$k]["average_income_rate_format"] = $v["average_income_rate"]."%";
			//产品期限
			if($v["end_date"] == "" || $v["end_date"] == "0000-00-00")
			{
				$v["end_date"] = "无期限";
			}
			$list[$k]["show_time"] = $v["begin_buy_date"]."至".$v["end_date"];
			
			$list[$k]["is_recommend_format"] = $v["is_recommend"] == 0 ?"否" :"是";
			//参与人数
			$list[$k]["member_count"] =intval($v["total_people"]);
			
			$list[$k]["status_format"] = $v["status"] == 0 ?"无效":"有效";	
			
			
			switch($v["type"])
			{
				//case 0: $result["list"][$k]["type_format"] = "余额宝";
				//	break;
				case 1: $list[$k]["type_format"] = "固定定存";
					break;
				case 2: $list[$k]["type_format"] = "浮动定存";
				//	break;
				//case 3: $result["list"][$k]["type_format"] = "票据";
				//	break;
				//case 4: $result["list"][$k]["type_format"] = "基金";
				//	break;
			}
			
			$list[$k]["subscribing_amount_format"] = format_money_wan($v["subscribing_amount"]);
		}
		
		if($list)
		{
			register_shutdown_function(array(&$this, 'export_csv'), $page+1);
			
			$order_value = array( 'id'=>'""', 'name'=>'""', 'licai_sn'=>'""','user_name'=>'""','product_size'=>'""','type_format'=>'""','average_income_rate_format'=>'""','show_time'=>'""','member_count'=>'""','subscribing_amount_format'=>'""');
	    	if($page == 1)
	    	{
		    	$content = iconv("utf-8","gbk","编号,产品名称,理财代码,发起人,产品规模,类型,收益率,产品期限,参与人数,成交总额");	    		    	
		    	$content = $content . "\n";
	    	}
	    	
			foreach($list as $k=>$v)
			{
				$order_value['id'] = '"' . iconv('utf-8','gbk',$v['id']) . '"';
				$order_value['name'] = '"' . iconv('utf-8','gbk',$v['name']) . '"';
				$order_value['licai_sn'] = '"' . iconv('utf-8','gbk',$v['licai_sn']) . '"';
				$order_value['user_name'] = '"' . iconv('utf-8','gbk',$v['user_name']) . '"';
				$order_value['product_size'] = '"' . iconv('utf-8','gbk',$v['product_size']) . '"';
				$order_value['average_income_rate_format'] = '"' . iconv('utf-8','gbk',$v['average_income_rate_format']).'"';
				$order_value['type_format'] = '"' . iconv('utf-8','gbk',$v['type_format']). '"' ;
				$order_value['show_time'] = '"' . iconv('utf-8','gbk',$v['show_time']). '"' ;
				$order_value['member_count'] = '"' . iconv('utf-8','gbk',$v['member_count']). '"' ;
				$order_value['subscribing_amount_format'] = '"' . iconv('utf-8','gbk',$v['subscribing_amount_format']). '"' ;
				$content .= implode(",", $order_value) . "\n";
			}	
			
			//
			header("Content-Disposition: attachment; filename=order_list.csv");
	    	echo $content ;
		}
		else
		{
			if($page==1)
			$this->error(L("NO_RESULT"));
		}	
	}
	public function add()
	{
		
		$bank = $GLOBALS['db']->getAll("SELECT * from ".DB_PREFIX."licai_bank where status = 1 ");
		$this->assign("bank",$bank);
		
		$fund_brand = $GLOBALS['db']->getAll("SELECT * from ".DB_PREFIX."licai_fund_brand where status = 1 ");
		$this->assign("fund_brand",$fund_brand);
		
		$fund_type = $GLOBALS['db']->getAll("SELECT * from ".DB_PREFIX."licai_fund_type where status = 1 ");
		$this->assign("fund_type",$fund_type);
		
		$sort = D(MODULE_NAME)->where()->max("id") + 1;
		
		$this->assign("sort",$sort);
		
		$this->display ();
	}
	public function insert()
	{
		B('FilterString');
		$data = M("licai")->create();
		$this->assign("jumpUrl",u(MODULE_NAME."/add"));
		
		$log_info = $data["name"];
		
		$data["min_money"] = $data["min_money"] * 10000;
		
		$data["max_money"] = $data["max_money"] * 10000;
		
		//开始验证有效性
		if(!check_empty($data['name']))
		{
			$this->error("请输入名称");
		}	
		if(!check_empty($data['time_limit']) && (!check_empty($data['end_date'])|| $data['end_date'] == '0000-00-00'))
		{
			$this->error("项目结束时间和理财期限至少填写一个");
		}
		/*if(!check_empty($data['licai_sn']))
		{
			$this->error("请输入项目编号");
		}*/
		
		if(strim($data['licai_sn']) != "" && D("Deal")->where("deal_sn='".$data['licai_sn']."'")->count() > 0){
			$this->error("理财代码已存在");
		}
		if(strim($data["licai_sn"]) == "")
		{
			$data["licai_sn"] = "LC".to_date(TIME_UTC,"Y")."".str_pad(D(MODULE_NAME)->where()->max("id") + 1,7,0,STR_PAD_LEFT);
		}
		$data['begin_buy_date'] = trim($data['begin_buy_date']);
		$data['end_buy_date'] = trim($data['end_buy_date']);
		$data['end_date'] = trim($data['end_date']);
		
		$data['user_name'] = M("User")->where("id=".intval($data['user_id']))->getField("user_name");
		if(!$data['user_name'] )
			$data['user_id'] ="";

		//$data["type"] = 0;
		
		$list=M("licai")->add ($data);
		
		if (false !== $list) {
			
			save_log($log_info.L("INSERT_SUCCESS"),1);
			$this->success(L("INSERT_SUCCESS"));
		} else {
			//错误提示
			save_log($log_info.L("INSERT_FAILED"),0);
			$this->error(L("INSERT_FAILED"),0,$log_info.L("INSERT_FAILED"));
		}
	}
}
?>