<!doctype html>
<html>
<head>
    <title>finderway - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @section('css')
        <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap-theme.css" />
        <link rel="stylesheet" type="text/css" href="/views/layout/css/layout.css" />
    @show
</head>
<body>
    @section('nav')
        <nav class="navbar navbar-default nav-block" id="nav-block">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Finderway</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="/">首页</a></li>
                        <li><a href="/evaluation">职业测评</a></li>
                        <li><a href="/introduce">职业介绍</a></li>
                        <li><a href="/study">学习提升</a></li>
                    </ul>
                    <form class="navbar-left" role="search">
                        <div id="search-nav" class="hidden-xs">
                            <input name="search" type="text" placeholder="搜索"/>
                            <button><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <!--根据信息判断  第一部分-->
                        <li><a href="#">登录</a></li>
                        <li><a href="#">注册</a></li>
                        <!--根据信息判断  第二部分-->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                头像：姓名
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">个人中心</a></li>
                                <li><a href="#">设置</a></li>
                                <li><a href="#">注销</a></li>
                            </ul>
                        </li>
                        <!--结束-->
                    </ul>
                </div>
            </div>
        </nav>
    @show

    @section('main')
        This is the main;
    @show
    @section('footer')
        <footer>
            <div>
                <a>关于我们</a>
                <b>|</b>
                <a>意见反馈</a>
                <p>备案号</p>
            </div>
        </footer>
    @show
    @section('script')
        <script type="text/javascript" src="/jquery/jquery-1.12.3.min.js"></script>
        <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/views/layout/js/public.js"></script>
    @show
</body>
</html>