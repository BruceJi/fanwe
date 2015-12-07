/*验证邮箱*/
function emailFormatCheck(email){
    if ((email.length > 128) || (email.length < 6)) {
    	return false;
    }
    var format = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
    if (!email.match(format)) {
    	return false;
    }
    return true;
}
/*验证手机号*/
function mobilephoneFormatCheck(mobilephone){
    var format = /^0?1\d{10}$/;
    if (!mobilephone.match(format)) {
        
    	return false;
    }
    return true;
}
/*判断输入的是否为空*/
    function isEmpty(val) {
       val = $.trim(val);
       if (val == null)
          return true;
       if (val == undefined || val == 'undefined')
        return true;
       if (val == "")
         return true;
       if (val.length == 0)
          return true;
       if (!/[^(^\s*)|(\s*$)]/.test(val))
        return true;
    return false;
}
/*验证数字*/
function numCheck(num){
    var format=/^[0-9]+.?[0-9]*$/;
    if(!num.match(format)){
        return false;
    }
    return true;
}
/*居中盒子*/
function getWidth(){
    return window.innerWidth||document.body.clientWidth||document.documentElement.clientWidth;
}
function getHeight(){
    return window.innerHeight||document.body.clientHeight||document.documentElement.clientHeight;
}
function centerdialog(id){
    var $id=$(id);
    var height=getHeight();
    var width=getWidth();
    var top=(height-$id.height())/2;
    var left=(width-$id.width())/2;
    $id.css({"position":"fixed","top":top,"left":left});
}

/*验证银行卡号*/
function bankCheck(num){
    var format1=/^[0-9]+.?[0-9]*$/;
    var format2=/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
    if(!num.match(format1)){
        if(!num.match(format2)){
            return false;
        }else{
            return true;
        }
    }
    return true;
}
