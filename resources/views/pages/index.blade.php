@extends('layouts.app')
@section('content')
<marquee style="background-color:green; font-size:20px; font-weight:700">Welcome to Covid-19 Effected Universe</marquee>

  <div>
    <header>
      <div>
        <h3 style="text-align:center">Welcome to</h3>
        <h3 style="text-align:center"> The Resource Directory</h3>
        <h6 style="text-align:center; font-size:20px"> OF</h6>
        <h1 style="text-align:center;"> The World Class BookShop </h1>
        <h3 style="text-align:center">For Year 2019</h3>
        <h3 style="text-align:center">University of Gujrat G.T. Road Campus</h3>
      </div>
    </header>
    <div>
      <div>
        <br>
        <div class="text-center">
          <p>
            @guest
            <pre><a class="btn btn-primary btn-lg " href="/login" role="button">Login</a>
            </pre>
            <span style="color: white; background-color:red; font-size:25px">Contact the Shopkeeper to get Account Access</span>
            @endguest
          </p>
        </div>
        <br><br>
      </div>
    </div>
@endsection
