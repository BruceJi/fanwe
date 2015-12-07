<style>
	.nc {display:none;}
	.nc_hover {display:block;}
	.li_hover {display:block;}
</style>
<div class="hd">
	<div class="hd1">
		<span class="title f_l"><?php echo $this->_var['deal_info']['deal_title']; ?></span>
		<span class="f_r bt1">
			<div class="ui-button theme_bgcolor fx f_l f12" id="fx_show" style="float:left;position:relative;">
				<i></i>分享
				<div id="nc" class="f_r nc" style="position:absolute;right:0;top:25px;padding:5px 0;">
					<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a></div>
					<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["tsina","qzone","weixin","tqq","douban","renren"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["tsina","qzone","weixin","tqq","douban","renren"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
				</div>
			</div>
			<?php if ($this->_var['deal_info']['type'] != 1): ?>	
				<?php if ($this->_var['is_focus']): ?>
				<div class="qxgz attention_focus_deal f_l ui-button bg_green f12" id="<?php echo $this->_var['deal_info']['id']; ?>">
					<i></i>取消关注
				</div>	
				<?php else: ?>
				<div class="gz attention_focus_deal f_l ui-button bg_green f12" id="<?php echo $this->_var['deal_info']['id']; ?>">
					<i></i>关注
				</div>	
				<?php endif; ?>
			<?php endif; ?>
		</span>

	</div>
	<div class="blank10"></div>
	<div class="hd2">
		<span class="theme_bgcolor" style="padding:2px 5px;color:#fff">发起人</span>
		<?php if ($this->_var['deal_info']['user_id'] != 0): ?>
		<span>
			<a href="<?php
echo parse_url_tag("u:home|"."id=".$this->_var['deal_info']['user_id']."".""); 
?>" class="mf"><?php echo $this->_var['deal_info']['user_name']; ?><?php if ($this->_var['user_info']['user_icon']): ?><img src="<?php echo $this->_var['user_info']['user_icon']; ?>" title="会员等级" class="level_icon" /><?php endif; ?></a>
		</span>
		<span style="color:#dadada">|</span>
		<span class="dz"><?php echo $this->_var['deal_info']['province']; ?>&nbsp;<?php echo $this->_var['deal_info']['city']; ?></span><span style="color:#dadada">|</span>
		<span class="kj"><?php echo $this->_var['deal_info']['deal_type']; ?></span>
		<?php else: ?>
		<span><?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'SITE_NAME',
);
echo $k['name']($k['v']);
?></span>
		<?php endif; ?>
	</div>
	<?php if ($this->_var['deal_info']['type'] != 1): ?>
	<div class="hd2">
		<span class="theme_bgcolor" style="padding:2px 5px;color:#fff">权益总额：</span>  
		<?php if ($this->_var['deal_info']['type'] == 0): ?>
		<span><?php echo $this->_var['deal_info']['item_right_amount']; ?>份</span> 
		<?php else: ?>
		<span><?php echo $this->_var['deal_info']['digital_right_amount']; ?>份</span> 
		<?php endif; ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<span class="theme_bgcolor" style="padding:2px 5px;color:#fff">权益单价：</span> 
		<span><?php echo $this->_var['deal_info']['price_per_right']; ?>元/个</span> 
	</div>
	<div class="hd2">
		<span class="theme_bgcolor" style="padding:2px 5px;color:#fff">权益交易预计开始时间：</span>
		<span><?php echo $this->_var['trade_begin_time']; ?></span> 
	</div>
	<div class="hd2">
		<span class="theme_bgcolor" style="padding:2px 5px;color:#fff">权益交割预计开始时间：</span>
		<span><?php echo $this->_var['delivery_begin_time']; ?></span> 
	</div>
	<?php endif; ?>
	<div class="hd3">
		<div class="hd31 f_l">
			<ul class="clearfix">
				<li <?php if (ACTION_NAME == 'show'): ?>class="select"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:deal#show|"."id=".$this->_var['deal_info']['id']."".""); 
?>">项目主页</a></li>
				<?php if ($this->_var['access'] == 1): ?>
				<li <?php if (ACTION_NAME == 'update' || ACTION_NAME == 'updatedetail'): ?>class="select"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:deal#update|"."id=".$this->_var['deal_info']['id']."".""); 
?>">动态(<?php echo $this->_var['deal_info']['log_count']; ?>)</a></li>
				<?php if ($this->_var['deal_info']['is_support_print'] == 1 && $this->_var['deal_info']['type'] != 1): ?>
				<li <?php if (ACTION_NAME == 'support'): ?>class="select"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:deal#support|"."id=".$this->_var['deal_info']['id']."".""); 
?>">支持者(<?php echo $this->_var['deal_info']['person']; ?>)</a></li>
				<?php endif; ?>
				<li <?php if (ACTION_NAME == 'comment'): ?>class="select"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:deal#comment|"."id=".$this->_var['deal_info']['id']."".""); 
?>">评论(<?php echo $this->_var['comment_count']; ?>)</a></li>		
				<li <?php if (ACTION_NAME == 'activity'): ?>class="select"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:deal#activity|"."id=".$this->_var['deal_info']['id']."".""); 
?>">活动(<?php echo $this->_var['activity_count']; ?>)</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</div>
<script>
$(function(){
	$("#fx_show").on('click',function(e){
		$("#nc").toggle();
		e.stopPropagation();
	});
	$(document).on('click',function() { 
		$("#nc").hide(); 
	}); 
		
});
</script>