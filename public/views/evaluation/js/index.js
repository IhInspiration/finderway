ajax({
    url: '/views/evaluation/json/json1.json',
    success: function(data){
        localStorage.holland = data;
    }
});

ajax({
    url: '/views/test/test1.json',
    success: function(data){
        var curPages = JSON.parse(data)['curPages'];
        localStorage.answers = JSON.parse(data)['answers'];
        pagesStr(curPages);
        questionStr(curPages);
        if(curPages < 12){
            reClass('next-pages')[0].setAttribute('curPages', curPages);
        }else if(curPages == 12){
            reClass('next-pages')[0].setAttribute('curPages', curPages);
            reClass('next-pages')[0].innerText = '提交';
        }else{
            reClass("evaluation_question")[0].style = "display: none";
            reClass("evaluation_result")[0].style = "display: block";
        }
    }
});

function pagesStr(curPages){
    var pagesStr = "";
    for(var i = 1; i <= 12; i++){
        if(i < curPages){
            pagesStr += '<li class="finish">' + i + '</li>';
        }else{
            pagesStr += '<li>' + i + '</li>';
        }
    }
    reClass("evaluation_question_pages")[0].innerHTML = pagesStr;
}

function questionStr(curPages){
    var str = "";
    var holland = JSON.parse(localStorage.holland);
    for(var i = 5 * (curPages - 1) + 1, len = i + 5; i < len; i++){
        str +=
            '<li>' +
                '<span>' + i + '、' + holland[i - 1] + '</span>' +
                '<button data-answer="' + i + '-1" class="btn btn-success yesBtn">是</button>' +
                '<button data-answer="' + i + '-0" class="btn btn-warning noBtn">否</button>' +
            '</li>';
    }
    reClass("evaluation_question_select")[0].innerHTML = str;
}

addEvent(reClass("evaluation_question")[0], 'click', function(e){
    var curEvent = e.target;
    var answers = localStorage.answers.split(',');
    var dataAnswer;
    if(hasClass(curEvent, 'yesBtn')){
        curEvent.innerText = '(已选)是';
        curEvent.nextSibling.innerText = '否';
    }else if(hasClass(curEvent, 'noBtn')){
        curEvent.innerText = '(已选)否';
        curEvent.previousSibling.innerText = '是';
    }else{
        return;
    }
    dataAnswer = curEvent.getAttribute("data-answer").split('-');
    answers[dataAnswer[0] - 1] = dataAnswer[1];
    localStorage.answers = answers;
});

addEvent(reClass("next-pages")[0], 'click', function(){
    var curPages = this.getAttribute('curPages');
    console.log(localStorage.answers.split(","));
    if(localStorage.answers.split(",").length < (curPages * 5 - 1)){
        alert("你有未选择的测试题");
    }else{
        ajax({
            url: '/views/test/test2.json',
            type: 'POST',
            data: {
                "curPages": curPages,
                "answer": localStorage.answers.split(",")
            },
            success: function(data){
                var curPages = JSON.parse(data)['curPages'];
                localStorage.answers = JSON.parse(data)['answers'];
                pagesStr(curPages);
                questionStr(curPages);
                if(curPages < 12){
                    reClass('next-pages')[0].setAttribute('curPages', curPages);
                }else if(curPages == 12){
                    reClass('next-pages')[0].setAttribute('curPages', curPages);
                    reClass('next-pages')[0].innerText = '提交';
                }else{
                    reClass("evaluation_question")[0].style = "display: none";
                    reClass("evaluation_result")[0].style = "display: block";
                    // 计算方法：答对以下题号得1分，不对得0分；得分多者属于该类型现实型“是”（2，13，22，36，43），“否”（14，23， 44，47，48） 研究型“是”（ 6，8，20，30，31，42）， “否”（ 21，55， 56，58） 艺术型“是”（ 4，9， 10，17，33，34，49， 50，54）， “否”（32）社会型“是”（ 26，37， 52，59）， “否”（ 1，12，15，27，45，53） 企业型“是”（ 11，24，28，35，38，46，60）， “否”（ 3，16，25） 传统型“是”（ 7，19，29，39，41，51，57）， “否”（5，18，40） 霍兰德的职业理论，其核心假设是——人可以分为六大类: R：现实型（Realistic） I：研究型（Investigative） A：艺术型（Artistic） S：社会型（Social） E：企业型（Enterprise） C：传统型（Conventional）    R：现实型（Realistic）（技能现实）
                    var returnData = [20, 50, 80, 60, 80, 20]; //A,I,R,C,E,S 逆时针
                    createChart(returnData);
                }
            }
        });
    }
});

function createChart(data){
    var myChart = echarts.init(document.getElementById('evaluation_results_img'));
    //雷达图基础配置项
    var option = {
        title: {
            text: '职业测评图'
        },
        tooltip: {},
        legend: {
            data: ['兴趣趋向分配'],
            left: 0,
            top: 25
        },
        radar: {
            indicator: [
                { name: 'A艺术', max: 100},
                { name: 'I调研', max: 100},
                { name: 'R实际', max: 100},
                { name: 'C常规', max: 100},
                { name: 'E企业', max: 100},
                { name: 'S社会', max: 100}
            ]
        },
        series: [{
            name: '兴趣趋向分配',
            type: 'radar',
            areaStyle: {
                normal: {
                    opacity: 0.5,
                    color: new echarts.graphic.RadialGradient(0.5, 0.5, 1, [
                        {
                            color: '#7DA7F9',
                            offset: 0
                        },
                        {
                            color: '#72ACD1',
                            offset: 1
                        }
                    ])
                }
            },
            data: []
        }]
    };
    myChart.setOption(option);

    //图标数据填充
    myChart.setOption({
        series: [{
            name: '兴趣趋向分配',
            data: [{
                value: data,
                label: {
                    normal: {
                        show: true,
                        formatter:function(params) {
                            return params.value;
                        }
                    }
                }
            }]
        }]
    });
}
