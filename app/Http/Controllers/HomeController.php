<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function save()
    {
        $file = request()->file('image');
        $md5  = md5_file($file->path());

        // cleanup
        if (auth()->user()->image_md5_sum) {
            Storage::delete(auth()->user()->image_md5_sum . '.png');
        }

        // move image to public space
        $file->move(public_path('images'), $md5 . '.png');

        /*
         * could also save as use id to auto clean up old images.
         * just remember to update the home.blade.php img tag to look like this
         * <img src="{{asset('images/' . auth()->id()) }}.png" alt="{{auth()->user()->image_name}}"/>
         */
//        $file->move(public_path('images'), auth()->id() . '.png');

        // save image stuff
        auth()->user()->update(['image_md5_sum' => $md5, 'image_name' => $file->getClientOriginalName()]);

        return redirect()->back();
    }
}
