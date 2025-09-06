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
                    <form action="{{ route('admin.inventory.update', $product->id) }}" method="POST" class="inventory-row">
                        @csrf
                        @method('PUT')

                        <div>
                            <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                        </div>
                        <div>
                            <input type="number" name="stock" value="{{ $product->stock }}" class="form-control">
                        </div>
                        <div>
                            <input type="number" step="0.01" name="price" value="{{ $product->price }}"
                                class="form-control">
                        </div>
                        <div>
                            <!-- Save button -->
                            <button type="submit" class="btn btn-rust">Update</button>

                            <!-- Delete button (calls JS) -->
                            <button type="button" class="btn btn-danger" onclick="deleteProduct({{ $product->id }})">Delete</button>
                        </div>
                    </form>
                    <script>
                        function deleteProduct(id) {
                            if(confirm('Are you sure you want to delete this product?')) {
                                const form = document.createElement('form');
                                form.method = 'POST';
                                form.action = "{{ route('admin.inventory.destroy', $product->id) }}"; // your destroy route
                                form.innerHTML = `@csrf @method('DELETE')`;
                                document.body.appendChild(form);
                                form.submit();
                            }
                        }
                    </script>

                @endforeach
            </div>
        </div>
        <div class="mt-3 text-end">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createProductModal">
                + Add New Product
            </button>
        </div>

        <x-create-product-modal id="customModalId" title="Add New Item" :route="route('admin.inventory.store')" />

    </div>
</main>