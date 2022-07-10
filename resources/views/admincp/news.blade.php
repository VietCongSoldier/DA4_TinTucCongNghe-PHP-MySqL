@extends('_admin_layout')
@section('content')
<style>
    #abuttonv a {
            background-color: #fff;
            border: 1px solid #ddd;
            box-sizing: border-box;
            color: FFC800;
            cursor: pointer;
            display: inline-block;
            font-family: din-round,sans-serif;
            font-size: 15px;
            font-weight: 700;
            padding: 10px 12px;
            text-align: center;
            width: 100%;
            }
</style>
<p style="padding: 5px; font-size:30px;"> <i class="fa fa-table" style="margin:0 10px;"></i>  Quản lý tin tức</p>
<div style="display:flex; justify-content: space-between;">
    <p><button class="btn btn-success" ng-click="showModal(0)" style="width: 120px; margin-left:50px;"> Thêm</button></p>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>TT</th>
                        <th>ID</th>
                        <th>Numread</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Ảnh</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr dir-paginate = "tt in news |filter: q| itemsPerPage: pageSize" current-page="currentPage">
                        <td>@{{$index+1+(currentPage-1)*pageSize}}</td>
                        <td>@{{tt.id}}</td>
                        <td>@{{tt.numread}}</td>
                        <td>@{{tt.title}}</td>
                        <td>@{{tt.content}}</td>
                        <td><img src="\resources\img\Tintuc\@{{tt.image}}" style="width:150px" alt=""></td>
                        <td><button class="btn btn-info" ng-click="showModal(tt.id)"><i class="fas fa-edit"></i></button></td>
                        <td><button class="btn btn-danger" ng-click="deleteClick(tt.id)"><i class="fas fa-trash-alt"></i></button></td>
                    </tr>
                </tbody>
            </table>
            <dir-pagination-controls max-size='5' id='abuttonv' on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls>
        </div>
    </div>
</div>

<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">@{{modaltitle}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">id_loai_tin</label>
                            <div class="col-sm-9">
                                <select class="form-control" ng-model="tt.id_loai_tin">
                                    <option ng-repeat="tl in loaitin">@{{tl.tenloai}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="name" ng-model="tt.title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">numread</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="name" ng-model="tt.numread">
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Content</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="tt.content">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Ảnh:</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" id="file-upload" ng-model="tt.image">
                            </div>
                            </br>
                            <div style="width:100px; height:100px" id="image" class="col-sm-3">
                                <img src="\resources\img\Tintuc\@{{tt.image}}" alt="Ảnh" style="width:100%;height:100%" ng-model="tt.image">
                            </div>
                        </div>                 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" ng-click="saveData()">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
        });
    </script>
    <script src="/js/angular.min.js"></script>
    <script src="/js/newscontroller.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>
    </body>
</html>
@stop