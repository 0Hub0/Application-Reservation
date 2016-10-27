<?php

	class reservation
	{	
		private $dest;
		private $nbrP;
		private $assur;
		private $Idres;
		private $Id;
		
		public function __construct($dest="",$nbrP="",$assur="",$Idres="",$Id="")
		{
				$this->dest=$dest;
				$this->nbrP=$nbrP;
				$this->assur=$assur;
				$this->Idres=$Idres;
				$this->Id=$Id;
		}
		
		public function getdest()
		{
			return $this->dest;
		}
		public function getnbrP()
		{
			return $this->nbrP;
		}
		public function assur()
		{
			return $this->assur;
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
		
	
		
	}

?>