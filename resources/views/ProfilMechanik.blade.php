<html>

<head>
    <meta charset="utf-8">
    <title>Profil Mechanika</title>
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <link rel="stylesheet" href="{{url('css/stylebox.css')}}">
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
            <a href="Kontakt">Kontakt</a>
            <a class="active" href="Logowanie">@isset($rola){{$rola}} @else Zaloguj / Zarejestruj @endif</a>
        </div>
    </div>

    <div class="opis">
        @foreach($uzytkownicy as $uzytkownicyData)
        <div>
            <h1>Mój profil:</h1>
        </div>
        <div class="fs-25">
            <div>Nazwa Użytkownika: {{$uzytkownicyData->Login}}</div>
            <div>Twoja rola to: {{$uzytkownicyData->Rola}}</div>
        </div>

        <div>
            <h1>Dane osobowe:</h1>
        </div>
        <div class="fs-25">
            <div>Imie: {{$uzytkownicyData->Imie}}</div>
            <div>Nazwisko: {{$uzytkownicyData->Nazwisko}}</div>
            <div>Ulica: {{$uzytkownicyData->Ulica}}</div>
            <div>Nr_Domu/Mieszkania: {{$uzytkownicyData->Nr_domu}}</div>
            <div>Miasto: {{$uzytkownicyData->Miasto}}</div>
            <div>Kod pocztowy: {{$uzytkownicyData->Kod_pocztowy}}</div>
            <div>Numer telefonu: {{$uzytkownicyData->Nr_telefonu}}</div>
            <div>mail: {{$uzytkownicyData->Mail}}</div>
        </div>
        @endforeach
        <div class="display-flex">
        <div class="mtop-20"><a class="przycisk" href='Wyloguj'>Wyloguj</a></div> 
        <div class="mtop-20"><a class="przycisk" href='Zmien_Dane'>Zmień Dane</a></div> 
        </div>

        <div><h1>Moje Zlecenia:</h1></div>
        <div>Zlecenie 1</div>

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