(function () {
    'use strict';
    angular
        .module('meshdrive', [])
        .constant('API_ROUTE_PREFIX', '/meshDrive/public/')
        .config(['$httpProvider', function( $httpProvider ) 
        {
            $httpProvider.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
            // $httpProvider.defaults.headers.common["If-Modified-Since"] = 'Tue, 18 Apr 2020 05:00:00 GMT';
            // $httpProvider.defaults.headers.common['Expires']          = '99999999999999999999999999';  
            // $httpProvider.defaults.headers.common['Cache-Control']    = 'max-age=0';
             $httpProvider.defaults.headers.common["If-Modified-Since"] = 'Mon, 26 Jul 1997 05:00:00 GMT';
            // $httpProvider.defaults.headers.common['Pragma']           = 'no-cache';
            // $httpProvider.defaults.headers.common['Cache-Control']    = 'no-cache, no-store, must-revalidate';
        }]);
})();