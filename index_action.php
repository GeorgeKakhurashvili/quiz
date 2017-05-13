<?php  
session_start();
include_once("includes/config.php");
$num_of_quest=$_SESSION['num_of_quest'];
$quiz_id=$_SESSION['id'];
$name=$_SESSION['name'];

?>

<!DOCTYPE html>
<html>
<head>
	<title><?=$name?></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
<?php  
	if (isset($_SESSION['check'])) {$check=$_SESSION['check'];}
	else
	{
		$check = 0;
	}
	if($check==0)
	{
		$_SESSION['not_succs_insert'] = false;
	}

?>
<div id="inputs_of_quest">
	<div id="text_of_action"><center><p>შეავსეთ კითხვები და პასუხები</p></center></div>
	<?php if($_SESSION['not_succs_insert']){ ?>
		<div class="alert">
			<center><p style="margin-left: 260px;">შეავსეთ აუცილებელი ველები!</p></center>
		</div>
	<?php } ?>
	<form action="insert_quest.php" method="post" class = 'form-group' enctype='multipart/form-data'>
	<?php for ($i=0; $i < $num_of_quest; $i++) { $k=$i+1;?>

	<div class="inputs_of_quest" >
		<?php echo "<p style='float:left;margin-top:3px;font-size:17pt;'>".$k."."."</p>"; ?>
			<input type="text" name="quest<?=$i?>" class = 'form-control' style="width: 75%;float: left;" placeholder="<?=$k?> კითხვა">
		<div class="inputs">
		<?php for ($j=0; $j < 4; $j++) { $d=$j+1;?>
			<?php echo "<div class='numbers'>"."<p>".$d."."."<br />"."</p>"."</div>"; ?><div class="radio_but"><input type="text" class = 'form-control' name="check<?=$i.$j?>" style="width: 35px;height: 31px;"></div><div class="inputs1"><input type="text" name="answer<?=$i.$j?>" class = 'form-control' style="width: 100%;float: right;" placeholder="<?=$d?> პასუხი"></div>

		<?php } ?>
		<input type="file" name="img_vic<?=$i?>" class = 'form-control' style="float: right;width:88.5%;margin-top: 3px;margin-right: 6.5%;">
		</div>
	</div>

	<?php } ?>
	<div id="buttons">
		<input type='submit' value='შექმენი ვიქტორინა' class = 'btn btn-primary' style="font-family: BPG Mrgvlovani;">
	</div>
	</form>

</div>
<?php 
unset($_SESSION['check']);
unset($_SESSION['not_succs_insert']);
?>
</body>
</html>

