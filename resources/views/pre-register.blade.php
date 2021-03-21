@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('ลงทะเบียนผู้สมัคร') }}</div>

                    <div class="card-body">
                        {{-- {{ __('register page') }} --}}

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <a href={{ route('register.group.show') }} type="button"
                            class="btn btn-primary">ลงสมัครเป็นคนแรกของพรรค</a>
                        <a href={{ route('register') }} class="btn btn-success">มีพรรคเเล้ว</a>

                    </div>

                </div>
            </div>
        </div>
        <div class="row justify-content-center my-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('สุ่มคะแนน') }}</div>
                    <div class="card-body">
                        @if (Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @endif
                        @if (isset($getName))
                            @foreach ($getName as $item)
                                @if ($item->amount < 11)
                                    <button type="submit" class="btn btn-warning disabled">สุ่มการลงคะแนนเลือกตั้ง</button>
                                @else
                                    <form action={{ route('reset') }} method="get">
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-warning">สุ่มการลงคะแนนเลือกตั้ง</button>
                                    </form>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </div>
        <div class="row justify-content-center my-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('พรรคที่ได้คะแนนสูงสุด') }}</div>
                    <div class="card-body">
                        @if (isset($getName))

                            @foreach ($getName as $item)

                                @if ($item->amount == 11)
                                    <h5>เลขที่พรรค : {{ $item->id }}</h5> <br>
                                    <h5>ชื่อพรรค : {{ $item->groupname }}</h5>
                                @endif
                            @endforeach
                        @endif
                    </div>

                </div>
            </div>
        </div>
    @endsection
