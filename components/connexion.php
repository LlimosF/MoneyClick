<?php

  if (!empty($_POST)) {

    if (isset($_POST["email"], $_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {

      $sql = "SELECT * FROM users WHERE email = :email";
      $query = $db->prepare($sql);
      $query->bindParam(":email", $_POST["email"], PDO::PARAM_STR);
      $query->execute();

      $user = $query->fetchAll();

      if ($user && password_verify($_POST["password"], $user["password"])) {

        session_start();

        $_SESSION = [
          "id" => $user["id"],
          "email" => $user["email"],
          "pseudo" => $user["pseudo"],
          "experience" => $user["experience"],
          "multiply125" => $user["multiply125"],
          "multiply150" => $user["multiply150"],
          "multiply175" => $user["multiply175"],
          "multiply200" => $user["multiply200"],
          "multiply225" => $user["multiply225"],
          "multiply250" => $user["multiply250"],
          "multiply275" => $user["multiply275"],
          "multiply300" => $user["multiply300"]
        ];

        header("Location: jeu.php");
        exit();

      } else {

        echo "<h2 class='error'>Erreur lors de la tentative de connexion</h2>";

      }

    }

  }