<?php

namespace models;
use \PDO;

class Student
{
    protected $studentId;
    protected $firstName;
    protected $lastName;
    protected $birthdate;
    protected $address;
    protected $program;
    protected $contactNumber;
    protected $emergencyContact;

    public function __construct($studentId, $firstName, $lastName, $birthdate, $address, $program, $contactNumber, $emergencyContact)
    {
        $this->studentId = $studentId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthdate = $birthdate;
        $this->address = $address;
        $this->program = $program;
        $this->contactNumber = $contactNumber;
        $this->emergencyContact = $emergencyContact;
    }
    public function getId()
	{
		return $this->studentId;
	}

	public function getFirstName()
	{
		return $this->firstName;
	}

	public function getLastName()
	{
		return $this->lastName;
	}

	public function getBirthdate()
	{
		return $this->birthdate;
	}

    public function getAddress()
	{
		return $this->address;
	}

    public function getProgram()
	{
		return $this->program;
    }

    public function getContactNumber()
	{
		return $this->contactNumber;
    }
    
    public function getEmergencyContact()
	{
		return $this->emergencyContact;
    }

    public function setConnection($connection)
	{
		$this->connection = $connection;
	}

	public function showStudents()
	{
		$students = $this->connection->find();
		return $students;
	}

	public function addStudent()
	{
		try {
		$students = $this->connection->insertOne([
			'studentId' => $this->getId(),
			'firstName' => $this->getFirstName(),
			'lastName' => $this->getLastName(),
            'birthdate' => $this->getBirthdate(),
            'address' => $this->getAddress(),
            'program'=> $this->getProgram(),
            'contactNumber'=> $this->getContactNumber(),
            'emergencyContact'=> $this->getEmergencyContact(),
		 ]);
		 
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getById($mongoId)
	{
		try {
			$students = $this->connection->findOne(['_id'=>$mongoId]);
			return $students;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

    public function editStudent($mongoId, $studentId, $firstName, $lastName, $birthdate, $address, $program, $contactNumber, $emergencyContact)
	{
		try {
			$students = $this->connection->updateOne(['_id'=>$mongoId],
			['$set'=>
			[
				'studentId' => $studentId,
				'firstName' => $firstName,
				'lastName' => $lastName,
				'birthdate' => $birthdate,
				'address' => $address,
				'program'=> $program,
				'contactNumber'=> $contactNumber,
				'emergencyContact'=> $emergencyContact,
			]
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

    public function deleteStudent($mongoId)
	{
		try {
			$students = $this->connection->deleteOne(['_id'=>$mongoId]);
			return $students;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

}