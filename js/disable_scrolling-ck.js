/* UserScrollDisabler 
 *
 * Requires: jQuery
 * 
 * Example usage
 * var disabler = new UserScrollDisabler();
 * disabler.disable_scrolling(); // disables user triggered scroll events
 * disabler.enable_scrolling(); // enables user triggered scroll events again
 */jQuery(document).ready(function(e){var t=function(){this.scrollEventKeys=[32,33,34,35,36,37,38,39,40];this.$window=e(window);this.$document=e(document)};t.prototype={disable_scrolling:function(){var e=this;e.$window.on("mousewheel.UserScrollDisabler DOMMouseScroll.UserScrollDisabler",this._handleWheel);e.$document.on("mousewheel.UserScrollDisabler touchmove.UserScrollDisabler",this._handleWheel);e.$document.on("keydown.UserScrollDisabler",function(t){e._handleKeydown.call(e,t)})},enable_scrolling:function(){var e=this;e.$window.off(".UserScrollDisabler");e.$document.off(".UserScrollDisabler")},_handleKeydown:function(e){for(var t=0;t<this.scrollEventKeys.length;t++)if(e.keyCode===this.scrollEventKeys[t]){e.preventDefault();return}},_handleWheel:function(e){e.preventDefault()}};var n=new t;window.disabler=n});