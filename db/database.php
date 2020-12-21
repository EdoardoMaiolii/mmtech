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
		$stmt = $this->db->prepare("SELECT * FROM utente WHERE email = ?");
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
			return $this->db->query("INSERT INTO prodottocarrello VALUES ($email,$idProduct,$quantity)");
		}
		else {
			$newQuantity = $quantity + $tmp[0]['quantita'];
			return $this->db->query("UPDATE prodottocarrello SET quantita = $newQuantity WHERE email = $email, idprodotto = $idProduct");
		}
	}
	
	public function visualizeProduct($email,$idProduct){
		return $this->db->query("INSERT INTO visualizzazione (idprodotto,email,Data) VALUES ($idProduct,$email,".$this->getYMD().")");
	}
	
	public function updateCard($email,$cardNumber,$expDate,$cvv){
		return $this->db->query("UPDATE utente SET numerocarta = $cardNumber, scadenzacarta = $expDate, cvvcarta = $cvv WHERE email = $email");
	}
	
	public function getProductsByCategory($nameCategory){
		$stmt = $this->db->prepare("SELECT idprodotto,nome,costo,costospedizione,nomeimmagine FROM prodotto WHERE nomecategoria = ?");
        $stmt->bind_param("s", $nameCategory);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	public function searchProducts($str){
		$stmt = $this->db->prepare("SELECT idprodotto,nomecategoria,nome,costo,costospedizione,nomeimmagine FROM prodotto WHERE nome LIKE \'%?%\' OR nomecategoria LIKE \'%?%\'");
        $stmt->bind_param("s", $str);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	public function addOrder($email) {
		$tmp = $this->checkEmail($email);
		if ($tmp[0]["numerocarta"] != NULL && $tmp[0]["scadenzacarta"] != NULL && $tmp[0]["cvvcarta"] != NULL) {
			$productList = $this->db->query("SELECT prodottocarrello.idprodotto,quantita,costo FROM prodottocarrello,prodotto WHERE email = $email AND prodottocarrello.idprodotto = prodotto.idprodotto");
			if (mysqli_num_rows($productList)>0){
				$this->db->query("INSERT INTO ordine (email,dataordine) VALUES ($email,".$this->getYMD().")"); //Add order
				$idOrdine = $this->db->query("SELECT MAX(idordine) FROM ordine WHERE email = $email")[0]['MAX(idordine)']; // find IdOrdine
				foreach ($productList as $product) {
					$this->db->query("INSERT INTO prodottoaquistato VALUES (".$product['idprodotto'].",".$idOrdine.",".$product['costo'].",".$product['quantita']);	//add ProdottoAquisto
				}
				$this->db->query("DELETE FROM prodottocarrello WHERE email = $email");	//Delete Carrello
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
}
