<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="__TMPL__Common/style/style.css" />
<script type="text/javascript" src="__TMPL__Common/js/check_dog.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/IA300ClientJavascript.js"></script>
<script type="text/javascript">
 	var VAR_MODULE = "<?php echo conf("VAR_MODULE");?>";
	var VAR_ACTION = "<?php echo conf("VAR_ACTION");?>";
	var MODULE_NAME	=	'<?php echo MODULE_NAME; ?>';
	var ACTION_NAME	=	'<?php echo ACTION_NAME; ?>';
	var ROOT = '__APP__';
	var ROOT_PATH = '<?php echo APP_ROOT; ?>';
	var CURRENT_URL = '<?php echo trim($_SERVER['REQUEST_URI']);?>';
	var INPUT_KEY_PLEASE = "<?php echo L("INPUT_KEY_PLEASE");?>";
	var TMPL = '__TMPL__';
	var APP_ROOT = '<?php echo APP_ROOT; ?>';
	var LOGINOUT_URL = '<?php echo u("Public/do_loginout");?>';
	var WEB_SESSION_ID = '<?php echo es_session::id(); ?>';
	var EMOT_URL = '<?php echo APP_ROOT; ?>/public/emoticons/';
	var MAX_FILE_SIZE = "<?php echo (app_conf("MAX_IMAGE_SIZE")/1000000)."MB"; ?>";
	var FILE_UPLOAD_URL ='<?php echo u("File/do_upload");?>' ;
	CHECK_DOG_HASH = '<?php $adm_session = es_session::get(md5(conf("AUTH_KEY"))); echo $adm_session["adm_dog_key"]; ?>';
	function check_dog_sender_fun()
	{
		window.clearInterval(check_dog_sender);
		check_dog2();
	}
	var check_dog_sender = window.setInterval("check_dog_sender_fun()",5000);
	
</script>
<script type="text/javascript" src="__TMPL__Common/js/jquery.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/jquery.timer.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/script.js"></script>
<script type="text/javascript" src="__ROOT__/public/runtime/admin/lang.js"></script>
<script type='text/javascript'  src='__ROOT__/admin/public/kindeditor/kindeditor.js'></script>
<script type='text/javascript'  src='__ROOT__/admin/public/kindeditor/lang/zh_CN.js'></script>
</head>
<body onLoad="javascript:DogPageLoad();">
<div id="info"></div>

