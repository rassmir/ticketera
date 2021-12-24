<div class="modal fade" id="exampleModal{{$detail->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{route('app.anulation.delete.detailanulation',['id'=>$detail->id])}}">
            @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle de anulación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Estás seguro que quieres eliminar este detalle de anulación?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
        </form>
    </div>
</div>
