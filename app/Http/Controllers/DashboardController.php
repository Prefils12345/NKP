<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view("acsi.dashboard.index");
    }

    public function login(Request $request){
        
        $request->validate([
            "email"=>["required","email"],
            "password"=>["required"]
        ]);
        
        $email = $request->email;
        $password = $request->password;

        $user = User::where("email",$email)->first();
        if($user==null){
            toastr()->error("Email incorrecte");
            return redirect()->back()->withInput();
        }

        if(!Hash::check($password, $user->password)){
            toastr()->error("Mot de passe incorrecte");
            return redirect()->back()->withInput();
        }

        if($user->active != 1){
            toastr()->warning("Compte inactif");
            return redirect()->back()->withInput();
        }

        //Création d ela connexion

        Auth::loginUsingId($user->id);

        return redirect()->route('dashboard.index');
    }

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
    public function store(Request $request)
    {
        //
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
    }
}
