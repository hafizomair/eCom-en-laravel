@extends('master')
@section('content')
<div class="custom-product">

    <div class="col-sm-10">
        <table class="table">
            <thead>
                <tr>
                    <th>Amount</th>
                    <th>{{$total}}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tax</td>
                    <td>$ 0</td>
                </tr>
                <tr>
                    <td>Delievery</td>
                    <td>$ 10</td>
                </tr>
                <tr>
                    <td>Total Amount</td>
                    <td>${{$total+10}}</td>
                </tr>
            </tbody>
        </table>
        <div>
            <form action="/orderplace" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="address" class="form-control" placeholder="Enter your address here"></textarea>
                </div>
                <div class="form-group">
                    <label for="pwd">Payment Method:</label> <br>
                    <input type="radio" value="cash" name="payment"><span> Online Payment</span><br>
                    <input type="radio" value="cash" name="payment"><span> EMI Payment</span><br>
                    <input type="radio" value="cash" name="payment"><span> Cash on Delievery</span><br>
                </div>

                <button type="submit" class="btn btn-default">Order Now</button>
            </form>
        </div>

    </div>
</div>
@endsection