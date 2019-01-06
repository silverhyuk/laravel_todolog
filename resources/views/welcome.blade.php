@extends('layouts.app')

{{-- 1 --}}
@section('title')
    웰컴 페이지
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">라라벨 Todo 사이트</div>

                    <div class="card-body">
                        <div class="container">
                            총 가입자 수 : {{ $total['user'] }}</p> {{-- 3 --}}
                            프로젝트  수 : {{ $total['project'] }}</p>
                            Task     수 : {{ $total['task'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection