<?php
include('../stranke/navigacija.php');

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    $emailUp = $_GET['email'];
    $registerHash = $_GET['hash'];

    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => "https://api.sendinblue.com/v3/smtp/email",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{\"sender\":{\"name\":\"EPshopMMA\",\"email\":\"mbdev32@gmail.com\"},\"to\":[{\"email\":\"$emailUp\"}],\"replyTo\":{\"email\":\"mbdev32@gmail.com\"},\"textContent\":\"Opcija 1! \\t\\t\\t\\tUporabniški račun je ustvarjen, po potrditvi preko spodnjega linka, se lahko prijaviš.  \\t\\t\\t\\tProsimo kliknite za aktivacijo: \\t\\t\\t\\tDobim $emailUp in $registerHash.\",\"subject\":\"Potrdilo registracije\"}",
      CURLOPT_HTTPHEADER => [
        "Accept: application/json",
        "Content-Type: application/json",
        "api-key: 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"
      ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }

    $queryAction = mysqli_prepare($dbConnection, "SELECT * FROM stranke WHERE eNaslov = ? AND registerHash = ? LIMIT 1");
		mysqli_stmt_bind_param($queryAction, 'ss', $emailUp, $registerHash);
		mysqli_stmt_execute($queryAction);
		$queryAction = $queryAction->get_result();
		$curUser = mysqli_fetch_array($queryAction);

    if(isset($curUser)){
      $curl = curl_init();

      curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.sendinblue.com/v3/smtp/email",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\"sender\":{\"name\":\"EPshopMMA\",\"email\":\"mbdev32@gmail.com\"},\"to\":[{\"email\":\"$emailUp\"}],\"replyTo\":{\"email\":\"mbdev32@gmail.com\"},\"textContent\":\"Opcija 2! \\t\\t\\t\\tUporabniški račun je ustvarjen, po potrditvi preko spodnjega linka, se lahko prijaviš.  \\t\\t\\t\\tProsimo kliknite za aktivacijo: \\t\\t\\t\\tDobim $emailUp in $registerHash.\",\"subject\":\"Potrdilo registracije\"}",
        CURLOPT_HTTPHEADER => [
          "Accept: application/json",
          "Content-Type: application/json",
          "api-key: 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"
        ],
      ]);

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        echo $response;
      }
			if($curUser['activeOrNot']==1){
        echo '<script>alert("Racun je ze registriran")</script>';
        header("Location: ../skupno/prijava.php");
			}
      else{
        $query = mysqli_prepare($dbConnection, "UPDATE stranke SET activeOrNot = 1 WHERE eNaslov = ? AND registerHash = ?");
        mysqli_stmt_bind_param($query, 'ss', $emailUp, $registerHash);
        mysqli_stmt_execute($query);
        $query = $query -> get_result();

        echo '<script>alert("Registracija je uspesna, sedaj se lahko prijavite")</script>';
        header("Location: ../skupno/prijava.php");
      }
    }

    else{
      $curl = curl_init();

      curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.sendinblue.com/v3/smtp/email",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\"sender\":{\"name\":\"EPshopMMA\",\"email\":\"mbdev32@gmail.com\"},\"to\":[{\"email\":\"$emailUp\"}],\"replyTo\":{\"email\":\"mbdev32@gmail.com\"},\"textContent\":\"Opcija 3! \\t\\t\\t\\tUporabniški račun je ustvarjen, po potrditvi preko spodnjega linka, se lahko prijaviš.  \\t\\t\\t\\tProsimo kliknite za aktivacijo: \\t\\t\\t\\tDobim $emailUp in $registerHash.\",\"subject\":\"Potrdilo registracije\"}",
        CURLOPT_HTTPHEADER => [
          "Accept: application/json",
          "Content-Type: application/json",
          "api-key: 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"
        ],
      ]);

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        echo $response;
      }
      echo '<script>alert("Povezava ni veljavna")</script>';
      header("Location: ../gosti/registracija.php");
    }

}
else{
  $curl = curl_init();

  curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.sendinblue.com/v3/smtp/email",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"sender\":{\"name\":\"EPshopMMA\",\"email\":\"mbdev32@gmail.com\"},\"to\":[{\"email\":\"mark.breznik@gmail.com\"}],\"replyTo\":{\"email\":\"mbdev32@gmail.com\"},\"textContent\":\"Opcija 4! \\t\\t\\t\\tUporabniški račun je ustvarjen, po potrditvi preko spodnjega linka, se lahko prijaviš.  \\t\\t\\t\\tProsimo kliknite za aktivacijo: \\t\\t\\t\\tDobim  in .\",\"subject\":\"Potrdilo registracije\"}",
    CURLOPT_HTTPHEADER => [
      "Accept: application/json",
      "Content-Type: application/json",
      "api-key: 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"
    ],
  ]);

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $response;
  }
  echo '<script>alert("Povezava ni veljavna")</script>';
  header("Location: ../gosti/registracija.php");
}
