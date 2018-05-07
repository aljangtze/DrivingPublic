$(document).ready(function () {
	// 全选        
/*	$("#qx").click(function () {	
	   if(this.checked){ 
		$("input[name=newslist]").each(function(){
			this.checked=true;
		  }); 
		}
		else{ 
		$("input[name=newslist]").each(function(){
			this.checked=false;
		  }); 
		} 
	});*/
	//选中个数
	$("input[name=newslist]").click(function(){
		var len = $("input:checkbox:checked").length; 
		$("#shuliang").html(len);
	});
	
});

var sum=0;
function shops(o){
	sum+=parseInt(o.checked?o.value:-o.value);
	document.getElementById('total').innerHTML=sum;
	/*window.location.href='1.php?str='+sum;*/
}