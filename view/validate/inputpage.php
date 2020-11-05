<article class="article">
    <h1>Validera</h1>
    <p>Skriv in en ip-adress för att se om den validerar.</p>
    <form method="GET" action="ip/validateIp">
        <input name="ip" type="text">
        <input type="submit" value="Skicka">
    </form>

    <h3>Validera fast med resultat i JSON-format</h3>

    <form method="GET" action="ip/validateIpRest">
        <input name="ip" type="text">
        <input type="submit" value="Validera JSON">
    </form>


    <h3>Testroutes finns här om man inte har en egen ip (JSON)</h3>
    <a href="ip/validateIpRest?ip=127.0.0.1">127.0.0.1</a><br>
    <a href="ip/validateIpRest?ip=1.2.3.4">1.2.3.4</a><br>
    <a href="ip/validateIpRest?ip=250.13.79.82">250.13.79.82</a>
</article>
