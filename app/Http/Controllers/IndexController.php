<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\Chapter;
use App\Models\TheLoai;

class IndexController extends Controller
{
    // function timkiemajax(Request $request) {
    //     $data = $request->all();

    //     if($data['keywords']){
    //         $truyen = Truyen::where('tinhtrang',0)->where('tentruyen','LIKE','%'.$data['keywords'].'%')->get();

    //         $output = '
    //         <ul class="dropdown-menu" style="display:block;"></ul>
    //         ';
    //     }
    //     foreach ($truyen as $key => $value) {
    //         $output .= '
    //         <li class="li_search_ajax"><a href="#">'.$value->tentruyen.'</a></li>
    //         ';
    //     }

    //     $output .='</ul>';  
    //     echo $output;
    // }

    public function home()
    {
        $theloai = TheLoai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();


        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->get();

        return view('pages.home')->with(compact('danhmuc', 'truyen', 'theloai', 'slide_truyen'));
    }

    public function danhmuc($slug)
    {
        $theloai = TheLoai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $danhmuc_id = DanhmucTruyen::where('slug_danhmuc', $slug)->first();

        $tendanhmuc = $danhmuc_id->tendanhmuc;

        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->where('danhmuc_id', $danhmuc_id->id)->get();

        return view('pages.danhmuc')->with(compact('danhmuc', 'truyen', 'tendanhmuc', 'theloai'));
    }

    public function theloai($slug)
    {
        $theloai = TheLoai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $theloai_id = TheLoai::where('slug_theloai', $slug)->first();

        $tentheloai = $theloai_id->tentheloai;

        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->where('theloai_id', $theloai_id->id)->get();

        return view('pages.theloai')->with(compact('danhmuc', 'truyen', 'tentheloai', 'theloai'));
    }


    public function xemtruyen($slug)
    {
        $theloai = TheLoai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::OrderBy('id', 'DESC')->get();

        $truyen =   Truyen::with('danhmuctruyen', 'theloai')->where('slug_truyen', $slug)->where('kichhoat', 0)->first();

        $chapter = Chapter::with('truyen')->OrderBy('id', 'ASC')->where('truyen_id', $truyen->id)->get();

        $chapter_dau = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->id)->first();

        $cungdanhmuc = Truyen::with('danhmuctruyen', 'theloai')->where('danhmuc_id', $truyen->danhmuctruyen->id)->whereNotIn('id', [$truyen->id])->get();

        return view('pages.truyen')->with(compact('danhmuc', 'truyen', 'chapter', 'cungdanhmuc', 'chapter_dau', 'theloai',));
    }
    public function xemchapter($slug)
    {
        $theloai = TheLoai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::OrderBy('id', 'DESC')->get();

        $truyen = Chapter::where('slug_chapter', $slug)->first();

        //breadcrumb
        $truyen_breadcrumb =   Truyen::with('danhmuctruyen', 'theloai')->where('id', $truyen->truyen_id)->first();
        //endbreadcrumb

        $chapter = Chapter::with('truyen')->where('slug_chapter', $slug)->where('truyen_id', $truyen->truyen_id)->first();

        $all_chapter = Chapter::with('truyen')->OrderBy('id', 'DESC')->where('truyen_id', $truyen->truyen_id)->get();

        $next_chapter = Chapter::with('truyen_id', $truyen->truyen_id)->where('id', '>', $chapter->id)->min('slug_chapter');

        $max_id = Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('id', 'DESC')->first();
        $min_id = Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('id', 'ASC')->first();

        $previous_chapter = Chapter::with('truyen_id', $truyen->truyen_id)->where('id', '<', $chapter->id)->max('slug_chapter');

        return view('pages.chapter')->with(compact('danhmuc', 'truyen', 'chapter', 'all_chapter', 'next_chapter', 'previous_chapter', 'min_id', 'max_id', 'theloai', 'truyen_breadcrumb'));
    }

    public  function timkiem()
    {
        $theloai = TheLoai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::OrderBy('id', 'DESC')->get();

        $tukhoa = $_GET['tukhoa'];
        $truyen = Truyen::with('danhmuctruyen', 'theloai')->where('tentruyen', 'LIKE', '%' . $tukhoa . '%')->orWhere('tacgia', 'LIKE', '%' . $tukhoa . '%')->get();

        return view('pages.timkiem')->with(compact('danhmuc', 'theloai', 'truyen', 'tukhoa'));
    }
}
