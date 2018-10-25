@extends('admin.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ __('text.manufacturer') }}
                    <small>{{ __('text.list') }}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>{{ __('text.name') }}</th>
                        <th>{{ __('text.country') }}</th>
                        <th>{{ __('text.description') }}</th> 
                        <th>{{ __('text.delete') }}</th>
                        <th>{{ __('text.edit') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($manufacturer as $manu)
                    <tr class="odd gradeX" align="center">
                        <td>{{$manu->id}}</td>
                        <td>{{$manu->name}}</td>
                        <td>{{$manu->country}}</td>
                        <td>{{$manu->description}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('delete_manufacturer', $manu->id) }}"> {{ __('text.delete') }}</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('edit_manufacturer', $manu->id) }}">{{ __('text.edit') }}</a></td>
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
