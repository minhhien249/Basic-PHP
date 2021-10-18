@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Danh Sách  <a href="{{route('item.create')}}" class="btn btn-info pull-right"
            ><i class="fa fa-plus"></i> Thêm Item</a>
            @if (session('msg'))
                <div class="form-group has-feedback"><a href="#" style="color: red">{{ session('msg') }}</a></div>
            @endif
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <form action="{{ route('item.search') }}" method="GET" class="search-box-2">
                        <input type="text" class="search-field-2" name="tu-khoa" placeholder="Nhập từ khóa tìm kiếm" value="{{ isset($keyword) ? $keyword : '' }}">
                        <button type="submit" class="search-btn-2"><i class="fa fa-search"></i></button>
                        @if (session('msg'))
                            <div class="form-group has-feedback"><a href="#" style="color: red">{{ session('msg') }}</a></div>
                        @endif
                    </form>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th> Tên</th>
                                <th>Slug</th>
                                <th>Stock</th>
                                <th>Gía</th>
                                <th>Trạng Thái</th>
                            </tr>
                            </tbody>
                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ ($item->is_active == 1) ? 'Hoạt động' : 'Dừng' }}</td>
                                    <td class="text-center">
                                        <div class="d-flex">
                                            <a class="mr-1 btn btn-success" href="{{ route('item.edit', ['id'=> $item->id ])}}">Sửa</a>
                                            <a class="mr-1 btn btn-success" href="{{route('item.delete', ['id'=> $item->id ])}}">Xóa</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection

