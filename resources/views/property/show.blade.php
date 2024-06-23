@extends('base')

@section('title', $property->title)

@section('content')
  <div class="container mt-4">
    <h2>{{ $property->title }}</h2>
    <h2>{{ $property->rooms }} pieces - {{ $property->surface }}</h2>

    <div class="text-primary fw-bold" style="font-size: 4rem;">
      {{ number_format($property->price, thousands_separator: ' ') }}
    </div>

    <hr>

    <div class="mt-4">
      <h4>Interesse par ce bien ?</h4>
      @include('shared.flash')
      <form action="{{ route('property.contact', $property) }}" method="post">
        @csrf
        <div class="row">
          @include('shared.input', ['class' => 'col', 'name' => 'firstname', 'label' => 'Prenom'])
          @include('shared.input', ['class' => 'col', 'name' => 'lastname', 'label' => 'Nom'])
        </div>
        <div class="row">
          @include('shared.input', ['class' => 'col', 'name' => 'phone', 'label' => 'Telephone'])
          @include('shared.input', ['type' => 'email', 'class' => 'col', 'name' => 'email', 'label' => 'Email'])
        </div>
        @include('shared.input', ['type' => 'textarea', 'class' => 'col', 'name' => 'message', 'label' => 'Votre message'])
        <button>
          <div class="btn btn-primary">Nous contacter</div>
        </button>
      </form>
    </div>
    <div class="mt-4">
      <p>{!! nl2br($property->description) !!}</p>
      <div class="row">
        <div class="col-8">
          <h2>Carateristique</h2>
          <table class="table table-striped">
            <tr>
              <td>Surface habitation</td>
              <td>{{ $property->surface }}</td>
            </tr>
            <tr>
              <td>Pieces</td>
              <td>{{ $property->rooms }}</td>
            </tr>
            <tr>
              <td>Chambres</td>
              <td>{{ $property->bedrooms }}</td>
            </tr>
            <tr>
              <td>Etages</td>
              <td>{{ $property->floor ?: "Rez de chausse" }}</td>
            </tr>
            <tr>
              <td>Localisation</td>
              <td>
                {{ $property->address }} <br>
                {{ $property->city }}-{{ $property->postal_code }}
              </td>
            </tr>
          </table>
        </div>
        <div class="col-4">
          <h2>Specificites</h2>
          <div class="list-group">
            @foreach ($property->options as $option)
              <li class="list-group-item">{{ $option->name }}</li>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection