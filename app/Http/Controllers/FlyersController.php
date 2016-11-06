<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;
use App\Flyer;

class FlyersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }
    public function create()
    {
        return view('flyers.create');
    }

    /**
     * @param FlyerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FlyerRequest $request)
    {
        Flyer::create($request->all());

        flash('Success!', 'Your flyer has been created!');

        return redirect()->back();
    }

    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street)->first();

        return view('flyers.show', compact('flyer'));
    }

    /**
     * @param $zip
     * @param $street
     * @param Request $request
     * @return string
     */
    public function addPhoto($zip, $street, Request $request)
    {
        $this->validate($request, [

            'photo' => 'require|mimes: jpg, jpeg, png, bmp'
        ]);
        $file = $request->file('photo');
        $name = time() . $file->getClientOriginalName();

        $file->move('flyers/photos', $name);

        $flyer = Flyer::locatedAt($zip, $street)->first();

        $flyer->photos()->create(['path' => "/flyers/photos/{$name}"]);
    }
}
