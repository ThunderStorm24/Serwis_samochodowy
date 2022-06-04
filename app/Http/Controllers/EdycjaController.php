<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DodawanieController;

class EdycjaController extends DodawanieController
{
    public function validacjaID(Request $req)
    {
        $req->validate(
            [
                'ID_U' => 'exists:uzytkownicy,ID_Uzytkownika',
            ],
            [
                
                'exists' => 'Takiego ID Uzytkownika nie ma w naszej bazie!'
            ]
        );
    }
    public function validacjaEdycji(Request $req)
    {
        $this->sesja();
        $req->validate(
            [
                'imie' => 'required|regex:"^[A-ZŁŚ]{1}+[a-ząęółśżźćń]+$"|min:3|max:20',
                'nazwisko' => 'required|regex:"^[A-ZŁŚ]{1}+[a-ząęółśżźćń]+$"|min:3|max:30',
                'ulica' => 'required|regex:"^[a-ząęółśżźćńA-ZĄĘÓŁŚŻŹĆŃ\s]+$"|min:3|max:30',
                'nrdom' => 'required|regex:"^[0-9]+\/[0-9]+"|min:3|max:5',
                'miasto' => 'required|regex:"^[a-ząęółśżźćńA-ZĄĘÓŁŚŻŹĆŃ\s]+$"|min:3|max:30',
                'kod' => 'required|regex:"^[0-9]{2}\-[0-9]{3}"',
                'telefon' => 'required|regex:"^[0-9\-\+]{12,12}$"|unique:uzytkownicy,Nr_telefonu,' . $this->ID . ',ID_Uzytkownika',
                'mail' => 'required|regex:"[a-z0-9_.-]+@[a-z0-9_.-]+\.\w{2,4}"|min:7|max:40|unique:uzytkownicy,Mail,' . $this->ID . ',ID_Uzytkownika',
                'login' => 'required|regex:".\S"|min:3|max:40"|unique:uzytkownicy,login,' . $this->ID . ',ID_Uzytkownika',
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
                'login.regex' => 'Login ',
                'required' => 'Pole :attribute nie może być puste!',
                'unique' => 'Pole :attribute znajduje się już w naszej bazie!'
            ]
        );
    }
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

        //Walidacja     
        $this->validacjaEdycji($req);

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
        $change = DB::update('update uzytkownicy set Imie=?,Nazwisko=?,Ulica=?,Nr_domu=?,Miasto=?,Kod_Pocztowy=?,Nr_telefonu=?,Mail=?,Login=? where ID_Uzytkownika=?', [$Imie, $Nazwisko, $Ulica, $Nr, $Miasto, $Kod, $Telefon, $Mail, $Login, $this->ID]);

