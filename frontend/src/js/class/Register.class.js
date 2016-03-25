
/**
 * 注册类
 *
 * @class Register
 */
var Register = function(){

}



Register.prototype = {
	/**
	 * 异步注册方法
	 *
	 * @method register
	 * @param  {String} username 用户名
	 * @param  {String} password 密码
	 * @param  {String} repassword   重复密码
	 * @param  {String} code     验证码
	 */
	register: function(username, password, repassword, verify)
	{
		$.ajax({
			url: "../backend/index.php?action=register",
			type: "post",
			datatype: "json",
			data: {
				workid: username,
				password: password,
				repassword: repassword,
				verify: verify
			},
			success: function(response)
			{
			
				console.log(response);
				if (response.code == 0) {
					Materialize.toast('注册成功!欢迎你!', 4000);
					if (!$("#login-title").haveClass("tab-active")) {
						$(this).addClass("tab-active");
						$(this).siblings().removeClass("tab-active");
						$("#login-content").show();
						$("#register-content").hide();
						// updatePara();
						beginLogin();
					}
					
				}else{
					alert("注册失败："+response.msg);	
				}
			},
			error: function(error)
			{
				// console.log("error:"+error);
				alert("重复、注册失败")
			}  
		});
		
	}

};