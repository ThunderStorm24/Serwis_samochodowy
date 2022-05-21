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
            <div class="mtop-20"><button class="przycisk" onclick="location='DodawanieUzytkownikow'">Dodaj Użytkowników</button></div>
        </div>



        <form method="GET" action="PokazUzytkownikow">
            <div class="mtop-20">Wpisz ID_Uzytkownika ktorego chcesz znalezc:</div>
            <div><input class="przycisk" type="text" pattern="[0-9]{0,15}" name="ID_U"></input><button class="przycisk" type="submit" id="button1">Znajdz</button></div>
            @isset($messageznajdz)<div><b>{{$messageznajdz}}</b></div>@endif
        </form>

        @isset($znajdzUzytkownika)
        <div id="Uzytkownik">
            @foreach($znajdzUzytkownika as $znajdzUzytkownikaData)
            <div>
                <h1>Wyniki wyszukiwania osoby o ID {{$znajdzUzytkownikaData->ID_Uzytkownika}}:</h1>
            </div>
            <div class="mtop-20">Rola: {{$znajdzUzytkownikaData->Rola}}</div>
            <div>Imie: {{$znajdzUzytkownikaData->Imie}}</div>
            <div>Nazwisko: {{$znajdzUzytkownikaData->Nazwisko}}</div>
            <div>Ulica: {{$znajdzUzytkownikaData->Ulica}}</div>
            <div>Nr_Domu/Mieszkania: {{$znajdzUzytkownikaData->Nr_domu}}</div>
            <div>Miasto: {{$znajdzUzytkownikaData->Miasto}}</div>
            <div>Kod pocztowy: {{$znajdzUzytkownikaData->Kod_pocztowy}}</div>
            <div>Numer telefonu: {{$znajdzUzytkownikaData->Nr_telefonu}}</div>
            <div>mail: {{$znajdzUzytkownikaData->Mail}}</div>
            @endforeach
            @isset($znajdzZamowienie)
            <div>
                <h1>Zamówienia/Zlecenia użytkownika o ID {{$znajdzUzytkownikaData->ID_Uzytkownika}}:</h1>
            </div>
            @isset($znajdzOpis)
            @foreach($znajdzZamowienie as $znajdzZamowienieData)
            <div class="mtop-20">Numer_Zamówienia: {{$znajdzZamowienieData->NR_ZAMOWIENIA}}</div>
            <div>Stan_Realizacji: {{$znajdzZamowienieData->Stan_Realizacji}}</div>
            <div>Data Zamówienia: {{$znajdzZamowienieData->Data_zamowienia}}</div>
            <div>Data Realizacji: {{$znajdzZamowienieData->Data_realizacji}}</div>
            <div>Opis: {{$znajdzZamowienieData->Opis}}</div>
            <div>ID_Mechanika: {{$znajdzZamowienieData->ID_Mechanika}}</div>
            <div>ID_Klienta {{$znajdzZamowienieData->ID_Klienta}}</div>
            <div>Uslugi: @foreach($znajdzOpis as $znajdzOpisData) @if($znajdzOpisData->NR_ZAMOWIENIA==$znajdzZamowienieData->NR_ZAMOWIENIA) ({{$znajdzOpisData->Nazwa_Uslugi}}) @endif @endforeach</div>
            <div>Cena: @foreach($znajdzOpis as $znajdzOpisData) @if($znajdzOpisData->NR_ZAMOWIENIA==$znajdzZamowienieData->NR_ZAMOWIENIA) {{$znajdzOpisData->Koszt}} zł @endif @endforeach</div>
            @endforeach
            @endif
            @endif
        </div>
        @endif

        <form method="GET" action="UsunUzytkownikow">
            <div class="mtop-20">Wpisz ID_Uzytkownika ktorego chcesz usunac:</div>
            <div><input class="przycisk" type="text" pattern="[0-9]{0,15}" name="ID"></input><button class="przycisk" type="submit">Usun</button></div>
            @isset($message)<div><b>{{$message}}</b></div>@endif
        </form>
        <div>
            <div class="display-flex content-space-between">
                <div style="height:620px;width:320px;border:1px solid #ccc;font:16px Trebuchet MS, Garamond, Serif;overflow:auto;">

                    <div class="text-center">
                        <h1>Pracownicy:</h1>
                    </div>
                    <div class="m-5">
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

                </div>

                <div style="height:620px;width:320px;border:1px solid #ccc;font:16px Trebuchet MS, Garamond, Serif;overflow:auto;">
                    <div class="text-center">
                        <h1>Admini:</h1>
                    </div>
                    <div class="m-5">
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

                </div>

                <div style="height:620px;width:320px;border:1px solid #ccc;font:16px Trebuchet MS, Garamond, Serif;overflow:auto;">
                    <div class="text-center">
                        <h1>Klienci:</h1>
                    </div>
                    <div class="m-5">
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

                </div>

                <div style="height:620px;width:520px;border:1px solid #ccc;font:16px Trebuchet MS, Garamond, Serif;overflow:auto;">
                    <div class="text-center">
                        <h1>Zamowienia:</h1>
                    </div>
                    <div class="m-5">
                        @foreach($order as $orderData)
                        <div class="mtop-20">Numer_Zamówienia: {{$orderData->NR_ZAMOWIENIA}}</div>
                        <div>Stan_Realizacji: {{$orderData->Stan_Realizacji}}</div>
                        <div>Data Zamówienia: {{$orderData->Data_zamowienia}}</div>
                        <div>Data Realizacji: {{$orderData->Data_realizacji}}</div>
                        <div>Opis: {{$orderData->Opis}}</div>
                        <div>ID_Mechanika: {{$orderData->ID_Mechanika}}</div>
                        <div>ID_Klienta {{$orderData->ID_Klienta}}</div>
                        <div>Uslugi: @foreach($uslugi as $uslugiData) @if($uslugiData->NR_ZAMOWIENIA==$orderData->NR_ZAMOWIENIA) ({{$uslugiData->Nazwa_Uslugi}}) @endif @endforeach</div>
                        <div>Cena: @foreach($uslugi as $uslugiData) @if($uslugiData->NR_ZAMOWIENIA==$orderData->NR_ZAMOWIENIA) {{$uslugiData->Koszt}} zł @endif @endforeach</div>
                        @endforeach
                    </div>

                </div>

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