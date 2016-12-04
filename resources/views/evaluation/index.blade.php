@extends('layout.master')

@section('title', '职业测评')

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/views/evaluation/css/index.css"/>
@endsection

@section('main')
    <div id="evaluation_main">
        <div class="evaluation_sidebar col-sm-3">
            <ul>
                <li><a data-type="holland">霍兰德测评</a></li>
                <li><a data-type="mbti">MBTI测评</a></li>
            </ul>
        </div>
        <div id="holland">
            <div class="evaluation_introduce col-sm-7" style="display: none;">
                <h2>霍兰德测评简介</h2>
                <p>
                    Finderway平台为你提供优质的测评服务，并利用测评向你推荐职业
                    Finderway平台为你提供优质的测评服务，并利用测评向你推荐职业
                    Finderway平台为你提供优质的测评服务，并利用测评向你推荐职业
                    Finderway平台为你提供优质的测评服务，并利用测评向你推荐职业
                    Finderway平台为你提供优质的测评服务，并利用测评向你推荐职业
                </p>
                <p>
                    Finderway平台为你提供优质的测评服务，并利用测评向你推荐职业
                    Finderway平台为你提供优质的测评服务，并利用测评向你推荐职业
                    Finderway平台为你提供优质的测评服务，并利用测评向你推荐职业
                    Finderway平台为你提供优质的测评服务，并利用测评向你推荐职业
                    Finderway平台为你提供优质的测评服务，并利用测评向你推荐职业
                </p>
                <p>
                    Finderway平台为你提供优质的测评服务，并利用测评向你推荐职业
                    Finderway平台为你提供优质的测评服务，并利用测评向你推荐职业
                    的测评服务，并利用测评向你推荐职业
                    Finderway平台为你提供优质的测评服务，并利用测评向你推荐职业
                    Finderway平台为你提供优质的测评服务，并利用测评向你推荐职业
                </p>
                <p>
                    Finderway平台为你提供优质的测评服务，并利用测评向你推荐职业
                    Finderway平台为你提供优质的测评服务，并利用测评向你推荐职业
                    并利用测评向你推荐职业
                    Finderway平台为你提供优质的测评服务，并利用测评向你推荐职业
                    Finderway平台为你提供优质的测评服务，并利用测评向你推荐职业
                </p>
                <p>
                    Finderway平台为你提供优质的测评服务，并利用测评向你推荐职业
                    Finderway平台为你提供优质的测评服务，并利用测评向你推荐职业
                    Finderway平台为你提利用测评向你推荐职业
                    Finderway平台为你提供优质的测评服务，并利用测评向你推荐职业
                    Finderway平台为你提供优质的测评服务，并利用测评向你推荐职业
                </p>
                <button type="button" class="btn btn-info start_evaluation">开始测评</button>
            </div>
            <div class="evaluation_question col-sm-7" style="display: none;">
                <ul class="evaluation_question_pages"></ul>
                <ul class="evaluation_question_select"></ul>
                <hr/>
                <button class="btn btn-info next-pages" curPages="1">下一页</button>
            </div>
            <div class="evaluation_result col-sm-9" style="display: none;">
                <div class="container">
                    <div class="col-sm-7">
                        <h2>测评结果</h2>
                        <p class="evaluation_result_content">正在获取。。。</p>
                    </div>
                    <div class="col-sm-5">
                        <div id="evaluation_results_img" style="width: 100%;height: 300px;"></div>
                    </div>
                    <div class="col-sm-12">
                        <h3>推荐职业：</h3>
                        <ul class="commend_career"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <footer>
        <a>关于我们</a>
        <b>|</b>
        <a>意见反馈</a>
        <p>备案号</p>
    </footer>
@endsection

@section('script')
    @parent
    <script type="text/javascript" src="/echarts/echarts.js"></script>
    <script type="text/javascript" src="/views/evaluation/js/index.js"></script>
@endsection
