<div class="modal fade" id="modalDeleteLayanan" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLayananLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modalDeleteLayananLabel">Layanan</h5>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form id="form-delete-layanan" action="{{route('delete.layanan')}}" method="post" >
            @method("delete")
            @csrf
                <div class="modal-body">
                    <span class="text-center">
                        Yakin untuk menghapus layanan ?     
                    </span>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit"  class="btn btn-primary">Hapus</button>
                </div>
              </form>
            
    </div>
    </div>
</div>