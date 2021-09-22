<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdateTeamsRequest;
use App\Http\Requests\StoreTeamsRequest;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamsController extends Controller
{
   public function index(){
       $teams = Team::all();
       return view('teams.index', ['teams'=>$teams]);
   }
   public function create(){
    return view('teams.create');
   }
   public function store(StoreTeamsRequest $request){
       Team::create($request->all());
       return redirect(route('teams-index'));
    //dd($request->all());
   }

   public function edit($id){
    //$teams = Team::where('id', '=', $id)->get();
    $teams = Team::find($id);  
    if(empty($teams)){
        return redirect(route('teams-index')); 
    }
    return view('teams.edit', ['team' => $teams]);
   }

   public function update(UpdateTeamsRequest $request, $id){
        $data = [
            'name' => $request->name,
            'country' => $request->country,
            'foundation_year' => $request->foundation_year,
        ];
        Team::where('id', $id)->update($data);
        return redirect(route('teams-index')); 
   }
   public function destroy($id){
       Team::where('id', $id)->delete();
       return redirect(route('teams-index'));
   }

}
