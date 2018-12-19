@extends('layouts.master')
@section('title','Dashboard')
@section('page_css')
@endsection
@section('page')

<div class="card">
        <div class="card-header">
            <strong>Register Child</strong>
        </div>
        @if ( session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('childs.update',$child->id) }}" method="POST" class="form-horizontal">
        <div class="card-body card-block">

                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-email" class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="hf-email" value="{{ old('name',$child->name) }}" name="name" placeholder="Enter Name..." class="form-control">
                        @if ($errors->has('name'))
                        <span class="alert-danger" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-password" class=" form-control-label">Phone</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="tel" name="phone" value="{{ old('phone',$child->phone) }}" placeholder="Enter Phone..." class="form-control">
                        @if ($errors->has('phone'))
                        <span class="alert-danger" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-password" class=" form-control-label">Password</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="password" name="password" placeholder="Enter Password..." class="form-control">
                        @if ($errors->has('password'))
                        <span class="alert-danger" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-password" class=" form-control-label">Confirm Password</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="password" name="password_confirmation" placeholder="Confirm Password..." class="form-control">
                    </div>
                </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Submit
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
            </button>
        </div>
    </form>
    </div>


@endsection
@section('page_js')
@endsection
@section('models')

@endsection
