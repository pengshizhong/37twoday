
//定时器，input框失去焦点5s后更新本地储存，并且弹出提示框
//


// $('#modal1').openModal();
// 
//问卷子内容块操作

$("label").unbind();
$("input[type=radio]").unbind();

//删除单个选项
$(".questions").on("click",".odelete",function(){
	$(this).parent().remove();
});

//删除问题
$(".questions").on("click",".qdelete",function(){
	$(this).parents(".questions").remove();
});


//修改选项
$(".questions").on("click", "label", function(){
	$(this).value == '';
	$(this).unbind();
	$(this).next().show();

});

//失去焦点时赋值给label
//
$(".questions").on("blur",".oedit",function(){
	var value = $(this)[0].value;
	if(value != ""){
		$(this).prev().text(value);
		$(this).hide();
	}
});


//添加单选框选项
$(".type-radio").on("click",".editbox .add",function(){
	var id = uuid();
	$(this).parent().siblings("ul").append(
		'<p>'+
			'<input type="radio" name="radio" id='+id+'></input>'+
			'<label for='+id+'>选项</label>'+
			'<input type="text" class="oedit"></input>'+
			'<span class="odelete">删除</span>'+
		'</p>'
	);
});

//添加多选框选项
$(".type-checkbox").on("click",".editbox .add",function(){
	var id = uuid();
	$(this).parent().siblings("ul").append(
		'<p>'+
			'<input type="checkbox" class="filled-in" name="checkbox" id='+id+'></input>'+
			'<label for='+id+'>选项</label>'+
			'<input type="text" class="oedit"></input>'+
			'<span class="odelete">删除</span>'+
		'</p>'
	);
});


//选择填写备注则使color变色
$(".questions").on("click", ".istips", function(){
	if(!$(this).hasClass("redcolor")){
		$(this).addClass("redcolor");
		$(this).text("需要填写备注");
	}else{
		$(this).removeClass("redcolor");
		$(this).text("不需要填写备注");
	}
});