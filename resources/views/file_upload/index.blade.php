@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header bg-secondary text-white">Select Service Providers</div>

                <div class="card-body ">

                        <div class="form-group row justify-content-center">

                            <div class="btn-group">
                                <a class="btn btn-info" href="{{ route('getfolders') }}"> 
                                    <i class="fa fa-google"></i>  Drive
                                </a>

                                <a class="btn btn-info" href> 
                                    <i class="fa fa-dropbox"></i> Dropbox
                                </a>
                                
                            </div>

                        </div>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')

{{ Html::script('mpa/file_manager/controller.js') }}

@endpush