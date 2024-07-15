@extends('admin.master')
@section('title')
    Edit Product
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
                    <form class="form-horizontal" action="{{route('update.product')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id??null}}">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control" rows="5" name="name" value="{{$product->name??null}}" id="name" placeholder="Product Name">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" class="form-control" rows="5" name="price" value="{{$product->price??null}}" id="price" min="0" placeholder="Product Price">
                        </div>
                        <div class="form-group">
                            <label>Discount Price</label>
                            <input type="number" class="form-control" rows="5" value="{{$product->discount_price??null}}" name="discount_price" id="price" min="0" placeholder="Product Price">
                        </div>
                        <div class="form-group">
                            <label>Product Image One</label>
                            <input type="file" name="image1" class="form-control">
                            <img src="{{asset($product->image1??null)}}" height="100" width="100" class="my-3" alt="">
                        </div>
                        <div class="form-group">
                            <label>Product Image Two</label>
                            <input type="file" name="image2" class="form-control">
                            <img src="{{asset($product->image2??null)}}" height="100" width="100" class="my-3" alt="">
                        </div>
                        <div class="form-group">
                            <label>Product Image Three</label>
                            <input type="file" name="image3" class="form-control">
                            <img src="{{asset($product->image3??null)}}" height="100" width="100" class="my-3" alt="">
                        </div>

                        <div class="form-group">
                            <label>Select Category</label>
                            <select class="form-control" name="category_id">
                                <option value="" disabled selected>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$product->category_id==$category->id?'selected':''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Product Details one</label>
                            <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="details1">{{$product->details1}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Product Details Two</label>
                            <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="details2">{{$product->details2}}</textarea>
                        </div>

                            <div class="form-group">
                                <label>Add to Homepage</label>
                                <select class="form-control" name="add_home">
                                    <option value="1" @if ($product->add_home == 1) selected @endif>Yes</option>
                                    <option value="0" @if ($product->add_home == 0) selected @endif>No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Active/Deactive</label>
                                <select class="form-control" name="status">
                                    <option value="1" @if ($product->status == 1) selected @endif>Active</option>
                                    <option value="0" @if ($product->status == 0) selected @endif>Deactive</option>
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

@endsection
