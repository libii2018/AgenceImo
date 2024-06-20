@extends('admin.admin')

@section('title', $property->exists ? "Editer un bien" : "Creer un bien")

@section('content')

<h1>@yield('title')</h1>

<form action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store') }}" method="post">
  @csrf
  @method($property->exists ? 'put' : 'post')
  <div class="row">
    @include('shared.input', ['class' => 'col', 'label' => 'Titre', 'name' => 'title', 'value' => $property->title])
    <div class="col row">
      @include('shared.input', ['class' => 'col', 'name' => 'surface', 'value' => $property->surface])
    </div>
  </div>
  <div>
    <button class="btn btn-primary">
      @if($property->exists)
        Modifier
      @else
        Creer
      @endif
    </button>
  </div>
</form>

@endsection