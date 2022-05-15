<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\LoginController;

class SerwisController extends Controller
{
    public function sesja(){
        if (isset($_SESSION['newsession']) && isset($_SESSION['login'])) {
            $this->rola = $_SESSION['newsession'];
            $this->login = $_SESSION['login'];
            $this->ID = $_SESSION['id'];
        }else{
        $this->rola="Zaloguj/Zarejestruj";
        $this->login="Brak";
        }
    }
    public function uslugiPost()
    {
        $this->sesja();
        //Wyswietlanie wszystkich usług na podstronie USŁUGI z bazy danych
        $uslugi=DB::table('uslugi')
        ->get();
        return view('Uslugi',compact('uslugi'),['rola'=>$this->rola]);
    }
    public function PanelAdmina(){
        $this->sesja();
        
        //Wyswietlanie uzytkownikow z rolą Mechanika
        $this->pracownicy=DB::table('uzytkownicy')
        ->where('Rola','Mechanik')
        ->get();
        
        //Wyswietlanie uzytkownikow z rolą Admina
        $this->admini=DB::table('uzytkownicy')
        ->where('Rola','Admin')
        ->get();

        //Wyswietlanie uzytkownikow z rolą Klienta
        $this->klienci=DB::table('uzytkownicy')
        ->where('Rola','Klient')
        ->get();

        //Wyswietlanie zamówień
        $this->order=DB::table('zamowienie')
        ->get();
    }
    public function DaneUzytkownika(){
        $this->sesja();
        //Wyświetlanie uzytkownika gdzie login to login z sesji na ktorej jestesmy zalogowani
        $this->uzytkownicy=DB::table('uzytkownicy')
        ->where('Login', $this->login)
        ->get();
    }
    public function WyswietlanieAdmina(){
        //Dane Osobowe Admina
        $this->DaneUzytkownika();
        $uzytkownicy=$this->uzytkownicy;
        //Wszystkie informacje dla Admina
        $this->PanelAdmina();
        $pracownicy=$this->pracownicy;
        $admini=$this->admini;
        $klienci=$this->klienci;
        $order=$this->order;
        $this->OpisZamowien();
        $uslugi=$this->uslugi;

        return view('ProfilAdmin',compact('uzytkownicy','pracownicy','admini','klienci','order','uslugi'),['rola'=>$this->rola , 'login'=>$this->login]);
    }
    public function WyswietlanieMechanika(){
        //Dane Osobowe Mechanika
        $this->DaneUzytkownika();
        $uzytkownicy=$this->uzytkownicy;

        //Zamowienia Mechanika
        $zamowienia=DB::table('zamowienie')
        ->where('ID_Mechanika',$this->ID)
        ->where('Stan_Realizacji','W trakcie')
        ->orWhere('Stan_Realizacji','Zaakceptowane')
        ->where('ID_Mechanika',$this->ID)
        ->get();
        //Puste zamowienia do wziecia, bez mechanika jeszcze
        $zamowieniaDoWziecia=DB::table('zamowienie')
        ->where('ID_Mechanika','10')
        ->get();
        //Ukonczone Zamowienia
        $zamowieniaGotowe=DB::table('zamowienie')
        ->where('ID_Mechanika',$this->ID)
        ->where('Stan_Realizacji','Gotowe')
        ->get();

        $this->OpisZamowien();
        $uslugi=$this->uslugi;

        return view('ProfilMechanik',compact('uzytkownicy','zamowienia','uslugi','zamowieniaDoWziecia','zamowieniaGotowe'),['rola'=>$this->rola , 'login'=>$this->login , 'ID'=>$this->ID]);
    }
    public function WyswietlanieKlienta(){
        //Dane Osobowe Klienta
        $this->DaneUzytkownika();
        $uzytkownicy=$this->uzytkownicy;
        //Zamowienia Klienta
        $zamowienia=DB::table('zamowienie')
        ->where('ID_Klienta',$this->ID)
        ->get();   

        $this->OpisZamowien();
        $uslugi=$this->uslugi;

        return view('ProfilKlienta',compact('uzytkownicy','zamowienia','uslugi'),['rola'=>$this->rola , 'login'=>$this->login , 'ID'=>$this->ID]);
    }
    public function OpisZamowien(){
        $this->uslugi=DB::table('uslugi_zamowienia')
        ->join('uslugi','uslugi_zamowienia.ID_Uslugi','=','uslugi.ID_Uslugi')
        ->join('zamowienie','uslugi_zamowienia.NR_ZAMOWIENIA','=','zamowienie.NR_ZAMOWIENIA')
        ->get();
        
    }

  
    
}
