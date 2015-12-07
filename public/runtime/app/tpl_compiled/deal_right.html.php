<!--右start-->
<div class="xqmain_right">
	<!--第一部分start-->
	<div class="schedule_box f_l">
		<span class="invest_status">
		<?php if ($this->_var['deal_info']['begin_time'] > $this->_var['now']): ?>
		即将开始
		<?php elseif ($this->_var['deal_info']['end_time'] < $this->_var['now'] && $this->_var['deal_info']['end_time'] != 0): ?>
			<?php if ($this->_var['deal_info']['percent'] >= 100): ?>
		已成功 
			<?php else: ?>
		筹资失败
			<?php endif; ?>	 
		<?php else: ?>
			<?php if ($this->_var['deal_info']['percent'] >= 100): ?>
				已成功 
			<?php elseif ($this->_var['deal_info']['end_time'] == 0): ?>
		长期项目
			<?php else: ?>
		筹资中
			<?php endif; ?>
		<?php endif; ?>
		</span>
		<div class="schedule_m">
			<div class="box_title">
				<span>目前累计资金：</span>
			</div>
			<div class="box_nu f_money"><?php 
$k = array (
  'name' => 'format_price',
  'v' => $this->_var['deal_info']['total_virtual_price'],
);
echo $k['name']($k['v']);
?></div>
			<?php if ($this->_var['deal_info']['type'] != 1): ?> 
			<div class="box_title">
				<span>目前累计数字权益份额：</span>
			</div> 
			<div class="box_nu f_money"><?php echo $this->_var['deal_info']['total_virtual_right']; ?></div>
			<?php endif; ?>
			<div class="blank0"></div>
			<div class="target_money f_999">
				<span>此项目须在 <?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['deal_info']['end_time'],
  'f' => 'Y年m月d日H时i分',
);
echo $k['name']($k['v'],$k['f']);
?> 前，获得<span class="f_money"><?php 
$k = array (
  'name' => 'format_price',
  'v' => $this->_var['deal_info']['limit_price_format'],
);
echo $k['name']($k['v']);
?></span>的支持才可成功!</span>
			</div>
			<div class="box_progress">
				<div class="jd clearfix">
					<div class="f_l mt5 mr10" style="width:260px;*width:258px;">
					<?php if ($this->_var['deal_info']['begin_time'] > $this->_var['now']): ?>
						<div class="ui-progress" style="width:260px;*width:258px;">
							<span style="width:<?php echo $this->_var['deal_info']['percent']; ?>%;background:#ffae00;"></span>
						</div>
					<?php elseif ($this->_var['deal_info']['end_time'] < $this->_var['now'] && $this->_var['deal_info']['end_time'] != 0): ?>
						<?php if ($this->_var['deal_info']['percent'] >= 100): ?>				
						<div class="ui-success" style="width:260px;*width:258px;">
							<span class="theme_bgcolor" style="width:100%;"></span>
						</div>
						<?php else: ?>
						<div class="ui-progress" style="width:260px;*width:258px;">
							<span style="width:<?php echo $this->_var['deal_info']['percent']; ?>%;background:#4d4d4f;"></span>
						</div>
						<?php endif; ?>
					<?php else: ?>
						<?php if ($this->_var['deal_info']['percent'] >= 100): ?>
						<div class="ui-success" style="width:260px;*width:258px;">
							<span style="width:100%;"></span>
						</div>
						<?php else: ?>
							<?php if ($this->_var['deal_info']['end_time'] == 0): ?>
						<div class="ui-progress" style="width:260px;*width:258px;">
							<span class="theme_bgcolor" style="width:<?php echo $this->_var['deal_info']['percent']; ?>%;"></span>
						</div>
							<?php else: ?>
						<div class="ui-progress" style="width:260px;*width:258px;">
							<span class="theme_bgcolor" style="width:<?php echo $this->_var['deal_info']['percent']; ?>%;"></span>
						</div>
							<?php endif; ?>	
						<?php endif; ?>
					<?php endif; ?>
					</div>
			        <span><?php echo $this->_var['deal_info']['percent']; ?>%</span>
				</div>
				<span class="f12"><i class="icon iconfont mr5">&#xe608;</i>支持人数:</span>
				<?php if ($this->_var['deal_info']['virtual_person'] == 0): ?>
				<span class="theme_fcolor f12 mr15"><?php echo $this->_var['deal_info']['support_count']; ?>人</span>
				<?php endif; ?>
				<?php if ($this->_var['deal_info']['virtual_person'] != 0): ?>
				<span class="theme_fcolor f12 mr15"><?php echo $this->_var['deal_info']['person']; ?>人</span>
				<?php endif; ?>
				<?php if ($this->_var['deal_info']['end_time'] != 0): ?>
				<span class="f12"><i class="icon iconfont mr5 left_time">&#xe609;</i>剩余时间</span>
				<span class="theme_fcolor f12 mr15"><?php if ($this->_var['deal_info']['remain_days'] < 0): ?><?php if ($this->_var['deal_info']['percent'] > 100): ?>已成功<?php else: ?>已过期<?php endif; ?><?php else: ?><?php if ($this->_var['deal_info']['remain_days'] == 0): ?>0<?php else: ?><?php echo $this->_var['deal_info']['remain_days']; ?><?php endif; ?>天<?php endif; ?></span>
				<?php endif; ?>
				<div class="blank0"></div>
				<span class="f12"><i class="icon iconfont mr5 f_l" style="margin-top:-6px">&#xe60b;</i>支付方式:</span>
				<span class="theme_fcolor f12 mr15"><?php if ($this->_var['deal_info']['ips_bill_no'] == 0): ?>网站支付<?php else: ?>第三方托管<?php endif; ?></span>
			</div>
			<div class="box_promoter">
				<div class="promoter_bg"></div>
				<div class="promoter_img">
					<?php 
