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
		$stmt = $this->db->prepare("SELECT * FROM Utente WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	private function checkItemInCart($email,$idProduct){
		$stmt = $this->db->prepare("SELECT Email,IdProdotto,Quantita FROM ProdottoCarrello WHERE Email = ? and IdProduct = ?");
        $stmt->bind_param("si", $email, $idProduct);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	public function register($email,$nome,$password,$cardNumber=NULL,$expDate=NULL,$cvv=NULL){
		if (checkEmail($email)->num_rows==1)
			return $this->$db->query("INSERT INTO Utente VALUES ($email,$nome,$password,$cardNumber,$expDate,$cvv)");
		else
			return false;
	}
	
	public function checkLogin($email, $password){
        $stmt = $this->db->prepare("SELECT Email,Nome,Password FROM Utente WHERE Email = ? AND Password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
	
	public function addItemToCart($email,$idProduct,$quantity){
		$tmp = checkItemInCart($email,$idProduct);
		if (empty($tmp)){
			return $this->$db->query("INSERT INTO ProdottoCarrello VALUES ($email,$idProduct,$quantity)");
		}
		else {
			$newQuantity = $quantity + tmp[0]['Quantita'];
			return $this->$db->query("UPDATE ProdottoCarrello SET Quantita = $newQuantity WHERE Email = $email, IdProdotto = $idProduct");
		}
	}
	
	public function visualizeProduct($email,$idProduct){
		return $this->$db->query("INSERT INTO Visualizzazione (IdProdotto,Email,Data) VALUES ($idProduct,$email,".Date(‘d/m/y’).")");
	}
	
	public function updateCard($email,$cardNumber,$expDate,$cvv){
		return $this->$db->query("UPDATE Utente SET NumeroCarta = $cardNumber, DataScadenza = $expDate, CvvCarta = $cvv WHERE Email = $email");
	}
	
	public function getProductsByCategory($nameCategory){
		$stmt = $this->db->prepare("SELECT IdProdotto,Nome,Costo,CostoSpedizione,NomeImmagine FROM Prodotto WHERE NomeCategoria = ?");
        $stmt->bind_param("s", $nameCategory);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	public function searchProducts($str){
		$stmt = $this->db->prepare("SELECT IdProdotto,NomeCategoria,Nome,Costo,CostoSpedizione,NomeImmagine FROM Prodotto WHERE Nome LIKE \'%?%\' OR NomeCategoria LIKE \'%?%\'");
        $stmt->bind_param("s", $str);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	public function addOrder($email) {
		$tmp = checkEmail($email);
		if (tmp[0]["NumeroCarta"] != NULL && tmp[0]["DataScadenza"] != NULL && tmp[0]["CvvCarta"] != NULL && ...Noitem) {
			$this->$db->query("INSERT INTO Ordine (Email,DataOrdine) VALUES ($email,)");
		} else {
			return false;
		}
	}

}

?>