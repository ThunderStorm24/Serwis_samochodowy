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
            <form method="GET" action="NoweDane">
        </div>
        <div class="fs-25">
            <div>Nazwa Użytkownika: <input type="text" name="login" value="{{$uzytkownicyData->Login}}" maxlength="40" pattern=".\S{2,40}"></input></div>
            <div>Twoja rola to: {{$uzytkownicyData->Rola}}</div>
        </div>

        <div>
            <h1>Dane osobowe:</h1>
        </div>
        <div class="fs-25">
            <div>Imie: <input type="text" name="imie" value="{{$uzytkownicyData->Imie}}" maxlength="20"></input></div>
            <div>Nazwisko: <input type="text" name="nazwisko" value="{{$uzytkownicyData->Nazwisko}}" maxlength="30"></input></div>
            <div>Ulica: <input type="text" name="ulica" value="{{$uzytkownicyData->Ulica}}" maxlength="30"></input></div>
            <div>Nr_Domu/Mieszkania: <input type="text" name="nrdom" value="{{$uzytkownicyData->Nr_domu}}" maxlength="5"></input></div>
            <div>Miasto: <input type="text" name="miasto" value="{{$uzytkownicyData->Miasto}}" maxlength="30"></input></div>
            <div>Kod pocztowy: <input type="text" name="kod" value="{{$uzytkownicyData->Kod_pocztowy}}" maxlength="6"></input></div>
            <div>Numer telefonu: <input type="text" name="telefon" value="{{$uzytkownicyData->Nr_telefonu}}" maxlength="12"></input></div>
            <div>mail: <input type="text" name="mail" value="{{$uzytkownicyData->Mail}}" maxlength="40"></input></div>
        </div>
        @if($errors->any())<div class="fs-15 mtop-20"><b>@foreach($errors->all() as $err) <li>{{$err}}</li> @endforeach</b></div>@endif
        @endforeach

        <div class="mtop-20"><input class="przycisk" type="submit" value="Zmień Dane"></input></div>
        <div class="mtop-20"><button class="przycisk" onclick='javascript: history.go(-1)'>Anuluj</button></div>
        </form>
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