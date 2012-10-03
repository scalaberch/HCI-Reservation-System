<!DOCTYPE html>
<html>
<head>
	<title> Hotel Reservation System </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel='stylesheet' href='css/black-tie/jquery-ui-1.8.24.custom.css' />
	<link rel='stylesheet' href='css/bootstrap.min.css' />
	<script type='text/javascript' src='js/jquery-1.8.2.min.js' ></script>
	<script type='text/javascript' src='js/jquery-ui-1.8.24.custom.min.js' ></script>
	
	<link rel='stylesheet' href='css/styles.css' />
	<script type='text/javascript'>
	$(function() {
		$('#room-pane, #reserve-pane, #welcome-pane').hide(0);
		$('#room-btn').click(function(){
			$('#welcome-pane').hide('fade', 500, function(){ $('#room-pane').show('fade', 500);});
		});
		$('.back-btn').click(function(){
			var parent = $(this).parent().parent().parent().attr('id');
			
			var id = '#'+parent; var object = $(id);
			if (_UIHandler.hasTransaction){
				//Test pa ni... TODO: Use jQuery UI Dialog
				var conf = confirm("There is a transaction going on! Are you sure do you want to quit?")
				if (conf){
					_UIHandler.hasTransaction = false;
					object.hide('fade', 500, function(){ $('#welcome-pane').show('fade', 500); }); 
				}
				
			} else { object.hide('fade', 500, function(){ $('#welcome-pane').show('fade', 500); }); }
		});
		
		//Entrance... bow
		$("#welcome-pane").show('fade', 1200);
		
		/** Here goes the Content Buttons for Reserve **/
		$('#next-button-to-2').click(function(){
			_UIHandler.reserve_go_to_step_2();
		});
		
	});
	
	var _UIHandler = {
	
		hasTransaction: false,
		
		clean_all: function(){
			$('#room-pane, #reserve-pane').html("");
		},
		/** Here starts the actions for "Reserve A Room" function **/
		reserve_go_to_step_2: function(){
			//Send All Functions to PHP SESSION
			
			//Set Global Transaction to TRUE...
			_UIHandler.hasTransaction = true;
			
			//Animate Out and Load AJAX Item...
			$('#room-info-container').hide('slide', 500, function(){
				var _pageReq = $.ajax({ url:'content/step2.php' });
				_pageReq.done(function(data){
					$('#room-info-container').html(data).show('slide', 500);
				});
			});
		},
		
		reserve_go_to_step1: function(){
			
			//Send All Functions to PHP SESSION
			
			//Animate Out and Load AJAX Item...
			$('#room-info-container').hide('slide', 500, function(){
				var _pageReq = $.ajax({ url:'content/step1.php' });
				_pageReq.done(function(data){
					$('#room-info-container').html(data).show('slide', 500);
				});
			});
		}
	
	}
	
	</script>
</head>
<body>

<div id='main-container'>
	
	<div id='main-pane' align='center'>
		<div id='welcome-pane'>
			<div id='main-page-title'> &nbsp </div>
			<div id='commentator'>
				Please select from below to start! 
			</div>
			<button id='room-btn' class='btn'>I'll reserve a room!</button>
			<button id='res-btn' class='btn'>Check my reservation.</button>
		</div>
		<div id='room-pane'>
			<div id='room-pane-content'>
				<div id='room-pane-top'>
					<button class='btn back-btn'><i class='icon icon-plus'></i> Close</button>
					<span style='float:right;font-size:250%;margin-top:5px;margin-right:10px;font-family:Myriad Pro;color:whiteSmoke;'>
						Reserve a Room
					</span>
				</div>
				<div align='left' style='z-index:-10;position:absolute;margin:5% 0% 0% -8%'>
					<ul class='nav' style='width:150px;'>
						<li class='well'>
							1 <br />
							Personal Info and Schedule
						</li>
						<li class='well'> fdsfs </li>
						<li class='well'> fdsfs </li>
					</ul>
				</div>
				<div class='well row' style='height:280px;'>
					<div id='room-info-container'>
						<div align='left'>
							<strong>Please fill up your personal information below:</strong><br /><br />
							<table>
							<tr><th style="width:35%"></tr>
							<tr><td>
							Last Name: </td><td>
							<input type='text' placeholder='Last Name' /> </td></tr>
							<tr><td>
							First Name: </td><td>
							<input type='text' placeholder='First Name' /> </td></tr>
							<tr><td>
							Middle Name: </td><td>
							<input type='text' placeholder='Middle Name' /> </td></tr>
							<tr><td>
							Address: </td><td>
							<input type='text' placeholder='Town/City, Province, Country' /> </td></tr>
							<tr><td>
							Contact Number: </td><td>
							<input type='text' placeholder='Contact #' /> </td>
							</tr></td></table>
						</div>
						<div align='left' style='float:right;margin-top:-35%;width:45%;'>
							<strong> Your expected date and time of arrival: </strong><br /><br />
							<input type='text' placeholder='Date (mm/dd/yyyy)' style='width:40%'/>
							<input type='text' placeholder='Time (hh:mm)' style='width:40%'/>
							
							<br /><br />
							<strong> How many days do you want to stay with us and how many guests 
							do we expect? </strong><br /><br />
							<input type='text' placeholder='# of Days' style='width:40%'/>
							<input type='text' placeholder='# of Guest(s)' style='width:40%'/>
							
							<br /><br />
							<button id='next-button-to-2' class='btn btn-info'> Next <i class='icon icon-chevron-right'></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id='reserve-pane'>
			<div id='room-pane-content'>
				fdskjl
			</div>
		</div>
	</div>
	

</div>

</body>
</html>