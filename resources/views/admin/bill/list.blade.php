@extends('admin.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ __('text.bill') }}
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
                        <th>ID</th>
                        <th>{{ __('text.user') }}</th>
                        <th>{{ __('text.note') }}</th>
                        <th>{{ __('text.payment') }}</th> 
                        <th>{{ __('text.total') }}</th>
                        <th>{{ __('text.status') }}</th>
                        <th>{{ __('text.detail') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list_bill as $bill)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $bill->id }}</td>
                        <td>{{ $bill->user->name }}</td>
                        <td>{{ $bill->note }}</td>
                        <td>{{ $bill->method_of_payment }}</td>
                        <td>{{ $bill->total_amount }}</td>
                        <td>{{ $bill->billStatus->last()->status->name }}</td>
                        <td class="center">
                            <i class="fa fa-pencil fa-fw"></i>
                            <a href="{{ route('getDetailBill', ['id' => $bill->id]) }}">{{ __('text.detail') }}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
