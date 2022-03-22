<?php

namespace App\Http\Controllers;

use App\Http\Requests\OffersRequest;
use App\Models\Offer;
use App\Traits\OfferTraits;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class OffersController extends Controller
{

    use OfferTraits;

    public  function __construct()
    {
    }

    public function getOffers(){
        return Offer::get();
    }


    public function getAllOffers(){

         $offers = Offer::get();
         return view('offers.all-offers',compact('offers'));
    }

    public function getAllOffersByLang(){

        $offersByLang = Offer::select('title_'.LaravelLocalization::getCurrentLocale().' as title', 'price')->get();
        return view('offers.all-offers-by-lang',compact('offersByLang'));
    }

    public function create(){
        return view('offers/new-offer');
    }

    public function store(OffersRequest $request){


        $fileName = $this->saveImage($request->photo, 'images/offers');
        //save user input to db
        Offer::create([
            'title_ar'=>$request->title_ar,
            'title_en'=>$request->title_en,
            'price'=>$request->price,
            'photo'=>$fileName,
        ]);

        return redirect()->back()->with('success', __('messages.Saved success'));

    }

    public function editOffer($offerId){
        $offer = Offer::find($offerId);
        if(!$offer)
        {
            return redirect()->back()->with('not-found','your Offer no longer found');
        }


        $offer = Offer::where('id', $offerId)->get()->first();
        return view('offers.edit-offer',compact('offer'));
    }

    public function updateOffer(OffersRequest $request, $offerId){
        Offer::where("id", $offerId)->update(
            [
                'title_ar'=>$request->title_ar,
                'title_en'=>$request->title_en,
                'price'=>$request->price,
            ]
        );
        return redirect()->back()->with('success', __('messages.Edited success'));

    }

    public function deleteOffer($offerId){

        $offer = Offer::find($offerId);
        if(!$offer)
        {
            return redirect()->back()->with('not-found','your Offer no longer found');
        }

        Offer::where('id',$offerId)->delete();

        return redirect()->route('offers.all')->with('success', 'Offer Deleted sucess!');

    }




}
