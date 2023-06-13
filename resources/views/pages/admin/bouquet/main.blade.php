<x-admin-layout title="Papan Bunga">
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Bouquet</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.bouquet') }}">Product</a></li>
                                    <li class="breadcrumb-item active">Bouquet</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Bouquet</h4>
                            </div><!-- end card header -->
                            <div class="card-body">
                                <div id="customerList">
                                    <div class="row g-4 mb-3">
                                        <!-- Success Alert -->
                                        @if (session()->has('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>{{ session('success') }}</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endif
                                        <!-- Info Alert -->
                                        @if (session()->has('info'))
                                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                <strong>{{ session('info') }}!</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endif
                                        <div class="col-sm-auto">
                                            <div>
                                                <a href="{{ route('admin.bouquet.create') }}"
                                                    class="btn btn-success add-btn">
                                                    Tambah Product
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="d-flex justify-content-sm-end">
                                                <div class="search-box ms-2">
                                                    <input type="text" class="form-control search"
                                                        placeholder="Search...">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-card mt-3 mb-1">
                                        <table class="table align-middle table-nowrap" id="customerTable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="sort" data-sort="customer_name">Nama Product</th>
                                                    <th class="sort" data-sort="email">Harga</th>
                                                    <th class="sort" data-sort="status">Kota</th>
                                                    <th class="sort" data-sort="date">Deskripsi</th>
                                                    <th class="sort" data-sort="action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @foreach ($bouquet as $item)
                                                    <tr>
                                                        <td class="customer_name">{{ $item->name }}</td>
                                                        <td class="email">{{ $item->harga }}</td>
                                                        <td class="status">{{ $item->kota }}</td>
                                                        <td class="date">{{ $item->deskripsi }}</td>
                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                <div class="edit">
                                                                    <a href="{{ route('admin.bouquet.edit', $item->id) }}"
                                                                        class="btn btn-sm btn-success edit-item-btn">
                                                                        Edit
                                                                    </a>
                                                                </div>
                                                                <div class="remove">
                                                                    <form
                                                                        onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                                        action="{{ route('admin.bouquet.destroy', $item->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-danger remove-item-btn">Hapus</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="noresult" style="display: none">
                                            <div class="text-center">
                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                    colors="primary:#121331,secondary:#08a88a"
                                                    style="width:75px;height:75px">
                                                </lord-icon>
                                                <h5 class="mt-2">Hasil Tidak Ada</h5>
                                                <p class="text-muted mb-0">Periksa Kembali Pencarian Anda.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <div class="pagination-wrap hstack gap-2">
                                            <a class="page-item pagination-prev disabled" href="#">
                                                Previous
                                            </a>
                                            <ul class="pagination listjs-pagination mb-0"></ul>
                                            <a class="page-item pagination-next" href="#">
                                                Next
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </div>
    </div>
</x-admin-layout>
