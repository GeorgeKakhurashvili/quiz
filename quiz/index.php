<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>ვიქტორინა</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" >
</head>
<body>
<div class="name_quiz">
	<?php 
		include_once("../includes/config.php");
		$select_main=mysqli_query($connect, "select * from quiz");
		$nums_main=mysqli_num_rows($select_main);
		for ($i=0; $i < $nums_main; $i++) { 
			$k=$i+1;
			$rows_main=mysqli_fetch_assoc($select_main);
			$_SESSION['id'] = $rows_main["quiz_id"];
			$_SESSION['name'] = $rows_main["quiz_name"];
			$_SESSION['num_of_quest'] = $rows_main["quest_number"];

		?>
		<div class="quiz_a"><p><?=$k?>.</p><a href="quiz.php"><?=$rows_main["quiz_name"]?></a></div>
		<?php  } ?>
	



</div>
</body>
</html>