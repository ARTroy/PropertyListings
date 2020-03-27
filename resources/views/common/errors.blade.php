@if (count($errors) > 0 )

    <div class="alert callout" data-closable>
        <ul>
        @if(count($errors) > 0)   
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
        {{--@if(session('custom_errors'))
            @foreach (session('custom_errors') as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
        </ul>--}}
        <button class="close-button" data-close aria-label="Dismiss alert">&times;</button>
    </div>
@endif
@if(session('info'))
    <div class="primary callout" data-closable>
        <ul>
            <li>{{ session('info') }}</li>
        </ul>
        <button class="close-button" data-close aria-label="Dismiss info">&times;</button>
    </div>
@endif
