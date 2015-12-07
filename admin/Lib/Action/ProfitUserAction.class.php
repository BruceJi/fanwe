<?php


class ProfitUserAction extends CommonAction{

  public function index(){
    
    $user_name = trim($_REQUEST['user_name']);
    if($user_name!=NULL&&$user_name!=''){  

      $id = $GLOBALS['db']->getOne("select id from ".DB_PREFIX."user where user_name ='".$user_name."'");
     // $id = M("User")->where('user_name=".$user_name."')->getField('id');
      //$this->error($id);
      $map['user_id'] = $id;
    }
    //列表查询条件
  /*  if($_REQUEST['status']=='NULL')){
		    unset($_REQUEST['status']);
	  }*/

    if($_REQUEST['status']!=NULL){
     	$map['status']=intval($_REQUEST['status']);
     }
    	
    if($_REQUEST['id']!=NULL){
        $map['deal_id'] = intval($_REQUEST['id']);
    }
    		
	  if (method_exists ( $this, '_filter' )) {
			$this->_filter ( $map );
		 }
	  //$name=$this->getActionName();	
	    $model = D ("profit_user");
	    if (! empty ( $model )) {
		    $this->_list ( $model, $map );
		   }
      $this->assign("id",intval($_REQUEST['id']));
      $this->display ();
   } 

    //批量发放收益
  public function batch_pay(){
        $ajax = intval($_REQUEST['ajax']);
        $id = $_REQUEST['id'];
       /*$this->error("---");*/
        if (isset ( $id )) {
        $condition = array ('id' => array ('in', explode ( ',', $id ) ) );
        $rel_data = M("Profit_user")->where($condition)->findAll();       
        /*foreach($rel_data as $data)
        {
          $info[] = $data['amount'];  
        }
        if($info) $info = implode(",",$info);*/
        $ids = explode ( ',', $id );
        foreach($ids as $uid)
        {         
              $deal_id = $GLOBALS['db']->getOne("select deal_id from ".DB_PREFIX."profit_user where id=".$uid);
              $user_id = $GLOBALS['db']->getOne("select user_id from ".DB_PREFIX."deal where deal_id =".$deal_id);
              $user_account = $GLOBALS['db']->getOne("select money from ".DB_PREFIX."user where id =".$user_id);
              $sum_amount = $GLOBALS['db']->getOne("select sum(amount) from ".DB_PREFIX."profit_user where deal_id=".$deal_id);
              if($user_account>$sum_amount){
                  $profit_user= $GLOBALS['db']->getRow("select * from ".DB_PREFIX."profit_user where id =".$uid);
                  $user_id = $profit_user['user_id'];
                  $deal_id = $profit_user['deal_id'];
                  $amount = $profit_user['amount'];

                  $user_money = $GLOBALS['db']->getOne("select money from ".DB_PREFIX."user where id =".$user_id);
                  $deal_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."deal where id =".$deal_id);        
                  $founder_id = $deal_info['user_id'];
                  $founder_money = $GLOBALS['db']->getOne("select money from ".DB_PREFIX."user where id =".$founder_id);
 
                  $founder_update_money = $founder_money - $amount;
                  $user_update_money = $user_money + $amount;
                  //更新数据库：   用户的账户  创建人的账户  profit_user的收益状态
                  M('User')->where("id =".$user_id)->setField("money",$user_update_money);
                  M('User')->where("id =".$founder_id)->setField("money",$founder_update_money);        
                  M('Profit_user')->where("id=".$id)->setField("status",1);
               }else{
                $this->error("发起人余额不足");
               }
                  
        }
        /*save_log($info.l("FOREVER_DELETE_SUCCESS"),1);*/
        $this->success ("发放收益成功",$ajax);
      } else {
        $this->error (l("INVALID_OPERATION"),$ajax);
      }
    }

    //支付账号收益
    public function pay_user_profit(){


         $id = intval($_REQUEST['id']);
         $user_profit_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."profit_user where id =".$id);
         $user_id = $user_profit_info["user_id"];
         $deal_id = $user_profit_info["deal_id"];
         $amount = $user_profit_info['amount'];

         $deal_end_time = $GLOBALS['db']->getOne("select end_time from ".DB_PREFIX."deal where id =".$deal_id);
         $deal_success = $GLOBALS['db']->getOne("select is_success from ".DB_PREFIX."deal where id =".$deal_id);
         $now = get_gmtime();
         
         if($deal_success==0){
            $this->error("该众筹活动还未成功");
         }

         if($now<$deal_end_time){
            $this->error("改众筹活动还未关闭");
         }

         if($user_profit_info['status']==1){
            $this->error("该用户的收益已经发放");
         }
       
         
         $deal_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."deal where id =".$deal_id);        
         
         $user = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where id =".$user_id);
         $profit_update_money = $user['money']+$amount;

         M('User')->where("id =".$user_id)->setField("money",$profit_update_money);
                
         M('Profit_user')->where("id=".$id)->setField("status",1);
             
          $this->success();            
            
    }
}
?>