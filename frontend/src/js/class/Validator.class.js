
/**
 * 实时验证类
 *
 * @class Validator
 * @constructor
 */
var Validator= function()
{
	var me = this;
	//定义数组保存规则
	me.cache = [];
	//规则对象
	me.strategies = {
		/**
		 * 验证是否为空
		 * 
		 * @param  {Object}  dom      输入框对象
		 * @param  {String}  errorMsg 错误信息
		 * @return {String}          是否为空，若为空则返回错误信息
		 */
		isNonEmpty: function(dom, errorMsg)
		{
			var value = dom.value;
			if(value === '') {
				return errorMsg;
			}
		},
		/**
		 * 验证最小长度是否小于规则的长度
		 * 
		 * @param  {Obejct} dom      输入框对象
		 * @param  {String} length   规则的长度
		 * @param  {String} errorMsg 错误信息
		 * @return {String}         是否小于规则的长度，若是则返回错误信息
		 */
		minLength: function(dom, length, errorMsg)
		{
			var value = dom.value;
			if(value.length < length) {
				return errorMsg;
			}
		},
		/**
		 * 验证是否为邮箱
		 * 
		 * @param  {Obejct} dom      输入框对象
		 * @param  {String} errorMsg 错误信息
		 * @return {String}         是否为邮箱，若是则返回错误信息
		 */
		isMail: function(dom, errorMsg) 
		{
			var value = dom.value;
			var pattern = /^[a-z0-9]+([a-z0-9]*[-_]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?$/i;
			if(!pattern.test(value)) {
				return errorMsg;
			}
		},
		/**
		 * 验证是否相等
		 * 
		 * @param  {Obejct} dom           输入框对象
		 * @param  {String}  equaltoValue 要等于的字符串
		 * @param  {String} errorMsg      错误信息
		 * @return {String}              是否相等，若不想等返回错误信息
		 */
		isEqual: function(dom, equaltoValue, errorMsg) 
		{
			var value = dom.value;
			if(value != equaltoValue) {
				return errorMsg;
			}
		},
		/**
		 * 格式是否正确
		 * 
		 * @param  {Obejct} dom        输入框对象
		 * @param  {String} errorMsg   错误信息
		 * @return {String}            格式是否正确，若不是则返回错误信息
		 */
		isRight: function(dom, errorMsg)
		{
			var pattern = /^[a-zA-Z0-9\_]{6,20}$/;
			var value = dom.value;
			if(!pattern.test(value)) {
				return errorMsg;
			}
		},
		/**
		 * 是否已存在
		 * 
		 * @param  {Obejct} dom       输入框对象
		 * @param  {[String]}  type   判断类型，1为用户名，3为工号
		 * @param  {String} errorMsg  错误信息
		 * @return {Boolean}          是否已存在，若是则返回错误信息
		 */
		isExist: function(dom, errorMsg)
		{
			var value = dom.value;
			$.ajax({
				url: "/index.php?action=checkName",
				type: "post",
				datatype: "json",
				data: {
					workid: value
				},
				success: function(msg)
				{
					// console.log("ok");
					if (msg.code) {
						$(dom).next().html(errorMsg);
						setTimeout(function(){
							$(dom).val("");
						},3000);
						
					}
					
				},
				error: function(error)
				{
					this.msg = msg;
					console.log(this.error);
				}  
			});
		}
	};
}

Validator.prototype = {
	/**
	 * 添加规则方法
	 * 
	 * @param {Object} dom      输入框DOM
	 * @param {String} rule     规则字符串
	 * @param {String} errorMsg 错误信息字符串
	 */
	add: function(dom, rule, errorMsg)
	{
		var me = this;
		console.log(me.cache);
		console.log(dom);
		console.log(rule);
		
		var ary = rule.split(':');//把规则名和副规则以冒号分开
		//把校验的步骤用空函数包装起来
		me.cache.push(function()
		{
			var strategy = ary.shift();//删除并获取第一个元素，即规则名
			ary.unshift(dom);//把用户的输入值放进数组首位
			ary.push(errorMsg);//把错误信息添加进数字末尾
			console.log(ary);
			return me.strategies[strategy].apply(dom, ary);//根据规则验证名调用函数,并使dom继承这个函数
		});
	},
	/**
	 * 返回执行策略数组方法
	 * 
	 * @return {array} 策略数组
	 */
	start: function()
	{
		var me = this;
		for(var i = 0,validatorFunc; validatorFunc = me.cache[i++];) {
			var msg = validatorFunc();//执行校验
			if(msg) {
				return msg;
			}
		}
	},
	/**
	 * 清除执行策略数组方法
	 * 
	 * @return {array} 空的执行策略数组
	 */
	clear: function()
	{
		var me = this;
		me.cache = [];
	}
};

