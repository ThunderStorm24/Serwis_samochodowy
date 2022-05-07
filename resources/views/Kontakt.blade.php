<html>

<head>
    <meta charset="utf-8">
    <title>Kontakt</title>
    <link rel="stylesheet" href="{{url('css/style.css')}}">
</head>

<body>



    <div class="menu display-flex">
        <div class="display-flex">

            <div class="firma dotted-whiteboard">
                WARSZTATIX
            </div>

            <div class="komunikat dotted-whiteboard">
                <div class="pogrubiony-czerwony">USŁUGI MOTORYZACYJNE</div>
                OD DIAGNOSTYK DO NAPRAW <br>
                POJAZDÓW OSOBOWYCH
            </div>

            <div class="komunikat dotted-whiteboard">
                <div class="pogrubiony-czerwony">CZYNNE W GODZINACH:</div>
                PN-PT: 6:00-21:00<br>
                SOB-ND:9:00-18:00
            </div>

        </div>
        <div class="display-flex">
            <a href="Main">Główna</a>
            <a href="Uslugi">Usługi</a>
            <a href="Zamow">Zamów</a>
            <a class="active" href="Kontakt">Kontakt</a>
            <a href="Logowanie">@isset($rola){{$rola}} @else Zaloguj / Zarejestruj @endif</a>
        </div>
    </div>


    <div class="main display-flex flexcolumn align-center">
        <div class="blok mbottom-20 mtop-20 p-20 w-70">
            <div>
                <h2>Adres</h2>
            </div>

        </div>

        <div class="w-70 p-20 font-size kontaktblok">Ul.Bankowa 30 Katowice 41-230</div>

        <div class="blok mbottom-20 mtop-20 p-20 w-70 ">
            <div>
                <h2>Telefon stacjonarny</h2>
            </div>

        </div>
        <div class="w-70 p-20 font-size kontaktblok">+48 124466780</div>
        <div class="w-70 p-20 font-size kontaktblok">+48 124466781</div>
        <div class="blok mbottom-20 mtop-20 p-20 w-70 ">
            <div>
                <h2>Telefon komórkowy</h2>
            </div>

        </div>
        <div class="w-70 p-20 font-size kontaktblok">+48 511253212</div>
        <div class="w-70 p-20 font-size kontaktblok">+48 511253213</div>
        <div class="blok mbottom-20 mtop-20 p-20 w-70 ">
            <div>
                <h2>Mail</h2>
            </div>

        </div>
        <div class="w-70 p-20 font-size kontaktblok">warsztatix@gmail.com</div>
        <div class="w-70 p-20 font-size kontaktblok">warsztatixdzialobslugi@gmail.com</div>
        <div class="blok mbottom-20 mtop-20 p-20 w-70 ">
            <div>
                <h2>Facebook</h2>
            </div>

        </div>
        <div class="w-70 p-20 font-size kontaktblok"><a class="color-blue" href="https://www.facebook.com"
                target="_blank">https://www.facebook.com/Warsztatix</a></div>
        <div class="blok mbottom-20 mtop-20 p-20 w-70 ">
            <div>
                <h2>Youtube</h2>
            </div>

        </div>
        <div class="w-70 p-20 font-size kontaktblok mbottom-20"><a class="color-blue" href="https://www.youtube.com"
                target="_blank">https://www.youtube.com/Warsztatix</a></div>
    </div>


    <div class="stopka display-flex content-space-between">
        <div class="lewa">
            &copy; Waku Waku 2022. Wszelkie prawa zastrzeżone.
        </div>
        <div class="prawa">
            <a class="color-blue" href="#prywatnosc">Polityka prywatności</a> <a class="color-blue"
                href="#cookie">Wykorzystanie plików cookie</a>
        </div>
    </div>



</body>

</html>