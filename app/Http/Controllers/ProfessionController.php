<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use App\Models\Specaility;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professions  = Profession::with('specaility')->get();
        return response()->view('cms.professions.index',['professions'=>$professions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $specailities = Specaility::where('active', true)->get();
        $specailities = Specaility::get();
        return response()->view("cms.professions.create",['specailities'=>$specailities]);
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
        $validator = validator([
            'title_en'=>'required|string|min:3|max:35',
            'title_ar' => 'required|string|min:3|max:35',
            'speciality_id'=>'required|numric|exists:speailities,id'
        ]);
        if(!$validator->fails()){
            $profession = new Profession();
            $profession->title_en = $request->get('title_en');
            $profession->title_ar = $request->get('title_ar');
            $profession->specaility_id = $request->get('specaility_id');

            $isSaved = $profession->save();
            return response()->json(["message"=>$isSaved ?"Stored Successfully":"Failed To Restore"], $isSaved ?200 :400);
        }else{
            return response()->json(['message'=>$validator->getMessageBag()->first],400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function show(Profession $profession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function edit(Profession $profession)
    {
        //
        $specailities = Specaility::get();
        return response()->view('cms.professions.edit',["specailities"=>$specailities , "professions"=>$profession]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profession $profession)
    {
        //
        $validator = validator([
            'title_en' => 'required|string|min:3|max:35',
            'title_ar' => 'required|string|min:3|max:35',
            'speciality_id' => 'required|numric|exists:speailities,id'
        ]);
        if (!$validator->fails()) {
            $profession->title_en = $request->get('title_en');
            $profession->title_ar = $request->get('title_ar');
            $profession->specaility_id = $request->get('specaility_id');

            $isUpdated = $profession->save();
            return response()->json(["message" => $isUpdated ? "Updated Successfully" : "Failed To Update"], $isUpdated ? 200 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profession $profession)
    {
        //

        $isDeleted = $profession->delete();
        return response()->json(["message"=> $isDeleted ?"Deleted Successfully":"Failed To Delete"], $isDeleted  ? 200 :400 );

    }
}
