@extends('master')
@section('content')
<div>

    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>List of Products</h4>
            <a href="ordernow" class="btn btn-success">Order Now</a> <br><br>
            @foreach($products as $item)
            <div class=" row search-item cart-list-devider">
                <div class="col-sm-3">
                    <a href="/detail/{{$item->id}}">
                        <img style="width:30%" class="" src="{{$item->gallery}}" />

                    </a>

                </div>
                <div class="col-sm-3">

                    <div>
                        <h4>{{$item->name}}</h4>
                        <h5>{{$item->description}}</h5>
                    </div>


                </div>
                <div class="col-sm-3">
                    <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning">Remove</a>

                </div>


            </div>
            @endforeach
            <a href="oedernow" class="btn btn-success">Order Now</a> <br><br>

        </div>
    </div>
</div>
@endsection