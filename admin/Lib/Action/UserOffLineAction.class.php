<?php

class UserOffLineAction extends CommonAction{
    public function index(){
       
       if($_REQUEST['status']=="NULL"){
		    unset($_REQUEST['status']);
	     }

       if($_REQUEST['status']!=NULL){
       	   $map['status'] = intval($_REQUEST['status']);
       }else{
           $map['status'] = 2;
       }
       
       //订单ID
       if($_REQUEST['id']!=NULL){
           $map['id'] = intval($_REQUEST['id']);
       }


       if (method_exists ( $this, '_filter' )) {
            $this->_filter ( $map );
       }
       $model = D ("offpay");
       if (! empty ( $model )) {
          $this->_list ( $model, $map );
       }
        $this->display();     
	}

  public function check_status(){
       $id = $_REQUEST['id'];
       
       $off_order = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."offpay where id =".$id);
       $confirm_status = $off_order['status'];
       if($confirm_status==2){
          $user_id = $off_order["user_id"];

          $user_money = $GLOBALS['db']->getOne("select money from ".DB_PREFIX."user where id=".$user_id);
          $update_money = $user_money+$off_order['amount'];

          $now = get_gmTime();
          M("offpay")->where("id=".$id)->setField("status",3);
          M("offpay")->where("id=".$id)->setField("last_update",$now);
          M("user")->where("id=".$user_id)->setField("money",$update_money);

          $user_log['log_time'] = $now;
          $user_log['log_info'] = "到账".$off_order['amount'];
          $user_log['money'] = $off_order['amount'];
          $user_log['user_id'] = $user_id;
          M("user_log")->add($user_log);

          $this->success();
       }elseif ($confirm_status==1) {
       	  $this->error("该订单未支付成功");
       }elseif ($confirm_status==3) {
       	    $this->error("该订单通过审核");
       }else{
       	    $this->error("操作有误，请确认");
       }

       
  }

  public function cancel_order(){
       $id = $_REQUEST['id'];
       $now = get_gmTime();
       
       $confirm_status = $GLOBALS['db']->getOne("select status from ".DB_PREFIX."offpay where id =".$id);
       if($confirm_status!=1){
            $this->error("该订单已经完成支付");
       }
       M("offpay")->where("id=".$id)->setField("status",4);
       M("offpay")->where("id=".$id)->setField("last_update",$now);
       $this->success();
  }

}
?>