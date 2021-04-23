@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
<<<<<<< HEAD
                <li>{{ $error }}</li>
=======
                <li style="list-style: none;" >{{ $error }}</li>
>>>>>>> 7f50c616d857cdc54f2b730bf0ee33d1fc1c82a9
            @endforeach
        </ul>
    </div>
@endif
