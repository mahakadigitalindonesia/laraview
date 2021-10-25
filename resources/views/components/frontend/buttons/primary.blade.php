<a href="{{ $attributes->get('href') ?? '#' }}" {{ $attributes->merge(['class' => 'getstarted']) }}>
    {{ $attributes->get('label') }}
</a>