@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('ลงทะเบียนผู้สมัคร') }}</div>

                    <div class="card-body">
                        {{-- {{ __('register page') }} --}}
                        <form action={{ route('register.group') }} method="POST">
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @if (Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="exampleInputEmail1">ชื่อพรรค</label>
                                <input name="groupname" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="">
                                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                            </div>


                            <button type="submit" class="btn btn-primary">ลงทะเบียนพรรค</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
