<html>

<head>
    <title>Data Pemesanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Data Pesanan</h5>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>Kode Pemesanan</th>
                <th>Nama Pemesan</th>
                <th>Alamat Pemesan</th>
                <th>Ucapan</th>
                <th>Bukti Pembayaran</th>
                {{-- <th>Nama Produk</th> --}}
                <th>Total Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $order->order_number }}</td>
                <td>{{ $order->user->username }}</td>
                <td>{{ $order->alamat }}</td>
                <td>{{ $order->ucapan }}</td>
                <td>
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('payments/' . $order->image))) }}"
                        alt="" width="130">
                </td>
                {{-- <td>{{ $item->toko->nama_toko }}</td> --}}
                <td>Rp. {{ number_format($order->total) }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
