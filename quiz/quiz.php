<?php session_start(); ?>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<?php  
include_once("../includes/config.php");
$quiz_id=$_SESSION['id'];
$quest_num=$_SESSION['num_of_quest'];
$quest_num_plus=$quest_num+1;
/*$question_arr=array();
$answers_arr=array();*/
if (isset($_SESSION["quest_numbers"])) {$_SESSION["quest_numbers"]=$_SESSION["quest_numbers"];$quest_numbers = $_SESSION["quest_numbers"];}
else {$_SESSION["quest_numbers"]=1;$quest_numbers = $_SESSION["quest_numbers"];}
if (isset($_SESSION["right_answers"])) {$_SESSION["right_answers"]=$_SESSION["right_answers"];$right_answers=$_SESSION["right_answers"];}else{$_SESSION["right_answers"]=0;$right_answers=$_SESSION["right_answers"];}
if (isset($_SESSION["wrong_answers"])) {$_SESSION["wrong_answers"]=$_SESSION["wrong_answers"];$wrong_answers=$_SESSION["wrong_answers"];}else{$_SESSION["wrong_answers"]=0;$wrong_answers=$_SESSION["wrong_answers"];}
if($quest_numbers<$quest_num_plus){
$select_quiz=mysqli_query($connect, "SELECT * from questions where quiz_id='$quiz_id' AND quest_number='$quest_numbers'");
$nums_quiz=mysqli_num_rows($select_quiz);

 	//echo json_encode($rows_quiz)." ";	
for ($i=0; $i < $nums_quiz; $i++){ 
	$rows_quiz=mysqli_fetch_assoc($select_quiz);
	$quest_id=$rows_quiz["quest_id"];
	$question=$rows_quiz["question"];
	$check_img=$rows_quiz["img_src"];
	$_SESSION["quest_id"] = $quest_id;
	//array_push($question_arr, $question);
	
?>
<?php  if($check_img==''){ ?>
<html>
<head>
	<meta charset="utf-8">
	<title>ვიქტორინა</title>
	<link rel="stylesheet" type="text/css" href="../css/first_quiz.css">
	<style>
		/*css reset */
		html,body,div,span,h1,h2,h3,h4,h5,h6,p,code,small,strike,strong,sub,sup,b,u,i{border:0;font-size:100%;font:inherit;vertical-align:baseline;margin:0;padding:0;} 
		article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block;} 
		body{line-height:1; font:normal 0.9em/1em "Helvetica Neue", Helvetica, Arial, sans-serif;} 
		ol,ul{list-style:none;} 
		#frame{margin: auto;margin-top: 60px; border-radius: 5%; max-width:1000px;width:100%; height: 800px; border:1px solid #ccc;background:#eee;padding:30px;} 
		#content{font:normal normal 1em/1.5em "Helvetica Neue", Helvetica, Arial, sans-serif;margin:0 40px 10px;} 
		h1{font:normal bold 2em/1.8em "Helvetica Neue", Helvetica, Arial, sans-serif;text-align:left;background:#ccc;padding:0 15px;width:auto;text-align: right;}
		h2{font:italic bold 1.3em/1.2em "Helvetica Neue", Helvetica, Arial, sans-serif;padding:5px 15px 15px; color: black;} 
		input[type=radio]{margin:0 10px 5px -22px;} label{margin:0 0 5px;}
		#score p{font-size:0.95em; font-style:italic; color:#666; float:right;margin:5px 5px 0 0;}
		#score:after{content:".";display:block;clear:both;visibility:hidden;line-height:0;height:0;}
		#response{min-height:70px; margin:10px; }
		#response h3{font:normal bold 1.2em/1.5em "Helvetica Neue", Helvetica, Arial, sans-serif; margin:5px 0;}
	</style>
</head>
<body>
	<div id="frame">
		<h1 style="font-style: italic;">სპორტული ვიქტორინა</h1>
		<div class="container">
		<center><h2 id="question" style="font-weight: bold;width: 80%;"><?=$question?></h2></center>
		<div class="container">

	<form action="check_answer.php" method="post">
		<?php 
		$classes=array("f-option","s-option","x-option","t-option");
		$select_answ=mysqli_query($connect, "SELECT * from answers where quest_id='$quest_id'");
		$nums_answ=mysqli_num_rows($select_answ);
		for ($j=0; $j < $nums_answ; $j++) { 
			$rows_answ=mysqli_fetch_assoc($select_answ);
			$answers=$rows_answ["answers"];
			//array_push($answers_arr, $answers);
			//$answers_arr[$i]
			?>

		
  <ul>
  <li>
    <input type="radio" id="<?=$classes[$j];?>" value="<?=$answers?>" name="selector">
    <label for="<?=$classes[$j];?>"><?=$answers?></label>
    
    <div class="check"><div class="inside"></div></div>
  </li>
   <?php } 
   //$question_answ[]=array("question"=>$question,"answers"=>$answers,"img_src"=>$check_img);
  
  
   ?>
  
 <!-- <li>
    <input type="radio" id="s-option" name="selector">
    <label for="s-option">1959 წელს</label>
    
    <div class="check"><div class="inside"></div></div>
  </li>
  <li>
    <input type="radio" id="x-option" name="selector">
    <label for="x-option">1959 წელს</label>
    
    <div class="check"><div class="inside"></div></div>
  </li>
  <li>
    <input type="radio" id="t-option" name="selector">
    <label for="t-option">2016 წელს</label>
    
    <div class="check"><div class="inside"></div></div>
  </li>-->
</ul>
<center>
<div class="ss1">
	
	<input type="submit" class="button1" name="" value="შემდეგი">
	
</div>
</center>
</form>
</div>
<div class="swori"><?=$quest_numbers?>/<?=$quest_num?> შეკითხვა: <font color="green">სწორი:<?=$right_answers?>;</font> <font color="red">არასწორი:<?=$wrong_answers?>;</font></div>
		<div class="ss"><img src="../img/logo.png" style="float: right;position: relative;top: 70px;"></div>
    	
	</div>
	</div>
</body>
</html>
<?php } else{ ?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Quiz</title>
	<link rel="stylesheet" type="text/css" href="../css/second_quiz.css">
	<style>
		/*css reset */
		html,body,div,span,h1,h2,h3,h4,h5,h6,p,code,small,strike,strong,sub,sup,b,u,i{border:0;font-size:100%;font:inherit;vertical-align:baseline;margin:0;padding:0;} 
		article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block;} 
		body{line-height:1; font:normal 0.9em/1em "Helvetica Neue", Helvetica, Arial, sans-serif;} 
		ol,ul{list-style:none;} 
		#frame{margin: auto;margin-top: 100px; border-radius: 5%; max-width:1000px;width:100%; height: 750px; border:1px solid #ccc;background:#eee;padding:30px;} 
		#content{font:normal normal 1em/1.5em "Helvetica Neue", Helvetica, Arial, sans-serif;margin:0 40px 10px;} 
		h1{font:normal bold 2em/1.8em "Helvetica Neue", Helvetica, Arial, sans-serif;text-align:left;background:#154797;padding:0 15px;width:auto;text-align: right; color: white;}
		h2{font:italic bold 1.3em/1.2em "Helvetica Neue", Helvetica, Arial, sans-serif;padding:5px 15px 15px; color: black;} 
		input[type=radio]{margin:0 10px 5px -22px;} label{margin:0 0 5px;}
		#score p{font-size:0.95em; font-style:italic; color:#666; float:right;margin:5px 5px 0 0;}
		#score:after{content:".";display:block;clear:both;visibility:hidden;line-height:0;height:0;}
		#response{min-height:70px; margin:10px; }
		#response h3{font:normal bold 1.2em/1.5em "Helvetica Neue", Helvetica, Arial, sans-serif; margin:5px 0;}
	</style>
</head>
<body>
	<div id="frame">
		<h1 style="font-style: italic;">სპორტული ვიქტორინა</h1>
		<div class="two_of_all">
		<div class="container">
		<h2 id="question"><?=$question?></h2><hr size="5px;">
		<form action="check_answer.php" method="post">
  		<?php 
		$classes=array("f-option","s-option","x-option","t-option");
		$select_answ=mysqli_query($connect, "SELECT * from answers where quest_id='$quest_id'");
		$nums_answ=mysqli_num_rows($select_answ);
		for ($j=0; $j < $nums_answ; $j++) { 
			$rows_answ=mysqli_fetch_assoc($select_answ);
			$answers=$rows_answ["answers"];
			$status=$rows_answ["status"];
			//array_push($answers_arr, $answers);
			//$answers_arr[$i]
			?>

		
  <ul>
  <li>
    <input type="radio" id="<?=$classes[$j];?>" value="<?=$answers?>" name="selector">
    <label for="<?=$classes[$j];?>"><?=$answers?></label>
    
    <div class="check"><div class="inside"></div></div>
  </li>
   <?php } 
   //$question_answ[]=array("question"=>$question,"answers"=>$answers,"img_src"=>$check_img);
  
  
   ?>
  
  <!--<li>
    <input type="radio" id="s-option" name="selector">
    <label for="s-option">1951 წელს</label>
    
    <div class="check"><div class="inside"></div></div>
  </li>
  <li>
    <input type="radio" id="x-option" name="selector">
    <label for="x-option">2016 წელს</label>
    
    <div class="check"><div class="inside"></div></div>
  </li>
  <li>
    <input type="radio" id="t-option" name="selector">
    <label for="t-option">1855 წელს</label>
    
    <div class="check"><div class="inside"></div></div>
  </li>-->
</ul>
</div>
<div class="ss1">
<input type="submit" class="button1" style="
    
   
    position: relative;
    margin-top: 56.162;
    top: 352px;
    right: 410px;




" value="შემდეგი">
</div>
</form>
<div class="surati">
	<img src="../<?=$check_img?>">
</div>
</div>
<div class="swori"><?=$quest_numbers?>/<?=$quest_num?> შეკითხვა: <font color="green">სწორი:<?=$right_answers?>;</font><font color="red">არასწორი:<?=$wrong_answers?>;</div>
<div class="ss"><img src="../img/logo.png" style=""></div>
    

	</div>
	</div>
</body>
</html>


<?php } ?> <?php   } ?><?php } 
else {
	unset($_SESSION["quest_numbers"]);
	echo "<div class='loading'><center><img src='../img/loader.gif'><div class='load_text'>მიმდინარეობს პასუხების მომზადება</div></center></div>";
	echo "<script>";
		echo "setTimeout(function() {window.location='result.php';}, 5000);";
	echo "</script>";

	}?>



