<?php


namespace App\Services;

use App\Models\Barang;
use League\Csv\Writer;
use App\Models\Kategory;
use App\Models\BarangRusak;
use App\Models\BarangSortir;
use App\Models\DataLogistik;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Services\Contract\LaporanServiceInterface;

class LaporanService implements LaporanServiceInterface {

    public function getBulan () : array
    {
        return [
            'Januari'   => 1,
            'Februari'  => 2,
            'Maret'     => 3,
            'April'     => 4,
            'Mei'       => 5,
            'Juni'      => 6,
            'Juli'      => 7,
            'Agustus'   => 8,
            'September' => 9,
            'Oktober'   => 10,
            'November'  => 11,
            'Desember'  => 12
        ];
    }

    public function laporanKategory() : Response
    {
        // Data yang ingin diekspor
        $data = Kategory::query()->latest()->get();

        // Membuat instance Writer
        $csv = Writer::createFromString('');

        // Menambahkan header ke CSV (opsional)
        $csv->insertOne(['Nama Kategori', 'Dibuat Pada']);

        // Menambahkan data ke CSV
        $csv->insertAll(
            $data->map(function ($item) {
                return [
                    $item->name,
                    $item->created_at,
                ];
            })->toArray()
        );

        // Mengembalikan CSV sebagai respons download
        return response($csv->toString(), 200, [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="laporan-kategory.csv"',
        ]);
    }

    public function laporanLogistik(Request $request) : Response | RedirectResponse 
    {
        $request->validate([
            'bulan' => ['required', 'integer', 'between:1,12'],
            'tahun' => ['required', 'integer', 'digits:4']
        ]);

        $bulan = $request->input('bulan'); // Bulan (1-12)
        $tahun = $request->input('tahun'); // Tahun (4 digit)

        // Filter data berdasarkan bulan dan tahun
        $data = DataLogistik::with('user')
                            ->whereYear('created_at', $tahun)
                            ->whereMonth('created_at', $bulan)
                            ->latest()
                            ->get();

        // Jika data kosong, kembalikan pesan error
        if ($data->isEmpty()) {
            return redirect()->route('admin.laporan.index')->with('error', 'Tidak ada data untuk bulan ' . $bulan . ' tahun ' . $tahun);
        }

        // Membuat instance Writer
        $csv = Writer::createFromString('');

        // Menambahkan header ke CSV (opsional)
        $csv->insertOne(['Penginput', 'Tanggal', 'Nota Retur Barang', 'Nama Toko', 'Total Harga', 'Jumlah Barang', 'Dibuat Pada']);

        $csv->insertAll(
            $data->map(function ($item) {
                return [
                    $item->user->name,
                    $item->tanggal_format,
                    $item->no_nota_retur_barang,
                    $item->nama_toko,
                    $item->total_harga,
                    $item->jumlah_barang,
                    $item->created_at,
                ];
            })->toArray()
        );

        $fileName = "{$bulan}-{$tahun}-laporan-logistik.csv";

        // Mengembalikan CSV sebagai respons download
        return response($csv->toString(), 200, [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => "attachment; filename={$fileName}",
        ]);
    }

    public function laporanBarang (Request $request) : Response | RedirectResponse
    {
        $request->validate([
            'bulan' => ['required', 'integer', 'between:1,12'],
            'tahun' => ['required', 'integer', 'digits:4']
        ]);

        $bulan = $request->input('bulan'); // Bulan (1-12)
        $tahun = $request->input('tahun'); // Tahun (4 digit)

        // Filter data berdasarkan bulan dan tahun
        $data = Barang::with('kategory:id,name')->whereYear('created_at', $tahun)
                            ->whereMonth('created_at', $bulan)
                            ->latest()
                            ->get();

        // Jika data kosong, kembalikan pesan error
        if ($data->isEmpty()) {
            return redirect()->route('admin.laporan.index')->with('error', 'Tidak ada data untuk bulan ' . $bulan . ' tahun ' . $tahun);
        }

        // Membuat instance Writer
        $csv = Writer::createFromString('');

        // Menambahkan header ke CSV (opsional)
        $csv->insertOne(['Kode Barcode','Nama Barang', 'Kategori', 'Deskripsi', 'Dibuat Pada']);

        $csv->insertAll(
            $data->map(function ($item) {
                return [
                    $item->kode_barcode,
                    $item->nama_barang,
                    $item->kategory->name,
                    $item->deskripsi_barang,
                    $item->created_at,
                ];
            })->toArray()
        );

        $fileName = "{$bulan}-{$tahun}-laporan-barang.csv";

        // Mengembalikan CSV sebagai respons download
        return response($csv->toString(), 200, [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => "attachment; filename={$fileName}",
        ]);
    }

