@extends('admin.layouts.main')
@section('content')
    <style>.w-50 { width: 50% }</style>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-9">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin sản phẩm</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <form role="form" action="{{route('item.update', ['id' => $item->id ])}}" method="get" enctype="multipart/form-data">
                        @csrf

                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input value="{{ $item->name }}" type="text" class="form-control" id="name" name="name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Số lượng</label>
                                <input type="number" class="form-control w-50" id="stock" name="stock" value="{{ $item->stock }}">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Giá </label>
                                        <input type="number" class="form-control" id="price" name="price" value="{{ $item->price }}">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label>Danh mục sản phẩm</label>
                                <select class="form-control w-50" name="category_id">
                                    <option value="0">-- chọn Danh Mục --</option>
                                    @foreach($category as $cate)
                                        <option {{ ($item->category_id == $cate->id ? 'selected':'') }} value="{{ $cate->id }}">{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input {{ ($item->is_active) ? 'checked':'' }} type="checkbox" value="1" name="is_active"> <b>Trạng thái</b>
                                    </label>
                                </div>
                            </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập Nhật</button>
                            <input type="reset" class="btn btn-default pull-right" value="Reset">
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            </form>
        </div>
        <!-- /.row -->
    </section>
@endsection