$k = array (
  'name' => 'show_avatar',
  'p' => $this->_var['deal_info']['user_id'],
);
echo $k['name']($k['p']);
?>
				</div>
				<div class="promoter_text">
					<span class="boxname">
						<div class="f_l"><?php echo $this->_var['deal_info']['user_name']; ?></div>
						<?php if ($this->_var['deal_info']['user_icon']): ?>
						<div class="f_l"><img src="<?php echo $this->_var['deal_info']['user_icon']; ?>" title="会员等级" class="level_icon" /></div>
						<?php endif; ?>
						<div class="f_l">
							<i class="<?php if ($this->_var['deal_info']['is_investor'] > 0): ?>investor_type<?php endif; ?> <?php if ($this->_var['deal_info']['is_investor'] == 1): ?>personal_icon<?php endif; ?><?php if ($this->_var['deal_info']['is_investor'] == 2): ?>agency_icon<?php endif; ?>" title="<?php if ($this->_var['deal_info']['is_investor'] == 1): ?>个人投资者<?php endif; ?><?php if ($this->_var['deal_info']['is_investor'] == 2): ?>机构投资者<?php endif; ?>"></i>
						</div>
						<div class="f_l">
							<a href="javascript:void(0)" onclick="send_message(<?php echo $this->_var['deal_info']['user_id']; ?>)" class="btn_send_message theme_fcolor">+发私信</a>
						</div>
						<div class="blank0"></div>
					</span>
					<span class="boxtime">上次登录时间：<?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['deal_info']['login_time'],
  'f' => 'Y/m/d',
);
echo $k['name']($k['v'],$k['f']);
?></span>
					<?php if ($this->_var['deal_info']['province'] != '' || $this->_var['deal_info']['city'] != ''): ?>
					<span class="boxaddress"><i class="icon iconfont">&#xe619;</i><?php echo $this->_var['deal_info']['province']; ?>&nbsp;<?php echo $this->_var['deal_info']['city']; ?></span>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div> 
	<?php if ($this->_var['access'] == 1): ?>  
	<div class="repays_box">
		<div class="repays_m">
			<?php if ($this->_var['deal_info']['type'] == 0): ?>
				<?php $_from = $this->_var['deal_item_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'deal_item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['deal_item']):
