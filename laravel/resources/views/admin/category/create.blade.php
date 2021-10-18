@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin người dùng</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('category.store') }}" method="get" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <select class="form-control" name="parent_id">
                                <option value="0">-- chọn --</option>

                                @foreach($data as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label" for="simpleinput">Tên</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="simpleinput" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Vị trí</label>
                                <div class="col-lg-10">
                                    <input type="number" class="form-control" name="position">
                                </div>
                            </div>
                            <div class="custom-control custom-switch mb-2">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1"  name="is_active" value="1">
                                <label class="custom-control-label" for="customSwitch1">Trạng thái</label>
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
