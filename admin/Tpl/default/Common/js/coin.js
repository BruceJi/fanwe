$("#pay_name").off("click").on("click",function(){
   var pay_name = $("#pay_name").val();
   alert(pay_name);
   /*if(pay_name==null||pay_name=""){
      alert("请输入币种名称");
   }*/
});