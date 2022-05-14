<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SerwisController;
use App\Http\Controllers\DodawanieController;

class EdycjaController extends DodawanieController
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
    public function EdycjaUzytkownika()
    {
        $this->sesja();
        $this->DaneUzytkownika();
        $uzytkownicy = $this->uzytkownicy;
        return view('Edycja', compact('uzytkownicy'), ['rola' => $this->rola, 'login' => $this->login, 'ID' => $this->ID]);
    }
    public function ZmienDane(Request $req)
    {
        //Pobranie wszystkich zmiennych do wyswietlenia widoku z danymi z sesji, z danymi uzytkownika i opisami zamowien
        $this->sesja();
        $this->DaneUzytkownika();
        $this->OpisZamowien();
        $uslugi = $this->uslugi;
        $uzytkownicy = $this->uzytkownicy;

        //Walidacja DO NAPRAWYYYYYY!!!       !!!   /\/\    !!!
        //$this->validacja($req);            !!!   /\/\    !!!

        //Pobranie zmiennych
        $Imie = $_GET['imie'];
        $Nazwisko = $_GET['nazwisko'];
        $Ulica = $_GET['ulica'];
        $Nr = $_GET['nrdom'];
        $Miasto = $_GET['miasto'];
        $Kod = $_GET['kod'];
        $Telefon = $_GET['telefon'];
        $Mail = $_GET['mail'];
        $Login = $_GET['login'];

        //Aktualizujemy dane obecnie zalogowaniego uzytkownika
        $change = DB::update('update uzytkownicy set Imie=?,Nazwisko=?,Ulica=?,Nr_domu=?,Miasto=?,Kod_Pocztowy=?,Nr_telefonu=?,Mail=?,Login=? where Login=?', [$Imie, $Nazwisko, $Ulica, $Nr, $Miasto, $Kod, $Telefon, $Mail, $Login, $this->login]);

        //Teraz zwracamy widok
        //JESLI rola to Admin
        if ($this->rola == "Admin") {
            //To pobierz wszystkie zmienne admina
            $this->PanelAdmina();
            $pracownicy = $this->pracownicy;
            $admini = $this->admini;
            $klienci = $this->klienci;
            $order = $this->order;
            //I wyswietl profil admina z waznymi zmiennymi
            return view('ProfilAdmin', compact('uzytkownicy', 'pracownicy', 'admini', 'klienci', 'order', 'uslugi'), ['rola' => $this->rola, 'login' => $this->login, 'ID' => $this->ID]);
        }
        //JESLI rola to Admin
        if ($this->rola == "Mechanik") {
            //To pobierz zamowienia Mechanika
            $zamowienia = DB::table('zamowienie')
                ->where('ID_Mechanika', $this->ID)
                ->get();
            //I wyswietl profil mechanika z waznymi zmiennymi
            return view('ProfilMechanik', compact('uzytkownicy', 'zamowienia', 'uslugi'), ['rola' => $this->rola, 'login' => $this->login, 'ID' => $this->ID]);
        }
        //JESLI rola to Admin
        if ($this->rola == "Klient") {
            //To pobierz zamowienia Klienta
            $zamowienia = DB::table('zamowienie')
                ->where('ID_Klienta', $this->ID)
                ->get();
            //I wyswietl profil klienta z waznymi zmiennymi
            return view('ProfilKlienta', compact('uzytkownicy', 'zamowienia', 'uslugi'), ['rola' => $this->rola, 'login' => $this->login, 'ID' => $this->ID]);
        }
    }
    public function UsunKonto()
    {
        //Pobranie danych z sesji
        $this->sesja();
        //Usuniecie Konta gdzie Login jest taki jak w sesji
        $usun = DB::delete('delete from uzytkownicy where Login=?', [$this->login]);
        //Zwracamy widok Logowania
        return view('Logowanie');
    }
    public function DodajStatus()
    {
        //Pobranie wszystkich zmiennych do wyswietlenia widoku z danymi z sesji, z wyswietlaniem mechanika i opisami zamowien
        $this->sesja();
        $this->WyswietlanieMechanika();
        $this->OpisZamowien();
        $uslugi = $this->uslugi;
        $uzytkownicy = $this->uzytkownicy;

        //Zamowienia gdzie ID_Mechanika jest z sesji, czyli zlecenia obecnie zalogowanego mechanika
        $zamowienia = DB::table('zamowienie')
            ->where('ID_Mechanika', $this->ID)
            ->get();

        //Pobranie danych z formularza
        $opis = $_GET['opis'];
        $stan = $_GET['stan'];
        $zamow = $_GET['zamow'];

        //Update do bazy danych z nowymi zmiennymi
        $update = DB::update('update zamowienie set Opis=? , Stan_Realizacji=? where NR_ZAMOWIENIA=? ', [$opis, $stan, $zamow]);

        //Zwracamy Profil mechanika z potrzebnymi zmiennymi
        return view('ProfilMechanik', compact('uzytkownicy', 'zamowienia', 'uslugi'), ['rola' => $this->rola, 'login' => $this->login, 'ID' => $this->ID]);
    }
    public function UsunUzytkownikow()
    {
        //Pobranie wszystkich zmiennych do wyswietlenia widoku z danymi z sesji, z danymi uzytkownika i opisami zamowien oraz Caly panel admina
        $this->sesja();
        $this->DaneUzytkownika();
        $this->OpisZamowien();
        $this->PanelAdmina();
        $pracownicy = $this->pracownicy;
        $admini = $this->admini;
        $klienci = $this->klienci;
        $order = $this->order;
        $uslugi = $this->uslugi;
        $uzytkownicy = $this->uzytkownicy;

        //Pobranie z formularza ID
        $ID_Uzytkownika = $_GET['ID'];

        //Sprawdzenie czyli admin nie chce sam siebie usunąć czy Szefa firmy o ID 5
        if ($ID_Uzytkownika == $this->ID || $ID_Uzytkownika == '5') {
            $message = "Nie mozesz sam siebie usunąć! ani Szefa firmy Patryka!";
        } else {
            $message = "Pomyslnie usunieto uzytkownika!";
            //Usuwanie gdzie ID z bazy = ID z formularza
            $delete = DB::table('uzytkownicy')
                ->where('ID_Uzytkownika', $ID_Uzytkownika)
                ->delete();
        }
        //Zwracamy widok profilu admina z powrotem
        return view('ProfilAdmin', compact('uzytkownicy', 'pracownicy', 'admini', 'klienci', 'order', 'uslugi'), ['rola' => $this->rola, 'login' => $this->login, 'ID' => $this->ID, 'message' => $message]);
    }
    public function ZnajdzUzytkownikow()
    {
        //Pobranie wszystkich zmiennych do wyswietlenia widoku z danymi z sesji, z danymi uzytkownika i opisami zamowien oraz Caly panel admina
        $this->sesja();
        $this->DaneUzytkownika();
        $this->OpisZamowien();
        $this->PanelAdmina();
        $pracownicy = $this->pracownicy;
        $admini = $this->admini;
        $klienci = $this->klienci;
        $order = $this->order;
        $uslugi = $this->uslugi;
        $uzytkownicy = $this->uzytkownicy;

        //Pobranie z formularza ID
        $ID_Uzytkownika = $_GET['ID_U'];

        //Szukanie uzytkownika w bazie gdzie ID z formularza = ID z bazy
        $znajdzUzytkownika = DB::table('uzytkownicy')->where('ID_Uzytkownika', $ID_Uzytkownika)->get();
        $messageznajdz = "Znaleziono użytkownika!";

        //Pobranie opisu zamowien tego uzytkownika
        $znajdzOpis = $this->uslugi = DB::table('uslugi_zamowienia')
            ->join('uslugi', 'uslugi_zamowienia.ID_Uslugi', '=', 'uslugi.ID_Uslugi')
            ->join('zamowienie', 'uslugi_zamowienia.NR_ZAMOWIENIA', '=', 'zamowienie.NR_ZAMOWIENIA')
            ->get();
        //Pobranie zamowien tego uzytkownika
        $znajdzZamowienie = DB::table('zamowienie')
            ->where('ID_Klienta', $ID_Uzytkownika)
            ->orWhere('ID_Mechanika', $ID_Uzytkownika)
            ->get();

        //Zwracamy widok profilu admina z powrotem
        return view('ProfilAdmin', compact('uzytkownicy', 'pracownicy', 'admini', 'klienci', 'order', 'uslugi', 'znajdzUzytkownika', 'znajdzOpis', 'znajdzZamowienie'), ['rola' => $this->rola, 'login' => $this->login, 'ID' => $this->ID, 'messageznajdz' => $messageznajdz]);
    }
}
