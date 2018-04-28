<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Donation;

class DonationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donations['donations'] = Donation::orderBy('created_at', 'desc')->paginate(10);      
        return view('donations.index', $donations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donations.create');
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
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'goods_name' => 'required',
            'description' => 'nullable',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        
        //Handle Upload
        if($request->hasFile('cover_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //File name to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        Donation::create([
            'name' => $request -> name,
            'address' => $request -> address,
            'phone_number' => $request -> phone_number,
            'email' => $request -> email,
            'goods_name' => $request -> goods_name,
            'description' => $request -> description,
            'cover_image'=> $fileNameToStore
        ]);

        return redirect('/donations')->with('success', 'Donation Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donation['donation'] = Donation::find($id);
        if(isset($donation['donation']))
            return view('donations.show',$donation);
        else
            return redirect('/donations')->with('error','Donation does not exists.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donation['donation'] = Donation::find($id);

        return view('donations.edit',$donation);
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
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'goods_name' => 'required',
            'description' => 'nullable',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle Upload
        if($request->hasFile('cover_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //File name to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        if($request->hasFile('cover_image')){
            Donation::find($id)->update([
                'name' => $request -> name,
                'address' => $request -> address,
                'phone_number' => $request -> phone_number,
                'email' => $request -> email,
                'goods_name' => $request -> goods_name,
                'description' => $request -> description,
                'cover_image'=> $fileNameToStore
            ]);
        } else {
            Donation::find($id)->update([
                'name' => $request -> name,
                'address' => $request -> address,
                'phone_number' => $request -> phone_number,
                'email' => $request -> email,
                'goods_name' => $request -> goods_name,
                'description' => $request -> description,
            ]);
        }
        return redirect('/donations')->with('success', 'Donation Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donation = Donation::find($id);
        if($donation->cover_image != 'noimage.jpg'){
            //Delete image
            Storage::delete('public/cover_images/'.$donation->cover_image);
        }
        Donation::destroy([$id]);

        return redirect('/donations')->with('success', 'Donation Removed');
    }
}
