<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" >
</head>
<body>
<div class="quest_num" style="height: 200px;width: 29%;">
	<p style="color:black;letter-spacing: 10px;padding-top: 70px;">ვიქტორინის შედეგები</p>
</div>
<div class="reslut_main">
<div class="button"><a href="../quiz" class="btn btn-primary">მთავარ გვერდზე დაბრუნება</a></div>
<?php 
// $right_answers=$_GET["right_answers"];
// $wrong_answers=$_GET["wrong_answers"];
// $quest_num=$_GET["quest_num"];

$right_answers=$_SESSION["right_answers"];
$wrong_answers=$_SESSION["wrong_answers"];
$quest_num=$_SESSION["num_of_quest"];
//echo "სულ უპასუხეთ ".$quest_num." კითხვას, "."სწორი პასუხების რაოდენობა არის ".$right_answers." და არასწორი პასუხების რაოდენობა არის ".$wrong_answers;
?>
<div class="quest_num">
	<p>სულ კითხვების რაოდენობა : <?=$quest_num?></p>
</div>
<div class="quest_num">
	<p>სწორი პასუხების რაოდენობა : <?=$right_answers?></p>
</div>
<div class="quest_num">
	<p>არასწორი პასუხების რაოდენობა : <?=$wrong_answers?></p>
</div>
<div class="quest_num">
	<p>სულ დაგროვილი ქულა : <?=$right_answers?></p>
</div>
</div>
<?php

unset($_SESSION["right_answers"]);
unset($_SESSION["wrong_answers"]); 

?>
</body>
</html>
