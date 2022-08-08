<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RealProperty</title>

    <link rel="stylesheet" href="rent/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="rent/bootstrap/css/bootstrap-theme.min.css">

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
                @include('layouts.navapartment');
            </div>
        </div>
        <div class="container">
            <div class="columns is-mobile is-centered">
               <div class="column is-8 searchbox">
                   <h1 class="subtitle is-4 has-text-white searchboxtitletext">Search properties</h1>
                   <div class="tabs">
                    <ul>
                      <li class="deadtabitem">
                        <a href="/house">
                          <span class="has-text-white">Houses</span>
                        </a>
                      </li>

                      <li class="is-active has-background-primary tabitem">
                        <a href="/apartment">
                          <span class="has-text-white">Apartments</span>
                        </a>
                      </li>

                    </ul>
                  </div>

                  {{-- Search Box --}}
                <form method="POST" action="/apartment/search">
                  @csrf
                    <div class="field has-addons searchinput">
                        <p class="control has-icons-left is-expanded">
                          <input class="input is-large inputsearchbox" type="text" placeholder="Search by area name e.g Kileleshwa" id="search" name="searchquery">
                          <span class="icon is-small is-left">
                            <i class="fas fa-search"></i>
                          </span>
                        </p>
                        <div class="control">
                            <button class="button inputsearchbox is-primary is-large"><p class="subtitle is-6 has-text-white">Search</p></button>
                        </div>
                    </div>
                    <div class="is-hidden-touch">
                    <div class="field has-addons">
                        <div class="control has-icons-left">
                            <div class="select selectbox is-small">
                            <select name="minprice">
                                <option value="0">Price(Min)</option>
                                <option value="10000">10,000 KShs</option>
                                <option value="20000">20,000 KShs</option>
                                <option value="30000">30,000 KShs</option>
                                <option value="40000">40,000 KShs</option>
                                <option value="50000">50,000 KShs</option>
                                <option value="60000">60,000 KShs</option>
                                <option value="70000">70,000 KShs</option>
                                <option value="80000">80,000 KShs</option>
                                <option value="90000">90,000 KShs</option>
                                </select>
                            </div>
                            <span class="icon is-small is-left">
                              <i class="fas fa-dollar-sign"></i>
                            </span>
                        </div>
                        <div class="control has-icons-left">
                          <div class="select selectbox is-small">
                            <select name="maxprice">
                                <option value="9999999999999999999999999999999">Price(Max)</option>
                                <option value="20000">20,000 KShs</option>
                                <option value="30000">30,000 KShs</option>
                                <option value="40000">40,000 KShs</option>
                                <option value="50000">50,000 KShs</option>
                                <option value="60000">60,000 KShs</option>
                                <option value="70000">70,000 KShs</option>
                                <option value="80000">80,000 KShs</option>
                                <option value="90000">90,000 KShs</option>
                                <option value="90000">100,000 KShs</option>
                            </select>
                          </div>
                          <span class="icon is-small is-left">
                            <i class="fas fa-dollar-sign"></i>
                          </span>
                        </div>
                        <div class="control has-icons-left">
                          <div class="select selectbox is-small">
                            <select name="room">
                              <option value="0">Rooms</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">More</option>
                              </select>
                          </div>
                          <span class="icon is-small is-left">
                            <i class="fas fa-walking"></i>
                          </span>
                        </div>
                        <label class="checkbox checktext has-text-white">
                            <input type="checkbox" name="swimmingpool" value="yes">
                            Swimming pool
                        </label>
                        <label class="checkbox checktext has-text-white">
                            <input type="checkbox" name="balcony">
                            Balcony
                        </label>
                        <label class="checkbox checktext has-text-white">
                            <input type="checkbox" name="outdoor">
                            Outdoor area
                        </label>
                    </div>
                    <br>
                    </div>
                </form>
               </div>

            </div>
        </div>
    </div>

    <h3 class="title is-3 has-text-grey-darker has-text-centered">Apartments</h3>
        <p class="title is-6 has-text-white has-text-centered">Search for Apartment in areas within Nairobi, eg Kileleshwa<br />Booking Payment is done online. No cash is accepted </p>

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

      <script src="rent/bootstrap/js/jquery.js"></script>
        <script src="rent/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
