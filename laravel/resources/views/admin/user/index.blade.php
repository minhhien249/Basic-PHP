@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Danh Sách  <a href="{{route('user.create')}}" class="btn btn-info pull-right"
            ><i class="fa fa-plus"></i> Thêm User</a>
            @if (session('msg'))
                <div class="form-group has-feedback"><a href="#" style="color: red">{{ session('msg') }}</a></div>
            @endif
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <form action="{{ route('user.search') }}" method="GET" class="search-box-2">
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
                                <th>Họ & Tên</th>
                                <th>Email</th>
                                <th>Quyền</th>
                                <th>Hành Động</th>
                            </tr>
                            </tbody>
                            @foreach($data as $key => $user)
                                <tr class="item-{{ $user->id }}"> <!-- Thêm Class Cho Dòng -->
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ ($user->role_id == 1) ? 'Admin' : 'User' }}</td>
                                    <td class="text-center">
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

