
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
                        <form class="form-horizontal" action="{{route('store.receipt')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>@if(session()->get('language')=='bangla') পরিষেবা নির্বাচন করুন @else Select Service @endif</label>
                                <select class="form-control" name="service_id">
                                    <option value="" disabled selected>Select Service</option>
                                    @foreach($services as $service)
                                        <option value="{{$service->id}}">{{$service->service_title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>@if(session()->get('language')=='bangla') স্টুডেন্ট রোল নির্বাচন করুন @else Select Student Roll @endif</label>
                                <input type="text" name="roll" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>@if(session()->get('language')=='bangla') পরিমাণ @else Amount @endif</label>
                                <input type="text" name="amount" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>@if(session()->get('language')=='bangla')মাস নির্বাচন করুন @else Select Month @endif</label>
                                <input type="date" name="month" class="form-control">

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
                                <th>Service</th>
                                <th>Name</th>
                                <th>Month</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($receipts as $receipt)
                                <tr>
                                    <td>{{ $receipt->service->service_title ?? null }}</td>

                                    <td>{{\App\Models\User::where('roll_no',$receipt->roll)->first()->name ?? null}}</td>
                                    <td>{{$receipt->month ?? null}}</td>
                                    <td>{{$receipt->amount ?? null}}</td>
                                    <td>
                                        <a href="{{ route('view.receipt',['id'=>$receipt->id]) }}" class="btn btn-primary btn-sm editProduct"><i class="bi bi-printer"></i></a>

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
