<?php
include('../stranke/navigacija.php');

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    $emailUp = $_GET['email'];
    $registerHash = $_GET['hash'];

    echo 'Opcija 1';

    $queryAction = mysqli_prepare($dbConnection, "SELECT * FROM stranke WHERE eNaslov = ? AND registerHash = ? LIMIT 1");
		mysqli_stmt_bind_param($queryAction, 'ss', $emailUp, $registerHash);
		mysqli_stmt_execute($queryAction);
		$queryAction = $queryAction->get_result();
		$curUser = mysqli_fetch_array($queryAction);

    if(isset($curUser)){
			if($curUser['activeOrNot']==1){
        echo 'Opcija 45';
        //header("Location: ../skupno/prijava.php");
			}
      else{
        $query = mysqli_prepare($dbConnection, "UPDATE stranke SET activeOrNot = 1 WHERE eNaslov = ? AND registerHash = ?");
        mysqli_stmt_bind_param($query, 'ss', $emailUp, $registerHash);
        mysqli_stmt_execute($query);
        $query = $query -> get_result();

        echo 'Opcija 4';
        //header("Location: ../skupno/prijava.php");
      }
    }
    else{
      echo "Opcija 3";
      //header("Location: ../gosti/registracija.php");
    }

}
else{
  echo "Opcija 2";
  //header("Location: ../gosti/registracija.php");
}
