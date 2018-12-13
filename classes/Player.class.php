<?php 
	/*
	* User class contains all of the methods and variables for
	* interacting with a Player object
	*/
	class Player{
		private $id;
		private $username;
		private $password;
		private $name;
		private $gender;
		private $email;
		private $cellPhone;
		private $homePhone;
		private $address;
		private $city;
		private $state;
		private $zip;
		private $highschool;
		private $weight;
		private $heightFeet;
		private $heightInches;
		private $gradYear;
		private $sport;
		private $primaryPosition;
		private $secondaryposition;
		private $travelTeam;
		private $gpa;
		private $sat;
		private $act;
		private $ref1Name;
		private $ref1JobTitle;
		private $ref1Email;
		private $ref1Phone;
		private $ref2Name;
		private $ref2JobTitle;
		private $ref2Email;
		private $ref2Phone;
		private $ref3Name;
		private $ref3JobTitle;
		private $ref3Email;
		private $ref3Phone;
		private $persStatement;
		private $commitment;
		private $service;
		private $profileImage;

		
		/**
		 * getId() - returns the User's ID
		 */
		public function getId(){
			return $this->id;
		}
		
		/**
		 * getUsername() - returns the User's username
		 */
		public function getUsername(){
			return $this->username;
		}
		
		/**
		 * getPassword() - returns the User's hashed password from the DB
		 */
		public function getPassword(){
			return $this->pass;
		}
		
		/**
		 * getName() - returns the User's Name
		 */
		public function getName(){
			return $this->name;
		}
		
		/**
		 * getGender() - returns the User's gender
		 */
		public function getGender(){
			return $this->gender;
		}
		
		/**
		 * getEmail() - returns the User's Email
		 */
		public function getEmail(){
			return $this->email;
		}

		/**
		 * getCellPhone() - returns the User's cellPhone
		 */
		public function getCellPhone(){
			return $this->cellPhone;
		}

		/**
		 * getPhone() - returns the User's homePhone
		 */
		public function getHomePhone(){
			return $this->homePhone;
		}
		/**
		 * getIAddress() - returns the User's Address
		 */
		public function getAddress(){
			return $this->address;
		}
		
		/**
		 * getCity() - returns the User's City
		 */
		public function getCity(){
			return $this->city;
		}
		
		/**
		 * getState() - returns the User's State
		 */
		public function getState(){
			return $this->state;
		}
		
		/**
		 * getZip() - returns the User's Zip
		 */
		public function getZip(){
			return $this->zip;
		}
		
		/**
		 * getHighschool() - returns the User's highschool
		 */
		public function getHighschool(){
			return $this->highschool;
		}
		
		/**
		 * getWeight() - returns the User's Weight
		 */
		public function getWeight(){
			return $this->weight;
		}
		
		/**
		 * getHeight() - returns the User's Height feet
		 */
		public function getHeightFeet(){
			return $this->heightFeet;
		}

		/**
		 * getHeight() - returns the User's Height inches
		 */
		public function getHeightInches(){
			return $this->heightInches;
		}

		/**
		 * getGradYear() - returns the User's GradYear
		 */
		public function getGradYear(){
			return $this->gradYear;
		}
		
		/**
		 * getSport() - returns the User's Sport 
		 */
		public function getSport(){
			return $this->sport;
		}

		/**
		 * getPrimaryPosition() - returns the User's PrimaryPosition
		 */
		public function getPrimaryPosition(){
			return $this->primaryPosition;
		}

		/**
		 * getSecondaryPosition() - returns the User's Secondary Position
		 */
		public function getSecondaryPosition(){
			return $this->secondaryPosition;
		}

		/**
		 * getTravelTeam() - returns the User's Travel Team
		 */
		public function getTravelTeam(){
			return $this->travelTeam;
		}

		/**
		 * getGpa() - returns the User's GPA
		 */
		public function getGpa(){
			return $this->gpa;
		}

		/**
		 * getSat() - returns the User's SAT
		 */
		public function getSat(){
			return $this->sat;
		}

		/**
		 * getAct() - returns the User's ACT
		 */
		public function getAct(){
			return $this->act;
		}
		
		/**
		 * getRef1Name() - returns the User's Reference 1 Name
		 */
		public function getRef1Name(){
			return $this->ref1Name;
		}
		
		/**
		 * getRef1JobTitle() - returns the User's Reference 1 Job Title
		 */
		public function getRef1JobTitle(){
			return $this->ref1JobTitle;
		}

		/**
		 * getRef1Email() - returns the User's Reference 1 Email
		 */
		public function getRef1Email(){
			return $this->ref1Email;
		}

		/**
		 * getRef1Phone() - returns the User's Reference 1 Phone
		 */
		public function getRef1Phone(){
			return $this->ref1Phone;
		}

				/**
		 * getRef2Name() - returns the User's Reference 2 Name
		 */
		public function getRef2Name(){
			return $this->ref2Name;
		}
		
		/**
		 * getRef2JobTitle() - returns the User's Reference 2 Job Title
		 */
		public function getRef2JobTitle(){
			return $this->ref2JobTitle;
		}

		/**
		 * getRef2Email() - returns the User's Reference 2 Email
		 */
		public function getRef2Email(){
			return $this->ref2Email;
		}

		/**
		 * getRef2Phone() - returns the User's Reference 2 Phone
		 */
		public function getRef2Phone(){
			return $this->ref2Phone;
		}

				/**
		 * getRef3Name() - returns the User's Reference 3 Name
		 */
		public function getRef3Name(){
			return $this->ref3Name;
		}
		
		/**
		 * getRef3JobTitle() - returns the User's Reference 3 Job Title
		 */
		public function getRef3JobTitle(){
			return $this->ref3JobTitle;
		}

		/**
		 * getRef3Email() - returns the User's Reference 3 Email
		 */
		public function getRef3Email(){
			return $this->ref3Email;
		}

		/**
		 * getRef3Phone() - returns the User's Reference 3 Phone
		 */
		public function getRef3Phone(){
			return $this->ref3Phone;
		}

		/**
		 * getPersStatement() - returns the User's Personal Statement
		 */
		public function getPersStatement(){
			return $this->persStatement;
		}

		/**
		 * getCommitment() - returns the User's Commitment
		 */
		public function getCommitment(){
			return $this->commitment;
		}

		/**
		 * getService() - returns the User's Chosen Service
		 */
		public function getService(){
			return $this->service;
		}

		/**
		 * getProfileImage() - returns the User's Profile Image
		 */
		public function getProfileImage(){
			return $this->profileImage;
		}
	}
?>