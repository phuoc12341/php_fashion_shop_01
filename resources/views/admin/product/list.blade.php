@extends('admin.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ __('text.product') }}
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
                            <th>{{ __('text.id') }}</th>
                            <th>{{ __('text.name') }}</th>
                            <th>{{ __('text.category') }}</th>
                            <th>{{ __('text.brief_description') }}</th>
                            <th>{{ __('text.unit_price') }}</th>
                            <th>{{ __('text.viewed_count') }}</th>
                            <th>{{ __('text.purchased_count') }}</th>
                            <th>{{ __('text.delete') }}</th>
                            <th>{{ __('text.edit') }}</th>                           
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($product_list as $prod)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $prod->id }}</td>
                            <td>{{ $prod->name }}
                                <p><img width="100px" src="{{config('image.image.product')}}/{{ (($prod->productColors->first())->productImages->first())->image }}" alt=""></p>
                            </td>
                            <td>{{ $prod->category->name }}</td>
                            <td>{{ $prod->brief_description }}</td>
                            <td>{{ $prod->unit_price }}</td>
                            <td>{{ $prod->viewed_count }}</td>
                            <td>{{ $prod->purchased_count }}</td>
                            <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="{{ route('getDeleteProduct', [$prod->id]) }}"> {{ __('text.delete') }}</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('getEditProduct', [$prod->id]) }}"> {{ __('text.edit') }}</a></td>
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
