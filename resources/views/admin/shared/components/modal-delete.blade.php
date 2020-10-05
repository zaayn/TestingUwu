<div class="modal fade" id="delConfModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <i class="icon-close icons d-block text-danger" style="font-size: 5rem; "></i>
                        <h4 class="mt-3">Apakah anda yakin akan menghapus data ini ?</h4>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col text-center">
                        <button class="btn btn-secondary btn-square" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-danger btn-square" id="btnDelete" type="button">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{!! Form::open(['method' => 'DELETE', 'id' => 'formDelete']) !!}
{!! Form::close() !!}
