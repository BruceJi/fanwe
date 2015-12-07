<?php

class SysBankAction extends CommonAction{
    public function index(){

       if (method_exists ( $this, '_filter' )) {
            $this->_filter ( $map );
       }
      // $name="ticket";
       $model = D ("sys_bank");
       if (! empty ( $model )) {
          $this->_list ( $model, $map );
       }
        $this->display();     
	}
    
    public function add(){
      $this->display();
    }
    
    public function insert(){
      $id = $_REQUEST['id'];
     
      $bank_name = $_REQUEST['bank_name'];
      $account = $_REQUEST['account'];
      $sys_name = $_REQUEST['sys_name'];
      

      $bank_sys['bank_name'] = $bank_name;
      $bank_sys['account'] = $account;
      $bank_sys['sys_name'] = $sys_name;
      
      if(!$id){
        $rs = M("sys_bank")->add($bank_sys);
        if (method_exists ( $this, '_filter' )) {
            $this->_filter ( $map );
        }  
         $model = D ("sys_bank");
         if (! empty ( $model )) {
          $this->_list ( $model, $map );
         }
         $this->display("index");   
      }else{
          $bank_sys['id']=$id;
          M("sys_bank")->save($bank_sys);
          if (method_exists ( $this, '_filter' )) {
            $this->_filter ( $map );
           }
     
          $model = D ("sys_bank");
          if (! empty ( $model )) {
             $this->_list ( $model, $map );
           }
          $this->display("index");
      }
    }

    public function edit(){
      $id = intval($_REQUEST['id']);
      $sys_bank = M("sys_bank")->getById($id);
      $this->assign("sys_bank",$sys_bank);
      $this->assign("id",$id);
      $this->display();
    }

    public function dele(){
      $id = intval($_REQUEST['id']);
      M("sys_bank")->where("id=".$id)->delete();
      if (method_exists ( $this, '_filter' )) {
            $this->_filter ( $map );
      }
       
      $model = D ("sys_bank");
      if (! empty ( $model )) {
          $this->_list ( $model, $map );
      }
     $this->display("index");     
    }

    public function foreverdel(){
          $ajax = intval($_REQUEST['ajax']);
          $id = $_REQUEST ['id'];
          if (isset ( $id )) {
              $condition = array ('id' => array ('in', explode ( ',', $id ) ) );
              $rel_data = M("sys_bank")->where($condition)->findAll();       
              foreach($rel_data as $data)
              {
                $info[] = $data['account']; 
              }
              if($info) $info = implode(",",$info);
              $ids = explode ( ',', $id );
              
              M("sys_bank")->where ( $condition )->delete();
              
              save_log($info.l("FOREVER_DELETE_SUCCESS"),1);
              $this->success (l("FOREVER_DELETE_SUCCESS"),$ajax);
            } else { 
              $this->error (l("INVALID_OPERATION"),$ajax);
          }
    }
}

?>