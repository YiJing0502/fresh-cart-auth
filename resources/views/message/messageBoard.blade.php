@extends('templates.fontTemplete')
@section('main-content')
    <section class="messageBoard">
        <div class="container">
            <div class="d-flex flex-column justify-content-center flex-wrap align-items-center">
                @foreach ($messages as $item)
                    <div class="card w-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->message }}</h5>
                            <form action="{{ route('messageUpdate', ['id' => $item->id]) }}" method="post"
                                class="mod-form d-none" data-id="{{ $item->id }}">
                                @csrf
                                @method('put')
                                <div class="form-floating mb-3">
                                    <input type="text" name="message" class="form-control" id="floatingInput"
                                        placeholder="修改您的訊息" value="{{ $item->message }}">
                                    <label for="floatingInput">修改訊息</label>
                                </div>
                                <button type="button" class="btn btn-primary cancel-mod"
                                    onclick="cancelMod({{ $item->id }})" data-id="{{ $item->id }}">取消修改</button>
                                <button type="submit" class="btn btn-primary submit-mod"
                                    onclick="submitMod({{ $item->id }})">確認修改</button>
                            </form>
                            {{-- 訊息的修改跟刪除 --}}
                            <div class="d-flex">

                                <button type="button" class="btn mb-2 btn-success  btn-success-self edit-mese"
                                    data-id="{{ $item->id }}" onclick="editMese({{ $item->id }})">Edit</button>

                                <form action="{{ route('messageDestroy', ['id' => $item->id]) }}" method="post"
                                    class="delete-alert" data-name="{{ $item->name }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn  btn-success  btn-success-self">Delete</button>
                                </form>

                            </div>
                            {{-- 回覆訊息初始 --}}
                            @foreach ($item->replyToMessage as $reply)
                                {{-- @dump($replys); --}}
                                {{-- $item->productTypeImg --}}
                                {{-- {{$reply->replyToMessage}} --}}
                                <h5 id="deleteCont{{$reply->id}}" class="card-title">{{ $reply->replay_message }}</h5>
                                {{-- 回覆的修改跟刪除 --}}
                                <form action="{{ route('replayUpdate', ['id' => $reply->id]) }}" method="post"
                                    class="mod-form d-none" id="replyForm{{ $reply->id }}"
                                    data-id="{{ $reply->id }}">
                                    @csrf
                                    @method('put')

                                    <div class="form-floating mb-3">
                                        <input type="text" name="reply" class="form-control" id="floatingInput"
                                            placeholder="修改您的訊息" value="{{ $reply->replay_message }}">
                                        <label for="floatingInput">編輯回覆</label>
                                    </div>
                                    <button type="button" id="cancelForm{{ $reply->id }}" class="btn btn-primary cancel-mod"
                                        onclick="cancelForm({{ $reply->id }})"
                                        data-id="{{ $reply->id }}">取消修改</button>
                                    <button type="submit" class="btn btn-primary submit-mod"
                                        onclick="submitMod({{ $reply->id }})">確認修改回覆</button>

                                    </form>
                                {{-- 回覆的修改跟刪除 --}}
                                <div id="deleteMaibBtn{{$reply->id}}" class="d-flex">
                                    <button type="button" class="btn mb-2 btn-success  btn-success-self"
                                        onclick="editReply({{ $reply->id }})">編輯</button>
                                    <button type="button" class="btn mb-2 btn-success  btn-success-self edit-mese"
                                        data-id="{{ $reply->id }}"
                                        onclick="editMese({{ $reply->id }})">儲存更動</button>
                                    <button type="button" class="btn  btn-success  btn-success-self" onclick="deleteReply({{ $reply->id }})">刪除吧</button>
                                </div>
                            @endforeach
                            <form action="{{ route('replayStore')}}" method="post">
                                @csrf
                                <input type="hidden" name="message_id" value="{{ $item->id }}">
                                <div class="form-floating mb-3">
                                    <input type="text" name="reply" class="form-control" id="floatingInput"
                                        placeholder="留下您的訊息">
                                    <label for="floatingInput">回覆留言板</label>
                                </div>
                                <button type="submit" class="btn btn-primary">傳送訊息</button>
                            </form>

                            {{-- <form action="{{route('messageStore')}}" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" name="message" class="form-control" id="floatingInput" placeholder="留下您的訊息">
                                <label for="floatingInput">回覆留言板</label>
                            </div>
                            <button type="submit" class="btn btn-primary">傳送訊息</button>
                        </form> --}}
                        </div>
                    </div>
                @endforeach
                {{-- 初始欄位 --}}
                <div class="card w-100">
                    <div class="card-body">
                        <form action="{{ route('messageStore') }}" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" name="message" class="form-control" id="floatingInput"
                                    placeholder="留下您的訊息">
                                <label for="floatingInput">留言板</label>
                            </div>
                            <button type="submit" class="btn btn-primary">傳送訊息</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function cancelMod(id) {
            console.log(`Canceling form with ID ${id}`);
            const form = document.querySelector(`.mod-form[data-id="${id}"]`);
            const cancel = document.querySelector(`.cancel-mod[data-id="${id}"]`);

            if (cancel) {
                form.classList.add('d-none');
            }

        }

        function editMese(id) {
            console.log(`editMesewith ID ${id}`);
            const form = document.querySelector(`.mod-form[data-id="${id}"]`);
            const editMese = document.querySelector(`.edit-mese[data-id="${id}"]`);

            if (editMese) {
                form.classList.remove('d-none');
            }

        }

        function submitMod(id) {
            console.log(`submitMod with ID ${id}`);
            const form = document.querySelector(`.mod-form[data-id="${id}"]`);
            const submit = document.querySelector(`.submit-mod[data-id="${id}"]`);

            if (submit) {
                form.classList.add('d-none');
            }

        }
        // 回覆的輸入表單出現或消失
        function editReply(id) {
            const replyForm = document.querySelector(`#replyForm${id}`);
            replyForm.classList.toggle('d-none');
            console.log(id);
        }
        // 回覆的取消按鈕，開關回覆的輸入表單出現或消失
        function cancelForm(id) {
            console.log(`Canceling form with ID ${id}`);
            const form = document.querySelector(`#replyForm${id}`);
            const cancelForm = document.querySelector(`#cancelForm${id}`);

            if (cancelForm) {
                form.classList.toggle('d-none');
            }

        }
        // 刪除回覆表單
        function deleteReply(id) {
            console.log(id);
            Swal.fire({
                title: '要刪？',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: '刪除',
                // denyButtonText: `刪除`,
            }).then((result) => {
                Swal.fire('執行刪除')
                const formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('_method', 'delete');
                fetch(`/message/reply/destroy/${id}`, {
                    method: 'POST',
                    body: formData,
                }).then((res) => {
                    return res.text();
                }).then((data) => {
                    console.log(data);
                    if(data != 'success') return
                    const replyForm = document.querySelector(`#replyForm${id}`);
                    const deleteBtn = document.querySelector(`#deleteMaibBtn${id}`);
                    const deleteCont = document.querySelector(`#deleteCont${id}`);
                    console.log(replyForm);
                    replyForm.remove();
                    deleteBtn.remove();
                    deleteCont.remove();

                });
                /* Read more about isConfirmed, isDenied below */
                if (result.isDenied) {
                    Swal.fire('noo')
                }
            })

        }
    </script>
@endsection
