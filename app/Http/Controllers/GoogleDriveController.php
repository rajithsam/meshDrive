<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\GDrive;
use Carbon\Carbon;
use Auth;

class GoogleDriveController extends Controller
{

    function getfolders( GDrive $gdrive, Request $request )
    {
        $client = $gdrive->client();

        $client->setAccessToken( Auth::user()->access_token );

        $drive = $gdrive->drive( $client );
        
        $result = [];

        $pageToken = NULL;

        $three_months_ago = Carbon::now()->subMonths(3)->toRfc3339String();

        do 
        {
            try 
            {
                
                $parameters = [
                    //'q' => "viewedByMeTime >= '$three_months_ago' or modifiedTime >= '$three_months_ago'",
                    //'q' => "mimeType ='application/vnd.google-apps.folder'",
                    'spaces' => 'drive',
                    //'q' => "'0B9rRrYnodZPFQVhSckJoV1pOZXM' in parents",
                    'orderBy' => 'folder',
                    'fields' => 'nextPageToken, files(id, parents, name, mimeType, modifiedTime, iconLink, webViewLink, webContentLink)',
                ];

                if ($pageToken) 
                {
                    $parameters['pageToken'] = $pageToken;
                }

                $result = $drive->files->listFiles( $parameters );

                //$result = $drive->files->listFiles( $parameters );

                $files = $result->files;

                $pageToken = $result->getNextPageToken();

            } 
            catch (Exception $e) 
            {
                return redirect('/getfolders')->with('message',
                    [
                        'type' => 'error',
                        'text' => 'Something went wrong while trying to list the files'
                    ]
                );

                $pageToken = NULL;
            }
        } 
        while ($pageToken);
       
        $page_data = [
            'files' => $files
        ];

        return view('file_upload.list', $page_data);
    }

    function listFilesInFolder( GDrive $gdrive, $folderId )
    {
        
        $client = $gdrive->client();

        $client->setAccessToken( Auth::user()->access_token );

        $drive = $gdrive->drive( $client );
        
        $result = [];

        $pageToken = NULL;

        $three_months_ago = Carbon::now()->subMonths(3)->toRfc3339String();

        do 
        {
            try 
            {
                
                $parameters = [
                    //'q' => "viewedByMeTime >= '$three_months_ago' or modifiedTime >= '$three_months_ago'",
                    //'q' => "mimeType ='application/vnd.google-apps.folder'",
                    'spaces' => 'drive',
                    //'q' => "'0B9rRrYnodZPFQVhSckJoV1pOZXM' in parents",
                    'orderBy' => 'folder',
                    'fields' => 'nextPageToken, files(id, parents, name, mimeType, modifiedTime, iconLink, webViewLink, webContentLink)',
                ];
                
                if ($folderId) 
                {
                    $parameters['q'] = "'".$folderId."' in parents";
                }

                if ($pageToken) 
                {
                    $parameters['pageToken'] = $pageToken;
                }

                $result = $drive->files->listFiles( $parameters );

                //$result = $drive->files->listFiles( $parameters );

                $files = $result->files;

                $pageToken = $result->getNextPageToken();

            } 
            catch (Exception $e) 
            {
                return redirect('/getfolders')->with('message',
                    [
                        'type' => 'error',
                        'text' => 'Something went wrong while trying to list the files'
                    ]
                );

                $pageToken = NULL;
            }
        } 
        while ($pageToken);
       
        $page_data = [
            'files' => $files
        ];

        return view('file_upload.list', $page_data);

    }
}
