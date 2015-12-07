<style type="text/css">
	.u_money_box .recharge.mt60{
		margin-top:60px;
	}
</style>
<div class="u_header">
	<div class="u_box">
		<div class="u_img_box f_l">
			<div class="u_img f_l mr20">
				<div class="u_img_bg"></div>
				<?php 
$k = array (
  'name' => 'show_avatar',
  'p' => $this->_var['user_info']['id'],
  't' => 'big',
);
echo $k['name']($k['p'],$k['t']);
?>
			</div>
			<div class="u_infobox f_l">
				<div class="u_l1 user_name">
					<span class="f24"><?php echo $this->_var['user_info']['user_name']; ?></span>
					<?php if ($this->_var['user_info']['user_icon']): ?>
	                <img src="<?php echo $this->_var['user_info']['user_icon']; ?>" title="会员等级" class="level_icon" />
					<?php endif; ?>
				</div>
				<div class="u_l1 time">
					<div class="f_l">上次登录时间：</div>
					<div class="f_l name"><?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['user_info']['login_time'],
  'f' => 'Y/m/d',
);
echo $k['name']($k['v'],$k['f']);
?></div>
				</div>
				<div class="u_l1 position">
					<?php if ($this->_var['user_info']['province'] != '' || $this->_var['user_info']['city'] != ''): ?>
					<i class="icon iconfont">&#xe619;</i><?php echo $this->_var['user_info']['province']; ?>&nbsp;<?php echo $this->_var['user_info']['city']; ?>
					<?php endif; ?>
				</div>
				<div class='u_l1 uinfo_settting'>
	                <a class='set smobile<?php if ($this->_var['user_info']['mobile']): ?>passed<?php endif; ?>' href='<?php
echo parse_url_tag("u:settings#security|"."method=setting-mobile-box".""); 
?>' title="手机认证，<?php if ($this->_var['user_info']['mobile']): ?>已认证<?php else: ?>未认证<?php endif; ?>">手机认证</a>
	                <a class='set saccount<?php if ($this->_var['user_info']['investor_status'] == 1 && $this->_var['user_info']['is_investor'] != 0): ?>passed<?php endif; ?>' href='<?php
echo parse_url_tag("u:settings#security|"."method=setting-id-box".""); 
?>' title="实名认证，<?php if ($this->_var['user_info']['investor_status'] == 1): ?>已认证<?php else: ?>未认证<?php endif; ?>">实名认证</a>
	                <a class='set semail<?php if ($this->_var['user_info']['email']): ?>passed<?php endif; ?>' href='<?php
echo parse_url_tag("u:settings#security|"."method=setting-email-box".""); 
?>' title="邮箱认证，<?php if ($this->_var['user_info']['email']): ?>已认证<?php else: ?>未认证<?php endif; ?>">邮箱认证</a>
	                <a class='set spaypwd<?php if ($this->_var['user_info']['paypassword']): ?>passed<?php endif; ?>' href='<?php
echo parse_url_tag("u:settings#security|"."method=setting-pass-box".""); 
?>' title="支付密码，<?php if ($this->_var['user_info']['paypassword']): ?>已设置<?php else: ?>未设置<?php endif; ?>">支付密码</a>
	                <a class='set ssetting' href="<?php
echo parse_url_tag("u:settings|"."".""); 
?>" title="账户设置">账户设置</a>
	            </div>
			</div>
		</div>
		<div class="u_money_box f_r">
			<div id="u_money_other" class="u_total_box trusteeship_total_box f_r" style="display:none;">
            	<div class="u_total_m">
            		<div class="f_l mr20">
            			<h3>余额(元)</h3>
            			<span class="u_money theme_fcolor" id="u_money_other_money"></span>
            		</div>
            		<div class="f_r tr">
            			<h3>冻结金额(元)</h3>
            			<span class="u_money sincerity_money" id="u_money_other_freeze"></span>
            		</div>
            	</div>
            </div>
            <div id="u_money_main" class="u_total_box f_r mr10">
            	<div class="u_total_m">
            		<div class="f_l mr20">
            			<h3>余额(元)</h3>
            			<span class="u_money f_red"><?php 
$k = array (
  'name' => 'format_price',
  'v' => $this->_var['user_info']['money'],
  'p' => '2',
);
echo $k['name']($k['v'],$k['p']);
?></span>
            		</div>
            		<?php if (INVEST_TYPE != 1): ?>
            		<div class="f_r tr">
            			<h3>诚意金(元)</h3>
            			<span class="u_money sincerity_money"><?php 
$k = array (
  'name' => 'format_price',
  'v' => $this->_var['user_info']['mortgage_money'],
  'p' => '2',
);
echo $k['name']($k['v'],$k['p']);
?></span>
            		</div>
            		<?php endif; ?>
            	</div>
            </div>
            <div class="blank10"></div>
            <div class="recharge f_r">
            	<?php if ($this->_var['is_tg']): ?>
				<div class="recharge_m1 f_l mr20">
					<div class="f_l">第三方管理账号：</div>
					<div class="f_l">
						<?php if (! $this->_var['user_info']['ips_acct_no']): ?>
						<a href="<?php echo $this->_var['tg_register_url']; ?>" id="J_bind_ips" class="f_blue">去绑定</a>
						<?php else: ?>
						<span class="f_blue">已绑定</span>
						<?php endif; ?>
					</div>
				</div>
				<?php endif; ?>
                <a href="<?php
echo parse_url_tag("u:account#money_inchange|"."".""); 
?>" class="ui-small-button theme_bgcolor btn_inchange mr10">充值</a>
                <a href="<?php
echo parse_url_tag("u:account#money_carry_bank|"."".""); 
?>" class="ui-small-button bg_red btn_inchange mr10">提现</a>
            </div>
		</div>
		<div class="blank"></div>
	</div>
</div>
<script type="text/javascript">
	(function(){
		<?php if ($this->_var['is_tg']): ?>
 			checkIpsBalance(0,<?php echo $this->_var['user_info']['id']; ?>,function(result){
 				var $u_money_box=$(".u_money_box");
 				var $u_money_main=$u_money_box.find("#u_money_main");
 				var $u_money_other=$u_money_box.find("#u_money_other");
				if(result.pErrCode=="1"){
					$u_money_other.show();
					$u_money_other.find("#u_money_other_money").html("¥"+formatNum(result.pBalance-result.pLock));
					$u_money_other.find("#u_money_other_freeze").html("¥"+formatNum(result.pLock));
					
					//$(".J_u_money_0").html($(".J_u_money_0").html() + "<span class='f_red '>+</span>" + formatNum(result.pBalance) +"<span class='f_red '>[绑]</span>");
					//$(".J_u_money_1").html($(".J_u_money_1").html() + "<span class='f_red f14'>+</span>" + formatNum(result.pBalance + result.pLock + result.pNeedstl) +"<span class='f_red f14'>[绑]</span>");
					//$(".J_u_money_2").html($(".J_u_money_2").html() + "<span class='f_red f14'>+</span>" + formatNum(result.pLock) +"<span class='f_red  f14'>[绑]</span>");
				}
				else{
					$u_money_main.removeClass("f_r").addClass("f_l").next(".blank10").remove();
					$u_money_main.next(".recharge").addClass("mt60");
					if($.browser.msie && $.browser.version <= 7){
						$u_money_box.css("width","725px");
					}
				}
			});
		<?php endif; ?>
	})();
</script>