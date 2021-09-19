 <div  wire:poll>
    <div>
        Current time: {{ now() }}
        <br/>
        @foreach ($servings as $serving)
        {{ $serving }}
        @endforeach
    </div>
</div>
