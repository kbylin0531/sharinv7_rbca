<?php require __DIR__.'/common.php';?>
<body>
<div id="nav">
    <div class="inside">
        <p class="name">bjyadmin<span>安装向导</span></p>
        <ul class="schedule">
            <li class="number">1</li>
            <li class="word">使用协议</li>
        </ul>
        <ul class="schedule">
            <li class="number">2</li>
            <li class="word">环境检测</li>
        </ul>
        <ul class="schedule">
            <li class="number">3</li>
            <li class="word">创建数据</li>
        </ul>
        <ul class="schedule active">
            <li class="number">4</li>
            <li class="word">安装完成</li>
        </ul>
    </div>
</div>
<div id="out">
    <div class="inside">
        <div class="box agreement">
            <h2>恭喜您安装成功</h2>
            <p class="content">
                <a href="__PUBLIC__/admin.php" target="_blank">去登录后访问后台</a><br>
                <span class="admin_hint">默认账号：admin &emsp; 密码为：123456</span>
            </p>
        </div>
    </div>
</div>

</body>
</html>
