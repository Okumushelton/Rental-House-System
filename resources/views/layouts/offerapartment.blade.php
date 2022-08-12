<div class="modal off" id="offer">
  <div class="modal-background"></div>
  <div class="modal-card">
      <header class="modal-card-head">
          <p class="modal-card-title has-text-centered">Book Apartment</p>
          <button class="delete closeoffer" aria-label="close"></button>
      </header>
      <section class="modal-card-body">
      <p class="subtitle is-6 has-text-centered"><strong class="has-text-danger">Upon booking your property. You are expected to move in within a week. <br /> Failure, your property will be given to another client.</strong></p>
      <form action="/apartment/{{$apartment->id}}/book" method="post">
          @csrf
          <div class="field">
          <p class="modal-card-title has-text-centered"><b>Pay KShs. 3000 to book house</b></p>

              <div class="control column is-8 is-offset-2">
                  <h6>Enter Your Phone Number</h6>
                  <input class="input is-6" type="text" name="phone_number" placeholder="Enter phone number starting with 254">
                  <input name="propertyid" type="text" value="{{$apartment->property_id}}" hidden>
                  <input name="apartmentid" type="text" value="{{$apartment->id}}" hidden>
              </div>
          </div>
          <div class="field is-centered has-text-centered">
              <button type="submit" class="button is-info"><span class="savebutton">PAY VIA MPESA</span></button>
          </div>
      </form>
      </section>
      <footer class="modal-card-foot is-centered has-text-centered">
        <p class="subtitle is-7 has-text-centered">When making any payments we recommend that you have a verified method of contact of the payment receiver such as their home/business address or e-mail address.
        </p>
      </footer>v
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
