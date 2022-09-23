<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;

class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theloaitruyen = TheLoai::orderBy('id', 'DESC')->get();
        // // $danhmuctruyen = DanhmucTruyen::all();
        return view('admincp.theloai.index')->with(compact('theloaitruyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.theloai.create');
                // $theloai = TheLoai::orderBy('id','DESC')->get();
        // return view('admincp.theloai.create')->with(compact('theloai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $request->validate(
            [
                'tentheloai' => 'required|unique:theloai|max:255',
                'slug_theloai' => 'required|unique:theloai|max:255',
                'mota' => 'required|max:255',
                'kichhoat' => 'required',

            ],
            [
                'slug_theloai.unique' => 'Tên thể loại đã có, xin điền tên khác',
                'tentheloai.unique' => 'Slug thể loại đã có, xin điền slug khác',
                'tentheloai.required' => 'Tên thể loại phải có',
                'mota.required' => 'Mô tả thể loại phải có',
            ],
        );

        $theloai = new TheLoai();
        $theloai->tentheloai = $data['tentheloai'];
        $theloai->slug_theloai = $data['slug_theloai'];
        $theloai->mota = $data['mota'];
        $theloai->kichhoat = $data['kichhoat'];
        $theloai->save();
        return redirect()->back()->with('status', 'Thêm thể loại thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $theloaitruyen = TheLoai::find($id);
        return view('admincp.theloai.edit')->with(compact('theloaitruyen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data =  $request->validate(
            [
                'tentheloai' => 'required|max:255',
                'slug_theloai' => 'required|max:255',
                'mota' => 'required|max:255',
                'kichhoat' => 'required',

            ],
            [
                'tentheloai.required' => 'Tên thể loại phải có',
                'mota.required' => 'Mô tả thể loại phải có',
            ],
        );

        $theloai =  TheLoai::find($id);
        $theloai->tentheloai = $data['tentheloai'];
        $theloai->slug_theloai = $data['slug_theloai'];
        $theloai->mota = $data['mota'];
        $theloai->kichhoat = $data['kichhoat'];
        $theloai->save();
        return redirect()->back()->with('status', 'Cập nhập thể loại thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TheLoai::find($id)->delete();
        return redirect()->back()->with('status','Xóa thể loại thành công');
    }
}
