@extends('admin.master')
@section('body')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="table-responsive m-t-40">
                        <table id="config-table" class="table display table-striped border no-wrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Order Author</th>
                                <th>Publication</th>
                                <th>Title</th>
                                <th>name</th>
                                <th>phone</th>
                                <th>screenshot</th>

        {{--                        <th>Details</th>--}}
                                <th>Active/Deactive</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id ?? null }}</td>
                                    <td>{{ $order->author->title ?? null }}</td>
                                    <td><img src="{{ asset($order->publication->main_image) }}" alt="" width="100px"></td>
                                    <td>{{ Str::limit($order->publication->title ?? '', 30) }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->number }}</td>
                                   <td>

                                    <img src="{{ asset('admin/payment/' . $order->img) }}" style="height: 50px">
                                </td>

        {{--                            <td>{!! $blog->short_details ?? null !!}</td>--}}
                                    <td>
                                        @if($order->status==1)
                                <a href="{{ route('order.author.status',$order->id) }}" class="btn btn-success btn-sm"  onclick="return confirm('Are you Sure')">Confirm</a>
                                 @else
                                <a href="{{ route('order.author.status',$order->id) }}" class="btn btn-danger btn-sm"  onclick="return confirm('Are you Sure')">Pending</a>
                                      @endif
                                    </td>
                                    {{-- <td>
                                        <a href="{{ route('edit.blogs',['id'=>$order->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

                                    </td> --}}
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>
@endsection
