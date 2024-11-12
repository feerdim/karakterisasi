@extends('layouts.welcome')

@section('title', 'FINDER')

@section('content')
<header class="masthead bg-light">
<div class="container">
  <div class="row ml-auto">
    <div class="col-md-6 ml-3">
      <div class="ml-3">
        <h1 class="masthead-heading">SISTEM INFORMASI<br>PENGELOLAAN LAYANAN</h1>
        <p>Ingin melakukan karakterisasi? Tapi tidak bisa ke Lab?<br/>Kirim sampel. Hasil kami kirim ke alamat email Anda.</p>
        <a type="button" href="{{ route('login') }}" class="btn btn-outline-danger btn-sm">Login</a>&nbsp;
        <a type="button" href="{{ route('register') }}" class="btn btn-outline-danger btn-sm">Register</a>
      </div>
    </div>
    <div class="col-md-5 text-center">
      <br/>
      <img class="masthead-avatar" src="finder.png"/>
    </div>
  </div>
</div>
</header>

<div class="container page-section">
  <h2 class="page-section-heading text-center text-uppercase text-dark">Informasi Layanan</h2>
  <div class="row ml-auto">
    <ol>
      <ul>
        <h4>Registrasi</h4>
        <h5>
          Pastikan Anda membaca aturan registrasi akun
          <a href="https://drive.google.com/file/d/1fenWsPhHWntsP1_WAfjwq42GCMq4D6ua/view?usp=sharing">di sini</a>.
          Silahkan 
          <a href="{{ route('register') }}">Register</a>
          untuk membuat akun.
        </h5>
      </ul><br>
      <ul>
        <h4>Login</h4>
        <h5>
          Silahkan
          <a href="{{ route('login') }}">Login</a>
          untuk mengakses layanan kami.
        </h5>
      </ul><br>
      <ul>
        <h4>Informasi Alat dan Harga</h4>
        <!-- <h4>Informasi <a href ="{{ route('tool.index') }}">Alat</a> dan <a href ="{{ route('price.index') }}">Harga</a></h4> -->
      </ul>
    </ol>
  </div>
</div>

@endsection
