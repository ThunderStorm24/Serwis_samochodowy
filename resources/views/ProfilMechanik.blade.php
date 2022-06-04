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
        </div>

        <div>
            <div>
                <div class="blok p-20 mtop-20">
                    <h1>Moje Zlecenia:</h1>
                </div>
                <div class="display-flex flex-wrap">

                    @foreach($zamowienia as $zamowieniaData)
                    <div class="ramkazamowienia display-flex flexcolumn">
                        <div class="mtop-20">
                            <h2>Numer_Zamówienia: {{$zamowieniaData->NR_ZAMOWIENIA}}</h2>
                        </div>
                        <div>Stan_Realizacji: {{$zamowieniaData->Stan_Realizacji}}</div>
                        <div>Data Zamówienia: {{$zamowieniaData->Data_zamowienia}}</div>
                        <div>Data Realizacji: {{$zamowieniaData->Data_realizacji}}</div>
                        <div>Opis: {{$zamowieniaData->Opis}}</div>
                        <div>ID_Mechanika: {{$zamowieniaData->ID_Mechanika}}</div>
                        <div>ID_Klienta {{$zamowieniaData->ID_Klienta}}</div>
                        <div>Uslugi: @foreach($uslugi as $uslugiData) @if($uslugiData->NR_ZAMOWIENIA==$zamowieniaData->NR_ZAMOWIENIA) ({{$uslugiData->Nazwa_Uslugi}} - {{$uslugiData->Koszt}} zł) @endif @endforeach</div>
                        <div>W sumie do zapłacenia: {{$zamowieniaData->Suma}} zł</div> 

                        <form action="Dodaj_Status" method="GET">
                            <div>Zamowienie: {{$zamowieniaData->NR_ZAMOWIENIA}}<input type="hidden" value="{{$zamowieniaData->NR_ZAMOWIENIA}}" name="zamow"></input></div>
                            <div>DODAJ OPIS (Do zamówienia {{$zamowieniaData->NR_ZAMOWIENIA}}):<div><textarea rows="1" cols="40" class="opiszamowienia" name="opis" placeholder="Tutaj dodać opis" maxlength="500"></textarea></div>
                            </div>
                            <div>Wybierz stan realizacji (Do zamówienia {{$zamowieniaData->NR_ZAMOWIENIA}})
                                <div><select class="statuszamowienia" name="stan">
                                        <option value="Zaakceptowane">Zaakceptowane</option>
                                        <option value="W trakcie">W trakcie</option>
                                        <option value="Gotowe">Gotowe</option>
                                        <option value="Oczekuje">Oczekuje</option>
                                    </select></div>
                                <div><button class="przycisk mtop-20">Potwierdz</button></div>
                            </div>
                        </form>
                    </div>
                    @endforeach
                </div>


                <div class="blok p-20 mtop-20">
                    <h1>Zamowienia do Wziecia:</h1>
                </div>

                <div class="display-flex flex-wrap">

                    @foreach($zamowieniaDoWziecia as $zamowieniaDataW)
                    <div class="ramkazamowienia display-flex flexcolumn">
                        <div class="mtop-20">
                            <h2>Numer_Zamówienia: {{$zamowieniaDataW->NR_ZAMOWIENIA}}</h2>
                        </div>
                        <div>Stan_Realizacji: {{$zamowieniaDataW->Stan_Realizacji}}</div>
                        <div>Data Zamówienia: {{$zamowieniaDataW->Data_zamowienia}}</div>
                        <div>Data Realizacji: {{$zamowieniaDataW->Data_realizacji}}</div>
                        <div>Opis: {{$zamowieniaDataW->Opis}}</div>
                        <div>ID_Klienta {{$zamowieniaDataW->ID_Klienta}}</div>
                        <div>Uslugi: @foreach($uslugi as $uslugiData) @if($uslugiData->NR_ZAMOWIENIA==$zamowieniaDataW->NR_ZAMOWIENIA) ({{$uslugiData->Nazwa_Uslugi}} - {{$uslugiData->Koszt}} zł) @endif @endforeach</div>
                        <div>W sumie do zapłacenia: {{$zamowieniaDataW->Suma}} zł</div> 

                        <form action="Akceptuj_Zlecenie" method="GET">
                            <div>Zamowienie: {{$zamowieniaDataW->NR_ZAMOWIENIA}}<input type="hidden" value="{{$zamowieniaDataW->NR_ZAMOWIENIA}}" name="zamow"></input></div>
                            <div><button class="przycisk mtop-20">Akceptuj Zlecenie</button></div>
                        </form>
                    </div>
                    @endforeach

                </div>
                <div class="blok p-20 mtop-20">
                    <h1>Gotowe do odbioru zamówienia:</h1>
                </div>

                <div class="display-flex flex-wrap">

                    @foreach($zamowieniaGotowe as $zamowieniaDataG)
                    <div class="ramkazamowienia display-flex flexcolumn">
                        <div class="mtop-20">
                            <h2>Numer_Zamówienia: {{$zamowieniaDataG->NR_ZAMOWIENIA}}</h2>
                        </div>
                        <div>Stan_Realizacji: {{$zamowieniaDataG->Stan_Realizacji}}</div>
                        <div>Data Zamówienia: {{$zamowieniaDataG->Data_zamowienia}}</div>
                        <div>Data Realizacji: {{$zamowieniaDataG->Data_realizacji}}</div>
                        <div>Opis: {{$zamowieniaDataG->Opis}}</div>
                        <div>ID_Mechanika: {{$zamowieniaDataG->ID_Mechanika}}</div>
                        <div>ID_Klienta {{$zamowieniaDataG->ID_Klienta}}</div>
                        <div>Uslugi: @foreach($uslugi as $uslugiData) @if($uslugiData->NR_ZAMOWIENIA==$zamowieniaDataG->NR_ZAMOWIENIA) ({{$uslugiData->Nazwa_Uslugi}} - {{$uslugiData->Koszt}} zł) @endif @endforeach</div>
                        <div>W sumie do zapłacenia: {{$zamowieniaDataG->Suma}} zł</div> 

                        <form action="Dodaj_Status" method="GET">
                            <div>Zamowienie: {{$zamowieniaDataG->NR_ZAMOWIENIA}}<input type="hidden" value="{{$zamowieniaDataG->NR_ZAMOWIENIA}}" name="zamow"></input></div>
                            <div>DODAJ OPIS (Do zamówienia {{$zamowieniaDataG->NR_ZAMOWIENIA}}):<div><textarea rows="1" cols="40" class="opiszamowienia" name="opis" placeholder="Tutaj dodać opis" maxlength="500"></textarea></div>
                            </div>
                            <div>Wybierz stan realizacji (Do zamówienia {{$zamowieniaDataG->NR_ZAMOWIENIA}})
                                <div><select class="statuszamowienia" name="stan">
                                        <option value="Gotowe">Gotowe</option>
                                        <option value="Zaakceptowane">Zaakceptowane</option>
                                        <option value="W trakcie">W trakcie</option>
                                        <option value="Oczekuje">Oczekuje</option>
                                    </select></div>
                                <div><button class="przycisk mtop-20">Potwierdz</button></div>

                            </div>
                        </form>
                        <form action="Zakoncz_Status" method="GET">
                            <input type="hidden" value="{{$zamowieniaDataG->NR_ZAMOWIENIA}}" name="zamow"></input>
                            <div><button class="przycisk mtop-20 w-100">Zakończ</button></div>
                        </form>

                    </div>
                    @endforeach
                </div>

                <div class="blok p-20 mtop-20">
                    <h1>Zakończone zamówienia:</h1>
                </div>

                <div class="display-flex flex-wrap">

                    @foreach($zamowieniaZakonczone as $zamowieniaDataEND)
                    <div class="ramkazamowienia display-flex flexcolumn">
                        <div class="mtop-20">
                            <h2>Numer_Zamówienia: {{$zamowieniaDataEND->NR_ZAMOWIENIA}}</h2>
                        </div>
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
            alert("Potwierdzono wylogowanie!");
            location = "Wyloguj";
        } else {
            alert("Anulowano wylogowanie!");
        }
    }
</script>

</html>