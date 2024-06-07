<?php

  require_once HELPERS_DIR . 'DB.php';

  function haeTapahtumat() {
    return DB::run('SELECT * FROM tapahtumat ORDER BY tap_alkaa;')->fetchAll();
  }
  function haeTapahtuma($id) {
    return DB::run('SELECT * FROM tapahtumat WHERE idtapahtuma = ?;',[$id])->fetch();
  }


?>