        return redirect('/Logowanie');
        
    }
    public function UsunKonto()
    {
        //Pobranie danych z sesji
        $this->sesja();
        //Usuniecie Konta gdzie Login jest taki jak w sesji
        $usun = DB::delete('delete from uzytkownicy where Login=?', [$this->login]);
        $usunZ = DB::delete('delete from zamowienie where ID_Klienta=?', [$this->ID]);
        //Zwracamy widok Logowania
        return view('Logowanie');
    }
    public function DodajStatus()
    {

        //Pobranie danych z formularza
        $opis = $_GET['opis'];
        $stan = $_GET['stan'];
        $zamow = $_GET['zamow'];

        //Jesli Stan bedzie OCZEKUJE
        if ($stan == "Oczekuje") {
            //To przygotowanie zmiennych dla resetu dla zamowienia
            $opis = "Oczekuje na zatwierdzenie!";
            $id = 10;
            //I zamowienie zostaje anulowane przez mechanika
            $update = DB::update('update zamowienie set Opis=? , Stan_Realizacji=? , ID_Mechanika=? where NR_ZAMOWIENIA=? ', [$opis, $stan, $id, $zamow]);
        } else {
            //Jesli inny stan to
            //Update do bazy danych z nowymi zmiennymi
            $update = DB::update('update zamowienie set Opis=? , Stan_Realizacji=? where NR_ZAMOWIENIA=? ', [$opis, $stan, $zamow]);
        }

        //Zwracamy Profil mechanika z potrzebnymi zmiennymi
        return redirect('/Logowanie');
    }
    public function UsunUzytkownikow(Request $req)
    {

        $req->validate(
            [
                'ID_U' => 'exists:uzytkownicy,ID_Uzytkownika',
            ],
            [
                
                'exists' => 'Takiego Numeru Zamowienia nie ma w naszej bazie!'
            ]
        );

        //Potrzebujemy danych z sesji
        $this->sesja();

        //Pobranie z formularza ID
        $ID_Uzytkownika = $_GET['ID_U'];

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
        return redirect('/Logowanie');
    }

    public function UsunZamowienia(Request $req)
    {
        $req->validate(
            [
                'NR' => 'exists:zamowienie,NR_ZAMOWIENIA',
            ],
            [
                
                'exists' => 'Takiego Numeru Zamowienia nie ma w naszej bazie!'
            ]
        );


        //Pobranie z formularza ID
        $Nr_Zamowienia = $_GET['NR'];

            //Usuwanie gdzie ID z bazy = ID z formularza
            $delete = DB::table('zamowienie')
                ->where('NR_ZAMOWIENIA', $Nr_Zamowienia)
                ->delete();
        //Zwracamy widok profilu admina z powrotem
        return redirect('/Logowanie');
    }

    public function ZnajdzUzytkownikow(Request $req)
    {
        $this->validacjaID($req);

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
        return view('ProfilAdmin', compact('uzytkownicy', 'pracownicy', 'admini', 'klienci', 'order', 'uslugi', 'znajdzUzytkownika', 'znajdzOpis', 'znajdzZamowienie'), ['rola' => $this->rola, 'login' => $this->login, 'ID' => $this->ID, 'messageznajdz' => $messageznajdz, 'ID_Uzytkownika'=>$ID_Uzytkownika]);
    }
    public function AkceptujZlecenie()
    {
        //Pobranie wszystkich zmiennych do wyswietlenia widoku z danymi z sesji, z wyswietlaniem mechanika i opisami zamowien
        $this->sesja();
        $this->WyswietlanieMechanika();
        $this->OpisZamowien();
        $uslugi = $this->uslugi;
        $uzytkownicy = $this->uzytkownicy;

        //Zamowienia gdzie ID_Mechanika jest z sesji, czyli zlecenia obecnie zalogowanego mechanika
        $this->ZamowieniaMechanika();
        //Zamowienia gdzie ID_Mechanika jest z sesji, czyli zlecenia obecnie zalogowanego mechanika
        $zamowienia = $this->zamowienia;
        //Wyswietlanie na profilu zamowien do wziecia
        $zamowieniaDoWziecia = $this->zamowieniaDoWziecia;
        //Zamowienia Gotowe
        $zamowieniaGotowe = $this->zamowieniaGotowe;
        //Zamowienia Zakonczone
        $zamowieniaZakonczone = $this->zamowieniaZakonczone;

        //Dane z formularza i automatyczne po nacisnieciu przycisku
        $opis = "Zamowienie zostalo zaakceptowane!";
        $stan = "Zaakceptowane";
        $zamow = $_GET['zamow'];

        $update = DB::update('update zamowienie set Opis=? , Stan_Realizacji=? , ID_Mechanika=? where NR_ZAMOWIENIA=? ', [$opis, $stan, $this->ID, $zamow]);

        //Zwracamy Profil mechanika z potrzebnymi zmiennymi
        return redirect('/Logowanie');
    }
    public function ZakonczStatus()
    {
        //Pobranie wszystkich zmiennych do wyswietlenia widoku z danymi z sesji, z wyswietlaniem mechanika i opisami zamowien
        $this->sesja();
        $this->WyswietlanieMechanika();
        $this->OpisZamowien();
        $uslugi = $this->uslugi;
        $uzytkownicy = $this->uzytkownicy;

        //Zamowienia gdzie ID_Mechanika jest z sesji, czyli zlecenia obecnie zalogowanego mechanika
        $this->ZamowieniaMechanika();
        //Zamowienia gdzie ID_Mechanika jest z sesji, czyli zlecenia obecnie zalogowanego mechanika
        $zamowienia = $this->zamowienia;
        //Wyswietlanie na profilu zamowien do wziecia
        $zamowieniaDoWziecia = $this->zamowieniaDoWziecia;
        //Zamowienia Gotowe
        $zamowieniaGotowe = $this->zamowieniaGotowe;
        //Zamowienia Zakonczone
        $zamowieniaZakonczone = $this->zamowieniaZakonczone;

        //Dane z formularza i automatyczne po nacisnieciu przycisku
        $Nr_Z = $_GET['zamow'];
        $stan = "Zakończone";

        $update = DB::update('update zamowienie set Stan_Realizacji=? where NR_ZAMOWIENIA=? ', [$stan, $Nr_Z]);
        //Zwracamy Profil mechanika z potrzebnymi zmiennymi
        return redirect('/Logowanie');
    }
    public function ZamowieniaMechanika()
    {
        //Zamowienia gdzie ID_Mechanika jest z sesji, czyli zlecenia obecnie zalogowanego mechanika
        $this->zamowienia = DB::table('zamowienie')
            ->where('ID_Mechanika', $this->ID)
            ->where('Stan_Realizacji', 'W trakcie')
            ->orWhere('Stan_Realizacji', 'Zaakceptowane')
            ->get();
        //Wyswietlanie na profilu zamowien do wziecia
        $this->zamowieniaDoWziecia = DB::table('zamowienie')
            ->where('ID_Mechanika', '10')
            ->get();
        //Zamowienia Gotowe
        $this->zamowieniaGotowe = DB::table('zamowienie')
            ->where('ID_Mechanika', $this->ID)
            ->where('Stan_Realizacji', 'Gotowe')
            ->get();
        //Zamowienia Ukończone
        $this->zamowieniaZakonczone = DB::table('zamowienie')
            ->where('ID_Mechanika', $this->ID)
            ->where('Stan_Realizacji', 'Zakończone')
            ->get();
    }

    public function PrzejdzDoEdycji()
    {
        $this->sesja();
        $uslugi = DB::table('uslugi')->get();
        return view('EdycjaUslug',compact('uslugi'),['rola' => $this->rola]);
    }
    public function AkceptujUslugi(Request $req)
    {
        $Nazwa=$_GET['nazwa'];
        $Cena=$_GET['cena'];
        $Opis=$_GET['opis'];
        $ID=$_GET['id'];

        $change = DB::update('update uslugi set Nazwa_Uslugi=?,Cena=?,Opis=? where ID_Uslugi=?',[$Nazwa,$Cena,$Opis,$ID]);

        $this->sesja();
        $uslugi = DB::table('uslugi')->get();
        return view('Uslugi',compact('uslugi'),['rola' => $this->rola]);
    }
}
    