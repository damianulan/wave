<div class="modal fade" id="note" tabindex="-1" aria-labelledby="noteLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fw-bold text-primary" id="noteLabel"><i class="bi bi-journal-plus me-2 text-primary"></i>{{__('menus.add_note')}}</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{__('buttons.close')}}"></button>
        </div>
        <form action="{{route('users.note', $user->id)}}" method="post">
            @csrf
            <div class="modal-body">
                <div class="row mx-4 my-2">
                    <div class="col-12 p-1">
                        <div class="form-floating">
                            <textarea class="form-control" id="text_input" name="text" style="height: 100px"></textarea>
                            <label for="text_input">{{__('menus.note')}}</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('buttons.close')}}</button>
              <button type="submit" class="btn btn-primary">{{__('buttons.save')}}</button>
            </div>
        </form>

      </div>
    </div>
</div>
