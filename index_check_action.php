<?php session_start(); ?>
<head>
	<title>ვიქტორინა</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
</head>
<?php  
include_once("includes/config.php");
include_once("includes/f.php");
if (isset($_POST["num_of_quest"])) {$num_of_quest=post($_POST["num_of_quest"]);}
if (isset($_POST["name_vic"])) {$name_vic=post($_POST["name_vic"]);}
if(strlen($num_of_quest)==0 || strlen($name_vic)==0){
	$_SESSION['check'] = true;
	$_SESSION['empty_inputs'] = true;
	$_SESSION['name'] = $name_vic;
	$_SESSION['num_of_quest'] = $num_of_quest;
	header("location:../quiz");
}
else
{
	$q="INSERT INTO `quiz` (`quiz_name`, `quest_number`) VALUES ('$name_vic','$num_of_quest')";
	baza_do_only($q);
	$select=mysqli_query($connect, "SELECT * from `quiz`");
	$nums=mysqli_num_rows($select);
	echo "<div style='width:700px;height:500px;float:left;margin-left:50px;margin-top:20px;'>";
	for ($i=0; $i < $nums; $i++) { 
		$rows=mysqli_fetch_assoc($select);
		$k=$i+1;
		$_SESSION['id'] = $rows["quiz_id"];
		$_SESSION['name'] = $rows["quiz_name"];
		$_SESSION['num_of_quest'] = $rows["quest_number"];
		echo $k.". "."<a href='index_action.php' style='font-family:BPG Mrgvlovani;font-size:12pt;'>".$rows["quiz_name"]."</a>"."<br />";
	}
	echo "</div>";
}
?>