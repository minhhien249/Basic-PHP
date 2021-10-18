@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Danh Sách  <a href="{{route('category.create')}}" class="btn btn-info pull-right"
            ><i class="fa fa-plus"></i> Thêm Category</a>
            @if (session('msg'))
                <div class="form-group has-feedback"><a href="#" style="color: red">{{ session('msg') }}</a></div>
            @endif
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th style="background: #34c4db;">Cấp 1</th>
                                    <th style="background:#e74c3c">Cấp 2</th>
                                    <th>Trạng Thái</th>
                                    <th>Vị trí</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $item)
                                    <tr class="item-{{$item->id}}">
                                        <td colspan="2" style="    background: #34db41;">{{$item->name}}</td>
                                        <td>{{$item->is_active !=0 ? 'Hiển thị' : 'Ẩn'  }}</td>
                                        <td>{{$item->position}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="mr-1 btn btn-success" href="{{ route('category.show', ['id'=> $item->id ])}}">Xem</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @if(($item->subcategory))
                                        @foreach($item->subcategory as $subcategory)
                                            <tr class="item-{{$subcategory->id}}">

                                                <td></td>
                                                <td style="background:#F5F5DC">
                                                    {{$subcategory->name}}</td>
                                                <td>{{$subcategory->is_active !=0 ? 'Hiển thị' : 'Ẩn'  }}</td>
                                                <td>{{$subcategory->position}}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a class="mr-1 btn btn-success" href="{{route('category.show', ['id'=> $subcategory->id ])}}">Xem</a>
                                                    </div>
                                                </td>
                                            </tr>

                                        @endforeach
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection
