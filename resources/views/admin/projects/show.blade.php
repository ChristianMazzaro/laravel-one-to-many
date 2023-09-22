@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{$project->title}}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{$project->slug}}</h6>
                  <p class="card-text">{{$project->content}}</p>
                  <a href="#" class="card-link">Bottone 1</a>
                  <a href="#" class="card-link">Bottone 2</a>
                </div>
              </div>
        </div>
    </div>
@endsection