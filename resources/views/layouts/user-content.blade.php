<main>
    <div class="container-fluid px-4">
        @yield("header-name")
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Product List</li>
        </ol>

        <div class="search-container mb-3">
            <input type="text" id="searchInput" placeholder="Search products..." class="form-control">
        </div>

        <div class="card mb-4">
            <div class="inventory-table">
                <div class="inventory-header">
                    <div>Name</div>
                    <div>Stock</div>
                    <div>Price</div>
                    <div>Action</div>
                </div>

                @foreach ($products as $product)
                    <form action="{{ route('user.purchase', $product->id) }}" method="POST" class="inventory-row">
                        @csrf
                        @method('PUT')

                        <div>
                            <p>{{ $product->name }}</p>
                        </div>
                        <div>
                            <p>{{ $product->stock }}</p>
                        </div>
                        <div>
                            <p>{{ $product->price }}</p>
                        </div>
                        <div>
                           <!-- Buy Button triggers modal -->
                            <button type="button" class="btn btn-rust" data-bs-toggle="modal" data-bs-target="#buyModal{{ $product->id }}">
                                Buy
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="buyModal{{ $product->id }}" tabindex="-1" aria-labelledby="buyModalLabel{{ $product->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ route('user.purchase', $product->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="buyModalLabel{{ $product->id }}">Buy {{ $product->name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="quantity{{ $product->id }}" class="form-label">Quantity</label>
                                                    <input type="number" class="form-control" id="quantity{{ $product->id }}" name="quantity" min="1" max="{{ $product->stock }}" value="1" required>
                                                </div>
                                                <p>Available stock: {{ $product->stock }}</p>
                                                <p>Price per item: {{ $product->price }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Confirm Purchase</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>

        <!-- Pagination links -->
        <div class="d-flex justify-content-end mt-3">
            {{ $products->links() }}
        </div>

    </div>
</main>