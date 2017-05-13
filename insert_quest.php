<?php  
include_once("includes/config.php");
include_once("includes/f.php");
session_start();
error_reporting(E_ALL ^ E_NOTICE);
$num_of_quest=$_SESSION['num_of_quest'];
$quiz_id=$_SESSION['id'];
$uniq_id=uniqid();

for ($i=0; $i < $num_of_quest; $i++) { 
	$x=$i+1;
	$quest_id=$uniq_id.$i;
	if(isset($_POST["quest".$i])){$quest=post($_POST["quest".$i]);}
	if($quest != ''){
		if(isset($_FILES['img_vic'.$i]))
		{
		   $photo=$_FILES['img_vic'.$i];
		   $file_type=$_FILES['img_vic'.$i]['type'];
		   $file_name=$_FILES['img_vic'.$i]['name'];
		   $file_temp_name=$_FILES['img_vic'.$i]['tmp_name'];
		   $file_size=$_FILES['img_vic'.$i]['size'];

		   if($file_type=="image/jpeg" && $file_name!='')
		    {
		    $new_file_name="quiz_img/".$file_name.".jpg";
		    $new_img_name=$file_name.".jpg";
		    $upl_img=move_uploaded_file($file_temp_name, $new_file_name);
			}
		}
		if($file_name!='')
		{
			$q="INSERT into `questions` (`quest_id`,`quiz_id`,`question`,`quest_number`,`img_src`) values('$quest_id','$quiz_id','$quest','$x','$new_file_name')";
			$insert=baza_do_only($q);
		}
		else 
		{
			$q="INSERT into `questions` (`quest_id`,`quiz_id`,`question`,`quest_number`,`img_src`) values('$quest_id','$quiz_id','$quest','$x','')";
			$insert=baza_do_only($q);
		}
	
		for ($j=0; $j < 4; $j++) { 
			if (isset($_POST["answer".$i.$j])) {$answer=post($_POST["answer".$i.$j]);}
			if (isset($_POST["check".$i.$j])) {$check=post($_POST["check".$i.$j]);}
			if ($answer != '') {
				$q1="INSERT into `answers` (`quest_id`,`answers`,`status`) values('$quest_id','$answer','$check')";
				$insert_ans=baza_do_only($q1);
			}
			
			//echo $answer." ".$check."<br />";
		}
	}
}

if ($insert && $insert_ans) {
	$_SESSION['check'] = true;
	$_SESSION['succs_insert'] = true;
	header("location:../quiz");
}
else{
	$_SESSION['check'] = true;
	$_SESSION['not_succs_insert'] = true;
	header("location:index_action.php");
}
?>