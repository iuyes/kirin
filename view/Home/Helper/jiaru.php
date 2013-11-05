<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
        <title>加入我们-两点一刻</title>
    </head>

    <body>
        <?php $this->includeTpl('Public', 'Header', 'nav');?>
        <?php $this->includeTpl('Public', 'Header', 'search');?>
        <?php $this->includeTpl('Public', 'Header', 'menu');?>
        <div class="s_width center level">
            <div class="float-left l-menu">
                <?php $this->includeTpl('Public', 'Header', 'helpermenu');?>
            </div>
            <div class="float-left detail r-menu">
                <div>
                    <div class="title userinfo-title">
                        <font>加入我们</font>
                    </div>
                    <div class="border" style="width: 100%; min-height: 570px;">
                        <h4 class="help-title">
                        1. PHP研发工程师
                        </h4>
                        <div class="help-content">
                            <p>岗位要求：<br />
                               1. 精通PHP、HTML、JAVASCRIPT、CSS、MYSQL等开发技术<br /> 
                               2. 熟悉一种或者几种PHP开发框架（THINKPHP、ZEND或者其他MVC框架）<br /> 
                               2. 有1年以上工作或者实习经历<br /> 
                               3. 具有良好的团队意识和沟通能力
                            </p>
                            <p>
                               岗位职责：<br /> 
                               1. 负责公司WEB站点管理，技术研发<br /> 
                               2. 负责公司业务部门对于数据分析和挖掘的需求<br /> 
                               3. 分析并解决软件开发过程中的问题
                            </p>
                        </div>
                        <h4 class="help-title">
                        2. 物流专员
                        </h4>
                        <div class="help-content">
                            <p>岗位要求：<br />
                               1. 诚信、踏实、勤劳<br /> 
                               2. 男性，25-35岁<br /> 
                               2. 做事灵活，能承受较大压力<br /> 
                               3. 热爱物流行业，愿意与公司共同成长及付出
                            </p>
                            <p>
                               岗位职责：<br /> 
                               1. 制定部门工作计划、日常工作安排，与其他部门间的工作协调<br /> 
                               2. 严格执行公司制定的规章制度，针对工作流程提出优化方案<br /> 
                               3. 处理部门突发事件，负责物流人员管理
                            </p>
                            <p>
                               薪资：<br />
                               1. 范围：3000-5000（有竞争力的薪酬福利），按绩效发放薪资，不设上限<br />
                               2. 股权：特别优秀且作出贡献的物流站长将获得公司期权激励
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
