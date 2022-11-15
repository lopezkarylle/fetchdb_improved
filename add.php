<?php
include ("init.php");
use Models\Student;

$template = $mustache->loadTemplate('add.mustache');
echo $template->render();

try{
    if (isset($_POST['firstName'])){
        $add_student = new Student($_POST['studentId'], $_POST['firstName'], $_POST['lastName'], $_POST['birthdate'], $_POST['address'], $_POST['program'], $_POST['contactNumber'], $_POST ['emergencyContact']);

        $add_student->setConnection($connection);
        $add_student->addStudent();
        
        echo "<script>window.location.href='index.php';</script>";
        exit;
    }
}

catch (Exception $e) {
    error_log($e->getMessage());
}



