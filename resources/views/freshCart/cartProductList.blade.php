@extends('templates.templete')
@section('style')

@endsection
@section('main')
    <!-- 主欄最上面 -->
    <div class="two-up row my-5 m-0 p-0 ">
        <div class="col-12 offset-md-1 col-md-5   ">
            <div class="row">
                <div class="col-12">
                    <h2>Product list</h2>
                </div>
                <div class="col-3"><span>Dashboard</span></div>
                <div class="col-6"><span class="text-black-50">Categories</span></div>
            </div>

        </div>
    </div>
    <!-- 主欄第二排 -->

    <!-- 購物清單 -->
    <div class="list-big">
        <div class="two-down row mb-2 m-0 py-5 px-4">
            <div class="col-12 col-md-6  align-items-center d-flex pt-5">
                <form action="{{ route('cartProductList') }}" method="GET" class="d-flex w-75 ml-2"
                    role="search">
                    <input name="keyword" class="form-control  text-black-50"
                        type="text" placeholder="搜尋名稱" aria-label="Search">
                    <a href="">
                        <button type="submit"
                            class="btn ms-md-2 btn-success  btn-success-self-2">搜尋</button>
                    </a>
                </form>
            </div>
            <a href="{{ route('cartAdd') }}">
                <button type="button" class="btn ms-md-2 btn-success  btn-success-self-2">Add New
                    Category</button>
            </a>
            <div class="col-12 offset-md-4 col-md-2 mt-2 mt-md-0">
                <div class="dropdown ">
                    <a class="btn btn-secondary w-100  py-1 dropdown-self dropdown-toggle text-black "
                        href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Status
                    </a>

                    <ul class="dropdown-menu rounded-4 dropdown-menu-self py-0 w-100"
                        aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item rounded-top-4 py-0 " href="#">Status</a></li>
                        <li><a class="dropdown-item py-0" href="#">Published</a></li>
                        <li><a class="dropdown-item rounded-bottom-4 py-0" href="#">Unpublished</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="list  mb-self">
            <!-- 第一行 -->
            <div class="row w-100  m-0 text-secondary fs-14-self py-2 bg-line">
                <div class="col-1 d-flex justify-content-center align-items-center"><input type="checkbox"
                        class="input-size input-1"></input></div>
                <div class="col-1 d-flex justify-content-start align-items-center">Image</div>
                <div class="col-2 d-flex justify-content-start align-items-center">ProductName</div>
                <div class="col-2 d-flex justify-content-start align-items-center">Description</div>
                <div class="col-2 d-flex justify-content-start align-items-center">Creation Date</div>
                <div class="col-1 d-flex justify-content-center align-items-center">Status</div>
                <div class="col-1 d-flex justify-content-center align-items-center">Amount</div>
                <div class="col-2 d-flex justify-content-center align-items-center">Function</div>

            </div>
            <!-- 第二行 -->
            @foreach ($search as $item)
                <div class="row w-100 m-0 text-secondary fs-14-self py-2">
                    <div class="col-1 d-flex justify-content-center align-items-center"><input
                            type="checkbox" class="input-size"></input></div>
                    <div class="col-1 d-flex justify-content-start align-items-center"><img
                            src="{{ asset($item->img_path) }}" class="img-size"></div>
                    <div class="col-2 d-flex justify-content-start align-items-center">{{ $item->name }}
                    </div>
                    <div class="col-2 d-flex justify-content-start align-items-center">{{ $item->descr }}
                    </div>
                    <div class="col-2 d-flex justify-content-start align-items-center">
                        {{ $item->created_at->format('Y-m-d') }}
                    </div>
                    <div class="col-1 d-flex justify-content-center align-items-center">
                        @if ($item->status == 1)
                            <span class="px-1 bg-green rounded">已上架</span>
                        @else
                            <span class="px-1 rounded">未上架</span>
                        @endif
                    </div>
                    <div class="col-1 d-flex justify-content-center align-items-center">
                        ${{ $item->price }}</div>
                    <div class="col-2 d-flex justify-content-center align-items-center flex-wrap">
                        <a href="{{ route('cartEdit', ['id' => $item->id]) }}">
                            <button type="button"
                                class="btn mb-2 btn-success  btn-success-self">Edit</button>
                        </a>
                        <form action="{{ route('cartDestroy', ['id' => $item->id]) }}" method="post">
                            @csrf
                            <button type="submit"
                                class="btn  btn-success  btn-success-self">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    {{-- 頁數 --}}
    <div class="row no-hover py-4 px-3 align-items-center">
        <div class="col-6 col-md-6 fs-14-self text-secondary">Showing 1 to 8 of 12 entries</div>
        <div class="col-6 offset-md-2 col-md-4">
            <div aria-label="Page navigation example">

                {{ $search->links() }}
                {{-- <ul class="pagination  px-0 m-0 ">
                    <li class="page-item "><a class="page-link py-2 rounded-2 text-secondary"
                            href="#">Previous</a></li>
                    <li class="page-item "><a class="page-link py-2 ms-1 rounded-2 text-secondary "
                            href="#">1</a></li>
                    <li class="page-item"><a class="page-link py-2 ms-1 rounded-2 text-secondary"
                            href="#">2</a></li>
                    <li class="page-item"><a class="page-link py-2 ms-1 rounded-2 text-secondary"
                            href="#">3</a></li>
                    <li class="page-item"><a class="page-link py-2 ms-1 rounded-2 text-secondary"
                            href="#">Next</a></li>
                </ul> --}}
            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection





        <script>
            // 縮小時左邊侧欄出現
            {
                let appear = document.querySelectorAll('.appear');
                let faIndent = document.querySelector('.fa-indent');
                let login = document.querySelector('.login.ms-4.position-relative');

                console.log(appear);

                faIndent.addEventListener('click', () => {
                    appear[0].classList.toggle('d-block');
                })

                login.addEventListener('click', () => {
                    appear[1].classList.toggle('d-block');
                })
            }

            // 購物清單上點選第一行的checkbox後面的都會被勾選，或取消勾選
            {
                let inputAll = document.querySelector('.input-1');
                let inputSize = document.querySelectorAll('.input-size');

                inputAll.addEventListener('change', function() {
                    const isChecked = this.checked;


                    inputSize.forEach(checkbox => {
                        checkbox.checked = isChecked;
                    });
                });
            }
        </script>











        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>

</body>

</html>
