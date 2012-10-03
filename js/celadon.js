//mainMenuHandler object
_mainMenuHandler = {
	
	animate_in: function(item){ item.show('fold', 800); }, 
	animate_out: function(item){ item.hide('slide', 0); },
}


_appHandler = {
	initialize: function(){
		var _mainPane = $('#content-main-pane');
		
		/** Main Menu Items...
		/** Buttons and other items...
		**/
		$('.main-menu-btn').click(function(){
			var id = $(this).attr("id"),
				sourceLoc = null;
				
			_mainMenuHandler.animate_out(_mainPane); _mainPane.html('Loading...');
			
			if (id == "menu-btn-dashboard"){
				sourceLoc = "scripts/main-menu-dashboard-content.php";
			} else if (id == "menu-btn-room"){
				sourceLoc = "scripts/main-menu-room-content.php";
			} else if (id == "menu-btn-reserve"){
			
			} else if (id == "menu-btn-inventory"){
			
			} else if (id == "menu-btn-settings"){
				sourceLoc = "scripts/main-menu-settings-content.php";
			}
			
			setTimeout(function(){
				var request = $.ajax({ url:sourceLoc });
				request.done(function(data){
					_mainPane.html(data); _appHandler.appRefreshContent($('#foo'));
				});
			}, 800);
			
			//Resetting the colors:
			var items = $('#main-menu-btns li');
			items.each(function(idx, li){
				var item = $(li); item.removeClass('active');
			});
						
			$(this).parent().addClass('active');
		
			_mainMenuHandler.animate_in(_mainPane);
		});
		
		
		//Load the Dashboard Page...
		$.ajax({
			url:"scripts/main-menu-dashboard-content.php",
			success: function(data){ 
				_mainPane.html(data); _appHandler.appRefreshContent($('#foo'));
			}
		});
	},
	appRefreshContent: function(_object){
		var i = 0;
		setInterval(function(){
			_object.html(i); i++;
		}, 1000);
	}
}

//Call this to load/reload the binded jQuery events...
$(document).ready(function(){ _appHandler.initialize(); });