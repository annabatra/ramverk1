<article class="article">
    <h1>Väderprognoser</h1>
    <p>Skriv in en adress eller koordinater för att se en väderprognos för platsen.</p>
    <form method="GET" action="weather/checkWeather">
        <input name="location" type="text">
        <input type="submit" value="Skicka">
    </form>

    <h3>Validera fast med resultat i JSON-format</h3>

    <form method="GET" action="weatherapi/checkWeatherRest">
        <input name="location" type="text">
        <input type="submit" value="Validera JSON">
    </form>


    <!-- <h3>Testroutes finns här om man inte har en egen ip (JSON)</h3>
    <a href="ip/validateIpRest?ip=127.0.0.1">127.0.0.1</a><br>
    <a href="ip/validateIpRest?ip=1.2.3.4">1.2.3.4</a><br>
    <a href="ip/validateIpRest?ip=250.13.79.82">250.13.79.82</a>

    <h3>IP-validering samt API</h3>
    <p class="saucetext">På denna sida har ni möjlighet att validera olika IP-adresser med 'vanlig' info som resultat eller i JSON.
    När ni väljer att få resultat i JSON-format så anropas ett API, och det går att utläsa i url:en efter er sökning. Ni kan också anropa det direkt via url:en, då används följande struktur:
    htdocs/ip/validateIpRest?ip=127.0.0.1. Ni kan självklart byta ut 127.0.0.1 mot valfri ip-adress.<br><br>
    Från och med kmom02 i kursen har även models implementerats, vilket innebär att funktionaliteten hos de olika klasserna har flyttats ut och anropas ifrån dessa models. Detta i enlighet med MVC, vilket har förbättrat strukturen på koden.</p> -->


</article>
