<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us - Rental House</title>

    {{-- CSS Files --}}
    <link rel="stylesheet" href="/css/bulma.min.css">
    <link rel="stylesheet" href="/css/custom.css"> {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600" rel="stylesheet">
</head>

<body>

    <div class="column is-full is-mobile backgroundimg">
        <div class="container">
            <div class="column is-mobile is-centered">
                @include('layouts.navabout');
            </div>
        </div>

    </div>

    {{-- Deatils Section --}}
    <div class="columns is-mobile is-centered has-background-white">
        <div class="container has-text-centered aboutus has-text-dark">
            {{-- <img class="image face" src="/img/nyumba.png"> --}}
            <div class='equal-height'>
                <div class='is-flex is-horizontal-center'>
                    <figure class=''><img class="image face" src='/img/nyumba1.png' width="250" height="400"></figure> <!-- vector.jpg -->
                </div>
            </div>
            <br>
            <h3 class="title is-3 has-text-grey-darker has-text-centered">Hyrax Online Rental House Booking</h3>

            <p>Welcome to Hyrax Online Rental House Booking, <br /> Your number one source for all things rental property. We're dedicated to giving you the very best of rental property, with a focus on speed, trust, efficiency.
                <br>

                <p>Founded in 2022 by Okumu Shelton, Hyrax has come a long way from its beginnings in January 2022. When Shelton first started out, his passion for fast and trustworthy drove him to do tons of search so that Rental Property can offer you the world's most advanced Rental Housing search engine.
                    Hyrax now serves customers all over the world, and are thrilled that we're able to turn our passion into our own website.</p>
                <br>
                <p>We hope you enjoy our service as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.</p>
                <br>
                <p><i><b>Okumu K. Shelton</b></i></p>
        </div>
    </div>

    {{-- Deatils Section  --}}
    <div class="columns is-mobile is-centered details">
      <div class="column"></div>

      <div class="has-text-centered indexicon">
                <span class="icon has-text-white is-large">
                  <i class="fas fa-home fa-5x"></i><br />
                  <span class="icon has-text-black is-large">
                  <i class="fas fa-home fa-5x"></i>
                </span>
                </span>

                {{-- Footer --}}
    @include('layouts.footer')


      {{-- JavaScript Files --}}
            </div>

      <div class="column"></div>
    </div>
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/fontawesome.js"></script>
</body>

</html>
