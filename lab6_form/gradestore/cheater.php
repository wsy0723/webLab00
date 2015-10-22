<!DOCTYPE html>
<html>
	<head>
		<title>Grade Store</title>
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2015/problems/pResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<?php
		# Ex 4 : 
		# Check the existance of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)
		# if (){
		if((!isset($_POST['name'])||($_POST['name']=='')||!isset($_POST['id'])||($_POST['id']=='')||!isset($_POST['course'])||($_POST['course']=='')||!isset($_POST['grade'])||($_POST['grade']=='')||!isset($_POST['creditcard'])||($_POST['creditcard']=='')||!isset($_POST['cc'])||($_POST['cc'])=='')){?>
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. <a href="gradestore.html">Try again?</a></p>
		

		<!-- Ex 4 : 
			Display the below error message : 
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. Try again?</p>
		--> 
		
		<?php
		# Ex 5 : 
		# Check if the name is composed of alphabets, dash(-), or a single white space.
		
		}elseif ( preg_match('/^[a-zA-Z]+(-[a-zA-Z]+)*([\s]?[a-zA-Z]+(-[a-zA-Z]+)*)?$/i',$_POST['name'])==false){ 
		?>
		<h1>Sorry</h1>
		<p>You didn't provide a valid name. <a href="gradestore.html">Try again?</a></p>

		<!-- Ex 5 : 
		Display the below error message : 
		<h1>Sorry</h1>
		<p>You didn't provide a valid name. <a href="gradestore.html">Try again?</a>
		 </p>
		--> 

		<?php
		# Ex 5 : 
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5. 

		} elseif ((preg_match('/^(\d){16}$/',$_POST['cc'])==false)|| ($_POST['cc']=='visa'&&(preg_match('/^4(\d){15}$/',$_POST['cc'])==false))||($_POST['cc']=='master'&&(preg_match('/^5(\d){15}$/',$_POST['cc'])==false))){
		?>
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. <a href="gradestore.html">Try again?</a></p>

		<!-- Ex 5 : 
			Display the below error message : 
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. Try again?</p>
		--> 

		<?php
		# if all the validation and check are passed 
		} else {
		?>

		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>
		
		<!-- Ex 2: display submitted data -->
		<?
		$name = $_POST['name'];
		$id = $_POST['id'];
		$course = $_POST['course'];
		$grade = $_POST['grade'];
		$creditcard = $_POST['creditcard'];
		$cc = $_POST['cc'];

		?>

		<ul> 
			<li>Name: <?= $name?></li>
			<li>ID: <?= $id?></li>
			<!-- use the 'processCheckbox' function to display selected courses -->
			<li>Course: <?= processCheckbox($course)?></li>
			<li>Grade: <?= $grade?></li>
			<li>Credit Card: <?= $creditcard?>(<?= $cc?>)</li>
		</ul>
		
		<!-- Ex 3 : 
			<p>Here are all the loosers who have submitted here:</p> -->
		<?php
			$filename = "loosers.txt";
			$text = $name.";".$id.";".$creditcard.";".$cc."\n";
			/* Ex 3: 
			 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
			 * For example, "Scott Lee;20110115238;4300523877775238;visa"
			 */
			$file = file($filename);
			file_put_contents($filename, $text,FILE_APPEND);
		?>
		
		<!-- Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->
			 <pre><?= file_get_contents($filename)?></pre>
		
		<?php
		}
		?>
		
		<?php
			/* Ex 2: 
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 * 
			 * The function checks whether the checkbox is selected or not and 
			 * collects all the selected checkboxes into a single string with comma seperation.
			 * For example, "cse326, cse603, cin870"
			 */
			function processCheckbox($names){
				$all_courses = '';
				$all_courses = implode(", ", $names);
				return $all_courses;
			}?>
</html>
