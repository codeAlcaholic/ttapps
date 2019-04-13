<?php


/** read file*/
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
/** end read */

/**database file*/
include("classes/database.php");
/** end dbfile */

/* usersClass*/
include("classes/recharge.php");

/*Making a dbConnection to */
$database = new database();
$db = $database->getConnection();
if(isset($_GET['token']) && $_GET['token'] == "5a773f9e8b9663b2918851ed6396feed63019b9a2f348cf69c9e96b3c0dbd960"){
	if(isset($_GET['userId']) && $_GET['userId'] != null){
		$userId = $_GET['userId'];
		$montant = $_GET['montant'];
		$code_utilisee = $_GET['code_utilisee'];
		$rechage = new Recharge($db);
		$stmt = $rechage->insertData($userId,$montant,$code_utilisee);
		if($stmt != null){
			echo json_encode($stmt);
			http_response_code(200);
		}
	}
}
?>