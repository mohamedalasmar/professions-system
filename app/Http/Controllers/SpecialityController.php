<?php

namespace App\Http\Controllers;

use App\Models\Specaility;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Specaility::all();
        // return response()->view('cms.specialties.index', ['specialities' => $data]);

        $data = Specaility::withCount('professions')->get();
        return response()->view('cms.specialties.index',['specialities'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.specialties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());
        $request->validate([
            'title_en' => 'required|string|min:3|max:50',
            'title_ar' => 'required|string|min:3|max:50',
            'active'=> 'in:on',
        ],
        [
                'title_en.required' => 'Please , Enter English Title',
                'title_ar.required' => 'Please , Enter Arabic Title'
        ]
    );

        $speciality = new Specaility();
        $speciality->title_en = $request->get('title_en');
        $speciality->title_ar = $request->get('title_ar');
        $speciality->active = $request->has('active') ? true : false ;
        $isSaved = $speciality->save();

        session()->flash('message', $isSaved ? "Speciality Created Successfully" : "Speciality Created Failed");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $speciality = Specaility::findOrFail($id);
        return response()->view('cms.specialties.edit',['speciality'=>$speciality]);
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
        //
        $speciality = Specaility::findOrFail($id);
        $request->validate([
            'title_en' => 'required|min:3|max:50',
            'title_ar' => 'required|min:3|max:50',
            'active'=> 'in:on',
        ]);

        $speciality->title_en = $request->get('title_en');
        $speciality->title_ar = $request->get('title_ar');
        $speciality->active = $request->has('active') ? true : false;
        $isUpdated = $speciality->save();
        session()->flash('message',$isUpdated ? "Update Successfully":"Failed To Update");
        return redirect()->back();

        // return redirect()->route("specialities.index");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // FORM SUBMIT
        // $speciality = Specaility::findOrFail($id);
        // $speciality->delete();
        // return redirect()->back();

        //JS
        // $id=$request->id;
        // $speciality = Specaility::findOrFail($id);
        //   if(isset($speciality)){
        //     $speciality->delete();
        //     return response()->json(['icon' => 'success', 'title' => 'Deleted successfully'], 200);
        //   }else{
        //     return response()->json(['icon' => 'error', 'title' => 'Failed to delete'], 400);
        //   }
        $speciality = Specaility::findOrfail($id);
        $isDestroied = $speciality->destroy();
        if ($isDestroied) {
            return response()->json(['icon' => 'success', 'title' => 'Deleted successfully'], 200);
        } else {
            return response()->json(['icon' => 'error', 'title' => 'Failed to delete'], 400);
        }
    }
}
