@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin Item</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('item.store') }}" method="get" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Tên</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Nhập slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Stock</label>
                                <input type="text" class="form-control" id="stock" name="stock" placeholder="Nhập ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Price</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="Nhập ">
                            </div>

                            <div class="form-group">
                                <label>User </label>
                                <select class="form-control" name="user_id">
                                    <option value="0">-- chọn --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user -> id }}">{{ $user -> name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Danh Mục</label>
                                <select class="form-control" name="category_id">
                                    <option value="0">-- chọn --</option>
                                    @foreach($cate as $category)
                                        <option value="{{ $category -> id }}">{{ $category -> name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <div class="custom-control custom-switch mb-2 pl-5">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1" value="1" name="is_active">
                                    <label class="custom-control-label" for="customSwitch1">Trạng thái</label>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Tạo</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection
