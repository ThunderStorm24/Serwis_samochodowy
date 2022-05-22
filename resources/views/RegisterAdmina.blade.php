<html>

<head>
    <meta charset="utf-8">
    <title>Rejestracja - Panel Admina</title>
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

    <div class="display-flex flexcolumn align-center  p-20">
        <div class="blok mbottom-20 p-20 w-50">
            <form class="fs-25" method="GET" action="ZarejestrujAdmin">
                <div class="">Rola</div>
                <select name="Rola">
                    <option value="Admin">Admin</option>
                    <option value="Mechanik">Mechanik</option>
                    <option value="Klient">Klient</option>
                </select>
                <div class="">Imie</div>
                <div class="fs-15">-Rozpoczynać się ma dużą literą</div>
                <div><input class="formularz w-100" type="text" maxlength="20" name="imie"></input></div>
                <div class="">Nazwisko</div>
                <div class="fs-15">-Rozpoczynać się ma dużą literą</div>
                <div><input class="formularz w-100" type="text" maxlength="30" name="nazwisko"></input></div>
                <div class="content-space-between display-flex">
                    <div>Ulica<div class="fs-15">-Rozpoczynać się ma dużą literą</div>
                    </div>
                    <div>Nr Domu/Mieszkania<div class="fs-15 text-right">-w postaci 12<b>/</b>34</div>
                    </div>
                </div>
                <div class="content-space-between display-flex"><input class="formularz w-70" type="text" maxlength="30" name="ulica"></input>
                    <input class="formularz w-20" type="text" maxlength="5" value="__/__" name="nrdom"></input>
                </div>
                <div class="content-space-between display-flex">
                    <div>Miasto <div class="fs-15">-Rozpoczynać się ma dużą literą</div>
                    </div>

                    <div>Kod pocztowy<div class="fs-15 text-right">-w postaci 12<b>-</b>345</div>
                    </div>
                </div>
                <div class="content-space-between display-flex"><input class="formularz w-70" type="text" maxlength="30" name="miasto"></input>
                    <input class="formularz w-20" type="text" maxlength="6" value="__-___" name="kod"></input>
                </div>
                <div>Numer Telefonu</div>
                <div class="fs-15">w postaci <b>+48</b>123456789</div>
                <div><input class="formularz w-100" type="tel" maxlength="12" value="+48" name="telefon"></input></div>
                <div>Mail</div>
                <div class="fs-15">w postaci tom<b>@</b>onet.pl</div>
                <div><input class="formularz w-100" type="email" maxlength="40" name="mail"></input></div>
                <div>Login</div>
                <div class="fs-15">-Musi posiadać od 3-40 znaków</div>
                <div><input class="formularz w-100" type="text" maxlength="40" name="login"></input></div>
                <div>Hasło</div>
                <div class="fs-15">-Musi posiadać od 8-40 znaków</div>
                <div class="fs-15">-Musi się zaczynać od dużej litery</div>
                <div><input class="formularz w-100" type="text" maxlength="40" name="haslo"></input></div>
                <div>Potwierdź Hasło</div>
                <div class="fs-15">-Hasła muszą się zgadzać!</div>
                <div><input class="formularz w-100" type="text" maxlength="40" name="phaslo"></input></div>
                @if($errors->any())<div class="fs-15"><b>@foreach($errors->all() as $err) <li>{{$err}}</li> @endforeach</b></div>@endif
                <div class="mtop-20"><input class="przycisk" type="submit" value="Zarejestruj"></input></div>
            </form>
            <div class="mtop-20 display-flex content-space-between odnosnik">
                <a href="Login">Masz Konto? Zaloguj się!</a>
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