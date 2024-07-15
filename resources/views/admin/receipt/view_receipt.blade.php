<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    @php $logo = \App\Models\Logo::latest()->first() @endphp

    <link rel="shortcut icon" type="image/x-icon" href="{{asset($logo->favicon??null)}}">
    @php $logo = \App\Models\Logo::latest()->first() @endphp
    <title>{{$logo->site_name}}</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    @include('admin.include.style')
    <script src="https://cdn.tiny.cloud/1/xp4eyn58se6am9fbdbbxgjh7cqbmfvr6jk7dtkc90050c2wb/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    {{-- bootstrap cdn --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- fontawesome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />



</head>

<body class="skin-blue fixed-layout">

    <span><a href="javascript:window.print()" class="btn btn-primary d-print-none" style="float: right; margin-right:150px;margin-top:5px">Print</a></span>

 <div class="container" style="height: 100vh;">   
     <img src="{{asset('/')}}reciept/dd.png" width="100%" alt="header">

     <div style="margin-top: 50px;padding: 0px 30px;position: relative">
         <p><b>নাম:&nbsp;&nbsp;</b>{{\App\Models\User::where('roll_no',$receipt->roll)->first()->name}}</p>
         <p><b>কাজের নাম:&nbsp;&nbsp;</b>{{ $receipt->service->service_title ?? null }}</p>
         <p><b>মাস:&nbsp;&nbsp;</b>{{$receipt->month ?? null}}</p>
         <p><b>পরিশোধিত পরিমাণ:&nbsp;&nbsp;</b>৳ {{$receipt->amount ?? null}}</p>
     </div>

    <div style="position: absolute;left: 17%;top:35% ;height: 450px;width: 450px; background-image: url('{{asset('/')}}reciept/dd1.png');background-size: contain;background-position: center;background-repeat: no-repeat"></div>



     <div style="display: flex;justify-content: space-between;position: relative; top: 57%;padding: 0px 30px;">
         <div>
             <p>ছাত্রের স্বাক্ষর</p>
         </div>
         <div>
             <p>মালিকের স্বাক্ষর</p>
         </div>
     </div>

 </div>
@include('admin.include.script')
{{--@include('sweetalert::alert')--}}
@include('sweetalert::alert')

</body>

<script>
    tinymce.init({
        selector: 'textarea#tinymce',
        height: 500
    });
</script>
{{--<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>--}}

</html>
