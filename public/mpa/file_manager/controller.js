(function() {
    'use strict';

    angular
        .module('meshdrive')
        .controller('FileManagerController', FileManagerController);

        FileManagerController.$inject = [ 'DataService', '$scope', 'API_ROUTE_PREFIX' ];

    function FileManagerController( DataService, $scope, API_ROUTE_PREFIX ) 
    {
        var vm = this;
        vm.authGoogleDrive = authGoogleDrive; 

        function authGoogleDrive()
        {
            DataService.http('GET', API_ROUTE_PREFIX + "getfolders" )
            .then(
                function(data) 
                {
                   console.log( data );
                },
                function(errResponse) 
                {
                    console.error('Error while fetching Notes');
                }
            );
            
        }

    }

})();