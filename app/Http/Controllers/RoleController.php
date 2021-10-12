<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::withCount('permissions')->get();
        return response()->view('cms.spatie.roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        return response()->view('cms.spatie.roles.create');
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
        $validator = validator($request->all(), [
            'name' => 'required|string|max:100',
            'guard_name' => 'required|in:web,professional|string'
        ]);
        if (!$validator->fails()) {
            $role = new Role();
            $role->name = $request->get('name');
            $role->guard_name = $request->get('guard_name');
            $isSaved =  $role->save();
            return response()->json(['message' => $isSaved ? "Created Succefully" : "Failed To Create"], $isSaved ? 200 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
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
        $role = Role::findById($id);
        return response()->view('cms.spatie.roles.edit',['role'=>$role]);
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
        $validator = validator($request->all(), [
            'name' => 'required|string|max:100',
            'guard_name' => 'required|in:web,professional|string'
        ]);
        if (!$validator->fails()) {
            $role = Role::findById($id);
            $role->name = $request->get('name');
            $role->guard_name = $request->get('guard_name');
            $isSaved =  $role->save();
            return response()->json(['message' => $isSaved ? "Created Succefully" : "Failed To Create"], $isSaved ? 200 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $isDeleted = Role::destroy($id);
        return response()->json(['message'=>$isDeleted ?"Deleted Successfully" :"Failed To Delete" ],$isDeleted ? 200:400);
    }
}
