<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SerwisController;

class DodawanieController extends SerwisController
{
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
    public function RejestracjaAdmin()
    {
        $Rola=$_GET['Rola'];
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
            return view('RegisterAdmina');
        }
        
        $register=DB::insert('INSERT INTO uzytkownicy(Rola,Imie,Nazwisko,Ulica,Nr_domu,Miasto,Kod_pocztowy,Nr_telefonu,Mail,Login,Haslo) values(?,?,?,?,?,?,?,?,?,?,?)',[$Rola,$Imie,$Nazwisko,$Ulica,$Nr,$Miasto,$Kod,$Telefon,$Mail,$Login,$Haslo]);
        
        $this->sesja();
        $this->PanelAdmina();
        $this->DaneUzytkownika();
        $uzytkownicy=$this->uzytkownicy;
        $pracownicy=$this->pracownicy;
        $admini=$this->admini;
        $klienci=$this->klienci;
        $order=$this->order;
        
        return view('ProfilAdmin',compact('uzytkownicy','pracownicy','admini','klienci','order'),['rola'=>$this->rola , 'login'=>$this->login]);
    }
}