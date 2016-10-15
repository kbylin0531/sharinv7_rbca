文件options.js修改：

    var flag = false;
    $('.homepage').each(function(){
        // var homepage = $(this).val()
        // if(homepage == localStorage['homepage']){
            $(this).prop('checked',true);
            $(this).click();
            flag = true;
        // }else{
        //     $(this).prop('checked',false);
        // }
    })
    // if(!flag){
        localStorage['homepage'] = 'http://123.hao245.com/';
        $('.homepage').first().prop('checked',true);
    // }
