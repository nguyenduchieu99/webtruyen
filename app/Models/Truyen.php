<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;
    
    public $timestamps = false; //set time to false
    protected $fillable = [
        'tentruyen','tacgia', 'tomtat', 'kichhoat', 'slug_truyen', 'hinhanh','danhmuc_id','theloai_id'
    ];
    protected $primaryKet = 'id'; //trong larabel mặc định khi id không cần khái báo đong này,nhưng nếu khác id vd iddanhmuc thì phải khai báo
    protected $table = 'truyen';

    public function danhmuctruyen() {
        return $this->belongsTo('App\Models\DanhmucTruyen','danhmuc_id','id');
    }

    public function chapter() {
        return $this->hasMany('App\Models\Chapter','truyen_id','id');
    }

    public function theloai() {
        return $this->belongsTo('App\Models\TheLoai','theloai_id','id');
    }
}
