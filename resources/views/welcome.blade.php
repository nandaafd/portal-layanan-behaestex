@extends('layouts.landingpage')

@section('content')
<div class="container-fluid">
          <div class="row">
              <!-- kiri -->
              <div class="col-md-7 kiri text-center">
                  <img  class="mx auto img-fluid logobtx" src="{{ ('images/btxlogo.png') }}" alt="">
                  <h1 class="mx-auto">Selamat Datang</h1>
                  <h2>di PT BEHAESTEX</h2>
                  <p class="mx-auto"><span>PT BEHAESTEX</span>  merupakan perusahaan yang bergerak di bidang tekstil
                  dan merupakan penghasil sarung terbaik di Indonesia. </p>
                  <a href="{{asset('portal')}}" class="btn">Buka Layanan<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                  </svg></a> 
              </div>
              <!-- kanan -->
              <div class="col-md-5 kanan d-flex overflow-hidden">
                  <img class="mx-auto img-fluid align-self-center welcome" src="{{ ('images/welcome.png') }}" alt="">
                  <img class="position-absolute  side" src="{{ ('images/side.png') }}" alt="">    
              </div>
          
          </div>

        </div>


        <div class="footer">
              <div class="office">
                <h5>Jl. Mayjen Sungkono 14 Gresik 61123, East Java, Indonesia. PO BOX 124</h5>
              </div>

              <div class="phone">
                <ul>
                  <li class="fax"><span>fax</span>   (+62) 31 397 6666</li>
                  <li><span>Phone</span>   (+62) 31 398 1111</li>
                </ul>
              </div>

              <div class="email">
                <ul>
                  <li><span>Email</span>   info@behaestex.co.id</li>
                </ul>
              </div>
        </div>
@endsection
