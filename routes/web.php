<?php

use App\Http\Controllers\EdycjaController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SerwisController;
use App\Http\Controllers\DodawanieController;
use App\Http\Controllers\ZamowController;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['newsession']) && isset($_SESSION['login'])) {
    $this->rola = $_SESSION['newsession'];
    $this->login = $_SESSION['login'];
    $this->id = $_SESSION['id'];
} else {
    $this->rola = "Zaloguj/Zarejestruj";
}

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Main', ['rola' => $this->rola]);
});

Route::get('/Main', function () {  //TYMCZASOWO
    return view('Main', ['rola' => $this->rola]);
});

Route::get('/Uslugi', [SerwisController::class, 'uslugiPost']);

Route::get('/Kontakt', function () {
    return view('Kontakt', ['rola' => $this->rola]);
});


Route::get('/Login', function () {
    return view('Login');
});
Route::get('/Register', function () {
    return view('Register');
});

Route::get('/Zarejestruj', [DodawanieController::class, 'Rejestracja']);

Route::get('/Loguj', [LoginController::class, 'login']);

//Moje profile (profil Admina,Pracownika i Klienta) jesli if nie przejdzie to przekierwouje z zamowien i z moich profili do logowania
if ($this->rola != "Zaloguj/Zarejestruj") {
    if ($this->rola == "Mechanik") {
        Route::get('/Logowanie', [SerwisController::class, 'WyswietlanieMechanika']);
    } else if ($this->rola == "Admin") {
        Route::get('/Logowanie', [SerwisController::class, 'WyswietlanieAdmina']);
    } else if ($this->rola == "Klient") {
        Route::get('/Logowanie', [SerwisController::class, 'WyswietlanieKlienta']);
    }
    Route::get('/Zamow', [ZamowController::class, 'uslugishow']);
} else {
    Route::get('/Logowanie', function () {
        return view('Logowanie');
    });
    Route::get('/Zamow', function () {
        return view('Logowanie');
    });
}

Route::get('/Wyloguj    ', [LoginController::class, 'doLogout']);

Route::get('/Zmien_Dane',[EdycjaController::class,'EdycjaUzytkownika']);
Route::get('/NoweDane',[EdycjaController::class,'ZmienDane']);

Route::get('/Usun_Konto',[EdycjaController::class,'UsunKonto']);

Route::get('/Dodaj_Status',[EdycjaController::class,'DodajStatus']);

Route::get('/DodawanieUzytkownikow', function (){
    return view('RegisterAdmina');
});
Route::get('/ZarejestrujAdmin',[DodawanieController::class,'RejestracjaAdmin']);

Route::get('/UsunUzytkownikow',[EdycjaController::class,'UsunUzytkownikow']);
Route::get('/UsunZamowienia',[EdycjaController::class,'UsunZamowienia']);
Route::get('/PokazUzytkownikow',[EdycjaController::class,'ZnajdzUzytkownikow']);
Route::get('/Akceptuj_Zlecenie',[EdycjaController::class,'AkceptujZlecenie']);
Route::get('/Zakoncz_Status',[EdycjaController::class,'ZakonczStatus']);
Route::get('/EdycjaUslug',[EdycjaController::class,'PrzejdzDoEdycji']);
Route::get('/AkceptujUslugi',[EdycjaController::class,'AkceptujUslugi']);
Route::get('/ZamowUslugi',[ZamowController::class,'ZamowUslugi']);
Route::get('/DodajUsluge',[Dodawaniecontroller::class,'DodajUsluge']);
