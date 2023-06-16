@extends('layout')
@section('content')

<div class="container">
    @if($errors->any())
        @foreach ($errors->all() as $item)
        <div class="alert alert-danger" role="alert">
            {{ $item }}
        </div>
        @endforeach
    @endif
</div>

<div class="container">
    <form method="post" action="{{ route('announces.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="titre" class="form-label">titre</label>
            <input type="text" class="form-control" id="titre" name="titre" />
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <input type="text" class="form-control" id="description" name="description" />
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">type</label>
            <select class="form-select" id="type" name="type">
                @for ($i = 0; $i < count(['Appartement', 'Maison', 'Villa', 'Magasin', 
                'Terrain']); $i++)
                    <option value='{{ ['Appartement', 'Maison', 'Villa', 'Magasin', 
                    'Terrain'][$i] }}' {{ $i==1?'selected':'' }}> {{ ['Appartement', 'Maison', 'Villa', 'Magasin', 
                        'Terrain'][$i] }} </option>
                @endfor
            </select>
        </div>

        <div class="mb-3">
            <label for="ville" class="form-label">ville</label>
            <input type="text" class="form-control" id="ville" name="ville" />
        </div>

        <div class="mb-3">
            <label for="neuf" class="form-label">neuf</label>
            <input type="number" class="form-control" id="neuf" name="neuf" />
        </div>

        <div class="mb-3">
            <label for="superficie" class="form-label">superficie</label>
            <input type="number" class="form-control" id="superficie" name="superficie" />
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">prix</label>
            <input type="number" class="form-control" id="prix" name="prix" />
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">image</label>
            <input type="file" class="form-control" id="image" name="image" />
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection