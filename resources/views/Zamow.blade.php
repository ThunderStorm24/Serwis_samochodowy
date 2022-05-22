<html>

<head>
    <meta charset="utf-8">
    <title>Zamawianie</title>
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
            <a class="active" href="Zamow">Zamów</a>
            <a href="Kontakt">Kontakt</a>
            <a href="Logowanie">@isset($rola){{$rola}} @else Zaloguj / Zarejestruj @endif</a>
        </div>
    </div>
    <form action="ZamowUslugi" method="GET">
        <div class="main display-flex flexcolumn align-center">

            @foreach ($uslugi as $uslugiData)
            <div class="blok mbottom-20 mtop-20 p-20 w-70 ">
                <div class="display-flex content-space-between">
                    <div>
                        <h2>{{$uslugiData->ID_Uslugi}}. {{$uslugiData->Nazwa_Uslugi}}</h2>
                    </div>
                    <div>
                    <input type="checkbox" class="kolor" id="Usluga_{{$uslugiData->ID_Uslugi}}" name="Usluga{{$uslugiData->ID_Uslugi}}" value="{{$uslugiData->ID_Uslugi}}" onclick="showContent('{{$uslugiData->ID_Uslugi}}')">
                    <label class="zmiana" for="Usluga_{{$uslugiData->ID_Uslugi}}">Chce usluge {{$uslugiData->ID_Uslugi}}</label></input>
                    </div>
                </div>
                <div class="display-flex content-space-between">
                    <div class="w-80">
                        <div class="pogrub">Opis</div>
                        <div>{{$uslugiData->Opis}}</div>
                    </div>

                    <div class="w-20 text-right">
                        <div class="pogrub">Cena</div>
                        <div><input type="hidden" value="{{$uslugiData->Cena}}" id="Cena_{{$uslugiData->ID_Uslugi}}">{{$uslugiData->Cena}}</span> zł</div>
                    </div>
                </div>

            </div>
            @endforeach
            <div class="blok mbottom-20 mtop-20 p-20 w-90">
                <div>Uslugi:
                    @foreach($uslugi as $uslugiData)
                    <p id="text_{{$uslugiData->ID_Uslugi}}" style="display:none">{{$uslugiData->ID_Uslugi}}. {{$uslugiData->Nazwa_Uslugi}}</p>
                    @endforeach
                </div>
                <div>Cena:
                    <p id="suma">Tu sie pojawi cena</p>
                </div>
                <div><input type="checkbox" class="mtop-20" name="umowa" id="umowa_1"><label for="umowa_1">Akceptuje warunki umowy pod odsyłaczem:</label> </input></div><a href="#Umowa" class="color-blue">Umowa uzytkownika</a>
                <div><button class="przycisk mtop-20">Zamow</button></div>
            </div>
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

<script>

    var sum=0;
function showContent(a) {
    
  var liczba = document.getElementById("Cena_"+a).value;
  var checkBox = document.getElementById("Usluga_"+a);
  var text = document.getElementById("text_"+a);
  liczba=Number(liczba);

  if (checkBox.checked == true){
    text.style.display = "block";
    sum += liczba
  } else {
    text.style.display = "none";
    sum -= liczba
  }

  document.getElementById('suma').innerHTML = sum + " zł";

}

</script>

</html>