?>
				<?php if ($this->_var['deal_item']['type'] == 1): ?>
				<div class="repays f_l">
					<div class="repays_hd">
						<span class="f_l">无私奉献</span>
						<span class="f_r">已有<em class="f18 f_red"><?php echo $this->_var['deal_item']['support_count']; ?></em>位支持者</span>
					</div>
					<div class="repays_bd">
						<div class="repay_intro f_l">
							<?php 
$k = array (
  'name' => 'nl2br',
  'v' => $this->_var['deal_item']['description'],
);
echo $k['name']($k['v']);
?>
						</div>
						<div class="blank0"></div>
						<div class="repay_num f_l" style="width:100%">
			 				<div class="deal_item_images" style="overflow:hidden;text-align:left">	
								<div class="blank5"></div>			
								<?php $_from = $this->_var['deal_item']['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'image');if (count($_from)):
    foreach ($_from AS $this->_var['image']):
?>
								<div class="image_item">
									<img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['image']['image'],
  'w' => '50',
  'h' => '50',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>" rel="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['image']['image'],
  'w' => '570',
  'h' => '430',
);
echo $k['name']($k['v'],$k['w'],$k['h']);
?>" width=50 height=50 />
								</div>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							</div>
			 			</div>
						<?php if (( $this->_var['deal_info']['end_time'] > $this->_var['now'] || $this->_var['deal_info']['end_time'] == 0 ) && $this->_var['deal_info']['begin_time'] < $this->_var['now'] && $this->_var['deal_info']['is_effect'] == 1): ?>
						<?php if ($this->_var['deal_item']['virtual_add_support_person'] < $this->_var['deal_item']['limit_user'] || $this->_var['deal_item']['limit_user'] == 0): ?>
						<a class="repay_btn theme_bgcolor" href="<?php
echo parse_url_tag("u:cart|"."id=".$this->_var['deal_item']['id']."".""); 
?>" target="_blank">
							<div>
								<span>支持</span>
							</div>
						</a>
						<?php else: ?>
						<div class="repay_btn bg_gray" disabled="disabled">已满额</div>
						<?php endif; ?>
						<?php else: ?>
						<div class="repay_btn bg_gray" disabled="disabled">支持</div>
						<?php endif; ?>
						<div class="blank0"></div>
					</div>
				</div>
				<?php else: ?>
				<div class="repays f_l">
					<div class="repays_hd">
						<span class="f_l">支持¥<?php echo $this->_var['deal_item']['price_format']; ?></span> 
						<?php if ($this->_var['deal_item']['is_limit_user'] == 1): ?>
							<?php if ($this->_var['deal_item']['limit_user'] > 0): ?>
							<span class="f_999 f_l"> / 限额<?php echo $this->_var['deal_item']['limit_user']; ?>名</span>
							<?php endif; ?>
						<?php endif; ?>
						<span class="f_r">已有<em class="f18 f_red"><?php echo $this->_var['deal_item']['virtual_person_list']; ?></em>位支持者</span>
						<div class="clear"></div>
					</div>
					<div class="repays_bd">
						<div class="repay_intro">
							<span><?php 
$k = array (
  'name' => 'nl2br',
  'v' => $this->_var['deal_item']['description'],
);
echo $k['name']($k['v']);
?></span>
						</div> 
						<?php if ($this->_var['deal_info']['type'] == 0): ?> 
							<?php if ($this->_var['deal_item']['type'] == 0): ?>
							<span class="repay_right">您将收获 <b><?php echo $this->_var['deal_item']['right_number']; ?></b> 份额的数字权益</span>
							<?php else: ?>
							<span class="repay_right">您将机会收获 <b><?php echo $this->_var['deal_item']['right_number']; ?></b> 份额的数字权益</span>
							<?php endif; ?>
						<?php endif; ?>
						<div class="repay_img tl">		
							<?php $_from = $this->_var['deal_item']['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'image');if (count($_from)):
    foreach ($_from AS $this->_var['image']):
?>
							<div class="image_item">
								<img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['image']['image'],
  'w' => '50',
  'h' => '50',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>" rel="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['image']['image'],
  'w' => '570',
  'h' => '430',
);
echo $k['name']($k['v'],$k['w'],$k['h']);
?>" width=50 height=50 />
							</div>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						</div>
						<div class="repay_num">
							<?php if ($this->_var['deal_item']['is_delivery'] == 1 || ( $this->_var['deal_item']['is_share'] == 1 && $this->_var['deal_item']['share_fee'] > 0 )): ?>
							<div>
								<?php if ($this->_var['deal_item']['is_delivery'] == 1): ?>
									<?php if ($this->_var['deal_item']['delivery_fee'] == 0): ?>
									运费：包邮
									<?php else: ?>
									运费：¥<?php 
$k = array (
  'name' => 'round',
  'v' => $this->_var['deal_item']['delivery_fee'],
  'e' => '2',
);
echo $k['name']($k['v'],$k['e']);
?>
									<?php endif; ?>
									&nbsp;&nbsp;
								<?php endif; ?>
								<?php if ($this->_var['deal_item']['is_share'] == 1 && $this->_var['deal_item']['share_fee'] > 0): ?>
									分红：¥<?php 
$k = array (
  'name' => 'round',
  'v' => $this->_var['deal_item']['share_fee'],
  'e' => '2',
);
echo $k['name']($k['v'],$k['e']);
?>
								<?php endif; ?>
							</div>
							<?php endif; ?>
							<?php if ($this->_var['deal_item']['repaid_day'] > 0): ?>
							<div class="blank5"></div>
							<div>
								预计发放时间：项目成功结束后<?php echo $this->_var['deal_item']['repaid_day']; ?>天内
							</div>
							<?php endif; ?>
						</div>
						<?php if (( $this->_var['deal_info']['end_time'] > $this->_var['now'] || $this->_var['deal_info']['end_time'] == 0 ) && $this->_var['deal_info']['begin_time'] < $this->_var['now'] && $this->_var['deal_info']['is_effect'] == 1): ?>
						<?php if ($this->_var['deal_item']['virtual_add_support_person'] < $this->_var['deal_item']['limit_user'] || $this->_var['deal_item']['limit_user'] == 0): ?>
						<a class="repay_btn theme_bgcolor" href="<?php
echo parse_url_tag("u:cart|"."id=".$this->_var['deal_item']['id']."".""); 
?>" target="_blank">
							<div>
								<span>支持¥<?php echo $this->_var['deal_item']['price_format']; ?></span>
							</div>
						</a>
						<?php else: ?>
						<div class="repay_btn bg_gray" disabled="disabled">已满额</div>
						<?php endif; ?>
						<?php else: ?>
						<div class="repay_btn bg_gray" disabled="disabled">支持¥<?php echo $this->_var['deal_item']['price_format']; ?></div>
						<?php endif; ?>
						<div class="blank0"></div>
					</div>
				</div>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			<?php else: ?>
				<div style="width:350px;padding:20px;margin-top:10px;background:#f4faff;"> 
 					<form action="<?php
echo parse_url_tag("u:cart#index_|"."".""); 
?>" method="post">
 						<div>
 							<?php if ($this->_var['deal_info']['zc_amount_limit'] > 0): ?>
		 					<span style="font-size: 16px;margin-bottom: 15px;word-break: break-all;word-wrap: break-word;">每位用户购买数字权益份额上限为<b><?php echo $this->_var['deal_info']['zc_amount_limit']; ?></b> 份, 您已经购买了 <b><?php echo $this->_var['buy_right_number']; ?> </b>份数字权益 , 还可以购买<b><?php echo $this->_var['can_buy_right_number']; ?></b>份数字权益。</span>
							<div class="blank0"></div>
							<?php endif; ?>
		 				</div>
						<div class="control-group small-control-group">
							<label class="control-label">支持众筹权益数量:</label>
							<div class="control-text">
								<input type="input" id="zc_amount" value="0.0" class="small_textbox mr10" name="zc_amount" onkeyup="onKeyUp(this)" style="width:165px;">
							</div>  
							<div class="blank0"></div>
							<div class="blank0"></div>
		 				</div>  
		 				<div >
		 					<span style="font-size: 16px;margin-bottom: 15px;word-break: break-all;word-wrap: break-word;color:#ff0000;">您将为此支付 ¥<label name="zc_cost_money" id="zc_cost_money"><b>0.0</b></label> 元</span>
								<div class="blank0"></div>
		 				</div>
						<div class="submit_btn_row control-group" >  
							<input type="submit" <?php if ($this->_var['deal_info']['begin_time'] < $this->_var['now'] && $this->_var['deal_info']['end_time'] > $this->_var['now'] && $this->_var['deal_info']['percent'] < 100 && $this->_var['deal_info']['percent'] >= 0): ?> class="ui-button theme_bgcolor"  <?php else: ?> class="ui-button gray" disabled="disabled" <?php endif; ?>  value="支持" rel="green">
							<input type="hidden" value="1" name="ajax" >  
							<input type="hidden" value="<?php echo $this->_var['deal_info']['id']; ?>" name="did" >  
						</div> 
					</form>
				</div>
				<script type="text/javascript"> 
					function onKeyUp(th){ 
						var regStrs = [
					        ['^0(\\d+)$', '$1'], //禁止录入整数部分两位以上，但首位为0
					        ['[^\\d\\.]+$', ''], //禁止录入任何非数字和点
					        ['\\.(\\d?)\\.+', '.$1'], //禁止录入两个以上的点
					        ['^(\\d+\\.\\d{2}).+', '$1'] //禁止录入小数点后两位以上
					    ];
					    for(i=0; i<regStrs.length; i++){
					        var reg = new RegExp(regStrs[i][0]);
					        th.value = th.value.replace(reg, regStrs[i][1]);
					    }

					    var left = <?php echo $this->_var['deal_info']['digital_right_amount']; ?> - <?php echo $this->_var['deal_info']['total_virtual_right']; ?>;  
					    left = left<<?php echo $this->_var['can_buy_right_number']; ?>?left:<?php echo $this->_var['can_buy_right_number']; ?>;
					    if(th.value>left){
					    	th.value = left;  
					    } 
					    th.value = parseInt(th.value);

						var money = th.value*<?php echo $this->_var['deal_info']['price_per_right']; ?>;
						money = Math.round(money*100)/100;
						$("#zc_cost_money").text(money);
					} 
				</script>
			<?php endif; ?>
		</div>
	</div>
	<?php if ($this->_var['deal_info']['description_1'] != null): ?>
	<div class="blank"></div>
	<div class="explain_box">
		<div class="explain">
			<div class="explain_hd">付款与退款说明：</div>
			<div class="explain_bd">
				<span><?php echo $this->_var['deal_info']['description_1']; ?></span>
			</div>
		</div>
	</div>
	<div class="blank"></div>
	<?php endif; ?>
	<?php else: ?>
	<div class="blank0"></div>
		<?php if ($this->_var['access'] == 0): ?>
	    <div class="prompt_box tc mt20 ml10 f16">
	        温馨提示：您需要<a onclick="javascript:show_pop_login();" class="f_red">登录</a>才可以查看项目详细信息！
	    </div>
	    <?php endif; ?>
	    <?php if ($this->_var['access'] == 2): ?>
	    <div class="prompt_box tc mt20 ml10 f16 f_red">
	        温馨提示：您的会员等级不够，无法查看项目详细信息！
	    </div>
	    <?php endif; ?>
	    <?php if ($this->_var['access'] == 3): ?>
	    <div class="prompt_box tc mt20 ml10 f16">
	        温馨提示：您的手机未认证，马上去<a href='<?php
echo parse_url_tag("u:settings#security|"."method=setting-mobile-box".""); 
?>' class="f_red">认证手机</a>！
	    </div>
	    <?php endif; ?>
	<?php endif; ?>
	<div class="blank"></div>
	<!--第3部分结束-->	
</div>
<!--右end-->