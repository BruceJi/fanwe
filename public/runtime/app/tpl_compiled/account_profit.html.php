<?php echo $this->fetch('inc/header.html'); ?> 
<?php echo $this->fetch('inc/home_user_info.html'); ?>
<!--中间开始-->
<div class="dlmain Myhomepage">
	<?php echo $this->fetch('inc/account_left.html'); ?>
	<div class="homeright pageright f_r">
		<div class="account_money">
			<div class="list_title clearfix">
				<div <?php if ($this->_var['all'] == 0): ?>class="cur"<?php endif; ?>>
					<span>推广收益明细</span>
				</div>
			</div>
			<div><strong>应得收益：</strong><span class="f_red"><?php if ($this->_var['total_profit'] > 0): ?><?php echo $this->_var['total_profit']; ?><?php else: ?>0<?php endif; ?></span></div>
			<div><strong>已得收益：</strong><span class="f_red"><?php if ($this->_var['sent_profit'] > 0): ?><?php echo $this->_var['sent_profit']; ?><?php else: ?>0<?php endif; ?></span></div>
			<div class="list_conment">
				<?php if ($this->_var['profit_user_list']): ?>
				<div class="i_deal_list clearfix">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="uc_table">
						<tbody>
							<tr>
								<th>编号</th>
								<th>金额(元)</th>
								<th width="120">用户名</th>
								<th width="160">项目名</th>
								<th>是否发放</th>
							</tr>
							<?php $_from = $this->_var['profit_user_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'profit_user_item');if (count($_from)):
    foreach ($_from AS $this->_var['profit_user_item']):
?>
							<tr>
								<td class="deal_name" style="text-align:center;"><?php echo $this->_var['profit_user_item']['id']; ?></td>
								<td><?php echo $this->_var['profit_user_item']['amount']; ?></td>
								<td>
									<span class="f_money b"><?php 
$k = array (
  'name' => 'get_user',
  'v' => $this->_var['profit_user_item']['user_id'],
);
echo $k['name']($k['v']);
?></span>
								</td>
								<td><?php 
$k = array (
  'name' => 'get_deal',
  'v' => $this->_var['profit_user_item']['deal_id'],
);
echo $k['name']($k['v']);
?></td>
								<td><?php if ($this->_var['profit_user_item']['status'] == 1): ?>已发放<?php else: ?>未发放<?php endif; ?></td>
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
					还没有收益记录
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