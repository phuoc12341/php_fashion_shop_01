        
    @extends('admin.index')

    @section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{{ __('text.product') }}
                            <small>{{ __('text.add') }}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors-> all() as $message)
                                    {{$message}}<br>
                                @endforeach
                            </div>
                        @endif
                        @if(session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                        @endif
                        
                        {!! Form::open(['route' => 'postAddProduct', 'method' => 'post', 'files' => true]) !!}

                            @csrf

                            <div class="form-group">
                                {!! Form::label(null, __('text.product_name')) !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('text.enter_product_name')]) !!}
                            </div>

                            <div class="form-group">
                                @foreach ($list_top_category as $cat)
                                    {!! Form::label(null, null, ['class' => 'radio-inline']) !!}
                                    {!! Form::radio('top_category', $cat->id) !!} {{ $cat->name }}
                                @endforeach
                            </div>

                            <div class="form-group">
                                    {!! Form::label(null, __('text.parent_category')) !!}
                                    {!! Form::select('category', [''], null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label(null, __('text.unit_price')) !!}
                                {!! Form::number('unit_price', null, ['class' => 'form-control', 'placeholder' => __('text.enter_unit_price')]) !!}
                            </div>

                                <div class="form-group">
                                    {!! Form::label(null, __('text.manufacturer')) !!}
                                    {!! Form::select('manufacturer', [], null, ['class' => 'form-control']) !!}
                                </div>
            
                            <div class="form-group">
                                {!! Form::label(null, __('text.brief_description')) !!}
                                {!! Form::textarea('brief_description', null, ['class' => 'form-control', 'placeholder' => __('text.enter_brief_description')]) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label(null, __('text.color')) !!}
                                {!! Form::color('color', '#ff0000') !!}
                                <div class="form-group">
                                {!! Form::label(null, __('text.size')) !!}
                                {!! Form::text('size', null, ['class' => 'form-control', 'placeholder' => __('text.enter_size')]) !!}
                                </div>
                                <div class="form-group">
                                {!! Form::file('images[]', ['class' => 'form-control', 'multiple']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label(null, __('text.detailed_description')) !!}
                                {!! Form::textarea('detailed_description', null, ['class' => 'form-control ckeditor', 'placeholder' => __('text.enter_detailed_description')]) !!}
                            </div>
                            
                            {!! Form::submit(__('text.add_product'), ['class' => ['btn', 'btn-default']]) !!}
                            {!! Form::reset(__('text.reset'), ['class' => ['btn', 'btn-default']]) !!}
                        {!! Form::close() !!}

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    @endsection
    
    @section('script')
        <script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>
    @endsection
