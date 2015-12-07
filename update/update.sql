1.62;

CREATE TABLE `%DB_PREFIX%weixin_conf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `group_id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '配置输入的类型 0:文本输入 1:下拉框输入 2:图片上传 3:编辑器',
  `value_scope` text NOT NULL COMMENT '取值范围',
  `is_require` tinyint(1) NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `is_conf` tinyint(1) NOT NULL COMMENT '是否可配置 0: 可配置  1:不可配置',
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COMMENT='//微信配置选项';


INSERT INTO `%DB_PREFIX%weixin_conf` VALUES ('1', '第三方平台appid', 'platform_appid', 'appid', '0', '0', '', '0', '1', '1', '1');
INSERT INTO `%DB_PREFIX%weixin_conf` VALUES ('2', '第三方平台token', 'platform_token', 'token', '0', '0', '', '0', '1', '1', '2');
INSERT INTO `%DB_PREFIX%weixin_conf` VALUES ('3', '第三方平台symmetric_key', 'platform_encodingAesKey', 'symmetric_key', '0', '0', '', '0', '1', '1', '3');
INSERT INTO `%DB_PREFIX%weixin_conf` VALUES ('4', '是否开启第三方平台', 'platform_status', '0', '0', '4', '0,1', '0', '1', '1', '4');
INSERT INTO `%DB_PREFIX%weixin_conf` VALUES ('5', '第三方平台AppSecret', 'platform_appsecret', '0', '0', '0', '', '0', '1', '1', '1');

INSERT INTO `%DB_PREFIX%weixin_conf` VALUES ('6', 'component_verify_ticket', 'platform_component_verify_ticket', '0', '0', '0', '', '0', '1', '0', '6');
INSERT INTO `%DB_PREFIX%weixin_conf` VALUES ('7', '第三方平台access_token', 'platform_component_access_token', '0', '0', '0', '', '0', '1', '0', '7');
INSERT INTO `%DB_PREFIX%weixin_conf` VALUES ('8', '第三方平台预授权码', 'platform_pre_auth_code', '0', '0', '0', '', '0', '1', '0', '8');

INSERT INTO `%DB_PREFIX%weixin_conf` VALUES ('9', '第三方平台access_token有效期', 'platform_component_access_token_expire', '0', '0', '0', '', '0', '1', '0', '9');
INSERT INTO `%DB_PREFIX%weixin_conf` VALUES ('10', '第三方平台预授权码有效期', 'platform_pre_auth_code_expire', '0', '0', '0', '', '0', '1', '0', '10');

CREATE TABLE `%DB_PREFIX%weixin_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appid` varchar(255) NOT NULL COMMENT 'AppID(应用ID)-第三方平台指 授权方appid',
  `appsecret` varchar(255) NOT NULL COMMENT 'AppSecret(应用密钥)-第三方平台无用',
  `app_url` varchar(255) NOT NULL COMMENT 'URL(服务器地址)-第三方平台无用',
  `app_token` varchar(255) NOT NULL COMMENT 'Token(令牌)-第三方平台无用',
  `app_encodingAESKey` varchar(255) NOT NULL COMMENT 'EncodingAESKey(消息加解密密钥)-第三方平台无用',
  `authorizer_appid` varchar(255) NOT NULL COMMENT '授权方appid',
  `authorizer_access_token` varchar(255) NOT NULL COMMENT '授权方令牌-第三方平台无用',
  `expires_in` int(11) NOT NULL COMMENT '授权方令牌 有效时间-第三方平台无用',
  `authorizer_refresh_token` varchar(255) NOT NULL COMMENT '刷新令牌-第三方平台',
  `func_info` text NOT NULL COMMENT '公众号授权给开发者的权限集列表',
  `verify_type_info` tinyint(1) NOT NULL COMMENT '授权方认证类型，-1代表未认证，0代表微信认证，1代表新浪微博认证，2代表腾讯微博认证，3代表已资质认证通过但还未通过名称认证，4代表已资质认证通过、还未通过名称认证，但通过了新浪微博认证，5代表已资质认证通过、还未通过名称认证，但通过了腾讯微博认证',
  `service_type_info` tinyint(1) NOT NULL COMMENT '授权方公众号类型，0代表订阅号，1代表由历史老帐号升级后的订阅号，2代表服务号',
  `nick_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL COMMENT '授权方公众号的原始ID',
  `authorizer_info` varchar(255) NOT NULL COMMENT '授权方昵称',
  `head_img` varchar(255) NOT NULL COMMENT '授权方头像',
  `alias` varchar(255) NOT NULL COMMENT '授权方公众号所设置的微信号，可能为空',
  `qrcode_url` varchar(255) NOT NULL COMMENT '二维码图片的URL，开发者最好自行也进行保存',
  `location_report` tinyint(1) NOT NULL COMMENT '地理位置上报选项 0 无上报 1 进入会话时上报 2 每5s上报',
  `voice_recognize` tinyint(1) NOT NULL COMMENT '语音识别开关选项 0 关闭语音识别 1 开启语音识别',
  `customer_service` tinyint(1) NOT NULL COMMENT '客服开关选项 0 关闭多客服 1 开启多客服',
  `is_authorized` tinyint(1) NOT NULL DEFAULT '0' COMMENT '授权方是否取消授权 0表示取消授权 1表示授权',
  `user_id` int(11) NOT NULL COMMENT '会员ID ，诺type为1，user_id 为空',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 表示前台会员 1 表示后台管理员',
  `industry_1` int(11) NOT NULL,
  `industry_1_status` tinyint(1) NOT NULL,
  `industry_2` int(11) NOT NULL,
  `industry_2_status` tinyint(1) NOT NULL,
  `test_user` varchar(255) DEFAULT NULL COMMENT '测试微信号',
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `au_app_id` (`authorizer_appid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='//微信公众号列表';


