@extends('admin.master.index')


@section('title')
    پنل ادمین - وبلاگ های های {!! $aBlog['title'] !!}
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center mt-3"> وبلاگ های {!! $aBlog['title'] !!}</h1>
    </div>
    <div class="container float-right">
        <button class="btn btn-success"><a class="text-white" href="{{ route("blog.create",$id) }}">ایجاد مقاله</a></button>
    </div>
    <div class="container mt-5">
        {{ $aBlog->links() }}
    </div>
    <div class="container mt-5">
        <table class="table table-success table-striped">
            <thead>
            <tr>
                <th scope="col">عنوان</th>
                <th scope="col">عکس</th>
                <th scope="col">توضیحات</th>
                <th scope="col">وضعیت انتشار</th>
                <th scope="col">انتشار</th>
                <th scope="col">وضعیت ها</th>
            </tr>
            </thead>
            <tbody>
            @foreach($aBlog as $item)
                <tr>
                    <td>{!! $item['title'] !!}</td>
                    <td>
                        @if(file_exists($item['img']))
                            <img src="{{ url($item['img']) }}" width="100" height="100" class="img-fluid" />
                        @else
                            عکس ندارد
                        @endif
                    </td>
                    <td>{{ \Illuminate\Support\Str::limit($item['description'],30) }}</td>
                    <td>
                        @if($item['status'] == 1)
                            <p class="text-success">فعال</p>
                        @else
                            <p class="text-danger">غیر فعال</p>
                        @endif
                    </td>
                    <td>
                        @if($item['status'] == 1)
                            <a style="cursor: pointer" class="text-danger" onclick="activeBlog('{{ route('blog.status',$item['id']) }}')" class="text-success">غیر فعال کردن</a>
                        @endif
                        @if($item['status'] == 0)
                            <a style="cursor: pointer" class="text-success" onclick="dactiveBlog('{{ route('blog.status',$item['id']) }}')" class="text-danger"> فعال کردن</a>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-success"><a class="text-white" href="{{ route('blog.edit',$item['id']) }}">آپدیت</a></button>
                        <button onclick="deleteBlog({{ $item['id'] }})" class="btn btn-danger m-3">حذف</button>
                        <form id="blog-{{ $item['id'] }}" method="post" action="{{ route('blog.destroy',$item['id']) }}" class="form-horizontal">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <script>
        function activeBlog(id){
            event.preventDefault();
            Swal.fire({
                title: "مطمئن هستید",
                text: "با غیر فعال این مقاله کل اطلاعات مربوطه غیر فعال می شوند",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = id;
                }
            });
        }
        function dactiveBlog(id){
            event.preventDefault();

            Swal.fire({
                title: "مطمئن هستید",
                text: "با  فعال این مقاله کل اطلاعات مربوطه  فعال می شوند",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = id;
                }
            });
        }

        function deleteBlog(id){
            event.preventDefault();
            Swal.fire({
                title: "مطمئن هستید",
                text: "با حذف این مقاله کل اطلاعات مربوطه حذف می شوند",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.querySelector("#blog-"+id).submit();
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
