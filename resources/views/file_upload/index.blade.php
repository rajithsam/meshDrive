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

                                <button type="button" class="btn btn-info"> 
                                    <i class="fa fa-google"></i>  Drive
                                </button>

                                <button type="button" class="btn btn-info"> 
                                    <i class="fa fa-dropbox"></i> Dropbox
                                </button>
                                
                            </div>

                        </div>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection