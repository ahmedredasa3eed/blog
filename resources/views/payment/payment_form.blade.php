@extends('layouts.app')

@section('content')

    @if(isset($checkoutId) && isset($offer_id))
    <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{$checkoutId}}"></script>

    <form action="{{route('ajax-offer.details',$offer_id)}}" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form>
    @endif
@stop
