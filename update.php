<?php

include ("init.php");
use Models\Student;

try {
        if (isset($_POST['_id'])) {
        
        $_id = $_POST['_id'];
        $studentId = $_POST['studentId'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $birthdate = $_POST['birthdate'];
        $address = $_POST['address'];
        $program = $_POST['program'];
        $contactNumber = $_POST['contactNumber'];
        $emergencyContact = $_POST['emergencyContact'];
            
        $mongoId = new MongoDB\BSON\ObjectId("$_id");

        $student = new Student('', '', '', '', '', '', '', '');
        $student->setConnection($connection);
        $student->editStudent($mongoId, $studentId, $firstName, $lastName, $birthdate, $address, $program, $contactNumber, $emergencyContact);

        echo "<script>window.location.href='index.php';</script>";
        exit;

    }
}

catch (Exception $e) {
    error_log($e->getMessage());
}
