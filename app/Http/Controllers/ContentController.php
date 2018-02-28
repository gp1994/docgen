<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Content;
use App\Document;
use App\Diff;
use PDF;
use Validator;

class ContentController extends Controller
{
	public function showAddForm($id_doc,Request $request) {
        if ($request->session()->has('usrn')){
    	return view('add_content', ['id_doc'=> $id_doc ]);
        }
        else{
        return redirect('/');
        }
    }

    public function insertContent($id_doc, Request $request){
        $id_content = Content::max('id_content') + 1;
    	$judul = $request->input('judul');
    	$isi = $request->input('isiteks');
    	$kat = $request->input('tipe');
        $urutan = Content::where('id_document',$id_doc)->max('urutan');
        $validator = Validator::make($request->all(), [
            'nama' => 'required' ,
            'tipe' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        else{
    	Content::create([
				'id_content' => $id_content,
                'deleted' => false,
                'judul' => $judul,
				'isi' => $isi,
				'id_document' => $id_doc,
				'urutan' => $urutan + 1,
				'tipe' => $kat,
				'status' => 0
			]);
        
        return redirect("document$id_doc#$id_content")->with('alert_id',$id_content)->with('message',"Content '$judul' inserted successfully.");
        }
    }

    public function showEditForm($id_content,Request $request) {
        if ($request->session()->has('usrn')){
    	$content = Content::find($id_content);
		return view('edit_content',compact('content'));
         }
        else{
        return redirect('/');
        }    
    }

    public function updateContent($id_content, Request $request){
    	$content = Content::find($id_content);
        $urutan = $content->urutan;
        $content->deleted = 2;
        $content->urutan = 0;
        $content->save();
 

    	$actual_id_content = $content->id_content;
        $versi = $content->versi + 1;
        $judul = $request->input('judul');
    	$isi = $request->input('isiteks');
    	$kat = $request->input('tipe');
        $id_doc = $content->id_document;
         $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tipe' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        else{
        Content::create([
                'id_content' => $actual_id_content,
                'versi' => $versi,
                'deleted' => 0,
                'judul' => $judul,
                'isi' => $isi,
                'id_document' => $id_doc,
                'urutan' => $urutan,
                'tipe'=> $kat,
                'status' => 0
            ]);



        return redirect("document$id_doc#$id_content")->with('alert_id',$id_content)->with('message',"Content '$judul' edited successfully.");
        }
    }

    public function deleteContent($id_content){
        $content = Content::find($id_content);
        $content->deleted = 1;
        $content->urutan = $content->urutan * (-1);
        $content->save();


        
        $id_doc = $content->id_document;
        $judul = $content->judul;

        return redirect("document$id_doc")->with('message_doc', "Content '$content->judul' deleted succesfully.");
    }

    public function editUrutan($id_doc, Request $request){
        $contents = Content::where(['id_document'=> $id_doc, 'deleted' => false])
            ->get();
        foreach ($contents as $content) {
            $id = $content->id;
            $input_urutan = "urutan{$id}";
            $urutan = $request->input($input_urutan);
            $content->urutan = $urutan;
            $content->save();
        }

        return redirect("document$id_doc")->with('message_doc', "Urutan dokumen $id_doc updated successfully");
    }

    public function changeEditStatus($id_content){
        $content = Content::find($id_content);
        $status = $content->status;
        if($status == 0){
            $status = 1;
        }
        else{
            $status = 0;
        }
        $content->status = $status;
        $content->save();
    }

    public function cancelEditContent($id_content){
        ContentController::changeEditStatus($id_content);
        $content = Content::find($id_content);
        $id_doc = $content->id_document;
        return redirect("document$id_doc#$id_content")->with('alert_id',$id_content)->with('message','Content edit canceled');
    }

     public function downloadPDF($id){
      $docname= Document::find($id);
      $content =Content::where('id_document',$id)->orderBy('urutan','asc')->get();
      $pdf = PDF::loadView('pdf', compact('docname','content'));
      return $pdf->download($docname->nama.'.pdf');
    }
   
}