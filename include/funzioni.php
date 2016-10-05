<?php 
	// converti la data 
	
	function converti_data_in_eng($data_eng) {
		$array = explode("/", $data_eng) ;
		$converti_data_in_eng = $array[2]."-".$array[1]."-".$array[0];
		return $converti_data_in_eng;
	}	
	
	function converti_data_in_ita($data_ita) {
		$array_ita = explode("-", $data_ita) ;
		$converti_data_in_ita = $array_ita[2]."/".$array_ita[1]."/".$array_ita[0];
		return $converti_data_in_ita;
	}	
	
	// aggiungi un  _
	
	function elimina_spazi ($stringa) {
		return str_replace(" ","_",$stringa);
	}
	
	
	function estensione($string) { 
		//Controllo il file
		$trova_punto = explode(".", $string);
		$estensione = $trova_punto[count($trova_punto) - 1];
		$estensione = strtolower($estensione);
		
		// Se non ci sono estensioni
		if (isset($trova_punto[1]) == FALSE)
		{
			return '';
		}
		//Ritorno il valore dell' estensione
		return $estensione;
	}
	
	
	
	
	