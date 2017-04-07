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
    		return 'Usuário Logado!';
    	}
    	return 'Usuário não realizou login.';
    }
}
