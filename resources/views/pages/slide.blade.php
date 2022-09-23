<h3>SÁCH HAY NÊN ĐỌC </h3>
<div class="owl-carousel owl-theme mt-5">

    @foreach ($slide_truyen as $item =>$value)
        <div class="item"><img src="{{ asset('public/uploads/truyen/'.$value->hinhanh) }}" height="200" width="180">
            <h3>{{$value->tentruyen}}</h3>
            <p><i class="fa-solid fa-eye"></i>123</p>
            <a class="btn btn-danger btn-sm" href="{{url('xem-truyen/'.$value->slug_truyen)}}">Đọc ngay</a>
        </div>
    @endforeach

    {{-- <div class="item"><img
            src="{{ asset('public/uploads/truyen/png-clipart-gohan-mystic-dragon-ball-super-son-gohan-thumbnail50.png') }}"
            height="200" width="180">
        <h3>Daragon Ball</h3>
        <p><i class="fa-solid fa-eye"></i>234</p>
        <a class="btn btn-danger btn-sm" href="">Đọc ngay</a>
    </div>
    <div class="item"><img src="{{ asset('public/uploads/truyen/3-033029.jpg') }}" height="200"
            width="180">
        <h3>Spy*family</h3>
        <p><i class="fa-solid fa-eye"></i>123</p>
        <a class="btn btn-danger btn-sm" href="">Đọc ngay</a>
    </div>

    <div class="item"><img
            src="{{ asset('public/uploads/truyen/png-clipart-gohan-mystic-dragon-ball-super-son-gohan-thumbnail50.png') }}"
            height="200" width="180">
        <h3>Daragon Ball</h3>
        <p><i class="fa-solid fa-eye"></i>234</p>
    </div>
    <div class="item"><img src="{{ asset('public/uploads/truyen/3-033029.jpg') }}" height="200"
            width="180">
        <h3>Spy*family</h3>
        <p><i class="fa-solid fa-eye"></i>123</p>
        <a class="btn btn-danger btn-sm" href="">Đọc ngay</a>
    </div> --}}
</div>
