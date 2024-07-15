@extends('admin.master')
@section('title')
    Category Edit
@endsection
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
                    <form class="form-horizontal" action="{{route('update.category')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" value="{{$category->id??null}}" name="id">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" rows="5" name="name" value="{{$category->name??null}}" id="name" placeholder="Category Name">
                        </div>

                        <div class="form-group">
                            <label>Category Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <img src="{{asset($category->image)}}" class="mb-2" height="100" width="100" alt="">

                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="status">
                                <option value="1" @if ($category->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($category->status == 0) selected @endif>Deactive</option>
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

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>
@endsection
