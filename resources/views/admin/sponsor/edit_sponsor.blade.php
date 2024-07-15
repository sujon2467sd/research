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
                    <form class="form-horizontal" action="{{route('update.sponsor')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$sponsor->id}}">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" rows="5" value="{{$sponsor->title}}" name="title" id="title" placeholder="Sponsor Title">
                        </div>
                        <div class="form-group">
                            <label>Title Bengali</label>
                            <input type="text" class="form-control" rows="5" value="{{$sponsor->title_bangla}}" name="title_bangla" id="title" placeholder="Sponsor Title Bengali">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                            <img class="mt-3" src="{{asset($sponsor->image)}}" alt="img" height="100px" width="100px">
                        </div>

                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="add_home">
                                <option value="1" @if ($sponsor->add_home == 1) selected @endif>Yes</option>
                                <option value="0" @if ($sponsor->add_home == 0) selected @endif>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="status">
                                <option value="1" @if ($sponsor->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($sponsor->status == 0) selected @endif>Deactive</option>
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
