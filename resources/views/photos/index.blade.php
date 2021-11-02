@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Photos</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             Photos
                             @if (Auth::user()->email == 'challengesh.info@gmail.com')
                             <a class="pull-right" href="{{ route('admin.photos.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
                          @endif
                         </div>
                         <div class="card-body">
                             @include('photos.table')
                              <div class="pull-right mr-3">

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

