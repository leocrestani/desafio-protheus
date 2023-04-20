<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		ini_set('max_execution_time', 0);
		$this->load->model('AcaoModel', 'am');
		$this->load->model('CotacaoModel', 'cm');
		$this->cm->deleteAll();
		$this->am->deleteAll();
		$this->getAcao();
		$this->getCotacao();
		$this->writeTxt();
		$this->data['cotacoes'] = $this->cm->getAll();
		$this->load->view('home');
	}

	public function getAcao(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://brapi.dev/api/available',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$ticks = json_decode($response);
		if($ticks != null){
			foreach($ticks->stocks as $tick){
				$this->am->insert(array('simbolo'=>$tick));
			}
		}
	}

	public function getCotacao(){
		$acoes = $this->am->getAll();
		foreach($acoes as $acao){
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://brapi.dev/api/quote/'.$acao['simbolo'],
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			));

			$response = curl_exec($curl);
			$info = json_decode($response);
			if($info != null){
				$this->am->updateBySimbolo($acao['simbolo'], array('nome' => isset($info->results[0]->shortName)?$info->results[0]->shortName:null));

				$this->cm->insert(
					array('idAcao' => $acao['idAcao'], 
						'cotacao' => $info->results[0]->regularMarketPrice,
						'valorMercado' => isset($info->results[0]->marketCap)?$info->results[0]->marketCap:null,
						'volumeTransacoes' => $info->results[0]->regularMarketVolume,
						'moeda' => $info->results[0]->currency,
						'data' => $info->results[0]->regularMarketTime
					));
			}
			curl_close($curl);
		}
	}

	public function writeTxt(){
		file_put_contents("cotacoes.txt", "");
		$file = fopen("cotacoes.txt","a",1);
		$allCotations = $this->cm->getAll();
		$strConstructor = str_pad('Simbolo', 10,' ', STR_PAD_RIGHT).str_pad('Nome', 30,' ', STR_PAD_RIGHT).str_pad('Cotação', 15,' ', STR_PAD_RIGHT).str_pad('Valor de Mercado', 25,' ', STR_PAD_RIGHT).str_pad('Volume de Transações', 25,' ', STR_PAD_RIGHT).str_pad('Moeda', 10,' ', STR_PAD_RIGHT).'Data';
		fwrite($file, $strConstructor.PHP_EOL);
		foreach($allCotations as $line){
			$strConstructor = str_pad($line['simbolo'], 10,' ', STR_PAD_RIGHT).str_pad($line['nome']?:" ", 30,' ', STR_PAD_RIGHT).str_pad($line['cotacao'], 15,' ', STR_PAD_RIGHT).str_pad($line['valorMercado']?:"", 25,' ', STR_PAD_RIGHT).str_pad($line['volumeTransacoes'], 25,' ', STR_PAD_RIGHT).str_pad($line['moeda'], 10,' ', STR_PAD_RIGHT).$line['data'];
			fwrite($file, $strConstructor.PHP_EOL);
		}
		fclose($file);
	}
}
