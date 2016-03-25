
/**
 * 左右轮播类
 *
 * @class Lunbo
 * @constructor
 * @param {Object} $dom 需要左右轮播的图片盒子（包含所有图片）
 */
var Lunbo = function($dom) {
	this.index = 1,
	this.width = 0;
	this.$dom = $dom;
}



Lunbo.prototype = (function() {
	/**
	 * 图片盒子运动方法
	 *
	 * @method animate
	 * @private
	 */
	function animate() {

		if (this.index == 5) {
			this.index = 1;
			var _dist =   0;
			this.$dom.css('left',_dist+'px');
		}
		// console.log(index);
		var dist = (this.index - 1) * this.width;
		// console.log(width);
		this.$dom.animate({
			left: -dist + 'px'
		},'slow','linear');
		// var index;
		this.index = this.index + 1;
	}

	return {
		/**
		 * 运动循环方法
		 *
		 * @method start
		 * @param  {String} interval 轮播的时间间隔
		 */
		start: function(interval) {
			var me = this;
			var $childDom = me.$dom.children().first(); 
			this.width = $childDom.width();
			$(window).resize(function() 
			{
				me.width = $childDom.width();
			});

			setInterval(function(){
				
				animate.call(me);				
			},interval);
		}
	};
})();