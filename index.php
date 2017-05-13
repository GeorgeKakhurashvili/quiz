<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>ვიქტორინა</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
<div id="main">
	<?php  
		if (isset($_SESSION['check'])) {$check=$_SESSION['check'];}
			else
			{
				$check = 0;
			}
			if($check==0)
			{
				$_SESSION['name']='';
				$_SESSION['num_of_quest']='';
				$_SESSION['empty_inputs'] = false;
				$_SESSION['succs_insert'] = false;
			}
	?>
	<div class="text"><center><p>შეიყვანეთ კითხვების რაოდენობა!</p></center></div>
	<?php if($_SESSION['empty_inputs']){ ?>
		<div class="alert">
			<center>შეავსეთ აუცილებელი ველები!</center>
		</div>
		<?php } elseif($_SESSION['succs_insert']) {?>
		<div class="alert">
			<center>ვიქტორინა წარმატებით შეიქმნა!</center>
		</div>
		<?php } ?>
	<div class="form">
		<form action='index_check_action.php'  method='post' class = 'form-group' id="cncust" name="cncust">

			<input type='text' name='name_vic' class = 'form-control' placeholder='ვიქტორინის სახელი' id='name_vic' onClick="msgOff('15', 'name_vic');" value="<?=$_SESSION['name']?>">
			<span id="msg15" style="display:none; color:red; font-family: BPG Mrgvlovani;font-size: 8pt;">სავალდებულო ველი!</span><br />

			<input type='text' name='num_of_quest' class = 'form-control' placeholder='კითხვების რაოდენობა' id='num_of_quest' onClick="msgOff('16', 'num_of_quest');" value="<?=$_SESSION['num_of_quest']?>">
			<span id="msg16" style="display:none; color:red; font-family: BPG Mrgvlovani;font-size: 8pt;">სავალდებულო ველი!</span><br />

			<center>
				<input type='button' value='შემდეგ' onclick="CheckCCustForm();" class = 'btn btn-primary' style="font-family: BPG Mrgvlovani; width: 30%;" >
			</center>

		</form>
	</div>
</div>
<?php 
unset($_SESSION['check']);
unset($_SESSION['num_of_quest']);
unset($_SESSION['name']);

?>
</body>
</html>