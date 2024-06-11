<?php

require_once HELPERS_DIR . 'DB.php';

function haelippu($idlippu,$idhenkilo,$idnaytos) {
  return DB::run('SELECT * FROM liput WHERE idlippu = ? AND idhenkilo = ? AND idnaytos = ?',
                 [$idlippu,$idhenkilo,$idnaytos])->fetchAll();
}

function lisaalippu($idlippu,$idhenkilo,$idnaytos) {
  DB::run('INSERT INTO liput ($idlippu,$idhenkilo,$idnaytos) VALUE (?,?,?)',
          [$idlippu,$idhenkilo,$idnaytos]);
  return DB::lastInsertId();
}

function poistalippu($idlippu,$idhenkilo,$idnaytos) {
  return DB::run('DELETE FROM liput  WHERE idlippu = ? AND idhenkilo = ? AND idnaytos = ?',
                 [$idlippu,$idhenkilo,$idnaytos])->rowCount();
}

?>