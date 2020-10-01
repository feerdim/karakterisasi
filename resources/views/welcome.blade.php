@extends('layouts.welcome')

@section('title', 'FINDER')

@section('content')
<!-- Masthead-->
<header class="masthead bg-light text-white text-center">
<div class="container d-flex align-items-center flex-column">
  <!-- Masthead Avatar Image-->
  <img class="masthead-avatar" src="finder.png" alt="" />
  <!-- Masthead Heading-->
  <h1 class="masthead-heading text-uppercase text-dark">SISTEM INFORMASI<br>PENGELOLAAN ALAT</h1>
  <!-- Masthead Subheading-->
  <h2 class="masthead-subheading text-dark">FINDER<br>Functional Nano Powder</h2>
</div>
</header>
<!-- Portfolio Section-->
<section class="page-section portfolio" id="portfolio">
  <div class="container">
    <h2 class="page-section-heading text-center text-uppercase text-dark m-b-60">Informasi Layanan</h2>
    <div class="row">
      <ol>
        <li>
          <h4>Layanan Login</h4>
          <h5>Silakan 
            <a href="{{ route('login') }}">Login</a> dengan memasukkan username dan password yang Anda buat untuk melakukan registrasi penggunaan alat. Pilih menu Registrasi Penggunaan Alat setelah Anda Log-in.
          </h5>
        </li><br>
        <li>
          <h4>Daftar Akun</h4>
<!--           <h5>Silakan klik <a href="https://drive.google.com/open?id=1pw_FMr_0nes5t2KCVN_KWfg-PGtqKzeI">di sini</a> untuk mengunduh aturan registrasi akun FINDER. Kemudian silakan pilih role dibawah ini untuk melakukan registrasi. </h5> -->
          <h5>Anda harus memiliki akun terlebih dahulu, sebelum Log-in. Silakan klik menu
            <a href="{{ route('register') }}">Register</a> untuk membuat akun. Akun SIPA tersedia untuk :
          </h5>
          <ul>
            <li>
              <h5>Dosen Unpad</h5>
            </li>
            <li>
              <h5>Mahasiswa Unpad</h5>
            </li>
            <li>
              <h5>Dosen Non Unpad</h5>
            </li>
            <li>
              <h5>Mahasiswa Non Unpad</h5>
            </li>
            <li>
              <h5>Umum</h5>
            </li>
          </ul>
        </li>
        <li>
          <h4>Daftar Alat & Harga</h4>
          <ul>
            <li>
              <h5><a href ="{{ route('tool.index') }}">Daftar Alat</a></h5>
            </li>
            <li>
              <h5><a href ="{{ route('price.index') }}">Daftar Harga</a></h5>
            </li>
          </ul>
        </li>
      </ol>
    </div>
  </div>
</section>

@endsection

@push('script')
<script src="{{ asset('js/scripts.js') }}"></script>
@endpush