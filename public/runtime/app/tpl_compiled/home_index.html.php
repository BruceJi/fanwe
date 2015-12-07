<?php echo $this->fetch('inc/header.html'); ?> 
<script type='text/javascript' src='<?php echo $this->_var['APP_ROOT']; ?>/public/script/ofc/js/swfobject.js'></script>
<style>
	#con_one_1{width:100%;display:block;}
</style>
<script type="text/javascript">
	$(function(){
		var ofc_swf="<?php echo $this->_var['APP_ROOT']; ?>/public/script/ofc/open-flash-chart.swf";
		var invest_stroke_url = '<?php echo $this->_var['invest_stroke_url']; ?>';
		load_ofc("invest_chart",invest_stroke_url,'100%',500,ofc_swf);
	});
    function jump(hrf){
    	location.href = hrf;
    }
</script>
<?php echo $this->fetch('inc/home_user_info.html'); ?>
<div class="dlmain Myhomepage">
    <?php echo $this->fetch('inc/account_left.html'); ?> 
	<div class="homeright pageright f_r">	
		<!-- 半年内的投资记录 开始 -->
		<div>
			<div class="u_m_title_t f_red">您半年内的投资记录</div>
            <div class="blank20"></div>
            <div id="invest_chart"></div>
		</div>
		<!-- 半年内的投资记录 结束 -->
	</div>
    <div class="blank0"></div>
</div>
<?php echo $this->fetch('inc/footer.html'); ?> 