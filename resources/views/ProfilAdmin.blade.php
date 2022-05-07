<html>

<head>
    <meta charset="utf-8">
    <title>Profil admina</title>
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
            <div class="mtop-20"><button class="przycisk" onclick="confirmLogout()">Wyloguj</button></div>
            <div class="mtop-20"><button class="przycisk" onclick="location='Zmien_Dane'">Zmień Dane</button></div>
        </div>

        <div class="display-flex content-space-between">
            <div>
                <div>
                    <h1>Pracownicy:</h1>
                </div>
                @foreach($pracownicy as $pracownicyData)
                <div class="mtop-20">ID_Uzytkownika: {{$pracownicyData->ID_Uzytkownika}}</div>
                <div>Imie: {{$pracownicyData->Imie}}</div>
                <div>Nazwisko: {{$pracownicyData->Nazwisko}}</div>
                <div>Ulica: {{$pracownicyData->Ulica}}</div>
                <div>Nr_Domu/Mieszkania: {{$pracownicyData->Nr_domu}}</div>
                <div>Miasto: {{$pracownicyData->Miasto}}</div>
                <div>Kod pocztowy: {{$pracownicyData->Kod_pocztowy}}</div>
                <div>Numer telefonu: {{$pracownicyData->Nr_telefonu}}</div>
                <div>mail: {{$pracownicyData->Mail}}</div>
                @endforeach
            </div>
            <div>
                <div>
                    <h1>Admini:</h1>
                </div>
                @foreach($admini as $adminiData)
                <div class="mtop-20">ID_Uzytkownika: {{$adminiData->ID_Uzytkownika}}</div>
                <div>Imie: {{$adminiData->Imie}}</div>
                <div>Nazwisko: {{$adminiData->Nazwisko}}</div>
                <div>Ulica: {{$adminiData->Ulica}}</div>
                <div>Nr_Domu/Mieszkania: {{$adminiData->Nr_domu}}</div>
                <div>Miasto: {{$adminiData->Miasto}}</div>
                <div>Kod pocztowy: {{$adminiData->Kod_pocztowy}}</div>
                <div>Numer telefonu: {{$adminiData->Nr_telefonu}}</div>
                <div>mail: {{$adminiData->Mail}}</div>
                @endforeach

            </div>

            <div>
                <div>
                    <h1>Klienci:</h1>
                </div>
                @foreach($klienci as $klienciData)
                <div class="mtop-20">ID_Uzytkownika: {{$klienciData->ID_Uzytkownika}}</div>
                <div>Imie: {{$klienciData->Imie}}</div>
                <div>Nazwisko: {{$klienciData->Nazwisko}}</div>
                <div>Ulica: {{$klienciData->Ulica}}</div>
                <div>Nr_Domu/Mieszkania: {{$klienciData->Nr_domu}}</div>
                <div>Miasto: {{$klienciData->Miasto}}</div>
                <div>Kod pocztowy: {{$klienciData->Kod_pocztowy}}</div>
                <div>Numer telefonu: {{$klienciData->Nr_telefonu}}</div>
                <div>mail: {{$klienciData->Mail}}</div>
                @endforeach

            </div>

            <div>
                <div>
                    <h1>Zamowienia:</h1>
                </div>
                @foreach($order as $orderData)
                <div class="mtop-20">Numer_Zamówienia: {{$orderData->NR_ZAMOWIENIA}}</div>
                <div>Stan_Realizacji: {{$orderData->Stan_Realizacji}}</div>
                <div>Data Zamówienia: {{$orderData->Data_zamowienia}}</div>
                <div>Data Realizacji: {{$orderData->Data_realizacji}}</div>
                <div>Opis: {{$orderData->Opis}}</div>
                <div>ID_Mechanika: {{$orderData->ID_Mechanika}}</div>
                <div>ID_Klienta {{$orderData->ID_Klienta}}</div>
                @endforeach

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
<script>
    function confirmLogout() {
        let confirmAction = confirm("Czy na pewno chcesz się wylogować z konta {{$login}}?");
        if (confirmAction) {
            location = "Wyloguj";
            alert("Potwierdzono wylogowanie!");
        } else {
            alert("Anulowano wylogowanie!");
        }
    }
</script>

</html>