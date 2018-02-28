<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use App\Content;
use DB;
use Session;

class DocController extends Controller
{
    public function showLoginForm(Request $request) 
    {
        if ($request->session()->has('usrn')){
        return redirect('home');
        }
        else{
        return view('index');
        }
    }
	public function showDoc(Request $request) 
    {
        if ($request->session()->has('usrn')){
    	$docs = Document::all();
    	return view('home',compact('docs'));
        }
        else{
            return redirect('/');
        }
    }
   public function showDocContent($id,Request $request) {
    	$docs = Document::find($id);

    	if($docs == null){
    		abort(404);
    	}
    	$contents = Content::where(['id_document'=> $id, 'deleted' => 0])
    		->orderBy('urutan')
    		->get();

    	$count = $contents -> count();

        for ($i=1; $i<=$count;$i++) {
            $contents[$i-1]->urutan = $i;
            $contents[$i-1]->save();
        }
        if ($request->session()->has('usrn')){
    	return view('document',compact('docs','contents'));
        }
        else{
            return redirect('/');
        }
    }

    public function insertDoc(Request $request)
    {
    	$max_id = Document::max('id');
        $this->validate($request,['nama'=>'required']);
    	Document::create([
				'nama' => $request -> input('nama'),
                'id_pengguna' => Session::get('id')
		]);
    	return redirect ('home');
    }

	public function editDoc(Request $request)
	{
		$document = Document::find($request->input('iddoc'));
		$this->validate($request,['nama'=>'required']);
		$document->nama = $request->input('nama');
		$document->save();
		return redirect('home');
	}

	public function deletedoc($id)
	{
		$item = Document::find($id);
		$item->delete();
		return redirect('home');
	}
}
