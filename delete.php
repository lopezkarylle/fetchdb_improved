<?php

include ("init.php");
use Models\Student;

$_id = $_GET['_id'];

$mongoId = new MongoDB\BSON\ObjectId($_id);

$student = new Student('', '', '', '', '', '', '', '');
$student->setConnection($connection);
$student->deleteStudent($mongoId);

echo "<script>window.location.href='index.php';</script>";
exit;








    