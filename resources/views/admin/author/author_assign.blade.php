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
                @if(session('exist'))
                    <div class="alert alert-danger" role="alert">
                        {{session('exist')}}
                    </div>
                @endif
                <div class="card-body ">
                    <form class="form-horizontal" action="{{route('author.assign.store')}}" enctype="multipart/form-data" method="POST">
                        @csrf

                        {{-- @if($about_data!=null)
                        <input type="hidden" value="{{$about_data->id}}" name="id">
                        @endif --}}

                        <div class="form-group">
                            <label>Select Author</label>
                            <select class="form-control" name="author">
                                <option>select</option>
                                @foreach ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->title }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select Publication</label>
                            <select class="form-control" name="publication">
                                <option>select</option>
                                @foreach ($publications as $publication)
                                <option value="{{ $publication->id }}">{{ $publication->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label>About Image One</label>
                            <input type="file" name="image1" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>About Image Two</label>
                            <input type="file" name="image2" class="form-control">
                        </div>


                        <div class="form-group">
                            <label>About Details</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="details1" ></textarea>
                        </div>

                        <h3>Details page information</h3>
                        <div class="form-group">
                            <label>About Banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div> --}}


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

                        <th>Author</th>
                        <th>Publication</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($assigns as $assign)
                        <tr>

                            <td>{{ $assign->author->title ?? null }}</td>
                            <td>{{ $assign->publication->title ?? null }}</td>


                            <td>
                                <a href="{{ route('edit.about',['id'=>$assign->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>
                                <a href="{{ route('delete.about',['id'=>$assign->id]) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm editProduct">Delete</a>

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
