@extends('master')
@section('content')

<div class="container custom-product">
    <div class="col-sm-4">
        <a href="#">Filter</a>
    </div>
    <div class="col-sm-4">
        <div class="trending-wrapper">
            <h4>Search Results</h4>
            @foreach($products as $item)
            <div class="searched-item">
                <a href="detail/{{$item['id']}}">
                    <img class="trending-image" src="{{$item['gallery']}}">
                    <div class="">
                        <h3>{{$item['name']}}</h3>
                        <h5>{{$item['description']}}</h5>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>


</div>

@endsection