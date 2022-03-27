@extends('layouts/app')

@section('content')
    <div class="row" style="justify-content:center;">

        @if(Session::has('success'))
            <p>{{Session::get('success')}}</p>
        @endif

            @if(Session::has('error'))
                <p>{{Session::get('error')}}</p>
            @endif

        @if(isset($offer))
        <div class="col-lg-6">
            <div class="">
                <div class="card-body">
                    <h1>{{$offer->title_ar}}</h1>
                    <p id="offer_price">{{$offer->price}}</p>
                    <p id="offer_id">{{$offer->id}}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="">
                <div class="card-body">
                    <img src="{{asset('images/offers/'.$offer->photo)}}">
                </div>
            </div>
        </div>

        <div class="col-lg-6">


            <a href="{{url('checkout/'.$offer->id.'/'.$offer->price)}}" class="btn btn-success">شراء</a>
        </div>
        @endif
    </div>
    @stop

<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>-->

<!--<script>
    $(document).on('click','#checkout_btn',function (e){
        e.preventDefault();

        $.ajax({
            'type':'get',
            'url':'{{--route('offers.checkout')--}}',
            'data': {
                offer_price : $('#offer_price').text(),
                offer_id : $('#offer_id').text(),
            },

        });
    })
</script>-->
