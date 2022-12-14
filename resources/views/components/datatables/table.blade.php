@php
    $dir='asc';
    $currentPage = 1;
    if(isset($_GET['page'])){
        $currentPage = (int) filter_var($_GET['page'], FILTER_SANITIZE_NUMBER_INT);
    }
    if(isset($_GET['dir'])){
        if($_GET['dir'] === 'asc'){
            $dir = 'desc';
        } else {
            $dir = 'asc';
        }
    }
@endphp
<div class="row my-4">
    <div class="col-12">
        <div class="row my-3">
            <div class="col-sm-1">
                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-round btn-primary" data-bs-toggle="modal" data-bs-target="#columnChooser" data-mdb-toggle="tooltip" data-mdb-placement="bottom" data-mdb-original-title="{{__('menus.choose_columns')}}">
                            <i class="bi bi-gear"></i>
                        </button>
                    </div>
                    <div class="col-6 text-align-end">
                        <a class="btn btn-round btn-primary" data-mdb-toggle="collapse" href="#filters" role="button" aria-expanded="false" aria-controls="filters"><i class="bi bi-filter"></i></a>
                    </div>
                </div>
            </div>

            <div class="offset-sm-9 col-sm-2 mt-3">
                <select class="form-select form-select-sm pagination-select float-right" aria-label=".form-select-sm example" onchange="paginationSwitch(this)">
                    <option value="20"{{$pagination==20 ? ' selected':''}}>20</option>
                    <option value="50"{{$pagination==50 ? ' selected':''}}>50</option>
                    <option value="100"{{$pagination==100 ? ' selected':''}}>100</option>
                    <option value="200"{{$pagination==200 ? ' selected':''}}>200</option>
                    <option value="500"{{$pagination==500 ? ' selected':''}}>500</option>
                  </select>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="collapse mt-3" id="filters">
                    [[Show filters]]
                </div>
            </div>

        </div>
        <div class="row">
            <div class="row pagination-bottom my-1">
                <div class="col-md-12">
                    @if (count($pages[$currentPage]) >= 10)
                        @include('components.datatables.pagination')
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <table class="table table-wave checktable">
                    <thead>
                      <tr>
                        @if ($tabletype === 'checkable')
                            <th class="headers" scope="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                </div>
                            </th>
                        @endif
                        @foreach ($columns as $column)
                        @php
                            $param = '';
                            if($column['sortable'] != false){
                                $param = 'sort("'.$column['key'].'","'.$dir.'");';
                            }
                        @endphp
                            <th class="headers{{$column['sortable'] ? ' sorting' : ''}}" scope="col" style="width:{{$column['width']}}">
                                <a class="dark" onclick="{{$param}}">{{$column['title']}} 
                                    <?php if(isset($_GET['dir'])&&$_GET['dir']=='asc'&&$column['sortable']) {echo '<i class="bi-sort-down"></i>';}elseif(isset($_GET['dir'])&&$_GET['dir']=='desc'&&$column['sortable']){echo '<i class="bi-sort-up"></i>';} ?>
                                </a>
                            </th>
                        @endforeach
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages[$currentPage] as $rowid => $row)
                            <tr class="trow" onclick="location.href='{{route($view.'.show', $rowid)}}'">
                                @if ($tabletype === 'checkable')
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                        </div>
                                    </th>
                                @endif
                                @foreach ($row as $field)
                                    <td>
                                        {!! $field !!}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row pagination-bottom mt-2 mb-4">
                <div class="col-md-12">
                    @include('components.datatables.pagination')
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="columnChooser" tabindex="-1" aria-labelledby="columnChooserLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="columnChooserLabel">{{__('menus.choose_columns')}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{__('buttons.close')}}"></button>
        </div>
        <form action="{{route('request.saveColumns')}}" method="post">
            @csrf
            <input type="hidden" name="view" value="{{$view}}"/>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="alert alert-primary fs-7">
                            <i class="bi bi-info-circle"></i> {{__('menus.choose_columns_info')}}
                          </div>
                    </div>
                </div>
                <table class="table">
                  <tbody>
                    @foreach ($allcolumns as $key => $name)
                      <tr>
                        <th scope="row">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="{{$key}}" id="id_{{$key}}" {{array_key_exists($key, $columns) ? 'checked' : ''}}/>
                          </div>
                        </th>
                        <td>{{$name}}</td>
                      </tr>
                      <tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('buttons.close')}}</button>
              <button type="submit" class="btn btn-primary">{{__('buttons.save')}}</button>
            </div>
        </form>

      </div>
    </div>
</div>
<script>
    function paginationSwitch(selectPagination) {
    var url = new URL(window.location.href);
    url.searchParams.set('pagination', selectPagination.value);
    window.location.replace(url);
    }

    function sort(key, dir){
        var url = new URL(window.location.href);
        url.searchParams.set('sort', key);
        url.searchParams.set('dir', dir);
        window.location.replace(url);
    }

    function page(num){
        var url = new URL(window.location.href);
        url.searchParams.set('page', num);
        window.location.replace(url);
    }
</script>