@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('ลงทะเบียนผู้สมัคร') }}</div>

                    <div class="card-body">

                        <form action={{ route('register') }} method="POST">
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @if (Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="exampleInputEmail1">ชื่อจริง</label>
                                <input name="firstname" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="" required>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">นามสกุล</label>
                                <input name="lastname" type="text" class="form-control" id="exampleInputPassword1"
                                    placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">ระดับการศึกษา</label>
                                <select name="edu_level" class="form-control" id="exampleFormControlSelect1">
                                    <option value="ม.6">ม.6</option>
                                    <option value="ปวช.">ปวช.</option>
                                    <option value="ปวส.">ปวส.</option>
                                    <option value="ปริญญาตรี">ปริญญาตรี</option>
                                    <option value="ปริญญาโท">ปริญญาโท</option>
                                    <option value="ปริญญาเอก">ปริญญาเอก</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">เลือกพรรค</label>
                                <select name="groupid" class="form-control" id="exampleFormControlSelect1">

                                    @foreach ($groupnames as $groupname)
                                        <option value={{ $groupname->id }}>{{ $groupname->id }}
                                            {{ $groupname->groupname }}</option>
                                    @endforeach


                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">ยืนยัน</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
