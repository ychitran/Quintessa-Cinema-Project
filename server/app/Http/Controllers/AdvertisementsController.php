<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdvertisementsController extends Controller
{
    public function manageAds() {
        $ads = Ad::all();
        return view('admin.manage.advertisement',compact('ads'));
    }

    public function storeAd(Request $request) {
        $ad = new Ad();
        $ad->company_name = $request->company_name;
        $ad->content = $request->content;
        $ad->contract_price = $request->contract_price;
        $ad->duration = $request->duration;
        $ad->start_time = $request->start_time;
        $ad->date_count = $request->date_count;
        $ad->save();
        return redirect('admin/advertisement');
    }

    public function createAd() {
        return view('admin.advertisement.addads');
    }

	public function editAd($id) {
		$ad = Ad::findOrFail($id);
		return view('admin.advertisement.editads',compact('ad'));
	}

	public function updateAd($request, $id) {
		$ad = Ad::where('id',$id)->update([
		'company_name' => $request->company_name,
        'content' => $request->content,
        'contract_price' => $request->contract_price,
        'duration' => $request->duration,
        'start_time' => $request->start_time,
        'date_count' => $request->date_count
		]);
		return redirect('admin/advertisement');
	}

    public function deleteAd($id){
        Ad::where('id',$id)->delete();
		return redirect('admin/advertisement');
    }
}
