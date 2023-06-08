<x-admin-layout title="Toko">
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Customers</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                    <li class="breadcrumb-item active">Customers</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" id="customerList">
                            <div class="card-header border-bottom-dashed">
                                <div class="row g-4 align-items-center">
                                    <div class="col-sm">
                                        <div>
                                            <h5 class="card-title mb-0">Daftar Toko</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto">
                                        <div>
                                            <button type="button" class="btn btn-success add-btn"
                                                data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i
                                                    class="ri-add-line align-bottom me-1"></i> Tambah Toko </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body border-bottom-dashed border-bottom">
                                    <form>
                                        <div class="row g-3">
                                            <div class="col-xl-3">
                                                <div class="search-box">
                                                    <input type="text" class="form-control search"
                                                        placeholder="Search for ...">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div class="table-responsive table-card mb-1">
                                            <table class="table align-middle" id="customerTable">
                                                <thead class="table-light text-muted">
                                                    <tr>
                                                        <th class="sort" data-sort="customer_name">Nama Toko</th>
                                                        <th class="sort" data-sort="email">Alamat</th>
                                                        <th class="sort" data-sort="status">Status</th>
                                                        <th class="sort" data-sort="action">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    @foreach ($toko as $item)
                                                        <tr>
                                                            <td class="id" style="display:none;"><a
                                                                    href="javascript:void(0);"
                                                                    class="fw-medium link-primary">{{ $loop->iteration }}</a>
                                                            </td>
                                                            <td class="customer_name">{{ $item->nama_toko }}</td>
                                                            <td class="email">{{ $item->alamat }}</td>
                                                            @if ($item->status == 'Aktif')
                                                                <td class="status"><span
                                                                        class="badge badge-soft-success text-uppercase">{{ $item->status }}</span>
                                                                </td>
                                                            @else
                                                                <td class="status"><span
                                                                        class="badge badge-soft-danger text-uppercase">{{ $item->status }}</span>
                                                                </td>
                                                            @endif
                                                            <td>
                                                                <ul class="list-inline hstack gap-2 mb-0">
                                                                    <li class="list-inline-item edit"
                                                                        data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                                        data-bs-placement="top" title="Edit">
                                                                        <a href="#showModal{{ $item->id }}"
                                                                            data-bs-toggle="modal"
                                                                            class="text-primary d-inline-block edit-item-btn">
                                                                            <i class="ri-pencil-fill fs-16"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="list-inline-item"
                                                                        data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                                        data-bs-placement="top" title="Remove">
                                                                        <a class="text-danger d-inline-block remove-item-btn"
                                                                            data-bs-toggle="modal"
                                                                            href="#deleteRecordModal">
                                                                            <i class="ri-delete-bin-5-fill fs-16"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="noresult" style="display: none">
                                                <div class="text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json"
                                                        trigger="loop" colors="primary:#121331,secondary:#08a88a"
                                                        style="width:75px;height:75px">
                                                    </lord-icon>
                                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                                    <p class="text-muted mb-0">We've searched more than 150+ customer We
                                                        did not find any
                                                        customer for you search.</p>
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
                                    <div class="modal fade" id="showModal{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light p-3">
                                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close" id="close-modal"></button>
                                                </div>
                                                <form action="{{ route('store.update', $item->id) }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="customername-field" class="form-label">Nama
                                                                Toko</label>
                                                            <input type="text" name="nama_toko"
                                                                id="customername-field" class="form-control"
                                                                placeholder="Nama Toko" value="{{ $item->nama_toko }}"
                                                                autofocus />
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="email-field" class="form-label">Alamat</label>
                                                            <input type="alamat" id="email-field"
                                                                class="form-control" name="alamat"
                                                                value="{{ $item->alamat }}" placeholder="Alamat" />
                                                        </div>
                                                        <div>
                                                            <label for="status-field"
                                                                class="form-label">Status</label>
                                                            <select class="form-control" data-trigger name="status"
                                                                id="status-field">
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
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success"
                                                                id="edit-btn">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close" id="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mt-2 text-center">
                                                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json"
                                                            trigger="loop" colors="primary:#f7b84b,secondary:#f06548"
                                                            style="width:100px;height:100px"></lord-icon>
                                                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                            <h4>Are you sure ?</h4>
                                                            <p class="text-muted mx-4 mb-0">Are you sure you want to
                                                                remove this record ?</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                                        <button type="button" class="btn w-sm btn-light"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn w-sm btn-danger "
                                                            id="delete-record">Yes, Delete It!</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end modal -->
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </div>
</x-admin-layout>
