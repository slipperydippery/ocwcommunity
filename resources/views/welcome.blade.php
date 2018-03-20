@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="embed-responsive embed-responsive-16by9">
                    <img src="/img/homevideo.jpg" alt="" class="embed-responsive-item">
                </div>
            </div>
        </div>
    </div>

    <div class="container segment segment--welcome">
        <div class="row card-group">
            <div class="col-sm-4">
                <div class="card">
                    <img class="card-img-top" src="/img/forum.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Forum</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href=" {{ URL::route('post.index') }} " class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <img class="card-img-top" src="/img/beslisboom.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Beslisboom</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <img class="card-img-top" src="/img/kennisbank.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Kennisbank</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


{{-- @section('additional-scripts')
@endsection --}}