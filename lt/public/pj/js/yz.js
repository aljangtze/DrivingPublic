/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    function dosel(id,namea,val,img) {
        var value = $("#"+id).val();
        flag = false;
        if(value == "") {
            var c = "*"+val + "不能为空";
            $("#"+namea).text(c);
            $("#"+namea).css("color","red");
        } else {
            var c = "";
            $("#"+namea).text(c);
            var image=$("<image src='"+img+"'/>");
            $("#"+namea).append(image);
            $("#"+namea).css("color","blue");
        }
    }
    


