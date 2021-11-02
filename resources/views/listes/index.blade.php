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
            padding: 5px;
            border-radius: 5px;
            font-size: 10px;

        }

        #dataTableBuilder_paginate .active a{
            background-color: var(--success)!important;
        }

    </style>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Listes</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-md-4">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             Listes
                            @if (Auth::user()->email == 'challengesh.info@gmail.com')
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

                  @if (isset($liste))

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <strong>{{ $liste->nom }}</strong>
                            </div>
                            <div class="card-body">
                                @include('listes.show_fields')
                            </div>
                        </div>
                    </div>

                  @endif


             </div>
         </div>
    </div>
@endsection

