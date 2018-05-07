
//驾校入驻判断
$(function(){
		$("#btn_qdrz").click(function(){
			var jxName=$("#jxName").val();
			var jxwz=$("#jxwz").val();
			var jxfzr=$("#jxfzr").val();
			var lxdh=$("#lxdh").val();
			var op=$("#select_id").val();
			var jxpxz=$("#jxpxz").val();
			var xlcd=$("#xlcd").val();
			if(jxName==""){
				alert("请填写驾校名称");
				$("#jxName").focus();
				return false;
			}
			else if(jxwz==""){
				alert("请填写驾校位置");
				$("#jxwz").focus();
				return false;
			}
			else if(jxfzr==""){
				alert("请填写负责人");
				$("#jxfzr").focus();
				return false;
			}
			else if(lxdh==""){
				alert("请填写联系电话");
				$("#lxdh").focus();
				return false;
			}
			else if(op==""){
				alert("请选择所在行业");
				return false;
			}
			else if(jxpxz==""){
				alert("请添加培训许可证");
				return false;
			}
			else if(xlcd==""){
				alert("第一个训练场地图片必须添加");
				return false;
			}
			else{
				alert("提交入驻申请成功，等待后台审核");
			}
		});
	});