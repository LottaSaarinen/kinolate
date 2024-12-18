<?php

  // Aloitetaan istunnot.
  session_start();

// Suoritetaan projektin alustusskripti.
require_once '../src/init.php';
  // Haetaan kirjautuneen käyttäjän tiedot.
  if (isset($_SESSION['user'])) {
    require_once MODEL_DIR . 'henkilo.php';
    $loggeduser = haeHenkilo($_SESSION['user']);
  } else {
    $loggeduser = NULL;
  }

  // Siistitään polku urlin alusta ja mahdolliset parametrit urlin lopusta.
  // Siistimisen jälkeen osoite /~koodaaja/lanify/tapahtuma?id=1 on 
  // lyhentynyt muotoon /tapahtuma.
  $request = str_replace($config['urls']['baseUrl'],'',$_SERVER['REQUEST_URI']);

  $request = strtok($request, '?');

 
   // Luodaan uusi Plates-olio ja kytketään se sovelluksen sivupohjiin.
  $templates = new League\Plates\Engine(TEMPLATE_DIR);


 
     switch ($request) {

case '/':
     
case "/etusivu":
      if ($request === '/' || $request === '/etusivu') {
      echo $templates->render('etusivu');
      }
      break;
      
case '/tapahtumat':
        require_once MODEL_DIR . 'tapahtuma.php';
        $tapahtumat = haeTapahtumat();
        echo $templates->render('tapahtumat',['tapahtumat' => $tapahtumat]);
        break;
case '/tapahtuma':
        require_once MODEL_DIR . 'tapahtuma.php';
        require_once MODEL_DIR . 'ilmoittautuminen.php';
        $tapahtuma = haeTapahtuma($_GET['id']);
        if ($tapahtuma) {
        if ($loggeduser) {
        $ilmoittautuminen = haeIlmoittautuminen($loggeduser['idhenkilo'],$tapahtuma['idtapahtuma']);
        } else {
        $ilmoittautuminen = NULL;
        }
        echo $templates->render('tapahtuma',['tapahtuma' => $tapahtuma,
                                               'ilmoittautuminen' => $ilmoittautuminen,
                                               'loggeduser' => $loggeduser]);
        } else {
        echo $templates->render('tapahtumanotfound');
        }
        break;
  
         // ... switch-lauseen alku säilyy sellaisenaan
case '/lisaa_tili':
        if (isset($_POST['laheta'])) {
        $formdata = cleanArrayData($_POST);
        require_once CONTROLLER_DIR . 'tili.php';
        $tulos = lisaaTili($formdata,$config['urls']['baseUrl']);
                // ... switch-lauseen alku säilyy sellaisenaan
        if ($tulos['status'] == "200") {
        echo $templates->render('tili_luotu', ['formdata' => $formdata]);
        break;
                
        }
        echo $templates->render('lisaa_tili', ['formdata' => $formdata, 'error' => $tulos['error']]);
        break;
        } else {
        echo $templates->render('lisaa_tili', ['formdata' => [], 'error' => []]);

        break;
        } 

case "/kirjaudu":
                if (isset($_POST['laheta'])) {
                require_once CONTROLLER_DIR . 'kirjaudu.php';
                if (tarkistaKirjautuminen($_POST['email'],$_POST['salasana'])) {
                require_once MODEL_DIR . 'henkilo.php';
                $user = haeHenkilo($_POST['email']);
                if ($user['vahvistettu']) {
                session_regenerate_id();
                $_SESSION['user'] = $user['email'];
                $_SESSION['admin'] = $user['admin'];
                header("Location: " . $config['urls']['baseUrl']);
                } else {
                echo $templates->render('kirjaudu', [ 'error' => ['virhe' => 'Tili on vahvistamatta! Ole hyvä, ja vahvista tili sähköpostissa olevalla linkillä.']]);
                }
                } else {
                echo $templates->render('kirjaudu', [ 'error' => ['virhe' => 'Väärä käyttäjätunnus tai salasana!']]);
                }
                } else {
                echo $templates->render('kirjaudu', [ 'error' => []]);
                }
                break;

case "/logout":
            require_once CONTROLLER_DIR . 'kirjaudu.php';
            logout();
            header("Location: " . $config['urls']['baseUrl']);
            break;

case '/ilmoittaudu':
                if ($_GET['id']) {
                require_once MODEL_DIR . 'ilmoittautuminen.php';
                $idtapahtuma = $_GET['id'];
                if ($loggeduser) {
                lisaaIlmoittautuminen($loggeduser['idhenkilo'],$idtapahtuma);
                }
                header("Location: tapahtuma?id=$idtapahtuma");
                 } else {
                header("Location: tapahtumat");
                }
                break;
              
case '/peru':
                if ($_GET['id']) {
                require_once MODEL_DIR . 'ilmoittautuminen.php';
                $idtapahtuma = $_GET['id'];
                if ($loggeduser) {
                poistaIlmoittautuminen($loggeduser['idhenkilo'],$idtapahtuma);
                }
                header("Location: tapahtuma?id=$idtapahtuma");
                } else {
                header("Location: tapahtumat");  
                }
                break;

case "/vahvista":
                    if (isset($_GET['key'])) {
                    $key = $_GET['key'];
                    require_once MODEL_DIR . 'henkilo.php';
                    if (vahvistaTili($key)) {
                    echo $templates->render('tili_aktivoitu');
                    } else {
                    echo $templates->render('tili_aktivointi_virhe');
                    }
                    } else {
                    header("Location: " . $config['urls']['baseUrl']);
                    }
                    break;
            
case "/tilaa_vaihtoavain":
                $formdata = cleanArrayData($_POST);
                    // Tarkistetaan, onko lomakkeelta lähetetty tietoa.
                if (isset($formdata['laheta'])) {    
                      // TODO vaihtoavaimen tilauskäsittely
                require_once MODEL_DIR . 'henkilo.php';
                      // Tarkistetaan, onko lomakkeelle syötetty käyttäjätili olemassa.
                $user = haeHenkilo($formdata['email']);
                if ($user) {
                        // Käyttäjätili on olemassa.
                        // Luodaan salasanan vaihtolinkki ja lähetetään se sähköpostiin.
                require_once CONTROLLER_DIR . 'tili.php';
                $tulos = luoVaihtoavain($formdata['email'],$config['urls']['baseUrl']);
                if ($tulos['status'] == "200") {
                          // Vaihtolinkki lähetty sähköpostiin, tulostetaan ilmoitus.
                echo $templates->render('tilaa_vaihtoavain_lahetetty');
                break;
                }
                        // Vaihtolinkin lähetyksessä tapahtui virhe, tulostetaan
                        // yleinen virheilmoitus.
                echo $templates->render('virhe');
                break;
                } else {
                        // Tunnusta ei ollut, tulostetaan ympäripyöreä ilmoitus.
                echo $templates->render('tilaa_vaihtoavain_lahetetty');
                break;
                }
              
                } else {
                      // Lomakeelta ei ole lähetetty tietoa, tulostetaan lomake.
                echo $templates->render('tilaa_vaihtoavain_lomake');
                }
                break;

case "/reset":
                      // Otetaan vaihtoavain talteen.
            $resetkey = $_GET['key'];
                
                      // Seuraavat tarkistukset tarkistavat, että onko vaihtoavain
                      // olemassa ja se on vielä aktiivinen. Jos ei, niin tulostetaan
                      // käyttäjälle virheilmoitus ja poistutaan.
             require_once MODEL_DIR . 'henkilo.php';
             $rivi = tarkistaVaihtoavain($resetkey);
             if ($rivi) {
                        // Vaihtoavain löytyi, tarkistetaan onko se vanhentunut.
             if ($rivi['aikaikkuna'] < 0) {
             echo $templates->render('reset_virhe');
             break;
             }
             } else {
             echo $templates->render('reset_virhe');
             break;
             } 
                
                      // Vaihtoavain on voimassa, tarkistetaan onko lomakkeen kautta
                      // syötetty tietoa.
              $formdata = cleanArrayData($_POST);
              if (isset($formdata['laheta'])) {
                
              // TODO Salasanalomakkeen käsittelijä
              // Lomakkeelle on syötetty uudet salasanat, annetaan syötteen
              // käsittely kontrollerille.
              require_once CONTROLLER_DIR . 'tili.php';
              $tulos = resetoiSalasana($formdata,$resetkey);
              // Tarkistetaan kontrollerin tekemän salasanaresetoinnin lopputulos.
              if ($tulos['status'] == "200") {
              // Salasana vaihdettu, tulostetaan ilmoitus.
              echo $templates->render('reset_valmis');
              break;
              }
              // Salasanan vaihto ei onnistunut, tulostetaan lomake virhetekstin kanssa.
              echo $templates->render('reset_lomake', ['error' => $tulos['error']]);
              break;
              } else {
                        // Lomakkeen tietoja ei ole vielä täytetty, tulostetaan lomake.
              echo $templates->render('reset_lomake', ['error' => '']);
              break;
              }
                      
                  
case (bool)preg_match('/\/admin.*/', $request):
              if ($loggeduser["admin"]) {
              echo "ylläpitosivut";
              } else {
              echo $templates->render('admin_ei_oikeuksia');
              }
              break;

case '/elokuvat':
             require_once MODEL_DIR . 'elokuva.php';
             $elokuvat = haeElokuvat();
             echo $templates->render('elokuvat',['elokuvat' => $elokuvat]);
             break;
case '/elokuva':
             require_once MODEL_DIR . 'elokuva.php';
             require_once MODEL_DIR . 'lippu.php';
             $elokuva = haeElokuva($_GET['id']);
             if ($elokuva) {
             if ($loggeduser) {
             $lippu = haeLippu($loggeduser['idhenkilo'],$elokuva['idelokuva']);
             } else {
             $lippu = NULL;
             }
             echo $templates->render('elokuva',['elokuva' => $elokuva,
              'lippu' => $lippu,
              'loggeduser' => $loggeduser]);
              } else {
              echo $templates->render('tapahtumanotfound');
              }
              break;
case '/varaa':
               if ($_GET['id']) {
               require_once MODEL_DIR . 'lippu.php';
               $idelokuva = $_GET['id'];
               if ($loggeduser) {
               lisaaLippu($idelokuva,$loggeduser['idhenkilo']);
               }
               header("Location: elokuva?id=$idelokuva");
               } else {
               header("Location: elokuvat");
               }
               break;
                                              
                                               
case '/perulippu':
             if ($_GET['id']) {
             require_once MODEL_DIR . 'lippu.php';
             $idelokuva = $_GET['id'];
             if ($loggeduser) {
             poistaLippu($idelokuva,$loggeduser['idhenkilo']);
             }
             header("Location: elokuva?id=$idelokuva");
             } else {
             header("Location: elokuvat");  
             }
              break;


                      
case "/teatterit": if ($request === '/teatterit') {
              echo $templates->render('teatterit');
              }
              break;

case "/elamyslomake": if ($request === '/elamyslomake') {
                      echo $templates->render('elamyslomake');
                      } 
                      break;

case "/tulossa": if ($request === '/tulossa') {
                  echo $templates->render('/tulossa');
                  }
                  break;

case "/lasten_elokuvat": if ($request === '/lapset') {
                   echo $templates->render('lapset');
                   } 

else {
     echo $templates->render('notfound');
     }
     break;

default:
      echo $templates->render('notfound');
  }    
?> 
