
@if (count($errors) > 0 || session('custom_errors'))
    <div class="alert callout" data-closable>
        <ul>
        @if(count($errors) > 0)         
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
        @if(session('custom_errors'))
            @foreach (session('custom_errors') as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
        </ul>
    </div>
@endif
@if(session('info'))
    <div class="primary callout" data-closable>
        <ul>
            <li>{{ session('info') }}</li>
        </ul>
    </div>
@endif
