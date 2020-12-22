<div>
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    @if (session('message'))
        <div class="alert alert-card alert-success" role="alert"><strong class="text-capitalize">Aviso!</strong>
            {{ session('message') }}
            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>
    @endif
</div>
