@extends('master')
@section('content')
<div>

    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>My Orders</h4>

            @foreach($orders as $item)
            <div class=" row search-item cart-list-devider">
                <div class="col-sm-3">
                    <a href="/detail/{{$item->id}}">
                        <img style="width:30%" class="" src="{{$item->gallery}}" />

                    </a>

                </div>
                <div class="col-sm-3">

                    <div>
                        <h4>Name:{{$item->name}}</h4>
                        <h5>Delievery Status:{{$item->status}}</h5>
                        <h5>Address:{{$item->address}}</h5>
                        <h5>Payment Status:{{$item->payment_status}}</h5>
                        <h5>Payment Method:{{$item->payment_method}}</h5>
                    </div>


                </div>



            </div>
            @endforeach


        </div>
    </div>
</div>
@endsection