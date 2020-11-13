<article class="article">
    <h1>Resultat</h1>
    <p>IP-typ: <?= $data["valid"] ?></p>
    <p>Domän: <?= $data["domain"] ?></p>
    <p>Land: <?= $data["location"]['country_name']?></p>
    <p>Ort: <?= $data["location"]['region_name']?></p>
    <p>Longitud: <?= $data["location"]['longitude']?></p>
    <p>Latitud: <?= $data["location"]['latitude']?></p>
</article>
