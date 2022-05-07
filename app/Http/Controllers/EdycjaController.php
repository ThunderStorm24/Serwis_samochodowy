<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SerwisController;

class EdycjaController extends SerwisController
{
    public function sesja()
    {
        if (isset($_SESSION['newsession']) && isset($_SESSION['login'])) {
            $this->rola = $_SESSION['newsession'];
            $this->login = $_SESSION['login'];
            $this->ID=$_SESSION['id'];
        } else {
            $this->rola = "Zaloguj/Zarejestruj";
            $this->login = "Brak";
        }
    }
    public function EdycjaUzytkownika()
    {
        $this->sesja();
        $this->DaneUzytkownika();
        $uzytkownicy = $this->uzytkownicy;
        return view('Edycja', compact('uzytkownicy'), ['rola' => $this->rola , 'login'=>$this->login , 'ID'=>$this->ID]);
    }
    public function ZmienDane()
    {
        $this->sesja();
        $this->DaneUzytkownika();
        $uzytkownicy = $this->uzytkownicy;

        $Imie = $_GET['NoweImie'];
        $Nazwisko = $_GET['NoweNazwisko'];
        $Ulica = $_GET['NowaUlica'];
        $Nr = $_GET['NowyNumer'];
        $Miasto = $_GET['NoweMiasto'];
        $Kod = $_GET['NowyKod'];
        $Telefon = $_GET['NowyTelefon'];
        $Mail = $_GET['NowyMail'];
        $Login = $_GET['NowyLogin'];

        $change = DB::update('update uzytkownicy set Imie=?,Nazwisko=?,Ulica=?,Nr_domu=?,Miasto=?,Kod_Pocztowy=?,Nr_telefonu=?,Mail=?,Login=? where Login=?', [$Imie, $Nazwisko, $Ulica, $Nr, $Miasto, $Kod, $Telefon, $Mail, $Login, $this->login]);

        if ($this->rola == "Admin") {
            $this->PanelAdmina();
            $pracownicy=$this->pracownicy;
            $admini=$this->admini;
            $klienci=$this->klienci;
            $order=$this->order;
            return view('ProfilAdmin',compact('uzytkownicy','pracownicy','admini','klienci','order'),['rola'=>$this->rola , 'login'=>$this->login , 'ID'=>$this->ID]);
        } 
        if ($this->rola == "Mechanik") {
            $zamowienia=DB::table('zamowienie')->where('ID_Mechanika',$this->ID)->get();
            return view('ProfilMechanik', compact('uzytkownicy','zamowienia'), ['rola' => $this->rola , 'login'=>$this->login , 'ID'=>$this->ID]);
        }
        if ($this->rola == "Klient") {
            $zamowienia=DB::table('zamowienie')->where('ID_Klienta',$this->ID)->get(); 
            return view('ProfilKlienta', compact('uzytkownicy','zamowienia'), ['rola' => $this->rola , 'login'=>$this->login , 'ID'=>$this->ID]);
        }
    }
    public function UsunKonto(){
        $this->sesja();
        $usun=DB::delete('delete from uzytkownicy where Login=?',[$this->login]);
        return view('Logowanie');
    }
    public function DodajStatus(){
        $this->sesja();
        $this->WyswietlanieMechanika();
        $uzytkownicy=$this->uzytkownicy;
        $zamowienia=DB::table('zamowienie')->where('ID_Mechanika',$this->ID)->get();
        $opis=$_GET['opis'];
        $stan=$_GET['stan'];
        $zamow=$_GET['zamow'];
        
        $update=DB::update('update zamowienie set Opis=? , Stan_Realizacji=? where NR_ZAMOWIENIA=? ' , [$opis,$stan,$zamow]);

        return view('ProfilMechanik',compact('uzytkownicy','zamowienia'),['rola'=>$this->rola , 'login'=>$this->login , 'ID'=>$this->ID]);
    }
}
