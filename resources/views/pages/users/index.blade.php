@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card p-1">
            <div class="card-header m-0">
                <nav>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">{{__('menus.administration')}}</li>
                      <li class="breadcrumb-item active" aria-current="page">{{__('menus.users')}}</li>
                    </ol>
                </nav>
                <h2 class="page-header">
                    {{__('menus.users')}} 
                    <a href="{{route('users.create')}}" data-mdb-toggle="tooltip" data-mdb-placement="right" title="{{__('buttons.add_new')}}"><i class="text-primary fs-6 bi-person-plus"></i></a>
                </h2>
            </div>
        </div>
    </div>
</div>
@include('components.alerts')
<div class="row my-4">
    <div class="col-12">
        <div class="row my-3">
            <div class="col-sm-2">
                <button class="btn btn-round btn-primary"><i class="bi bi-gear"></i></button>
            </div>
            <div class="offset-sm-8 col-sm-2">
                <select class="form-select form-select-sm pagination-select float-right" aria-label=".form-select-sm example">
                    <option value="20" selected>20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="500">500</option>
                  </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-wave checktable">
                    <thead>
                      <tr>
                        <th class="headers" scope="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                            </div>
                        </th>
                        <th class="headers sorting" scope="col" style="width:30%"><a href="#">Basic data <i class="bi-sort-up"></i></a></th>
                        <th class="headers sorting" scope="col">Last</th>
                        <th class="headers sorting" scope="col">Handle</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr class="trow" onclick="location.href='{{route('home')}}'">
                            <th scope="row">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                </div>
                            </th>
                            <td>
                                <div class="row align-items-center">
                                    <div class="col-sm-2">
                                        <img class="rounded-circle" width="40" height="40" src="{{asset(auth()->user()->avatar)}}">
                                    </div>
                                    <div class="col-sm-10 lh-13">
                                        <div class="fw-bold">Damian Ułan</div>
                                        <div class="fs-7">damian.ulan@outlook.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                      <tr class="trow">
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                            </div>
                        </th>                                
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr class="trow">
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                            </div>
                        </th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                </table>
            </div>
            <div class="row pagination-bottom mt-2">
                <div class="col-md-12">
                    <a class="btn btn-primary btn-pagination float-right">1</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection