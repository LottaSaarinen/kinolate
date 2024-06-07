<?php

  require_once HELPERS_DIR . 'DB.php';

  function lisaaHenkilo($nimi,$email,$puhelinnumero,$salasana) {
    DB::run('INSERT INTO henkilot (nimi, email, puhelinnumero, salasana) VALUE  (?,?,?,?);',[$nimi,$email,$discord,$salasana]);
    return DB::lastInsertId();
  }

?>
