var app = angular.module('myapp',['angularUtils.directives.dirPagination']);
                app.controller('mycontroller',function($scope,$http)
                {
                $scope.q="";
                var api = 'http://127.0.0.1:8000/api/news/';
                var api1 = 'http://127.0.0.1:8000/api/loaitins/';
                var loadData = function(){
                    $http({
                        method:'GET',
                        url:api
                    }).then(function(res){
                        $scope.news = res.data;

                    });
                    $http({
                        method:'GET',
                        url:api1
                    }).then(function(res){
                        $scope.loaitin = res.data;
                    });
                }
                loadData();

                $scope.currentPage = 1;
                $scope.pageChangeHandler = function(num) {
                        $scope.currentPage = num;
                    };
                $scope.pageSize = 10;
                
                $scope.showModal = function(id) {
                    $scope.id = id;
                    if (id == 0) {
                        $scope.modaltitle = "Thêm news mới";
                        if ($scope.tt) {
                            delete $scope.tt;
                        }
                    } else {
                        $scope.modaltitle = "Sửa thông tin news";
                        $http({
                            method: "GET",
                            url: api + id
                        }).then(function(res) {
                            $scope.tt = res.data;
                        });
                    }
                    $('#modelId').modal('show');
                }

                $scope.saveData = function() {
                    var m = $scope.id == 0 ? "POST" : "PUT";
                    var url = $scope.id == 0 ? api : api + $scope.id;
                    $http({
                        method: m,
                        url: url,
                        data: $scope.tt,
                        'content-Type': 'application/json'

                    }).then(function(res) {
                        $scope.tt == res.data;
                    });
                    $('#modelId').modal('hide');
                    window.location.reload();
                }

                $scope.deleteClick = function(id) {
                    var hoi = confirm('Bạn có muốn xóa news này không?');
                    if (hoi) {
                        $http({
                            method: "DELETE",
                            url: api + id
                        }).then(function(res) {
                            $scope.message = res.data;
                            $scope.reloadData();
                        });
                    }
                    window.location.reload();
                }
                
                const fileUpload = document.querySelector("#file-upload");
        fileUpload.addEventListener("change", (e) => {
        const files = e.target.files;
        document.getElementById('image').innerHTML = `<img src="/resources/img/Tintuc/`+ files[0].name +`" alt="Ảnh" style="width:100%;height:100%">`;
        for(const file of files) {
            const {name, type, size, lastModified } = file;
            $scope.tt.image = file.name;
            document.getElementById('image').innerHTML = `<img src="/resources/img/Tintuc/`+ file.name +`" alt="Ảnh" style="width:100%;height:100%">`;
        };
    });
                
});