<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\UserIndex;
use Illuminate\Http\Request;
use App\Http\Requests\UserUpdateRequest;

class UserIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search_user =$request->searchData;

        $userSearch =UserIndex::searchFilter($search_user)//this is so important
                    ->orderBy("id","desc")
                    ->paginate(3);


        return Inertia::render("User/Index",[
            'user_data'=>UserIndex::get(),
            'user_data'=>$userSearch,
            'search_user'=>$search_user
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render("User/Create");
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
            'name'=>["required","min:5"],
            'email'=>["required","email"],
            'phone'=>["required","integer"],
            'password'=>["required",'min:5'],
            'address'=>["required"]
        ]);

      $user_data =$this->data($request);

       UserIndex::create($user_data);

       return redirect()->route('user#index')->with("success",'User Data have been create successfully!');
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
        return Inertia::render("User/Edit",[
            "user_data"=>UserIndex::where("id",$id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,UserIndex $userIndex,$id)
    {

        $request->validate([
            'name'=>["required","min:5"],
            'email'=>["required","email"],
            'phone'=>["required","integer"],
            'password'=>["nullable"],
            'address'=>["required"]
        ]);


            $data=$this->data($request);

       $userIndex->where("id",$id)->update($data);

       return redirect()->route('user#index')->with("update",'User Data have been Update successfully!');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserIndex $id)
    {
        $id->delete();
        return back()->with('delete','User Data have been delete!');
    }

    private function data ($request){
        return [
            "name"=>$request->name,
            "email"=>$request->email,
            'phone'=>$request->phone,
            'password'=>password_hash($request->password,PASSWORD_BCRYPT),
            'address' =>$request->address,
        ];
    }
}
