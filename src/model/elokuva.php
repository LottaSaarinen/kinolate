<?php

require_once HELPERS_DIR . 'DB.php';

function haeElokuvat() {
  return DB::run('SELECT * FROM elokuvat  ORDER BY nay_alkaa;')->fetchAll();
}

function haeElokuva($id) {
  return DB::run('SELECT * FROM elokuvat WHERE idelokuva = ?;',[$id])->fetch();
}


