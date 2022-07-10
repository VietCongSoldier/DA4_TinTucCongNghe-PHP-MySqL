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
<p style="padding: 5px; font-size:30px;"> <i class="fa fa-table" style="margin:0 10px;"></i>  Quản lý sản phẩm</p>
<div style="display:flex; justify-content: space-between;">
    <p><button class="btn btn-success" ng-click="showModal(0)" style="width: 120px;  margin-left:50px;"> Thêm</button></p>
        
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="bg-primary text-white">
                    <tr>
                    <th>TT</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Mo Ta</th>
                    <th>Unit_Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr dir-paginate = "sp in sanpham |filter: q| itemsPerPage: pageSize" current-page="currentPage">
                    <td>@{{$index+1+(currentPage-1)*pageSize}}</td>
                    <td>@{{sp.id}}</td>
                    <td>@{{sp.name}}</td>
                    <td>@{{sp.mota_sp}}</td>
                    <td>@{{sp.unit_price}}</td>

                        <td><button class="btn btn-info" ng-click="showModal(sp.id)"><i class="fas fa-edit"></i></button></td>
                        <td><button class="btn btn-danger" ng-click="deleteClick(sp.id)"><i class="fas fa-trash-alt"></i></button></td>
                    </tr>
                </tbody>
            </table>
            <dir-pagination-controls max-size='5' id='abuttonv' on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls>
        </div>
    </div>
</div>


    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">@{{modalTitle}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                <div class="container-fluid">
                                <div class="form-group">

                                <label for="">Name: </label>
                                    <div><input type="text" ng-model="sp.name" class="form-control"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Mota: </label>
                                <div><input type="text" ng-model="sp.mota_sp" class="form-control"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">unit_price: </label>
                                    <div><input type="text" ng-model="sp.unit_price" class="form-control"></div>
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
            // Use above variables to manipulate the DOM
        });
    </script>
    <script src="/js/angular.min.js"></script>
    <script src="/js/sanphamcontroller.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>
@stop