<script type="text/javascript" src="__ROOT__/public/region.js"></script>	
<script type="text/javascript" src="__TMPL__Common/js/deal_edit.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/calendar/calendar.php?lang=zh-cn" ></script>
<link rel="stylesheet" type="text/css" href="__TMPL__Common/js/calendar/calendar.css" />
<script type="text/javascript" src="__TMPL__Common/js/calendar/calendar.js"></script>
<div class="main">
<div class="main_title"><?php echo L("EDIT");?> <a href="<?php if($vo['is_effect'] == 1): ?><?php echo u("Deal/online_index");?><?php else: ?><?php echo u("Deal/submit_index");?><?php endif; ?>" class="back_list"><?php echo L("BACK_LIST");?></a></div>
<div class="blank5"></div>
<form name="edit" action="__APP__" method="post" enctype="multipart/form-data">
<table id="form1" class="form conf_tab" cellpadding=0 cellspacing=0 >
	<tr>
		<td colspan=2 class="topTd"></td>
	</tr>
	<tr>
		<td class="item_title">项目名称:</td>
		<td class="item_input"><input type="text" class="textbox require" value="<?php echo ($vo["name"]); ?>" name="name" /></td>
	</tr>
	<tr>
		<td class="item_title">项目等级:</td>
		<td class="item_input">
			<select name="user_level">
				<option value="0">请选择等级</option>
				<?php if(is_array($user_level)): foreach($user_level as $key=>$level): ?><option value="<?php echo ($level["id"]); ?>" <?php if($vo['user_level'] == $level['id']): ?>selected="selected"<?php endif; ?>><?php echo ($level["name"]); ?></option><?php endforeach; endif; ?>
			</select>
		</td>
	</tr>
	<tr>
		<td class="item_title">发起人ID:</td>
		<td class="item_input"><input type="text" class="textbox require" name="user_id" value="<?php echo ($vo["user_id"]); ?>" style="width:30px;" /> <span class='tip_span'>要填写发起人ID</span></td>
	</tr>
	<tr>
		<td class="item_title">项目图片:</td>
		<td class="item_input">
			<span>
        <div style='float:left; height:35px; padding-top:1px;'>
            <input type='hidden' value='<?php echo ($vo["image"]); ?>' name='image' id='keimg_h_image' />
            <div class='buttonActive' style='margin-right:5px;'>
                <div class='buttonContent'>
                    <button type='button' class='keimg ke-icon-upload_image' rel='image'>选择图片</button>
                </div>
            </div>
        </div>
         <a href='<?php if($vo["image"] == ''): ?>./admin/Tpl/default/Common/images/no_pic.gif<?php else: ?><?php echo ($vo["image"]); ?><?php endif; ?>' target='_blank' id='keimg_a_image' ><img src='<?php if($vo["image"] == ''): ?>./admin/Tpl/default/Common/images/no_pic.gif<?php else: ?><?php echo ($vo["image"]); ?><?php endif; ?>' id='keimg_m_image' width=35 height=35 style='float:left; border:#ccc solid 1px; margin-left:5px;' /></a>
         <div style='float:left; height:35px; padding-top:1px;'>
             <div class='buttonActive'>
                <div class='buttonContent'>
                    <img src='/zcfunding/admin/Tpl/default/Common/images/del.gif' style='<?php if($vo["image"] == ''): ?>display:none<?php endif; ?>; margin-left:10px; float:left; border:#ccc solid 1px; width:35px; height:35px; cursor:pointer;' class='keimg_d' rel='image' title='删除'>
                </div>
            </div>
        </div>
        </span>
			<span class='tip_span'>推荐760*530图片</span>
		</td>
	</tr>
	<tr style="display:none;">
		<td class="item_title">最新上线项目图片:</td>
		<td class="item_input">
			<span>
        <div style='float:left; height:35px; padding-top:1px;'>
            <input type='hidden' value='<?php echo ($vo["adv_image"]); ?>' name='adv_image' id='keimg_h_adv_image' />
            <div class='buttonActive' style='margin-right:5px;'>
                <div class='buttonContent'>
                    <button type='button' class='keimg ke-icon-upload_image' rel='adv_image'>选择图片</button>
                </div>
            </div>
        </div>
         <a href='<?php if($vo["adv_image"] == ''): ?>./admin/Tpl/default/Common/images/no_pic.gif<?php else: ?><?php echo ($vo["adv_image"]); ?><?php endif; ?>' target='_blank' id='keimg_a_adv_image' ><img src='<?php if($vo["adv_image"] == ''): ?>./admin/Tpl/default/Common/images/no_pic.gif<?php else: ?><?php echo ($vo["adv_image"]); ?><?php endif; ?>' id='keimg_m_adv_image' width=35 height=35 style='float:left; border:#ccc solid 1px; margin-left:5px;' /></a>
         <div style='float:left; height:35px; padding-top:1px;'>
             <div class='buttonActive'>
                <div class='buttonContent'>
                    <img src='/zcfunding/admin/Tpl/default/Common/images/del.gif' style='<?php if($vo["adv_image"] == ''): ?>display:none<?php endif; ?>; margin-left:10px; float:left; border:#ccc solid 1px; width:35px; height:35px; cursor:pointer;' class='keimg_d' rel='adv_image' title='删除'>
                </div>
            </div>
        </div>
        </span>
			<span class='tip_span'>推荐765*317图片</span>
		</td>
	</tr>
	<tr>
		<td class="item_title">详情页海报图:</td>
		<td class="item_input">
			<span>
        <div style='float:left; height:35px; padding-top:1px;'>
            <input type='hidden' value='<?php echo ($vo["deal_background_image"]); ?>' name='deal_background_image' id='keimg_h_deal_background_image' />
            <div class='buttonActive' style='margin-right:5px;'>
                <div class='buttonContent'>
                    <button type='button' class='keimg ke-icon-upload_image' rel='deal_background_image'>选择图片</button>
                </div>
            </div>
        </div>
         <a href='<?php if($vo["deal_background_image"] == ''): ?>./admin/Tpl/default/Common/images/no_pic.gif<?php else: ?><?php echo ($vo["deal_background_image"]); ?><?php endif; ?>' target='_blank' id='keimg_a_deal_background_image' ><img src='<?php if($vo["deal_background_image"] == ''): ?>./admin/Tpl/default/Common/images/no_pic.gif<?php else: ?><?php echo ($vo["deal_background_image"]); ?><?php endif; ?>' id='keimg_m_deal_background_image' width=35 height=35 style='float:left; border:#ccc solid 1px; margin-left:5px;' /></a>
         <div style='float:left; height:35px; padding-top:1px;'>
             <div class='buttonActive'>
                <div class='buttonContent'>
                    <img src='/zcfunding/admin/Tpl/default/Common/images/del.gif' style='<?php if($vo["deal_background_image"] == ''): ?>display:none<?php endif; ?>; margin-left:10px; float:left; border:#ccc solid 1px; width:35px; height:35px; cursor:pointer;' class='keimg_d' rel='deal_background_image' title='删除'>
                </div>
            </div>
        </div>
        </span>
			<span class='tip_span'>推荐宽1920像素图片</span>
		</td>
	</tr>
	<tr>
		<td class="item_title">详情页背景图:</td>
		<td class="item_input">
			<span>
        <div style='float:left; height:35px; padding-top:1px;'>
            <input type='hidden' value='<?php echo ($vo["deal_backgroundColor_image"]); ?>' name='deal_backgroundColor_image' id='keimg_h_deal_backgroundColor_image' />
            <div class='buttonActive' style='margin-right:5px;'>
                <div class='buttonContent'>
                    <button type='button' class='keimg ke-icon-upload_image' rel='deal_backgroundColor_image'>选择图片</button>
                </div>
            </div>
        </div>
         <a href='<?php if($vo["deal_backgroundColor_image"] == ''): ?>./admin/Tpl/default/Common/images/no_pic.gif<?php else: ?><?php echo ($vo["deal_backgroundColor_image"]); ?><?php endif; ?>' target='_blank' id='keimg_a_deal_backgroundColor_image' ><img src='<?php if($vo["deal_backgroundColor_image"] == ''): ?>./admin/Tpl/default/Common/images/no_pic.gif<?php else: ?><?php echo ($vo["deal_backgroundColor_image"]); ?><?php endif; ?>' id='keimg_m_deal_backgroundColor_image' width=35 height=35 style='float:left; border:#ccc solid 1px; margin-left:5px;' /></a>
         <div style='float:left; height:35px; padding-top:1px;'>
             <div class='buttonActive'>
                <div class='buttonContent'>
                    <img src='/zcfunding/admin/Tpl/default/Common/images/del.gif' style='<?php if($vo["deal_backgroundColor_image"] == ''): ?>display:none<?php endif; ?>; margin-left:10px; float:left; border:#ccc solid 1px; width:35px; height:35px; cursor:pointer;' class='keimg_d' rel='deal_backgroundColor_image' title='删除'>
                </div>
            </div>
        </div>
        </span>
			<span class='tip_span'>推荐单原色图片</span>
		</td>
	</tr>
	<tr>
		<td class="item_title">视频地址:</td>
		<td class="item_input"><input type="text" class="textbox" name="vedio" value="<?php echo ($vo["vedio"]); ?>" /></td>
	</tr>
	<tr>
		<td class="item_title">参考上线天数:</td>
		<td class="item_input"><input type="text" class="textbox" name="deal_days" value="<?php echo ($vo["deal_days"]); ?>" /></td>
	</tr>
	<tr>
		<td class="item_title">项目开始时间:</td>
		<td class="item_input">
			<input type="text" class="textbox require" name="begin_time" id="begin_time" value="<?php echo ($vo["begin_time"]); ?>" onfocus="this.blur(); return showCalendar('begin_time', '%Y-%m-%d %H:%M:%S', false, false, 'btn_begin_time');" />
			<input type="button" class="button" id="btn_begin_time" value="<?php echo L("SELECT_TIME");?>" onclick="return showCalendar('begin_time', '%Y-%m-%d %H:%M:%S', false, false, 'btn_begin_time');" />	
			<input type="button" class="button" value="<?php echo L("CLEAR_TIME");?>" onclick="$('#begin_time').val('');" />	

		</td>
	</tr>
	<tr>
		<td class="item_title">项目结束时间:</td>
		<td class="item_input">
			<input type="text" class="textbox require" name="end_time" id="end_time" value="<?php echo ($vo["end_time"]); ?>" onfocus="this.blur(); return showCalendar('end_time', '%Y-%m-%d %H:%M:%S', false, false, 'btn_end_time');" />
			<input type="button" class="button" id="btn_end_time" value="<?php echo L("SELECT_TIME");?>" onclick="return showCalendar('end_time', '%Y-%m-%d %H:%M:%S', false, false, 'btn_end_time');" />	
			<input type="button" class="button" value="<?php echo L("CLEAR_TIME");?>" onclick="$('#end_time').val('');" />
		</td>
	</tr>
	<tr>
		<td class="item_title">交易开始时间:</td>
		<td class="item_input">
			<input type="text" class="textbox require" name="trade_begin_time" id="trade_begin_time" value="<?php echo ($vo["trade_begin_time"]); ?>" onfocus="this.blur(); return showCalendar('trade_begin_time', '%Y-%m-%d %H:%M:%S', false, false, 'btn_trade_begin_time');" />
			<input type="button" class="button" id="btn_trade_begin_time" value="<?php echo L("SELECT_TIME");?>" onclick="return showCalendar('trade_begin_time', '%Y-%m-%d %H:%M:%S', false, false, 'btn_trade_begin_time');" />	
			<input type="button" class="button" value="<?php echo L("CLEAR_TIME");?>" onclick="$('#trade_begin_time').val('');" />	 
		</td>
	</tr>
	<tr>
		<td class="item_title">交易结束时间:</td>
		<td class="item_input">
			<input type="text" class="textbox require" name="trade_end_time" id="trade_end_time" value="<?php echo ($vo["trade_end_time"]); ?>" onfocus="this.blur(); return showCalendar('trade_end_time', '%Y-%m-%d %H:%M:%S', false, false, 'btn_trade_end_time');" />
			<input type="button" class="button" id="btn_trade_end_time" value="<?php echo L("SELECT_TIME");?>" onclick="return showCalendar('trade_end_time', '%Y-%m-%d %H:%M:%S', false, false, 'btn_trade_end_time');" />	
			<input type="button" class="button" value="<?php echo L("CLEAR_TIME");?>" onclick="$('#trade_end_time').val('');" />

		</td>
	</tr>	
	<tr>
		<td class="item_title">上架:</td>
		<td class="item_input">
			<lable><?php echo L("IS_EFFECT_1");?><input type="radio" name="is_effect" value="1" <?php if($vo['is_effect'] == 1): ?>checked="checked"<?php endif; ?> /></lable>
			<lable><?php echo L("IS_EFFECT_0");?><input type="radio" name="is_effect" value="0" <?php if($vo['is_effect'] == 0): ?>checked="checked"<?php endif; ?> /></lable>
			<lable><?php echo L("IS_EFFECT_2");?><input type="radio" name="is_effect" value="2" <?php if($vo['is_effect'] == 2): ?>checked="checked"<?php endif; ?> /></lable>
		</td>
	</tr>
	
	<tr id="is_effect_reason" <?php if($vo['is_effect'] != 2): ?>style="display:none;"<?php endif; ?> >
		<td class="item_title">未通过理由:</td>
		<td class="item_input">
			 <textarea name="refuse_reason" class="textarea"><?php echo ($vo["refuse_reason"]); ?></textarea>
 		</td>
	</tr>
	<script>
		$(function(){
			$("input[name='is_effect']").bind("click",function(){
				var val=$("input[name='is_effect']:checked").val();
				if(val==2){
					$("#is_effect_reason").show();
				}else{
					$("#is_effect_reason").hide();
				}
			});
			
		});
	</script>
	<tr>
		<td class="item_title">是否显示支持者:</td>
		<td class="item_input">
			<lable><?php echo L("IS_SUPPORT_PRINT_1");?><input type="radio" name="is_support_print" value="1" <?php if($vo['is_support_print'] == 1): ?>checked="checked"<?php endif; ?> /></lable>
			<lable><?php echo L("IS_SUPPORT_PRINT_0");?><input type="radio" name="is_support_print" value="0" <?php if($vo['is_support_print'] == 0): ?>checked="checked"<?php endif; ?> /></lable>
			<span class='tip_span'>前台页面是否显示支持者的人数</span>
		</td>
	</tr>
	<tr>
		<td class="item_title">支付类型:</td>
		<td class="item_input">
			<select name="ips_bill_no">
 				<option value="0" <?php if($vo["ips_bill_no"] == '' or  $vo["ips_bill_no"] == 0 ): ?>selected="selected"<?php endif; ?> >网站支付</option>
				<option value="1" <?php if($vo["ips_bill_no"] > 0 ): ?>selected="selected"<?php endif; ?> >第三方托管</option>
			</select>
		</td>
	</tr>
	<tr>
		<td class="item_title">目标金额:</td>
		<td class="item_input"><input type="text" class="textbox" name="limit_price"  value="<?php echo ($vo["limit_price"]); ?>"/></td>
	</tr>
	<tr>
		<td class="item_title">佣金比例:</td>
		<td class="item_input">
			<input type="text" class="textbox" name="pay_radio"  value="<?php echo ($vo["pay_radio"]); ?>"/>
			<span class='tip_span'>佣金比例为0的话，按系统的佣金比例0.1来算，不是0的话按这里的佣金比例来算</span>
		</td>
	</tr>
    <tr id="add_coin">
		<td class="item_title">增加支持币种:</td>
		<td><input type="button" class="button" value="新增币种" id="add_button"></td>		
    </tr>
    <script type="text/javascript">
        $("#add_button").bind("click",function(){
            ajax();
        });
     function ajax(){
     	$.ajax({
     		url:ROOT+"?"+VAR_MODULE+"="+MODULE_NAME+"&"+VAR_ACTION+"=all_coin",
     		type:"post",
     		success:function(data){
                var $data=$.parseJSON(data);
                var html="<tr><td class='item_title'>支持币种</td>"+
                "<td><select name='pay_type'>";
			    var len=$data.length;
			    for(var i =0;i<len;i++){
                  html+="<option value='"+$data[i].id+"' name='pay_type'>"+$data[i].pay_name+"</option>";
			    } 
			    html+="</select>  支付比例:<input type='text' class='textbox'> 最大转换额度:<input type='text' class='textbox'>  单个用户最大支付额度:<input type='text' class='textbox'> <input type='button' class='button' value='确定' onclick='coin_ajax()'>   <input type='button' class='button' value='删除'></td></tr>";
     		    $(html).insertAfter("#add_coin");
     		}, 
     	});
     }
     function coin_ajax(){
     	alert('444');
     }

    </script>
