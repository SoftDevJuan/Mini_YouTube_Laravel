<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = Video::where('status', '=', 1)
        ->join('users', 'users.id', '=', 'videos.user_id')
        ->select('videos.*', 'users.name', 'users.id as id_user', 'users.email')
        ->get();
        return view('home')->with('videos', $videos);
    }
}
