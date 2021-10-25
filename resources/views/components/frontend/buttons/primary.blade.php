<a {{ $attributes->merge(['class' => 'btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center']) }}>
    <span>{{ $attributes->get('label') ?? 'Button Label' }}</span>
    <i class="{{ $attributes->get('icon') ?? 'bi bi-arrow-right' }}">
    </i>
</a>