<html>

<head>
    <meta charset="utf-8">
    <title>Strona Glowna</title>
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
            <a class="active" href="Main">Główna</a>
            <a href="Uslugi">Usługi</a>
            <a href="Zamow">Zamów</a>
            <a href="Kontakt">Kontakt</a>
            <a href="Logowanie"> @isset($rola){{$rola}} @else Zaloguj / Zarejestruj @endif </a>
        </div>
    </div>



    <div class="baner display-flex">
        <div class="naglowek">
            <div class="podtytul p-20 nas">SERWIS SAMOCHODOWY WARSZTATIX</div>
            <div class="opis">Twój samochód nie działa? Nie wiesz co zrobić? Nie wiesz co jest nie tak? Cenny innych
                warsztatów są za wysokie? Czytając to znalazłeś się w świetnym miejscu! Na naszej stronie firmy
                WARSZTATIX!</div>
            <div class="opis">Potrzebujesz porady? Skontaktuj sie z nami!:</div>
            <div class="naglowekdwa">
                <div class="telefon display-flex">
                    <div class="telefonobrazek w-30p h-30 "><img class="w-30p h-30 " src="{{url('Obrazy/telefon.png')}}"></div>
                    <div class="telefonjeden display-flex align-center">:+48975382125</div>
                </div>
                <div class="mail display-flex">
                    <div class="mailobrazek w-30p h-30"><img class="w-30p h-30" src="{{url('Obrazy/mail.png')}}"></div>
                    <div class="mailjeden display-flex align-center">:warsztatix@gmail.com</div>
                </div>
            </div>
            <div class="opis">
                Prosimy dzwonić w godzinach otwarcia lub kontaktować się z nami mailowo, odpiszemy jak najszybciej!
                Polecamy również followanie naszego fan page-a na facebooku <a class="color-blue" href="https://www.facebook.com/groups/973864133110872" target="_blank">Nie śpie bo mechanikuje!</a>
            </div>
        </div>
        <div class="zdjecie">
            <img class="w-100 h-100 object-fit" src="{{url('Obrazy/czesci.jpg')}}">
        </div>
    </div>


    <div class="main display-flex flexcolumn align-center">
        <div class="blok mbottom-20 p-20 w-50">
            <h2>Pracownicy</h2>
            Nasz warsztat jest otwarty 20 lat! Doświadczeni pracownicy z wieloletnim doświadczeniem,
            a także przyjemna obsługa!
        </div>
        <div class="blok mbottom-20 p-20 w-50">
            <h2>Diagnostyki</h2>
            Oferujemy diagnostyki samochodowe w przystępnej cenie. Nasz najnowszy sprzęt pozwoli
            odkryć wszystkie usterki twojego pojazdu!
        </div>
        <div class="blok mbottom-20 p-20 w-50">
            <h2>Lakierowanie</h2>
            Oferujemy lakierowanie pojazdów a także obklejanie pojazdu w przystępnej cenie rynkowej!
        </div>
        <div class="blok mbottom-20 p-20 w-50">
            <h2>Pomoc w sprawdzeniu pojazdu</h2>
            Pomożemy sprawdzić nowo kupiony pojazd w przystępnej cenie!
        </div>
        <div class="blok mbottom-20 p-20 w-50">
            <h2>i wiele innych</h2>
            przydatnych ofert które przeczytacie na innych podstronach naszej firmy!
        </div>
    </div>


    <div class="display-flex">
        <div class="naglowektrzy">
            <div class="nas blok text-center">O NAS</div>
            <div class="opis fs-25">
                <div class="m-5">Nasza firma warsztatix poswstała w 1998 roku na bazie jednej z pierwszych stacji kontroli pojazdów w
                    Polsce (już w 1975 roku).</div>
                <div class="m-5">Nasza firma stale podnosi kwalifikacje swoich pracowników w zakresie napraw i obsługi nowoczesnych
                    urządzeń.</div>
                <div class="m-5">Warsztat "Warsztatix" jest wyposażony w urządzenia renomowanych takich jak:
                    "FACOM","AUTOBOSS","TENGTOOLS" i wiele innych.</div>
                <div class="m-5">Z nami możesz być spokojny o twój samochód, wieloletnie doświadczenie naszych pracowników i nasz
                    warsztat nadal utrzymujący się w topce najlepszych
                    warsztatów w polsce, zagwarantuje szybką, bezpieczną i tanią naprawe twojego pojazdu.</div>
            </div>
        </div>
    </div>




    <div class="stopka display-flex content-space-between">
        <div class="lewa">
            &copy; Waku Waku 2022. Wszelkie prawa zastrzeżone.
        </div>
        <div class="prawa">
            <a class="color-blue" href="#prywatnosc">Polityka prywatności</a> <a class="color-blue" href="#cookie">Wykorzystanie plików cookie</a>
        </div>
    </div>

</body>

</html>