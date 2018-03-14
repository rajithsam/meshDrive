(function() {
    'use strict';
    
        angular
            .module('meshdrive')
            .factory('DataService', DataService);
    
        DataService.$inject = ['$http', '$q' ];
        
        function DataService( $http, $q ) 
        {
            var service = {
                http : http
            };
            
            return service;
    
            function http( method, url, data ) {
                var request = {
                    method : method,
                    url  : url,
                    data : data,
                    cache: false
                }
                
                var promise = $http(request)
                                .then(
                                    function success(response)
                                    {
                                        if( method == 'HEAD' )
                                        {
                                            return response;
                                        }
                                        else
                                        {
                                            return response.data;
                                        }
                                    },
                                    function error()
                                    {
                                        console.log('Something went wrong!');
                                    }
                                );
                return promise;
            }
        }
    })();