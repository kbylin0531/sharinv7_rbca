<?php require __DIR__.'/common/head.php';?>
<body>
<div id="nav">
    <div class="inside">
        <p class="name">bjyblog<span>安装向导</span></p>
        <ul class="schedule">
            <li class="number">1</li>
            <li class="word">使用协议</li>
        </ul>
        <ul class="schedule">
            <li class="number">2</li>
            <li class="word">环境检测</li>
        </ul>
        <ul class="schedule active">
            <li class="number">3</li>
            <li class="word">创建数据</li>
        </ul>
        <ul class="schedule">
            <li class="number">4</li>
            <li class="word">安装完成</li>
        </ul>
    </div>
</div>
<div id="out">
    <div class="inside">
        <div class="box create">
            <form class="form-inline" action="./index.php?c=success" method="post" >
                <h2>数据库信息</h2>
                <div class="one">
                    <label class="control-label">数据库类型</label>
                    <input class="form-control" type="text" name="DB_TYPE" value="mysqli" disabled="disabled">
                </div>
                <div class="one">
                    <label class="control-label"> 数据库服务器</label>
                    <input class="form-control" type="text" name="DB_HOST" value="127.0.0.1">
                </div>
                <div class="one">
                    <label class="control-label"> 数据库端口</label>
                    <input class="form-control" type="text" name="DB_PORT" value="3306">
                </div>
                <div class="one">
                    <label class="control-label">数据库名</label>
                    <input class="form-control" type="text" name="DB_NAME">
                </div>
                <div class="one">
                    <label class="control-label">数据库用户名</label>
                    <input class="form-control" type="text" name="DB_USER" value="root">
                </div>
                <div class="one">
                    <label class="control-label"> 数据库密码</label>
                    <input class="form-control" type="text" name="DB_PWD">
                </div>
                <div class="one">
                    <label class="control-label"> 数据表前缀</label>
                    <input class="form-control" type="text" name="DB_PREFIX" value="bjy_">
                </div>
                <p class="agree">
                    <a class="btn btn-primary" href="./index.php?c=test">上一步</a>
                    <input class="btn btn-success" type="submit" value="确认">
                </p>
            </form>
        </div>
    </div>
</div>

</body>
</html>