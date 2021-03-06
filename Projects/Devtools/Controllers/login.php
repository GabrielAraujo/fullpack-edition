<?php namespace Project\Controllers;

//------------------------------------------------------------------------------------------------------------
// GENERATE
//------------------------------------------------------------------------------------------------------------
//
// Author   : ZN Framework
// Site     : www.znframework.com
// License  : The MIT License
// Copyright: Copyright (c) 2012-2016, znframework.com
//
//------------------------------------------------------------------------------------------------------------

use Method, Session;

class Login extends Controller
{
    //--------------------------------------------------------------------------------------------------------
    // Controller
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $params NULL
    //
    //--------------------------------------------------------------------------------------------------------
    public function main(String $params = NULL)
    {
        if( Session::select('isLogin') )
        {
            redirect('logout');
        }

        $users = DASHBOARD_CONFIG['users'];

        if( Method::post('login') )
        {
            if( ($users[Method::post('user')] ?? NULL) === Method::post('password') )
            {
                Session::insert('isLogin', 1);
                Session::insert('username', Method::post('user'));
                Session::insert('password', Method::post('password'));

                redirect();
            }
        }
    }

    public function out()
    {
        Session::delete('isLogin');
        Session::delete('username');
        Session::delete('password');

        redirect('login');
    }
}
