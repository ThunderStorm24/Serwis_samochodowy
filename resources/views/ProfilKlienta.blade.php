<html>

<head>
    <meta charset="utf-8">
    <title>Profil klienta</title>
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
            <div>Twoje ID to: {{$uzytkownicyData->ID_Uzytkownika}}</div>
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
            <div class="mtop-20"><button class="przycisk" onclick="confirmLogout()">Wyloguj</button></div>
            <div class="mtop-20"><button class="przycisk" onclick="location='Zmien_Dane'">Zmień Dane</button></div>
            <div class="mtop-20"><button class="przycisk" onclick="confirmDelete()">Usun konto</button></div>
        </div>


        <div class="blok mtop-20 p-20">
            <h1>Moje Zamówienia:</h1>
        </div>
        <div class="display-flex flex-wrap">
            @foreach($zamowienia as $zamowieniaData)
            <div class="ramkazamowienia display-flex flexcolumn">
                <div>Numer_Zamówienia: {{$zamowieniaData->NR_ZAMOWIENIA}}</div>
                <div>Stan_Realizacji: {{$zamowieniaData->Stan_Realizacji}}</div>
                <div>Data Zamówienia: {{$zamowieniaData->Data_zamowienia}}</div>
                <div>Data Realizacji: {{$zamowieniaData->Data_realizacji}}</div>
                <div>Opis: {{$zamowieniaData->Opis}}</div>
                <div>ID_Mechanika: @if($zamowieniaData->ID_Mechanika==10) Oczekujemy na Mechanika @else {{$zamowieniaData->ID_Mechanika}} @endif </div>
                <div>ID_Klienta {{$zamowieniaData->ID_Klienta}}</div>
                <div>Uslugi: @foreach($uslugi as $uslugiData) @if($uslugiData->NR_ZAMOWIENIA==$zamowieniaData->NR_ZAMOWIENIA) ({{$uslugiData->Nazwa_Uslugi}} - {{$uslugiData->Koszt}} zł) @endif @endforeach</div>
                <div>W sumie do zapłacenia: {{$zamowieniaData->Suma}} zł</div>
            </div>
            @endforeach
        </div>

        <div class="blok mtop-20 p-20">
            <h1>Moje Gotowe Zamówienia:</h1>
        </div>
        <div class="display-flex flex-wrap">
            @foreach($zamowieniaGotowe as $zamowieniaData)
            <div class="ramkazamowienia display-flex flexcolumn">
                <div>Numer_Zamówienia: {{$zamowieniaData->NR_ZAMOWIENIA}}</div>
                <div>Stan_Realizacji: {{$zamowieniaData->Stan_Realizacji}}</div>
                <div>Data Zamówienia: {{$zamowieniaData->Data_zamowienia}}</div>
                <div>Data Realizacji: {{$zamowieniaData->Data_realizacji}}</div>
                <div>Opis: {{$zamowieniaData->Opis}}</div>
                <div>ID_Mechanika: {{$zamowieniaData->ID_Mechanika}}</div>
                <div>ID_Klienta {{$zamowieniaData->ID_Klienta}}</div>
                <div>Uslugi: @foreach($uslugi as $uslugiData) @if($uslugiData->NR_ZAMOWIENIA==$zamowieniaData->NR_ZAMOWIENIA) ({{$uslugiData->Nazwa_Uslugi}} - {{$uslugiData->Koszt}} zł) @endif @endforeach</div>
                <div>W sumie do zapłacenia: {{$zamowieniaData->Suma}} zł</div>
            </div>
            @endforeach
        </div>


        <div class="blok mtop-20 p-20">
            <h1>Moje Ukończone Zamówienia:</h1>
        </div>
        <div class="display-flex flex-wrap">
            @foreach($zamowieniaZakonczone as $zamowieniaDataEND)
            <div class="ramkazamowienia display-flex flexcolumn">
                <div>Numer_Zamówienia: {{$zamowieniaDataEND->NR_ZAMOWIENIA}}</div>
                <div>Stan_Realizacji: {{$zamowieniaDataEND->Stan_Realizacji}}</div>
                <div>Data Zamówienia: {{$zamowieniaDataEND->Data_zamowienia}}</div>
                <div>Data Realizacji: {{$zamowieniaDataEND->Data_realizacji}}</div>
                <div>Opis: {{$zamowieniaDataEND->Opis}}</div>
                <div>ID_Mechanika: {{$zamowieniaDataEND->ID_Mechanika}}</div>
                <div>ID_Klienta {{$zamowieniaDataEND->ID_Klienta}}</div>
                <div>Uslugi: @foreach($uslugi as $uslugiData) @if($uslugiData->NR_ZAMOWIENIA==$zamowieniaDataEND->NR_ZAMOWIENIA) ({{$uslugiData->Nazwa_Uslugi}} - {{$uslugiData->Koszt}} zł) @endif @endforeach</div>
                <div>W sumie do zapłacenia: {{$zamowieniaDataEND->Suma}} zł</div>
            </div>
            @endforeach
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
<script>
    function confirmDelete() {
        let confirmAction = confirm("Czy na pewno chcesz usunąć konto? Tej operacji nie można cofnąć!");
        if (confirmAction) {
            alert("Potwierdzono usunięcie konta!");
            location = "Usun_Konto";
        } else {
            alert("Anulowano usunięcie konta!");
        }
    }

    function confirmLogout() {
        let confirmAction = confirm("Czy na pewno chcesz się wylogować z konta {{$login}}?");
        if (confirmAction) {
            alert("Potwierdzono wylogowanie!");
            location = "Wyloguj";
        } else {
            alert("Anulowano wylogowanie!");
        }
    }
</script>

</html>