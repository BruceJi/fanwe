<?php

 class CoinAction extends CommonAction{

 	public function index(){
     if (method_exists ( $this, '_filter' )) {
            $this->_filter ( $map );
       }
      // $name="ticket";
       $model = D ("coin_type");
       if (! empty ( $model )) {
          $this->_list ( $model, $map );
       }
        $this->display(); 		
 	}

    public function add(){
    	$this->display();
    }
   
    public function edit(){
      $id = intval($_REQUEST['id']);
      $coin_type = M("coin_type")->getById($id);
      $this->assign("coin_type",$coin_type);
      $this->assign("id",$id);
      $this->display();
    }

    public function insert(){
    	$id = intval($_REQUEST['id']);
    	
    	$coin_type["pay_name"] = $_REQUEST['pay_name'];
    	$coin_type["pay_desc"] = $_REQUEST['pay_desc'];
    	$coin_type["faccess_key"] = $_REQUEST['faccess_key'];
    	$coin_type["fsecrt_key"] = $_REQUEST['fsecrt_key'];
    	$coin_type["fip"] = $_REQUEST['fip'];
    	$coin_type["fport"] = $_REQUEST['fport'];
    	$coin_type["create_time"] = get_gmtime();
        
        if(!$id){
            M("coin_type")->add($coin_type);        	
        }else{
            $coin_type['id'] = $id;
            M("coin_type")->save($coin_type);	
        }
    	if (method_exists ( $this, '_filter' )) {
            $this->_filter ( $map );
         }
        $model = D ("coin_type");
        if (! empty ( $model )) {
          $this->_list ( $model, $map );
       }
        $this->display("index"); 	
    }


    public function dele(){
      $id = intval($_REQUEST['id']);

      M("coin_type")->where("id=".$id)->delete();
      if (method_exists ( $this, '_filter' )) {
            $this->_filter ( $map );
      }
       
      $model = D ("coin_type");
      if (! empty ( $model )) {
          $this->_list ( $model, $map );
      }
       $this->display("index");     
      }  
    
    public function change_status(){
      $id = intval($_REQUEST['id']);
      $status = M("coin_type")->where("id=".$id)->getField("status");
      M("coin_type")->where("id=".$id)->setField("status",($status+1)%2);
	  $model = D ("coin_type");
	  if (method_exists ( $this, '_filter' )) {
          $this->_filter ( $map );
       }
       
	  $model = D ("coin_type");
	  if (! empty ( $model )) {
	      $this->_list ( $model, $map );
	  }
	      $this->display("index");     
    }
 }

?>