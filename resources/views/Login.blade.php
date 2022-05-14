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

    <div class="display-flex flexcolumn align-center mtop-center mbottom-center p-20">
        <div class="blok mbottom-20 p-20 w-50">
            <form class="fs-25" action="Loguj" method="GET">
                <div class="">Login</div>
                <div><input class="logowanie" type="text" name='login'></input></div>
                <div>Hasło</div>
                <div><input class="logowanie" type="password" name='haslo'></input></div>
                @if($errors->any())<div class="fs-15"><b>@foreach($errors->all() as $err) <li>{{$err}}</li> @endforeach</b></div>@endif
                @isset($message)<div class="fs-15"><b>
                        <li>{{$message}}</li>
                    </b></div>@endif
                <div class="mtop-20"><input class="przycisk" type="submit" value="Zaloguj"></input></div>
            </form>
            <div class="mtop-20 display-flex content-space-between odnosnik">
                <a href="Register">Nie masz konta? Zarejestruj się!</a>
                <a href="Logowanie">Powrót</a>
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