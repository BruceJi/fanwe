
<!--footer static-->
<div class="footer" pbid="footer" id="J_footer">

<!--以下根据调用代码 替换对应信息-->
	<!--	<div class="footer-section2 footer-section-1">
		<div class="zhanlue">
		<h3>战略合作</h3>
				<div class="footer-wrap project-card">
				<div class="ft-links ft-imglinks">
				<div class="g_links g_imglinks">
				<div class="wrapper">
            <ul class="project-card-items">
			
		
                    <li class="project-card-item">
                        <div class="cool flip" onclick="window.location.href='/daohang/25.html'">
                            <div class="front">
                                <div class="front-overlapped-gary"></div>
                                <img src="http://img.zczhijia.com//DaoHangShow/20150504/20150504134455.jpg">
                            </div>
                            <div class="back">
                                <h4 class="f16">天使客</h4>
                                <div class="info f14">创始人：石俊</div>
                                <div class="info f14"></div>
                                <div class="envelop-img"><div class="envelop"></div><img src="http://img.zczhijia.com//DaoHangShow/20150625/20150625172842.png"></div>
                            </div>
                        </div>
                    </li>
					
                    <li class="project-card-item">
                        <div class="cool" onclick="window.location.href='/daohang/63.html'">
                            <div class="front">
                                <div class="front-overlapped-gary"></div>
                                <img src="http://img.zczhijia.com//DaoHangShow/20150929/20150929104138.png">
                            </div>
                            <div class="back">
                                <h4 class="f16">云岸金服</h4>
                                <div class="info f14">创始人：袁俊</div>
                                <div class="info f14"></div>
                                <div class="envelop-img"><div class="envelop"></div><img src="http://img.zczhijia.com//DaoHangShow/20150929/20150929104141.png"></div>
                            </div>
                        </div>
                    </li>
                    <li class="project-card-item">
                        <div class="cool" onclick="window.location.href='/daohang/122.html'">
                            <div class="front">
                                <div class="front-overlapped-gary"></div>
                                <img src="http://img.zczhijia.com//DaoHangShow/20150929/20150929091601.jpg">
                            </div>
                            <div class="back">
                                <h4 class="f16">人人合伙</h4>
                                <div class="info f14">创始人：喻海泉</div>
                                <div class="info f14"></div>
                                <div class="envelop-img"><div class="envelop"></div><img src="http://img.zczhijia.com//DaoHangShow/20150929/20150929091606.jpg"></div>
                            </div>
                        </div>
                    </li>
                    <li class="project-card-item">
                        <div class="cool" onclick="window.location.href='/daohang/97.html'">
                            <div class="front">
                                <div class="front-overlapped-gary"></div>
                                <img src="http://img.zczhijia.com//DaoHangShow/20150819/20150819092753.jpg">
                            </div>
                            <div class="back">
                                <h4 class="f16">汇梦公社</h4>
                                <div class="info f14">创始人：黄天龙</div>
            
                                <div class="envelop-img"><div class="envelop"></div><img src="http://img.zczhijia.com//DaoHangShow/20150819/20150819092758.jpg"></div>
                            </div>
                        </div>
                    </li>
                    <li class="project-card-item">
                        <div class="cool" onclick="window.location.href='/daohang/76.html'">
                            <div class="front">
                                <div class="front-overlapped-gary"></div>
                                <img src="http://img.zczhijia.com//DaoHangShow/20151023/20151023104534.png">
                            </div>
                            <div class="back">
                                <h4 class="f16">京东股权众筹</h4>
                                <div class="info f14">创始人：刘强东</div>
                                <div class="info f14"></div>
                                <div class="envelop-img"><div class="envelop"></div><img src="http://img.zczhijia.com//DaoHangShow/20151023/20151023104539.png"></div>
                            </div>
                        </div>
                    </li>
                    <li class="project-card-item">
                        <div class="cool" onclick="window.location.href='/daohang/82.html'">
                            <div class="front">
                                <div class="front-overlapped-gary"></div>
                                <img src="http://img.zczhijia.com//DaoHangShow/20151023/20151023095429.png">
                            </div>
                            <div class="back">
                                <h4 class="f16">蚂蚁达客</h4>
                                <div class="info f14">创始人：马云</div>
                                <div class="info f14"></div>
                                <div class="envelop-img"><div class="envelop"></div><img src="http://img.zczhijia.com//DaoHangShow/20151023/20151023095433.png"></div>
                            </div>
                        </div>
                    </li>
					</ul>
				</div>	
				</div>
			</div>
			</div>
		
		
	</div>	
	</div>
	<script type="text/javascript" src="../js/common.js"></script>
	-->
	 
	<div class="footer-section3 footer-section-1">
				<div class="footer-wrap ">
				<h4 class="s2">友情链接</h4>
					<div class="ft-links ft-imglinks">
				<div class="g_links g_imglinks"> 
					<div class="g_links_text f_l">
					<?php $_from = $this->_var['g_links']['1']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 't_links');$this->_foreach['t_linkss'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['t_linkss']['total'] > 0):
    foreach ($_from AS $this->_var['k'] => $this->_var['t_links']):
        $this->_foreach['t_linkss']['iteration']++;
?>   
							<!--<?php if ($this->_var['g_links'] [ 1 ] .type != 1): ?> 
							<?php if ($this->_var['t_links']['name']): ?>
							<a href="<?php echo $this->_var['t_links']['url']; ?>" target="_blank"><?php echo $this->_var['t_links']['name']; ?></a>
							<?php endif; ?>
							<?php else: ?>
							<?php endif; ?>-->
							<?php if ($this->_var['t_links']['img']): ?>
							<a href="<?php echo $this->_var['t_links']['url']; ?>" target="_blank" <?php if ($this->_foreach['t_linkss']['iteration'] % 7 == 0): ?> class="last" <?php endif; ?>><img src="<?php echo $this->_var['t_links']['img']; ?>" alt="<?php echo $this->_var['t_links']['name']; ?>" width=160 height=74></a>
 							<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>  
 					</div>		
				</div>
			</div>
			</div>				
	</div>
	
<!--  隐藏之前的老代码
	<?php if ($this->_var['g_links']): ?>
	<div class="footer-section footer-section-1">
		<div class="footer-wrap">
		 	<?php $_from = $this->_var['g_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'links');if (count($_from)):
    foreach ($_from AS $this->_var['links']):
?>
			<div class="ft-links <?php if ($this->_var['links']['type'] == 1): ?>ft-imglinks<?php endif; ?>">
				<div class="g_links <?php if ($this->_var['links']['type'] == 1): ?>g_imglinks<?php endif; ?>">
					<h3><i></i><?php echo $this->_var['links']['name']; ?></h3>
					<div class="g_links_text f_l">
						<?php $_from = $this->_var['links']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'g_links_0_98379500_1449543284');$this->_foreach['g_linkss'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['g_linkss']['total'] > 0):
    foreach ($_from AS $this->_var['k'] => $this->_var['g_links_0_98379500_1449543284']):
        $this->_foreach['g_linkss']['iteration']++;
