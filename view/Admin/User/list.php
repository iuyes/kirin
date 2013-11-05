<html>
    <head>
        <?php $this->includeTpl('Public', 'Html', 'js');?>        
        <?php $this->includeTpl('Public', 'Html', 'css');?>        
    </head>

    <body>
        <?php $this->includeTpl('Public', 'Header', 'nav');?>
        <div class="s_width center level">
            <div class="float-left" style="width: 19%;">
                <?php $this->includeTpl('Public', 'Admin', 'userinfomenu');?>
            </div>
            <div class="float-left detail" style="width: 81%;">
                <div>
                    <div class="title userinfo-title">
                        <font>用户列表</font>
                    </div>
                    <div class="border" style="width: 100%; min-height: 400px;">
                        <table class="cart-table" border="0" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <td width="10%">序号</td>
                                    <td width="12%">用户名</td>
                                    <!--td width="22%">手机号</td>
                                    <td width="30%">住址</td-->
                                    <td width="15%">注册时间</td>
                                    <td width="10%">操作</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = ($start + 1); foreach($list as $k => $v):?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo htmlspecialchars($v['user_name']);?></td>
                                        <!--td><?php echo htmlspecialchars($v['user_phone']);?></td>
                                        <td><?php echo htmlspecialchars($v['user_address']);?></td-->
                                        <td><?php echo date("Y-m-d H:i:s", htmlspecialchars($v['user_add_at']));?></td>
                                        <td><a href="<?php echo URL::encode(array('uname' => $v['user_name']), 'Admin', 'User', 'wlogin')?>">登陆</a></td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                        <div class="page">
                            <ul>
                            <?php for($i=1; $i<=ceil($total/$pagesize); $i++):?>
                                <li class="<?php if($i == $page){ echo 'page_active';}?>">
                                    <a href="<?php echo URL::encode(array('page' => $i, 'pagesize' => $pagesize), 'Admin', 'User', 'list')?>"><?php echo $i;?></a>
                                </li>
                            <?php endfor;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <?php $this->includeTpl('Public', 'Footer', 'footer');?>
    </body>
</html>
