<?php

class AddTicketAction extends CommonAction{

   public function index(){
       $map['deal_id'] = 0; 

       if (method_exists ( $this, '_filter' )) {
            $this->_filter ( $map );
       }
       $name="ticket";
       $model = D ($name);
       if (! empty ( $model )) {
          $this->_list ( $model, $map );
       }
        $this->display();       
   }

   public function add(){
      $this->display();
   }

   public function insert_ticket(){
        if($_REQUEST['money']==''){
             $this->error("券的金额不能为空");
        }
        if($_REQUEST['amount']==''){
             $this->error("券的数量不能为空");
        }
        if($_REQUEST['use_time']==''){
             $this->error("券的有效天数不能为空");
        }
        $ticket_data['money'] = intval($_REQUEST['money']);
        $ticket_data['quantity'] =  intval($_REQUEST['amount']);
        $ticket_data['rest_quantity'] = intval($_REQUEST['amount']);
        $ticket_data['use_time'] = intval($_REQUEST['use_time']);
        $ticket_data['status'] = intval($_REQUEST['status']); 
	      $ticket_data['value'] = intval($_REQUEST['value']);
        $ticket_data['is_deposit'] = 1;
        //券的类型  0：赠金券 1代金券
        $ticket_data['ticket_type'] = intval($_REQUEST['type']);
        //券的使用类型  0:无条件  1:满减优惠
        $ticket_data['type'] = intval($_REQUEST['use_type']);
        
        //系统默认时间
        $ticket_data['create_time'] = get_gmtime();
	      $ticket_data['start_use']=to_timespan(trim($_REQUEST['start_time']));
        $ticket_data['deadline']=to_timespan(trim($_REQUEST['end_time']));
        
        $rs = M("Ticket")->add($ticket_data);

        if($rs){
             $this->success(L("INSERT_SUCCESS"));
        }else{
        	 $this->error(L("INSERT_FAILED"));
        }
   }
}
?>