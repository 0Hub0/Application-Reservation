<?php
	class reservation
		{	
			// Model class for a reservation
			private $dest;
			private $nbrP;
			private $assur;
			private $id_res;
			private $id;
			private $price;
			
			public function __construct()
			{
				$this->dest="";
				$this->nbrP="";
				$this->assur="";
				$this->id_res="";
				$this->id="";
				$this->price="";	
			}
			
			// Getter
			public function getDest()
			{
				return $this->dest;
			}
			public function getNbrp()
			{
				return $this->nbrP;
			}
			public function getAssur()
			{
				return $this->assur;
			}
			public function getPrice()
			{
				return $this->price;
			}
			
			
			//Setter
			public function setDest($dest)
			{
				$this->dest =$dest;
			}
			public function setNbrp($nbrP)
			{
				$this->nbrP=$nbrP;
			}
			public function setAssur($assur)
			{
				$this->assur=$assur;
			}
			public function setPrice($price)
			{
				$this->price=$price;
			}
		}
?>