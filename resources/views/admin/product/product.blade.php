@extends('admin.master')
@section('title')
    Product
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
                    <form class="form-horizontal" action="{{route('store.product')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control" rows="5" name="name" id="name" placeholder="Product Name">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" class="form-control" rows="5" name="price" id="price" min="0" placeholder="Product Price">
                        </div>
                        <div class="form-group">
                            <label>Discount Price</label>
                            <input type="number" class="form-control" rows="5" name="discount_price" id="price" min="0" placeholder="Product Price">
                        </div>
                        <div class="form-group">
                            <label>Product Image One</label>
                            <input type="file" name="image1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Product Image Two</label>
                            <input type="file" name="image2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Product Image Three</label>
                            <input type="file" name="image3" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Select Category</label>
                            <select class="form-control" name="category_id">
                                <option value="" disabled selected>Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Product Details one</label>
                            <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="details1"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Product Details Two</label>
                            <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="details2"></textarea>
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
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                    <tr>

                        <th>Name</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>price</th>
                        <th>Discount Price</th>
                        <th>Active/Deactive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name ?? null }}</td>
                            <td><img src="{{ asset($product->image1?? null) }}" style="height: 100px"></td>
                            <td>{{$product->category->name?? null}}</td>
                            <td>{{$product->price?? null}}</td>
                            <td>{{$product->discount_price?? null}}</td>
                            <td>
                                @if ($product->status == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($product->status == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('edit.product',['id'=>$product->id?? null]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
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
