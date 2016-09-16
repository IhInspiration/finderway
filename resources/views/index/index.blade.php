
@extends('layout.master')

@section('title', '主页')
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/views/index/css/index.css"/>
@endsection


@section('main')
        <div id="fullPage">
            <div id="title-block">
                <div class="visual-block">
                    <h1>Finderway</h1>
                    <p>发现只属于你的路</p>
                </div>
            </div>
            <div id="introduction-block">
                <div class="visual-block">
                    <div class="col-lg-4 col-md-4 text-center">
                        <h2>职业测评</h2>
                        <p>呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵</p>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <h2>职业介绍</h2>
                        <p>呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵</p>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <h2>学习提升</h2>
                        <p>呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵</p>
                    </div>
                </div>
            </div>
            <div id="information-block">
                <div class="visual-block">
                    <ul class="list-unstyled">
                        <li>
                            <div class="pull-left"><img class="img-circle sculpture" src="/views/index/img/ceshi.jpeg"/></div>
                            <div class="pull-left information">怎么样才能学好PHP？</div>
                        </li>
                        <li>
                            <div class="pull-left"><img class="img-circle sculpture" src="/views/index/img/ceshi.jpeg"/></div>
                            <div class="pull-left information">怎么样才能学好JavaScript？</div>
                        </li>
                        <li>
                            <div class="pull-left"><img class="img-circle sculpture" src="/views/index/img/ceshi.jpeg"/></div>
                            <div class="pull-left information">怎么样才能学好Ruby？</div>
                        </li>
                        <li>
                            <div class="pull-left"><img class="img-circle sculpture" src="/views/index/img/ceshi.jpeg"/></div>
                            <div class="pull-left information">怎么样才能学好Ruby？</div>
                        </li>
                        <li>
                            <div class="pull-left"><img class="img-circle sculpture" src="/views/index/img/ceshi.jpeg"/></div>
                            <div class="pull-left information">怎么样才能学好Ruby？</div>
                        </li>
                        <li>
                            <div class="pull-left"><img class="img-circle sculpture" src="/views/index/img/ceshi.jpeg"/></div>
                            <div class="pull-left information">怎么样才能学好Ruby？</div>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="assess-block">
                <div class="visual-block">
                    <table>
                        <tr>
                            <td>
                                <div>
                                    <h1>被等到投简历的时候才发现自己一无所有</h1>
                                    <button class="btn btn-primary">职业测评</button>
                                </div>
                            </td>
                        </tr>
                        <tr id="footer-info">
                            <td>
                                <div>
                                    <a>关于我们</a>
                                    <b>|</b>
                                    <a>意见反馈</a>
                                    <p>备案号</p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div id="up-btn">
            <ul>
                <li><a href="javascript:void(0);" class="active"></a></li>
                <li><a href="javascript:void(0);"></a></li>
                <li><a href="javascript:void(0);"></a></li>
                <li><a href="javascript:void(0);"></a></li>
            </ul>
        </div>
@endsection
@section('footer')
@endsection
@section('script')
    @parent
    <script type="text/javascript" src="/views/index/js/index.js"></script>
@endsection