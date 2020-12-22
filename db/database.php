<?php

class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname){
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if($this->db->connect_error){
            die("Connesione fallita al db");
        }
    }
	
	private function checkEmail($email) {
		$stmt = $this->db->prepare("SELECT email,nome,password,numerocarta,scadenzacarta,cvvcarta FROM utente WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	private function getYMD(){
		return Date('y')."-".Date('m')."-".Date('d');
	}
	
	private function checkItemInCart($email,$idProduct){
		$stmt = $this->db->prepare("SELECT email,idprodotto,quantita FROM prodottocarrello WHERE email = ? and idproduct = ?");
        $stmt->bind_param("si", $email, $idProduct);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	public function register($email,$nome,$password,$cardNumber=NULL,$expDate=NULL,$cvv=NULL){
		$stmt = $this->db->prepare("INSERT INTO utente VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("sssssi", $email,$nome,$password,$cardNumber,$expDate,$cvv);
        $stmt->execute();
        return true;
	}
	
	public function checkLogin($email, $password){
        $stmt = $this->db->prepare("SELECT email,nome,password FROM utente WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
	
	public function addItemToCart($email,$idProduct,$quantity){
		$tmp = $this->checkItemInCart($email,$idProduct);
		if (empty($tmp)){
			$stmt = $this->db->prepare("INSERT INTO prodottocarrello VALUES (?,?,?)");
			$stmt->bind_param("sii", $email,$idProduct,$quantity);
			$stmt->execute();
			$result = $stmt->get_result();
			return $result->fetch_all(MYSQLI_ASSOC);
		}
		else {
			$newQuantity = $quantity + $tmp[0]['quantita'];
			$stmt = $this->db->prepare("UPDATE prodottocarrello SET quantita = ? WHERE email = ?, idprodotto = ?");
			$stmt->bind_param("isi", $newQuantity,$email,$idProduct);
			$stmt->execute();
			$result = $stmt->get_result();
			return $result->fetch_all(MYSQLI_ASSOC);
		}
	}
	
	public function visualizeProduct($email,$idProduct){
		$stmt = $this->db->prepare("INSERT INTO visualizzazione (idprodotto,email,Data) VALUES (?,?,".$this->getYMD().")");
		$stmt->bind_param("is", $idProduct, $email);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	public function updateCard($email,$cardNumber,$expDate,$cvv){
		$stmt = $this->db->prepare("UPDATE utente SET numerocarta = ?, scadenzacarta = ?, cvvcarta = ? WHERE email = ?");
		$stmt->bind_param("ssis", $cardNumber, $expDate, $cvv, $email);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	public function getProductsByCategory($nameCategory){
		$stmt = $this->db->prepare("SELECT idprodotto,nome,costo,costospedizione,nomeimmagine FROM prodotto WHERE nomecategoria = ?");
        $stmt->bind_param("s", $nameCategory);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	public function searchProducts($str){
		$stmt = $this->db->prepare("SELECT idprodotto,nomecategoria,nome,costo,costospedizione,nomeimmagine FROM prodotto");
        $stmt->execute();
		$result = $stmt->get_result();
		$result = $result->fetch_all(MYSQLI_ASSOC);
		$products = array();
		foreach($result as $product){
			if(strpos($product["nome"], $str)){
				array_push($products,$product);
			}
		}
        return $products;
	}
	
	public function addOrder($email) {
		$tmp = $this->checkEmail($email);
		if ($tmp[0]["numerocarta"] != NULL && $tmp[0]["scadenzacarta"] != NULL && $tmp[0]["cvvcarta"] != NULL) {
			$stmt = $this->db->prepare("SELECT prodottocarrello.idprodotto,quantita,costo FROM prodottocarrello,prodotto WHERE email = ? AND prodottocarrello.idprodotto = prodotto.idprodotto");
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$result = $stmt->get_result();
			$productList = $result->fetch_all(MYSQLI_ASSOC);
			if (mysqli_num_rows($productList)>0){
				$stmt = $this->db->prepare("INSERT INTO ordine (email,dataordine) VALUES (?,".$this->getYMD().")");
				$stmt->bind_param("s", $email);
				$stmt->execute();
				$stmt = $this->db->prepare("SELECT MAX(idordine) FROM ordine WHERE email = ?");
				$stmt->bind_param("s", $email);
				$stmt->execute();
				$result = $stmt->get_result();
				$idOrdine = $result->fetch_all(MYSQLI_ASSOC)[0]['MAX(idordine)']; // find IdOrdine
				foreach ($productList as $product) {
					//manca questo
					$stmt = $this->db->prepare("INSERT INTO prodottoaquistato VALUES (?,?,?,?");
					$stmt->bind_param("iidi", $product['idprodotto'],$idOrdine,$product['costo'],$product['quantita']);
					$stmt->execute();
				}
				$stmt = $this->db->prepare("DELETE FROM prodottocarrello WHERE email = ?");
				$stmt->bind_param("s", $email);
				$stmt->execute();
				return true;
			}
		}
		return false;
	}
	
	public function getCard($email){
		$stmt = $this->db->prepare("SELECT numerocarta,scadenzacarta,cvvcarta FROM utente WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function orderedProducts(){
        $stmt = $this->db->prepare("SELECT prodotto.idprodotto,prodotto.nomecategoria,prodotto.nome,prodotto.costo,prodotto.costospedizione,prodotto.nomeimmagine,prodotto.descrizione FROM prodotto LEFT JOIN visualizzazione ON prodotto.idprodotto = visualizzazione.idprodotto GROUP BY prodotto.idprodotto ORDER BY COUNT(prodotto.idprodotto) DESC");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function chronologyUser($email){
        $stmt = $this->db->prepare("SELECT prodotto.idprodotto,prodotto.nomecategoria,prodotto.nome,prodotto.costo,prodotto.costospedizione,prodotto.nomeimmagine,prodotto.descrizione FROM prodotto,visualizzazione WHERE prodotto.idprodotto = visualizzazione.idprodotto AND email = ? GROUP BY prodotto.idprodotto ORDER BY MAX(Data) DESC");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
