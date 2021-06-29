<div class="d-flex align-items-center pt-2 pb-4">
    <select class="form-select me-3" wire:model.defer="quantity" style="width: 5rem;">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <button class="btn btn-primary btn-shadow d-block w-100" id="addToCart"
        wire:click.prevent="addToCart({{ $product_id }})" wire:loading.remove type="button">
        <i class="ci-cart fs-lg me-2"></i>
        <span id="button-text">Add to Cart</span>
    </button>

    <script>
        document.getElementById('addToCart').onclick = () => {
            document.getElementById('button-text').innerText = "Added to Cart"
            document.getElementById('addToCart').classList.remove("btn-primary");
            document.getElementById('addToCart').classList.add("btn-danger");
        }

    </script>

</div>
