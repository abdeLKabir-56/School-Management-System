<?php

namespace App\Http\Controllers;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('student.notes');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function AllQueries(){
       User::all();//all rows in user 
       $user=User::find(1);//select user From User where id=1;
       $user=User::findOrFail(1);//select user From User where id=1; or show the 404 page
       $user=User::where('active',1)->first();
       $user=User::firstWhere('active',1);
       $user=User::where('id','>',3)->firstOR(function(){
        //sinon
       });
       $user=User::where('active',1)->count();
       $max=User::where('active',1)->max();
       $average=User::where('active',1)->avg();
       //2eme methode:build queries 
       //use Illuminate\Facades\DB->move on to the database
       $users=DB::table('users')->where('nom','abdelkabir')->value('email');//select email from users where nom='A...';
       $users=DB::table('users')
                    ->select('nom','email as user_email')
                    ->get();
       $users=DB::table('users')
                    ->distinct()
                    ->get();
       $users=DB::table('users')
                    ->orderBy('nom','desc')
                    ->get();
       $users=DB::table('users')
                    ->groupBy('nom')
                    ->having('id','>',3)
                    ->get();
       $users=DB::table('users')
                    ->groupBy('nom',DB::raw("SUM(users) as users"))
                    ->havingRow('users > ?',[3])
                    ->get();
       //insert
       $users=User::create([
        'nom'   => 'abdelkabir',
        'prenom'   => 'abdelkabir',
        'email'   => 'abdelkabir',
        'password'   => 'abdelkabir'
       ]);
       //on insert by each column by selecting

       //update
        $user= User::find (1);
        $user->name = 'Karim';
        $user->save();
        User::where('active', 1)
        ->where('destination', 'San Diego')
        ->update(['delayed' => 1]);
       //delete
       $user = User::find(1);
        $user->delete();//delete row founded
        User::truncate();//delete all database
        User::destroy(1);//delete row by id number
        User::destroy (1, 2, 3);
        $deletedRows = User::where('active', 0)->delete();//deleting by condition(S)

    }
}
