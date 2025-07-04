@extends('layouts.app')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Tour</h3>

        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('tours.update', [$tour->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề tour</label>
                    <input type="text" value="{{ $tour->title }}" class="form-control" name="title"
                        id="exampleInputEmail1" placeholder="....">

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Số lượng tour</label>
                    <input type="text" value="{{ $tour->quantity }}" class="form-control" name="quantity"
                        id="exampleInputEmail1" placeholder="....">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả tour</label>
                    <input type="text" value="{{ $tour->description }}" class="form-control" name="description"
                        id="exampleInputPassword1" placeholder="....">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Giá tour</label>
                    <input type="text" value="{{ $tour->price }}" class="form-control" name="price"
                        id="exampleInputPassword1" placeholder="....">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Phương tiện</label>
                    <input type="text" value="{{ $tour->vehicle }}" class="form-control" name="vehicle"
                        id="exampleInputPassword1" placeholder="....">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ngày xuất phát</label>
                    <input type="text" value="{{ $tour->departure_date }}" class="form-control" name="departure_date"
                        id="departure_dates" placeholder="....">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ngày về</label>
                    <input type="text" value="{{ $tour->return_date }}" class="form-control" name="return_date"
                        id="return_date" placeholder="....">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nơi đi</label>
                    <input type="text" value="{{ $tour->tour_from }}" class="form-control" name="tour_from"
                        id="exampleInputPassword1" placeholder="....">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nơi đến</label>
                    <input type="text" value="{{ $tour->tour_to }}" class="form-control" name="tour_to"
                        id="exampleInputPassword1" placeholder="....">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tổng ngày</label>
                    <input type="text" value="{{ $tour->tour_time }}" class="form-control" name="tour_time"
                        id="exampleInputPassword1" placeholder="....">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Danh mục tour</label>
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $key => $category)
                            <option {{ $category->id == $tour->category_id ? 'selected' : '' }}
                                value="{{ $category->id }}">
                                {{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="form-control-file" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>

                        </div>
                        <img height="120" width="120" src="{{ asset('uploads/tours/' . $tour->image) }}">
                    </div>
                </div>
                <div class="form-check">
                    <input type="checkbox" value="1" {{ $tour->status == 1 ? 'checked' : '' }} name="status"
                        class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Status</label>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>


@endsection