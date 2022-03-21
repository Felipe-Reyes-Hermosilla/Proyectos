@foreach ($modal as $mod)
<!-- The Modal -->
@php echo '<div class="modal" id="', str_replace($a,$b,$mod["titulo"]) , '">' @endphp
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title"> {{ $mod->titulo }} </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>  
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                @if($mod->iframe)
                    <iframe width="470" height="250" src="{{ $news->iframe }}"></iframe>
                    <hr>
                @endif
                <h5>
                    {{ $mod->descripcion_rapida }}
                </h5>
                <h6>
                    {{ $mod->descripcion }}
                </h6>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <p class="text-muted mb-0">
                    <em>
                        @php if($mod["autor"]!="Anonimo") echo $mod["autor"]; @endphp
                    </em>
                    {{ $mod->created_at->format('d M Y') }}
                </p>
            </div>

        </div>
    </div>
</div>
@endforeach