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
		private $cellphone;
		private $homephone;
		private $address;
		private $city;
		private $state;
		private $zip;
		private $highschool;
		private $weight;
		private $height;
		private $gradYear;
		private $sport;
		private $sport2;
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
		private $showcase1;
		private $showcase2;
		private $showcase3;
		private $persontype;
		private $college;
		private $twitter;
		private $instagram;
		private $facebook;
		private $website;
		private $characteristics;
		private $velocity;
		private $sixtyyarddash;
		private $home2first;
		private $gpareq;
		private $satactreq;
		private $major;
		private $resetExpires;
		
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
			return $this->cellphone;
		}

		/**
		 * getPhone() - returns the User's homePhone
		 */
		public function getHomePhone(){
			return $this->homephone;
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
		 * getHeight() - returns the User's Height
		 */
		public function getHeight(){
			return $this->height;
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
		 * getSport2() - returns the User's 2nd Sport 
		 */
		public function getSport2(){
			return $this->sport2;
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

		/**
		 * getShowcase1() - returns the User's 1st showcase video
		 */
		public function getShowcase1(){
			return $this->showcase1;
		}

		/**
		 * getShowcase2() - returns the User's 2nd showcase video
		 */
		public function getShowcase2(){
			return $this->showcase2;
		}

		/**
		 * getShowcase3() - returns the User's 3rd showcase video
		 */
		public function getShowcase3(){
			return $this->showcase3;
		}

		/**
		 * getPersonType() - returns the User's persontype
		 */
		public function getPersonType(){
			return $this->persontype;
		}

		/**
		 * getCollege() - returns the coach's college
		 */
		public function getCollege(){
			return $this->college;
		}

		/**
		 * getTwitter() - returns the coach's twitter
		 */
		public function getTwitter(){
			return $this->twitter;
		}

		/**
		 * getInstagram() - returns the coach's instagram
		 */
		public function getInstagram(){
			return $this->instagram;
		}

		/**
		 * getFacebook() - returns the coach's facebook
		 */
		public function getFacebook(){
			return $this->facebook;
		}

		/**
		 * getWebsite() - returns the coach's website
		 */
		public function getWebsite(){
			return $this->website;
		}

		/**
		 * getChacteristics() - returns the coach's desires characteristics in a player
		 */
		public function getCharacteristics(){
			return $this->characteristics;
		}

		/**
		 * getVelocity() - returns the coach's desires velocity in a player
		 */
		public function getVelocity(){
			return $this->velocity;
		}

		/**
		 * getSixtyYardDash() - returns the coach's desires 60 yard dash
		 */
		public function getSixtyyardDash(){
			return $this->sixtyyarddash;
		}

		/**
		 * getHome2First() - returns the coach's desired home to 1st time
		 */
		public function getHome2First(){
			return $this->home2first;
		}

		/**
		 * getGpaReq() - returns the coach's desired gpa requirement
		 */
		public function getGpaReq(){
			return $this->gpareq;
		}

		/**
		 * getActSat() - returns the coach's desired act/sat scores
		 */
		public function getSatAct(){
			return $this->satactreq;
		}

		/**
		 * getMajor() - returns player's intended major
		 */
		public function getMajor(){
			return $this->major;
		}
		/**
		 * getResetExpires() - returns when the players temporary password expires
		 */
		public function getResetExpires(){
			return $this->resetExpires;
		}
	}
?>