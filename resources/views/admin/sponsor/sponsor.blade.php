@extends('admin.master')
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">

                @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                @endif
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('store.sponsor')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" rows="5" name="title" id="title" placeholder="Sponsor Title">
                        </div>
                        <div class="form-group">
                            <label>Title Bengali</label>
                            <input type="text" class="form-control" rows="5" name="title_bangla" id="title" placeholder="Sponsor Title Bengali">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="add_home">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="table-responsive m-t-40">
                    <table id="config-table" class="table display table-striped border no-wrap">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Title Bengali</th>
                            <th>Image</th>

                            {{--                        <th>Details</th>--}}
                            <th>Active/Deactive</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($sponsors as $sponsor)
                            <tr>
                                <td>{{ $sponsor->title ?? null }}</td>
                                <td>{{ $sponsor->title_bangla ?? null }}</td>
                                <td><img src="{{ asset($sponsor->image) }}" style="height: 100px"></td>

                                {{--                            <td>{!! $blog->short_details ?? null !!}</td>--}}
                                <td>
                                    @if ($sponsor->status == 1)
                                        <button class="btn btn-sm btn-primary">Active</button>
                                    @elseif($sponsor->status == 0)
                                        <button class="btn btn-sm btn-danger">Deactive</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('edit.sponsor',['id'=>$sponsor->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
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
