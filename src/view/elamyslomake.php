<?php

$this->layout('template', ['title' => 'Elämyspaketti']) 

?>

<div class="content">
      <h2>Elokuva elämyspaketit</h2>
            <p>Järjestä lasten tai aikuisten syntymäpäiväjuhlat tai rentoudu ystävien kanssa elokuvaelämyspaketin parissa.</p>
            <p>Huomioimme myös erityisruokavaliot ja allergiat tarjoamalla gluteenittomia ja vegaanisia vaihtoehtoja, jotta jokainen vieraamme voi nauttia juhlasta täysin siemauksin.</p>
            <br><br><br><br>
<div class="package first__section">
      <h3>Lasten Elokuvaelämyspaketti</h3>
      <p>Lasten elokuvaelämyspaketissa tarjoamme herkullisia välipaloja, jotka ilahduttavat niin pikkuvieraita kuin vanhempia. Valikoimastamme löytyy pieniä suolaisia naposteltavia, kuten juustotikkuja ja minipizzoja, sekä värikkäitä hedelmävartaita ja cupcakeja makean nälän tyydyttämiseksi.</p>
</div><br><br>
<div class="package">
<h3>Aikuisten Elokuvaelämyspaketti</h3>
      <p>Aikuisten elokuvaelämyspaketti tarjoaa hienostuneen valikoiman suolaisia ja makeita herkkuja, jotka täydentävät elokuvaelämyksen täydellisesti. Gourmet-popcornit eri maustein, kuten juustolla tai savustetulla paprikalla, sekä cocktail-palat, kuten lohi-crostinit ja juustolautaset, takaavat herkullisen ja monipuolisen tarjoilun. Makeanhimoiset voivat nauttia suklaakonvehdeista, macaroneista ja muista tyylikkäistä jälkiruoista.</p>
</div><br><br>
<div class="package">
<h3>Elokuvavalikoima</h3>
      <p>Elokuvien osalta tarjoamme laadukkaita ja monipuolisia vaihtoehtoja, jotka sopivat kaikenlaisiin makuihin ja tunnelmiin. Olipa kyseessä sitten draama, komedia tai jännitys, meillä on elokuvia jokaiseen makuun. 
Lapsille on saatavilla animaatioelokuvat, kuten Disney-Pixarin elokuvat tai DreamWorks-elokuvat, jotka ovat suosittuja lasten keskuudessa. Tarjolla myös klassisia lastenelokuvia, kuten "Herkules" tai "Mulan". 
Leffoja voi selata <a href="haku.php">tästä</a></p>
</div><br><br>
<div class="package">
      <h3>Teemaelokuvailta</h3>
      <p>Voimme myös järjestää teemaelokuvailtoja, kuten klassikkoleffoja tietyltä vuosikymmeneltä tai genrestä, jotka lisäävät hauskuutta ja viihdettä juhliin. Teemaan sopivilla tarjoiluilla.</p>
</div><br><br>
      <p>Tee syntymäpäivistä ja ystävätapaamisista ikimuistoisia elokuvaelämyspaketillamme, joka huomioi kaikkien vieraiden erityisruokavaliot ja allergiat. <a href="tarjous.php">Ota yhteyttä</a>, kerro eritysruokavaliosta ja valitsemastasi elokuvasta ja teemasta. <a href="liput.php">Varaa</a> elokuvaelämyspaketisi jo tänään!</p>
</div><br><br><br><br>


<section class="yhteydenotto">
      <h2>Yhteydenotto</h2>
      <p>Jätä tarjouspyyntö lasten tai aikuisten elokuvaelämyspaketista</p>
      <form action="yllapitosivut" method="POST">
            <div>
                  <label for="nimi">Nimi:</label>
                  <input id="nimi" type="text" name="nimi">
            </div>
            <div>
                  <label for="email">Sähköposti:</label>
                  <input id="email" type="text" name="email">
            </div>
            
            <div>
    <label>Salasana:</label>
    <input type="password" name="salasana">
  </div>
            <div>
                  <label for="viesti">Viesti</label>
                  <textarea id="viesti" rows="5" cols="60" type="text" name="viesti"></textarea>
            </div>
            <div>
                  <input type="submit" value="Lähetä" class="submit">
            </div>
      </form>
</section>