CREATE TABLE `%DB_PREFIX%weixin_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '' COMMENT '菜单名称',
  `sort` int(11) DEFAULT '0' COMMENT '菜单排序 大->小',
  `key_or_url` varchar(255) DEFAULT '' COMMENT '用于推送到微信平台的key或url(所有以http://开头的表示url，其余一率为key)',
  `event_type` enum('click') DEFAULT 'click' COMMENT '按钮的事件，目前微信只支持click',
  `account_id` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0' COMMENT '是否已推送到微信(0:未推送或失败 1:成功)，该列同一个商家全部相同，菜单为一次性推送,对菜单本地修改时，批量更新该值为0',
  `u_id` int(11) DEFAULT NULL,
  `u_module` varchar(255) DEFAULT NULL,
  `u_action` varchar(255) DEFAULT NULL,
  `u_param` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sort` (`sort`) ,
  KEY `event_type` (`event_type`) ,
  KEY `account_id` (`account_id`,`key_or_url`) 
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='为微信自定义的菜单设置';


CREATE TABLE `%DB_PREFIX%weixin_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `i_msg_type` enum('event','link','location','image','text') DEFAULT 'text' COMMENT '接收到的微信的推送到本系统api中的MsgType',
  `o_msg_type` enum('news','music','text') DEFAULT 'text' COMMENT '用于响应并回复给微信推送的消息类型 news:图文 music:音乐 text:纯文本',
  `keywords` varchar(300) DEFAULT NULL COMMENT '用于响应文本(i_msg_type:text或者i_event:click时对key的响应)类型的回复时进行匹配的关键词',
  `keywords_match` text COMMENT 'keywords的全文索引列',
  `keywords_match_row` text COMMENT 'keywords全文索引的未作unicode编码的原文，用于开发者查看',
  `address` text COMMENT '用于显示的地理地址',
  `api_address` text COMMENT '用于地理定位的API地址',
  `x_point` varchar(100) DEFAULT '' COMMENT '用于lbs消息,i_msg_type:location 匹配的经度',
  `y_point` varchar(100) DEFAULT '' COMMENT '用于lbs消息,i_msg_type:location 匹配的纬度',
  `scale_meter` int(11) DEFAULT '0' COMMENT '用于lbs消息,i_msg_type:location 匹配的距离范围(米)',
  `i_event` enum('subscribe','unsubscribe','click','empty') DEFAULT 'empty' COMMENT '用于响应i_msg_type为event时的对应事件',
  `reply_content` text COMMENT '回复的文本消息',
  `reply_music` varchar(255) DEFAULT '' COMMENT '回复的音乐链接',
  `reply_news_title` text COMMENT '图文回复的标题',
  `reply_news_description` text COMMENT '图文回复的描述',
  `reply_news_picurl` varchar(255) DEFAULT '' COMMENT '图文回复的图片链接',
  `reply_news_url` varchar(255) DEFAULT '' COMMENT '图文回复的跳转链接',
  `reply_news_content` text,
  `type` tinyint(1) DEFAULT '0' COMMENT '回复归类 \r\n0:普通的回复 \r\n1:默认回复(只能一条文本或图文) \r\n2:官网回复(只能有一条图文)\r\n3.业务数据(图文)\r\n4.关注时回复(只能有一条文本或图文) \r\n5.取消关注时回复(只能有一条文本或图文) ',
  `relate_data` varchar(255) DEFAULT '' COMMENT '关联的业务数据源(如youhui,vote)等',
  `relate_id` int(11) DEFAULT '0' COMMENT '所关联的relate_data的id，用于判断数据关联的删除(指定url)',
  `account_id` int(11) DEFAULT '0' COMMENT '所属的商家ID',
  `default_close` tinyint(1) DEFAULT '1' COMMENT '默认回复是否关闭 0：关闭 1：开启',
  `relate_type` tinyint(1) DEFAULT NULL COMMENT '与关联数据的关系 0:回复数据由关联数据源获取 1:只url跳转数据来源于关联数据',
  `match_type` tinyint(1) NOT NULL DEFAULT '0',
  `u_id` int(11) DEFAULT NULL,
  `u_module` varchar(255) DEFAULT NULL,
  `u_action` varchar(255) DEFAULT NULL,
  `u_param` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `i_msg_type` (`i_msg_type`) ,
  KEY `o_msg_type` (`o_msg_type`) ,
  KEY `i_event` (`i_event`) ,
  KEY `type` (`type`) ,
  KEY `relate_data` (`relate_data`) ,
  KEY `relate_id` (`relate_id`) ,
  KEY `account_id` (`account_id`) ,
  KEY `match_type` (`account_id`,`match_type`,`keywords`) ,
  FULLTEXT KEY `keywords_match` (`keywords_match`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='商家回复设置表';



CREATE TABLE `%DB_PREFIX%weixin_reply_relate` (
  `main_reply_id` int(11) DEFAULT '0' COMMENT '主回复ID',
  `relate_reply_id` int(11) DEFAULT '0' COMMENT '关联的多图文用的子回复ID',
  `sort` tinyint(1) DEFAULT '0',
  KEY `main_reply_id` (`main_reply_id`) ,
  KEY `relate_reply_id` (`relate_reply_id`) 
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='多图文回复的关联配置';




CREATE TABLE `%DB_PREFIX%weixin_tmpl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '' COMMENT '菜单名称',
  `sort` int(11) DEFAULT '0' COMMENT '菜单排序 大->小',
  `account_id` int(11) DEFAULT '0' COMMENT '所属的商家ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='微信模板';