?>
							<?php if ($this->_var['links']['type'] != 1): ?>
							<?php if ($this->_var['g_links_0_98379500_1449543284']['name']): ?>
							<a href="<?php echo $this->_var['g_links_0_98379500_1449543284']['url']; ?>" target="_blank"><?php echo $this->_var['g_links_0_98379500_1449543284']['name']; ?></a>
							<?php endif; ?>
							<?php else: ?>
							<?php if ($this->_var['g_links_0_98379500_1449543284']['img']): ?>
							<a href="<?php echo $this->_var['g_links_0_98379500_1449543284']['url']; ?>" target="_blank" <?php if ($this->_foreach['g_linkss']['iteration'] % 7 == 0): ?>class="last"<?php endif; ?>><img src="<?php echo $this->_var['g_links_0_98379500_1449543284']['img']; ?>" alt="<?php echo $this->_var['g_links_0_98379500_1449543284']['name']; ?>" width=160 height=74></a>
 							<?php endif; ?>
							<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>  
					</div>		
				</div>
			</div>
			<div class="blank0"></div>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</div>
	</div>
	<div class="blank"></div>
	<?php endif; ?> -->
	
	
	
	
	<div class="footer-section footer-section-2">
		<div class="footer-wrap">
			<!--footer map start-->
			<div class="foot-map">
				<?php $_from = $this->_var['help_cates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help_item');$this->_foreach['help_items'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['help_items']['total'] > 0):
    foreach ($_from AS $this->_var['help_item']):
        $this->_foreach['help_items']['iteration']++;
?>
					<?php if (($this->_foreach['help_items']['iteration'] - 1) < 6): ?>
						<dl <?php if (($this->_foreach['help_items']['iteration'] == $this->_foreach['help_items']['total'])): ?>class="last"<?php endif; ?>>
							<dt><?php echo $this->_var['help_item']['title']; ?></dt>
							<?php $_from = $this->_var['help_item']['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article_list');if (count($_from)):
    foreach ($_from AS $this->_var['article_list']):
?>
							<dd><a href="<?php echo $this->_var['article_list']['url']; ?>" ><?php echo $this->_var['article_list']['title']; ?></a></dd>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						</dl>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>
			<!--foot map end-->
			<div class="foot-contact">
				<h3>在线客服</h3>
				<div class="text">
					<div class="text_show">
						<div class="iphone"><?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'KF_PHONE',
);
echo $k['name']($k['v']);
?></div>
						<div><?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'WORK_TIME',
);
echo $k['name']($k['v']);
?></div>
					</div>
					<i></i>
				</div>
			</div>
		</div>
	</div>
	<div class="blank"></div>
	<div class="footer-section">
		<div class="footer-wrap">
			<div class="blank0"></div>
			<div class="copy_text">
				<div class="mb15">
				<?php $_from = $this->_var['helps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help');$this->_foreach['helpss'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['helpss']['total'] > 0):
    foreach ($_from AS $this->_var['help']):
        $this->_foreach['helpss']['iteration']++;
?>
					<a href="<?php echo $this->_var['help']['url']; ?>" title="<?php echo $this->_var['help']['title']; ?>"><?php echo $this->_var['help']['title']; ?></a><?php if (! ($this->_foreach['helpss']['iteration'] == $this->_foreach['helpss']['total'])): ?><span>&nbsp;&nbsp;|&nbsp;&nbsp;</span><?php endif; ?>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</div>
				<div><?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'SITE_LICENSE',
);
echo $k['name']($k['v']);
?>&nbsp;<?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'STATE_CDOE',
);
echo $k['name']($k['v']);
?></div>
				<div><?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'NETWORK_FOR_RECORD',
);
echo $k['name']($k['v']);
?></div>
			</div>	
		</div>
	</div>
