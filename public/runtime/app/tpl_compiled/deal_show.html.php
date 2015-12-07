<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/deal_show.css";
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/fancybox.css";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/jquery.fancybox.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/deal.js";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/deal.js";
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
<!-- 项目背景 开始-->
<div class="deal_body deal_show" <?php if ($this->_var['deal_info']['deal_backgroundColor_image'] != null): ?> style="background:url(<?php echo $this->_var['deal_info']['deal_backgroundColor_image']; ?>) repeat;" <?php endif; ?>>
    <!-- 项目大海报-->
    <div class="deal_banner" <?php if ($this->_var['deal_info']['deal_background_image'] != null): ?>style="background:url(<?php echo $this->_var['deal_info']['deal_background_image']; ?>) top center no-repeat;padding-top:405px;"<?php endif; ?>>
         <div class="blank"></div>
        <!--中间开始-->
        <div class="xqmain">
            <!--中间页面头部start-->
            <?php echo $this->fetch('inc/deal_header.html'); ?>
            <!--中间页面头部end-->    
            <div class="xqmain_main">
                <!--中间页面左边start-->
                <div class="xqmain_left">
                    <div class="xqmain_left_m">
                        <div class="l_hd">
                            <?php if ($this->_var['deal_info']['source_vedio'] == ''): ?>
                            <img src="<?php echo $this->_var['deal_info']['image']; ?>" alt="<?php echo $this->_var['deal_info']['name']; ?>" id="deal_image" />
                            <?php else: ?>
  							<embed wmode="opaque"wmode="opaque"src="<?php echo $this->_var['deal_info']['source_vedio']; ?>" allowFullScreen="true" quality="high" width="760" height="500" align="middle" allowScriptAccess="always" ></embed>				
                            <?php endif; ?>
                            <span>项目介绍：</span>
                        </div>
                        <?php if ($this->_var['access'] == 1): ?>
                        <div class="l_main">
                            <p><?php echo $this->_var['deal_info']['description']; ?></p>
                        </div>
                        <div class="blank"></div>
                        <div class="deal_qa">
                            <?php $_from = $this->_var['deal_info']['deal_faq_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'faq');if (count($_from)):
    foreach ($_from AS $this->_var['faq']):
?>
                            <div class="faq_question" rel="<?php echo $this->_var['faq']['id']; ?>"> - <?php echo $this->_var['faq']['question']; ?></div>
                            <div class="faq_answer" rel="<?php echo $this->_var['faq']['id']; ?>" style="display: none;"><?php echo $this->_var['faq']['answer']; ?></div>
                            <div class="blank10"></div>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </div>
                        <div class="blank"></div>
                        <div class="l_foot">
                            <?php if ($this->_var['deal_info']['tags'] != ''): ?>
                            <div class="l_foot1">
                                <span class="f_l">标签：
                                <?php $_from = $this->_var['deal_info']['tags_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'tag');if (count($_from)):
    foreach ($_from AS $this->_var['tag']):
?>
                                <?php if (trim ( $this->_var['tag'] ) != ''): ?>
                                    <a href="<?php
echo parse_url_tag("u:deals|"."tag=".$this->_var['tag']."&type=0".""); 
?>" title="<?php echo $this->_var['tag']; ?>" target="_blank"><?php echo $this->_var['tag']; ?></a>
                                <?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                </span>
                            </div>
                            <?php endif; ?>
                            <div class="l_foot2 f_l">
                                <span class="lft1 f_l">
                                      如果您对项目有疑问，可以在此向项目发起人咨询
                                </span>
                                <span onclick="send_message(<?php echo $this->_var['deal_info']['user_id']; ?>);" class="f_r">
                                    <a class="ui-small-button theme_bgcolor">对发起人提问</a>
                                </span>
                            </div>
                            
                        </div>
                        <?php else: ?>
                            <?php if ($this->_var['access'] == 0): ?>
                            <div class="prompt_box tc mt20 f16">
                                温馨提示：您需要<a onclick="javascript:show_pop_login();" class="f_red">登录</a>才可以查看项目详细信息！
                            </div>
                            <?php endif; ?>
                            <?php if ($this->_var['access'] == 2): ?>
                            <div class="prompt_box tc mt20 f16 f_red">
                                温馨提示：您的会员等级不够，无法查看项目详细信息！
                            </div>
                            <?php endif; ?>
                            <?php if ($this->_var['access'] == 3): ?>
                            <div class="prompt_box tc mt20 f16">
                                温馨提示：您的手机未认证，马上去<a href='<?php
echo parse_url_tag("u:settings#security|"."method=setting-mobile-box".""); 
?>' class="f_red">认证手机</a>！
                            </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <!--中间页面左边end-->
                <?php echo $this->fetch('inc/deal_right.html'); ?>
                <div class="blank"></div>
            </div>
        </div>
        <!--中间结束-->
        <div class="blank"></div>
    </div>
</div>
<!-- 项目背景 结束-->
<script type="text/javascript">
    var img = document.getElementById("deal_image");
    var temp = new Image();
    temp.onload = function(){
        var style = img.style,
            ratio = Math.min(1,Math.max(0,760)/this.width);
        //设置预览尺寸
        style.width = Math.round( this.width * ratio ) + "px";
        style.height = Math.round( this.height * ratio ) + "px";
    }
    temp.src = img.src;
</script>
<?php echo $this->fetch('inc/footer.html'); ?>