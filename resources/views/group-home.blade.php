@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Group Home') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="text-success">{{ __('ลงสมัครสำเร็จ') }}</div><br>
                        @foreach ($getdatas as $getdata)
                            <p>เลขที่ผู้สมัคร : {{ $getdata->id }}</p><br>
                            <p>ชื่อผู้สมัคร : {{ $getdata->firstname }} {{ $getdata->lastname }}</p><br>
                            <p>ชื่อพรรค : {{ $getdata->group->groupname }}</p><br>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
