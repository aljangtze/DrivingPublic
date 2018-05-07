$(function() {
    var url = $("#url").val();
    
        $("#SelectAll").click(function(){
                $("[name=subcheck]:checkbox").prop("checked",this.checked);

                var box = $("input[name='subcheck']");
                        length = box.length;
                        var str = "";
                        for(var i=0;i<length;i++) {
                            if(box[i].checked == true) {
                                str = str + "," + box[i].value;
                            }
                        }

        });
	$("[name=subcheck]:checkbox").click(function(){
		var flag=true;
		$("[name=subcheck]:checkbox").each(function(){
			if(!this.checked){
				flag=false;
			}
		});
		$("#all").prop("checked",flag);
		});
                
                $("#sqdel").click(function() {
                    var box = $("input[name='subcheck']");
                    length = box.length;
                    var str = "";
                    for(var i=0;i<length;i++) {
                        if(box[i].checked == true) {
                            str = str + "," + box[i].value;
                        }
                    }
                
                    if(str == "") {
                    alert("请选择需要删除的数据~"); 
                 } else {
                     if(confirm("是否确定删除~")) {
                         str = str.substr(1);
                         url = url + "/" + str;
                         location.href=url;
                     }
                 }
                });
});