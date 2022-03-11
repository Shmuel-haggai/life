@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.listes.index') }}">Liste</a>
            </li>
            <li class="breadcrumb-item active">Detail</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-align-justify"></i>
                                Listes
                                @if (Auth::user()->isAdmin())
                                <a class="pull-right" href="{{ route('admin.listes.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
                                @endif
                            </div>
                            <div class="card-body">
                                @include('listes.table')
                                 <div class="pull-right mr-3">

                                 </div>
                            </div>
                        </div>
                     </div>
                     <div class="col-md-7">
                         <div class="card">
                             <div class="card-header">
                                 <strong>Details</strong>
                                  <a href="{{ route('admin.listes.index') }}" class="btn btn-light">Back</a>
                             </div>
                             <div class="card-body">
                                 @include('listes.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
