@extends('layouts.app')
@section('callToActionBtn')
  <div class="row justify-content-center">
    <a class="btn btn-primary text-white m-auto" href="/flowers/create" role="button">Insert Flower</a>
  </div>
@endsection
@section('title')
  Manage Flowers
@endsection
@section('content')
  @include('inc.search')
  @if(count($flowers) > 0)
    <div class="container">
      <div class="row justify-content-center">
        @foreach($flowers as $flower)
          <a href="#" class="text-decoration-none !important text-dark">
          <div class="card m-2" style="width: 15rem;height: 20rem">
            <div class="card-body">
              <h4 class="card-title text-center">{{$flower->name}}</h4>
              <img class="card-img-top" width="150" height="150" src="/storage/cover_image/{{$flower->cover_image}}" alt="Card image cap">
              <div class="card-body m-md-n3" style="height: 6rem">
                <p class="card-text">{{(substr($flower->desc, 0, 40)."...")}}</p>
              </div>
              <div class="row justify-content-center">
                <a href="/flowers/{{$flower->id}}/edit" class="btn btn-dark ml-sm-4 mr-auto">Update</a>
                <form action="/flowers/{{$flower->id}}" method="post">
                  {{ csrf_field() }}
                  @method('delete')
                  <input type="submit" class="btn btn-secondary mr-sm-4 ml-auto" value="Delete">
                </form>
              </div>
            </div>
          </div>
          </a>
        @endforeach
      </div>
    </div>
  @else
    <h3 class="row justify-content-center m-lg-5 text-danger">No Flowers Found!</h3>
  @endif
  <div class="row justify-content-center">
    @if(count($flowers) > 0)
      {{$flowers->links()}}
    @endif
  </div>
@endsection