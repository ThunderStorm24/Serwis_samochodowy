<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SerwisController;





class DodawanieController extends SerwisController
{
    public function validacja(Request $req)
    {
        $req->validate(
            [
                'imie' => 'required|regex:"[A-Z]{1}[a-z]"|min:3|max:20',
                'nazwisko' => 'required|regex:"[A-Z]{1}[a-z]"|min:3|max:30',
                'ulica' => 'required|regex:"[A-Z]{1}[A-Za-z\s]"|min:3|max:30',
                'nrdom' => 'required|regex:"^[0-9]+\/[0-9]+"|min:3|max:5',
                'miasto' => 'required|regex:"[A-Z]{1}[A-Za-z\s]"|min:3|max:30',
                'kod' => 'required|regex:"^[0-9]{2}\-[0-9]{3}"',
                'telefon' => 'required|regex:"^[0-9\-\+]{12,12}$"|unique:uzytkownicy,Nr_telefonu',
                'mail' => 'required|regex:"^[a-z0-9]+\@[a-z]+\.[a-z]+"|min:7|max:40|unique:uzytkownicy,Mail',
                'login' => 'required|regex:".\S"|min:3|max:40"|unique:uzytkownicy,login',
                'haslo' => 'required|regex:"^[A-Z]{1}.\S"|min:8|max:40',
                'phaslo' => 'required|regex:"^[A-Z]{1}.\S"|min:8|max:40|same:haslo'
            ],
            [
                'imie.regex' => 'Imie ma się zaczynać z Dużej litery, ma być bez znaków specjalnych i bez liczb (np:Tomek)',
                'nazwisko.regex' => 'Nazwisko ma się zaczynać z Dużej litery, ma być bez znaków specjalnych i bez liczb (np:Kowalski)',
                'ulica.regex' => 'Ulica ma się zaczynać z Dużej litery i ma być bez liczb (np:Tadeusza Zareby)',
                'nrdom.regex' => 'Numer domu ma być w postaci __/__ (np:12/34)',
                'miasto.regex' => 'Miasto ma się zaczynać z Dużej litery i ma być bez liczb (np:Sosnowiec)',
                'kod.regex' => 'Kod pocztowy ma być w postaci __-___ (np:41-253)',
                'telefon.regex' => 'Telefon ma się zaczynać od numeru kierunkowego (wraz z plusem) i się składać tylko i wyłącznie z liczb (np:+48123456789)',
                'mail.regex' => 'Mail ma zawierać @ (np:pat@onet.pl)',
                'login.regex' => 'Login ze wszystkich znaków',
                'haslo.regex' => 'Haslo ma się zaczynać z Dużej litery',
                'phaslo.regex' => 'Powtórzone hasło ma się zaczynać z Dużej litery',
                'phaslo.same'=>'Hasła nie są takie same!',
                'required' => 'Pole :attribute nie może być puste!',
                'unique' => 'Pole :attribute znajduje się już w naszej bazie!'
            ]
        );
    }
    public function Rejestracja(Request $req)
    {
        //Walidacja z funkcji validate()
        $this->validacja($req);

        //Pobranie zmiennych z formularza
        $Rola = "Klient";
        $Imie = $_GET['imie'];
        $Nazwisko = $_GET['nazwisko'];
        $Ulica = $_GET['ulica'];
        $Nr = $_GET['nrdom'];
        $Miasto = $_GET['miasto'];
        $Kod = $_GET['kod'];
        $Telefon = $_GET['telefon'];
        $Mail = $_GET['mail'];
        $Login = $_GET['login'];
        $Haslo = $_GET['haslo'];

        //Dodanie do tabeli uzytkonicy nowego uzytkownika z danymi z formularza
        $register = DB::insert('INSERT INTO uzytkownicy(Rola,Imie,Nazwisko,Ulica,Nr_domu,Miasto,Kod_pocztowy,Nr_telefonu,Mail,Login,Haslo) values(?,?,?,?,?,?,?,?,?,?,?)', [$Rola, $Imie, $Nazwisko, $Ulica, $Nr, $Miasto, $Kod, $Telefon, $Mail, $Login, $Haslo]);

        //Przejscie na widok login
        return view('Login');
    }
    public function RejestracjaAdmin(Request $req)
    {
        //Walidacja z funkcji validate()
        $this->validacja($req);

        //Pobranie zmiennych z formularza
        $Rola = $_GET['Rola'];
        $Imie = $_GET['imie'];
        $Nazwisko = $_GET['nazwisko'];
        $Ulica = $_GET['ulica'];
        $Nr = $_GET['nrdom'];
        $Miasto = $_GET['miasto'];
        $Kod = $_GET['kod'];
        $Telefon = $_GET['telefon'];
        $Mail = $_GET['mail'];
        $Login = $_GET['login'];
        $Haslo = $_GET['haslo'];
        $pHaslo = $_GET['phaslo'];

        //Dodanie do tabeli uzytkonicy nowego uzytkownika z danymi z formularza
        $register = DB::insert('INSERT INTO uzytkownicy(Rola,Imie,Nazwisko,Ulica,Nr_domu,Miasto,Kod_pocztowy,Nr_telefonu,Mail,Login,Haslo) values(?,?,?,?,?,?,?,?,?,?,?)', [$Rola, $Imie, $Nazwisko, $Ulica, $Nr, $Miasto, $Kod, $Telefon, $Mail, $Login, $Haslo]);

        //Pobranie wszystkich zmiennych do wyświetlenia widoku Admina
        $this->sesja();
        $this->PanelAdmina();
        $this->DaneUzytkownika();
        $uzytkownicy = $this->uzytkownicy;
        $pracownicy = $this->pracownicy;
        $admini = $this->admini;
        $klienci = $this->klienci;
        $order = $this->order;

        //Wyswietlenie widoku Admina ze wszystkimi parametrami
        return view('ProfilAdmin', compact('uzytkownicy', 'pracownicy', 'admini', 'klienci', 'order'), ['rola' => $this->rola, 'login' => $this->login]);
    }
}
