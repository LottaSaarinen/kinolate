<?php

require_once HELPERS_DIR . 'DB.php';

function haeLippu($idelokuva,$idhenkilo) {
  return DB::run('SELECT * FROM varaukset WHERE idhenkilo = ? AND idelokuva = ?',
                 [$idelokuva,$idhenkilo])->fetchAll();
}


function lisaaLippu($idelokuva,$idhenkilo) {
  DB::run('INSERT INTO varaukset (idelokuva, idhenkilo) VALUES (?,?)',
          [$idelokuva,$idhenkilo]);
  return DB::lastInsertId();
}

function poistaLippu($idelokuva,$idhenkilo) {
  return DB::run('DELETE FROM varaukset  WHERE idelokuva = ? AND idhenkilo = ?',
                 [$idelokuva,$idhenkilo])->rowCount();
}

?>