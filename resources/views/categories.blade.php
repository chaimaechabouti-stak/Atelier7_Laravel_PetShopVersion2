@extends('layouts.app')

@section('content')
<h2>Nos Catégories</h2>

<div class="row">
@foreach($categories as $key => $category)
    <div class="col-md-3">
        <div class="card mb-4">
            <div class="card-body text-center">
                <h5>{{ $category }}</h5>
                <a href="/products/{{ $key }}" class="btn btn-outline-success">
                    Voir produits
                </a>
            </div>
        </div>
    </div>
@endforeach
</div>
@endsection
