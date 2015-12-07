<?php echo $this->fetch('inc/header.html'); ?> 
<?php echo $this->fetch('inc/home_user_info.html'); ?>
<!--中间开始-->
<div class="dlmain Myhomepage">
 	<?php echo $this->fetch('inc/account_left.html'); ?> 
 	<div class="homeright pageright f_r">
		<div class="account_money">
			<div class="list_title clearfix">
				<div <?php if ($this->_var['module'] == 'account' && $this->_var['action'] == 'money_inchange'): ?>class="cur"<?php endif; ?>>
					<a href="<?php
echo parse_url_tag("u:account#money_inchange|"."".""); 
?>">我要充值</a>
				</div>
				<div <?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'record' || $this->_var['action'] == 'pay' )): ?>class="cur"<?php endif; ?>>
					<a href="<?php
echo parse_url_tag("u:account#record|"."".""); 
?>">在线充值日志</a>
				</div>
				<div <?php if ($this->_var['module'] == 'account' && ( $this->_var['action'] == 'off_record' )): ?>class="cur"<?php endif; ?>>
					<a href="<?php
echo parse_url_tag("u:account#off_record|"."".""); 
?>">线下充值日志</a>
				</div>
			</div>
			<div class="list_conment">
				<div class="ui_button theme_bgcolor mr20">
					<span>已充值总额：<?php 
$k = array (
  'name' => 'format_price',
  'v' => $this->_var['pay_money'],
);
echo $k['name']($k['v']);
?></span>
				</div>
				<div class="ui_button bg_red">
					<span>可用资金：<?php 
$k = array (
  'name' => 'format_price',
  'v' => $this->_var['total_money'],
);
echo $k['name']($k['v']);
?></span>
				</div>
				<div class="blank20"></div>
				<?php if ($this->_var['off_pay_list']): ?>
				<div class="i_deal_list clearfix">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="uc_table">
						<tbody>
							<tr>
								<th>线下充值订单号</th>
								<th>用户名</th>
								<th>用户联系电话</th>
								<th>用户银行</th>
								<th>支付方式</th>
								<th>充值金额</th>
								<th>创建时间</th>
								<th>最新更新时间</th>
								<th>状态</th>		
							</tr>
							<?php $_from = $this->_var['off_pay_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'off_pay_list_item');if (count($_from)):
    foreach ($_from AS $this->_var['off_pay_list_item']):
?>
							<tr>
								<td>
									<?php echo $this->_var['off_pay_list_item']['id']; ?>
								</td>
								<td>
									<?php echo $this->_var['off_pay_list_item']['user_name']; ?>
								</td>
								<td>
									<span class="f_money b"><?php echo $this->_var['off_pay_list_item']['user_phone']; ?></span>
								</td>
								<td>
				                   <?php echo $this->_var['off_pay_list_item']['user_account']; ?>
								</td>
								<td>
				                   <?php echo $this->_var['off_pay_list_item']['user_bank']; ?>
								</td>
								<td>
				                   <?php echo $this->_var['off_pay_list_item']['amount']; ?>
								</td>
								<td>
				                   <?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['off_pay_list_item']['create_time'],
);
echo $k['name']($k['v']);
?>
								</td>
								<td>
				                   <?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['off_pay_list_item']['last_update'],
);
echo $k['name']($k['v']);
?>
								</td>
								<td>
                                   <?php 
$k = array (
  'name' => 'get_off_status',
  'v' => $this->_var['off_pay_list_item']['status'],
);
echo $k['name']($k['v']);
?>
								</td>
							</tr>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						</tbody>
					</table>
				</div>
				<div class="blank20"></div>
				<div class="pages"><?php echo $this->_var['pages']; ?></div>
				<div class="blank20"></div>
				<?php else: ?>
				<div class="empty_tip">
					还没有任何充值记录
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
 	<!--中间结束-->
	<div class="blank"></div>
</div>
<div class="blank"></div>
<?php echo $this->fetch('inc/footer.html'); ?> 