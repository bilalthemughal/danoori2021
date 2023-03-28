<div class="d-flex align-items-center pt-2 pb-4">
    <select class="form-select me-3" wire:model.defer="quantity" style="width: 5rem;">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <button class="btn btn-info btn-shadow d-block w-100" id="addToCart"
        wire:click.prevent="addToCart({{ $product_id }})" onclick="addToCart({{ $product_id }})" wire:loading.remove
        type="button">
        <i class="ci-cart fs-lg me-2"></i>
        <span id="button-text">Buy Now</span>
    </button>
</div>

<script>
    function addToCart(id) {
        fbq('track', 'AddToCart', {
            content_ids: [$product_id],
            content_type: 'product'
        });
    }
</script>
