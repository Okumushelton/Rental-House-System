<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Article;
use App\House;
use App\Page;
use App\User;
use Auth;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only([
            'profile', 'changePassword', 'editAccount', 'favorites',
            'viewMessage', 'myMessage', 'myhouse', 'myapartment', 'myland', 'mybuilding', 'mywarehouse', 'deleteaccount', 'addProperty', 'addHouse', 'addBuilding', 'addLand', 'addApartment', 'addWarehouse',
        ]);
    }
    public function index()
    {
        $articles = Article::limit(3)->orderBy('id', 'desc')->get();
        return view('layouts.master', compact('articles'));
    }

    public function house()
    {
        $articles = Article::limit(3)->orderBy('id', 'desc')->get();
        return view('layouts.house', compact('articles'));
    }

    public function apartment()
    {
        $articles = Article::limit(3)->orderBy('id', 'desc')->get();
        return view('layouts.apartment', compact('articles'));
    }
    public function about()
    {
        return view('layouts.aboutus');
    }

    public function contactus()
    {
        return view('layouts.contactus');
    }

    //Logout Route
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    // Search Result Methods
    public function searchHouse()
    {
        $houses = House::all();
        return view('results.houseresult', compact('houses'));
    }

    public function apartmentsearch()
    {
        $apartments = Apartment::all();
        return view('results.apartmentresult', compact('apartments'));
    }

    // Profile Page Methods

    public function changePassword()
    {
        return view('profile.home', array('user' => Auth::user()));
    }

    public function editAccount()
    {
        return view('profile.home', array('user' => Auth::user()));
    }

    public function deleteaccount()
    {
        return view('profile.home', array('user' => Auth::user()));
    }

    public function myHouse()
    {
        $userId = auth()->id();
        $houses = House::whereHas('property', function ($query) use ($userId) {

            $query->where('assigned_to', '=', $userId);

        })->paginate(15);

        return view('profile.home', compact('houses'), array('user' => Auth::user()));
    }

    public function myApartment()
    {
        $userId = auth()->id();
        $apartments = Apartment::whereHas('property', function ($query) use ($userId) {

            $query->where('assigned_to', '=', $userId);

        })->paginate(15);

        return view('profile.home', compact('apartments'), array('user' => Auth::user()));
    }

    // Add Propperties Methods
    public function addProperty()
    {
        return view('layouts.addproperty', array('user' => Auth::user()));
    }
    public function addHouse()
    {
        return view('layouts.property.addhouse', array('user' => Auth::user()));
    }

    public function addApartment()
    {
        return view('layouts.property.addapartment', array('user' => Auth::user()));
    }

    // public function addApartment()
    // {
    //     return view('layouts.property.apartment', array('user' => Auth::user()));
    // }

    public function dismap()
    {
        return view('layouts.property.map', array('user' => Auth::user()));
    }

    public function viewpost()
    {
        return view('results.view');
    }

    //Blog

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
