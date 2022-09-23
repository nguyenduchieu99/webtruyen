<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    
    public $timestamps = false; //set time to false
    protected $fillable = [
         'tomtat', 'tieude', 'noidung', 'kichhoat','slug_chapter' ,'truyen_id'
    ];
    protected $primaryKet = 'id'; //trong larabel mặc định khi id không cần khái báo đong này,nhưng nếu khác id vd iddanhmuc thì phải khai báo
    protected $table = 'chapter';

    public function truyen() {
        return $this->belongsTo('App\Models\Truyen');
    }
}
