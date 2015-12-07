<?php echo $this->fetch('inc/header.html'); ?> 
<?php echo $this->fetch('inc/home_user_info.html'); ?>
<!--中间开始-->
<div class="dlmain Myhomepage">
	<?php echo $this->fetch('inc/account_left.html'); ?>
	<div class="homeright pageright f_r">
		<div class="account_money">
			<div class="list_title clearfix">
				<div <?php if ($this->_var['all'] == 0): ?>class="cur"<?php endif; ?>>
					<span>积分明细</span>
				</div>
			</div>
			<div><strong>总积分：</strong><span class="f_red"><?php if ($this->_var['total_score'] > 0): ?><?php echo $this->_var['total_score']; ?><?php else: ?>0<?php endif; ?></span></div>
			<div class="blank20"></div>
			<div class="list_conment">
				<?php if ($this->_var['log_list']): ?>
				<div class="i_deal_list clearfix">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="uc_table">
						<tbody>
							<tr>
								<th>日志内容</th>
								<th>类型</th>
								<th width="120">积分</th>
								<th width="160">时间</th>
							</tr>
							<?php $_from = $this->_var['log_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'log_item');if (count($_from)):
    foreach ($_from AS $this->_var['log_item']):
?>
							<tr>
								<td class="deal_name" style="text-align:left;"><?php echo $this->_var['log_item']['log_info']; ?></td>
								<td><?php if ($this->_var['log_item']['score'] > 0): ?>增加<?php else: ?>减少<?php endif; ?></td>
								<td>
									<span class="f_money b"><?php echo $this->_var['log_item']['score']; ?></span>
								</td>
								<td><?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['log_item']['log_time'],
);
echo $k['name']($k['v']);
?></td>
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
					还没有积分记录
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