    public function laporanBarangRusak (Request $request) : Response | RedirectResponse
    {
        $request->validate([
            'bulan' => ['required', 'integer', 'between:1,12'],
            'tahun' => ['required', 'integer', 'digits:4']
        ]);

        $bulan = $request->input('bulan'); // Bulan (1-12)
        $tahun = $request->input('tahun'); // Tahun (4 digit)

        // Filter data berdasarkan bulan dan tahun
        $data = BarangRusak::with([
            'barang'          => function ($query) {
                $query->select('id', 'nama_barang', 'kode_barcode', 'kategory_id');
            },
            'barang.kategory' => function ($query) {
                $query->select('id', 'name');
            },
            'reassonRetur'    => function ($query) {
                $query->select('id', 'name');
            },
            'user'            => function ($query) {
                $query->select('id', 'name');
            },
        ])->whereYear('created_at', $tahun)
             ->whereMonth('created_at', $bulan)
             ->latest()
             ->get();

        // Jika data kosong, kembalikan pesan error
        if ($data->isEmpty()) {
            return redirect()->route('admin.laporan.index')->with('error', 'Tidak ada data untuk bulan ' . $bulan . ' tahun ' . $tahun);
        }

        // Membuat instance Writer
        $csv = Writer::createFromString('');

        // Menambahkan header ke CSV (opsional)
        $csv->insertOne([
            'Nama Barang', 
            'Barcode', 
            'Kategory', 
            'Nomor Nota Retur Barang', 
            'Quantity Pcs', 
            'Quantity Carton', 
            'Tanggal Expired', 
            'Tanggal Retur', 
            'Reasson Retur', 
            'Penginput', 
            'Dibuat Pada'
        ]);

        $csv->insertAll(
            $data->map(function ($item) {
                return [
                    $item->barang->nama_barang,
                    $item->barang->kode_barcode,
                    $item->barang->kategory->name,
                    $item->nomor_nota_retur_barang,
                    $item->quantity_pcs,
                    $item->quantity_carton,
                    $item->tanggal_expired_format,
                    $item->tanggal_retur_format,
                    $item->reassonRetur->name,
                    $item->user->name,
                    $item->created_at,
                ];
            })->toArray()
        );

        $fileName = "{$bulan}-{$tahun}-laporan-barang-rusak.csv";

        // Mengembalikan CSV sebagai respons download
        return response($csv->toString(), 200, [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => "attachment; filename={$fileName}",
        ]);
    }

    public function barangSortir (Request $request) : Response | RedirectResponse
    {
        $request->validate([
            'bulan' => ['required', 'integer', 'between:1,12'],
            'tahun' => ['required', 'integer', 'digits:4']
        ]);

        $bulan = $request->input('bulan'); // Bulan (1-12)
        $tahun = $request->input('tahun'); // Tahun (4 digit)

        // Filter data berdasarkan bulan dan tahun
        $data = BarangSortir::with([
            'barang' => function ($query) {
                $query->select('id', 'nama_barang', 'kode_barcode', 'kategory_id');
            },
            'barang.kategory' => function ($query) {
                $query->select('id', 'name');
            }
        ])->whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bulan)
            ->latest()
            ->get();

        // Jika data kosong, kembalikan pesan error
        if ($data->isEmpty()) {
            return redirect()->route('admin.laporan.index')->with('error', 'Tidak ada data untuk bulan ' . $bulan . ' tahun ' . $tahun);
        }

        // Membuat instance Writer
        $csv = Writer::createFromString('');

        // Menambahkan header ke CSV (opsional)
        $csv->insertOne([
            'Nama Barang',
            'Barcode', 
            'Kategory', 
            'Nomor Nota Retur Barang', 
            'Quantity Pcs', 
            'Quantity Carton',
            'Tanggal Expired', 
            'Dibuat Pada'
        ]);

        $csv->insertAll(
            $data->map(function ($item) {
                return [
                    $item->barang->nama_barang,
                    $item->barang->kode_barcode,
                    $item->barang->kategory->name,
                    $item->nomor_nota_retur_barang,
                    $item->quantity_pcs,
                    $item->quantity_carton,
                    $item->tanggal_expired_format,
                    $item->created_at,
                ];
            })->toArray()
        );

        $fileName = "{$bulan}-{$tahun}-laporan-barang-sortir.csv";

        // Mengembalikan CSV sebagai respons download
        return response($csv->toString(), 200, [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => "attachment; filename={$fileName}",
        ]);
    }
}
