<div>
    <!-- Very little is needed to make a happy life. - Marcus Antoninus -->
    @if (session('problem'))
        <div class="alert alert-card alert-info" role="alert"><strong class="text-capitalize">Informação!</strong>
            {{ session('problem') }}
            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>
    @endif
</div>
