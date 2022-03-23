<?php

namespace App\Http\Controllers;

use App\Http\Requests\OffersRequest;
use App\Models\Offer;
use App\Traits\OfferTraits;
use Illuminate\Http\Request;

class OfferAjaxController extends Controller
{
    use OfferTraits;

    public function create(){
        return view('offers-ajax.new-offer');
    }

    public function store(OffersRequest $request){

        $fileName = $this->saveImage($request->photo, 'images/offers');
        //save user input to db
        $offerSaved = Offer::create([
            'title_ar'=>$request->title_ar,
            'title_en'=>$request->title_en,
            'price'=>$request->price,
            'photo'=>$fileName,
        ]);

        if($offerSaved)
        return response()->json([
            'status'=> true,
                'msg' => 'تم الحفظ بنجاح'
            ]
        );
        else
            return response()->json([
                    'status'=> false,
                    'msg' => 'حدث خطأ'
                ]
            );
    }

    public function show(){
        $offers = Offer::paginate(PAGINATION_COUNT);
        return view('offers-ajax.all-offers',compact('offers'));
    }

    public function delete(Request $request){
        $offer = Offer::find($request->id);
        if(!$offer)
            return response()->json([
                'status'=>false,
                'msg'=>'offer not found',
            ]);

        $offer_deleted = Offer::where('id',$request->id)->delete();

        if($offer_deleted){
            return response()->json([
                'status'=>true,
                'msg'=>'offer deleted successfully',
                'id'=>$request->id,
            ]);
        }
        else{
            return response()->json([
                'status'=>false,
                'msg'=>'offer deleted Fails',
            ]);
        }

    }

    public function edit($offerId){
        $offer = Offer::find($offerId);
        if(!$offer)
        {
            return response()->json([
                'status'=>false,
                'msg'=>'offer not found',
            ]);
        }


        $offer = Offer::where('id', $offerId)->get()->first();
        return view('offers-ajax.edit-offer',compact('offer'));
    }

    public function update(OffersRequest $request){

        $offer = Offer::find($request->id);

        if(!$offer)
            return response()->json([
                'status'=>false,
                'msg'=>'offer not found',
            ]);

        $fileName = $this->saveImage($request->photo, 'images/offers');
        $offerUpdated = Offer::where("id", $request->id)->update(
            [
                'title_ar'=>$request->title_ar,
                'title_en'=>$request->title_en,
                'price'=>$request->price,
                'photo'=>$fileName,
            ]
        );

        if($offerUpdated)
            return response()->json([
                    'status'=> true,
                    'msg' => 'تم التعديل بنجاح'
                ]
            );
        else
            return response()->json([
                    'status'=> false,
                    'msg' => 'حدث خطأ'
                ]
            );

    }



}
