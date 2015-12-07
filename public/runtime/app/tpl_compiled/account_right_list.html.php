<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/fanwe_utils/jcDate.css";
$this->_var['dcpagecss'][] = $this->_var['TMPL_REAL']."/css/fanwe_utils/jcDate.css";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/jQuery-jcDate.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/fanwe_utils/jQuery-jcDate.js";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/acount_credit.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/acount_credit.js";
?>
<link rel="stylesheet" type="text/css" href="<?php 
$k = array (
  'name' => 'parse_css',
  'v' => $this->_var['dpagecss'],
);
echo $k['name']($k['v']);
?>" />
<script type="text/javascript" src="<?php 
$k = array (
  'name' => 'parse_script',
  'v' => $this->_var['dpagejs'],
  'c' => $this->_var['dcpagejs'],
);
echo $k['name']($k['v'],$k['c']);
?>"></script>
<?php echo $this->fetch('inc/home_user_info.html'); ?>
<!--中间开始-->
<div class="dlmain Myhomepage">
	<?php echo $this->fetch('inc/account_left.html'); ?>
	<div class="homeright pageright f_r">
		<div class="list_title clearfix">
			<div <?php if ($this->_var['all'] == 0): ?>class="cur"<?php endif; ?>>
				<span>数字权益列表</span>
			</div>
		</div>
		<form action="<?php
echo parse_url_tag("u:account#right_list|"."".""); 
?>" method="post"> 
		<div class="account_search" id="account_search">
			<div class="blank10"></div>
			<div class="form_row control-group f_l">
				<label class="form_lable small_form_lable">项目名称：</label>
				<div class="pr f_l">
					<input type="text" name="deal_name" value="<?php echo $this->_var['deal_name']; ?>" class="small_textbox w200 mr10" />
					<span class="holder_tip">请输入项目名称</span>
				</div> 
				<select name="deal_status" id='deal_status' class="ui-select field_select small">
					<option>项目状态</option>  
					<option value="1" <?php if ($this->_var['deal_status'] == 1): ?> selected="selected"<?php endif; ?>>众筹中</option>
					<option value="2" <?php if ($this->_var['deal_status'] == 2): ?> selected="selected"<?php endif; ?>>交易中</option>
					<option value="3" <?php if ($this->_var['deal_status'] == 3): ?> selected="selected"<?php endif; ?>>已交割</option>
				</select> 
			</div>
			<input type="submit" value="搜索" class="ui-button theme_bgcolor" /> 
		</div>
		<!-- 产品项目检索 结束 -->
		</form>
		<div class="blank20"></div>
		<div class="list_conment">
			<?php if ($this->_var['right_list']): ?>
			<div class="i_deal_list clearfix">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="uc_table">
					<thead>
						<tr>
							<th width="300">项目名称</th>
							<th width="200">产品权益数量</th>
							<th width="100">市场单价</th>
							<th width="80">项目状态</th>
							<th width="80" style="text-align:right;padding-right:24px">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php $_from = $this->_var['right_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'right_item');if (count($_from)):
    foreach ($_from AS $this->_var['right_item']):
?>
						<tr>
							<td class="lf">
								<a href="<?php
echo parse_url_tag("u:deal#show|"."id=".$this->_var['right_item']['deal_id']."".""); 
?>" target="_blank" title="<?php echo $this->_var['right_item']['deal_name']; ?>">
									<img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['right_item']['deal_image'],
  'w' => '50',
  'h' => '50',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>"  alt="<?php echo $this->_var['right_item']['deal_name']; ?>" class="f_l p_img" />
									<span class="p_name"><?php echo $this->_var['right_item']['deal_name']; ?></a>
								</a>
							</td>
							<td>
								<div><?php echo $this->_var['right_item']['right_amount']; ?></div> 
							</td>
							<td>
								<div><?php echo $this->_var['right_item']['price_per_right']; ?>元/个</div> 
							</td>
							<td>
								<div>
									<?php if ($this->_var['right_item']['deal_status'] == 1): ?>
										等待交易
									<?php elseif ($this->_var['right_item']['deal_status'] == 2): ?>
										交易中
									<?php elseif ($this->_var['right_item']['deal_status'] == 3): ?>
										交割中
									<?php else: ?>
										错误状态
									<?php endif; ?>

								</div>
							</td>
							<td	style="text-align:right;padding-right:20px">
								<div>
									<?php if ($this->_var['right_item']['deal_status'] == 2): ?>
										<a href="http://www.zhgtrade.com">前往交易</a>
									<?php else: ?>
										<a href=<?php
echo parse_url_tag("u:deal#show|"."id=".$this->_var['right_item']['deal_id']."".""); 
?>>前往查看</a>
									<?php endif; ?> 
								</div>
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
				无相关信息，可尝试其他操作
				<!--从未创建过任何项目 <a href="<?php
echo parse_url_tag("u:project#choose|"."".""); 
?>" class="btn_creat linkgreen">立即创建项目</a>-->
			</div>
			<?php endif; ?>
		</div>

	</div>
	
	
<!--中间结束-->
<div class="blank"></div>
</div>
<div class="blank"></div>
<script type="text/javascript">
	account_more_search("#more_search_btn","#more_search");
	//选择日期控件
    $("input.jcDate").jcDate({
        IcoClass : "jcDateIco",
        Event : "click",
        Speed : 100,
        Left :-125,
        Top : 28,
        format : "-",
        Timeout : 100,
        Oldyearall : 17,  // 配置过去多少年
		Newyearall : 0  // 配置未来多少年
    });
</script>
<?php echo $this->fetch('inc/footer.html'); ?> 