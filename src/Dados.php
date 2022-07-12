<?php

namespace src;

class Dados{

	private $link = "C:/xampp/htdocs/projetos/projetos/dash/base/acidentes_recife_2021.json";

	public function getMes($valor){

        $get = file_get_contents($this->link);

		$getJson = json_decode($get); 

        $janeiro = 0;
        $fevereiro = 0;
        $marco = 0;
        $abril = 0;
        $maio = 0;
        $junho = 0;
        $julho = 0;
        $agosto = 0;
        $setembro = 0;
        $outubro = 0;
        $novembro = 0;
        $dezembro = 0;
		
        $total = 0;

		foreach($getJson as $periodo){}
        for ( $i = 0; $i < count($periodo); $i++ ) { 
            
            $data = $periodo[$i][1];

            $total++;
            
            if($data > "2021-01-00" && $data < "2021-01-32"){
                $janeiro++;
            }elseif($data > "2021-02-00" && $data < "2021-02-29"){
                $fevereiro++;
            }elseif($data > "2021-03-00" && $data < "2021-03-32"){
                $marco++;
            }elseif($data > "2021-04-00" && $data < "2021-04-31"){
                $abril++;
            }elseif($data > "2021-05-00" && $data < "2021-05-32"){
                $maio++;
            }elseif($data > "2021-06-00" && $data < "2021-06-31"){
                $junho++;
            }elseif($data > "2021-07-00" && $data < "2021-07-32"){
                $julho++;
            }elseif($data > "2021-08-00" && $data < "2021-08-32"){
                $agosto++;
            }elseif($data > "2021-09-00" && $data < "2021-09-31"){
                $setembro++;
            }elseif($data > "2021-10-00" && $data < "2021-10-32"){
                $outubro++;
            }elseif($data > "2021-11-00" && $data < "2021-11-31"){
                $novembro++;
            }elseif($data > "2021-12-00" && $data < "2021-12-32"){
                $dezembro++;
            }
           
        }
        if($valor == "janeiro"){
            echo $janeiro;     
        }elseif($valor == "fevereiro"){ 
            echo $fevereiro;
        }elseif($valor == "marco"){ 
            echo $marco;
        }elseif($valor == "abril"){ 
            echo $abril;
        }elseif($valor == "maio"){ 
            echo $maio;
        }elseif($valor == "junho"){ 
            echo $junho;
        }elseif($valor == "julho"){ 
            echo $julho;
        }elseif($valor == "agosto"){ 
            echo $agosto;
        }elseif($valor == "setembro"){ 
            echo $setembro;
        }elseif($valor == "outubro"){ 
            echo $outubro;
        }elseif($valor == "novembro"){ 
            echo $novembro;
        }elseif($valor == "dezembro"){ 
            echo $dezembro;
        }elseif($valor == "total"){
            echo $total;     
        }
    }    

	public function getPorcentagem($valor){

		$get = file_get_contents($this->link);

		$getJson = json_decode($get); 

		$quant_manha = 0;
		$quant_tarde = 0;
		$quant_noite = 0;
		
        foreach($getJson as $periodo){}
		for($i = 0; $i < count($periodo); $i++)
		{
			$hora = $periodo[$i][2];

			if($hora > "06:00:00" && $hora < "12:00:00"){
				$quant_manha++;
			}
			if($hora > "12:00:00" && $hora < "18:00:00"){
				$quant_tarde++;
			}
			if($hora > "18:00:00" && $hora < "24:00:00"){
				$quant_noite++;
			}
		}

		$total = $quant_manha + $quant_tarde + $quant_noite;

		$porc_manha = number_format(($quant_manha * 100) / $total);
		$porc_tarde = number_format(($quant_tarde * 100) / $total);
		$porc_noite = number_format(($quant_noite * 100) / $total);
		

		if($valor == "manha")
		{
			return $porc_manha;
		}
		elseif($valor == "tarde")
		{
			return $porc_tarde;
		}
		elseif($valor == "noite")
		{
			return $porc_noite;
		}
	}

	public function getVitimas($valor){

		$get = file_get_contents($this->link);

		$getJson = json_decode($get);

		$comVitimas = 0;
		$semVitimas = 0;

		foreach($getJson as $periodo){}
        for ( $i = 0; $i < count($periodo); $i++ ) { 
            
            $vitimas = $periodo[$i][3];

			if($vitimas == "COM VÍTIMA"){
				$comVitimas++;
			}elseif($vitimas == "SEM VÍTIMA"){
				$semVitimas++;
			}
		}

		if($valor == "comVitima"){
			return $comVitimas;
		}elseif($valor == "semVitima"){
			return $semVitimas;
		}
	}

    public function getBairro($valor){

        $get = file_get_contents($this->link);

		$getJson = json_decode($get); 
        
        $quantidade_bairro_boaviagem = 0;
        $quantidade_bairro_afogados = 0;
        $quantidade_bairro_boavista = 0;
        $quantidade_bairro_imbiribeira = 0;
        $quantidade_bairro_ipsep = 0;

        foreach($getJson as $periodo){}
		for($i = 0; $i < count($periodo); $i++){
    
			$bairro = $periodo[$i][5];

            if($bairro == "BOA VIAGEM"){
                $quantidade_bairro_boaviagem++;
            }
            if($bairro == "AFOGADOS"){
                $quantidade_bairro_afogados++;
            }
            if($bairro == "BOA VISTA"){
                $quantidade_bairro_boavista++;
            }
            if($bairro == "IMBIRIBEIRA"){
                $quantidade_bairro_imbiribeira++;
            }
            if($bairro == "IPSEP"){
                $quantidade_bairro_ipsep++;
            }
		}   

        if($valor == "boaviagem"){
            return $quantidade_bairro_boaviagem;                
        }
        if($valor == "afogados"){
            return $quantidade_bairro_afogados;                
        }
        if($valor == "boavista"){
            return $quantidade_bairro_boavista;                
        }
        if($valor == "imbiribeira"){
            return $quantidade_bairro_imbiribeira;                
        }
        if($valor == "ipsep"){
            return $quantidade_bairro_ipsep;                
        }
    }
    
}