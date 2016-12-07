<?php

	class reservation
	{	
		private $dest;
		private $nbrP;
		private $assur;
		private $Idres;
		private $Id;
		
			public function __construct()
		{
				$this->dest="";
				$this->nbrP="";
				$this->assur="";
				$this->Idres="";
				$this->Id="";
				$this->price="";
				
		}
		
		public function getdest()
		{
			return $this->dest;
		}
		public function getnbrP()
		{
			return $this->nbrP;
		}
		public function getassur()
		{
			return $this->assur;
		}
		public function getprice()
		{
			return $this->price;
		}
		
		
		public function setdest($dest)
		{
			$this->dest =$dest;
		}
		public function setnbrP($nbrP)
		{
			$this->nbrP=$nbrP;
		}
		public function setassur($assur)
		{
			$this->assur=$assur;
		}
		public function setprice($price)
		{
			$this->assur=$price;
		}
		
	
		
	}

?>
