<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemasController extends Controller
{
    public function manageCinema()
	{
		$cinemas = Cinema::paginate(10);
		return view('admin.manage.cinema',compact('cinemas'));
	}

    public function createCinema()
	{
		return view('admin.cinema.addcinema');
	}
	public function storeCinema(Request $request)
	{
		$cinemas = new Cinema();
		$cinemas->cinema_name = $request->cinema_name;
		$cinemas->information = $request->information;
		$cinemas->save();

		return redirect("admin/cinema");
	}
    public function editCinema($id) {
        $cinema = Cinema::findOrFail($id);
		return view('admin.cinema.editcinema',compact('cinema'));
    }

    public function updateCinema(Request $request, $id ) {
        $cinema =  Cinema::findOrFail($id);
        $cinema->cinema_name = $request->cinema_name;
        $cinema->information = $request->information;
        $cinema->save();
        return redirect("admin/cinema");
    }

    public function deleteCinema($id) {
        Cinema::where('id',$id)->delete();
        return redirect('admin/cinema');
    }
}
