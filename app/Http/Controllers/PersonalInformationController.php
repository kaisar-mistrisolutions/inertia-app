<?php

namespace App\Http\Controllers;

use App\Models\PersonalInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Str;


class PersonalInformationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Dashboard',[
            'informations' => PersonalInformation::latest()->paginate(30),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'=>'required|string',
            'about'=>'required|string',
            'push_notifications'=>'required|string',
            'file_upload'=>'image|mimes:jpg,jpeg,png,gif'
        ]);
//
        $file=$request->file('file_upload');
        if (isset($file)){
           //create an unique name
           $fileName=Str::slug($request->name).uniqid().'.'.$file->getClientOriginalExtension();
        }

        PersonalInformation::create([
            'username'=>$request->username,
            'about'=>$request->about,
            'notification'=>$request->push_notifications,
            'image'=>$request->hasFile('file_upload')?$request->file('file_upload')->storeAs('personal',$fileName):null
        ]);

        return Redirect::route('pi.home')->with('success','form submited');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function show(PersonalInformation $information)
    {
            // return Inertia::render('Details',[
            //     'information'=>$information,
            // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonalInformation $information)
    {
        return Inertia::render('Details',[
            'information'=>$information,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonalInformation $information)
    {
        $request->validate([
            'username'=>'required|string',
            'about'=>'required|string',
            'push_notifications'=>'required|string'
        ]);
 
        $information->update([
            'username' => $request->username,
            'about' => $request->about,
            'notification' => $request->push_notifications
        ]);
 
        return Redirect::route('pi.home')->with('success','form submited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonalInformation $information)
    {
        $information->delete();
        return back()->with('success','Information request deleted');
    }
}