-- ----------------------------
-- Table structure for `%DB_PREFIX%weixin_tmpl`
-- ----------------------------
 CREATE TABLE `%DB_PREFIX%weixin_tmpl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '' COMMENT '模板名称',
  `msg` text COMMENT '模板内容',
  `template_id` varchar(255) DEFAULT NULL COMMENT '模板ID',
  `template_id_short` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT '0' COMMENT '菜单排序 大->小',
  `account_id` int(11) DEFAULT '0' COMMENT '所属的商家ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='微信模板';

-- ----------------------------
-- Records of %DB_PREFIX%weixin_tmpl
-- ----------------------------
CREATE TABLE `%DB_PREFIX%weixin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '会员ID',
  `account_id` int(11) NOT NULL,
  `subscribe` tinyint(1) NOT NULL COMMENT '用户是否订阅该公众号标识，值为0时，代表此用户没有关注该公众号，拉取不到其余信息。',
  `openid` varchar(255) NOT NULL COMMENT '用户的标识，对当前公众号唯一',
  `nickname` varchar(255) NOT NULL,
  `sex` tinyint(1) NOT NULL COMMENT '用户的性别，值为1时是男性，值为2时是女性，值为0时是未知',
  `city` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `language` varchar(20) DEFAULT NULL,
  `headimgurl` varchar(255) DEFAULT NULL,
  `subscribe_time` varchar(255) DEFAULT NULL COMMENT '用户关注时间，为时间戳。如果用户曾多次关注，则取最后关注时间',
  `unionid` varchar(255) DEFAULT NULL COMMENT '只有在用户将公众号绑定到微信开放平台帐号后，才会出现该字段。',
  `remark` varchar(255) DEFAULT NULL COMMENT '公众号运营者对粉丝的备注，公众号运营者可在微信公众平台用户管理界面对粉丝添加备注',
  `groupid` int(11) DEFAULT NULL COMMENT '用户所在的分组ID',
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=733 DEFAULT CHARSET=utf8 COMMENT='//微信公众号会员列表';


