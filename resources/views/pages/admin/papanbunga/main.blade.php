<x-admin-layout title="Papan Bunga">
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Papan Bunga</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.papanbunga') }}">Product</a>
                                    </li>
                                    <li class="breadcrumb-item active">Papan Bunga</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Papan Bunga</h4>
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
                                                <a href="{{ route('admin.papanbunga.create') }}"
                                                    class="btn btn-success add-btn">
                                                    Tambah Product
                                                </a>
                                                {{-- <button type="button" class="btn btn-success add-btn"
                                                    data-bs-toggle="modal" id="create-btn"
                                                    data-bs-target="#showModal"><i
                                                        class="ri-add-line align-bottom me-1"></i> Tambah Toko</button> --}}
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
                                                    <th class="sort" data-sort="status">Deskripsi</th>
                                                    <th class="sort" data-sort="action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @foreach ($papanbunga as $item)
                                                    <tr>
                                                        <td class="customer_name">{{ $item->name }}</td>
                                                        <td class="email">{{ $item->harga }}</td>
                                                        <td class="email">{{ $item->kota }}</td>
                                                        <td class="email">{{ $item->deskripsi }}</td>
                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                <div class="edit">
                                                                    <a href="{{ route('admin.papanbunga.edit', $item->id) }}"
                                                                        class="btn btn-sm btn-success edit-item-btn">
                                                                        Edit
                                                                    </a>
                                                                    {{-- <button class="btn btn-sm btn-success edit-item-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#showModal{{ $item->id }}">Edit</button> --}}
                                                                </div>
                                                                <div class="remove">
                                                                    {{-- <a href="{{ route('admin.papanbunga.destroy', $item->id) }}"
                                                                        class="btn btn-sm btn-danger remove-item-btn">
                                                                        Hapus
                                                                    </a> --}}
                                                                    <form
                                                                        onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                                        action="{{ route('admin.papanbunga.destroy', $item->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-danger remove-item-btn">Hapus</button>
                                                                    </form>
                                                                    {{-- <button
                                                                        class="btn btn-sm btn-danger remove-item-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteRecordModal{{ $item->id }}">Remove</button> --}}
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <!-- end row -->
                                                    {{-- <div class="modal fade" id="showModal{{ $item->id }}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-light p-3">
                                                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"
                                                                        id="close-modal"></button>
                                                                </div>
                                                                <form action="{{ route('store.update', $item->id) }}"
                                                                    method="POST">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <!-- Modal -->
                                                                    <div class="modal-body">
                                                                        <div class="mb-3">
                                                                            <label for="customername-field"
                                                                                class="form-label">Nama Product</label>
                                                                            <input type="text"
                                                                                id="customername-field"
                                                                                class="form-control"
                                                                                placeholder="Nama Toko" name="nama_toko"
                                                                                value="{{ $item->name }}" />
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="email-field"
                                                                                class="form-label">Alamat</label>
                                                                            <input type="text" name="alamat"
                                                                                id="email-field" class="form-control"
                                                                                placeholder="Alamat"
                                                                                value="{{ $item->alamat }}" />
                                                                        </div>
                                                                        <div>
                                                                            <label for="categroy"
                                                                                class="form-label">Kategori</label>
                                                                            <select
                                                                                class="form-control @error('category_id') is-invalid @enderror mt-3"
                                                                                name="category_id">
                                                                                <option selected disabled>Pilih Kategori
                                                                                    Produk</option>
                                                                                @foreach ($category as $item)
                                                                                    <option
                                                                                        value="{{ $item->id }}"
                                                                                        {{ $papanbunga->category_id == $item->id ? 'selected' : '' }}>
                                                                                        {{ $item->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div>
                                                                            <label for="status-field"
                                                                                class="form-label">Status</label>
                                                                            <select class="form-control"
                                                                                name="status" data-trigger
                                                                                name="status-field" id="status-field">
                                                                                <option value="">Status</option>
                                                                                <option value="Aktif"
                                                                                    {{ $item->status == 'Aktif' ? 'selected' : '' }}>
                                                                                    Aktif</option>
                                                                                <option value="Tidak Aktif"
                                                                                    {{ $item->status == 'Tidak Aktif' ? 'selected' : '' }}>
                                                                                    Non Aktif</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <div class="hstack gap-2 justify-content-end">
                                                                            <button type="button"
                                                                                class="btn btn-light"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-success"
                                                                                id="edit-btn">Update</button>
                                                                        </div>
                                                                    </div>
                                                                    <!--end modal -->
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div> --}}

                                                    {{-- <div class="modal fade zoomIn"
                                                        id="deleteRecordModal{{ $item->id }}" tabindex="-1"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"
                                                                        id="btn-close"></button>
                                                                </div>
                                                                <form action="{{ route('store.destroy', $item->id) }}"
                                                                    method="POST">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="mt-2 text-center">
                                                                            <lord-icon
                                                                                src="https://cdn.lordicon.com/gsqxdxog.json"
                                                                                trigger="loop"
                                                                                colors="primary:#f7b84b,secondary:#f06548"
                                                                                style="width:100px;height:100px">
                                                                            </lord-icon>
                                                                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                                                <h4>Are you Sure ?</h4>
                                                                                <p class="text-muted mx-4 mb-0">Are you
                                                                                    Sure You want to Remove this Record
                                                                                    ?
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                                                            <button type="button"
                                                                                class="btn w-sm btn-light"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn w-sm btn-danger "
                                                                                id="delete-record">Yes, Delete
                                                                                It!</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div> --}}
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

        <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light p-3">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="close-modal"></button>
                    </div>
                    <form>
                        <!-- Modal -->
                        <div class="modal-body">
                            <div class="mb-3" id="modal-id" style="display: none;">
                                <label for="id-field" class="form-label">ID</label>
                                <input type="text" id="id-field" class="form-control" placeholder="ID"
                                    readonly />
                            </div>
                            <div class="mb-3">
                                <label for="customername-field" class="form-label">Customer Name</label>
                                <input type="text" id="customername-field" class="form-control"
                                    placeholder="Enter Name" required />
                            </div>
                            <div class="mb-3">
                                <label for="email-field" class="form-label">Email</label>
                                <input type="email" id="email-field" class="form-control"
                                    placeholder="Enter Email" required />
                            </div>
                            <div class="mb-3">
                                <label for="phone-field" class="form-label">Phone</label>
                                <input type="text" id="phone-field" class="form-control"
                                    placeholder="Enter Phone no." required />
                            </div>
                            <div class="mb-3">
                                <label for="date-field" class="form-label">Joining Date</label>
                                <input type="text" id="date-field" class="form-control" placeholder="Select Date"
                                    required />
                            </div>
                            <div>
                                <label for="status-field" class="form-label">Status</label>
                                <select class="form-control" data-trigger name="status-field" id="status-field">
                                    <option value="">Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Block">Block</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" id="add-btn">Add Customer</button>
                            </div>
                        </div>
                        <!--end modal -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
