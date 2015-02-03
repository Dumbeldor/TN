(function(a){
	a.fn.shinyform=function(j){
		var h={
			txtNameFile:"pas de fichier",txtButtonFile:"Selectionner"
		},
		h=a.extend(h,j);
		return this.each(function(){
			if(a.browser.msie&&7>a.browser.version)return!1;
			var b=a(this);
			if(b.is("select")){
				b.wrap('<div class="shinyform_select shinyform"></div>');
				b.hide();
				var c=b.parent(".shinyform_select");
				c.addClass(b.attr("class"));
				c.append('<span class="shinyform_select_name"></span><span class="shinyform_select_button"></span>');
				var m=a(".shinyform_select_name",c),i=a(".shinyform_select_button, .shinyform_select_name",c),f=0,n=b.find("option").length;
				if(1<n){
					c.append('<ul class="shinyform_select_list"></ul>');
					for(var g=a(".shinyform_select_list",c),e=0;e<n;e++)g.append('<li><a href="#'+b.find("option").eq(e).val()+'" onClick="show'+b.find("option").eq(e).val()+'();">'+b.find("option").eq(e).text()+"</a></li>"),b.find("option").eq(e).attr("selected")&&(f=e)
				}
				m.text(b.find("option").eq(f).text());
				g.hide();
				if(b.attr("disabled"))c.addClass("disabled");
				else{
					var p=function(){
						c.hasClass("open")?(a(".shinyform_select").removeClass("open"),a(".shinyform_select_list").hide()):(a(".shinyform_select").removeClass("open"),a(".shinyform_select_list").hide(),c.addClass("open"),g.slideDown(100)
					)};
					c.hover(function(){
						a(this).addClass("hover")
					},
					function(){
						a(this).removeClass("hover")
					});
					i.mousedown(function(){
						c.addClass("focus")
					});
					i.mouseup(function(){
						c.removeClass("focus")
					});
					i.click(function(){
						p()
					});
					g.find("a").click(function(){
						f=g.find("a").index(a(this));
						c.find("select option").eq(f).attr("selected","selected");
						m.text(b.find("option").eq(f).text());
						p();
						return!1
					});
					a("body").click(function(){
						a(".shinyform_select").removeClass("open");
						a(".shinyform_select_list").hide()
					});
					i.click(function(a){
						a.stopPropagation()
					})
				}
			}
			if(b.is("input:checkbox")){
				b.wrap('<div class="shinyform_checkbox shinyform"></div>');
				var k=b.parent(".shinyform_checkbox");
				k.addClass(b.attr("class"));b.css({height:a(".shinyform_checkbox").height(),width:a(".shinyform_checkbox").width(),opacity:0});var q=function(){a("input:checkbox").each(function(){a(this).attr("checked")?a(this).parent(".shinyform_checkbox").addClass("checked"):a(this).parent(".shinyform_checkbox").removeClass("checked");a("input:checkbox").removeClass("disabled");a(this).attr("disabled")&&a(this).parent(".shinyform_checkbox").addClass("disabled")})};q();b.mousedown(function(){k.addClass("focus")});b.mouseup(function(){k.removeClass("focus")});b.click(function(){q()})}if(b.is("input:radio")){b.wrap('<div class="shinyform_radio shinyform"></div>');var l=b.parent(".shinyform_radio");l.addClass(b.attr("class"));b.css({height:a(".shinyform_radio").height(),width:a(".shinyform_radio").width(),opacity:0});var r=function(){a("input:radio").each(function(){a(this).attr("checked")?a(this).parent(".shinyform_radio").addClass("checked"):a(this).parent(".shinyform_radio").removeClass("checked");a("input:radio").removeClass("disabled");a(this).attr("disabled")&&a(this).parent(".shinyform_radio").addClass("disabled")})};r();b.mousedown(function(){l.addClass("focus")});b.mouseup(function(){l.removeClass("focus")});b.click(function(){r()})}if(b.is("input:file")){b.wrap('<div class="shinyform_file shinyform"></div>');var d=b.parent(".shinyform_file");d.addClass(b.attr("class"));d.append('<span class="shinyform_file_name">'+h.txtNameFile+'</span><span class="shinyform_file_button">'+h.txtButtonFile+"</span>");var j=a(".shinyform_file_name",d);a(".shinyform_file_button",d);b.css({height:a(".shinyform_file").height(),opacity:0});b.attr("disabled")&&d.addClass("disabled");b.change(function(){j.text(b.val())});d.hover(function(){d.addClass("hover")},function(){d.removeClass("hover")});b.mousedown(function(){d.addClass("focus")});b.mouseup(function(){d.removeClass("focus")})}})}})(jQuery);