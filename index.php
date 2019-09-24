<?php

	$Error = '';
	$deposit = '';
	if(isset($_POST['submit'])){
		
		$deposit = ($_POST['balance']);
		if(!empty($_POST['deposit'])){
			$deposit=($_POST['deposit'])+($_POST['balance']);
			
		}
		
		if(!empty($_POST['withdraw'])){
			if(($_POST['withdraw'])<=$deposit){
				$deposit=$deposit-($_POST['withdraw']);
				
				
			}
			else{
				echo 'You have insufficient balance';
				echo '</br>';
			}
			
		}
		echo  $deposit;
	
	
	if(empty($_POST['deposit']) && empty($_POST['withdraw'])){
		$Error = '*Any one field is required';
	
	}
	}
?>
<!DOCTYPE html>
<html>
	<head>
	
		<style>
			#error {
				color: #FF0000;
				}
		</style>
		<script>
		function validate(){
			var deposit = document.forms["bankForm"]["depo"].value;
			var wdraw = document.forms["bankForm"]["wdraw"].value;
			if (deposit == "" && wdraw == "") {
			alert("any one field is required"); 
			return false;
			}
		}
	</script>
		<title>Bank Assignment</title>
	</head>
	<body>
		<span id='error'><?php echo $Error;?></span>
		<form method='post' action='#' name='bankForm' onsubmit='return(validate())'>
			<p>Deposit <input type='number' id='depo' name='deposit'/></p>
			<p>Withdrawal <input type='number' id='wdraw' name='withdraw'/></p>
			<p><input type='hidden' name='balance' value='<?php echo $deposit; ?>'/></p>
			<p><input type='submit' name='submit'/></p>
			
			
		</form>
	
	</body>
</html>