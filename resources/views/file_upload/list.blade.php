@extends('layouts.app')

@section('content')

<div class="container">

        <h3>List Files</h3>

        <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
        
        <ul id="files" class="row">

            @foreach( $files as $file )
            
            <li class="col-sm-3 card" style="margin: 10px;">

                <div class="card-body">

                    <div class="card-title">
                        <img src="{{ $file->iconLink }}">
                        {{ $file->name }}

                    </div>
                    
                </div>  

                <div class="">
                   
                    @if($file->mimeType == 'application/vnd.google-apps.folder' )
                        <a href="{{ url('/listFilesInFolder/'.$file->id) }}"
                            class="btn btn-info card-link">
                            <i class="fa fa-eye"></i>  Open
                        </a>
                    @endif

                    @if($file->mimeType != 'application/vnd.google-apps.folder')
                        <a href="{{ $file->webViewLink }}" 
                            target="_blank"
                            class="btn btn-info card-link">
                            <i class="fa fa-eye"></i>  View
                        </a>
                    @endif

                    @if(!empty($file->webContentLink))

                        <a href="{{ $file->webContentLink }}" 
                           target="_blank"
                           class="btn btn-info card-link">
                           <i class="fa fa-download"></i>  Download
                        </a>

                    @endif
                </div>

               
                
            </li>
            
            @endforeach
            
        </ul>
            
</div>

@endsection