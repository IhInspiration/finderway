/**
 * Created by wdmzj on 2016/12/3.
 */
//兼容事件监听
function addEvent(node, type, handle){
    if(document.addEventListener){
        node.addEventListener(type, handle, false);
    }else if(document.attachEvent){
        node.attachEvent("on" + type, handle);
    }else{
        node["on" + type] = handle;
    }
}

//浏览器事件特性检测
function detectEventSupport(eventName) {
    var tempElement = document.createElement('div'),
        isSupported;
    eventName = 'on' + eventName;
    isSupported = (eventName in tempElement); // 使用第一种方式
    // 如果第一种方式行不通，那就来看看它是不是已知事件类型
    if(!isSupported) {
        tempElement.setAttribute(eventName, 'xxx');
        isSupported = typeof tempElement[eventName] === 'function';
    }
    // 清除掉动态创建的元素，以便内存回收
    tempElement = null;
    // 返回检测结果
    return isSupported;
}

//移除事件
function removeEvent(node, type,handle){
    if(document.removeEventListener){
        node.removeEvent(type, handle,false);
    }else if(document.detachEvent){
        node.detachEvent("on" + type, handle);
    }else{
        node["on" + type] = "";
    }
}

//添加class
function addClass(obj, cls){
    var obj_class = obj.className,//获取 class 内容.
        blank = (obj_class != '') ? ' ' : '';//判断获取到的 class 是否为空, 如果不为空在前面加个'空格'.
    added = obj_class + blank + cls;//组合原来的 class 和需要添加的 class.
    obj.className = added;//替换原来的 class.
}
//移除class
function removeClass(obj, cls){
    var obj_class = ' '+obj.className+' ';
    obj_class = obj_class.replace(/(\s+)/gi, ' ');
    var removed = obj_class.replace(' '+cls+' ', ' ');
    removed = removed.replace(/(^\s+)|(\s+$)/g, '');
    obj.className = removed;//替换原来的 class.
}
//判断class
function hasClass(obj, cls){
    var obj_class = obj.className,//获取 class 内容.
        obj_class_lst = obj_class.split(/\s+/),//通过split空字符将cls转换成数组.
        x = 0;
    for(x in obj_class_lst) {
        if(obj_class_lst[x] == cls) {//循环数组, 判断是否包含cls
            return true;
        }
    }
    return false;
}

/* 绑定鼠标滚轮事件
 addScrollEvent(回调函数);
 event.delta向上滑动为1，向下滑动为-1
 */
var addScrollEvent = (function() {
    //对event不同点进行改正（部分）
    var _eventCompat = function(e){
        var type = e.type;
        if (type == 'DOMMouseScroll' || type == 'mousewheel') {
            e.delta = (e.wheelDelta) ? e.wheelDelta / 120 : -(e.detail || 0) / 3;  //向上滑动为1，向下滑动为-1
        }
        //触发事件对象兼容
        if (e.srcElement && !e.target) {
            e.target = e.srcElement;
        }
        return e;
    };
    return function(fn){
        var type;
        //document.mozHidden在firefox中显示为false其他显示为undefined
        if (document.mozHidden !== undefined) {
            type = "DOMMouseScroll";  //firefox
        }else{
            type = "mousewheel";      //IE/Chrome/Opera/Safari
        }
        addEvent(document, type, function(event){
            event = event || window.event;
            fn.call(this, _eventCompat(event));
        });
    }
})();

//可视区域高度
function visualH(){
    return document.documentElement.clientHeight;
}

//获取ID
function reId(name){
    return document.getElementById(name);
}

//获取所有class
function reClass(name){
    return document.getElementsByClassName(name);
}

//获取所有TagName
function reTag(node, name){
    return node.getElementsByTagName(name);
}

//css3属性查看和修改兼容
function Style(){
    var _judge;
    this.retrieve = function(dom, property){
        _judge = window.getComputedStyle(dom, null);
        if(_judge[property] !== undefined){
            return window.getComputedStyle(dom, null)[property];
        }else if(_judge["-webkit-" + property] !== undefined){
            return window.getComputedStyle(dom, null)["-webkit-" + property];
        }else if(_judge["-ms-" + property] !== undefined){
            return window.getComputedStyle(dom, null)["-ms-" + property];
        }else if(_judge["-moz-" + property] !== undefined){
            return window.getComputedStyle(dom, null)["-moz-" + property];
        }else if(_judge["-o-" + property] !== undefined){
            return window.getComputedStyle(dom, null)["-o-" + property];
        }else{
            throw "error!";
        }
    };
    this.update = function(dom, property, value){
        _judge = window.getComputedStyle(dom, null);
        if(_judge[property] !== undefined){
            dom.style[property] = value;
        }else if(_judge["-webkit-" + property] !== undefined){
            dom.style["-webkit-" + property] = value;
        }else if(_judge["-ms-" + property] !== undefined){
            dom.style["-ms-" + property] = value;
        }else if(_judge["-moz-" + property] !== undefined){
            dom.style["-moz-" + property] = value;
        }else if(_judge["-o-" + property] !== undefined){
            dom.style["-o-" + property] = value;
        }else{
            throw "error!";
        }
    };
}

/**
 * 异步ajax
 * @param obj {Object}
 *      url: 请求地址 必须传入
 *      type：请求方式，默认：GET
 *      data：json格式传递数据，默认为{}
 *      success: 成功回调函数
 *      fail：失败回调函数
 */
function ajax(obj){

    if(Object.prototype.toString.call(obj) != '[object Object]'){
        throw(new TypeError("不是对象类型"));
    }

    if(!obj.url){
        throw(new ReferenceError("url未定义"));
    }

    obj.data = obj.data || {};
    obj.type = (obj.type || "GET").toUpperCase();
    params = paramsFormat(obj.data);

    var rq = new XMLHttpRequest();
    rq.onreadystatechange = function(){
        if(rq.readyState == 4){
            if(rq.status >= 200 && rq.status < 300 || rq.status == 304){
                obj.success && obj.success(rq.responseText);
            }else{
                obj.fail && obj.fail(rq.status);
            }
        }
    };

    if(obj.type == "GET"){
        rq.open("GET", obj.url + "?" + params, true);
        rq.send(null);
    }else if(obj.type == "POST"){
        rq.open("POST", obj.url, true);
        rq.setRequestHeader("Content-type", "x-www-form-urlencoded");
        rq.send(params);
    }

    //格式化参数
    function paramsFormat(data){
        var paramsArr = [];
        for(var key in data){
            paramsArr.push(key + "=" + data[key]);
        }
        return paramsArr.join("&");
    }
}