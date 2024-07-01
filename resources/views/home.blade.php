@extends('base')

@section('content')

  {{-- <x-alert type="danger" class="fw-bold">
    Des informations
  </x-alert> --}}
  {{-- <x-weather></x-weather> --}}

  <div class="bg-light p-5 mb-5 text-center">
    <div class="container">
      <h1>Agence lorem ipsum</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Vero veniam sapiente eum placeat expedita nobis reiciendis 
        nisi fuga odio temporibus animi libero nihil enim ex, 
        quia voluptatem mollitia neque ipsam.</p>
    </div>
  </div>

  <div class="container">
    <h2>Nos derniers biens</h2>
    <div class="row">
      @foreach ($properties as $property)
        <div class="col">
          @include('property.card')
        </div>
      @endforeach
    </div>
  </div>
@endsection