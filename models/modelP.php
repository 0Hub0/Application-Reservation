<?php
	class person
		{
			//// Model class for a person
			private $name;
			private $age;
			private $id_res;
			private $id;
			
			public function __construct()
			{
				$this->name="";
				$this->age="";
				$this->id_res="";
				$this->id="";
			}
			
			// Getter
			public function getName() 
			{
				return $this->name;
			}
			public function getAge()  
			{
				return $this->age;
			}
			public function getIdres()
			{
				return $this->id_res;
			}
			public function getId()
			{
				return $this->id;
			}
			
			// Setter
			public function setName($name)
			{
				$this->name=$name;
				}
			public function setAge($age)
			{
				$this->age=$age;
			}
			public function setIdres($id_res)
			{
				$this->id_res=$id_res;
			}
			public function setId($id)
			{
				$this->id=$id;
			}
		}
?>