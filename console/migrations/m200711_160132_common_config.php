<?php

use yii\db\Migration;

class m200711_160132_common_config extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%common_config}}', [
            'id' => "int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键'",
            'title' => "varchar(50) NOT NULL DEFAULT '' COMMENT '配置标题'",
            'name' => "varchar(50) NOT NULL DEFAULT '' COMMENT '配置标识'",
            'app_id' => "varchar(20) NOT NULL DEFAULT '' COMMENT '应用'",
            'type' => "varchar(30) NOT NULL DEFAULT '' COMMENT '配置类型'",
            'cate_id' => "int(10) unsigned NOT NULL DEFAULT '0' COMMENT '配置分类'",
            'extra' => "varchar(1000) NOT NULL DEFAULT '' COMMENT '配置值'",
            'remark' => "varchar(1000) NOT NULL DEFAULT '' COMMENT '配置说明'",
            'is_hide_remark' => "tinyint(4) NULL DEFAULT '1' COMMENT '是否隐藏说明'",
            'default_value' => "varchar(500) NULL DEFAULT '' COMMENT '默认配置'",
            'sort' => "int(10) unsigned NULL DEFAULT '0' COMMENT '排序'",
            'status' => "tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态[-1:删除;0:禁用;1启用]'",
            'created_at' => "int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'",
            'updated_at' => "int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间'",
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='公用_配置表'");
        
        /* 索引设置 */
        $this->createIndex('type','{{%common_config}}','type',0);
        $this->createIndex('group','{{%common_config}}','cate_id',0);
        $this->createIndex('uk_name','{{%common_config}}','name',0);
        
        
        /* 表数据 */
        $this->insert('{{%common_config}}',['id'=>'1','title'=>'版权所有','name'=>'web_copyright','app_id'=>'backend','type'=>'text','cate_id'=>'17','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'9','status'=>'1','created_at'=>'1526199058','updated_at'=>'1572416677']);
        $this->insert('{{%common_config}}',['id'=>'2','title'=>'网站标题','name'=>'web_site_title','app_id'=>'backend','type'=>'text','cate_id'=>'17','extra'=>'','remark'=>'前台显示站点名称','is_hide_remark'=>'0','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1526372845','updated_at'=>'1574778793']);
        $this->insert('{{%common_config}}',['id'=>'3','title'=>'网站logo','name'=>'web_logo','app_id'=>'backend','type'=>'image','cate_id'=>'17','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'1','status'=>'1','created_at'=>'1526372885','updated_at'=>'1572422993']);
        $this->insert('{{%common_config}}',['id'=>'4','title'=>'备案号','name'=>'web_site_icp','app_id'=>'backend','type'=>'text','cate_id'=>'17','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'10','status'=>'1','created_at'=>'1526372926','updated_at'=>'1572416677']);
        $this->insert('{{%common_config}}',['id'=>'5','title'=>'网站访问量统计代码','name'=>'web_visit_code','app_id'=>'backend','type'=>'textarea','cate_id'=>'17','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'12','status'=>'1','created_at'=>'1526373044','updated_at'=>'1572416678']);
        $this->insert('{{%common_config}}',['id'=>'6','title'=>'百度自动推送代码','name'=>'web_baidu_push','app_id'=>'backend','type'=>'textarea','cate_id'=>'17','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'11','status'=>'1','created_at'=>'1526373086','updated_at'=>'1572416677']);
        $this->insert('{{%common_config}}',['id'=>'7','title'=>'后台允许访问IP','name'=>'sys_allow_ip','app_id'=>'backend','type'=>'textarea','cate_id'=>'18','extra'=>'','remark'=>'多个用换行/逗号/分号分隔，如果不配置表示不限制IP访问','is_hide_remark'=>'0','default_value'=>'','sort'=>'3','status'=>'1','created_at'=>'1526374098','updated_at'=>'1559444377']);
        $this->insert('{{%common_config}}',['id'=>'8','title'=>'公众号帐号','name'=>'wechat_account','app_id'=>'backend','type'=>'text','cate_id'=>'19','extra'=>'','remark'=>'填写公众号的帐号，一般为英文帐号','is_hide_remark'=>'0','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1526374732','updated_at'=>'1526376340']);
        $this->insert('{{%common_config}}',['id'=>'9','title'=>'原始ID','name'=>'wechat_id','app_id'=>'backend','type'=>'text','cate_id'=>'19','extra'=>'','remark'=>'在给粉丝发送客服消息时,原始ID不能为空。建议您完善该选项','is_hide_remark'=>'0','default_value'=>'','sort'=>'1','status'=>'1','created_at'=>'1526374769','updated_at'=>'1536050694']);
        $this->insert('{{%common_config}}',['id'=>'10','title'=>'级别','name'=>'wechat_rank','app_id'=>'backend','type'=>'radioList','cate_id'=>'19','extra'=>'1:普通订阅号,
2:普通服务号,
3:认证订阅号,
4:认证服务号/认证媒体/政府订阅号','remark'=>'注意：即使公众平台显示为“未认证”, 但只要【公众号设置】/【账号详情】下【认证情况】显示资质审核通过, 即可认定为认证号.','is_hide_remark'=>'0','default_value'=>'1','sort'=>'2','status'=>'1','created_at'=>'1526374841','updated_at'=>'1553850592']);
        $this->insert('{{%common_config}}',['id'=>'11','title'=>'App ID','name'=>'wechat_appid','app_id'=>'backend','type'=>'text','cate_id'=>'19','extra'=>'','remark'=>'请填写微信公众平台后台的AppId','is_hide_remark'=>'0','default_value'=>'','sort'=>'3','status'=>'1','created_at'=>'1526376099','updated_at'=>'1539928226']);
        $this->insert('{{%common_config}}',['id'=>'12','title'=>'App Secret','name'=>'wechat_appsecret','app_id'=>'backend','type'=>'text','cate_id'=>'19','extra'=>'','remark'=>'请填写微信公众平台后台的AppSecret, 只有填写这两项才能管理自定义菜单','is_hide_remark'=>'0','default_value'=>'','sort'=>'4','status'=>'1','created_at'=>'1526376188','updated_at'=>'1539928226']);
        $this->insert('{{%common_config}}',['id'=>'13','title'=>'Token','name'=>'wechat_token','app_id'=>'backend','type'=>'secretKeyText','cate_id'=>'19','extra'=>'32','remark'=>'与公众平台接入设置值一致，必须为英文或者数字，长度为3到32个字符. 请妥善保管, Token 泄露将可能被窃取或篡改平台的操作数据','is_hide_remark'=>'0','default_value'=>'','sort'=>'5','status'=>'1','created_at'=>'1526376249','updated_at'=>'1539134202']);
        $this->insert('{{%common_config}}',['id'=>'14','title'=>'EncodingAESKey','name'=>'wechat_encodingaeskey','app_id'=>'backend','type'=>'text','cate_id'=>'19','extra'=>'','remark'=>'与公众平台接入设置值一致，必须为英文或者数字，长度为43个字符. 请妥善保管, EncodingAESKey 泄露将可能被窃取或篡改平台的操作数据','is_hide_remark'=>'0','default_value'=>'','sort'=>'6','status'=>'1','created_at'=>'1526376295','updated_at'=>'1526376340']);
        $this->insert('{{%common_config}}',['id'=>'15','title'=>'微信关注二维码','name'=>'wechat_qrcode','app_id'=>'backend','type'=>'image','cate_id'=>'19','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'7','status'=>'1','created_at'=>'1526376328','updated_at'=>'1526376393']);
        $this->insert('{{%common_config}}',['id'=>'16','title'=>'分享标题','name'=>'wechat_share_title','app_id'=>'backend','type'=>'text','cate_id'=>'26','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1526376418','updated_at'=>'1553909298']);
        $this->insert('{{%common_config}}',['id'=>'17','title'=>'分享详情','name'=>'wechat_share_details','app_id'=>'backend','type'=>'textarea','cate_id'=>'26','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'1','status'=>'1','created_at'=>'1526376464','updated_at'=>'1553909304']);
        $this->insert('{{%common_config}}',['id'=>'18','title'=>'分享图片','name'=>'wechat_share_pic','app_id'=>'backend','type'=>'image','cate_id'=>'26','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'2','status'=>'1','created_at'=>'1526376489','updated_at'=>'1553909311']);
        $this->insert('{{%common_config}}',['id'=>'19','title'=>'分享链接','name'=>'wechat_share_url','app_id'=>'backend','type'=>'text','cate_id'=>'26','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'3','status'=>'1','created_at'=>'1526376520','updated_at'=>'1553909319']);
        $this->insert('{{%common_config}}',['id'=>'20','title'=>'App ID','name'=>'login_qq_appid','app_id'=>'backend','type'=>'text','cate_id'=>'11','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1526438194','updated_at'=>'1526438194']);
        $this->insert('{{%common_config}}',['id'=>'21','title'=>'App Secret','name'=>'login_qq_app_secret','app_id'=>'backend','type'=>'text','cate_id'=>'11','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'1','status'=>'1','created_at'=>'1526438237','updated_at'=>'1526438237']);
        $this->insert('{{%common_config}}',['id'=>'22','title'=>'App ID','name'=>'login_sina_appid','app_id'=>'backend','type'=>'text','cate_id'=>'12','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1526438194','updated_at'=>'1526438194']);
        $this->insert('{{%common_config}}',['id'=>'23','title'=>'App Secret','name'=>'login_sing_app_secret','app_id'=>'backend','type'=>'text','cate_id'=>'12','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'1','status'=>'1','created_at'=>'1526438237','updated_at'=>'1526438237']);
        $this->insert('{{%common_config}}',['id'=>'24','title'=>'App Secret','name'=>'login_wechat_app_secret','app_id'=>'backend','type'=>'text','cate_id'=>'13','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'1','status'=>'1','created_at'=>'1526438237','updated_at'=>'1526438237']);
        $this->insert('{{%common_config}}',['id'=>'25','title'=>'App ID','name'=>'login_wechat_appid','app_id'=>'backend','type'=>'text','cate_id'=>'13','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1526438194','updated_at'=>'1526438194']);
        $this->insert('{{%common_config}}',['id'=>'26','title'=>'App ID','name'=>'login_github_appid','app_id'=>'backend','type'=>'text','cate_id'=>'14','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1526438194','updated_at'=>'1526438194']);
        $this->insert('{{%common_config}}',['id'=>'27','title'=>'App Secret','name'=>'login_github_app_secret','app_id'=>'backend','type'=>'text','cate_id'=>'14','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'1','status'=>'1','created_at'=>'1526438237','updated_at'=>'1526438237']);
        $this->insert('{{%common_config}}',['id'=>'28','title'=>'SMTP服务器','name'=>'smtp_host','app_id'=>'backend','type'=>'text','cate_id'=>'16','extra'=>'','remark'=>'例如:smtp.163.com','is_hide_remark'=>'0','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1526438237','updated_at'=>'1544060631']);
        $this->insert('{{%common_config}}',['id'=>'29','title'=>'SMTP帐号','name'=>'smtp_username','app_id'=>'backend','type'=>'text','cate_id'=>'16','extra'=>'','remark'=>'例如:mobile@163.com','is_hide_remark'=>'0','default_value'=>'','sort'=>'1','status'=>'1','created_at'=>'1526438237','updated_at'=>'1544060631']);
        $this->insert('{{%common_config}}',['id'=>'30','title'=>'SMTP客户端授权码','name'=>'smtp_password','app_id'=>'backend','type'=>'password','cate_id'=>'16','extra'=>'','remark'=>'如果是163邮箱，此处要填授权码','is_hide_remark'=>'0','default_value'=>'','sort'=>'2','status'=>'1','created_at'=>'1526438237','updated_at'=>'1544060734']);
        $this->insert('{{%common_config}}',['id'=>'31','title'=>'SMTP端口','name'=>'smtp_port','app_id'=>'backend','type'=>'text','cate_id'=>'16','extra'=>'','remark'=>'25、109、110、143、465、995、993','is_hide_remark'=>'0','default_value'=>'','sort'=>'4','status'=>'1','created_at'=>'1526438237','updated_at'=>'1544060631']);
        $this->insert('{{%common_config}}',['id'=>'32','title'=>'发件人名称','name'=>'smtp_name','app_id'=>'backend','type'=>'text','cate_id'=>'16','extra'=>'','remark'=>'例如:RageFrame','is_hide_remark'=>'0','default_value'=>'','sort'=>'5','status'=>'1','created_at'=>'1526438237','updated_at'=>'1544060631']);
        $this->insert('{{%common_config}}',['id'=>'33','title'=>'使用SSL加密','name'=>'smtp_encryption','app_id'=>'backend','type'=>'radioList','cate_id'=>'16','extra'=>'0:关闭;
1:开启;','remark'=>'开启此项后，连接将用SSL的形式，此项需要SMTP服务器支持','is_hide_remark'=>'0','default_value'=>'','sort'=>'3','status'=>'1','created_at'=>'1526438237','updated_at'=>'1526439059']);
        $this->insert('{{%common_config}}',['id'=>'34','title'=>'商户号','name'=>'wechat_mchid','app_id'=>'backend','type'=>'text','cate_id'=>'9','extra'=>'','remark'=>'公众号支付的商户账号','is_hide_remark'=>'0','default_value'=>'','sort'=>'1','status'=>'1','created_at'=>'1526710975','updated_at'=>'1591683621']);
        $this->insert('{{%common_config}}',['id'=>'35','title'=>'支付密钥','name'=>'wechat_api_key','app_id'=>'backend','type'=>'secretKeyText','cate_id'=>'9','extra'=>'32','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'2','status'=>'1','created_at'=>'1526711047','updated_at'=>'1591683622']);
        $this->insert('{{%common_config}}',['id'=>'36','title'=>'证书公钥','name'=>'wechat_cert_path','app_id'=>'backend','type'=>'text','cate_id'=>'9','extra'=>'','remark'=>'如需使用敏感接口(如退款、发送红包等)需要配置 API 证书路径(登录商户平台下载 API 证书),注意路径为绝对路径','is_hide_remark'=>'0','default_value'=>'','sort'=>'3','status'=>'1','created_at'=>'1526711138','updated_at'=>'1591683623']);
        $this->insert('{{%common_config}}',['id'=>'37','title'=>'证书私钥','name'=>'wechat_key_path','app_id'=>'backend','type'=>'text','cate_id'=>'9','extra'=>'','remark'=>'如需使用敏感接口(如退款、发送红包等)需要配置 API 证书路径(登录商户平台下载 API 证书),注意路径为绝对路径','is_hide_remark'=>'0','default_value'=>'','sort'=>'4','status'=>'1','created_at'=>'1526711237','updated_at'=>'1591683624']);
        $this->insert('{{%common_config}}',['id'=>'38','title'=>'App ID','name'=>'miniprogram_appid','app_id'=>'backend','type'=>'text','cate_id'=>'22','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1526711433','updated_at'=>'1553909256']);
        $this->insert('{{%common_config}}',['id'=>'39','title'=>'App Secret','name'=>'miniprogram_secret','app_id'=>'backend','type'=>'text','cate_id'=>'22','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'1','status'=>'1','created_at'=>'1526711464','updated_at'=>'1553909246']);
        $this->insert('{{%common_config}}',['id'=>'40','title'=>'用户凭证','name'=>'storage_qiniu_accesskey','app_id'=>'backend','type'=>'text','cate_id'=>'15','extra'=>'','remark'=>'ak','is_hide_remark'=>'0','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1527032360','updated_at'=>'1546657094']);
        $this->insert('{{%common_config}}',['id'=>'41','title'=>'签名密钥','name'=>'storage_qiniu_secrectkey','app_id'=>'backend','type'=>'text','cate_id'=>'15','extra'=>'','remark'=>'sk','is_hide_remark'=>'0','default_value'=>'','sort'=>'1','status'=>'1','created_at'=>'1527032390','updated_at'=>'1546657094']);
        $this->insert('{{%common_config}}',['id'=>'42','title'=>'域名','name'=>'storage_qiniu_domain','app_id'=>'backend','type'=>'text','cate_id'=>'15','extra'=>'','remark'=>'domain','is_hide_remark'=>'0','default_value'=>'','sort'=>'2','status'=>'1','created_at'=>'1527032506','updated_at'=>'1546657382']);
        $this->insert('{{%common_config}}',['id'=>'43','title'=>'空间名','name'=>'storage_qiniu_bucket','app_id'=>'backend','type'=>'text','cate_id'=>'15','extra'=>'','remark'=>'七牛的后台管理页面自己创建的空间名','is_hide_remark'=>'0','default_value'=>'','sort'=>'3','status'=>'1','created_at'=>'1527032578','updated_at'=>'1546657382']);
        $this->insert('{{%common_config}}',['id'=>'44','title'=>'accessKeyId','name'=>'storage_aliyun_accesskeyid','app_id'=>'backend','type'=>'text','cate_id'=>'20','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1527032713','updated_at'=>'1553909089']);
        $this->insert('{{%common_config}}',['id'=>'45','title'=>'accessSecret','name'=>'storage_aliyun_accesskeysecret','app_id'=>'backend','type'=>'text','cate_id'=>'20','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'1','status'=>'1','created_at'=>'1527032738','updated_at'=>'1555887597']);
        $this->insert('{{%common_config}}',['id'=>'46','title'=>'端口','name'=>'storage_aliyun_endpoint','app_id'=>'backend','type'=>'text','cate_id'=>'20','extra'=>'','remark'=>'EndPoint 接收消息的终端地址 例如：oss-cn-shanghai.aliyuncs.com','is_hide_remark'=>'0','default_value'=>'','sort'=>'3','status'=>'1','created_at'=>'1527032773','updated_at'=>'1577522219']);
        $this->insert('{{%common_config}}',['id'=>'47','title'=>'空间名','name'=>'storage_aliyun_bucket','app_id'=>'backend','type'=>'text','cate_id'=>'20','extra'=>'','remark'=>'bucket','is_hide_remark'=>'0','default_value'=>'','sort'=>'2','status'=>'1','created_at'=>'1527032796','updated_at'=>'1577522217']);
        $this->insert('{{%common_config}}',['id'=>'48','title'=>'应用 Appid','name'=>'alipay_appid','app_id'=>'backend','type'=>'text','cate_id'=>'8','extra'=>'','remark'=>'使用创建应用时候生成的 appid','is_hide_remark'=>'0','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1527668387','updated_at'=>'1594267768']);
        $this->insert('{{%common_config}}',['id'=>'49','title'=>'收款账号','name'=>'alipay_account','app_id'=>'backend','type'=>'text','cate_id'=>'8','extra'=>'','remark'=>'如果开启兑换或交易功能，请填写真实有效的支付宝账号。如账号无效或安全码有误，将导致用户支付后无法正确进行正常的交易。 如您没有支付宝帐号，<a href=\\\"https://memberprod.alipay.com/account/reg/enterpriseIndex.htm\\\" target=\\\"_blank\\\">请点击这里注册</a>','is_hide_remark'=>'0','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1527668428','updated_at'=>'1567671909']);
        $this->insert('{{%common_config}}',['id'=>'50','title'=>'应用公钥','name'=>'alipay_cert_path','app_id'=>'backend','type'=>'text','cate_id'=>'8','extra'=>'','remark'=>'如需使用敏感接口(如退款等)需要配置 API 证书路径(请用支付宝生成工具生成公钥并上传),注意路径为绝对路径','is_hide_remark'=>'0','default_value'=>'','sort'=>'2','status'=>'1','created_at'=>'1526711138','updated_at'=>'1586580250']);
        $this->insert('{{%common_config}}',['id'=>'51','title'=>'应用私钥','name'=>'alipay_key_path','app_id'=>'backend','type'=>'text','cate_id'=>'8','extra'=>'','remark'=>'如需使用敏感接口(如退款等)需要配置 API 证书路径(请用支付宝生成工具生成私钥并上传),注意路径为绝对路径','is_hide_remark'=>'0','default_value'=>'','sort'=>'3','status'=>'1','created_at'=>'1526711237','updated_at'=>'1586580256']);
        $this->insert('{{%common_config}}',['id'=>'52','title'=>'开发模式','name'=>'sys_dev','app_id'=>'backend','type'=>'radioList','cate_id'=>'18','extra'=>'1:开启,
0:关闭,','remark'=>'开启后某些菜单功能可见，修改后请刷新页面','is_hide_remark'=>'0','default_value'=>'1','sort'=>'0','status'=>'1','created_at'=>'1529117534','updated_at'=>'1554041531']);
        $this->insert('{{%common_config}}',['id'=>'53','title'=>'水印状态','name'=>'sys_image_watermark_status','app_id'=>'backend','type'=>'radioList','cate_id'=>'23','extra'=>'1:开启,
0:关闭,','remark'=>'','is_hide_remark'=>'1','default_value'=>'0','sort'=>'1','status'=>'1','created_at'=>'1537949984','updated_at'=>'1553908904']);
        $this->insert('{{%common_config}}',['id'=>'54','title'=>'图片水印','name'=>'sys_image_watermark_img','app_id'=>'backend','type'=>'image','cate_id'=>'23','extra'=>'','remark'=>'如果图片尺寸小于水印尺寸则水印不生效','is_hide_remark'=>'0','default_value'=>'','sort'=>'2','status'=>'1','created_at'=>'1537950064','updated_at'=>'1553908911']);
        $this->insert('{{%common_config}}',['id'=>'55','title'=>'水印位置','name'=>'sys_image_watermark_location','app_id'=>'backend','type'=>'radioList','cate_id'=>'23','extra'=>'1:左上,
2:上中,
3:右上,
4:左中,
5:正中,
6:右中,
7:左下,
8:中下,
9:右下,','remark'=>'','is_hide_remark'=>'1','default_value'=>'1','sort'=>'2','status'=>'1','created_at'=>'1537951491','updated_at'=>'1553908889']);
        $this->insert('{{%common_config}}',['id'=>'56','title'=>'商户号','name'=>'union_mchid','app_id'=>'backend','type'=>'text','cate_id'=>'10','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1540003843','updated_at'=>'1545285072']);
        $this->insert('{{%common_config}}',['id'=>'57','title'=>'证书公钥','name'=>'union_cert_id','app_id'=>'backend','type'=>'text','cate_id'=>'10','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'1','status'=>'1','created_at'=>'1540004005','updated_at'=>'1545285072']);
        $this->insert('{{%common_config}}',['id'=>'58','title'=>'证书秘钥','name'=>'union_private_key','app_id'=>'backend','type'=>'text','cate_id'=>'10','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'2','status'=>'1','created_at'=>'1540004031','updated_at'=>'1540004031']);
        $this->insert('{{%common_config}}',['id'=>'59','title'=>'SEO关键字','name'=>'web_seo_keywords','app_id'=>'backend','type'=>'text','cate_id'=>'17','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'2','status'=>'1','created_at'=>'1547087332','updated_at'=>'1572416677']);
        $this->insert('{{%common_config}}',['id'=>'60','title'=>'SEO内容','name'=>'web_seo_description','app_id'=>'backend','type'=>'textarea','cate_id'=>'17','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'3','status'=>'1','created_at'=>'1547087379','updated_at'=>'1572416677']);
        $this->insert('{{%common_config}}',['id'=>'61','title'=>'后台 Tab 页签','name'=>'sys_tags','app_id'=>'backend','type'=>'radioList','cate_id'=>'18','extra'=>'1:开启,
0:关闭,','remark'=>'修改后请刷新页面','is_hide_remark'=>'0','default_value'=>'1','sort'=>'1','status'=>'1','created_at'=>'1547778279','updated_at'=>'1554041532']);
        $this->insert('{{%common_config}}',['id'=>'62','title'=>'App ID','name'=>'push_jpush_appid','app_id'=>'backend','type'=>'text','cate_id'=>'25','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1548405209','updated_at'=>'1553908864']);
        $this->insert('{{%common_config}}',['id'=>'63','title'=>'App Secret','name'=>'push_jpush_app_secret','app_id'=>'backend','type'=>'text','cate_id'=>'25','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'1','status'=>'1','created_at'=>'1548405244','updated_at'=>'1553908854']);
        $this->insert('{{%common_config}}',['id'=>'64','title'=>'后台相关链接','name'=>'sys_related_links','app_id'=>'backend','type'=>'radioList','cate_id'=>'18','extra'=>'1:显示,
0:隐藏,','remark'=>'','is_hide_remark'=>'1','default_value'=>'0','sort'=>'2','status'=>'1','created_at'=>'1554041616','updated_at'=>'1557213534']);
        $this->insert('{{%common_config}}',['id'=>'65','title'=>'内网端口','name'=>'storage_aliyun_endpoint_internal','app_id'=>'backend','type'=>'text','cate_id'=>'20','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'7','status'=>'1','created_at'=>'1554800824','updated_at'=>'1577522183']);
        $this->insert('{{%common_config}}',['id'=>'66','title'=>'内网上传','name'=>'storage_aliyun_is_internal','app_id'=>'backend','type'=>'radioList','cate_id'=>'20','extra'=>'1:开启,
0:关闭,','remark'=>'','is_hide_remark'=>'1','default_value'=>'0','sort'=>'6','status'=>'1','created_at'=>'1554870877','updated_at'=>'1577522181']);
        $this->insert('{{%common_config}}',['id'=>'67','title'=>'支付宝公钥','name'=>'alipay_notification_cert_path','app_id'=>'backend','type'=>'text','cate_id'=>'8','extra'=>'','remark'=>'回调验证签名必须','is_hide_remark'=>'0','default_value'=>'','sort'=>'4','status'=>'1','created_at'=>'1557815671','updated_at'=>'1557815671']);
        $this->insert('{{%common_config}}',['id'=>'68','title'=>'accessKeyId','name'=>'sms_aliyun_accesskeyid','app_id'=>'backend','type'=>'text','cate_id'=>'28','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1559260691','updated_at'=>'1572417442']);
        $this->insert('{{%common_config}}',['id'=>'69','title'=>'accessSecret','name'=>'sms_aliyun_accesskeysecret','app_id'=>'backend','type'=>'text','cate_id'=>'28','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'1','status'=>'1','created_at'=>'1559260724','updated_at'=>'1572417442']);
        $this->insert('{{%common_config}}',['id'=>'70','title'=>'签名','name'=>'sms_aliyun_sign_name','app_id'=>'backend','type'=>'text','cate_id'=>'28','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'2','status'=>'1','created_at'=>'1559260809','updated_at'=>'1572417443']);
        $this->insert('{{%common_config}}',['id'=>'71','title'=>'模版','name'=>'sms_aliyun_template','app_id'=>'backend','type'=>'multipleInput','cate_id'=>'28','extra'=>'group:组别,
template:模版ID,','remark'=>'默认 login、up-pwd、register、up-mobile','is_hide_remark'=>'0','default_value'=>'','sort'=>'3','status'=>'1','created_at'=>'1559260837','updated_at'=>'1593154280']);
        $this->insert('{{%common_config}}',['id'=>'72','title'=>'ak','name'=>'map_baidu_ak','app_id'=>'backend','type'=>'text','cate_id'=>'30','extra'=>'','remark'=>'开发者中心：<a href=\"http://lbsyun.baidu.com/\" target=\"_blank\">立即申请</a>','is_hide_remark'=>'0','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1559402573','updated_at'=>'1589957865']);
        $this->insert('{{%common_config}}',['id'=>'73','title'=>'key','name'=>'map_tencent_key','app_id'=>'backend','type'=>'text','cate_id'=>'31','extra'=>'','remark'=>'开发者中心：<a href=\"https://lbs.qq.com/\" target=\"_blank\">立即申请</a>','is_hide_remark'=>'0','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1559402617','updated_at'=>'1589957846']);
        $this->insert('{{%common_config}}',['id'=>'74','title'=>'Web端(Js Api) - key','name'=>'map_amap_key','app_id'=>'backend','type'=>'text','cate_id'=>'32','extra'=>'','remark'=>'地图选择，官网：https://lbs.amap.com/dev/key/app','is_hide_remark'=>'0','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1559402658','updated_at'=>'1594107724']);
        $this->insert('{{%common_config}}',['id'=>'75','title'=>'accessKeyId','name'=>'storage_cos_accesskey','app_id'=>'backend','type'=>'text','cate_id'=>'33','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'1','status'=>'1','created_at'=>'1559528032','updated_at'=>'1559528076']);
        $this->insert('{{%common_config}}',['id'=>'76','title'=>'accessSecret','name'=>'storage_cos_secrectkey','app_id'=>'backend','type'=>'text','cate_id'=>'33','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'2','status'=>'1','created_at'=>'1559528052','updated_at'=>'1559528071']);
        $this->insert('{{%common_config}}',['id'=>'77','title'=>'appID','name'=>'storage_cos_appid','app_id'=>'backend','type'=>'text','cate_id'=>'33','extra'=>'','remark'=>'域名中数字部分','is_hide_remark'=>'0','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1559528110','updated_at'=>'1559528110']);
        $this->insert('{{%common_config}}',['id'=>'78','title'=>'所属区域','name'=>'storage_cos_region','app_id'=>'backend','type'=>'text','cate_id'=>'33','extra'=>'','remark'=>'区域，例如：ap-guangzhou','is_hide_remark'=>'0','default_value'=>'','sort'=>'3','status'=>'1','created_at'=>'1559528187','updated_at'=>'1559528541']);
        $this->insert('{{%common_config}}',['id'=>'79','title'=>'空间名','name'=>'storage_cos_bucket','app_id'=>'backend','type'=>'text','cate_id'=>'33','extra'=>'','remark'=>'bucket','is_hide_remark'=>'0','default_value'=>'','sort'=>'4','status'=>'1','created_at'=>'1559528248','updated_at'=>'1559528248']);
        $this->insert('{{%common_config}}',['id'=>'80','title'=>'cdn','name'=>'storage_cos_cdn','app_id'=>'backend','type'=>'text','cate_id'=>'33','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'5','status'=>'1','created_at'=>'1559528366','updated_at'=>'1559528366']);
        $this->insert('{{%common_config}}',['id'=>'81','title'=>'cdn可读','name'=>'read_from_cdn','app_id'=>'backend','type'=>'radioList','cate_id'=>'33','extra'=>'0:否,
1:是,','remark'=>'','is_hide_remark'=>'1','default_value'=>'0','sort'=>'6','status'=>'1','created_at'=>'1559528436','updated_at'=>'1559528482']);
        $this->insert('{{%common_config}}',['id'=>'82','title'=>'rsa_private','name'=>'oauth2_rsa_private','app_id'=>'backend','type'=>'text','cate_id'=>'35','extra'=>'','remark'=>'RSA私钥绝对路径，注意Linux下权限为600或660','is_hide_remark'=>'0','default_value'=>'','sort'=>'1','status'=>'1','created_at'=>'1559705070','updated_at'=>'1589682939']);
        $this->insert('{{%common_config}}',['id'=>'83','title'=>'rsa_public','name'=>'oauth2_rsa_public','app_id'=>'backend','type'=>'text','cate_id'=>'35','extra'=>'','remark'=>'RSA公钥绝对路径，注意Linux下权限为600或660','is_hide_remark'=>'0','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1559705282','updated_at'=>'1589682933']);
        $this->insert('{{%common_config}}',['id'=>'84','title'=>'私钥文件加密','name'=>'oauth2_rsa_private_encryption','app_id'=>'backend','type'=>'radioList','cate_id'=>'35','extra'=>'1:是,
0:否,','remark'=>'如果加密请填写加密密码','is_hide_remark'=>'0','default_value'=>'0','sort'=>'2','status'=>'1','created_at'=>'1559705564','updated_at'=>'1559708918']);
        $this->insert('{{%common_config}}',['id'=>'85','title'=>'私钥加密密码','name'=>'oauth2_rsa_private_password','app_id'=>'backend','type'=>'password','cate_id'=>'35','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'3','status'=>'1','created_at'=>'1559705610','updated_at'=>'1559705838']);
        $this->insert('{{%common_config}}',['id'=>'86','title'=>'加密密钥字符串','name'=>'oauth2_encryption_key','app_id'=>'backend','type'=>'secretKeyText','cate_id'=>'35','extra'=>'32','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'4','status'=>'1','created_at'=>'1559705722','updated_at'=>'1559705739']);
        $this->insert('{{%common_config}}',['id'=>'87','title'=>'绑定域名','name'=>'storage_aliyun_user_url','app_id'=>'backend','type'=>'text','cate_id'=>'20','extra'=>'','remark'=>'填写后默认返回绑定域名前缀的链接','is_hide_remark'=>'0','default_value'=>'','sort'=>'4','status'=>'1','created_at'=>'1560779551','updated_at'=>'1577522178']);
        $this->insert('{{%common_config}}',['id'=>'90','title'=>'IP黑名单验证','name'=>'sys_ip_blacklist_open','app_id'=>'backend','type'=>'radioList','cate_id'=>'18','extra'=>'1:开启,
0:关闭,','remark'=>'需要去系统工具的ip黑名单增加才可生效','is_hide_remark'=>'1','default_value'=>'0','sort'=>'4','status'=>'1','created_at'=>'1562115746','updated_at'=>'1562115756']);
        $this->insert('{{%common_config}}',['id'=>'92','title'=>'隐私协议','name'=>'agreement_privacy','app_id'=>'backend','type'=>'baiduUEditor','cate_id'=>'37','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1564535422','updated_at'=>'1564535422']);
        $this->insert('{{%common_config}}',['id'=>'105','title'=>'AppCode','name'=>'logistics_aliyun_app_code','app_id'=>'backend','type'=>'text','cate_id'=>'46','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1575893981','updated_at'=>'1575893981']);
        $this->insert('{{%common_config}}',['id'=>'106','title'=>'App ID','name'=>'logistics_kdniao_app_id','app_id'=>'backend','type'=>'text','cate_id'=>'44','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1575894702','updated_at'=>'1575894702']);
        $this->insert('{{%common_config}}',['id'=>'107','title'=>'App Key','name'=>'logistics_kdniao_app_key','app_id'=>'backend','type'=>'text','cate_id'=>'44','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'1','status'=>'1','created_at'=>'1575894719','updated_at'=>'1575894719']);
        $this->insert('{{%common_config}}',['id'=>'108','title'=>'App ID','name'=>'logistics_kd100_app_id','app_id'=>'backend','type'=>'text','cate_id'=>'45','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1575894746','updated_at'=>'1575894746']);
        $this->insert('{{%common_config}}',['id'=>'109','title'=>'App Key','name'=>'logistics_kd100_app_key','app_id'=>'backend','type'=>'text','cate_id'=>'45','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'1','status'=>'1','created_at'=>'1575894761','updated_at'=>'1575894761']);
        $this->insert('{{%common_config}}',['id'=>'110','title'=>'AppCode','name'=>'logistics_juhe_app_code','app_id'=>'backend','type'=>'text','cate_id'=>'47','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1575987687','updated_at'=>'1575987687']);
        $this->insert('{{%common_config}}',['id'=>'112','title'=>'传输协议','name'=>'storage_aliyun_transport_protocols','app_id'=>'backend','type'=>'radioList','cate_id'=>'20','extra'=>'http:http,
https:https,','remark'=>'','is_hide_remark'=>'1','default_value'=>'http','sort'=>'3','status'=>'1','created_at'=>'1577522012','updated_at'=>'1577522176']);
        $this->insert('{{%common_config}}',['id'=>'113','title'=>'RSA 公钥','name'=>'wechat_rsa_public_key_path','app_id'=>'backend','type'=>'text','cate_id'=>'9','extra'=>'','remark'=>'企业付款需要用到双向证书，请参考：https://pay.weixin.qq.com/wiki/doc/api/tools/mch_pay.php?chapter=4_3','is_hide_remark'=>'0','default_value'=>'','sort'=>'5','status'=>'1','created_at'=>'1579158737','updated_at'=>'1591683625']);
        $this->insert('{{%common_config}}',['id'=>'114','title'=>'注册自动审核','name'=>'merchant_register_audit','app_id'=>'backend','type'=>'radioList','cate_id'=>'49','extra'=>'1:是,
0:否,','remark'=>'','is_hide_remark'=>'1','default_value'=>'0','sort'=>'1','status'=>'1','created_at'=>'1583371157','updated_at'=>'1586498296']);
        $this->insert('{{%common_config}}',['id'=>'115','title'=>'注册协议','name'=>'merchant_register_protocol','app_id'=>'backend','type'=>'baiduUEditor','cate_id'=>'49','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'2','status'=>'1','created_at'=>'1583371256','updated_at'=>'1583481143']);
        $this->insert('{{%common_config}}',['id'=>'116','title'=>'开放注册','name'=>'merchant_register_is_open','app_id'=>'backend','type'=>'radioList','cate_id'=>'49','extra'=>'1:是,
0:否,','remark'=>'','is_hide_remark'=>'1','default_value'=>'0','sort'=>'0','status'=>'1','created_at'=>'1583481137','updated_at'=>'1583481157']);
        $this->insert('{{%common_config}}',['id'=>'117','title'=>'会员升级方式','name'=>'member_level_upgrade_type','app_id'=>'backend','type'=>'radioList','cate_id'=>'51','extra'=>'1:累计积分;
2:累积消费;','remark'=>'切换升级方式可能会导致会员级别发生变化,请慎重','is_hide_remark'=>'0','default_value'=>'1','sort'=>'0','status'=>'1','created_at'=>'1589014182','updated_at'=>'1589014290']);
        $this->insert('{{%common_config}}',['id'=>'118','title'=>'App ID','name'=>'getui_app_id','app_id'=>'backend','type'=>'text','cate_id'=>'52','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1589641862','updated_at'=>'1589641862']);
        $this->insert('{{%common_config}}',['id'=>'119','title'=>'App Key','name'=>'getui_app_key','app_id'=>'backend','type'=>'text','cate_id'=>'52','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1589641881','updated_at'=>'1589641881']);
        $this->insert('{{%common_config}}',['id'=>'120','title'=>'Master Secret','name'=>'getui_master_secret','app_id'=>'backend','type'=>'text','cate_id'=>'52','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1589642166','updated_at'=>'1589642166']);
        $this->insert('{{%common_config}}',['id'=>'121','title'=>'Logo','name'=>'getui_logo_url','app_id'=>'backend','type'=>'image','cate_id'=>'52','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1589642202','updated_at'=>'1589644938']);
        $this->insert('{{%common_config}}',['id'=>'122','title'=>'App Id','name'=>'wechat_open_appid','app_id'=>'backend','type'=>'text','cate_id'=>'9','extra'=>'','remark'=>'主要用于 app 支付，微信开放平台的 appid，如果只需要微信公众号支付，只配置微信公众号那边即可','is_hide_remark'=>'0','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1591683438','updated_at'=>'1591684609']);
        $this->insert('{{%common_config}}',['id'=>'123','title'=>'终端号','name'=>'printer_yilianyun_terminal_number','app_id'=>'backend','type'=>'text','cate_id'=>'54','extra'=>'','remark'=>'打印机终端号','is_hide_remark'=>'0','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1593760870','updated_at'=>'1593760870']);
        $this->insert('{{%common_config}}',['id'=>'124','title'=>'密钥','name'=>'printer_yilianyun_secret_key','app_id'=>'backend','type'=>'text','cate_id'=>'54','extra'=>'','remark'=>'打印机密钥','is_hide_remark'=>'0','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1593760904','updated_at'=>'1593760904']);
        $this->insert('{{%common_config}}',['id'=>'125','title'=>'应用ID','name'=>'printer_yilianyun_app_id','app_id'=>'backend','type'=>'text','cate_id'=>'54','extra'=>'','remark'=>'易联云开放平台创建应用获取','is_hide_remark'=>'0','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1593760958','updated_at'=>'1594004336']);
        $this->insert('{{%common_config}}',['id'=>'126','title'=>'应用密钥','name'=>'printer_yilianyun_app_secret _key','app_id'=>'backend','type'=>'text','cate_id'=>'54','extra'=>'','remark'=>'易联云开放平台创建应用获取','is_hide_remark'=>'0','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1593761000','updated_at'=>'1594004375']);
        $this->insert('{{%common_config}}',['id'=>'127','title'=>'打印联数','name'=>'printer_yilianyun_print_num','app_id'=>'backend','type'=>'text','cate_id'=>'54','extra'=>'','remark'=>'同一个记录，打印的数量，区间范围为 1-9','is_hide_remark'=>'0','default_value'=>'1','sort'=>'0','status'=>'1','created_at'=>'1593761054','updated_at'=>'1594267849']);
        $this->insert('{{%common_config}}',['id'=>'128','title'=>'公钥','name'=>'stripe_publishable_key','app_id'=>'backend','type'=>'text','cate_id'=>'55','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1594103346','updated_at'=>'1594103346']);
        $this->insert('{{%common_config}}',['id'=>'129','title'=>'私钥','name'=>'stripe_secret_key','app_id'=>'backend','type'=>'text','cate_id'=>'55','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1594103360','updated_at'=>'1594103360']);
        $this->insert('{{%common_config}}',['id'=>'130','title'=>'partner_code','name'=>'alphapay_partner_code','app_id'=>'backend','type'=>'text','cate_id'=>'56','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1594103379','updated_at'=>'1594103404']);
        $this->insert('{{%common_config}}',['id'=>'131','title'=>'credential_code','name'=>'alphapay_credential_code','app_id'=>'backend','type'=>'text','cate_id'=>'56','extra'=>'','remark'=>'','is_hide_remark'=>'1','default_value'=>'','sort'=>'0','status'=>'1','created_at'=>'1594103394','updated_at'=>'1594103394']);
        $this->insert('{{%common_config}}',['id'=>'132','title'=>'Web端- key','name'=>'map_amap_web_key','app_id'=>'backend','type'=>'text','cate_id'=>'32','extra'=>'','remark'=>'经纬度转换','is_hide_remark'=>'0','default_value'=>'','sort'=>'1','status'=>'1','created_at'=>'1594107642','updated_at'=>'1594107647']);
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%common_config}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

