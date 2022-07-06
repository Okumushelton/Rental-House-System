<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book House</title>

    {{-- CSS Files --}}
    <link rel="stylesheet" href="/css/bulma.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/bootstrap.css"> {{-- Google Fonts --}}
    <link
        href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600"
        rel="stylesheet">
    <style>
        #map {
            height: 300px;
        }
    </style>
</head>

<body>

<!-- <form method="POST" action="" enctype="multipart/form-data"> -->
<div class="modal off" id="offer">
  <div class="modal-background"></div>
  <div class="modal-card">
      <header class="modal-card-head">
          <p class="modal-card-title has-text-centered">BOOK PROPERTY</p>
          <button class="delete closeoffer" aria-label="close"></button>
      </header>



      <section class="modal-card-body">
      <p class="subtitle is-6 has-text-centered"><strong class="has-text-danger">Upon booking your property. You are expected to move in within a week. <br /> Failure, your property will be given to another client.</strong></p>
      <form action="/house/{{$house->id}}/book" method="post">
          @csrf
          <div class="field">
                <!-- <div class="control column is-8 is-offset-2">
                  <input class="input is-7" type="number" name="amount" placeholder="Enter Amount" >
                  <input name="propertyid" type="text" value="{{$house->property_id}}" hidden>
                  <input name="houseid" type="text" value="{{$house->id}}" hidden>
              </div> -->
              <p class="modal-card-title has-text-centered"><b>Pay KShs. 500 to book house</b></p>

              <div class="control column is-8 is-offset-2">
                  <input class="input is-7" type="number" name="phone_number" placeholder="Enter Phone number starting with 254">
                  <input name="propertyid" type="text" value="{{$house->property_id}}" hidden>
                  <input name="houseid" type="text" value="{{$house->id}}" hidden>
              </div>
          </div>
          <div class="field is-centered has-text-centered">
              <button type="submit" class="button is-info" action=""><span class="savebutton">Submit</span></button>
          </div>
      </form>
      </section>
      <footer class="modal-card-foot is-centered has-text-centered">
        <p class="subtitle is-7 has-text-centered">If making any payments we recommend that you have two permanent & verified methods of contact of the payment receiver such as their phone number and email address.
        </p>
      </footer>
  </div>
</div>

{{-- JS Script for popup --}}
<script>
  var modal = document.getElementById('offer');
  var btn = document.getElementById("myBtn");
  var span = document.getElementsByClassName("closeoffer")[0];
  btn.onclick = function() {
      document.querySelector('.off').style.display = 'block';
  }
  span.onclick = function() {
      document.querySelector('.off').style.display = 'none';
  }
  window.onclick = function(event) {
      if (event.target == modal) {
          document.querySelector('.off').style.display = 'none';
      }
  }
</script>
{{-- Tablet View Submit --}}
<script>
  var modal = document.getElementById('offer');
  var btn = document.getElementById("myBtnM");
  var span = document.getElementsByClassName("closeoffer")[0];
  btn.onclick = function() {
      document.querySelector('.off').style.display = 'block';
  }
  span.onclick = function() {
      document.querySelector('.off').style.display = 'none';
  }
  window.onclick = function(event) {
      if (event.target == modal) {
          document.querySelector('.off').style.display = 'none';
      }
  }
</script>
