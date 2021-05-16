<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-card alert-danger" role="alert"><strong class="text-capitalize">Erro!</strong>
                        {{ $error }}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
