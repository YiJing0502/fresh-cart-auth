@extends('templates.templete')

@section('main')
                <!-- 主欄最上面 -->
                <div class="two-up row my-5 m-0 p-0 ">
                    <div class="col-12 offset-md-1 col-md-5   ">
                        <div class="row">
                            <div class="col-12">
                                <h2>編輯產品</h2>
                            </div>
                            <div class="col-3"><span>Dashboard</span></div>
                            <div class="col-6"><span class="text-black-50">Categories</span></div>
                        </div>

                    </div>

                </div>
                <!-- 主欄第二排 -->

                <!-- 編輯產品 -->
                <div class="edit-product">
                    <form action="{{route('typeUpdate', ['id' => $type->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="container">
                            <div class="row d-flex flex-column">
                                <!--  產品名稱 -->
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">產品名稱</span>
                                        <input type="text" name="name" class="form-control" placeholder="輸入產品名稱"
                                            aria-label="Username" aria-describedby="basic-addon1"
                                            value="{{ $type->name }}" required>
                                    </div>
                                </div>
                                <!-- 產品圖片 -->
                                <div class="col">
                                    @foreach ($type->productTypeImg as $img )
                                    <img src="{{ asset($img->img_path) }}" alt="" class="w-100">
                                    @endforeach
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">產品圖片</span>
                                        <input type="file" name="img[]" class="form-control" placeholder="輸入產品圖片"
                                            aria-label="Username" aria-describedby="basic-addon1" accept="image/*" multiple>
                                    </div>
                                </div>
                                <!-- 產品描述 -->
                                <div class="col">
                                    <div class="input-group">
                                        <span class="input-group-text">產品描述</span>
                                        <textarea class="form-control" name="desc" aria-label="With textarea">{{ $type->descr }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 ">
                                <div class="col d-flex justify-content-end">
                                    <!-- 取消編輯 -->
                                    <a href="{{ route('typeProductList') }}">
                                        <button type="button" class="btn btn-outline-success me-3">取消編輯</button>
                                    </a>
                                    <!-- 儲存編輯 -->
                                    <a href="">
                                        <button type="subit" class="btn btn-outline-success">儲存編輯</button>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
@endsection
