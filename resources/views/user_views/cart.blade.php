<main>
    <div class="container-fluid px-4">
        @yield("header-name")
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Cart</li>
        </ol>

        <div class="search-container mb-3">
            <input type="text" id="searchInput" placeholder="Search products in cart..." class="form-control">
        </div>

        <div class="card mb-4">
            <div class="inventory-table">
                <div class="inventory-header">
                    <div>Name</div>
                    <div>Quantity</div>
                    <div>Price</div>
                    <div>Action</div>
                </div>

                @foreach ($cartProducts as $product)
                    <form action="#" method="POST" class="inventory-row">
                        @csrf
                        <div>
                            <p>{{ $product->name }}</p>
                        </div>
                        <div>
                            <p>{{ $product->quantity }}</p>
                        </div>
                        <div>
                            <p>{{ $product->price }}</p>
                        </div>
                        <div>
                           <button type="submit" class="btn btn-rust">Remove</button>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>

        <div class="mt-3 text-end">
            <button type="button" class="btn btn-success" onclick="alert('Buy all clicked!')">
                Buy All
            </button>
        </div>
    </div>
</main>
