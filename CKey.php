<?php

class CKeyGenerator {
	
	public $numbers;
	public $stars;
	
	const MINN = 1;
	const MAXN = 50;
	const MINS = 1;
	const MAXS = 11;
	
	const NN = 5;
	const NS = 2;
	
	public function __construct($nn = self::NN, $ns = self::NS) {
		$bag = array();
			
		$this->numbers = array();
		$this->stars = array();
		
		$bag = range(self::MINN, self::MAXN);		
		$this->numbers = $this->extractor($bag,$nn);
		
		$bag = range(self::MINS, self::MAXS);		
		$this->stars = $this->extractor($bag,$ns);
		
		
	}
	
	private function extractor($bag,$n) {
		$extraction = array();
		while($n) {
			// gero um indice aleatorio
			$random_idx = rand(0,count($bag)-1);
			// retiro elemento sorteado do array
			$extract = array_splice($bag,$random_idx,1);
			// acrescentar o elemento sorteado à chave de extracao
			$extraction[] = $extract[0];
			$n--;
		}
		sort($extraction,SORT_NUMERIC);
		return $extraction;
	}
	
	public function asJSON() {
		return json_encode($this);
	}
	
	public function asXML() {
		$xmlkey = new SimpleXMLElement("<key/>");
		$noden = $xmlkey->addChild("numbers");
		$nodes = $xmlkey->addChild("stars");
		
		foreach ($this->numbers as $number) {
			$noden->addChild("ke",$number);
		}
		
		foreach ($this->stars as $star) {
			$nodes->addChild("ke",$star);
		}
		
		return $xmlkey->asXML();
	}
	
}

//echo "numero de estrelas : ". CKey::NS;

//$teste = new CKeyGenerator();
//echo $teste->asJSON();
//echo $teste->asXML();

?>