<?php
class person
	{
		private $name;
		private $age;
		private $Idres;
		private $Id;
		
		public function __construct()
		{
			$this->name="";
			$this->age="";
			$this->Idres="";
			$this->Id="";
		}
		
		public function getname() 
		{
			return $this->name;
		}
		public function getage()  
		{
			return $this->age;
		}
		public function getIdres()
		{
			return $this->Idres;
		}
		public function getId()
		{
			return $this->Id;
		}
		
		
		public function setname($name)
		{
			$this->name=$name;
			}
		public function setage($age)
		{
			$this->age=$age;
		}
		public function setIdres($Idres)
		{
			$this->Idres=$Idres;
		}
		public function setId($Id)
		{
			$this->Id=$Id;
		}
		
		
		
		
		
	}

?>
