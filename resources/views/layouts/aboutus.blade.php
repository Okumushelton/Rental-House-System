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
                    <figure class=''><img class="image face" src='/img/vector.jpg' width="250" height="400"></figure>
                </div>
            </div>
            <br>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br />
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, <br />
            when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br />
            It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. <br />
            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
            <br /> and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                <p><i><b>This is Sample Text</b></i></p>
        </div>
    </div>

    {{-- Footer --}} @include('layouts.footer') {{-- JavaScript Files --}}
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/fontawesome.js"></script>
</body>

</html>
