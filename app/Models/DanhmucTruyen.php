<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhmucTruyen extends Model
{
    use HasFactory;

    public $timestamps = false; //set time to false
    protected $fillable = [
        'tendanhmuc', 'mota', 'kichhoat', 'slug_danhmuc'
    ];
    protected $primaryKet = 'id'; //trong larabel mặc định khi id không cần khái báo đong này,nhưng nếu khác id vd iddanhmuc thì phải khai báo
    protected $table = 'danhmuc';

    //1 danh mục có nhiều truyện->hasmany
    //1 truyện chỉ có 1 danh mục->belongto
    public function truyen() {
        return  $this->hasMany('App\Models\Truyen');
    
    }
}
