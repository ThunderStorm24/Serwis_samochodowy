<html>

<head>
    <meta charset="utf-8">
    <title>My test page</title>
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <link href="{{url('css/stylebox.css')}}" rel="stylesheet">
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
            <a class="active" href="Logowanie">Zaloguj / Zarejestruj</a>
        </div>
    </div>
    <div>
        <div class="box-info">
            ZALOGUJ SIĘ JAKO:
        </div>
        <div class="text-center">(Aby korzystać z funkcji takich jak zamawianie)</div>
        <div class="box-wrap">
            <div class="box">
                <p><img src="{{url('Obrazy/login.png')}}"></p>
                <div class="text-left">-Logowanie na stronę!!!</div>
                <div class="text-left">-Aby się zalogować musisz mieć stworzone konto</div>
                <div class="text-left">-Logowanie dla klientów, pracowników i admina</div>
                <div class="text-left">-W razie problemów proszę kontaktować się do firmy</div>
                <div class="text-center mtop-20"><a href="Login">PRZEJDŹ DO LOGOWANIA</a></div>
            </div>
            <div class="box">
                <p><img src="{{url('Obrazy/Register.png')}}"></p>
                <div class="text-left">-Rejestracja na stronę!!!</div>
                <div class="text-left">-Możliwość stworzenia konta dla klienta</div>
                <div class="text-left">-Administrator tworzy konta dla pracowników</div>
                <div class="text-left">-W razie problemów proszę kontaktować się do firmy</div>
                <div class="text-center mtop-20"><a href="Register">PRZEJDŹ DO REJESTRACJI</a></div>
            </div>
        </div>
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