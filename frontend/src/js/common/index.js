
//进入页面时先判断是否已存在登录信息

$(function(){
	store.remove('username');
	popHandleUser();


	//取参数
	var $lusername = $("#lusername"),
	    $rusername = $("#rusername"),
		$lpassword = $("#lpassword"),
		$rpassword = $("#rpassword"),
		$rrepassword = $("#rrepassword"),
		$lverify = $("#lverify"),
		$rverify = $("#rverify"),
		$loginbtn = $("#loginbtn"),
		$registerbtn = $("#registerbtn"),
		correct = {
			username:false,
			password:false,
			repassword: false,
			verify: false
		};


	function updatePara(){
		//更新参数
		$username = $("#username");
		$password = $("#password");
		$repassword = $("#repassword");
		$verify = $("#verify");
		$loginbtn = $("#loginbtn");
		$registerbtn = $("#registerbtn");
		correct = {
			username:false,
			password:false,
			repassword: false,
			verify: false
		};
		console.log($username);
	}

	//点击导航条登陆注册按钮
	$(".userbtn").click(function(){
		popHandleUser();
	});

	// 登录注册框tab切换
	(function(){
		$(".user-title").on("click", "li", function(){
			$(this).addClass("tab-active");
			$(this).siblings().removeClass("tab-active");
			var _id = $(this).attr("id");
			if (_id == "login-title") {
				$("#login-content").show();
				$("#register-content").hide();
				// updatePara();
				beginLogin();
			}else{
				$("#login-content").hide();
				$("#register-content").show();
				// updatePara();
				beginRegister();
			}



		});
	})()

	//验证函数
	function Validate(type){

		var validator = new Validator();

		//对每个input添加验证规则
		//
		if (type == "_register") {
			$("#rusername").blur(function(){
				console.log("verify registerbtn1");
				validator.add($rusername.get(0),'isNonEmpty','用户名不能为空');
				validator.add($rusername.get(0),'isRight','用户名格式错误');
				validator.add($rusername.get(0),'isExist','用户名已存在');
				var msg = validator.start();
				if (msg) {
					correct.username = false;
					$(this).next().html(msg);
				}else{
					correct.username = true;
				}
				validator.clear();
			});

			$("#rpassword").blur(function(){
				// console.log("verify registerbtn2");
				validator.add($rpassword.get(0),'isNonEmpty','密码不能为空');
				validator.add($rpassword.get(0),'isRight','密码格式错误');
				var msg = validator.start();
				if (msg) {
					correct.password = false;
					$(this).next().html(msg);
				}else{
					correct.password = true;
				}
				validator.clear();
			});

			$("#rrepassword").blur(function(){
				validator.add($rrepassword.get(0),'isNonEmpty','重复输入密码不能为空');
				if(!$rpassword.get(0)){
					correct.password = false;
					$(this).next().html("请先在上面输入密码");
				}else{
					validator.add($rpassword.get(0),'isEqual:'+$rpassword.get(0).value,'密码不同');
				}
				var msg = validator.start();
				if (msg) {
					correct.password = false;
					$(this).next().html(msg);
				}else{
					correct.password = true;
				}
				validator.clear();
				
			});
		}else if(type == "_login"){
			$("#lusername").blur(function(){
				validator.add($lusername.get(0),'isNonEmpty','用户名不能为空');
				validator.add($lusername.get(0),'isRight','用户名格式错误');
				var msg = validator.start();
				if (msg) {
					correct.username = false;
					$(this).next().html(msg);
				}else{
					correct.username = true;
				}
				validator.clear();
			});

			$("#lpassword").blur(function(){
				validator.add($lpassword.get(0),'isNonEmpty','密码不能为空');
				validator.add($lpassword.get(0),'isRight','密码格式错误');
				var msg = validator.start();
				if (msg) {
					correct.password = false;
					$(this).next().html(msg);
				}else{
					correct.password = true;
				}
				validator.clear();
			});
		}
		

		$(".form ul li").on("focus",".input",function()
		{
			console.log("focus");
			$(this).next().html("");
		});
	}
	
	//判断弹出登录注册函数
	function popHandleUser(){
		console.log(store.get('username'));
		$(".s_username").text(s_username);
		if (!store.get('username')) {
			// console.log("hava");
			$(".mask").show();
			$(".handleuser").show();
			beginLogin();
			//弹出登录注册框
			//注册成功自动登录
			//往本地储存存字段username
		}
		var s_username = store.get('username');
		$(".s_username").text(s_username);
	}


	//开始登录
	function beginLogin(){
		var correct = {
			username:false,
			password:false,
			repassword: false,
			verify: false
		};
		Validate("_login");
		var login = new Login();
		//登录
		$("#loginbtn").click(function(){
			if (canLogin()) {
				Login.login($lusername.get(0).value, $lpassword.get(0).value, $lverify.get(0).value);
			}else{
				$lusername.trigger('blur');
				$lpassword.trigger('blur');
				// $repassword.trigger('blur');
			}
		});

		var canLogin = function()
		{
			for(var key in correct) {
				if (!correct[key]) {
					return false;
				}
			}
			return true;
		}
	}

	//开始注册
	function beginRegister(){
		var correct = {
			username:false,
			password:false,
			repassword: false,
			verify: false
		};
		Validate("_register");
		var register = new Register();
		//注册
		$registerbtn.click(function()
		{
			console.log("register");
			if (canRegister()) {
				register.register($rusername.get(0).value, $rpassword.get(0).value, $rrepassword.get(0).value, $rverify.get(0).value);
			}else{
				$rusername.trigger('blur');
				$rpassword.trigger('blur');
				$rrepassword.trigger('blur');
			}
			
		});

		var canRegister = function()
		{
			for(var key in correct) {
				if (!correct[key]) {
					return false;
				}
			}
			return true;
		}
	}

	// init();
    function init() {
        if (!store.enabled) {
            alert('Local storage is not supported by your browser. Please disable "Private Mode", or upgrade to a modern browser.')
            return
        }
        store.set('username', 'linport')

        // console.log(store.get(''));	
    }


});