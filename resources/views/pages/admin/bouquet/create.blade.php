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
                            <div class="card-body">
                                <p class="text-muted">Tambahkan Produk Anda</p>
                                <div class="live-preview">
                                    @if ($bouquet->id)
                                        <form action="{{ route('admin.bouquet.update', $bouquet->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @method('PATCH')
                                        @else
                                            <form action="{{ route('admin.bouquet.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                    @endif
                                    @csrf
                                    <div class="mb-3">
                                        <label for="employeeName" class="form-label">Nama Produk</label>
                                        <input type="text" name="name" class="form-control" id="employeeName"
                                            placeholder="Masukkan Nama Produk" value="{{ $bouquet->name }}">
                                    </div>
                                    <div class="col-sm-auto mb-3">
                                        <div>
                                            <label for="ForminputState" class="form-label">Kategori</label>
                                            <select class="form-select" id="autoSizingSelect" name="category_id">
                                                <option selected disabled>Pilih Kategori Produk</option>
                                                @foreach ($category as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $bouquet->category_id == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="StartleaveDate" class="form-label">Toko</label>
                                        <input type="text" name="toko_id" class="form-control" id="StartleaveDate"
                                            @foreach ($toko as $data)
                                                    @if (Auth::user()->id == $data->user_id)
                                                    @endif @endforeach
                                            value="{{ $data->nama_toko }} ">
                                    </div>
                                    <div class="mb-3">
                                        <label for="EndleaveDate" class="form-label">Harga</label>
                                        <input type="text" name="harga" class="form-control" id="EndleaveDate"
                                            placeholder="Masukkan Harga" value="{{ $bouquet->harga }}">
                                    </div>
                                    <div class="col-sm-auto mb-3">
                                        <div>
                                            <label for="ForminputState" class="form-label">Kota</label>
                                            <select class="form-select" name="kota" id="autoSizingSelect">
                                                <option selected disabled>Pilih Kecamatan Anda</option>
                                                @foreach ($subdistricts as $subdistrict)
                                                    <option value="{{ $subdistrict->name }}"
                                                        {{ $bouquet->kota == $subdistrict->id ? 'selected' : '' }}>
                                                        {{ $subdistrict->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="EndleaveDate" class="form-label">No Hp</label>
                                        <input type="text" name="no_hp" class="form-control"
                                            value="{{ Auth::guard('web')->user()->no_telp }}" id="EndleaveDate"
                                            placeholder="Masukkan No Hp Anda">
                                    </div>
                                    <div class="mb-3">
                                        <label for="VertimeassageInput" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" name="deskripsi" id="VertimeassageInput" rows="3"
                                            placeholder="Masukkan Deskripsi Produk">{{ $bouquet->deskripsi }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Gambar</label>
                                        <input class="form-control" name="gambar" type="file"
                                            id="formFile">{{ $bouquet->gambar }}
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                    </form>
                                </div>
                            </div><!-- end card -->
                            <!-- end col -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
            </div>

            <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
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
                                    <input type="text" id="date-field" class="form-control"
                                        placeholder="Select Date" required />
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
                                    <button type="button" class="btn btn-light"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Add
                                        Customer</button>
                                </div>
                            </div>
                            <!--end modal -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-admin-layout>
