@extends('admin.master.index')


@section('title')
    پنل ادمین - دسته بندی های {!! $aService['title'] !!}
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center mt-3"> دسته بندی های {!! $aService['title'] !!}</h1>
    </div>
    <div class="container m-5">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            افزودن دسته بندی
        </button>

        <!-- Modal -->
        <div style="z-index: 100000" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">اطلاعات دسته بندی</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form method="post" id="my-form" action="{{ route('menus.store') }}">
                                @csrf
                                @method('post')
                                <input type="hidden" name="name_services_id" value="{{ $id }}">
                                <label class="mt-3 p-2 badge badge-danger">عنوان</label>
                                <input type="text" name="title" class="form-control mt-1">
                                <label class="mt-3 p-2 badge badge-danger">اولویت (عدد)</label>
                                <input type="number" name="sort" class="form-control mt-1">
                                <label class="mt-3 p-2 badge badge-danger">توضیحات  (اختیاری)</label>
                                <textarea style="min-height: 200px" name="description" class="form-control"></textarea>
                                <button type="submit" class="form-control mt-4 btn btn-success" >ارسال</button>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">کنسل</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <table class="table table-success table-striped">
            <thead>
            <tr>
                <th scope="col">عنوان</th>
                <th scope="col">وضعیت ها</th>
            </tr>
            </thead>
            <tbody>
                @foreach($aMenue as $item)
                    <tr>
                        <td>{!! $item['title'] !!}</td>
                        <td>
                            <button class="btn btn-success"><a class="text-white" href="{{ route('menus.edit',$item['id']) }}">آپدیت</a></button>
                            <button onclick="deleteMenu({{ $item['id'] }})" class="btn btn-danger m-3">حذف</button>
                            <form id="menu-{{ $item['id'] }}" method="post" action="{{ route('menus.destroy',$item['id']) }}" class="form-horizontal">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="container">
            {{ $aMenue->links() }}
        </div>
    </div>
    <script>
        function deleteMenu(id){
            event.preventDefault();
            Swal.fire({
                title: "مطمئن هستید",
                text: "با حذف این خدمت کل اطلاعات مربوطه حذف می شوند",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.querySelector("#menu-"+id).submit();
                }
            });
        }
        @if(session('status'))
        Swal.fire({
            title: "وضیعت",
            text: "{{ session('status') }}",
            icon: "success"
        });
        @endif
    </script>
@endsection
