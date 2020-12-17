<?php
include('../stranke/navigacija.php');

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    $emailUp = $_GET['email'];
    $registerHash = $_GET['hash'];

    $queryAction = mysqli_prepare($dbConnection, "SELECT * FROM stranke WHERE eNaslov = ? AND registerHash = ? LIMIT 1");
		mysqli_stmt_bind_param($queryAction, 'ss', $emailUp, $registerHash);
		mysqli_stmt_execute($queryAction);
		$queryAction = $queryAction->get_result();
		$curUser = mysqli_fetch_array($queryAction);

    if(isset($curUser)){
			if($curUser['activeOrNot']==1){
        echo '<script>alert("Racun je ze registriran")</script>';
        header("Location: ../stranke/prijava.php");
			}
      else{
        $query = mysqli_prepare($dbConnection, "UPDATE stranke SET activeOrNot = 1 WHERE eNaslov = ? AND registerHash = ?");
        mysqli_stmt_bind_param($query, 'ss', $emailUp, $registerHash);
        mysqli_stmt_execute($query);
        $query = $query -> get_result();

        echo '<script>alert("Registracija je uspesna, sedaj se lahko prijavite")</script>';
        header("Location: ../stranke/prijava.php");
      }
    }

    else{
      echo '<script>alert("Povezava ni veljavna")</script>';
      header("Location: ../gosti/registracija.php");
    }

}
else{
  echo '<script>alert("Povezava ni veljavna")</script>';
  header("Location: ../gosti/registracija.php");
}
