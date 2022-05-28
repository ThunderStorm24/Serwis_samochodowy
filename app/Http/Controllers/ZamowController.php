<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


class ZamowController extends SerwisController
{
    public function sesja()
    {
        if (isset($_SESSION['newsession']) && isset($_SESSION['login'])) {
            $this->rola = $_SESSION['newsession'];
            $this->login = $_SESSION['login'];
            $this->ID = $_SESSION['id'];
        } else {
            $this->rola = "Zaloguj/Zarejestruj";
            $this->login = "Brak";
        }
    }
    public function uslugishow()
    {
        $this->sesja();
        //Wyswietlanie wszystkich usług na podstronie USŁUGI z bazy danych
        $this->uslugi = DB::table('uslugi')
            ->get();
        $uslugi=$this->uslugi;
        return view('Zamow', compact('uslugi'), ['rola' => $this->rola]);
    }
    public function ZamowUslugi()
    {
        //Pobieramy z funckji uslugishow, potrzebne wyswietlanie wszystkich uslug (do bledow)
        $this->uslugishow();
        $uslugi=$this->uslugi;

        //Sprawdzamy czy jakis checkbox zostal zaznazony jesli tak to przypisujemy zmienna
        if(isset($_GET['Usluga'])){
        $Usluga = $_GET['Usluga'];
        //Jesli nie to zwracamy widok z bledem
        }else{
            $message="Nie zaznaczyłeś żadnego pola";
            return view('Zamow', compact('uslugi'), ['rola' => $this->rola,'message'=>$message]);
        }
        
        //Pobieramy koszt
        $Koszt=$_GET['Koszt'];
        //Sprawdzamy czy jest mniejszy od zera, jesli tak to zwraacmy na widok z bledem
        if ($Koszt <= 0){
            $message="Coś poszłonie tak, spróbuj zamówić jeszcze raz";
            return view('Zamow', compact('uslugi'), ['rola' => $this->rola,'message'=>$message]);
        }

        //Sprawdzamy czy umowa jest ustawiona, jesli tak to pobieramy ja
        if(isset($_GET['umowa'])){
        $Umowa=$_GET['umowa'];
        //Jesli nie to zwraccamy widok z bledem
        }else{
            $message="Nie zgodziłeś się z naszą umową";
            return view('Zamow', compact('uslugi'), ['rola' => $this->rola,'message'=>$message]);
        }

        //Pobieramy wszystkie nowe zmienne do zamowienia z obecna data
        $Stan="Zaakceptowane";
        $Data_zamowienia=date("Y-m-d");
        $Data_realizacji=date("Y-m-d",strtotime("+7 days",time()));
        $Opis="Oczekuje na zatwierdzenie!";
        $Suma=$Koszt;
        $ID_Mechanika=10;
        $ID_Klienta=$this->ID;

        //Pobieramy inne zamowienia zalogowanego klienta
        $ZamowieniaKlienta=DB::table('zamowienie')->where('ID_Klienta',$ID_Klienta)->get();

        //foreach do sprawdzenia czy uzytkownik ma jakies zamowienie ktore skladane bylo dzisiaj, zabezpieczenie przed skladaniem 2 zamowien jednego dnia i spamem
        foreach($ZamowieniaKlienta as $Zamowienia){
            $StaraData=$Zamowienia->Data_zamowienia;
            //Jesli StaraData (data z bazy jakiegos zamowienia uzytkownika) = Data_Zamowienia (dzisiaj ustalona) to zwracamy widok z bledem
            if($StaraData==$Data_zamowienia){
                $message="Nie możesz złożyć dwóch zamówień jednego dnia";
                return view('Zamow', compact('uslugi'), ['rola' => $this->rola,'message'=>$message]);
            }
        }

        //Wpisujemy zmienne do tabeli ZAMOWIENIE
        $NumerZamowienia= DB::table('zamowienie')->insert([
            'Stan_Realizacji'=>$Stan,
            'Data_zamowienia'=>$Data_zamowienia,
            'Data_realizacji'=>$Data_realizacji,
            'Opis'=>$Opis,
            'Suma'=>$Suma,
            'ID_Mechanika'=>$ID_Mechanika,
            'ID_Klienta'=>$ID_Klienta
        ]);

        //Nowy Nr Zamowienia
        $NumerZamowienia = DB::getPdo()->lastInsertId();;
        
        //Sprawdzamy ile checkboxow zaznaczonych
        $N = count($Usluga);
        
        //For na tyle checkboxow ile bylo zaznaczonych
          for($i=0; $i < $N; $i++)
          {
            //sprawdzamy kazda usluge z formularza
            $uslugi=DB::table('uslugi')
            ->where('ID_Uslugi',$Usluga[$i])
            ->get();
            //kazda cene z formularza
            foreach($uslugi as $CenaUslugi){
            $Cenaa=$CenaUslugi->Cena;
            //a nastepnie przypisujemy do tabeli uslug te zmienne
            $Uslugi_Zamowienia=DB::insert('INSERT INTO uslugi_zamowienia(ID_Uslugi,NR_ZAMOWIENIA,Koszt) values(?,?,?)',[$Usluga[$i],$NumerZamowienia,$Cenaa]);
            }
          }

          $powiadom="hello";
        //na koniec zwracamy widok main
        return view('Main',['rola' => $this->rola,'powiadom'=>$powiadom]);
    }
}