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
				<span>资金记录</span>
			</div>
		</div>
		<div class="list_content">
			<div class="account_credit">
				<form  class="ajax_form_1" method="post"  action="<?php
echo parse_url_tag("u:account#credit|"."".""); 
?>">
					<div class="account_search" id="account_search">
						<div class="blank10"></div>
						<div class="form_row control-group f_l">
							<label class="form_lable small_form_lable">选择时间：</label>
							<div class="small_form_text">
								<input readonly="" type="text" class="small_textbox w100 jcDate" rel="input-text" value="<?php echo $this->_var['begin_time']; ?>" name="begin_time" id="inputLaunchTime" placeholder="请选择日期">
								<span class="f_l pl10 pr10">─</span>
								<input readonly="" type="text" class="small_textbox w100 jcDate mr20" rel="input-text" value="<?php echo $this->_var['end_time']; ?>" name="end_time" id="inputLaunchTime" placeholder="请选择日期">
								<a href="<?php
echo parse_url_tag("u:account#credit|"."day=1".""); 
?>" class="opt <?php if ($this->_var['day'] == 1): ?> cur <?php endif; ?> credit_date">今日</a>
								<a href="<?php
echo parse_url_tag("u:account#credit|"."day=-1".""); 
?>" day="-1"  class="opt<?php if ($this->_var['day'] == - 1): ?> cur <?php endif; ?> credit_date">昨日</a>
								<a href="<?php
echo parse_url_tag("u:account#credit|"."day=-7".""); 
?>" day="-7"  class="opt<?php if ($this->_var['day'] == - 7): ?> cur <?php endif; ?> credit_date">最近7天</a>
								<a href="<?php
echo parse_url_tag("u:account#credit|"."day=-30".""); 
?>" day="-30"  class="opt<?php if ($this->_var['day'] == -30): ?> cur <?php endif; ?> credit_date">最近30天</a>
							</div>
						</div>
						<input type="hidden" name="more_search" value="<?php echo $this->_var['more_search']; ?>">
						<input type="submit" value="搜索" class="ui-button theme_bgcolor" />
						<a href="javascript:void(0);" id="more_search_btn" class="more_search_btn f_red">更多筛选条件<i class="icon iconfont iconfont_down" id="iconfont_down">&#xe61d;</i><i class="icon iconfont iconfont_up" id="iconfont_up">&#xe61c;</i></a>
						<div id="more_search" <?php if ($this->_var['more_search']): ?>style="display:block;"<?php else: ?>style="display:none;"<?php endif; ?>>
							<div class="blank0"></div>
							<div class="form_row control-group f_l">
								<label class="form_lable small_form_lable">输入金额：</label>
								<div class="pr f_l">
									<input type="text" name="begin_money" value="<?php echo $this->_var['begin_money']; ?>"  class="small_textbox w100" />
									<span class="holder_tip">请输入金额</span>
								</div>
								<span class="small_form_text f_l pl10 pr10">─</span>
								<div class="pr f_l mr20">
									<input type="text" name="end_money"  value="<?php echo $this->_var['end_money']; ?>"  class="small_textbox w100" />
									<span class="holder_tip">请输入金额</span>
								</div>
								<select name="type" id='type' class="ui-select field_select small">
									<option>操作类型</option>
									<option value="0">全部</option>
									<option value="1" <?php if ($this->_var['type'] == 1): ?>selected="selected"<?php endif; ?>>收入</option>
									<option value="2" <?php if ($this->_var['type'] == 2): ?>selected="selected"<?php endif; ?>>支出</option>
									<option value="3" <?php if ($this->_var['type'] == 3): ?>selected="selected"<?php endif; ?>>提现</option>
  								</select>
								<div class="blank0"></div>
							</div>
						</div>
					</div>
				</form>
				<div class="blank20"></div>
				<?php if ($this->_var['log_list']): ?>
				<div class="i_deal_list clearfix">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="uc_table">
						<tbody>
							<tr>
								<th>操作类型</th>
 								<th width="200">操作金额</th>
								<th width="160">完成时间</th>
 								<th>备注</th>
							</tr>
							<?php $_from = $this->_var['log_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'log_item');if (count($_from)):
    foreach ($_from AS $this->_var['log_item']):
?>
							<tr>
								<td><?php if ($this->_var['log_item']['money'] > 0): ?>收入<?php else: ?><?php if ($this->_var['log_item']['type'] == 4): ?>提现<?php else: ?>支出<?php endif; ?><?php endif; ?></td>
								<td>
									<span class="f_money b"><?php 
										if($this->_var['log_item']['money']>0){
											$bf="+";
										}else{
											$bf="-";
										}
										echo $bf.(abs(floatval($this->_var['log_item']['money'])));
									?></span>
								</td>
								<td><?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['log_item']['log_time'],
);
echo $k['name']($k['v']);
?></td>
								<td class="deal_name"><?php echo $this->_var['log_item']['log_info']; ?></td>
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
					还没有资金记录
				</div>
				<?php endif; ?>
			</div>
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