<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class FrontController extends Controller
{
    public function index(Request $request){
        $id= Auth()->user()->id;
        $formations = DB::table('formation')
                ->where('user_id',$id)
                ->get();
        $experiences = DB::table('experience')
                ->where('user_id',$id)
                ->get();
        $competences = DB::table('competence')
                ->where('user_id',$id)
                ->get();
        $langues = DB::table('langue')
                ->where('user_id',$id)
                ->get();
        
        return view('myaccount/profile/index', compact('formations','experiences','competences','langues'));
    }
    public function saveFormation(Request $request){
        foreach ($request->start as $key => $v) {
                
            DB::table('formation')->insert( array(
                'start' => $v,
                'end' => $request->end [$key],
                'today' => $request->today [$key],
                'niveaux' => $request->niveaux [$key],
                'name_formation' => $request->name_formation [$key],
                'name_ecole' => $request->name_ecole [$key],
                'description' => $request->description [$key],
                // 'start_exp' => $request->start_exp [$key],
                // 'end_exp' => $request->end_exp [$key],
                // 'today_exp' => $request->today_exp [$key],
                // 'poste' => $request->poste [$key],
                // 'entreprise' => $request->entreprise [$key],
                // 'description_exp' => $request->description_exp [$key],
                'user_id' => $request->user_id [$key],
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ));     
        }
        
    }

    public function saveExperience(Request $request){
        foreach ($request->start_exp as $key => $v) {       
            DB::table('experience')->insert( array(
                'start_exp' => $v,
                'end_exp' => $request->end_exp [$key],
                'today_exp' => $request->today_exp [$key],
                'poste' => $request->poste [$key],
                'entreprise' => $request->entreprise [$key],
                'description_exp' => $request->description_exp [$key],
                'user_id' => $request->user_id [$key],
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ));     
        }
    }

    public function saveCompetence(Request $request){
        foreach ($request->name_comp as $key => $v) {       
            DB::table('competence')->insert( array(
                'name_comp' => $v,
                'niveau_comp' => $request->niveau_comp [$key],
                'user_id' => $request->user_id [$key],
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ));     
        }
    }

    public function saveLangue(Request $request){
        
        foreach ($request->name_lang as $key => $v) {       
            DB::table('langue')->insert( array(
                'name_lang' => $v,
                'niveau_lang' => $request->niveau_lang [$key],
                'user_id' => $request->user_id [$key],
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ));  
            
        }
        
    }


    public function saveAdresse(Request $request){ 
        $id= Auth()->user()->id;
        if($request->hasFile('file')){
            $pic = $request->file('file');
            $filename = $pic->getClientOriginalName();
            $path = 'img';
            
            
            $filename = time().$filename;
            $pic->move($path,$filename);
            DB::table('users')->where('id', $id)
    		->update( array(
                'name' => $request->name,
                'metier' => $request->metier,
                'secteur' =>  $request->hidden_secteur,
                'name_full' => $request->name_full,
                'ville' => $request->ville,
                'quartier' => $request->quartier,
                'tel' => $request->tel,
                'file' => $filename,
                // 'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ));   
            return redirect('home');
            
        }
        else{
            if($request->file_old){
                DB::table('users')->where('id', $id)
    		    ->update( array(
                
                'name' => $request->name,
                'secteur' => $request->hidden_secteur,
                'metier' => $request->metier,
                'name_full' => $request->name_full,
                'ville' => $request->ville,
                'quartier' => $request->quartier,
                'tel' => $request->tel,
                'file' => $request->file_old,
                // 'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ));
            return redirect('home');
            }
            else{
                if($request->file_old){
                    DB::table('users')->where('id', $id)
                ->update( array(
                    
                    'name' => $request->name,
                    'secteur' => $request->hidden_secteur,
                    'metier' => $request->metier,
                    'name_full' => $request->name_full,
                    'ville' => $request->ville,
                    'quartier' => $request->quartier,
                    'tel' => $request->tel,
                    'file' => 'user.png',
                    // 'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                ));
                return redirect('home');
            }
            
        }       
    }}

    public function profils(Request $request){
        $etudiants = DB::table('users')
        ->where('role',NULL)
        ->get();

        $count = DB::table('users')
            ->where('role',NULL)
            ->count();

        return view('profils',[
            'etudiants'=> $etudiants,
            'count'=> $count
            
        ]);
    }


    public function deleteFormation($id){
        DB::table('formation')->where('id',$id)->delete();   
        return back();
    }

    public function deleteLangue($id){
        DB::table('langue')->where('id',$id)->delete();   
        return back();
    }

    public function deleteCompetence($id){
        DB::table('competence')->where('id',$id)->delete();   
        return back();
    }
    public function deleteExperience($id){
        DB::table('experience')->where('id',$id)->delete();   
        return back();
    }


    public function search(Request $request){
      
        $searchData= $request->searchData;

        $count = DB::table('users')
            ->where('role',NULL)
            ->where('metier', 'like', '%' . $searchData . '%')
            ->count();

        $etudiants = DB::table('users')
            ->where('role',NULL)
            ->where('metier', 'like', '%' . $searchData . '%')
            ->get();
    
        return view('Front.profils',[
            'etudiants'=> $etudiants, 'catByUser' => $searchData,  'count'=>$count
        ]);
    }
}
