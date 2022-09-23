<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'tentheloai','slug_theloai', 'mota', 'kichhoat'
    ];
    protected $primaryKet = 'id'; //trong larabel mặc định khi id không cần khái báo đong này,nhưng nếu khác id vd iddanhmuc thì phải khai báo
    protected $table = 'theloai';

    public function truyen() {
        return $this->hasMany('App\Models\Truyen');
    }
}
