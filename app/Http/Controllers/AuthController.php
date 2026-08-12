<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }


    public function auth(LoginRequest $request)
    {

        $credentials = $request->validated();


        // Cek email dan password
        if (Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password']
        ])) {


            $request->session()->regenerate();


            $user = Auth::user();



            /*
            |--------------------------------------------------------------------------
            | CEK ROLE LOGIN
            |--------------------------------------------------------------------------
            */

            $roleDipilih = $request->role;

            $roleUser = optional($user->role)->name;



            // Cek role yang dipilih dengan role database

            if ($roleDipilih != $roleUser) {


                Auth::logout();


                return back()->withErrors([

                    'role' => 'pilih salah satu '
                    . ucfirst($roleDipilih)
                    . ' role terlebih dahulu.'

                ]);

            }




            /*
            |--------------------------------------------------------------------------
            | SEMUA ROLE MASUK DASHBOARD
            |--------------------------------------------------------------------------
            */


            if($roleUser == 'admin' || $roleUser == 'kasir'){


                return redirect()

                    ->route('dashboard')

                    ->with('success',

                        'Selamat Datang '
                        . ucfirst($roleUser)
                        . ', '
                        . $user->name

                    );


            }





            /*
            |--------------------------------------------------------------------------
            | ROLE TIDAK DITEMUKAN
            |--------------------------------------------------------------------------
            */


            Auth::logout();


            return back()->withErrors([

                'role'=>'Role user tidak ditemukan.'

            ]);



        }




        return back()->withErrors([

            'email'=>'Email atau password tidak valid'

        ]);

    }





    public function logout(Request $request)
    {


        Auth::logout();


        $request->session()->invalidate();


        $request->session()->regenerateToken();



        return redirect()

            ->route('login')

            ->with('success',

                'Anda telah berhasil logout.'

            );

    }
}