<?php

namespace App\Http\Controllers;

use App\Mobile;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobiles = Mobile::latest()->get();
        return view('mobile.index', compact('mobiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('mobile.insert', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required',
            'user' => 'required'
        ]);

        $mobile = new Mobile();
        $mobile->number = $request->phone;
        $mobile->user_id = $request->user;
        $mobile->save();

        Toastr::success('Number successfully saved...', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mobile = Mobile::findOrFail($id);
        return view('mobile.show', compact('mobile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobile = Mobile::findOrFail($id);
        return view('mobile.edit', compact('mobile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'phone' => 'required',
            'user' => 'required'
        ]);

        $mobile = Mobile::findOrFail($id);
        $mobile->number = $request->phone;
        $mobile->user_id = $request->user;
        $mobile->save();

        Toastr::success('Number successfully updated...', 'Success');
        return redirect(route('mobile.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobile = Mobile::findOrFail($id);
        $mobile->delete();

        Toastr::success('Number successfully deleted...', 'Success');
        return back();
    }
}
