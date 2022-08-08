<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hyrax Renting Business</title>

    {{-- CSS Files --}}
    <link rel="stylesheet" href="/css/bulma.min.css">
    <link rel="stylesheet" href="/css/custom.css">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600" rel="stylesheet">
</head>
<body>

    <div class="column is-full is-mobile backgroundimg">
        <div class="container">
            <div class="column is-mobile is-centered">
                @include('layouts.navmaster');
            </div>
        </div>
        <div class="container">

        {{-- Photo Frame Section --}}
        <div class="columns">
        <div class="column image is-2by1 childrenimg">

        </div>
        <div class="column colorred">
            <h2 class="title is-1 has-text-white has-text-centered maketheir">Find Your Desired Home</h2>
            <h6 class="title is-2 has-text-white has-text-centered ">Looking For a Rental House?</h6>
            <p class="control has-text-centered"><br />
            <a class="button is-primary is-inverted has-text-centered is-outlined signbuttonbelow" href="register">
                <span>SIGN UP</span>
                </a>
            </p>
        </div>
        </div>
        </div>
    </div>

    <h3 class="title is-3 has-text-grey-darker has-text-centered">Hyrax Online Rental House Booking</h3>
                 <h4 class="title is-5 has-text-white has-text-centered">
                    Got Lost?
                 </h4>
                 <br>
                 <p class="has-text-white has-text-centered">
                    Just search for either houses or apartments in their respective categories from areas around Nairobi. <br /> For Example, Embaasi, all property in the area will be listed and you book at the comfort of your phone or computer without much traveling to the place.
                 </p>


    {{-- Deatils Section  --}}
    <div class="columns is-mobile is-centered details">
      <div class="column"></div>
      <div class="column has-text-centered">
        <span class="is-centered has-text-success">
          <i class="fas fa-home fa-5x"></i>
        </span>
        {{-- Footer --}}
    @include('layouts.footer')
      </div>
      <div class="column"></div>
    </div>

      {{-- JavaScript Files --}}
      <script src="/js/jquery-3.3.1.min.js"></script>
      <script src="/js/fontawesome.js"></script>
</body>
</html>



