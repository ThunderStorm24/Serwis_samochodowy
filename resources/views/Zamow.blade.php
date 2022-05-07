<html>

<head>
    <meta charset="utf-8">
    <title>My test page</title>
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
            <a href="Uslugi">Usługi</a>
            <a class="active" href="Zamow">Zamów</a>
            <a href="Kontakt">Kontakt</a>
            <a href="Logowanie">@isset($rola){{$rola}} @else Zaloguj / Zarejestruj @endif</a>
        </div>
    </div>

    <div class="main display-flex flexcolumn align-center">
        <div class="blok mbottom-20 mtop-20 p-20 w-70 ">
            <div>
                <h2>Usługa 1</h2>
            </div>
            <div class="display-flex content-space-between">
                <div class="w-80">
                    <div class="pogrub">Opis</div>
                    <div>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit recusandae deserunt unde numquam.
                        Omnis ad eos, velit quia fuga eaque, enim impedit quasi adipisci nam doloribus cum temporibus
                        doloremque. Nostrum.</div>
                </div>

                <div class="w-20 text-right">
                    <div class="pogrub">Cena</div>
                    <div>70 zł</div>
                </div>
            </div>

        </div>
        <div class="blok mbottom-20 mtop-20 p-20 w-70 ">
            <div>
                <h2>Usługa 2</h2>
            </div>
            <div class="display-flex content-space-between">
                <div class="w-80">
                    <div class="pogrub">Opis</div>
                    <div>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit recusandae deserunt unde numquam.
                        Omnis ad eos, velit quia fuga eaque, enim impedit quasi adipisci nam doloribus cum temporibus
                        doloremque. Nostrum.</div>
                </div>

                <div class="w-20 text-right">
                    <div class="pogrub">Cena</div>
                    <div>70 zł</div>
                </div>
            </div>

        </div>
        <div class="blok mbottom-20 mtop-20 p-20 w-70 ">
            <div>
                <h2>Usługa 3</h2>
            </div>
            <div class="display-flex content-space-between">
                <div class="w-80">
                    <div class="pogrub">Opis</div>
                    <div>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit recusandae deserunt unde numquam.
                        Omnis ad eos, velit quia fuga eaque, enim impedit quasi adipisci nam doloribus cum temporibus
                        doloremque. Nostrum.</div>
                </div>

                <div class="w-20 text-right">
                    <div class="pogrub">Cena</div>
                    <div>70 zł</div>
                </div>
            </div>

        </div>
        <div class="blok mbottom-20 mtop-20 p-20 w-70 ">
            <div>
                <h2>Usługa 4</h2>
            </div>
            <div class="display-flex content-space-between">
                <div class="w-80">
                    <div class="pogrub">Opis</div>
                    <div>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit recusandae deserunt unde numquam.
                        Omnis ad eos, velit quia fuga eaque, enim impedit quasi adipisci nam doloribus cum temporibus
                        doloremque. Nostrum.</div>
                </div>

                <div class="w-20 text-right">
                    <div class="pogrub">Cena</div>
                    <div>70 zł</div>
                </div>
            </div>

        </div>
        <div class="blok mbottom-20 mtop-20 p-20 w-70 ">
            <div>
                <h2>Usługa 5</h2>
            </div>
            <div class="display-flex content-space-between">
                <div class="w-80">
                    <div class="pogrub">Opis</div>
                    <div>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit recusandae deserunt unde numquam.
                        Omnis ad eos, velit quia fuga eaque, enim impedit quasi adipisci nam doloribus cum temporibus
                        doloremque. Nostrum.</div>
                </div>

                <div class="w-20 text-right">
                    <div class="pogrub">Cena</div>
                    <div>70 zł</div>
                </div>
            </div>

        </div>
        <div class="blok mbottom-20 mtop-20 p-20 w-70 ">
            <div>
                <h2>Usługa 6</h2>
            </div>
            <div class="display-flex content-space-between">
                <div class="w-80">
                    <div class="pogrub">Opis</div>
                    <div>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit recusandae deserunt unde numquam.
                        Omnis ad eos, velit quia fuga eaque, enim impedit quasi adipisci nam doloribus cum temporibus
                        doloremque. Nostrum.</div>
                </div>

                <div class="w-20 text-right">
                    <div class="pogrub">Cena</div>
                    <div>70 zł</div>
                </div>
            </div>

        </div>
        <div class="blok mbottom-20 mtop-20 p-20 w-70 ">
            <div>
                <h2>Usługa 7</h2>
            </div>
            <div class="display-flex content-space-between">
                <div class="w-80">
                    <div class="pogrub">Opis</div>
                    <div>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit recusandae deserunt unde numquam.
                        Omnis ad eos, velit quia fuga eaque, enim impedit quasi adipisci nam doloribus cum temporibus
                        doloremque. Nostrum.</div>
                </div>

                <div class="w-20 text-right">
                    <div class="pogrub">Cena</div>
                    <div>70 zł</div>
                </div>
            </div>

        </div>
        <div class="blok mbottom-20 mtop-20 p-20 w-70 ">
            <div>
                <h2>Usługa 8</h2>
            </div>
            <div class="display-flex content-space-between">
                <div class="w-80">
                    <div class="pogrub">Opis</div>
                    <div>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit recusandae deserunt unde numquam.
                        Omnis ad eos, velit quia fuga eaque, enim impedit quasi adipisci nam doloribus cum temporibus
                        doloremque. Nostrum.</div>
                </div>

                <div class="w-20 text-right">
                    <div class="pogrub">Cena</div>
                    <div>70 zł</div>
                </div>
            </div>

        </div>
        <div class="blok mbottom-20 mtop-20 p-20 w-70 ">
            <div>
                <h2>Usługa 9</h2>
            </div>
            <div class="display-flex content-space-between">
                <div class="w-80">
                    <div class="pogrub">Opis</div>
                    <div>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit recusandae deserunt unde numquam.
                        Omnis ad eos, velit quia fuga eaque, enim impedit quasi adipisci nam doloribus cum temporibus
                        doloremque. Nostrum.</div>
                </div>

                <div class="w-20 text-right">
                    <div class="pogrub">Cena</div>
                    <div>70 zł</div>
                </div>
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