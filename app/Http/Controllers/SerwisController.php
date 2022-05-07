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
        }else{
        $this->rola="Zaloguj/Zarejestruj";
        $this->login="Brak";
        }
    }
    public function uslugiPost()
    {
        $this->sesja();
        $uslugi=DB::table('uslugi')->get();
        return view('Uslugi',compact('uslugi'),['rola'=>$this->rola]);
    }
    public function Rejestracja()
    {
        $Rola="Klient";
        $Imie=$_GET['imie'];
        $Nazwisko=$_GET['nazwisko'];
        $Ulica=$_GET['ulica'];
        $Nr=$_GET['nrdom'];
        $Miasto=$_GET['miasto'];
        $Kod=$_GET['kod'];
        $Telefon=$_GET['telefon'];
        $Mail=$_GET['mail'];
        $Login=$_GET['login'];
        $Haslo=$_GET['haslo'];
        $pHaslo=$_GET['phaslo'];

        if($Haslo != $pHaslo){
            return view('Register');
        }
        
        $register=DB::insert('INSERT INTO uzytkownicy(Rola,Imie,Nazwisko,Ulica,Nr_domu,Miasto,Kod_pocztowy,Nr_telefonu,Mail,Login,Haslo) values(?,?,?,?,?,?,?,?,?,?,?)',[$Rola,$Imie,$Nazwisko,$Ulica,$Nr,$Miasto,$Kod,$Telefon,$Mail,$Login,$Haslo]);
        return view('Login');
    }
    public function PanelAdmina(){
        $this->sesja();
        $this->pracownicy=DB::table('uzytkownicy')->where('Rola','Mechanik')->get();
        $this->admini=DB::table('uzytkownicy')->where('Rola','Admin')->get();
        $this->klienci=DB::table('uzytkownicy')->where('Rola','Klient')->get();
        $this->order=DB::table('zamowienie')->get();
    }
    public function DaneUzytkownika(){
        $this->sesja();
        $this->uzytkownicy=DB::table('uzytkownicy')->where('Login', $this->login)->get();
    }
    public function WyswietlanieAdmina(){
        $this->DaneUzytkownika();
        $uzytkownicy=$this->uzytkownicy;
        $this->PanelAdmina();
        $pracownicy=$this->pracownicy;
        $admini=$this->admini;
        $klienci=$this->klienci;
        $order=$this->order;
        return view('ProfilAdmin',compact('uzytkownicy','pracownicy','admini','klienci','order'),['rola'=>$this->rola]);
    }
    public function WyswietlanieMechanika(){
        $this->DaneUzytkownika();
        $uzytkownicy=$this->uzytkownicy;
        return view('ProfilMechanik',compact('uzytkownicy'),['rola'=>$this->rola]);
    }
    public function WyswietlanieKlienta(){
        $this->DaneUzytkownika();
        $uzytkownicy=$this->uzytkownicy;
        return view('ProfilKlienta',compact('uzytkownicy'),['rola'=>$this->rola]);
    }

}