</div>
<div></div>
<div class="sidebar" id="sidebar">
	<ul>
		<?php if (app_conf ( 'QR_CODE' ) || $this->_var['app']['web_url']): ?>
		<li class="ewm_box">
			<a href="javascript:void(0);" class="ui-sidebar-block app">
				<div class="sidebox_ewm_hide">
					<img src="<?php if (app_conf ( 'QR_CODE' )): ?><?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'QR_CODE',
);
echo $k['name']($k['v']);
?><?php else: ?><?php echo $this->_var['app']['web_url']; ?><?php endif; ?>" width=110 height=110>
				</div>
			</a>
		</li>
		<?php endif; ?>
		<?php if (app_conf ( 'KF_QQ' )): ?>
		<li>
			<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'KF_QQ',
);
echo $k['name']($k['v']);
?>&site=qq&menu=yes" target="_blank" class="ui-sidebar-block service"></a>
		</li>
		<?php endif; ?>
		<?php if (app_conf ( 'KF_PHONE' )): ?>
		<li>
			<a href="javascript:void(0);">
				<div class="sidebox"><img src="<?php echo $this->_var['TMPL']; ?>/images/sidebar_img/phone.png"><?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'KF_PHONE',
);
echo $k['name']($k['v']);
?></div>
			</a>
		</li>
		<?php endif; ?>
		<li class="link_box" id="link_box">
			<a href="javascript:void(0);" class="ui-sidebar-block feedback">
				<div class="sidebox_link_hide muxfb_global_tip" id="sidebox_link_hide">
					您可以通过点击&nbsp;&nbsp;<i class="icon iconfont">&#xe603;</i>
					<div class="blank10"></div>
					<div style="lh20">对我们产品的体验、功能、系统错误等提出反馈，以帮助 我们改善产品体验，为您提供更好的服务！</div>
				</div>
			</a>
		</li>
		<li>
			<a href="javascript:goTop();" class="ui-sidebar-block backtop"></a>
		</li>
	</ul>
</div>
<div class="muxfb_dialog" id="muxfb_dialog">
	<div class="muxfb_dialog_panel">
		<i class="muxfb_dialog_close icon iconfont" id="muxfb_dialog_close">&#xe604;</i>
		<div class="muxfb_dialog_content">
			<div class="muxfb_left_tab_wrap">
                <div class="muxfb_left_logo">
                    <i class="muxfb_left_logo icon iconfont">&#xe605;</i>
                    <span class="title">用户反馈留言</span>
                </div>
            </div>
			<form class="user_message_ajax" name="user_message_ajax"  action="<?php
echo parse_url_tag("u:user_message#save_info|"."".""); 
?>">
            <div class="muxfb_right_content muxfb_form" id="muxfb_form">
            	<h1 class="muxfb_form_title">用户反馈收集</h1>
            	<div class="form_row control-group">
					<label class="form_lable" style="height:37px;line-height:37px">您要反馈的问题类型:</label>
					<select name="cate_id" class="ui-select field_select small">
						<?php $_from = $this->_var['message_cate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cate');if (count($_from)):
    foreach ($_from AS $this->_var['cate']):
?>
	              		<option value="<?php echo $this->_var['cate']['id']; ?>" selected="selected"><?php echo $this->_var['cate']['cate_name']; ?></option>
	              		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</select>
					<div class="blank0"></div>
				</div>
            	<div class="form_row control-group">
					<label class="form_lable small_form_lable">您的姓名:</label>
					<div class="pr f_l">
						<input type="text" name="user_name" id="user_name" value="<?php echo $this->_var['user_info']['user_name']; ?>" class="small_textbox" />
						<span class="holder_tip">请输入您的姓名</span>
					</div>
					<div class="blank0"></div>
					<div class="muxfb_tip user_name_tip  f_red">*姓名不能为空！</div>
					<div class="blank0"></div>
				</div>
				<div class="form_row control-group">
					<label class="form_lable small_form_lable">您的手机:</label>
					<div class="pr f_l">
						<input type="text" name="tel" id="tel" value="<?php echo $this->_var['user_info']['mobile']; ?>" class="small_textbox" />
						<span class="holder_tip">请输入您的手机号</span>
					</div>
					<div class="blank0"></div>
					<div class="muxfb_tip tel_tip f_red">*手机号不能为空！</div>
					<div class="blank0"></div>
				</div>
				<div class="blank0"></div>
				<div>请您输入需要反馈的信息:</div>
				<textarea placeholder="您的反馈对我们很重要" name="content" class="textareabox"></textarea>
				<span class="muxfb_tip content_tip f_red">*请输入您的内容</span>
				<div class="blank20"></div>
				<input type="button" value="提交" class="ui-button theme_bgcolor" />
				<input type="hidden" name="user_id" value="<?php echo $this->_var['user_info']['id']; ?>">
				<input type="hidden" name="ajax" value="1">
            </div>
		</form>	
		</div>
		<div class="blank0"></div>
	</div>
	<div class="muxfb_dialog_mask"></div>
