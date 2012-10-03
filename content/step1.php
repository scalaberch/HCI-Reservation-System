<script>
$(function(){
	/** Here goes the Content Buttons for Reserve **/
		$('#next-button-to-2').click(function(){
			_UIHandler.reserve_go_to_step_2();
		});
});
</script>
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
					