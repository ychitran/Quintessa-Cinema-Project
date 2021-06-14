<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Ad;
use App\Models\Cinema;
use App\Models\Film;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Screening;

class AdminController extends Controller
{
    public function homeAdmin() {
        return view('admin.home');
    }

    //CRUD Cinema
    public function manageCinema()
	{
		$cinemas = Cinema::paginate(10);
		return view('admin.manage.cinema',compact('cinemas'));
	}

    public function addCinemaPage()
	{
		return view('admin.cinema.addcinema');
	}
	public function addCinema(Request $request)
	{
		$cinemas = new Cinema();
		$cinemas->cinema_name = $request->cinema_name;
		$cinemas->infomation = $request->infomation;
		$cinemas->save();

		return redirect()->route('admin.managecinema');
	}
    public function editCinemaPage($id) {
        $cinema = Cinema::findOrFail($id);
		return view('admin.cinema.editcinema',compact('cinema'));
    }

    public function updateCinema(Request $request, $id ) {
        $cinema =  Cinema::findOrFail($id);
        $cinema->cinema_name = $request->cinema_name;
        $cinema->infomation = $request->infomation;
        $cinema->save();
        return redirect()->route('admin.managecinema');
    }

    //CRUD Film
    public function manageFilm()
	{
		$films = Film::orderby('id','desc')->paginate(10);
		return view('admin.manage.film',compact('films'));
	}

    public function addFilmPage()
	{
		return view('admin.film.addfilm');
	}
	public function addFilm(Request $request)
	{

		$films = new Film();
		$films->film_name = $request->film_name;
		$films->global_name = $request->global_name;
		if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $films->poster = $path;
        }

		$films->producer = $request->producer;
		$films->categories = $request->categories;
		$films->director = $request->director;
		$films->caster = $request->caster;
		$films->durations = $request->durations;
		$films->release_date = $request->release_date;
		$films->status = $request->status;
		
		$films->trailer=$request->trailer;
		$films->description = $request->description;
		$films->format_id = $request->format_id;
			$films->save();
		return redirect('admin/managefilm');

	}
	public function editFilmPage($id)
	{
		$film = Film::where('id',$id)->get();
		return view('admin.film.editfilm',compact('film'));
	}
	public function validationFilm(Request $request,$id)
	{
		$films = Film::where('id',$id)->update([
			'name'=>$request->name,
			'global_name'=>$request->global_name,
			'image'=>$request->image,
			'producer'=>$request->producer,
			'categories'=>$request->categories,
			'director'=>$request->director,
			'case'=>$request->case,
			'durations'=>$request->durations,
			'release_date'=>$request->release_date,
			'status'=>$request->status,
			'trailer'=>$request->trailer,
			'description'=>$request->description,
			'ticket_price'=>$request->ticket_price
		]);
		return redirect()->back()->with('message','Chỉnh Sửa Thành Công!');
	}
	public function deleteFilm($id)
	{
		Film::where('id',$id)->delete();
		return redirect()->route('admin.managefilm');
	}

    //CRUD Staff
    public function manageStaff()
	{
        $role = auth()->user()->role_id;
        if($role == 1) {
            $staffs = User::where('role_id','<>',1)->where('role_id','<>',null)->get(); 
        } elseif($role == 2) {
            $staffs = User::where('role_id',3)->get();
        }
		return view('admin.manage.staff',compact('staffs'));
	}

    public function addStaffPage()
	{
		return view('admin.cinema.addcinema');
	}
	public function addStaff(Request $request)
	{
		$user = new User();
		$user->full_name = $request->full_name;
		$user->email = $request->email;
        $user->password = bcrypt('123456');
		$user->phone_number = $request->phone_number;
		$user->role_id = $request->role_id;
		$user->cinema_id = $request->cinema_id;

		$user->save();

		return redirect();
	}
    public function editStaffPage($id) {
        $staff = User::where('id',$id)->get();
		return view('admin.staff.editstaff',compact('staff'));
    }

    public function updateStaff(Request $request, $id ) {
        $user =  User::findOrFail($id);
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone_number = $request->phone_number;
        $user->role_id = $request->role_id;
		$user->cinema_id = $request->cinema_id;
        $user->save();
        return redirect();
    }

    //Manage Revenue
    public function revenuePage(){

    }

    //Manage Ads
    public function manageAds() {
        $ads = Ad::all();
        return view('admin.manage.ads',compact('ads'));
    }

    public function saveAd(Request $request) {
        $ad = new Ad();
        $ad->company_name = $request->company_name;
        $ad->content = $request->content;
        $ad->contract_price = $request->contract_price;
        $ad->duration = $request->duration;
        $ad->start_time = $request->start_time;
        $ad->date_count = $request->date_count;
        $ad->save();
        return redirect('/admin/manage/ads');
    }

    public function addAdPage() {
        return redirect('admin/addads');
    }

	//CRUD Screening 
	public function manageScreening()
	{
		$screenings = Screening::all();
		return view('admin.manage.screenings',compact('screenings'));
	}

	public function addScreeningPage()
	{
		$films = Film::where('status','1')->get();
		$cinemas = Cinema::all();
		$rooms = Room::all();
		return view('admin.screening.addscreening',compact('films','cinemas','rooms'));
	}
	public function addScreening(Request $request)
	{
		$screenings= new Screening();
		$screenings->film_id = $request->film_id;
		$screenings->cinema_id = $request->cinema_id;
		$screenings->room_id = $request->room_id;
		$screenings->date = $request->date;
		$screenings->start_time = $request->start_time;
		$screenings->save();
		return;
	}

	public function editScreeningPage($id)
	{
		$screenings = Screening::where('id',$id)->get();
		return view('admin.screening.editscreening',compact('screenings'));
	}

	public function editScreening(Request $request,$id)
	{
		$screenings = Screening::findOrFail($id);
		$screenings->date = $request->date;
		$screenings->start_time = $request->start_time;
		$screenings->save();
		return redirect()->route('admin.managescreening');
	}
	public function deleteScreeningPage($id)
	{
		Screening::where('id',$id)->delete();
		return redirect()->route('admin.managescreening');
	}
}
