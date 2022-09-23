@extends('../layout')


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{url('the-loai/'.$truyen_breadcrumb->theloai->slug_theloai)}}">{{$truyen_breadcrumb->theloai->tentheloai}}</a></li>
            <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen_breadcrumb->danhmuctruyen->slug_danhmuc)}}">{{$truyen_breadcrumb->danhmuctruyen->tendanhmuc}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$truyen_breadcrumb->tentruyen}}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <h4>{{$chapter->truyen->tentruyen}}</h4>
            <p>Chương hiện tại : {{$chapter->tieude}}</p>
            <div class="col-md-5">
                <style type="text/css">
                .isDisabled{
                    color: currentColor;
                    pointer-events: none;
                    opacity: 0.5;
                    text-decoration: none;

                }

                </style>
                
                <div class="form-group">
                    <label for="exampleInputEmail">Chọn chương</label>
                    <p><a  class="btn btn-primary {{$chapter->id==$min_id->id? 'isDisabled' : ''}}" href="{{url('xem-chapter/'.$previous_chapter)}}">Tập trước</a></p>
                    <select  id="select-chapter" class="custom-select select-chapter" id="">
                        @foreach ($all_chapter as $item =>$chap)
                        <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
                        @endforeach
                    </select>
                    <p class="mt-3"><a class="btn btn-primary {{$chapter->id==$max_id->id? 'isDisabled' : ''}}" href="{{url('xem-chapter/'.$next_chapter)}}">Tập sau</a></p>


                </div>

            </div>
            <div class="noidungchuong">
                {!! $chapter->noidung!!}
                {{-- <p>Công an tỉnh Bắc Giang vừa khởi tố, bắt tạm giam cựu giám đốc một công ty sách thông đồng lập chứng từ
                    mua bán lòng vòng, đẩy giá thiết bị giáo dục lên gấp nhiều lần, gây thiệt hại nhiều tỉ đồng ngân sách
                    nhà nước.
                    Sáng 21.9, thông tin từ Công an tỉnh Bắc Giang cho biết, cơ quan này vừa ra quyết định khởi tố bị can,
                    lệnh bắt tạm giam và khám xét chỗ ở đối với Vũ Tất Triều (38 tuổi, trú P.Mỹ Đình 1, Q.Nam Từ Liêm, Hà
                    Nội) để làm rõ tội “vi phạm quy định về đấu thầu gây hậu quả nghiêm trọng”, quy định tại khoản 3 điều
                    222 bộ luật Hình sự năm 2015, sửa đổi, bổ sung năm 2017.</p> --}}
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">Chọn chương</label>
                <select  id="select-chapter" class="custom-select select-chapter" id="">
                    @foreach ($all_chapter as $item =>$chap)
                    <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
                    @endforeach
                    
                </select>
            </div>
            <h3>Lưu và chia sẻ truyện :</h3>
            <a> <i class="fab fa-facebook"></i></a>
            <a> <i class="fab fa-twitter"></i></a>

        </div>

    </div>
@endsection
