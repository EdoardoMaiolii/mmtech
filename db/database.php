<?php

class DatabaseHelper
{
	private $db;

	public function __construct($servername, $username, $password, $dbname)
	{
		$this->db = new mysqli($servername, $username, $password, $dbname);
		if ($this->db->connect_error) {
			die("Connesione fallita al db");
		}
	}

	public function checkEmail($email)
	{
		$stmt = $this->db->prepare("SELECT email,nome,password,numerocarta,scadenzacarta,cvvcarta,venditore FROM utente WHERE email = ?");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	private function checkItemInCart($email, $idProduct)
	{
		$stmt = $this->db->prepare("SELECT quantita FROM prodottocarrello WHERE email = ? and idprodotto = ?");
		$stmt->bind_param("si", $email, $idProduct);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	private function checkProductAvailability($idProduct)
	{
		$stmt = $this->db->prepare("SELECT nome FROM prodotto WHERE quantitadisponibile >0 and idprodotto = ?");
		$stmt->bind_param("i", $idProduct);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	private function addNotification($email, $messaggio)
	{
		$stmt = $this->db->prepare("INSERT INTO notifica(email,data,visualizzata,messaggio) VALUES (?,NOW(),false,?)");
		$stmt->bind_param("ss", $email, $messaggio);
		return $stmt->execute();
	}

	public function sendMail($email, $oggetto, $messaggio)
	{
		ini_set("SMTP", "localhost");
		ini_set("smtp_port", "587");
		ini_set("sendmail_from", "mmtechnoreply@gmail.com");
		ini_set("sendmail_path", "C:\wamp\bin\sendmail.exe -t");
		$header = "From: mmtechnoreply@gmail.com";
		$msg = wordwrap($messaggio, 70);
		mail($email, $oggetto, $msg, $header);
	}

	public function register($email, $nome, $password, $cardNumber = NULL, $expDate = NULL, $cvv = NULL)
	{
		$tmp = $this->checkEmail($email);
		if (!empty($tmp)) return false;
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT); // hash memorizzato nel database
		$stmt = $this->db->prepare("INSERT INTO utente VALUES (?,?,?,?,?,?,false)");
		$stmt->bind_param("sssssi", $email, $nome, $hashedPassword, $cardNumber, $expDate, $cvv);
		$stmt->execute();
		$this->addNotification($email, "Ciao ".$nome.", hai creato con successo un account su MMtech.com, COMPLIMENTI ! ");
		$this->sendMail($email, "Registrazione effettuata MMtech", "Ciao ".$nome.", hai creato con successo un account su MMtech.com, COMPLIMENTI ! ");
		return true;
	}

	public function checkLogin($email, $userPassword)
	{
		$stmt = $this->db->prepare("SELECT email,nome,password,venditore FROM utente WHERE email = ?");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$result = $stmt->get_result();
		$result = $result->fetch_all(MYSQLI_ASSOC);
		if (empty($result)) {
			return false;
		}
		$hashedPassword = $result[0]['password']; // password criptata
		return password_verify($userPassword, $hashedPassword); // controllo che la password inserita dall'utente sia corretta
	}

	public function addItemToCart($email, $idProduct, $quantity)
	{
		$tmp1 = $this->checkItemInCart($email, $idProduct);
		$tmp2 = $this->checkProductAvailability($idProduct);
		if (!empty($tmp2))
			if (empty($tmp1)) {
				$stmt = $this->db->prepare("INSERT INTO prodottocarrello VALUES (?,?,?)");
				$stmt->bind_param("sii", $email, $idProduct, $quantity);
				$stmt->execute();
				return $stmt->get_result();
			} else {
				$newQuantity = $quantity + $tmp1[0]['quantita'];
				$stmt = $this->db->prepare("UPDATE prodottocarrello SET quantita = ? WHERE email = ? AND idprodotto = ?");
				$stmt->bind_param("isi", $newQuantity, $email, $idProduct);
				$stmt->execute();
				return $stmt->get_result();
			}
	}

	public function visualizeProduct($email, $idProduct)
	{
		$stmt = $this->db->prepare("INSERT INTO visualizzazione (idprodotto,email,Data) VALUES (?,?,NOW())");
		$stmt->bind_param("is", $idProduct, $email);
		$stmt->execute();
		return true;
	}

	public function updateCard($email, $cardNumber, $expDate, $cvv)
	{
		$stmt = $this->db->prepare("UPDATE utente SET numerocarta = ?, scadenzacarta = ?, cvvcarta = ? WHERE email = ? AND Venditore = false");
		$stmt->bind_param("ssis", $cardNumber, $expDate, $cvv, $email);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function getProductsByCategory($nameCategory)
	{
		$stmt = $this->db->prepare("SELECT idprodotto,nome,costo,costospedizione,nomeimmagine,quantitadisponibile FROM prodotto WHERE nomecategoria = ?");
		$stmt->bind_param("s", $nameCategory);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function searchProducts($str)
	{
		$stmt = $this->db->prepare("SELECT idprodotto,nomecategoria,nome,costo,costospedizione,nomeimmagine,quantitadisponibile FROM prodotto ");
		$stmt->execute();
		$result = $stmt->get_result();
		$result = $result->fetch_all(MYSQLI_ASSOC);
		$products = array();
		foreach ($result as $product) {
			if (strpos(strtolower($product["nome"]), strtolower($str)) !== false) {
				array_push($products, $product);
			}
		}
		return $products;
	}

	public function addOrder($email)
	{
		$tmp = $this->checkEmail($email);
		if ($tmp[0]["numerocarta"] != NULL && $tmp[0]["scadenzacarta"] != NULL && $tmp[0]["cvvcarta"] != NULL) {
			$stmt = $this->db->prepare("SELECT prodottocarrello.idprodotto,quantita,quantitadisponibile,costo,costospedizione FROM prodottocarrello,prodotto WHERE email = ? AND prodottocarrello.idprodotto = prodotto.idprodotto");
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$result = $stmt->get_result();
			$productList = $result->fetch_all(MYSQLI_ASSOC);
			$stmt = $this->db->prepare("SELECT prodottocarrello.idprodotto,quantita,costo,quantitadisponibile FROM prodottocarrello,prodotto WHERE email = ? AND prodottocarrello.idprodotto = prodotto.idprodotto AND prodotto.quantitadisponibile > 0");
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$result = $stmt->get_result();
			$productNotAvList = $result->fetch_all(MYSQLI_ASSOC);
			$stmt = $this->db->prepare("SELECT email FROM utente WHERE venditore=true");
			$stmt->execute();
			$admin = $stmt->get_result();
			$admin = $admin->fetch_all(MYSQLI_ASSOC);
			// procedi all'ordine se nel carrello e' presente almeno un prodotto e se quelli presenti sono tutti disponibili
			if (count($productList) > 0 && count($productNotAvList) == count($productList)) {
				// aggiungo l'ordine nella tabella degli ordini
				$stmt = $this->db->prepare("INSERT INTO ordine (email,dataordine,statoordine) VALUES (?,NOW(),'Elaborazione')");
				$stmt->bind_param("s", $email);
				$stmt->execute();
				$stmt = $this->db->prepare("SELECT MAX(idordine) FROM ordine WHERE email = ?");
				$stmt->bind_param("s", $email);
				$stmt->execute();
				$result = $stmt->get_result();
				$idOrdine = $result->fetch_all(MYSQLI_ASSOC)[0]['MAX(idordine)']; // find IdOrdine
				foreach ($productList as $product) {
					// aggiorno la tabella dei prodotti acquistati
					$stmt = $this->db->prepare("INSERT INTO prodottoacquistato VALUES (?,?,?,?)");
					$tmp = $product['costo'] + $product['costospedizione'];
					$stmt->bind_param("iidi", $product['idprodotto'], $idOrdine, $tmp, $product['quantita']);
					$stmt->execute();
					// aggiorno la quantita' disponibile dei prodotti acquistati
					$stmt = $this->db->prepare("UPDATE prodotto SET quantitadisponibile =? WHERE idprodotto = ?");
					$newQuantity = $product['quantitadisponibile'] - $product['quantita'];
					$stmt->bind_param("ii", $newQuantity, $product['idprodotto']);
					$stmt->execute();
					if ($newQuantity == 0)
						$this->addNotification($admin[0]['email'], "La informamo che un recente ordine ha provocato una inaspettata mancanza di fornitura dell articolo con ID [" . $product['idprodotto'] . "]");
				}
				// elimino i prodotti acquistati dal carrello
				$stmt = $this->db->prepare("DELETE FROM prodottocarrello WHERE email = ?");
				$stmt->bind_param("s", $email);
				$stmt->execute();
				$this->addNotification($email,"Hai effettuato con successo l'ordine con ID [" . $idOrdine . "] con il metodo di pagamento da lei inserito.");
				$this->addNotification($admin[0]['email'], "[".$email."] Ha effettuato con successo l'ordine con ID [" . $idOrdine . "]");
				$this->sendMail($email, "Ordine effettuato", "Hai effettuato con successo l'ordine con ID [" . $idOrdine . "] con il metodo di pagamento da lei inserito.");
				return true;
			}
		}
		return false;
	}

	public function getCard($email)
	{
		$stmt = $this->db->prepare("SELECT numerocarta,scadenzacarta,cvvcarta FROM utente WHERE email = ?");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function orderedProducts()
	{
		$stmt = $this->db->prepare("SELECT prodotto.idprodotto,prodotto.nomecategoria,prodotto.nome,prodotto.costo,prodotto.costospedizione,prodotto.nomeimmagine,prodotto.descrizione,prodotto.quantitadisponibile FROM prodotto LEFT JOIN visualizzazione ON prodotto.idprodotto = visualizzazione.idprodotto GROUP BY prodotto.idprodotto ORDER BY COUNT(prodotto.idprodotto) DESC LIMIT 12");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	public function chronologyUser($email)
	{
		$stmt = $this->db->prepare("SELECT prodotto.idprodotto,prodotto.nomecategoria,prodotto.nome,prodotto.costo,prodotto.costospedizione,prodotto.nomeimmagine,prodotto.descrizione,prodotto.quantitadisponibile FROM prodotto,visualizzazione WHERE prodotto.idprodotto = visualizzazione.idprodotto AND email = ? GROUP BY prodotto.idprodotto,prodotto.nomecategoria,prodotto.nome,prodotto.costo,prodotto.costospedizione,prodotto.nomeimmagine,prodotto.descrizione,prodotto.quantitadisponibile ORDER BY MAX(Data) DESC LIMIT 8");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function getCartProducts($email)
	{
		$stmt = $this->db->prepare("SELECT prodotto.nome,prodottocarrello.idprodotto,quantita,nomeimmagine,quantitadisponibile,prodotto.costo,prodotto.costospedizione FROM prodottocarrello,prodotto WHERE prodottocarrello.email = ? and prodottocarrello.idprodotto = prodotto.idprodotto");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function getOrders($email)
	{
		$stmt = $this->db->prepare("SELECT idordine,dataordine,statoordine FROM ordine WHERE email = ?");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function getProductsByOrder($idorder)
	{
		$stmt = $this->db->prepare("SELECT prodotto.idprodotto,prodotto.nomecategoria,nome,costospedizione,nomeimmagine,prezzoacquisto,quantita FROM prodottoacquistato LEFT JOIN prodotto ON prodottoacquistato.idprodotto = prodotto.idprodotto WHERE idordine = ?");
		$stmt->bind_param("i", $idorder);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function checkProduct($productid)
	{
		$stmt = $this->db->prepare("SELECT idprodotto FROM prodotto WHERE idprodotto = ?");
		$stmt->bind_param("i", $productid);
		$stmt->execute();
		$result = $stmt->get_result();
		return count($result->fetch_all(MYSQLI_ASSOC)) != 0;
	}

	public function getProductById($productid)
	{
		$stmt = $this->db->prepare("SELECT idprodotto,nomecategoria,nome,costo,costospedizione,nomeimmagine,descrizione,quantitadisponibile FROM prodotto WHERE idprodotto = ?");
		$stmt->bind_param("i", $productid);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function modifyUser($email, $nome, $cardNumber, $expDate, $cvv)
	{
		if (count($this->checkEmail($email)) == 1) {
			$stmt = $this->db->prepare("UPDATE utente SET nome =? , numerocarta=? , scadenzacarta=? , cvvcarta=? WHERE email = ?");
			$stmt->bind_param("sssis", $nome, $cardNumber, $expDate, $cvv, $email);
			$stmt->execute();
			return true;
		}
		return false;
	}

	public function removeProductFromCart($email, $idproduct)
	{
		$stmt = $this->db->prepare("DELETE FROM prodottocarrello WHERE idprodotto = ? and email = ?");
		$stmt->bind_param("is", $idproduct, $email);
		return $stmt->execute();
	}

	public function updateQuantity($quantity, $email, $idProduct)
	{
		$stmt = $this->db->prepare("UPDATE prodottocarrello SET quantita = ? WHERE email = ? AND idprodotto = ?");
		$stmt->bind_param("isi", $quantity, $email, $idProduct);
		return $stmt->execute();
	}

	public function getCategories()
	{
		$stmt = $this->db->prepare("SELECT nomecategoria FROM categoria");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}


	public function getNotifications($email)
	{
		$stmt = $this->db->prepare("SELECT idnotifica,data,visualizzata,messaggio FROM notifica WHERE email = ? ORDER BY idnotifica DESC");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function visualizeNotification($email, $idNotification)
	{
		$stmt = $this->db->prepare("UPDATE notifica SET visualizzata = true WHERE email = ? AND idnotifica = ?");
		$stmt->bind_param("si", $email, $idNotification);
		return $stmt->execute();
	}

	public function deleteNotification($email, $idNotification)
	{
		$stmt = $this->db->prepare("DELETE FROM notifica WHERE email = ? AND idnotifica = ?");
		$stmt->bind_param("si", $email, $idNotification);
		$stmt->execute();
		return $stmt->execute();
	}

	public function isSeller($email)
	{
		$stmt = $this->db->prepare("SELECT venditore FROM utente WHERE email = ?");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$result = $stmt->get_result();
		$seller = $result->fetch_all(MYSQLI_ASSOC);
		return $seller[0]['venditore'];
	}

	public function insertProduct($newNomeCategoria, $newNome, $newCosto, $newCostoSpedizione, $newNomeImmagine, $newDescrizione, $newQuantitaDisponibile)
	{
		$stmt = $this->db->prepare("INSERT INTO Prodotto(nomecategoria,nome,costo,costospedizione,nomeimmagine,descrizione,quantitadisponibile) VALUES (?,?,?,?,?,?,?)");
		$stmt->bind_param("ssddssi", $newNomeCategoria, $newNome, $newCosto, $newCostoSpedizione, $newNomeImmagine, $newDescrizione, $newQuantitaDisponibile);
		return $stmt->execute();
	}

	public function updateProduct($productid, $newNomeCategoria, $newNome, $newCosto, $newCostoSpedizione, $newNomeImmagine, $newDescrizione, $newQuantitaDisponibile)
	{
		$stmt = $this->db->prepare("UPDATE Prodotto SET nomecategoria=?,nome=?,costo=?,costospedizione=?,nomeimmagine=?,descrizione=?,quantitadisponibile=? WHERE idprodotto = ?");
		$stmt->bind_param("ssddssii", $newNomeCategoria, $newNome, $newCosto, $newCostoSpedizione, $newNomeImmagine, $newDescrizione, $newQuantitaDisponibile, $productid);
		$oldProd = $this->getProductById($productid)[0];
		if ($oldProd['costo'] != $newCosto) {
			$stmt2 = $this->db->prepare("SELECT DISTINCT u.email FROM utente u , prodottocarrello pc WHERE pc.idprodotto=? AND u.email = pc.email ");
			$stmt2->bind_param("i", $productid);
			$stmt2->execute();
			$result1 = $stmt2->get_result();
			$emails = $result1->fetch_all(MYSQLI_ASSOC);
			if (!empty($emails)) {
				for ($i = 0; $i < count($emails); $i++) {
					$this->addNotification($emails[$i]['email'], "La informiamo che e' stato appena modificato il prezzo del prodotto : " . $newNome . " , il prezzo e' cambiato da " . $oldProd['costo'] . "€ a " . $newCosto . "€");
					$this->sendMail($emails[$i]['email'], "Modifica costo", "La informiamo che e' stato appena modificato il prezzo del prodotto ID: " . $newNome . " , il prezzo e' cambiato da " . $oldProd['costo'] . "€ a " . $newCosto . "€");
				}
			}
		}
		return $stmt->execute();
	}

	public function getProductQuantity($productid)
	{
		$stmt = $this->db->prepare("SELECT quantitadisponibile FROM prodotto WHERE idprodotto = ?");
		$stmt->bind_param("i", $productid);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC)[0]['quantitadisponibile'];
	}

	public function getAllOrders()
	{
		$stmt = $this->db->prepare("SELECT email,idordine,dataordine,statoordine FROM ordine ORDER BY dataordine DESC");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function getUserInfo($email)
	{
		$stmt = $this->db->prepare("SELECT email, nome, password, numerocarta,scadenzacarta,cvvcarta FROM utente WHERE email = ?");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC)[0];
	}

	public function changePass($email, $newPassword)
	{
		$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT); // hash memorizzato nel database
		$stmt = $this->db->prepare("UPDATE utente SET password = ? WHERE email = ?");
		$stmt->bind_param("ss", $hashedPassword, $email);
		return $stmt->execute();
	}

	public function updateOrderState($idOrder)
	{
		$stmt = $this->db->prepare("SELECT statoordine,email FROM ordine WHERE idordine = ?");
		$stmt->bind_param("s", $idOrder);
		$stmt->execute();
		$result = $stmt->get_result();
		$state = $result->fetch_all(MYSQLI_ASSOC);
		$newstate = $state[0]['statoordine'] == "Elaborazione" ? "Spedito" : ($state[0]['statoordine'] == "Spedito" ? "Consegnato" : "");
		$stmt = $this->db->prepare("UPDATE ordine SET statoordine=? WHERE idordine=?");
		$stmt->bind_param("ss", $newstate, $idOrder);
		$this->addNotification($state[0]['email'], "La informiamo che l'ordine di ID: " . $idOrder . " ha appena subito un cambiamento del suo stato ( da " . $state[0]['statoordine'] . " a " . $newstate . " )");
		$this->sendMail($state[0]['email'], "Aggiornamento stato ordine", "La informiamo che l'ordine di ID: " . $idOrder . " ha appena subito un cambiamento del suo stato ( da " . $state[0]['statoordine'] . " a " . $newstate . " )");
		return $stmt->execute();
	}

	public function bestSeller()
	{
		$stmt = $this->db->prepare("SELECT prodotto.idprodotto,prodotto.nomecategoria,prodotto.nome,prodotto.costo,prodotto.costospedizione,prodotto.nomeimmagine,prodotto.descrizione,prodotto.quantitadisponibile FROM prodotto, prodottoacquistato 
		WHERE prodotto.idprodotto = prodottoacquistato.idprodotto 
		GROUP BY prodotto.idprodotto,prodotto.nomecategoria,prodotto.nome,prodotto.costo,prodotto.costospedizione,prodotto.nomeimmagine,prodotto.descrizione,prodotto.quantitadisponibile 
		ORDER BY SUM(quantita) DESC LIMIT 4");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function lessAvailable()
	{
		$stmt = $this->db->prepare("SELECT prodotto.idprodotto,prodotto.nomecategoria,prodotto.nome,prodotto.costo,prodotto.costospedizione,prodotto.nomeimmagine,prodotto.descrizione,prodotto.quantitadisponibile FROM prodotto 
		WHERE prodotto.quantitadisponibile>0
		ORDER BY prodotto.quantitadisponibile ASC LIMIT 4");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function getTotalPrice($email) {
		$stmt = $this->db->prepare("SELECT SUM((costo*quantita)+costospedizione) AS totalprice FROM prodottocarrello,prodotto WHERE email=? AND prodottocarrello.IdProdotto = prodotto.IdProdotto");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}
}