<!-- 	<tr>		
      <td class="item_title">支持货币类型:</td>
      <td class="item_input">
      	<?php if(is_array($coin_type)): foreach($coin_type as $key=>$item): ?><ul>
                  <li><input type="checkbox" name="pay_type[]" value="<?php echo ($item["id"]); ?>"><?php echo ($item["pay_name"]); ?>
                      支付比例:<input type="text" name="" value="">
                      最大转换额度:<input type="text" name="" value="">
                      单个用户最大支付额度:<input type="text" name="" value="">
                  </li>
				</ul><?php endforeach; endif; ?>
      </td>    
	</tr> -->
	<tr>
		<td class="item_title">总数字权益份额:</td>
		<td class="item_input">
			<input type="text" class="textbox" name="digital_right_amount"  value="<?php echo ($vo["digital_right_amount"]); ?>"/>
			<span class='tip_span'>众筹发起人设定的权益总份额。</span> 
		</td>
	</tr> 
	<tr>
		<td class="item_title">单个数字权益价格:</td>
		<td class="item_input">
			<input type="text" class="textbox" name="price_per_right"  value="<?php echo ($vo["price_per_right"]); ?>"/>
			<span class='tip_span'>元/个	单个数字权益单价。</span> 
		</td>
	</tr>  
	<tr>
		<td class="item_title">用户众筹数字权益数目上限:</td>
		<td class="item_input">
			<input type="text" class="textbox" name="zc_amount_limit"  value="<?php echo ($vo["zc_amount_limit"]); ?>"/> 
			<span class='tip_span'>默认为0；设置为0时，表示不设限制。</span> 
		</td>
	</tr>
	<tr>
        <td class="item_title">用户参与众筹用币兑换的最大次数:</td>
		<td class="item_input">
			<input type="text" class="textbox" name="zc_count_limit"  value="<?php echo ($vo["per_time"]); ?>"/> 
		</td>
	</tr>  
	<tr>
		<td class="item_title">用户参与众筹次数上限:</td>
		<td class="item_input">
			<input type="text" class="textbox" name="zc_count_limit"  value="<?php echo ($vo["zc_count_limit"]); ?>"/> 
			<span class='tip_span'>默认为1；设置为0时，表示不设限制。</span> 
		</td>
	</tr> 
	<tr>
		<td class="item_title">项目简介:</td>
		<td class="item_input">
			<textarea name="brief" class="textarea"><?php echo ($vo["brief"]); ?></textarea>
		</td>
	</tr>
	<tr>
		<td class="item_title">项目详情:</td>
		<td class="item_input">
			 <div  style='margin-bottom:5px; '><textarea id='description' name='description' class='ketext' style='width:750px; height:350px;' ><?php echo ($vo["description"]); ?></textarea> </div>
		</td>
	</tr>
	
         <tr>
		<td class="item_title">付款与退款说明:</td>
		<td class="item_input">
			 <div  style='margin-bottom:5px; '><textarea id='description_1' name='description_1' class='ketext' style='width:750px; height:350px;' ><?php echo ($vo["description_1"]); ?></textarea> </div>
		</td>
	</tr>
        
	<tr>
		<td class="item_title">项目标签:</td>
		<td class="item_input"><input type="text" class="textbox" name="tags" style="width:500px;" value="<?php echo ($vo["tags"]); ?>" /> <span class='tip_span'>用空格分隔</span></td>
	</tr>
	<!--
	<tr>
		<td class="item_title">项目所属类别:</td>
		<td class="item_input">
			<select name="cate_id" class="require">
				<option value="0">请选择</option>
				<?php if(is_array($cate_list)): foreach($cate_list as $key=>$cate_item): ?><option value="<?php echo ($cate_item["id"]); ?>" <?php if($vo['cate_id'] == $cate_item['id']): ?>selected="selected"<?php endif; ?> ><?php echo ($cate_item["title_show"]); ?></option><?php endforeach; endif; ?>
			</select>
		</td>
	</tr>
	-->
	<tr>
		<td class="item_title">项目所属地区:</td>
		<td class="item_input">
			<select name="province">				
			<option value="" rel="0">请选择省份</option>
			<?php if(is_array($region_lv2)): foreach($region_lv2 as $key=>$region): ?><option value="<?php echo ($region["name"]); ?>" rel="<?php echo ($region["id"]); ?>" <?php if($region['selected']): ?>selected="selected"<?php endif; ?>><?php echo ($region["name"]); ?></option><?php endforeach; endif; ?>
			</select>
			
			<select name="city">				
			<option value="" rel="0">请选择城市</option>
			<?php if(is_array($region_lv3)): foreach($region_lv3 as $key=>$region): ?><option value="<?php echo ($region["name"]); ?>" rel="<?php echo ($region["id"]); ?>" <?php if($region['selected']): ?>selected="selected"<?php endif; ?>><?php echo ($region["name"]); ?></option><?php endforeach; endif; ?>
			</select>
		</td>
	</tr>
	<tr>
		<td class="item_title">项目排序:</td>
		<td class="item_input"><input type="text" class="textbox" name="sort" value="<?php echo ($vo["sort"]); ?>" /></td>
	</tr>
	
	<tr>
		<td class="item_title">常见问题: [<a href="javascript:void(0);" onclick="add_faq();">增加</a>]</td>
		<td class="item_input" id="faq">
			<?php if(is_array($faq_list)): foreach($faq_list as $key=>$faq_item): ?><div style="padding:3px;">
				问题 <input type="text" class="textbox" name="question[]" value="<?php echo ($faq_item["question"]); ?>" />
				答案 <input type="text" class="textbox" name="answer[]" value="<?php echo ($faq_item["answer"]); ?>" />
				<a href="javascript:void(0);" onclick="del_faq(this);">删除</a>
				</div><?php endforeach; endif; ?>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">SEO标题:</td>
		<td class="item_input">
			<textarea name="seo_title" class="textarea"><?php echo ($vo["seo_title"]); ?></textarea>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">SEO关键词:</td>
		<td class="item_input">
			<textarea name="seo_keyword" class="textarea"><?php echo ($vo["seo_keyword"]); ?></textarea>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">SEO描述:</td>
		<td class="item_input">
			<textarea name="seo_description" class="textarea"><?php echo ($vo["seo_description"]); ?></textarea>
		</td>
	</tr>
	
	<tr>
		<td colspan=2 class="bottomTd"></td>
	</tr>
