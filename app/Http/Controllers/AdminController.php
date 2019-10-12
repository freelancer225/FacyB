<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\domains;
use App\filieres;

class AdminController extends Controller
{
    public function index(){
        $data = DB::table('users')
        ->where('role',NULL)
        ->get();
    	return view('admin.index',[
            'data'=>$data
        ]);
    }



    public function addDomain()
    {
        $datas= domains::all();
    	return view('admin.domaines',compact('datas'));
    }

    
    public function filieres()
    {
        
        $data = filieres::with('doms')->get();
    	return view('admin.addfilieres', compact('data'));
    }

    public function saveDomain(Request $request)
    {
    	$dom_name = $request->dom_name;
    	$id = $request->id;
    	if(isset($id)){
    		DB::table('domains')->where('id', $id)
    		->update([
    			'name'=> $dom_name,
    			'slug' => str_slug($dom_name),
    			'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
    		]);


    	}else {
			DB::table('domains')->insert([
				'name' => $dom_name,
				'slug' => str_slug($dom_name),

				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		    	'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
			]);
    	}
    }

    public function saveOtherDomain(Request $request)
    {

        foreach ($request->name as $key => $v) {
            
        DB::table('filieres')->insert( array(
                'name' => $v, 
                'dom_id' => $request->dom_id [$key],

                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ));
        }
    	
    }

    public function updateOtherDomain(Request $request)
    {
        $id = $request->id;
        DB::table('filieres')->where('id', $id)
    		->update([
                'name' => $request->dom_id, 
                'dom_id' => $request->dom_id,

                // 'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);
    	
    }

    public function deleteFilieres($id){
        DB::table('filieres')->where('id',$id)->delete();
        
        return redirect('admin/addfillieres');
    }
    public function deleteDomaines($id){
        DB::table('domains')->where('id',$id)->delete();
        
        return redirect('admin/domaines');
    }

}
