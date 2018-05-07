/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function dodell(id,url) {
    var form = document.myform;
    if(confirm("是否确定删除~删除后不可恢复")){
        form.action=url + "/" + id;
        form.submit();
    }
}

function dopx(px,url,id) {
    var a = px.length;
    if(a == 0){
        return;
    } else {
        var url = url+"/"+id+"/"+px;
        $.ajax({
            url:url,
            type:"get",
            async:true,
            dataType:"json",
            success:function(data){
                location=location 
            }
        });
    }
}

