
/**
 * 登录类
 *
 * @class Register
 */
var Login = function(){

}


Login.prototype = {
    /**
     * 异步登录方法
     *
     * @method register
     * @param  {String} username 用户名
     * @param  {String} password 密码
     * @param  {String} code     验证码
     */
    login: function(username, password, verify)
    {
        $.ajax({
            url: "/index.php?action=login",
            type: "post",
            datatype: "json",
            data: {
                workid: username,
                password: password,
                verify: verify
            },
            success: function(response)
            {
                console.log(response);
                response = eval("("+response+")");
                if (response.code == 0) {
                    Materialize.toast('登录成功!欢迎你!', 4000);
                    console.log(response.data.userid);
                    console.log(response.data.username);
                    store.set('userid',response.data.userid);
                    store.set('username',response.data.username);
                    $(".handleuser").hide();
                    $(".mask").hide();
                }else{
                    alert("登录失败："+response.msg);    
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