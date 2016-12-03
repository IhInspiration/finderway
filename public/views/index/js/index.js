/**
 * Created by lenovo on 2016/5/5.
 */
//页面初始化
var init = function(){
    var visualBlock = reClass("visual-block"),      //获取所有块
        upBtn = reId("up-btn"),                     //获取按钮div
        fullPage = reId("fullPage"),                //获取显示全页
        visH = visualH();                           //获取浏览器可视区域高度
    for(var i = 0, len = visualBlock.length; i < len; i++){
        visualBlock[i].parentNode.style.height = visH + "px";
    }
    upBtn.style.top = (visH - upBtn.offsetHeight) / 2 + "px";
};

init();

//检测浏览器可视窗口变化
addEvent(window, "resize", function(){
    init();
    var btnActive = reClass("active")[0];
    var link = reTag(reId("up-btn"), "a");
    for(var s = 0, len = link.length; s < len; s++){
        if(link[s] == btnActive){
            cssStyle.update(reId("fullPage"), "transform", "translate(0, -" + s * visualH() + "px)");
        }
    }
});

var cssStyle = new Style();
addScrollEvent(function(e){
    var visH = visualH(),                           //获取浏览器可视区域高度
    reg = /\-?[0-9]+\.?[0-9]*/g,                    //匹配matrix中的值
    translateY = parseInt(cssStyle.retrieve(reId("fullPage"), "transform").match(reg)[5]),
    count = parseInt(-(translateY/visH));                     //判断滚动位置
    if(!hasClass(reId("fullPage"),"transition")){
        if(e.delta > 0){
            //alert("滑轮向上滚动");
            if(count < 1){return;}
            removeClass(reTag(reId("up-btn"), "a")[count], "active");
            addClass(reTag(reId("up-btn"), "a")[count-1], "active");
            addClass(reId("fullPage"),"transition");
            cssStyle.update(reId("fullPage"), "transform", "translate(0, " + (translateY + visH) + "px)");
        }else if(e.delta < 0){
            //alert("滑轮向下滚动");
            if(count > 2){return;}
            removeClass(reTag(reId("up-btn"), "a")[count], "active");
            addClass(reTag(reId("up-btn"), "a")[count+1], "active");
            addClass(reId("fullPage"),"transition");
            cssStyle.update(reId("fullPage"), "transform", "translate(0, " + (translateY - visH) + "px)");
        }
    }

});

//左边小导航点击事件（事件委托）
addEvent(reId("up-btn"), "click", function(e){
    var li = reTag(reId("up-btn"), "li"),
        e = e || window.event,
        target = e.target || e.srcElement;
    if(target.nodeName == "UL" || target.nodeName == "DIV"){return;}
    for(var s = 0, len = li.length;s < len; s++){
        if(target == li[s]){return;}
        if(hasClass(reTag(li[s],"a")[0], "active")){
            removeClass(reTag(li[s],"a")[0], "active");
        }
        if(target.parentNode == li[s]){
            addClass(target, "active");
            addClass(reId("fullPage"),"transition");
            cssStyle.update(reId("fullPage"), "transform", "translate(0, -" + s * visualH() + "px)");
        }
    }
});

//过渡效果完成事件
(function(){
    var _eventTransitionEnd;
    if(detectEventSupport("webkitTransitionEnd")){
        _eventTransitionEnd = "webkitTransitionEnd";
    }else{
        _eventTransitionEnd = "transitionend";
    }
    addEvent(reId("fullPage"), _eventTransitionEnd,function(){
        removeClass(reId("fullPage"),"transition");
    });
})();