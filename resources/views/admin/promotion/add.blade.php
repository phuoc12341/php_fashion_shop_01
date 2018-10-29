@extends('admin.index')

@section ('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ __('text.promotion') }}
                    <small>{{ __('text.add') }}
                    </small>
                </h1>

            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                    {{ $err }}<br>
                    @endforeach
                </div>
                @endif

                @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif

                {!! Form::open(['url' => 'admin/promotion/add']) !!}
                <div class="form-group">
                    {!! Form::label('description', __('text.description')) !!}
                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('discount', __('text.discount')) !!}
                    {!! Form::text('discount', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('start_at', __('text.start_at')) !!}
                    {!! Form::date('start_at', null, ['class' => 'form-control']) !!}  
                </div>                             
                <div class="form-group"
                {!! Form::label('end_at', __('text.end_at')) !!}
                {!! Form::date('end_at', null, ['class' => 'form-control']) !!}  
            </div> 
            {!! Form::submit(__('text.add'), ['class' => 'btn btn-default']) !!}
            {!! Form::reset(__('text.reset'), ['class' => 'btn btn-default']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
