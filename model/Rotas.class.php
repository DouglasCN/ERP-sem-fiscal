<?php

class Rotas {

    public static $pag;
    private static $pasta_controller = 'controller';
	private static $pasta_view = 'view';
	private static $pag_adm = 'adm';

	static function get_SiteHOME(){
		return Config::SITE_URL . '/' . Config::SITE_PASTA;
	}

	static function get_SiteRAIZ(){
		return $_SERVER['DOCUMENT_ROOT'] . '/' . Config::SITE_PASTA;
    }
    
    static function get_SiteTEMA(){
		return self::get_SiteHOME(). '/'.self::$pasta_view.'/tema';

	}

	static function get_SiteVIEW(){
		return self::get_SiteHOME(). '/'.self::$pasta_view;
	}

	static function get_SiteADM(){
		return Config::SITE_URL . '/' . Config::SITE_PASTA . '/' . self::$pag_adm;
	}

	//rotas padrao
	static function pag_Login(){
		return self::get_SiteHOME();
	}

	static function pag_Sair(){
		return self::get_SiteADM(). '/sair';
	}

	static function pag_Home(){
		return self::get_SiteHOME(). '/' . self::$pag_adm;
	}
	
	static function pag_Clientes(){
		return self::get_SiteADM(). '/clientes';
	}

	static function pag_Cliente($id = NULL){
		if($id != NULL){
			return self::get_SiteADM(). '/cliente' . '/' . $id;
		}else{
			return self::get_SiteADM(). '/cliente';
		}
	}

	//
	static function getImagePasta(){
		return 'media/images/';
	}
	//caminho completo para pegar a minha imagem
	static function get_ImageURL(){
		return self::get_SiteHOME(). '/' .self:: getImagePasta();

	}

	static function Redirecionar($tempo, $pagina){
		$url = '<meta http-equiv="refresh" content="'.$tempo.'; url='. $pagina .'">';
		echo $url;
	}
	
	
    //metodo para pegar a pagina
	static function get_Pagina(){
		//verifica se a url chamou essa pagina
		if (isset($_GET['pag'])) {

			$pagina = $_GET['pag'];

			//O explode faz um tratamento dentro de uma string
			self::$pag = explode('/', $pagina);


			$pagina = 'controller/' . self::$pag[0]  . '.php';
			//$pagina = 'controller/' . $_GET['pag'] . '.php';

			//verifica se o arquivo exite
			if (file_exists($pagina)) {
				
				//ele faz a chamada dessa pagina
				include $pagina;
			}
			else{
				include 'erro.php';
			}
			return 0;
		}
		return 1;
	}
    
}


?>

