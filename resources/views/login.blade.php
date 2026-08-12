@extends('layouts.app')

@section('title', 'Login POS Sahla')

@section('content')

<style>

body{
    background:linear-gradient(135deg,#FFF7FA,#FFE4EC);
    font-family:'Poppins',sans-serif;
}

/* CARD */
.login-card{
    border:none;
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 20px 45px rgba(128,0,32,.15);
}


/* HEADER */
.login-header{
    background:linear-gradient(135deg,#6A0019,#A52A4D);
    color:white;
    text-align:center;
    padding:30px;
}


.logo{
    width:80px;
    height:80px;
    background:white;
    color:#800020;
    border-radius:50%;
    margin:auto;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:40px;
    margin-bottom:15px;
}


/* BODY */
.login-body{
    background:white;
    padding:35px;
}


/* LABEL */
.form-label{
    color:#800020;
    font-weight:600;
}


/* INPUT */
.form-control{
    border-radius:12px;
    border:2px solid #F4C2D7;
    padding:12px;
}


.form-control:focus{
    border-color:#800020;
    box-shadow:0 0 10px rgba(128,0,32,.15);
}


/* ROLE CARD */
.role-box{
    display:flex;
    gap:15px;
}


.role-option{
    flex:1;
}


.role-option input{
    display:none;
}


.role-option label{

    display:block;
    text-align:center;
    padding:15px;

    border-radius:15px;
    border:2px solid #F4C2D7;
    cursor:pointer;
    color:#800020;
    font-weight:600;
    transition:.3s;
}


.role-option input:checked + label{
    background:#800020;
    color:white;
    border-color:#800020;
}



/* BUTTON */
.btn-login{
    background:linear-gradient(135deg,#800020,#A52A4D);
    border:none;
    color:white;
    border-radius:12px;
    padding:12px;
    font-weight:600;
    transition:.3s;
}


.btn-login:hover{
    background:linear-gradient(135deg,#A52A4D,#800020);
    color:white;
    transform:translateY(-2px);

}


/* FOOTER */
.footer-text{
    text-align:center;
    color:#888;
    margin-top:20px;
    font-size:14px;
}

</style>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-5 col-lg-4">
            <div class="card login-card">
                <div class="login-header">
                    <div class="logo">
                        🛍️
                    </div>


                    <h3 class="fw-bold mb-1">
                        POS Sahla
                    </h3>


                    <small>
                        Selamat Datang
                    </small>

                </div>

                <div class="login-body">
                    <form action="{{ route('auth') }}" method="POST">

                        @csrf

                        {{-- ROLE --}}

                        <div class="mb-4">
                            <label class="form-label">
                                Login Sebagai
                            </label>

                            <div class="role-box">
                                <div class="role-option">
                                    <input
                                        type="radio"
                                        name="role"
                                        id="admin"
                                        value="admin"
                                        {{ old('role') == 'admin' ? 'checked' : '' }}
                                    >

                                    <label for="admin">
                                        👑 Admin
                                    </label>

                                </div>

                                <div class="role-option">
                                    <input
                                        type="radio"
                                        name="role"
                                        id="kasir"
                                        value="kasir"
                                        {{ old('role') == 'kasir' ? 'checked' : '' }}
                                    >


                                    <label for="kasir">
                                        🛒 Kasir
                                    </label>


                                </div>
                            </div>



                            @error('role')

                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>

                            @enderror


                        </div>

                        {{-- EMAIL --}}

                        <div class="mb-3">


                            <label for="email" class="form-label">
                                Email
                            </label>


                            <input

                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"

                                placeholder="Masukkan email"
                                autofocus

                            >


                            @error('email')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror


                        </div>


                        {{-- PASSWORD --}}

                        <div class="mb-4">

                            <label for="password" class="form-label">
                                Password
                            </label>


                            <input

                                type="password"
                                name="password"
                                id="password"
                                class="form-control @error('password') is-invalid @enderror"

                                placeholder="Masukkan password"

                            >

                            @error('password')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror


                        </div>

                        {{-- LOGIN BUTTON --}}

                        <div class="d-grid">

                            <button type="submit"
                                    class="btn btn-login">
                                🔐 Login
                            </button>

                        </div>
                    </form>

                    <div class="footer-text">
                        ❤️ POS Sahla © {{ date('Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection