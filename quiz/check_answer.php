<?php 
session_start();
include_once("../includes/config.php");
$quest_numbers=$_SESSION["quest_numbers"];
$quiz_id=$_SESSION['id'];
$quest_id=$_SESSION["quest_id"];
$quest_num=$_SESSION['num_of_quest'];

if ($_SESSION["right_answers"]){$right_answers=$_SESSION["right_answers"];}else{$right_answers=0;}
if ($_SESSION["wrong_answers"]) {$wrong_answers=$_SESSION["wrong_answers"];}else{$wrong_answers=0;}
echo $right_answers." ".$wrong_answers;
$status=1;
$quest_numbers+=1;
$_SESSION["quest_numbers"] = $quest_numbers;
if (isset($_POST["selector"])) {$checked_answer=$_POST["selector"];}
$select_answ=mysqli_query($connect, "SELECT * from answers where quest_id='$quest_id' and status='$status'");
$rows_answ=mysqli_fetch_assoc($select_answ);
$right_from_baza=$rows_answ["answers"];

if($checked_answer==$right_from_baza)
{
	$right_answers+=1;
	$_SESSION["right_answers"] = $right_answers;
}
else
{
	$wrong_answers+=1;
	$_SESSION["wrong_answers"] = $wrong_answers;
}
//echo $right_answers." ".$wrong_answers;
header("location:quiz.php");


 ?>