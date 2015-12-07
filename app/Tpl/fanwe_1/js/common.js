

//份额转让企业和资讯中心分类的点击事件
function ClassClick(url, id) {
    $("a[id]").removeClass("current").addClass("gray_bg");
    $("#" + id).removeClass("gray_bg").addClass("current");
    location.href = url;
}

//根据QueryString参数名称获取值
function getQueryStringByName(name) {
    var result = location.search.match(new RegExp("[\?\&]" + name + "=([^\&]+)", "i"));
    if (result == null || result.length < 1) {
        return "";
    }
    return result[1];
}
//未找到图片
function nofind(img) {
    img.src = "/skin/images/404-error.jpg";

    img.onerror = null;

}

//szh 平台导航360js代码段
$(function () {   

    $('.project-card-item .cool').hover(function () {
        $(this).addClass('flip');
    }, function () {
        $(this).removeClass('flip');
    })
})

function mobile_device_detect(url) {
    var thisOS = navigator.platform;
    var os = new Array("iPhone", "iPod", "iPad", "android", "Nokia", "SymbianOS", "Symbian", "Windows Phone", "Phone", "Linux armv71", "MAUI", "UNTRUSTED/1.0", "Windows CE", "BlackBerry", "IEMobile");
    for (var i = 0; i < os.length; i++) {
        if (thisOS.match(os[i])) {
            window.location = url;
        }

    }
    //因为相当部分的手机系统不知道信息,这里是做临时性特殊辨认
    if (navigator.platform.indexOf('iPad') != -1) {
        window.location = url;
    }
    //做这一部分是因为Android手机的内核也是Linux
    //但是navigator.platform显示信息不尽相同情况繁多,因此从浏览器下手，即用navigator.appVersion信息做判断
    var check = navigator.appVersion;
    if (check.match(/linux/i)) {
        //X11是UC浏览器的平台 ，如果有其他特殊浏览器也可以附加上条件
        if (check.match(/mobile/i) || check.match(/X11/i)) {
            window.location = url;
        }
    }
    //类in_array函数
    Array.prototype.in_array = function (e) {
        for (i = 0; i < this.length; i++) {
            if (this[i] == e)
                return true;
        }
        return false;
    }
}