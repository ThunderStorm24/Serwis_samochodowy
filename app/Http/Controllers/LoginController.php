<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public $login;
    public $rola;

    public function login(){
        $log=$_GET['login'];
        $haslo=$_GET['haslo'];

        $uzytkownik=DB::table('uzytkownicy')->where('Login', $log)->first();
        $this->login = $uzytkownik->Login;
        $hasloBaza = $uzytkownik->Haslo;
        $this->rola = $uzytkownik->Rola;
        
        if($this->login == $log && $hasloBaza == $haslo){
            if (session_status() == PHP_SESSION_NONE){
                session_start();
            }
            $_SESSION["newsession"]=$this->rola;
            $_SESSION['login']=$this->login;
            return view('main',['rola'=>$this->rola]);
        }else{
            return view('login');
        }
    }
    public function doLogout(){
        if (session_status() == PHP_SESSION_NONE) {
                session_start();
        }
        session_destroy();
        return view('main');
    }
}
