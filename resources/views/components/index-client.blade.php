@props(['clients'])
<section id="clients" class="clients section light-background">
  <div class="container" data-aos="fade-up">
    <div class="scroller-wrapper">
      <div class="d-flex gy-4 scroller">
        @forelse ($clients as $client)
          <img src="{{ asset('storage/' . $client->image) }}" width="150px" class="d-block mb-2">
        @empty
          <p>Clients not available.</p>
        @endforelse
        
        <!-- Duplicate the images for seamless looping -->
        @foreach ($clients as $client)
          <img src="{{ asset('storage/' . $client->image) }}" width="150px" class="d-block mb-2">
        @endforeach
        <!-- Duplicate the images for seamless looping -->
        @foreach ($clients as $client)
          <img src="{{ asset('storage/' . $client->image) }}" width="150px" class="d-block mb-2">
        @endforeach
        <!-- Duplicate the images for seamless looping -->
        @foreach ($clients as $client)
          <img src="{{ asset('storage/' . $client->image) }}" width="150px" class="d-block mb-2">
        @endforeach
        <!-- Duplicate the images for seamless looping -->
        @foreach ($clients as $client)
          <img src="{{ asset('storage/' . $client->image) }}" width="150px" class="d-block mb-2">
        @endforeach
        <!-- Duplicate the images for seamless looping -->
        @foreach ($clients as $client)
          <img src="{{ asset('storage/' . $client->image) }}" width="150px" class="d-block mb-2">
        @endforeach
        <!-- Duplicate the images for seamless looping -->
        @foreach ($clients as $client)
          <img src="{{ asset('storage/' . $client->image) }}" width="150px" class="d-block mb-2">
        @endforeach
        <!-- Duplicate the images for seamless looping -->
        @foreach ($clients as $client)
          <img src="{{ asset('storage/' . $client->image) }}" width="150px" class="d-block mb-2">
        @endforeach
        <!-- Duplicate the images for seamless looping -->
        @foreach ($clients as $client)
          <img src="{{ asset('storage/' . $client->image) }}" width="150px" class="d-block mb-2">
        @endforeach
        <!-- Duplicate the images for seamless looping -->
        @foreach ($clients as $client)
          <img src="{{ asset('storage/' . $client->image) }}" width="150px" class="d-block mb-2">
        @endforeach
        <!-- Duplicate the images for seamless looping -->
        @foreach ($clients as $client)
          <img src="{{ asset('storage/' . $client->image) }}" width="150px" class="d-block mb-2">
        @endforeach
      </div>
    </div>
  </div>
</section>