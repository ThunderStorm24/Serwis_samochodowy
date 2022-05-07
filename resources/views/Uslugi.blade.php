<html>

<head>
    <meta charset="utf-8">
    <title>Uslugi</title>
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
            <a class="active" href="Uslugi">Usługi</a>
            <a href="Zamow">Zamów</a>
            <a href="Kontakt">Kontakt</a>
            <a href="Logowanie">@isset($rola){{$rola}} @else Zaloguj / Zarejestruj @endif</a>
        </div>
    </div>

    <div class="main display-flex flexcolumn align-center">
        @foreach ($uslugi as $uslugiData)
        <div class="blok mbottom-20 mtop-20 p-20 w-70 ">
            <div>
                <h2>{{$uslugiData->ID_Uslugi}}. {{$uslugiData->Nazwa_Uslugi}}</h2>
            </div>
            <div class="display-flex content-space-between">
                <div class="w-80">
                    <div class="pogrub">Opis</div>
                    <div>{{$uslugiData->Opis}}</div>
                </div>

                <div class="w-20 text-right">
                    <div class="pogrub">Cena</div>
                    <div>{{$uslugiData->Cena}} zł</div>
                </div>
            </div>

        </div>
        @endforeach
    </div>


    <div class="stopka display-flex content-space-between">
        <div>
            &copy; Waku Waku 2022. Wszelkie prawa zastrzeżone.
        </div>
        <div>
            <a class="color-blue" href="#prywatnosc">Polityka prywatności</a> <a class="color-blue"
                href="#cookie">Wykorzystanie plików cookie</a>
        </div>
    </div>

</body>

</html>