</div>
<script type="text/javascript">
	$(function(){
		resetWindowBox();
		sidebarFun();
		bind_ajax_form_custom_footer(".user_message_ajax");
	});

	// 悬浮客服
	function sidebarFun(){
		$("#sidebar ul li").hover(function(){
			$(this).find(".sidebox").stop().animate({"width":"150px"},200).css("background","#a5a5a5")
		},function(){
			$(this).find(".sidebox").stop().animate({"width":"40px"},200).css("background","#939393")	
		});
		var lastRmenuStatus=false;
		$(window).scroll(function(){
			var _top=$(window).scrollTop();
			if(_top>300){
				$("#sidebar").data("expanded",true);
			}else{
				$("#sidebar").data("expanded",false);
			}
			if($("#sidebar").data("expanded")!=lastRmenuStatus){
				lastRmenuStatus=$("#sidebar").data("expanded");
				if(lastRmenuStatus){
					$("#sidebar .backtop").animate({"height":"40px"},200);
				}else{
					$("#sidebar .backtop").animate({"height":"0"},200);
				}
			}
		});
		// 用户留言
		var $muxfb_dialog=$("#muxfb_dialog");
		var $muxfb_dialog_panel=$muxfb_dialog.find(".muxfb_dialog_panel");
		$muxfb_dialog.find("#muxfb_dialog_close").on('click',function(){
			$muxfb_dialog.fadeOut(300);
			$muxfb_dialog_panel.animate({'right':'-532px'},100);
		});
		$("#link_box").on('click',function(){
			$muxfb_dialog.fadeIn(300);
			$muxfb_dialog_panel.animate({'right':0},100);
		});
	}

	//回到顶部
	function goTop(){
		$('html,body').animate({'scrollTop':0},100);
	}
	function bind_ajax_form_custom_footer(str)
	{
		$(str).find(".ui-button").bind("click",function(){
			var $muxfb_form=$("#muxfb_form");
			var $muxfb_form_user_name=$("#muxfb_form").find("input[name='user_name']");
			var $muxfb_form_tel=$("#muxfb_form").find("input[name='tel']");
			var $muxfb_form_content=$("#muxfb_form").find("textarea[name='content']");
			$muxfb_form.find(".muxfb_tip").hide();
			if($.trim($muxfb_form_user_name.val())==''){
				$muxfb_form.find(".user_name_tip").show();
				$muxfb_form_user_name.focus();
				return false;
			}
			if($.trim($muxfb_form_tel.val())==''){
				$muxfb_form.find(".tel_tip").show();
				$muxfb_form_tel.focus();
				return false;
			}
			if($.trim($muxfb_form_content.val())==''){
				$muxfb_form.find(".content_tip").show();
				$muxfb_form_content.focus();
				return false;
			}
			$(str).submit();
		});
		$(str).bind("submit",function(){
			var ajaxurl = $(this).attr("action");
			var query = $(this).serialize() ;
			$.ajax({ 
				url: ajaxurl,
				dataType: "json",
				data:query,
				type: "POST",
				success: function(ajaxobj){
					if(ajaxobj.status==1)
					{
						location.href = ajaxobj.jump;
					}
					else
					{ 
						$("."+ajaxobj.info+"_tip").show();		
					}
				},
				error:function(ajaxobj)
				{
					if(ajaxobj.responseText!='')
					alert(ajaxobj.responseText);
				}
			});
			return false;
		});
	}
</script>
</body>
</html>