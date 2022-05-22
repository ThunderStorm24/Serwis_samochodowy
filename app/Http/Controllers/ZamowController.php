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
        $uslugi = DB::table('uslugi')
            ->get();
        return view('Zamow', compact('uslugi'), ['rola' => $this->rola]);
    }
}