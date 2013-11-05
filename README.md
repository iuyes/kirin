PHP开源电子商务网站
=====

本项目是一个PHP开源电子商务网站，本站点适合那些按重量对外配送的商品(特别是蔬菜和水果，配送重量跟用户要求不一定想吻合的情况),当然，你也该改动一些代码，从而让他支持所有的商品。

本项目的来源历史如下：

2013.06 我离开百度外出创立两点一刻公司，从事冷鲜配送行业。由于资金问题，公司于2013.10底解散，创业失败。

把这个项目共享只是给小创业者提供一个平台，也许某个创业者能够通过这个平台减少了创业的成本，这也给作者一个小小的欣慰。


安装方式:

1. 请将sql/kirin.sql source到数据库中，我开发的时候用的数据库为mysql

2. 请将源代码放到apache的跟目录（如果不是apache的话，需要web server支持.htaccess）

3. apache配置文件conf/apache_vhosts.conf中增加如下配置：
   （请根据实际需求配置下面的路径）
    <VirtualHost kirin.com:8080>
        ServerAdmin webmaster@dummy-host2.example.com
        DocumentRoot "/home/work/Webroot/kirin"
        ServerName kirin.com
        ErrorLog "/home/work/Logs/kirin-error_log"
        CustomLog "/home/work/Logs/kirin-access_log" common
    </VirtualHost>  

4. 请跟该一些配置文件
   
   config/AdminConfig.php 这个是配置管理员的（管理员必须是注册用户）
   config/DBConfig.php 这个配置数据连接
   config/FeeConfig.php 这个配置配送费用
   config/LocationConfig 这个配置经营范围
   config/PhoneConfig.php 这个配置订单通知手机
   model/SmsHelper.php 配置一下短信接口，我用的是中国网建短信接口   //可选，配置错误无法发送短信

后续开发：

我打算以后不断完善这个系统，增加商品支持，做一个能够买卖任何商品的免费电子商务系统，如果您有兴趣的话，可以联系我跟我一同开发

联系方式: niujiaming0819@gmail.com

QQ: 947847775
