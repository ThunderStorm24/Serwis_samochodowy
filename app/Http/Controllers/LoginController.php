<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public $login;
    public $rola;
    public $ID;

    public function login(Request $req)
    {
        //Walidacja (Sprawdzenie czy pola nie są puste)
        $req->validate(
            [
                'login' => 'required',
                'haslo' => 'required',
            ],
            [
                'required' => 'Pole :attribute jest puste!',
            ]
        );

        //Pobranie zmiennych z formularza
        $log = $_GET['login'];
        $haslo = $_GET['haslo'];

        //Pobranie danych uzytkownika z bazy danych (gdzie login = ten login z formularza)
        $uzytkownik = DB::table('uzytkownicy')->where('Login', $log)->first();
        $this->login = $uzytkownik->Login;
        $hasloBaza = $uzytkownik->Haslo;
        $this->rola = $uzytkownik->Rola;
        $this->ID = $uzytkownik->ID_Uzytkownika;

        //Jesli Dane się zgadzają to sesja startuje oraz do sesji zapisują się zmienne rola=admin login=admin ID=5
        if ($this->login == $log && $hasloBaza == $haslo) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION["newsession"] = $this->rola;
            $_SESSION['login'] = $this->login;
            $_SESSION['id'] = $this->ID;

            //Zwracamy widok głównej strony wraz ze zmienną sesji ROLA którą będziemy wyświetlać na stronie, że jesteśmy zalogowani jako admin
            return view('main', ['rola' => $this->rola]);
        } else {

            //Jeśli logowanie się nie udało to wracamy z powrotem na strone login
            $message = "Nieprawidłowe hasło lub login! Spróbuj ponownie!";
            return view('login', ['message' => $message]);
        }
    }
    public function doLogout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        //Zniszczenie sesji (wylogowanie)
        session_destroy();
        //Powrót na stronę główną
        return view('main');
    }
}
