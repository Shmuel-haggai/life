@extends('layouts.app')

@section('content')
<style>
    #dataTableBuilder_filter{
        margin: 1rem 0;
    }

    #dataTableBuilder_paginate{
        display: block;
        margin: 1rem auto;
    }

    #dataTableBuilder_paginate a{
        color: #fff;
        background-color: var(--primary);
        margin-left: 0.3rem;
        padding: 10px;
        border-radius: 5px;
        font-size: 10px;

    }

    #dataTableBuilder_paginate .active a{
        background-color: var(--success)!important;
    }

</style>
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

                             <a class="pull-right" href="{{ route('admin.photos.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>

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

