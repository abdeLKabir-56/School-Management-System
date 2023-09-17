<?php

namespace App\Http\Controllers;
use \App\Models\User ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use Hash;
use Dompdf\Dompdf;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $etudiants=User::where('isAdmin','!=',true)->get();
        return view('Admin.index',['etudiants'=>$etudiants])
         ->with('etudiant_count',User::where('isAdmin','=',false)->count())
          ->with('filiere_count','4')
          ->with('departement_count','3')
          ->with('donnees',User::where('isAdmin','=',false)->get());
    }

    public function show($id){
    
        $etudiant=User::find($id);
        return view("admin.profile", compact('etudiant'));
    }
    
   
   
   
        public function generatePDF()
        {
            $user = User::where('isAdmin','!=',true)->get();

            $pdf = new Dompdf();

            $html = view('admin.pdf1', compact('user'))->render();
            $pdf->loadHtml($html);

            $pdf->setPaper('A4', 'portrait');

            $pdf->render();

            $pdf->stream('users.pdf');
        }
        
   

    /**
     * Display the specified resource.
     */
   




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    { 
        $request->validate([
        'etudiant_nom' => 'required',
        'etudiant_prenom' => 'required',
        'etudiant_email' => 'required|email'
            ]);
        $etudiant=User::find($id);
        
        $etudiant->nom=$request->etudiant_nom;
        $etudiant->prenom=$request->etudiant_prenom;
        $etudiant->email=$request->etudiant_email;
        $etudiant->DateNaissance=$request->etudiant_DateNaissance;
        $etudiant->telephone=$request->etudiant_telephone;
        $etudiant->filiere=$request->etudiant_filiere;
        $etudiant->save();
        return redirect()->route('admin.index')
                ->with('success', 'student data has been updated successfully');


    }
    public function edit($id)
    {  
        $etudiant=User::find($id);
        return view("admin.edit",compact('etudiant'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $etudiants=User::destroy($id);
        
        return redirect()->route('admin.index')
                ->with('success', 'student deleted successfully');
    }
    public function store(Request $request)
    {
        
  
            
        
        $validatedData = $request->validate([
            'admin_nom' => 'required',
            'admin_prenom' => 'required',
            'admin_email' => 'required|email',
            'admin_filiere' => 'required',
            'admin_telephone' => 'required',
            'admin_DateNaissance' => 'required|date',
            'admin_pass'=> 'required',
        ]);
    
        $etudiant = new User();
        $etudiant->nom = $validatedData['admin_nom'];
        $etudiant->prenom = $validatedData['admin_prenom'];
        $etudiant->email = $validatedData['admin_email'];
        $etudiant->filiere = $validatedData['admin_filiere'];
        $etudiant->telephone = $validatedData['admin_telephone'];
        $etudiant->DateNaissance = $validatedData['admin_DateNaissance'];
        $etudiant->password= Hash::make($validatedData['admin_pass']);
        $etudiant->save();
    
        return redirect()->route('admin.index')->with('success', 'Student data has been created successfully');
          
          
    }
   
}
