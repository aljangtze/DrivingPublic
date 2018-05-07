/*
 * 生成验证码接口
 * @returns {undefined}
 */
function doyzm(url){
    var tel = $("#phone_number").val();
        $.ajax({
            url:url + "/" + tel,
            type:"get",
            async:true,
            dataType:"json",
            success:function(data){
            }
        });
}