</table>

<div class="blank5"></div>
	<table class="form" cellpadding=0 cellspacing=0>
		<tr>
			<td colspan=2 class="topTd"></td>
		</tr>
		<tr>
			<td class="item_title"></td>
			<td class="item_input">
			<!--隐藏元素-->
			<input type="hidden" name="<?php echo conf("VAR_MODULE");?>" value="Deal" />
			<input type="hidden" name="<?php echo conf("VAR_ACTION");?>" value="update_coin" />
			<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" />
			<!--隐藏元素-->
			<input type="submit" class="button" value="<?php echo L("EDIT");?>" />
			<input type="reset" class="button" value="<?php echo L("RESET");?>" />
			</td>
		</tr>
		<tr>
			<td colspan=2 class="bottomTd"></td>
		</tr>
	</table> 		 
</form>
	
<script>

     var checkedBox= $("input[name=pay_type]:checked").val();

	 $("input[name=is_effect]").bind("change",function(){
	 	var value = $("input[name=is_effect]:checked").val();
			if(value == 1){
				add_require()
			}else{
				remove_require()
			}

	 });
	function remove_require(){
	  $("#begin_time").removeClass("require");
	  $("#end_time").removeClass("require");
	}
	function add_require(){
	  $("#begin_time").addClass("require");
	  $("#end_time").addClass("require");
	}
	<?php if($vo['is_effect'] == 0 || $vo['is_effect'] == 2): ?>remove_require();<?php endif; ?>
</script>
	
</div>
</body>
</html>