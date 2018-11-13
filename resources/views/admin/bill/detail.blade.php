@extends('admin.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ __('text.bill_detail') }}
                    <small>{{ __('text.list') }}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>{{ __('text.product_name') }}</th>
                        <th>{{ __('text.color') }}</th>
                        <th>{{ __('text.size') }}</th> 
                        <th>{{ __('text.quantity') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bill->billProducts as $detail)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $detail->product->name }}
                            <p><img width="100px" src="{{ config('image.image.product') }}/{{ ($detail->productColor->productImages->first())->image }}" alt=""></p>
                        </td>
                        <td>{{ $detail->productColor }}</td>
                        <td>{{ $detail->productSize }}</td>
                        <td>{{ $detail->quantity }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

                {!! Form::open(['url' => 'admin/bill/detail/' . $bill->id]) !!}
                <div class="form-group">
                    {!! Form::label(null, __('text.bill_status')) !!}
                    {!! Form::select('status', $status->pluck('name', 'id'), $bill->billStatus->last()->status->id, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit(__('text.update_status'), ['class' => 'btn btn-default']) !!}
                {!! Form::close() !!}
                
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection

@section('script')
    
@endsection
