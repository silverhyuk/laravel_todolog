@extends('layouts.app')

@section('title')
    프로젝트 생성
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create</div>

                    <div class="card-body">

                        <h3>프로젝트 등록</h3>

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('project.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="Project name">프로젝트 명</label>
                                <div>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="설명">설명</label>
                                <div>
                                    <textarea class="form-control" rows="5" name="description">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary">
                                        등록
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection