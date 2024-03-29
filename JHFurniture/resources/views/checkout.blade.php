@extends('layouts.app')

@section('content')
<div class="pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                <!-- Shopping cart table -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="p-2 px-3 text-uppercase">Furniture Image</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="p-2 px-3 text-uppercase">Furniture Name</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Price</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Quantity</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Total</div>
                                </th>


                            </tr>
                        </thead>
                        <tbody>
                            @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                            <tr>
                                <th scope="row" class="border-0">
                                    <div class="p-2">
                                        <img src="{{Storage::url($details['furnitureImage']) }}" alt=""
                                            style="height: 100px; width: 150px;" class="img-fluid rounded shadow-sm">
                                        <div class="ml-3 d-inline-block align-middle">
                                        </div>
                                    </div>
                                </th>
                                <td class="border-0 align-middle"><strong>{{$details['furnitureName']}}</strong></td>

                                <td class="border-0 align-middle"><strong>{{$details['furniturePrice']}}</strong> <input
                                        type="hidden" class="price" value="{{$details['furniturePrice']}}"></td>

                                <td class="border-0 align-middle"><strong>{{$details['quantity']}}</strong> <input
                                        type="hidden" class="price" value="{{$details['furniturePrice']}}"></td>
                                <td class="border-0 align-middle subTotal">{{$details['quantity'] *
                                    $details['furniturePrice']}}</td>





                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- End -->
            </div>
        </div>
        <form action="/checkout" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row py-5 p-4 bg-white rounded shadow-sm">

                <div class="col-lg-6">
                    <div class="p-4">
                        <ul class="list-unstyled mb-4">

                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                    class="text-muted">Total</strong>
                                <h5 class="font-weight-bold">{{$total}}</h5>
                            </li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                    class="text-muted">Payment Method</strong>
                                <h5 class="font-weight-bold"></h5>
                                <input type="radio" id="html" name="method" value="Credit">
                                  <label for="html">Credit</label><br>
                                  <input type="radio" id="css" name="method" value="Debit">
                                  <label for="css">Debit</label><br>
                            </li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                    class="text-muted">Card Number</strong>
                                <h5 class="font-weight-bold"></h5>
                                <input type="text" name="cardNumber" placeholder="Enter Card Number"
                                    class="form-control input-group  border rounded-pill " required />

                            </li>
                        </ul>
                        <button type="submit" class="btn rounded-pill bg-dark "
                            style="width: 20rem; color: white; margin-left:5rem;">Checkout</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection