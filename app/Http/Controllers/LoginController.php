<?php

namespace estoque\Http\Controllers;

use Auth;
use Request;

class LoginController extends Controller
{
    public function login()
    {
    	$credenciais = Request::only('email', 'password');

    	if(Auth::attempt($credenciais)){
    		return 'Usu�rio Logado!';
    	}
    	return 'Usu�rio n�o realizou login.';
    }
}