CREATE TABLE `%DB_PREFIX%weixin_group` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `groupid` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(60) NOT NULL DEFAULT '',
  `intro` varchar(200) NOT NULL DEFAULT '',
  `account_id` varchar(30) NOT NULL DEFAULT '',
  `fanscount` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `groupid` (`groupid`,`account_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;


CREATE TABLE `%DB_PREFIX%weixin_send` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `author` varchar(100) NOT NULL COMMENT '作者件',
  `media_file` varchar(255) NOT NULL COMMENT '多媒体文件',
  `content` text NOT NULL COMMENT '图文消息页面的内容，支持HTML标签',
  `send_type` tinyint(4) NOT NULL COMMENT '0普通群发，1高级群发',
  `user_type` tinyint(4) NOT NULL COMMENT '发送对 0所有 1会员组 2会员等级',
  `user_type_id` int(11) NOT NULL COMMENT '组ID或者等级ID',
  `msgtype` enum('news','music','video','voice','image','text') NOT NULL COMMENT '消息类型',
  `relate_type` tinyint(4) NOT NULL COMMENT '与关联数据的关系 0:回复数据由关联数据源获取 1:只url跳转数据来源于关联数据',
  `relate_data` varchar(255) NOT NULL,
  `relate_id` int(255) NOT NULL,
  `url` varchar(255) NOT NULL COMMENT '连接地址',
  `digest` text NOT NULL COMMENT '简介',
  `account_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `create_time` int(11) NOT NULL,
  `send_time` int(11) NOT NULL COMMENT '推送时间',
  `media_id` varchar(255) NOT NULL COMMENT '微信服务器的关联多媒体ID',
  `u_id` int(11) NOT NULL,
  `u_module` varchar(255) NOT NULL,
  `u_action` varchar(255) NOT NULL,
  `u_param` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;



CREATE TABLE `%DB_PREFIX%weixin_api_get_record` (
  `openid` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`openid`),
  KEY `account_id` (`account_id`) USING BTREE,
  KEY `idx_0` (`account_id`,`create_time`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='请求的用户记录';

CREATE TABLE `%DB_PREFIX%weixin_send_relate` (
  `relate_id` int(11) NOT NULL,
  `send_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `%DB_PREFIX%money_freeze`
-- ----------------------------
CREATE TABLE `%DB_PREFIX%money_freeze` (
  `id` int(10) NOT NULL auto_increment,
  `requestNo` int(10) NOT NULL default '0' COMMENT '请求流水号',
  `platformUserNo` int(11) NOT NULL default '0' COMMENT '平台会员编号',
  `platformNo` varchar(20) NOT NULL COMMENT '商户编号',
  `amount` decimal(20,2) NOT NULL default '0.00' COMMENT '冻结金额',
  `expired` datetime NOT NULL default '0000-00-00 00:00:00' COMMENT '到期自劢解冻时间',
  `is_callback` tinyint(1) NOT NULL default '0',
  `code` varchar(50) default NULL COMMENT '返回码;1 成功 0 失败 2 xml参数格式错误 3 签名验证失败 101 引用了不存在的对象（例如错误的订单号） 102 业务状态不正确 103 由于业务限制导致业务不能执行 104 实名认证失败',
  `description` varchar(255) default NULL COMMENT '描述信息',
  `deal_id` int(10) NOT NULL COMMENT '项目id',
  `pay_type` tinyint(1) default '0' COMMENT '0 表示第三方托管 1表示第三方支付',
  `status` tinyint(1) NOT NULL default '0' COMMENT '1表示冻结诚意金，2表示解冻诚意金,3表示申请解冻',
  `create_time` int(11) default NULL COMMENT '冻结时间',
  PRIMARY KEY  (`id`,`requestNo`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of %DB_PREFIX%money_freeze
-- ----------------------------

INSERT INTO `%DB_PREFIX%conf` VALUES ('289', 'MORTGAGE_MONEY_UNFREEZE', '12', '6', '0', '', '1', '1', '500');

ALTER TABLE `%DB_PREFIX%yeepay_recharge`
ADD COLUMN `create_time`  int(11) NULL ;

ALTER TABLE `%DB_PREFIX%yeepay_recharge`
ADD COLUMN `fee`  decimal(20,2) NOT NULL DEFAULT 0 COMMENT '手续费' ;


ALTER TABLE `%DB_PREFIX%yeepay_withdraw`
ADD COLUMN `create_time`  int(11) NULL ;


ALTER TABLE `%DB_PREFIX%yeepay_withdraw`
ADD COLUMN `fee`  decimal(20,2) NULL COMMENT '手续费';


ALTER TABLE `%DB_PREFIX%yeepay_cp_transaction`
ADD COLUMN `create_time`  int(11) NULL;

ALTER TABLE `%DB_PREFIX%yeepay_cp_transaction`
ADD COLUMN `update_time`  int(11) NULL COMMENT '易宝处理时间' ;

ALTER TABLE `%DB_PREFIX%yeepay_register`
ADD COLUMN `create_time`  int(11) NULL ;




ALTER TABLE `%DB_PREFIX%deal_pay_log`
MODIFY COLUMN `money`  decimal(20,2) NOT NULL,
ADD COLUMN `comissions`  decimal(20,2) NOT NULL DEFAULT 0 COMMENT '佣金' ;


ALTER TABLE `%DB_PREFIX%deal_order`
ADD COLUMN `requestNo`  varchar(255) NOT NULL COMMENT 'yeepay_log.id';

ALTER TABLE `%DB_PREFIX%deal_order`
ADD COLUMN `is_complete_transaction`  tinyint(1) NOT NULL COMMENT '0 表示未放款 1表示放款  2表示退款';

ALTER TABLE `%DB_PREFIX%deal_order`
MODIFY COLUMN `share_fee`  decimal(20,2) NOT NULL COMMENT '分红金额' ,
ADD COLUMN `fee`  decimal(20,2) NOT NULL COMMENT '手续费';

ALTER TABLE `%DB_PREFIX%yeepay_cp_transaction`
MODIFY COLUMN `tenderAmount`  decimal(20,2) NULL DEFAULT 0 COMMENT '项目金额'  ,
MODIFY COLUMN `paymentAmount`  decimal(20,2) NOT NULL DEFAULT 0.00 COMMENT '实际支付金额' ,
MODIFY COLUMN `fee`  decimal(20,2) NULL DEFAULT 0 COMMENT '手续费' ,
ADD COLUMN `share_fee`  decimal(20,2) NULL DEFAULT 0 COMMENT '分红'  ,
ADD COLUMN `delivery_fee`  decimal(20,2) NULL COMMENT '快递费用' ,
ADD COLUMN `targetAmount`  decimal(20,2) NULL COMMENT '用户实际收到金额'  ;

ALTER TABLE `%DB_PREFIX%deal_order`
ADD COLUMN `targetAmount`  decimal(20,2) NOT NULL COMMENT '获取的目标金额';

ALTER TABLE `%DB_PREFIX%yeepay_cp_transaction`
ADD COLUMN `tenderId`  int(11) NOT NULL AFTER `targetAmount`;

ALTER TABLE `%DB_PREFIX%deal_pay_log`
ADD COLUMN `share_fee`  decimal(20,2) NOT NULL,
ADD COLUMN `delivery_fee`  decimal(20,2) NOT NULL;

ALTER TABLE `%DB_PREFIX%deal_pay_log`
ADD COLUMN `requestNo`  varchar(255) NOT NULL COMMENT '是第三方支付的请求号' ;

ALTER TABLE `%DB_PREFIX%deal_pay_log`
ADD UNIQUE INDEX `no` (`requestNo`) USING BTREE ;

ALTER TABLE `%DB_PREFIX%deal_order`
ADD COLUMN `progress`  tinyint(1) NOT NULL DEFAULT '0' COMMENT '项目进度 0 表示未支付 2表示已支付定金 3表示支付首付 4表示退款处理 5放款处理' ;



CREATE TABLE `%DB_PREFIX%money_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '分类名称',
  `type` int(11) NOT NULL DEFAULT '0' COMMENT 'type类型 0 ~ ？',
  `class` varchar(100) NOT NULL DEFAULT '' COMMENT '所属分类 money  lock_money site_money  point  score',
  `sort` int(11) NOT NULL DEFAULT '0',
  `is_effect` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO `%DB_PREFIX%money_type` VALUES ('1', '普通的', '0', 'money', '0', '1');
INSERT INTO `%DB_PREFIX%money_type` VALUES ('2', '加入诚意金', '1', 'money', '0', '1');
INSERT INTO `%DB_PREFIX%money_type` VALUES ('3', '违约扣除诚意金', '2', 'money', '0', '1');
INSERT INTO `%DB_PREFIX%money_type` VALUES ('4', '分红', '3', 'money', '0', '1');
INSERT INTO `%DB_PREFIX%money_type` VALUES ('5', '订金', '4', 'money', '0', '1');
INSERT INTO `%DB_PREFIX%money_type` VALUES ('6', '首付', '5', 'money', '0', '1');
INSERT INTO `%DB_PREFIX%money_type` VALUES ('7', '众筹买房', '6', 'money', '0', '1');
INSERT INTO `%DB_PREFIX%money_type` VALUES ('8', '买房卖出回报', '7', 'money', '0', '1');
INSERT INTO `%DB_PREFIX%money_type` VALUES ('9', '理财赎回本金', '8', 'money', '0', '1');
INSERT INTO `%DB_PREFIX%money_type` VALUES ('10', '理财赎回收益', '9', 'money', '0', '1');
INSERT INTO `%DB_PREFIX%money_type` VALUES ('11', '理财赎回手续费', '10', 'money', '0', '1');
INSERT INTO `%DB_PREFIX%money_type` VALUES ('12', '理财本金', '11', 'money', '0', '1');
INSERT INTO `%DB_PREFIX%money_type` VALUES ('13', '理财购买手续费', '12', 'money', '0', '1');
INSERT INTO `%DB_PREFIX%money_type` VALUES ('14', '理财冻结资金', '13', 'money', '0', '1');
INSERT INTO `%DB_PREFIX%money_type` VALUES ('15', '理财服务费', '14', 'money', '0', '1');
INSERT INTO `%DB_PREFIX%money_type` VALUES ('16', '理财发放资金', '15', 'money', '0', '1');

CREATE TABLE `%DB_PREFIX%licai` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '产品名称',
  `licai_sn` varchar(50) NOT NULL COMMENT '编号',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '发起人【发起机构】',
  `img` varchar(255) NOT NULL COMMENT '项目图片',
  `is_recommend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否推荐',
  `re_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0元;1新品上架;2当月畅销;3:本周畅销;4:限时抢购;',
  `begin_buy_date` date NOT NULL COMMENT '购买开始时间',
  `end_buy_date` date NOT NULL COMMENT '购买结束时间',
  `end_date` date NOT NULL COMMENT '项目结束时间',
  `min_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '起购金额',
  `max_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '单笔最大购买限额',
  `begin_interest_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '【0:当日生效，1:次日生效，2:下个工作日生效,3下二个工作日】',
  `product_size` varchar(255) DEFAULT NULL COMMENT '产品规模',
  `risk_rank` tinyint(1) NOT NULL DEFAULT '0' COMMENT '风险等级（2高、1中、0低）',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1有效、0无效',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '理财类型（0余额宝、1固定定存、2浮动定存;3票据、4基金）',
  `description` text NOT NULL COMMENT '理财详情',
  `purchasing_time` varchar(255) DEFAULT NULL COMMENT '赎回到账时间描述',
  `rule_info` text COMMENT '规则',
  `is_trusteeship` tinyint(1) DEFAULT NULL COMMENT '是否托管 0是 1否',
  `average_income_rate` decimal(8,4) NOT NULL DEFAULT '0.0000' COMMENT 'type=0七日平均(年)收益率;type=1近三个月收益率【动态计算】',
  `per_million_revenue` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '每万元收益【动态计算】',
  `subscribing_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '累计成交总额',
  `redeming_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '累计被赎回',
  `is_deposit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否托管;1:托管;0:非托管',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `brief` varchar(255) DEFAULT NULL COMMENT '简介',
  `net_value` decimal(10,2) DEFAULT '0.00' COMMENT '最新净值',
  `fund_key` varchar(50) DEFAULT NULL COMMENT '关连的基金编号',
  `fund_type_id` int(10) NOT NULL DEFAULT '0' COMMENT '基金种类',
  `fund_brand_id` int(10) NOT NULL DEFAULT '0' COMMENT '基金品牌',
  `bank_id` int(10) NOT NULL DEFAULT '0' COMMENT '银行',
  `begin_interest_date` date DEFAULT NULL COMMENT '起息时间',
  `time_limit` int(10) DEFAULT NULL COMMENT '理财期限',
  `review_type` tinyint(1) DEFAULT NULL COMMENT '赎回到账方式: 0,发起人审核   1,网站和发起人审核 2，自动审核',
  `total_people` int(10) DEFAULT NULL COMMENT '参与人数',
  `service_fee_rate` decimal(10,4) DEFAULT NULL COMMENT '成交服务费',
  `licai_status` tinyint(1) DEFAULT NULL COMMENT '理财状态 0：预热期 1：理财期 2：提前结束 3已到期',
  `send_type` tinyint(1) DEFAULT NULL COMMENT '发放款项类型  0：自动  1：手动',
  `is_send` tinyint(1) DEFAULT NULL COMMENT '是否发放 0：否 1：是',
  `investment_adviser` varchar(255) DEFAULT NULL,
  `profit_way` varchar(255) DEFAULT NULL COMMENT '获取收益方式',
  `scope` varchar(255) DEFAULT NULL COMMENT '利率范围',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

CREATE TABLE `%DB_PREFIX%licai_advance` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `redempte_id` int(11) NOT NULL COMMENT '赎回ID',
  `user_id` int(11) NOT NULL COMMENT '申请人ID',
  `user_name` varchar(255) NOT NULL COMMENT '申请用户名',
  `money` decimal(10,2) NOT NULL DEFAULT '1.00' COMMENT '赎回本金',
  `earn_money` decimal(10,2) NOT NULL COMMENT '收益金额',
  `fee` decimal(10,2) NOT NULL COMMENT '赎回手续费',
  `organiser_fee` decimal(10,2) NOT NULL,
  `advance_money` decimal(10,2) NOT NULL COMMENT '垫付金额',
  `real_money` decimal(10,2) NOT NULL COMMENT '发起人账户金额和冻结资金被扣的金额',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态 0表示未处理 1表示通过',
  `type` tinyint(1) NOT NULL COMMENT '0 预热期赎回 1.起息时间违约赎回 2.正常到期赎回',
  `create_date` date NOT NULL COMMENT '申请时间',
  `update_date` date NOT NULL COMMENT '处理时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

CREATE TABLE `%DB_PREFIX%licai_bank` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '产品名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态1:有效;0无效',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='基金种类：\r\n全部 货币型 股票型 债券型 混合型 理财型 指数型 QDII 其他型';

CREATE TABLE `%DB_PREFIX%licai_dealshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `licai_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `sort` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

CREATE TABLE `%DB_PREFIX%licai_fund_brand` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '产品名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态1:有效;0无效',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='基金品牌：\r\n全部 嘉实 鹏华 易方达 国泰 南方 建信 招商 工银瑞信 海富通 华商 中邮创业 长盛 东方\r\n';

CREATE TABLE `%DB_PREFIX%licai_fund_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '产品名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态1:有效;0无效',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='基金种类：\r\n全部 货币型 股票型 债券型 混合型 理财型 指数型 QDII 其他型';

INSERT INTO `%DB_PREFIX%licai_fund_type` VALUES ('1', '货币型', '1', '0');
INSERT INTO `%DB_PREFIX%licai_fund_type` VALUES ('2', '股票型', '1', '0');
INSERT INTO `%DB_PREFIX%licai_fund_type` VALUES ('3', '债券型', '1', '0');
INSERT INTO `%DB_PREFIX%licai_fund_type` VALUES ('4', '混合型', '1', '0');
INSERT INTO `%DB_PREFIX%licai_fund_type` VALUES ('5', '理财型', '1', '0');
INSERT INTO `%DB_PREFIX%licai_fund_type` VALUES ('6', '标准', '1', '0');
INSERT INTO `%DB_PREFIX%licai_fund_type` VALUES ('7', 'QDII', '1', '0');
INSERT INTO `%DB_PREFIX%licai_fund_type` VALUES ('8', '其他型', '1', '0');
INSERT INTO `%DB_PREFIX%licai_fund_type` VALUES ('9', '中欧', '1', '0');

CREATE TABLE `%DB_PREFIX%licai_history` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `licai_id` varchar(50) NOT NULL COMMENT '编号',
  `history_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '购买金额起',
  `net_value` decimal(10,2) NOT NULL COMMENT '当日净利',
  `rate` decimal(7,4) NOT NULL COMMENT '利率',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='基金净值列表';


CREATE TABLE `%DB_PREFIX%licai_holiday` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `year` int(4) NOT NULL COMMENT '年',
  `holiday` date NOT NULL COMMENT '假日',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


CREATE TABLE `%DB_PREFIX%licai_interest` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `licai_id` varchar(50) NOT NULL COMMENT '编号',
  `min_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '购买金额起',
  `max_money` decimal(10,2) NOT NULL COMMENT '购买金额起',
  `interest_rate` decimal(7,4) NOT NULL COMMENT '利息率',
  `buy_fee_rate` decimal(10,4) DEFAULT NULL COMMENT '原购买手续费',
  `site_buy_fee_rate` decimal(10,4) DEFAULT NULL COMMENT '网站购买手续费',
  `redemption_fee_rate` decimal(10,4) DEFAULT NULL COMMENT '赎回手续费',
  `before_rate` decimal(10,4) DEFAULT NULL COMMENT '预热期利率',
  `before_breach_rate` decimal(10,4) DEFAULT NULL COMMENT '预热期违约利率',
  `breach_rate` decimal(10,4) DEFAULT NULL COMMENT '正常利息 违约收益率',
  `platform_rate` decimal(10,4) DEFAULT NULL COMMENT '平台收益率',
  `freeze_bond_rate` decimal(10,4) DEFAULT NULL,
  `platform_breach_rate` decimal(10,4) DEFAULT NULL COMMENT '用户违约网站收益',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COMMENT='利率列表【不同投资金额，可以获得不同的利率】';

CREATE TABLE `%DB_PREFIX%licai_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `licai_id` int(11) NOT NULL COMMENT '理财产品ID',
  `user_id` int(11) NOT NULL COMMENT '购买用户的id',
  `user_name` varchar(50) NOT NULL,
  `money` decimal(10,2) NOT NULL COMMENT '购买金额',
  `status` tinyint(1) NOT NULL COMMENT '0：未支付 1：已支付 2、部分赎回 3、已完结',
  `freeze_bond_rate` decimal(10,4) NOT NULL COMMENT '冻结保证金费率',
  `freeze_bond` decimal(10,2) NOT NULL COMMENT '冻结保证金',
  `pay_money` decimal(10,2) NOT NULL COMMENT '发放金额',
  `status_time` datetime NOT NULL COMMENT '处理时间',
  `create_time` datetime NOT NULL COMMENT '购买时间',
  `create_date` date NOT NULL COMMENT '购买年月日',
  `site_buy_fee_rate` decimal(10,4) NOT NULL COMMENT '实际申购费率',
  `site_buy_fee` decimal(10,2) NOT NULL COMMENT '实际申购费',
  `redemption_fee_rate` decimal(10,4) NOT NULL COMMENT '赎回手续费',
  `before_interest_date` date NOT NULL COMMENT '预热开始时间',
  `before_interest_enddate` date NOT NULL COMMENT '预热结束时间',
  `before_rate` decimal(10,4) NOT NULL COMMENT '预热利率',
  `before_interest` decimal(10,2) NOT NULL COMMENT '预热利息',
  `is_before_pay` tinyint(1) NOT NULL COMMENT '是否已经支付预热期手续费',
  `before_breach_rate` decimal(10,4) NOT NULL COMMENT '预热期违约利率',
  `begin_interest_type` tinyint(1) NOT NULL COMMENT '【0:当日生效，1:次日生效，2:下个工作日生效,3下二个工作日】',
  `begin_interest_date` date NOT NULL COMMENT '起息时间YMD',
  `interest_rate` decimal(10,4) NOT NULL COMMENT '利息率',
  `breach_rate` decimal(10,4) NOT NULL COMMENT '正常利息 违约收益率',
  `end_interest_date` date NOT NULL COMMENT '结束时间YMD',
  `service_fee_rate` decimal(10,4) NOT NULL COMMENT '成交服务费率',
  `service_fee` decimal(10,2) NOT NULL COMMENT '成交服务费',
  `redempte_money` decimal(10,2) DEFAULT '0.00' COMMENT '赎回金额',
  `gross` decimal(10,2) DEFAULT '0.00' COMMENT '毛利',
  `gross_margins` decimal(10,4) DEFAULT '0.0000' COMMENT '毛利率',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=utf8 COMMENT='理财订单表';

CREATE TABLE `%DB_PREFIX%licai_recommend` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `licai_id` varchar(50) NOT NULL COMMENT '编号',
  `name` varchar(255) NOT NULL COMMENT '产品名称',
  `img` varchar(255) NOT NULL COMMENT '项目图片',
  `brief` varchar(255) DEFAULT NULL COMMENT '简介',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态1:有效;0无效',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='个性推荐';

CREATE TABLE `%DB_PREFIX%licai_redempte` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL COMMENT '订单ID',
  `user_id` int(11) NOT NULL COMMENT '申请人ID',
  `user_name` varchar(255) NOT NULL COMMENT '申请用户名',
  `money` decimal(10,2) NOT NULL DEFAULT '1.00' COMMENT '赎回本金',
  `earn_money` decimal(10,2) NOT NULL COMMENT '收益金额',
  `fee` decimal(10,2) NOT NULL COMMENT '赎回手续费',
  `organiser_fee` decimal(10,2) NOT NULL COMMENT '平台收益',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态 0表示未赎回 1表示已赎回 2表示拒绝 3表示取消赎回',
  `type` tinyint(1) NOT NULL COMMENT '0 预热期赎回 1.起息时间违约赎回 2.正常到期赎回',
  `create_date` date NOT NULL COMMENT '申请时间',
  `update_date` date NOT NULL COMMENT '处理时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;


CREATE TABLE `%DB_PREFIX%weixin_msg_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dest` varchar(255) NOT NULL,
  `send_type` tinyint(1) NOT NULL,
  `content` text NOT NULL,
  `send_time` int(11) NOT NULL,
  `is_send` tinyint(1) NOT NULL,
  `create_time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `result` text NOT NULL,
  `is_success` tinyint(1) NOT NULL,
  `is_html` tinyint(1) NOT NULL,
  `title` text NOT NULL,
  `is_youhui` tinyint(1) NOT NULL,
  `youhui_id` int(11) NOT NULL,
  `code` varchar(60) NOT NULL COMMENT '发送的验证码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='//微信消息列表';


ALTER TABLE `%DB_PREFIX%user_log`
ADD COLUMN `money_type`  tinyint(1) NULL COMMENT '资金类型';

ALTER TABLE `%DB_PREFIX%user_log`
ADD COLUMN `order_id`  int(11) NULL COMMENT '订单编号' ;

INSERT INTO `%DB_PREFIX%conf` VALUES ('290', 'WX_MSG_LOCK', '0', '0', '0', '', '0', '0', '0');


ALTER TABLE `%DB_PREFIX%licai`
ADD COLUMN `platform_rate`  decimal(10,4) NULL COMMENT '平台收益(余额宝)' ,
ADD COLUMN `site_buy_fee_rate`  decimal(10,4) NULL DEFAULT NULL COMMENT '购买手续费(余额宝)' ;

ALTER TABLE `%DB_PREFIX%licai`
ADD COLUMN `redemption_fee_rate`  decimal(10,4) NULL COMMENT '赎回手续费(余额宝)' ;
 
INSERT INTO `%DB_PREFIX%msg_template` VALUES ('29', 'TPL_SMS_ZC_STATUS', '{$user.control_content}', '0', '0');
INSERT INTO `%DB_PREFIX%msg_template` VALUES ('30', 'TPL_MAIL_ZC_STATUS', '<table cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"\" width=\"100%\" style=\"background:#ffffff;\" class=\"baidu_pass\">\n<tbody>\n	<tr>\n		<td>\n		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n        <tbody>\n		<tr>\n			<td style=\"background:#ffffff;border-bottom:2px solid #dfdfdf;width:15px;\">&nbsp;</td>\n			<td style=\"background:#ffffff;border-bottom:2px solid #ffffff;width:10px;\">&nbsp;</td>\n			<td style=\"background:#ffffff;width:137px;\"><img src=\"{$user.logo}\" class=\"logo\" ellpadding=\"0\" cellspacing=\"0\"></td>\n			<td style=\"background:#ffffff;border-bottom:2px solid #ffffff;width:10px;\">&nbsp;</td>\n			<td style=\"background:#ffffff;border-bottom:2px solid #dfdfdf;\">&nbsp;</td>\n		</tr>\n        </tbody>\n		</table>\n		</td>\n	</tr>\n	<tr>\n		<td>\n		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n        <tbody>\n		<tr>\n			<td width=\"25px;\" style=\"width:25px;\"></td>\n			<td align=\"\">\n				<div style=\"line-height:40px;height:40px;\"></div>\n				<p style=\"margin:0px;padding:0px;\"><strong style=\"font-size:14px;line-height:24px;color:#333333;font-family:arial,sans-serif;\">亲爱的用户：</strong></p>\n				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:\'宋体\',arial,sans-serif;\">您好！</p>\n				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:\'宋体\',arial,sans-serif;\">{$user.control_content}</p>\n				<p style=\"margin:0px;padding:0px;\"><a href=\"{$user.verify_url}\" style=\"line-height:24px;font-size:12px;font-family:arial,sans-serif;color:#0000cc\" target=\"_blank\">{$user.verify_url}</a></p>\n				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#979797;font-family:arial,sans-serif;\">(如果您无法点击此链接，请将它复制到浏览器地址栏后访问)</p>\n 				<div style=\"line-height:80px;height:80px;\"></div>\n 				<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:\'宋体\',arial,sans-serif;\"><span style=\"border-bottom:1px dashed #ccc;\" t=\"5\" times=\"\">{$user.send_time}</span></p>\n			</td>\n		</tr>\n		</tbody>\n		</table>\n		</td>\n	</tr>\n	<tr>\n		<td>\n			<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-top:1px solid #dfdfdf\">\n			<tbody>\n			<tr>\n				<td width=\"25px;\" style=\"width:25px;\"></td>\n				<td align=\"\">\n					<div style=\"line-height:40px;height:40px;\"></div>\n					<p style=\"margin:0px;padding:0px;line-height:24px;font-size:12px;color:#979797;font-family:\'宋体\',arial,sans-serif;\">若您没有注册过{$user.site_name}帐号，请忽略此邮件，此帐号将不会被激活，由此给您带来的不便请谅解。</p>\n				</td>\n			</tr>\n			</tbody>\n			</table>\n		</td>\n	</tr>\n</tbody>\n</table>', '1', '1');

ALTER TABLE  `%DB_PREFIX%weixin_user` ADD UNIQUE INDEX `only` (`account_id`, `openid`) ;


ALTER TABLE `%DB_PREFIX%user` ADD COLUMN `head_image`  varchar(255) NOT NULL COMMENT '用户头像';

INSERT INTO `%DB_PREFIX%conf` VALUES ('291', 'USER_VERIFY_STATUS', '1', '4', '1', '0,1', '1', '1', '291');

ALTER TABLE `%DB_PREFIX%user` ADD COLUMN `wjdpay_token`  varchar(255) NULL COMMENT '京东WAP的token';

UPDATE `%DB_PREFIX%conf` set `value` = '1.6' where name = 'DB_VERSION'; 



