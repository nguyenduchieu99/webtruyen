@extends('layouts.app')

@section('content')

    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cập nhập thể loại</div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('theloai.update' , [$theloaitruyen->id])}}">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thế loại</label>
                                <input type="text" class="form-control" value="{{$theloaitruyen->tentheloai }}"
                                    onkeyup="ChangeToSlug()" id="slug" name="tentheloai" aria-describedby="emailHelp"
                                    placeholder="Tên thể loại....">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug thể loại</label>
                                <input type="text" class="form-control"value="{{$theloaitruyen->slug_theloai }}"
                                    id="convert_slug" name="slug_theloai" aria-describedby="emailHelp"
                                    placeholder="Slug thể loại....">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả thể loại</label>
                                <input type="text" class="form-control" value="{{$theloaitruyen->mota }}"
                                    id="exampleInputEmail1" name="mota" aria-describedby="emailHelp"
                                    placeholder="Mô tả thể loại....">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kích hoạt</label>
                                <select name="kichhoat" class="custom-select">
                                    @if ($theloaitruyen->kichhoat == 0)
                                    <option selected value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                @else
                                    <option value="0">Kích hoạt</option>
                                    <option selected value="1">Không kích hoạt</option>
                                @endif

                                </select>
                            </div>
                            <button type="submit" name="capnhap" class="btn btn-primary">Cập nhập</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
