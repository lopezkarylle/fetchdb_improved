<?php
include ("init.php");
use Models\Student;

$student = new Student('', '', '', '', '', '', '', '');
$student ->setConnection($connection);
$allStudents = $student->showStudents();


$template = $mustache->loadTemplate('index.mustache');
echo $template->render(compact('allStudents'));