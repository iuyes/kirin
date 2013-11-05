-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 11 月 05 日 10:47
-- 服务器版本: 5.0.51b-log
-- PHP 版本: 5.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `kirin`
--
CREATE DATABASE IF NOT EXISTS `kirin` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kirin`;

-- --------------------------------------------------------

--
-- 表的结构 `ad_img`
--

CREATE TABLE IF NOT EXISTS `ad_img` (
  `ad_img_id` int(11) NOT NULL auto_increment,
  `ad_img_location` int(11) NOT NULL COMMENT '广告展示的区域',
  `ad_img_type` int(6) NOT NULL COMMENT '广告类型',
  `ad_img_src` varchar(255) character set utf8 NOT NULL COMMENT '广告图片的路径',
  `ad_img_url` varchar(255) character set utf8 NOT NULL COMMENT '广告URL',
  `ad_img_des` varchar(255) character set utf8 NOT NULL COMMENT '广告图片的描述',
  `ad_img_add_at` int(11) NOT NULL COMMENT '添加时间',
  `ad_img_status` int(11) NOT NULL COMMENT '0正常，非0表示删除时间',
  PRIMARY KEY  (`ad_img_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `ad_img`
--

INSERT INTO `ad_img` (`ad_img_id`, `ad_img_location`, `ad_img_type`, `ad_img_src`, `ad_img_url`, `ad_img_des`, `ad_img_add_at`, `ad_img_status`) VALUES
(16, 1, 1, 'upload/20130928/1380336971-5843.jpg', 'http://kirin.com:8080/index.php?s=Home-Index-category&goods_category=0&type=1&sort_type=cx&sort=down&location=1', '全场七折优惠', 1380336971, 0),
(17, 1, 2, 'upload/20130928/1380336987-8404.jpg', 'http://kirin.com:8080/index.php?s=Home-Index-category&goods_category=0&type=1&sort_type=cx&sort=down&location=1', '全场七折优惠', 1380336987, 0),
(18, 1, 2, 'upload/20130928/1380337010-4404.png', 'http://kirin.com:8080/index.php?s=Home-Index-category&goods_category=0&type=1&sort_type=cx&sort=down&location=1', '全场七折优惠3', 1380337010, 0),
(19, 1, 3, 'upload/20130928/1380337569-6916.jpg', 'http://kirin.com:8080/index.php?s=Home-Index-category&goods_category=0&type=1&sort_type=cx&sort=down&location=1', '全场七折优惠', 1380337569, 0),
(20, 1, 3, 'upload/20130928/1380337730-8462.jpg', 'http://kirin.com:8080/index.php?s=Home-Index-category&goods_category=0&type=1&sort_type=cx&sort=down&location=1', '全场七折优惠', 1380337730, 0),
(21, 1, 1, 'upload/20130929/1380433412-8370.JPG', 'http://kirin.com:8080/index.php?s=Home-Index-category&goods_category=0&type=1&sort_type=cx&sort=down&location=1', '全场七折优惠', 1380433412, 0),
(22, 1, 3, 'upload/20130929/1380433470-9712.JPG', 'http://kirin.com:8080/index.php?s=Home-Index-category&goods_category=0&type=1&sort_type=cx&sort=down&location=1', '全场七折优惠', 1380433470, 0),
(23, 1, 2, 'upload/20130929/1380433518-4123.JPG', 'http://kirin.com:8080/index.php?s=Home-Index-category&goods_category=0&type=1&sort_type=cx&sort=down&location=1', '全场七折优惠', 1380433518, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ariticle`
--

CREATE TABLE IF NOT EXISTS `ariticle` (
  `ariticle_id` int(11) NOT NULL auto_increment,
  `ariticle_title` varchar(255) character set utf8 NOT NULL COMMENT '文章标题',
  `ariticle_type` int(11) NOT NULL COMMENT '文章类型，1为资讯 2为活动',
  `ariticle_content` text character set utf8 NOT NULL COMMENT '文章内容',
  `ariticle_add_at` int(11) NOT NULL COMMENT '添加时间',
  `ariticle_status` int(11) NOT NULL COMMENT '0为正常文章，非0代表文章已经被删除，数字表示删除时间',
  PRIMARY KEY  (`ariticle_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `ariticle`
--

INSERT INTO `ariticle` (`ariticle_id`, `ariticle_title`, `ariticle_type`, `ariticle_content`, `ariticle_add_at`, `ariticle_status`) VALUES
(11, '沱沱基地直供优选蓝莓', 1, '<p>&nbsp;&nbsp; <img style="width:466px;height:274px;" alt="" src="/static/ueditor/php/upload/31081379936351.jpg" width="422" height="233"/></p><p>	<span style="font-family:Microsoft YaHei;font-size:16px;">沱沱工社4大蓝莓的优越条件</span> </p><p>	<span style="font-family:Microsoft YaHei;font-size:16px;">①得天独厚的地理环境</span> </p><p>	<span style="font-family:Microsoft YaHei;font-size:16px;">辽宁省丹东地区五龙山风景区的五龙背，因山形似龙，而种植基地就选择在五龙的背上。该地区有常年的</span><span style="font-family:Microsoft YaHei;font-size:16px;">地下温泉，土壤湿润，气候温和</span><span style="font-family:Microsoft YaHei;font-size:16px;">，正是蓝莓最适合的气候环境。</span> </p><p>	<span style="font-family:Microsoft YaHei;font-size:16px;">②独特气候</span> </p><p>	<span style="font-family:Microsoft YaHei;font-size:16px;">中纬度地带，属暖温带亚湿润季风型气候四季分明，是东北地区最温暖最湿润的地方，素有&quot;北方江南&quot;、&quot;东北苏杭&quot;之称，堪称旅游避暑的胜地。</span> </p><p>	<span style="font-family:Microsoft YaHei;font-size:16px;">③大兴安岭土壤培育</span> </p><p>	<span style="font-family:Microsoft YaHei;font-size:16px;">为了保持蓝莓的营养价值和天然特性，所有种植园的土壤都是从千里之遥的大兴安岭茂密的松树林中采来的，土壤都是经过若干年松树枝和松果落地腐烂混合成的土，特别适合蓝莓所需要的各种营养成分。</span> </p><p>	<span style="font-family:Microsoft YaHei;font-size:16px;">④天然山泉灌溉</span><br/><span style="font-family:Microsoft YaHei;font-size:16px;">种植园采用纯天然的地下水，配合现代化的滴灌技术进行养护，当时取水当时用。肥料采专家特备配制的生物和有机肥。</span> </p><p>	<span style="font-family:Microsoft YaHei;font-size:16px;"></span>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img alt="" src="/static/ueditor/php/upload/59901379936351.jpg" width="584" height="463"/></p><p><br/></p>', 1379936353, 0),
(12, '生鱼片拼盘', 1, '<h1>	<span style="font-size:18px;">菜系：</span><a target="_blank" href="http://baike.baidu.com/view/42660.htm"><span style="font-size:18px;">日本料理</span></a> </h1><p>	<span style="font-size:18px;">菜名：生鱼片拼盘</span> </p><p>	<span style="font-size:18px;">原料：各种生鱼片各50克（</span><span style="font-size:18px;"><a href="http://www.tootoo.cn/product-1031260.html" target="_blank"><span style="color:#FF9900;">金枪鱼</span></a></span><span style="font-size:18px;">、<a href="http://www.tootoo.cn/product-1044472.html" target="_blank"><span style="color:#FF9900;">三文鱼</span></a>、</span><span style="font-size:18px;">师鱼、<a href="http://www.tootoo.cn/product-1042324.html" target="_blank"><span style="color:#FF9900;">鲷鱼</span></a>、目鱼、海胆、</span><span style="font-size:18px;"><a href="http://www.tootoo.cn/product-1023859.html" target="_blank"><span style="color:#FF9900;">甜虾</span></a>、蟹籽等）、<a href="http://www.tootoo.cn/product-1035080.html" target="_blank"><span style="color:#FF9900;">萝卜泥</span></a>、</span><span style="font-size:18px;">200克、<a href="http://www.tootoo.cn/product-1021036.html" target="_blank"><span style="color:#FF9900;">柠檬</span></a></span><span style="font-size:18px;">1个、大叶5张、芥末</span><span style="font-size:18px;">适量</span> </p><p>	<span style="font-size:18px;">制作：</span> </p><p>	<span style="font-size:18px;">1．将所有鱼片切成所需形状，下垫萝卜丝摆盘。</span> </p><p>	<span style="font-size:18px;">2．将黄瓜、柠檬</span><span style="font-size:18px;">挖空放入海胆、蟹籽装入盛器中。</span> </p><p>	<span style="font-size:18px;">3．根据审美观点摆放，以大叶、柠檬片等作装饰用。</span> </p><p>	<span style="font-size:18px;">4．</span><span style="font-size:18px;">跟上芥末粉，生鱼片酱油即可。</span> </p><p>	<img src="/static/ueditor/php/upload/89821379936383.jpg" alt=""/> </p><p>	<span style="font-size:18px;"> </span><span style="font-size:18px;">生鱼片也就是刺身、沙西米。所以用的海鲜食材必须要有新鲜度，此外部位选择，刀工技巧都是美味的关键。正确的刺身品尝法是将适量的芥末抹在生鱼片上，再夹起生鱼片，将侧边蘸上少许酱油，也可搭配一</span><span style="font-size:18px;">些萝卜丝一起入口。</span> </p><p style="font-family:Simsun;font-size:14px;line-height:22px;text-align:left;white-space:normal;background-color:#FFFFFF;">	<strong style="font-family:&#39;sans serif&#39;, tahoma, verdana, helvetica;font-size:12px;line-height:18px;text-align:-webkit-auto;"><span style="font-size:18px;">营养价值</span></strong> </p><p style="font-family:Simsun;font-size:14px;line-height:22px;text-align:left;white-space:normal;background-color:#FFFFFF;">	<span style="font-size:18px;">1.三文鱼中含有丰富的不饱和脂肪酸，能有效降低血脂和血胆固醇，防治心血管疾病，所含的Ω-3脂肪酸更是脑部、视网膜及神经系统所必不可少的物质，有增强脑功能、防治老年痴呆和预防视力减退的功效；</span> </p><p style="font-family:Simsun;font-size:14px;line-height:22px;text-align:left;white-space:normal;background-color:#FFFFFF;">	<span style="font-size:18px;">2.三文鱼能有效地预防诸如糖尿病等慢性疾病的发生、发展，具有很高的营养价值，享有“水中珍品”的美誉。</span> </p><p style="font-family:Simsun;font-size:14px;line-height:22px;text-align:left;white-space:normal;background-color:#FFFFFF;">	<strong style="font-family:&#39;sans serif&#39;, tahoma, verdana, helvetica;font-size:12px;line-height:18px;text-align:-webkit-auto;"><span style="font-size:18px;">食用功效</span></strong> </p><p></p><p style="font-family:Simsun;font-size:14px;line-height:22px;text-align:left;white-space:normal;background-color:#FFFFFF;">	<span style="font-size:18px;">三文鱼肉有补虚劳、健脾胃、暖胃和中的功能；可治消瘦、水肿、消化不良等症。</span> </p><p><span style="font-size:18px;"></span> </p><p>	<strong><span style="font-size:18px;">适用人群</span></strong> </p><p style="font-family:Simsun;font-size:14px;line-height:22px;text-align:left;white-space:normal;background-color:#FFFFFF;">	<span style="font-size:18px;">适合心血管疾病患者和脑力劳动者；适合患有消瘦、水肿、消化不良等症人群。</span> </p><p><br/></p>', 1379936384, 0),
(13, '  沱沱工社蔬菜水果漂流记', 1, '<p style="text-align:justify;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img alt="" src="http://img01.ttmimg.com/news/images/upimg/2013/07/30/113948_480419.png" width="400" height="244"/> </p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 在多年前，人们诧异于从网上能够订购一瓶可乐。但现在，可乐这种标品早已不再是电商们关注的主要话题，在网上买生鱼片、新鲜牛排正成为最新的潮流。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">\r\n	　　但生鲜食品的物流和配送是所有商品中物流系统复杂程度最高、管理最难的，传统商超在这方面尚且没有足够优秀的解决方案。在家乐福、沃尔玛等大型超市\r\n中，一到下午几乎就有一堆烂菜堆在摊上无人问津。大多数物流尚靠第三方平台支撑的电商企业（部分电商所谓的自建物流其实是同城快递，能够做到异地物流的只\r\n有寥寥几家）在这个领域中更是难有作为。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　目前只有少数几家垂直生鲜品类电商能够做到从产出到仓储到配送的全产业链运营，这几家也成为了网易科技关注的焦点。近日，网易科技的小编亲自体验了生鲜蔬菜水果从仓库到客户手中的物流配送全过程。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　仓库里的春夏秋冬</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　这并不是笔者第一次体验电商平台组织的物流配送体验活动，不过在此之前所参观的内容基本上局限于仓库内的信息化流程。但生鲜电商对仓储和物流的需求与传统电商完全不同，能够真正全程冷链将生鲜产品交到消费者手中的电商平台着实不多。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　在7月的一个炎热中午，笔者踏上了体验物流之路，也在短短的几个小时里体验了春夏秋冬四个不同季节。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　此次参观的垂直电商沱沱工社的仓库，此仓库离市区大概一个小时左右车程，据随行的工作人员介绍，仓库特意选择了一个周边无工厂且近高速公路的地方，目的是避免污染以及运输方便。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">\r\n	　　此时是下午2点左右，穿越暴烈的日光，一进仓库首先就是加工间，这里的温度大概保持在10度到15度左右。刚刚进来的蔬菜正在被十几个工作人员有条不\r\n紊的分配，在线条上分为几个流程：细检（韭菜之类的蔬菜进行预先处理，不好的叶子拿掉）、分拣、配菜、称重等几个环节。从这个现场基本可以看到目前沱沱工\r\n社的蔬菜水果分为两个来源：沱沱工社自有农场以及合作基地。很多消费者好奇从网上买到的水果基本个头大小都差不多，这是因为在送至仓库之前，水果品类已经\r\n根据大小进行了初步的分拣。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　根据随行人员的介绍，水果和蔬菜在每天下午2点左右到达仓库，每天一到两次。在进行简单的分配之后进入仓库，第二天早上的时候离开仓库。日常的库存总量在10吨左右。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">\r\n	　　目前沱沱工社有三个仓库，两个是保存生鲜的仓库：临时的保鲜库，温度在0度到4度之间；冷冻库，温度在-18度到-22度。刚刚被高温和低温反复摧残\r\n了一顿的笔者看着仓库口的白气也只敢远远的眺望一下。在另一侧则是常温库，这个库主要存放巧克力、鸡蛋、面粉和大米等一些需要常温保存的食品，温度大概在\r\n15度-18度左右。和生鲜库相比，常温库的食品周转相对较慢，基本上会在3天到5天之间。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　在笔者体验的过程中，订单部门并没有员工上班，这是因为订单部的工作基本上都是在下午开始上班，一直到凌晨，半夜的时候是订单部最忙碌的时候。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　三种箱子三个角色</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　在离开仓库之前，笔者发现在墙边堆放着大小颜色不同的几个箱子，随后仓库的工作人员向笔者介绍了几种箱子的不同用途。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　绿箱子：在箱子中间还有一个筐，在筐和箱子之间则是蓄冷剂，这样的模式是防止蓄冷剂和蔬菜水果直接接触将蔬果冻坏，箱内温度大概在10度左右。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　黄箱子：这个箱子则是蓄冷剂和货品一起放，里面基本上会是鲜奶类产品，箱内温度在5度左右。如果需要储存冷冻食品，则会放入其他的蓄冷剂，箱内温度会保持在-18度左右。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　红包：由于在送货上门的时候消费者选取的货品可能有多种冷藏模式，所以这个红包内用保温层分成了三个格子，在送货上门的时候把不同品类分别放置。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　据介绍，一个标准送货员的配备会是两个绿箱子、两个黄箱子以及一个红包。但如果有的消费者单一货品比较多（比如都是水果），送货员也会选择直接带绿箱子上门。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　上门配送：一单超20分钟</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　由于时间的限制，笔者无法跟随冷库车从仓库到配送站之间的过程，但在笔者即将奔赴配送站的时候一辆刚从农场过来的蔬菜车正好停在门口，笔者进入冷库车体验了一下，虽然下午还处于一个暴晒的阶段，但冷库车内的温度大概保持在15度左右，还是非常凉爽的。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">\r\n	　　在随后的配送环节中，跟随的相关工作人员帮助联系了多家配送站，但由于生鲜品类对配送时间的精确度要求以及北京糟糕的路况，连续四五单当我们赶到时，\r\n送货流程都已经结束了。在拥堵的北京市区内来回奔袭了两个小时后，笔者终于在文慧桥附近的一个小区“逮”到了沱沱工社的一个快递员，根据其介绍，因为品类\r\n的要求，绝大多数沱沱工社的产品都是配送到住宅，所以对时间的准确性有很高的要求。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">\r\n	　　此次送货的终点是小区中三楼的一个住户，收货的是一个女士。由于这一单中全部是水果，快递员决定直接带着绿箱子上门。在拆箱的过程中，尽管那位女士看\r\n起来已经多次购买产品，但快递员依然要求必须把所有的货品一样样打开进行检查。在检查的过程中，发现有两个桃子因为挤压的原因质量看起来已经不太好了，快\r\n递员将这两个桃子取走并且告诉那位女士第二天会派人再送新的桃子上门。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　在体验结束后笔者又再次购买了两单沱沱工社的产品，并且也购买了两家其他电商平台的生鲜产品。沱沱工社的快递员每次都会要求将产品打开，但当笔者要求可以不检验时，快递员也顺水推舟的表示不用再打开看了。而另两家电商平台的快递则没有要求对产品进行开箱检查。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　笔者随后查看了时间，这一单处理的时间刚刚超过20分钟，据快递员介绍，沱沱工社每一单处理的时间都大概在20分钟至30分钟之间，有一些比较慢的用户甚至需要30-40分钟左右。这也造成了目前沱沱工社快递员目前收入相对较低，因为每天能处理的单数比较少。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　在沱沱工社里，生鲜品类从农场到消费者手中的全流程如下：</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　蔬菜（水果、肉类除了采摘时间外大致相同）：采摘（凌晨）——分类包装（上午）——冷库车（中午）——冷库暂存（下午）——处理区（下午）——冷库（下午至第二天凌晨）——冷库车（次日晨）——配送站（次日晨）——绿（黄、红）箱子——消费者</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　最后写一下体验中的感受：还是吃不上当天的菜</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　1、生鲜电商的产品绝大多数为非标品，生鲜电商的选品实际是剥夺了消费者的选择权，这样的体验永远无法改变。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　2、低端生鲜产品利润太低，如果自己没有生产渠道，几乎谈不上盈利。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　3、生鲜电商最大的利润亏损点在于消费者的退换货，这一领域又是自建农场的好处（消费者退回来的菜或者一些品质不太好的水果可以通过饲料的方式进行二次转化，浪费比较少）。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　4、生鲜电商无法改变农业甚至往小了说有机农业，它只能改变一定区域内一定消费品质的群体，所以生鲜电商必须本地化。电商平台如果试图利用生鲜电商提供粘性来吸引消费者，那就可以洗洗睡了。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　5、互联网上的大多数买卖是鼠标加水泥，生鲜电商至少要有90%以上的水泥，玩生鲜电商的人可以不懂互联网技术，但必须要懂农产品。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　6、别以为生鲜电商你就能吃上当天从地头里摘下来的菜，除非有一天哆啦a梦的任意门或者类似的传输技术实现，否则你能吃到昨天采摘的菜就已经算是非常新鲜的了。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　生鲜电商者说:大型电商不会为1%营业额下100%的力气</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　配送体验当日，笔者拜访了沱沱工社在北京的总部，和沱沱工社CEO杜非就物流体系做了简单沟通，他介绍了沱沱工社目前情况，笔者归纳有以下几个要点：</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　1、沱沱工社在最初建立时并不仅仅只有北京一个城市，还有上海和深圳，最后因为配送范围的原因回缩到北京，主要是考虑到配送范围必须在4到6个小时之内，生鲜食品才能有最好的体验。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　2、目前最重要的三大业务范围：农场、仓库、配送。这三个领域在未来都可能给合作商去做，现在的员工在未来会成为中坚力量。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　2、目前沱沱总体损耗不足5%，这个数字仅仅为去年的六分之一，主要原因是对品类有所控制。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　4、目前沱沱所有产品都是全冷链配送（这一点在小编的体验中得到了部分验证）。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　5、蔬菜和其他品类不一样，大多数时候是看天吃饭的，所以有的时候会有库存量猛增的困扰，这时候一般就会采用多种营销手段。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　6、正计划扩展到全国，目前正在各地做小订单测试。</p><p style="text-align:left;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　7、沱沱现在处于阶段性盈利的过程。</p><p style="text-align:center;padding-bottom:0px;widows:2;text-transform:none;background-color:#ffffff;text-indent:0px;margin:15pt 0px;padding-left:0px;letter-spacing:normal;padding-right:0px;font:17px/24px STHeiti, Arial;white-space:normal;orphans:2;color:#000000;word-spacing:0px;padding-top:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;">	　　针对大型平台电商都进入生鲜电商，杜非意味深长的表示：“大型电商平台不会为了1%的营业去下100%的力气。”（文/孙宏超）</p><p><br/></p>', 1379936418, 0),
(14, '沱沱推荐天津宝坻富硒大蒜', 1, '<p style="text-align:center;">	<span style="font-family:Microsoft YaHei;font-size:16px;"><strong>&nbsp;</strong></span><span style="font-family:Microsoft YaHei;font-size:16px;"><strong>四千年的历史孕育着神奇的“宝地”</strong></span> </p><p>	&nbsp;<img style="height: 368.543px; width: 665px;" alt="" src="/static/ueditor/php/upload/87521379936441.jpg"/> </p><p>	&nbsp;</p><p>	<span style="font-family:Microsoft YaHei;font-size:16px;">四千年的历史孕育着神奇的“宝地”。</span><br/><span style="font-family:Microsoft YaHei;font-size:16px;">四百多年前的清廷，宝坻李家占半边，俗称“李半朝”。</span><br/><span style="font-family:Microsoft YaHei;font-size:16px;">贸易的兴旺，文化的昌盛，人杰地灵的宝坻赢得了“京东第一集”的美誉。</span><br/><span style="font-family:Microsoft YaHei;font-size:16px;">合作社选择种植区域经国土部门检测第四纪以来经历过2次海侵，专家鉴定特殊古地理位置是一兰梓大蒜长期保持优良品质的关键。物理化学条件变化较大，同时土壤中含有大量的Se，合作社独特的种植技术使产品达到富Se农产品。硒----生命之火。</span> </p><p>	<span style="font-family:Microsoft YaHei;font-size:16px;">&nbsp;<img style="height: 297.812px; width: 665px;" alt="" src="/static/ueditor/php/upload/15351379936442.jpg"/></span><span style="font-family:Microsoft YaHei;font-size:16px;">&nbsp;</span> </p><p>	<span style="font-family:Microsoft YaHei;font-size:16px;">富硒蒜怎么吃最有效</span> </p><p>	<span style="font-family:Microsoft YaHei;font-size:16px;">1、大蒜宜生食</span><br/><span style="font-family:Microsoft YaHei;font-size:16px;">2、食用大蒜最好捣碎成泥，而不是用刀切成碎末。</span><br/><span style="font-family:Microsoft YaHei;font-size:16px;">3、蒜泥现在室温放置10-15分钟，让蒜氨酸与蒜酶在空气中充分结合产生大蒜素后再食用，效果最好。</span><br/><span style="font-family:Microsoft YaHei;font-size:16px;">专家认为，大蒜所以能有这么多有益作用，主要因为它含有蒜氨酸与蒜酶这两种有效物质，这两种成份分别存在于新鲜大蒜细胞里，就会产生一种没有颜色的油滑液体即大蒜素。</span> </p><p>	<span style="font-family:Microsoft YaHei;font-size:16px;"></span></p><p>	<span style="font-family:Microsoft YaHei;font-size:16px;"></span><img style="height: 344.375px; width: 665px;" alt="" src="/static/ueditor/php/upload/42471379936442.jpg"/>&nbsp;</p><p>	<span style="font-family:Microsoft YaHei;font-size:16px;">宝坻红蒜的历史源远流长……</span> </p><p>	<span style="font-family:Microsoft YaHei;font-size:16px;">&nbsp;&nbsp;&nbsp;&nbsp;\r\n \r\n清初，苏浙一带丝绸刺绣业用蒜汁向丝绸上沾巾花样，不污绢，不发霉，不变色，防虫蛀。传统绢花，亦非用宝坻蒜汁作粘接剂不可。因宝坻大蒜汁透明，味淡不熏\r\n眼，名誉大江南北，故非它不用。清朝中后期面积逐渐扩大，成为宫廷贡蒜，名扬全国。1973年，宝坻大蒜向日本和东南亚国家出口。自此，宝坻大蒜以其质量\r\n好，产量高闻名全国，并进入国际市场。1989年天津市委书记、市长李瑞环同志调入中央工作后，把宝坻大蒜带到中南海分发给中央领导同志品尝，得到了中央\r\n领导高度评价。从那以后，中南海基地每年把宝坻大蒜作为中南海特供品种。</span> </p><p>	<span style="font-family:Microsoft YaHei;font-size:16px;"></span> <br/></p><p><br/></p>', 1379936443, 0),
(15, '星级配送员评选', 2, '<p>123123123<br/></p>', 1379937003, 0),
(17, '123123123123213', 2, '<p>123123<br/></p>', 1379937026, 0),
(18, '沱沱工社蔬菜水果漂流记', 2, '<p>123123<br/></p>', 1379937034, 0),
(19, 'sdfsdf', 2, '<p>sdfsdf<br/></p>', 1379937359, 0);

-- --------------------------------------------------------

--
-- 表的结构 `collect`
--

CREATE TABLE IF NOT EXISTS `collect` (
  `collect_id` int(11) NOT NULL auto_increment COMMENT '收藏id',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `goods_id` int(11) NOT NULL COMMENT '货物id',
  `collect_at` int(11) NOT NULL COMMENT '收藏添加时间',
  `collect_status` int(11) NOT NULL COMMENT '收藏状态，0正常，1被删除',
  PRIMARY KEY  (`collect_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `collect`
--

INSERT INTO `collect` (`collect_id`, `user_id`, `goods_id`, `collect_at`, `collect_status`) VALUES
(4, 7, 34, 1374828837, 0),
(10, 2, 9, 1382583445, 0);

-- --------------------------------------------------------

--
-- 表的结构 `commend`
--

CREATE TABLE IF NOT EXISTS `commend` (
  `commend_id` int(11) NOT NULL auto_increment,
  `commend_type` int(11) NOT NULL COMMENT '推荐类型',
  `goods_id` int(11) NOT NULL COMMENT '物品ID',
  `commend_at` int(11) NOT NULL COMMENT '推荐时间',
  PRIMARY KEY  (`commend_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=113 ;

--
-- 转存表中的数据 `commend`
--

INSERT INTO `commend` (`commend_id`, `commend_type`, `goods_id`, `commend_at`) VALUES
(30, 7, 1, 1375066237),
(34, 7, 13, 1375066278),
(32, 7, 4, 1375066250),
(33, 7, 10, 1375066261),
(35, 7, 30, 1375066360),
(40, 4, 35, 1375066441),
(37, 3, 33, 1375066394),
(38, 3, 28, 1375066399),
(39, 3, 27, 1375066403),
(41, 4, 21, 1375066451),
(43, 5, 13, 1375066478),
(44, 5, 42, 1375066484),
(71, 3, 91, 1379502005),
(47, 1, 11, 1375066537),
(48, 1, 23, 1375066591),
(52, 2, 90, 1375088523),
(53, 2, 84, 1375088530),
(51, 6, 91, 1375088506),
(54, 2, 80, 1375088540),
(55, 2, 78, 1375088548),
(56, 6, 76, 1375088558),
(57, 6, 74, 1375088569),
(58, 6, 72, 1375088573),
(59, 6, 69, 1375088578),
(60, 4, 65, 1375088623),
(61, 4, 63, 1375088629),
(62, 3, 62, 1375088647),
(63, 3, 59, 1375088656),
(64, 5, 58, 1375088669),
(65, 5, 53, 1375088674),
(66, 5, 48, 1375088678),
(67, 6, 78, 1375243464),
(68, 1, 16, 1375243521),
(70, 1, 9, 1378516646),
(72, 6, 90, 1379731332),
(73, 7, 29, 1379731347),
(74, 2, 91, 1379812637),
(75, 2, 90, 1379812639),
(76, 8, 91, 1379813300),
(77, 8, 89, 1379813308),
(78, 8, 88, 1379813310),
(79, 8, 86, 1379813312),
(80, 8, 85, 1379813314),
(81, 8, 84, 1379813316),
(82, 8, 91, 1379813319),
(83, 8, 78, 1379813321),
(84, 8, 58, 1379813330),
(85, 8, 56, 1379813332),
(86, 8, 55, 1379813334),
(87, 8, 54, 1379813336),
(88, 8, 48, 1379813338),
(89, 9, 91, 1379814503),
(90, 9, 90, 1379814506),
(91, 10, 85, 1379815126),
(92, 10, 80, 1379815129),
(93, 6, 91, 1379815383),
(94, 6, 89, 1379815386),
(95, 6, 86, 1379815389),
(96, 6, 78, 1379815392),
(97, 6, 46, 1379815402),
(98, 7, 91, 1379815454),
(99, 7, 90, 1379815457),
(100, 7, 89, 1379815459),
(101, 9, 88, 1379815460),
(102, 7, 87, 1379815463),
(103, 7, 82, 1379815466),
(104, 7, 81, 1379815468),
(105, 7, 80, 1379815470),
(106, 7, 79, 1379815472),
(107, 9, 88, 1379815873),
(108, 9, 78, 1379815876),
(109, 10, 79, 1379815887),
(110, 9, 81, 1379815915),
(111, 10, 85, 1379816176),
(112, 1, 92, 1379937998);

-- --------------------------------------------------------

--
-- 表的结构 `commend_in_index`
--

CREATE TABLE IF NOT EXISTS `commend_in_index` (
  `cii_id` int(11) NOT NULL auto_increment,
  `cii_goods_id` int(11) NOT NULL,
  `cii_img` varchar(255) NOT NULL,
  `cii_add_at` int(11) NOT NULL,
  PRIMARY KEY  (`cii_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `commend_in_index`
--

INSERT INTO `commend_in_index` (`cii_id`, `cii_goods_id`, `cii_img`, `cii_add_at`) VALUES
(16, 34, 'upload/20130904/1378263847-2110.jpg', 1378263847),
(10, 18, 'upload/20130904/1378262656-4731.jpg', 1378262656),
(9, 15, 'upload/20130904/1378262650-3807.jpg', 1378262650),
(8, 3, 'upload/20130904/1378262637-1061.jpg', 1378262637),
(14, 9, 'upload/20130904/1378263761-6826.jpg', 1378263761),
(19, 85, 'upload/20130904/1378263992-6366.jpg', 1378263992),
(17, 91, 'upload/20130904/1378263875-6006.jpg', 1378263875),
(18, 22, 'upload/20130904/1378263896-6638.jpg', 1378263896);

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL auto_increment,
  `comment_by` int(11) NOT NULL COMMENT '评论人',
  `comment_at` int(11) NOT NULL COMMENT '评论时间',
  `goods_id` int(11) NOT NULL COMMENT '评论商品id',
  `comment_content` varchar(255) NOT NULL COMMENT '评论内容',
  `comment_score` int(11) NOT NULL COMMENT '用户评分',
  PRIMARY KEY  (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_by`, `comment_at`, `goods_id`, `comment_content`, `comment_score`) VALUES
(1, 7, 1374827119, 39, '应该把综合评分默认成5', 1),
(2, 7, 1374827494, 39, '收藏本站能搞成一步的吗？', 5),
(3, 2, 1375277313, 91, 'fdsjfdjspfjdspfjerojgrejgprejgrejgpwjgporejgojrepgjgjwperjgpwgjwg<><><><><><><><><\\"\\"\\''\\''\\''\\''\\''\\"\\"\\"\\"\\"dfdsfdsf\\"', 4),
(4, 3, 1375332189, 74, 'gfdgfdgfdg', 4),
(5, 6, 1375332447, 62, '反对个梵蒂冈', 4),
(6, 2, 1375423474, 84, '挺新鲜的，不错', 5),
(7, 2, 1376040504, 41, '<script>alert(\\''\\'')</script>', 4);

-- --------------------------------------------------------

--
-- 表的结构 `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `delivery_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL COMMENT '订单提交人员id',
  `delivery_address` varchar(255) character set utf8 NOT NULL COMMENT '用户地址',
  `delivery_phone` varchar(32) character set utf8 NOT NULL COMMENT '用户联系方式',
  `delivery_name` varchar(64) character set utf8 NOT NULL COMMENT '用户姓名',
  `delivery_status` int(11) NOT NULL COMMENT '配送地址状态，非表示删除时间 0为正常',
  `delivery_add_at` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY  (`delivery_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `goods_id` int(11) NOT NULL auto_increment,
  `goods_location` int(11) NOT NULL,
  `goods_type` int(11) NOT NULL COMMENT '货物类型,1蔬菜 2水果',
  `goods_name` varchar(255) NOT NULL COMMENT '商品名称',
  `goods_category` varchar(255) NOT NULL COMMENT '分类',
  `goods_ad` varchar(255) NOT NULL COMMENT '广告语',
  `goods_img_60x60` varchar(255) NOT NULL,
  `goods_img_220x220` varchar(255) NOT NULL,
  `goods_img_300x300` varchar(255) NOT NULL,
  `goods_price` double NOT NULL default '0',
  `goods_price_weight` int(11) NOT NULL COMMENT '想对于价格goods_price的货物重量',
  `goods_weight_min` int(11) NOT NULL COMMENT '货物重量最小值',
  `goods_weight_max` int(11) NOT NULL COMMENT '货物重量重大值',
  `goods_img` varchar(255) NOT NULL COMMENT '商品图片',
  `goods_add_by` int(11) NOT NULL COMMENT '商品添加人',
  `goods_add_at` int(11) NOT NULL COMMENT '商品添加时间',
  `goods_edit_at` int(11) NOT NULL COMMENT '最后一次编辑时间',
  `goods_score` int(11) NOT NULL default '4',
  `goods_total_comment` int(11) default '0',
  `goods_promotion` int(11) NOT NULL default '100' COMMENT '促销，也就是打多少折',
  `goods_read_times` int(11) NOT NULL default '0' COMMENT '物品被预览的次数',
  `goods_sale_times` int(11) NOT NULL default '0' COMMENT '物品销售的次数',
  `goods_status` int(11) NOT NULL default '0' COMMENT '0正常 非零为删除时间',
  PRIMARY KEY  (`goods_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='商品表' AUTO_INCREMENT=99 ;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`goods_id`, `goods_location`, `goods_type`, `goods_name`, `goods_category`, `goods_ad`, `goods_img_60x60`, `goods_img_220x220`, `goods_img_300x300`, `goods_price`, `goods_price_weight`, `goods_weight_min`, `goods_weight_max`, `goods_img`, `goods_add_by`, `goods_add_at`, `goods_edit_at`, `goods_score`, `goods_total_comment`, `goods_promotion`, `goods_read_times`, `goods_sale_times`, `goods_status`) VALUES
(1, 1, 2, '黄冠梨', '', '', 'upload/20130731/1375241806-1000.jpg', 'upload/20130731/1375241806-1001.jpg', 'upload/20130731/1375241806-1002.jpg', 4.58, 500, 800, 1200, 'upload/20130726/1374816937-9203.jpg', 2, 1374816937, 0, 4, 0, 100, 7, 3, 0),
(2, 1, 0, '', '', '', 'upload/20130731/1375241806-1003.', 'upload/20130731/1375241806-1004.', 'upload/20130731/1375241806-1005.', 3.4, 600, 600, 700, '', 2, 1374817068, 1374817324, 4, 0, 100, 0, 0, 1374817352),
(3, 1, 2, '冰糖麒麟', '', '', 'upload/20130731/1375241806-1006.jpg', 'upload/20130731/1375241806-1007.jpg', 'upload/20130731/1375241806-1008.jpg', 3, 500, 7000, 8000, 'upload/20130726/1374817122-8693.jpg', 2, 1374817122, 1374817176, 4, 0, 100, 4, 2, 0),
(4, 1, 2, '冰糖麒麟', '', '', 'upload/20130731/1375241806-1009.jpg', 'upload/20130731/1375241806-1010.jpg', 'upload/20130731/1375241806-1011.jpg', 3, 500, 3000, 3500, 'upload/20130726/1374817420-9887.jpg', 2, 1374817420, 0, 4, 0, 100, 1, 1, 0),
(5, 1, 2, '冰糖心苹果', '', '', 'upload/20130731/1375241806-1012.jpg', 'upload/20130731/1375241806-1013.jpg', 'upload/20130731/1375241807-1014.jpg', 5, 500, 600, 700, 'upload/20130726/1374817480-5846.jpg', 2, 1374817480, 0, 4, 0, 100, 2, 1, 0),
(6, 1, 2, '雪花梨', '', '', 'upload/20130731/1375241807-1015.jpg', 'upload/20130731/1375241807-1016.jpg', 'upload/20130731/1375241807-1017.jpg', 3.4, 600, 600, 750, 'upload/20130726/1374817580-5438.jpg', 2, 1374817580, 0, 4, 0, 100, 0, 0, 0),
(7, 1, 2, '青苹果', '', '', 'upload/20130731/1375241807-1018.jpg', 'upload/20130731/1375241807-1019.jpg', 'upload/20130731/1375241807-1020.jpg', 5, 500, 500, 700, 'upload/20130726/1374817687-6455.jpg', 2, 1374817687, 0, 4, 0, 100, 1, 0, 0),
(8, 1, 2, '哈密瓜', '', '', 'upload/20130731/1375241807-1021.jpg', 'upload/20130731/1375241808-1022.jpg', 'upload/20130731/1375241808-1023.jpg', 3.4, 600, 3000, 4000, 'upload/20130726/1374817812-1928.jpg', 2, 1374817812, 0, 4, 0, 100, 0, 0, 0),
(9, 1, 2, '哈密瓜', '', '', 'upload/20130731/1375241808-1024.jpg', 'upload/20130731/1375241808-1025.jpg', 'upload/20130731/1375241808-1026.jpg', 5, 500, 4500, 5500, 'upload/20130726/1374817848-9311.jpg', 2, 1374817848, 0, 4, 0, 100, 12, 0, 0),
(10, 1, 2, '李子', '', '', 'upload/20130731/1375241808-1027.jpg', 'upload/20130731/1375241808-1028.jpg', 'upload/20130731/1375241808-1029.jpg', 3.4, 600, 500, 500, 'upload/20130726/1374817931-2177.jpg', 2, 1374817931, 0, 4, 0, 100, 1, 0, 0),
(11, 1, 2, '甜杏', '103', '味道鲜美，不限您马接', 'upload/20131001/1380632382-10052.jpg', 'upload/20131001/1380632382-11624.jpg', 'upload/20131001/1380632382-11916.jpg', 5, 500, 500, 500, 'upload/20131001/1380632382-1551.jpg', 2, 1374818004, 1380632382, 4, 0, 25, 18, 1, 0),
(12, 1, 2, '沙果', '', '', 'upload/20130731/1375241809-1033.jpg', 'upload/20130731/1375241809-1034.jpg', 'upload/20130731/1375241809-1035.jpg', 5, 500, 500, 500, 'upload/20130726/1374818086-7804.jpg', 2, 1374818086, 0, 4, 0, 100, 0, 0, 0),
(13, 1, 2, '十三陵红富士', '', '', 'upload/20130731/1375241809-1036.jpg', 'upload/20130731/1375241809-1037.jpg', 'upload/20130731/1375241809-1038.jpg', 6.99, 500, 800, 1000, 'upload/20130726/1374818200-2654.jpg', 2, 1374818200, 0, 4, 0, 100, 0, 0, 0),
(14, 1, 2, '香梨', '', '', 'upload/20130731/1375241809-1039.jpg', 'upload/20130731/1375241809-1040.jpg', 'upload/20130731/1375241809-1041.jpg', 9.99, 500, 500, 700, 'upload/20130726/1374818287-3839.jpg', 2, 1374818287, 0, 4, 0, 100, 0, 0, 0),
(15, 1, 2, '特价桂圆', '', '', 'upload/20130816/1376619783-10327.jpg', 'upload/20130816/1376619783-11109.jpg', 'upload/20130816/1376619783-11720.jpg', 11.8, 500, 500, 500, 'upload/20130816/1376619783-1129.jpg', 2, 1374818395, 1376619783, 4, 0, 100, 1, 0, 0),
(16, 1, 2, '火龙果', '', '', 'upload/20130731/1375241809-1045.jpg', 'upload/20130731/1375241809-1046.jpg', 'upload/20130731/1375241809-1047.jpg', 6, 500, 400, 600, 'upload/20130726/1374818408-5485.jpg', 2, 1374818408, 0, 4, 0, 100, 1, 0, 0),
(17, 1, 2, '台芒', '', '', 'upload/20130731/1375241809-1048.jpeg', 'upload/20130731/1375241809-1049.jpeg', 'upload/20130731/1375241809-1050.jpeg', 7.99, 500, 400, 600, 'upload/20130726/1374818507-1506.jpeg', 2, 1374818507, 0, 4, 0, 100, 0, 0, 0),
(18, 1, 2, '象牙芒', '', '', 'upload/20130731/1375241810-1051.jpg', 'upload/20130731/1375241810-1052.jpg', 'upload/20130731/1375241810-1053.jpg', 9.99, 500, 500, 600, 'upload/20130726/1374818565-2882.jpg', 2, 1374818565, 0, 4, 0, 100, 0, 0, 0),
(19, 1, 2, '红金龙苹果', '', '', 'upload/20130731/1375241810-1054.jpg', 'upload/20130731/1375241810-1055.jpg', 'upload/20130731/1375241810-1056.jpg', 15.8, 500, 600, 800, 'upload/20130726/1374818679-8499.jpg', 2, 1374818679, 0, 4, 0, 100, 0, 0, 0),
(20, 1, 2, '奥芒', '', '', 'upload/20130731/1375241810-1057.jpg', 'upload/20130731/1375241810-1058.jpg', 'upload/20130731/1375241810-1059.jpg', 9.99, 500, 400, 600, 'upload/20130726/1374818879-7598.jpg', 2, 1374818879, 0, 4, 0, 100, 0, 0, 0),
(21, 1, 2, '奥芒', '', '', 'upload/20130731/1375241810-1060.jpg', 'upload/20130731/1375241810-1061.jpg', 'upload/20130731/1375241810-1062.jpg', 9.99, 500, 1000, 1400, 'upload/20130726/1374818891-3025.jpg', 2, 1374818891, 0, 4, 0, 100, 1, 0, 0),
(22, 1, 2, '大久保桃', '', '', 'upload/20130731/1375241810-1063.jpg', 'upload/20130731/1375241810-1064.jpg', 'upload/20130731/1375241810-1065.jpg', 6.99, 500, 500, 700, 'upload/20130726/1374818970-1781.jpg', 2, 1374818970, 0, 4, 0, 100, 1, 0, 0),
(23, 1, 2, '绿化玖桃', '', '', 'upload/20130731/1375241810-1066.jpg', 'upload/20130731/1375241810-1067.jpg', 'upload/20130731/1375241810-1068.jpg', 4.99, 500, 500, 700, 'upload/20130726/1374819509-6147.jpg', 2, 1374819509, 0, 4, 0, 100, 4, 0, 0),
(24, 1, 2, '进口红提', '', '', 'upload/20130731/1375241810-1069.jpg', 'upload/20130731/1375241810-1070.jpg', 'upload/20130731/1375241811-1071.jpg', 11.8, 500, 400, 600, 'upload/20130726/1374819691-2660.jpg', 2, 1374819691, 0, 4, 0, 100, 0, 0, 0),
(25, 1, 2, '进口红提', '', '', 'upload/20130731/1375241811-1072.jpg', 'upload/20130731/1375241811-1073.jpg', 'upload/20130731/1375241811-1074.jpg', 11.8, 500, 700, 800, 'upload/20130726/1374819703-8876.jpg', 2, 1374819703, 0, 4, 0, 100, 0, 0, 0),
(26, 1, 2, '红土地木瓜，详谈书画', '', '味道鲜美，不限您马接', 'upload/20130731/1375241811-1075.jpg', 'upload/20130731/1375241811-1076.jpg', 'upload/20130731/1375241811-1077.jpg', 6, 500, 400, 600, 'upload/20130726/1374819825-9448.jpg', 2, 1374819825, 1379819146, 4, 0, 100, 0, 0, 0),
(27, 1, 2, '红土地木瓜，详谈书画', '', '味道鲜美，不限您马接', 'upload/20130731/1375241811-1078.jpg', 'upload/20130731/1375241811-1079.jpg', 'upload/20130731/1375241811-1080.jpg', 6, 500, 900, 1100, 'upload/20130726/1374819835-5770.jpg', 2, 1374819835, 1379819172, 4, 0, 100, 1, 1, 0),
(28, 1, 2, '布朗李子', '', '李子营销策划 - 豆丁网', 'upload/20130731/1375241811-1081.jpg', 'upload/20130731/1375241811-1082.jpg', 'upload/20130731/1375241811-1083.jpg', 7.99, 500, 1000, 1000, 'upload/20130726/1374819948-5450.jpg', 2, 1374819948, 1379819088, 4, 0, 100, 0, 0, 0),
(29, 1, 2, '橘子', '', '', 'upload/20130731/1375241811-1084.jpg', 'upload/20130731/1375241811-1085.jpg', 'upload/20130731/1375241811-1086.jpg', 10, 500, 900, 1100, 'upload/20130726/1374820045-4952.jpg', 2, 1374820045, 0, 4, 0, 100, 0, 0, 0),
(30, 1, 2, '水蜜桃', '', '', 'upload/20130731/1375241812-1087.jpg', 'upload/20130731/1375241812-1088.jpg', 'upload/20130731/1375241812-1089.jpg', 8.99, 500, 900, 1100, 'upload/20130726/1374820185-4066.jpg', 2, 1374820185, 0, 4, 0, 100, 0, 0, 0),
(31, 1, 2, '樱桃', '', '', 'upload/20130731/1375241812-1090.jpg', 'upload/20130731/1375241812-1091.jpg', 'upload/20130731/1375241812-1092.jpg', 78, 500, 500, 500, 'upload/20130726/1374820365-9331.jpg', 2, 1374820365, 0, 4, 0, 100, 1, 0, 0),
(32, 1, 2, '蜜杏', '', '', 'upload/20130731/1375241812-1093.jpg', 'upload/20130731/1375241812-1094.jpg', 'upload/20130731/1375241812-1095.jpg', 16.8, 500, 500, 500, 'upload/20130726/1374820478-1247.jpg', 2, 1374820478, 0, 4, 0, 100, 0, 0, 0),
(33, 1, 2, '凤梨', '100', '菠萝菠萝蜜广告词', 'upload/20130731/1375241812-1096.jpg', 'upload/20130731/1375241812-1097.jpg', 'upload/20130731/1375241813-1098.jpg', 9.99, 500, 1800, 2500, 'upload/20130726/1374820577-1627.jpg', 2, 1374820577, 1379845332, 4, 0, 50, 2, 1, 0),
(34, 1, 2, '美国橙', '', '', 'upload/20130731/1375241813-1099.jpg', 'upload/20130731/1375241813-1100.jpg', 'upload/20130731/1375241813-1101.jpg', 19.8, 500, 800, 1100, 'upload/20130726/1374820699-2332.jpg', 2, 1374820699, 0, 4, 0, 100, 0, 0, 0),
(35, 1, 2, '榴莲', '', '', 'upload/20130731/1375241813-1102.jpg', 'upload/20130731/1375241813-1103.jpg', 'upload/20130731/1375241813-1104.jpg', 9.99, 500, 2000, 5000, 'upload/20130726/1374820841-4175.jpg', 2, 1374820841, 0, 4, 0, 100, 0, 0, 0),
(36, 1, 2, '榴莲肉', '', '', 'upload/20130731/1375241813-1105.jpg', 'upload/20130731/1375241813-1106.jpg', 'upload/20130731/1375241813-1107.jpg', 35, 500, 250, 400, 'upload/20130726/1374820917-2603.jpg', 2, 1374820917, 0, 4, 0, 100, 1, 0, 0),
(37, 1, 2, '大兴西瓜(半个)', '', '', 'upload/20130731/1375241813-1108.jpg', 'upload/20130731/1375241813-1109.jpg', 'upload/20130731/1375241814-1110.jpg', 0.99, 500, 5000, 7000, 'upload/20130726/1374821017-4226.jpg', 2, 1374821017, 1374821111, 4, 0, 100, 1, 0, 0),
(38, 1, 2, '大兴西瓜（半个）', '', '', 'upload/20130731/1375241814-1111.jpg', 'upload/20130731/1375241814-1112.jpg', 'upload/20130731/1375241814-1113.jpg', 0.99, 500, 7000, 10000, 'upload/20130726/1374821049-7839.jpg', 2, 1374821049, 1374821147, 4, 0, 100, 4, 0, 0),
(39, 1, 2, '大兴西瓜（一个）', '', '', 'upload/20130731/1375241814-1114.jpg', 'upload/20130731/1375241814-1115.jpg', 'upload/20130731/1375241814-1116.jpg', 0.99, 500, 5000, 10000, 'upload/20130726/1374821216-3976.jpg', 2, 1374821216, 1374821319, 3, 2, 100, 0, 0, 0),
(40, 1, 0, '大兴西瓜（一个）', '', '', 'upload/20130731/1375241814-1117.jpg', 'upload/20130731/1375241814-1118.jpg', 'upload/20130731/1375241814-1119.jpg', 0.99, 500, 5000, 10000, 'upload/20130726/1374821239-1410.jpg', 2, 1374821239, 0, 4, 0, 100, 0, 0, 1374821260),
(41, 1, 2, '硒沙瓜（半个）', '', '', 'upload/20130731/1375241815-1120.jpg', 'upload/20130731/1375241815-1121.jpg', 'upload/20130731/1375241815-1122.jpg', 1.58, 500, 3500, 5000, 'upload/20130726/1374821585-1448.jpg', 2, 1374821585, 1374821639, 4, 1, 100, 0, 0, 0),
(42, 1, 2, '硒沙瓜（一个）', '', '', 'upload/20130731/1375241815-1123.jpg', 'upload/20130731/1375241816-1124.jpg', 'upload/20130731/1375241816-1125.jpg', 1.58, 500, 7500, 10000, 'upload/20130726/1374821609-1043.jpg', 2, 1374821609, 1374821629, 4, 0, 100, 2, 0, 0),
(43, 1, 1, '快菜', '', '', 'upload/20130731/1375241816-1126.jpg', 'upload/20130731/1375241816-1127.jpg', 'upload/20130731/1375241816-1128.jpg', 3, 500, 500, 500, 'upload/20130729/1375084523-9596.jpg', 2, 1375084523, 0, 4, 0, 100, 1, 0, 0),
(44, 1, 1, '小白菜', '', '', 'upload/20130731/1375241816-1129.jpg', 'upload/20130731/1375241816-1130.jpg', 'upload/20130731/1375241816-1131.jpg', 2.8, 500, 300, 400, 'upload/20130729/1375085356-4308.jpg', 2, 1375085356, 0, 4, 0, 100, 0, 0, 0),
(45, 1, 1, '油麦菜', '', '', 'upload/20130731/1375241816-1132.jpg', 'upload/20130731/1375241816-1133.jpg', 'upload/20130731/1375241816-1134.jpg', 2.8, 500, 500, 500, 'upload/20130729/1375085439-8235.jpg', 2, 1375085439, 0, 4, 0, 100, 0, 0, 0),
(46, 1, 1, '空心菜', '', '', 'upload/20130731/1375241816-1135.jpg', 'upload/20130731/1375241816-1136.jpg', 'upload/20130731/1375241816-1137.jpg', 2.5, 500, 200, 300, 'upload/20130729/1375085505-3156.jpg', 2, 1375085505, 0, 4, 0, 100, 1, 0, 0),
(47, 1, 1, '香芹', '', '', 'upload/20130731/1375241816-1138.jpg', 'upload/20130731/1375241816-1139.jpg', 'upload/20130731/1375241816-1140.jpg', 4, 500, 350, 450, 'upload/20130729/1375085594-4163.jpg', 2, 1375085594, 0, 4, 0, 100, 0, 0, 0),
(48, 1, 1, '大芹菜', '', '', 'upload/20130731/1375241817-1141.jpg', 'upload/20130731/1375241817-1142.jpg', 'upload/20130731/1375241817-1143.jpg', 2.8, 500, 300, 450, 'upload/20130729/1375085704-8822.jpg', 2, 1375085704, 0, 4, 0, 100, 2, 0, 0),
(49, 1, 1, '西葫芦', '', '', 'upload/20130731/1375241817-1144.jpg', 'upload/20130731/1375241817-1145.jpg', 'upload/20130731/1375241817-1146.jpg', 3, 500, 500, 600, 'upload/20130729/1375085774-6109.jpg', 2, 1375085774, 0, 4, 0, 100, 0, 0, 0),
(50, 1, 1, '菜花', '', '', 'upload/20130731/1375241817-1147.jpg', 'upload/20130731/1375241817-1148.jpg', 'upload/20130731/1375241817-1149.jpg', 3.5, 500, 700, 900, 'upload/20130729/1375085817-4707.jpg', 2, 1375085817, 0, 4, 0, 100, 0, 0, 0),
(51, 1, 1, '江豆角', '', '', 'upload/20130731/1375241817-1150.jpg', 'upload/20130731/1375241817-1151.jpg', 'upload/20130731/1375241817-1152.jpg', 4, 500, 500, 500, 'upload/20130729/1375085902-3219.jpg', 2, 1375085902, 0, 4, 0, 100, 0, 0, 0),
(52, 1, 1, '蒜苗', '', '', 'upload/20130731/1375241818-1153.jpg', 'upload/20130731/1375241818-1154.jpg', 'upload/20130731/1375241818-1155.jpg', 4.5, 500, 500, 500, 'upload/20130729/1375085963-9649.jpg', 2, 1375085963, 0, 4, 0, 100, 0, 0, 0),
(53, 1, 1, '丝瓜', '', '', 'upload/20130731/1375241818-1156.jpg', 'upload/20130731/1375241818-1157.jpg', 'upload/20130731/1375241818-1158.jpg', 3.5, 500, 450, 550, 'upload/20130729/1375086020-9934.jpg', 2, 1375086020, 0, 4, 0, 100, 0, 0, 0),
(54, 1, 1, '苦瓜', '', '', 'upload/20130731/1375241818-1159.jpg', 'upload/20130731/1375241818-1160.jpg', 'upload/20130731/1375241818-1161.jpg', 3.5, 500, 200, 300, 'upload/20130729/1375086064-9553.jpg', 2, 1375086064, 0, 4, 0, 100, 0, 0, 0),
(55, 1, 1, '大白菜', '', '', 'upload/20130731/1375241819-1162.jpg', 'upload/20130731/1375241819-1163.jpg', 'upload/20130731/1375241819-1164.jpg', 1.5, 500, 1500, 1700, 'upload/20130729/1375086144-8551.jpg', 2, 1375086144, 0, 4, 0, 100, 282, 4, 0),
(56, 1, 1, '娃娃菜', '', '', 'upload/20130731/1375241819-1165.jpg', 'upload/20130731/1375241819-1166.jpg', 'upload/20130731/1375241819-1167.jpg', 2.5, 500, 800, 900, 'upload/20130729/1375086202-2609.jpg', 2, 1375086202, 0, 4, 0, 100, 14, 0, 0),
(57, 1, 1, '圆生菜', '', '', 'upload/20130731/1375241819-1168.jpeg', 'upload/20130731/1375241819-1169.jpeg', 'upload/20130731/1375241819-1170.jpeg', 3, 500, 500, 700, 'upload/20130729/1375086275-6843.jpeg', 2, 1375086275, 0, 4, 0, 100, 0, 0, 0),
(58, 1, 1, '圆白菜', '', '', 'upload/20130731/1375241819-1171.jpg', 'upload/20130731/1375241819-1172.jpg', 'upload/20130731/1375241819-1173.jpg', 1.8, 500, 600, 700, 'upload/20130729/1375086369-3684.jpg', 2, 1375086369, 0, 4, 0, 100, 0, 0, 0),
(59, 1, 1, '毛冬瓜', '', '', 'upload/20130731/1375241819-1174.jpg', 'upload/20130731/1375241819-1175.jpg', 'upload/20130731/1375241819-1176.jpg', 1.5, 500, 1200, 1500, 'upload/20130729/1375086443-2014.jpg', 2, 1375086443, 0, 4, 0, 100, 6, 0, 0),
(60, 1, 1, '大蒜', '', '', 'upload/20130731/1375241819-1177.jpg', 'upload/20130731/1375241819-1178.jpg', 'upload/20130731/1375241819-1179.jpg', 3.5, 500, 500, 500, 'upload/20130729/1375086499-4335.jpg', 2, 1375086499, 0, 4, 0, 100, 0, 0, 0),
(61, 1, 1, '姜', '', '', 'upload/20130731/1375241819-1180.jpg', 'upload/20130731/1375241820-1181.jpg', 'upload/20130731/1375241820-1182.jpg', 6, 500, 300, 400, 'upload/20130729/1375086550-5623.jpg', 2, 1375086550, 0, 4, 0, 100, 0, 0, 0),
(62, 1, 1, '油菜,一困一困的买', '', '此油菜，享受有机蔬菜', 'upload/20130731/1375241820-1183.jpg', 'upload/20130731/1375241820-1184.jpg', 'upload/20130731/1375241820-1185.jpg', 2.5, 500, 500, 500, 'upload/20130729/1375086649-7498.jpg', 2, 1375086649, 1379819218, 4, 1, 100, 1, 0, 0),
(63, 1, 1, '菠菜', '', '', 'upload/20130731/1375241820-1186.jpg', 'upload/20130731/1375241820-1187.jpg', 'upload/20130731/1375241820-1188.jpg', 3.5, 500, 500, 500, 'upload/20130729/1375086705-1541.jpg', 2, 1375086705, 0, 4, 0, 100, 3, 1, 0),
(64, 1, 1, '白不老豆角', '', '', 'upload/20130731/1375241820-1189.jpg', 'upload/20130731/1375241820-1190.jpg', 'upload/20130731/1375241820-1191.jpg', 5, 500, 500, 500, 'upload/20130729/1375086766-9557.jpg', 2, 1375086766, 0, 4, 0, 100, 0, 0, 0),
(65, 1, 1, '架豆角', '', '', 'upload/20130731/1375241820-1192.jpg', 'upload/20130731/1375241820-1193.jpg', 'upload/20130731/1375241820-1194.jpg', 4, 500, 500, 500, 'upload/20130729/1375086835-8552.jpg', 2, 1375086835, 0, 4, 0, 100, 1, 0, 0),
(66, 1, 1, '尖椒', '', '', 'upload/20130731/1375241820-1195.jpg', 'upload/20130731/1375241820-1196.jpg', 'upload/20130731/1375241820-1197.jpg', 3.5, 500, 450, 550, 'upload/20130729/1375086894-4416.jpg', 2, 1375086894, 0, 4, 0, 100, 0, 0, 0),
(67, 1, 1, '圆椒', '', '', 'upload/20130731/1375241821-1198.jpg', 'upload/20130731/1375241821-1199.jpg', 'upload/20130731/1375241821-1200.jpg', 3.5, 500, 300, 350, 'upload/20130729/1375086952-3379.jpg', 2, 1375086952, 0, 4, 0, 100, 0, 0, 0),
(68, 1, 1, '圆茄子', '', '', 'upload/20130731/1375241821-1201.jpg', 'upload/20130731/1375241821-1202.jpg', 'upload/20130731/1375241821-1203.jpg', 2.8, 500, 500, 700, 'upload/20130729/1375087028-8590.jpg', 2, 1375087028, 0, 4, 0, 100, 0, 0, 0),
(69, 1, 1, '长茄子', '', '', 'upload/20130731/1375241821-1204.jpg', 'upload/20130731/1375241821-1205.jpg', 'upload/20130731/1375241821-1206.jpg', 3.5, 500, 400, 550, 'upload/20130729/1375087091-3676.jpg', 2, 1375087091, 0, 4, 0, 100, 0, 0, 0),
(70, 1, 1, '地瓜', '', '', 'upload/20130731/1375241821-1207.jpg', 'upload/20130731/1375241821-1208.jpg', 'upload/20130731/1375241821-1209.jpg', 3.5, 500, 450, 550, 'upload/20130729/1375087144-5941.jpg', 2, 1375087144, 0, 4, 0, 100, 0, 0, 0),
(71, 1, 1, '洋葱', '', '', 'upload/20130731/1375241821-1210.jpg', 'upload/20130731/1375241821-1211.jpg', 'upload/20130731/1375241822-1212.jpg', 2, 500, 250, 350, 'upload/20130729/1375087195-4983.jpg', 2, 1375087195, 0, 4, 0, 100, 0, 0, 0),
(72, 1, 1, '胡萝卜', '', '', 'upload/20130731/1375241822-1213.jpg', 'upload/20130731/1375241822-1214.jpg', 'upload/20130731/1375241822-1215.jpg', 2.5, 500, 450, 550, 'upload/20130729/1375087249-8958.jpg', 2, 1375087249, 0, 4, 0, 100, 444, 55, 0),
(73, 1, 1, '土豆', '', '', 'upload/20130731/1375241822-1216.jpg', 'upload/20130731/1375241822-1217.jpg', 'upload/20130731/1375241822-1218.jpg', 2.2, 500, 450, 550, 'upload/20130729/1375087293-4672.jpg', 2, 1375087293, 0, 4, 0, 100, 2, 0, 0),
(74, 1, 1, '莲菜', '', '', 'upload/20130731/1375241823-1219.jpg', 'upload/20130731/1375241823-1220.jpg', 'upload/20130731/1375241823-1221.jpg', 4.5, 500, 350, 450, 'upload/20130729/1375087359-1894.jpg', 2, 1375087359, 0, 4, 1, 100, 0, 0, 0),
(75, 1, 1, '香葱', '1,4', '', 'upload/20130731/1375241823-1222.jpg', 'upload/20130731/1375241823-1223.jpg', 'upload/20130731/1375241823-1224.jpg', 7.5, 500, 100, 100, 'upload/20130729/1375087419-2173.jpg', 2, 1375087419, 1379846312, 4, 0, 5, 4, 0, 0),
(76, 1, 1, '韭菜', '1,4', '李子营销策划 - 豆丁网', 'upload/20130731/1375241823-1225.jpg', 'upload/20130731/1375241823-1226.jpg', 'upload/20130731/1375241823-1227.jpg', 2.5, 500, 500, 500, 'upload/20130729/1375087461-1091.jpg', 2, 1375087461, 1379845739, 4, 0, 90, 1, 0, 0),
(77, 1, 1, '大葱', '', '', 'upload/20130731/1375241823-1228.jpg', 'upload/20130731/1375241823-1229.jpg', 'upload/20130731/1375241823-1230.jpg', 2.5, 500, 300, 400, 'upload/20130729/1375087520-4898.jpg', 2, 1375087520, 0, 4, 0, 100, 1, 0, 0),
(78, 1, 1, '金瓜', '1', '您好啊', 'upload/20130731/1375241823-1231.jpg', 'upload/20130731/1375241823-1232.jpg', 'upload/20130731/1375241824-1233.jpg', 2, 500, 1200, 1500, 'upload/20130729/1375087578-5742.jpg', 2, 1375087578, 1379846251, 4, 0, 60, 24, 3, 0),
(79, 1, 1, '水果玉米', '', '', 'upload/20130731/1375241824-1234.jpg', 'upload/20130731/1375241824-1235.jpg', 'upload/20130731/1375241824-1236.jpg', 2.5, 500, 300, 400, 'upload/20130729/1375087636-2768.jpg', 2, 1375087636, 0, 4, 0, 100, 0, 0, 0),
(80, 1, 1, '护子瓜', '', '', 'upload/20130731/1375241824-1237.jpg', 'upload/20130731/1375241824-1238.jpg', 'upload/20130731/1375241824-1239.jpg', 3.5, 500, 500, 1000, 'upload/20130729/1375087775-6085.jpg', 2, 1375087775, 0, 4, 0, 100, 0, 0, 0),
(81, 1, 1, '木耳菜', '', '', 'upload/20130731/1375241824-1240.jpg', 'upload/20130731/1375241824-1241.jpg', 'upload/20130731/1375241824-1242.jpg', 3.5, 500, 500, 500, 'upload/20130729/1375087875-3925.jpg', 2, 1375087875, 0, 4, 0, 100, 0, 0, 0),
(82, 1, 1, '水果黄瓜', '12', '', 'upload/20130731/1375241824-1243.jpg', 'upload/20130731/1375241824-1244.jpg', 'upload/20130731/1375241824-1245.jpg', 3, 500, 350, 450, 'upload/20130729/1375087928-1414.jpg', 2, 1375087928, 1379836381, 4, 0, 100, 0, 0, 0),
(83, 1, 1, '白萝卜', '4,7,10', '李子营销策划 - 豆丁网', 'upload/20130731/1375241825-1246.jpg', 'upload/20130731/1375241825-1247.jpg', 'upload/20130731/1375241825-1248.jpg', 2, 500, 900, 1000, 'upload/20130729/1375087985-1743.jpg', 2, 1375087985, 1379841984, 4, 0, 95, 3, 0, 0),
(84, 1, 1, '冬瓜（一块）', '', '', 'upload/20130731/1375241826-1249.jpg', 'upload/20130731/1375241826-1250.jpg', 'upload/20130731/1375241826-1251.jpg', 1.5, 500, 1000, 2000, 'upload/20130729/1375088045-1439.jpg', 2, 1375088045, 0, 5, 1, 100, 3, 0, 0),
(85, 1, 1, '红椒', '', '', 'upload/20130731/1375241826-1252.jpg', 'upload/20130731/1375241826-1253.jpg', 'upload/20130731/1375241826-1254.jpg', 7, 500, 450, 550, 'upload/20130729/1375088118-3268.jpg', 2, 1375088118, 0, 4, 0, 100, 3, 0, 0),
(86, 1, 1, '线椒', '', '', 'upload/20130731/1375241826-1255.jpg', 'upload/20130731/1375241826-1256.jpg', 'upload/20130731/1375241826-1257.jpg', 7, 500, 500, 500, 'upload/20130729/1375088184-8348.jpg', 2, 1375088184, 0, 4, 0, 100, 3, 0, 0),
(87, 1, 1, '香菇', '', '菠萝菠萝蜜广告词', 'upload/20130731/1375241827-1258.jpg', 'upload/20130731/1375241827-1259.jpg', 'upload/20130731/1375241827-1260.jpg', 10, 500, 500, 500, 'upload/20130729/1375088261-2552.jpg', 2, 1375088261, 1379819427, 4, 0, 100, 0, 0, 0),
(88, 1, 1, '茶树菇', '1,4,7,10', '此油菜，享受有机蔬菜', 'upload/20130731/1375241827-1261.jpg', 'upload/20130731/1375241827-1262.jpg', 'upload/20130731/1375241827-1263.jpg', 10, 500, 500, 500, 'upload/20130729/1375088308-6558.jpg', 2, 1375088308, 1379834456, 4, 0, 100, 1, 0, 0),
(89, 1, 1, '金针菇', '', '您好啊', 'upload/20130731/1375241827-1264.jpg', 'upload/20130731/1375241827-1265.jpg', 'upload/20130731/1375241827-1266.jpg', 2.5, 150, 150, 150, 'upload/20130729/1375088383-6154.jpg', 2, 1375088383, 1379819398, 4, 0, 100, 8, 0, 0),
(90, 1, 1, '黄瓜', '', ' 全天然,无污染', 'upload/20130731/1375241827-1267.jpg', 'upload/20130731/1375241827-1268.jpg', 'upload/20130731/1375241827-1269.jpg', 2.8, 500, 400, 500, 'upload/20130729/1375088434-5680.jpg', 2, 1375088434, 1379818716, 4, 0, 100, 8, 0, 0),
(91, 1, 1, '水果名称', '', '您好啊', 'upload/20130731/1375241827-1270.jpg', 'upload/20130731/1375241827-1271.jpg', 'upload/20130731/1375241827-1272.jpg', 1.8, 500, 400, 500, 'upload/20130729/1375088491-5807.jpg', 2, 1375088491, 1379818319, 4, 1, 100, 21, 1, 0),
(92, 1, 1, '桂圆', '7,10', '味道鲜美，不限您马接', 'upload/20130922/1379833324-10382.jpeg', 'upload/20130922/1379833324-11685.jpeg', 'upload/20130922/1379833324-11375.jpeg', 11, 111, 222, 2222, 'upload/20130922/1379833324-9925.jpeg', 2, 1379833324, 1379846529, 4, 0, 100, 167, 3, 0),
(93, 1, 1, '桂圆', '8,11', '味道鲜美，不限您马接', 'upload/20130922/1379833337-10656.jpeg', 'upload/20130922/1379833337-11591.jpeg', 'upload/20130922/1379833337-11579.jpeg', 11, 111, 222, 2222, 'upload/20130922/1379833337-7832.jpeg', 2, 1379833337, 1379846510, 4, 0, 100, 425, 45, 0),
(94, 1, 1, '桂圆', '1,4,10', '全天然,无污染', 'upload/20130922/1379833867-10070.jpeg', 'upload/20130922/1379833867-11975.jpeg', 'upload/20130922/1379833867-11528.jpeg', 2.5, 111, 222, 2222, 'upload/20130922/1379833867-2008.jpeg', 2, 1379833867, 1379846491, 4, 0, 100, 34, 0, 0),
(95, 0, 2, '您好啊', '100,103,104,106,109', '味道鲜美，不限您马接', 'upload/20130922/1379834096-10940.jpeg', 'upload/20130922/1379834096-11050.jpeg', 'upload/20130922/1379834096-11233.jpeg', 6, 111, 222, 2222, 'upload/20130922/1379834096-3233.jpeg', 2, 1379834096, 0, 4, 0, 100, 0, 0, 0),
(96, 0, 2, '您好啊', '100,103,104,106,109', '味道鲜美，不限您马接', 'upload/20130922/1379834102-10414.jpeg', 'upload/20130922/1379834102-11140.jpeg', 'upload/20130922/1379834102-11147.jpeg', 6, 111, 222, 2222, 'upload/20130922/1379834102-3283.jpeg', 2, 1379834102, 0, 4, 0, 100, 0, 0, 0),
(97, 1, 2, '您好啊', '100,103,104,106,109', '味道鲜美，不限您马接', 'upload/20130922/1379834114-10591.jpeg', 'upload/20130922/1379834114-11114.jpeg', 'upload/20130922/1379834114-11955.jpeg', 6, 111, 222, 2222, 'upload/20130922/1379834114-6416.jpeg', 2, 1379834114, 1379846477, 4, 0, 100, 4325, 323, 0),
(98, 1, 1, '您好啊', '1,4,7,10,11', '味道鲜美，不限您马接', 'upload/20130922/1379841831-10744.jpeg', 'upload/20130922/1379841831-11510.jpeg', 'upload/20130922/1379841831-11239.jpeg', 11, 111, 222, 2222, 'upload/20130922/1379841831-2442.jpeg', 2, 1379841831, 1379843841, 4, 0, 90, 33335558, 44444, 0);

-- --------------------------------------------------------

--
-- 表的结构 `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL auto_increment COMMENT '自增主键',
  `order_add_by` int(11) NOT NULL COMMENT '订单添加人',
  `order_add_at` int(11) NOT NULL COMMENT '订单添加时间 ',
  `send_to_address` varchar(255) NOT NULL COMMENT '收货地址',
  `send_to_phone` varchar(32) NOT NULL COMMENT '联系人电话',
  `send_to_name` varchar(32) NOT NULL COMMENT '收货人名称',
  `send_time` int(11) NOT NULL COMMENT '期望配送时间',
  `order_status` int(11) NOT NULL COMMENT '订单状态，0正常，1已经删除',
  PRIMARY KEY  (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13640280 ;

-- --------------------------------------------------------

--
-- 表的结构 `order_goods`
--

CREATE TABLE IF NOT EXISTS `order_goods` (
  `id` int(11) NOT NULL auto_increment,
  `order_id` int(11) NOT NULL COMMENT '订单id',
  `goods_id` int(11) NOT NULL,
  `number` int(11) NOT NULL COMMENT '具体购买数量',
  `have_comment` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=124 ;

-- --------------------------------------------------------

--
-- 表的结构 `shopping_cart`
--

CREATE TABLE IF NOT EXISTS `shopping_cart` (
  `sc_id` int(11) NOT NULL auto_increment,
  `goods_id` int(11) NOT NULL COMMENT '物品ID',
  `number` int(11) NOT NULL COMMENT '购买份数',
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `sc_at` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY  (`sc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=118 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL auto_increment COMMENT '用户id',
  `user_name` varchar(255) NOT NULL COMMENT '用户名',
  `user_password` varchar(255) NOT NULL COMMENT '用户密码',
  `user_add_at` int(11) NOT NULL COMMENT '用户注册时间',
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- 表的结构 `vc_client`
--

CREATE TABLE IF NOT EXISTS `vc_client` (
  `vc_client_id` int(11) NOT NULL auto_increment,
  `vc_client_ip` varchar(32) character set utf8 NOT NULL COMMENT '客户端ip',
  `vc_client_times` int(11) NOT NULL default '0' COMMENT '客户端验证码输入错误次数',
  `vc_client_add_at` int(11) NOT NULL COMMENT '日期，注意不是时间',
  PRIMARY KEY  (`vc_client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='某个IP某天错误登陆或者注册的次数' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `vc_client`
--

INSERT INTO `vc_client` (`vc_client_id`, `vc_client_ip`, `vc_client_times`, `vc_client_add_at`) VALUES
(10, '127.0.0.1', 8, 20130928),
(11, '127.0.0.1', 1, 20130930),
(12, '127.0.0.1', 2, 20131024);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
