//Begin DropdownSearchBox
function DropDownSearchBox(el) {
	this.dd = el;
	this.placeholder = this.dd.children('span');
	this.opts = this.dd.find('ul.list-site > li');
	this.val = '';
	this.index = -1;
	this.initEvents();
}
DropDownSearchBox.prototype = {
	initEvents : function() {
		var obj = this;

		obj.dd.on('click', function(event){
			var isActive = $(this).hasClass('active');
			$(document).trigger('click');
			
			if(isActive) {
				$(this).removeClass('active');
			} else {
				$(this).addClass('active');
			}
			return false;
		});

		obj.opts.on('click',function(){
			var opt = $(this);
			obj.val = opt.text();
			obj.index = opt.index();
			obj.placeholder.text(obj.val);
		});
		
		$(document).click(function() {
			obj.dd.removeClass('active');
		});
	},
	getValue : function() {
		return this.val;
	},
	getIndex : function() {
		return this.index;
	}
}
//End DropdownSearchBox

//Begin DropdownLink Quick Order
function DropDownLinkQuickOrder(el) {
	this.dd = el;
	this.textbox = this.dd.parent().find('.input-link');
	this.opts = this.dd.find('ul.quick-order-list-origin > li > a');
	this.initEvents();
}
DropDownLinkQuickOrder.prototype = {
	initEvents : function() {
		var obj = this;

		obj.dd.on('click', function(event){
			var isActive = $(this).hasClass('active');
			$(document).trigger('click');
			
			if(isActive) {
				$(this).removeClass('active');
			} else {
				$(this).addClass('active');
			}
			return false;
		});
		
		obj.opts.on('click',function(){
			var opt = $(this);
			var link = obj.textbox.val();
			
			if(link == '') {
				alert('Vui lòng nhập link sản phẩm');
				return false;
			}
			
			var url = opt.attr('href');
			url += '?url=' + encodeURIComponent(link);
			window.location = url;
			return false;
		});
		
		$(document).click(function() {
			obj.dd.removeClass('active');
		});
	}
}
//End DropdownLink Quick Order

//Begin DropdownLink Quick Order
function DropDownLink(el) {
	this.dd = el;
	this.initEvents();
}
DropDownLink.prototype = {
	initEvents : function() {
		var obj = this;
		
		var dataDropdown = obj.dd.attr('data-dropdown');
		var element = null;
		element = obj.dd;

		$(document).mouseup(function(e) {
			var container = $(".notification-block");

			if ((!container.is(e.target) && container.has(e.target).length === 0)){
				$(obj.dd).parent().removeClass('active');
				return false;
			}
		});


		element.on('click', function(event){
			var parent = $(this).parent();
			var isActive = $(parent).hasClass('active');
			$(document).trigger('click');

			if(isActive) {
				$(parent).removeClass('active');
			} else {
				$('.notification-block > div').removeClass('active');
				$(parent).addClass('active');
				$('.fb_success').hide();
				$('.fb_content').val('');
				$('.fb_phone').val('');
			}
			return false;
		});


		//element.on('click', function(event){
		//	var isActive = $(this).hasClass('active');
		//	$(document).trigger('click');
        //
		//	$(dataDropdown).toggleClass('dropDisplay');
		//	return false;
		//});

		$(dataDropdown).click(function(e) {
			e.stopPropagation();
		});
		
		$(document).bind('click', function(e) {
			$(dataDropdown).hide();
		});
	}
}
//End DropdownLink Quick Order

$(function() {
	var dd = new DropDownSearchBox( $('#dd') );
	var dropdownQuickOrder = new DropDownLinkQuickOrder( $('.quick-order-btn-block') );
	var accountDropdown = new DropDownLink( $('.account-name') );
	var messageNotification = new DropDownLink( $('.notification-block-message-link') );
	var noticeNotification = new DropDownLink( $('.notification-block-notice-link') );
	var noticeFeedback = new DropDownLink( $('.notification-block-feedback-link') );
	var createOrderDropdown = new DropDownLink( $('.create-order-link') );
});