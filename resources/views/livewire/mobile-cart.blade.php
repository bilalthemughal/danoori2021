<a class="d-table-cell handheld-toolbar-item" href="{{ route('cart') }}">
    <span class="handheld-toolbar-icon">
        <i class="ci-cart"></i>
        <span class="badge bg-primary rounded-pill ms-1">{{ $totalItems }}</span>
    </span>
    <span class="handheld-toolbar-label">{{ number_format($totalPrice) }}</span>
</a>
