<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
	protected $table = "document_contents";
    protected $fillable = ['id_content','deleted','judul','isi','id_document', 'urutan', 'tipe'];
}
