@extends('layouts.app_softwaretester')

@section('css')
<style>
    body{
        overflow: hidden;
    }
</style>
@endsection

@section('content_header')
<div class="col-md-12 padding-1">
    <div class="panel block">
        <div class="panel-body">
            <h3> Halo, {{ Auth::user()->name }}</h3>
            <h4>Selamat Datang di Aplikasi Pengukuran Kualitas Perangkat Lunak </h4>
            <p>Sebelum menggunakan aplikasi ini, pastikan untuk membaca petunjuk langkah-langkah penggunaan aplikasi di bawah ini. <br> Selamat mencoba.</p>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="col-md-12 padding-1">
        <div class="row">
            <div class="col-md-4">
                <div class="panel bg-light-blue">
                    <div class="panel-body">
                        <div class="col-md-12 padding-0">
                            <div class="text-white text-left col-md-7 col-xs-12 col-sm-7 padding-0">
                                <h5>STEP 1</h5>
                            </div>
                        </div>
                        <div class="panel-body text-white">
                            <h4>Masukkan Data Aplikasi</h4>
                            <p>Pilih menu <b>APLIKASI</b> lalu pilih menu <b>TAMBAH APLIKASI</b></p>
                        </div>
                        <div class="panel-footer col-md-12 padding-0" data-toggle="modal" data-target="#modal_1">
                            <h5 style="text-align:center">Details</p>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4">
                <div class="panel bg-light-blue">
                    <div class="panel-body">
                        <div class="col-md-12 padding-0">
                            <div class="text-white text-left col-md-7 col-xs-12 col-sm-7 padding-0">
                                <h5>STEP 2</h5>
                            </div>
                        </div>
                        <div class="panel-body text-white">
                            <h4>Pilih Opsi Pengukuran</h4>
                            <p>Pilih menu <b>PENGUKURAN</b> lalu pilih menu <b>DEFAULT</b> atau <b>CUSTOM</b></p>
                        </div>
                        <div class="panel-footer col-md-12 padding-0" data-toggle="modal" data-target="#modal_2">
                            <h5 style="text-align:center">Details</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel bg-light-blue">
                    <div class="panel-body">
                        <div class="col-md-12 padding-0">
                            <div class="text-white text-left col-md-7 col-xs-12 col-sm-7 padding-0">
                                <h5>STEP 3</h5>
                            </div>
                        </div>
                        <div class="panel-body text-white">
                            <h4>Lakukan Pengukuran Aplikasi</h4>
                            <p>Pilih menu <b>MULAI PENGUKURAN</b> lalu pilih tanda<b> [+]</b></p>
                        </br>
                        </div>
                        <div class="panel-footer col-md-12 padding-0" data-toggle="modal" data-target="#modal_3">
                            <h5 style="text-align:center">Details</p>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="panel bg-light-blue">
                    <div class="panel-body">
                        <div class="col-md-12 padding-0">
                            <div class="text-white text-left col-md-7 col-xs-12 col-sm-7 padding-0">
                                <h5>STEP 4</h5>
                            </div>
                        </div>
                        <div class="panel-body text-white">
                            <h4>Lihat Hasil Pengukuran</h4>
                            <p>Pilih menu <b>HASIL</b></p>
                            </br>
                        </div>
                        <div class="panel-footer col-md-12 padding-0" data-toggle="modal" data-target="#modal_4">
                            <h5 style="text-align:center">Details</p>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4">
                <div class="panel bg-light-blue">
                    <div class="panel-body">
                        <div class="col-md-12 padding-0">
                            <div class="text-white text-left col-md-7 col-xs-12 col-sm-7 padding-0">
                                <h5>STEP 5</h5>
                            </div>
                        </div>
                        <div class="panel-body text-white">
                            <h4>Unduh Hasil Pengukuran</h4>
                            <p>Pilih menu <b>EXPORT TO PDF</b></p>
                            </br>
                        </div>
                        <div class="panel-footer col-md-12 padding-0" data-toggle="modal" data-target="#modal_5">
                            <h5 style="text-align:center">Details</p>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <div>
        <!-- MODAL  -->
        <div class="modal fade" id="modal_1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3>STEP 1 : Masukkan Data Aplikasi</h3>
                        <p>Langkah pertama yang harus dilakukan adalah memasukkan data aplikasi yang akan diukur. 
                        <p>Pilih menu <b>APLIKASI</b> lalu pilih menu <b>TAMBAH APLIKASI</b> isi data-data yang diperlukan, kemudian pilih <b>SUBMIT</b>.</p>
                        <p><b>Data yang harus diisikan yaitu: </b></br>1) Nama Aplikasi </br>2) URL Aplikasi </br>3) File</p>
                        <p><b>KETERANGAN :</b>
                            </br>1) Nama Aplikasi : Isi dengen nama aplikasi yang akan diukur kualitasnya, contoh : Instagram, Integra.
                            </br>2) URL Aplikasi : Isi dengan alamat URL aplikasi, contoh : instagram.com, integra.its.ac.id.
                            </br>URL ini nanti akan digunakan untuk mengukur kualitas karakteristik <b>PERFORMANCE EFFICIENCY</b> sub karakteristik <b>CAPACITY</b>.
                            </br>3) File : Upload file kode program aplikasi dengan ekstensi <b>.php</b>, contoh : Instagram.php, Integra.php. 
                            File ini nanti akan digunakan untuk mengukur kualitas karakteristik <b>MAINTAINABILITY</b> sub karakteristik <b>MODULARITY</b>.
                        </p>   
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal_2" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3>STEP 2 : Pilih Opsi Pengukuran</h3>
                        <p>Langkah kedua yaitu memilih opsi pengukuran aplikasi.</p>
                        <p>Pilih menu <b>PENGUKURAN</b> lalu pilih menu <b>DEFAULT</b> atau <b>CUSTOM</b>.</p> 
                        <p>Terdapat dua pilihan pengukuran yaitu: </br>1) DEFAULT </br>2) CUSTOM</p>
                        <p><b>KETERANGAN:</b>
                        </br>1) DEFAULT : Jika memilih opsi default, maka dalam pengukuran kualitas aplikasi anda 
                        akan dihitung menggunakan perbandingan bobot karakteristik dan sub karakteristik yang telah disediakan sistem.
                        </br>2) CUSTOM : Jika memilih opsi custom, maka anda dapat menentukan perbandingan bobot 
                        untuk masing-masing karakteristik dan sub karakteristik sesuai keinginan dan kebutuhan anda.</p>
                        <p><b>CATATAN : </b>
                        </br>*Terdapat 8 Karakteristik dan 31 Sub Karakteristik.
                        </br>*Bobot yang dimiliki oleh karakteristik disebut Bobot Karakteristik.
                        </br>*Bobot yang dimiliki oleh sub karakteristik disebut Bobot Relatif.
                        </br>*Jumlah total Bobot Karakteristik dari seluruh karakteristik <b>HARUS SAMA DENGAN 1</b>.
                        </br>*Setiap Karakteristik memiliki jumlah sub karakteristik yang berbeda.
                        </br>*Jumlah total Bobot Relatif dari seluruh sub karakteristik yang dimiliki oleh satu karakteristik <b>HARUS SAMA DENGAN 1</b>.<p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal_3" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3>STEP 3 : Lakukan Pengukuran Aplikasi</h3>
                        <p>Langkah ketiga yaitu melakukan pengukuran aplikasi.</p>
                        <p>Pilih menu <b>MULAI PENGUKURAN</b> lalu pilih tanda<b> [+]</b> isi data-data yang diperlukan, kemudian pilih <b>SUBMIT</b>.
                        Ulangi hal yang sama pada setiap sub karakteristik.</p> 
                        <p><b>Data yang harus diisikan yaitu: </b></br>1) Jumlah Responden </br>2) Nilai Total Hasil Kuesioner Per Sub Karakteristik</p>
                        <p><b>KETERANGAN:</b>
                        </br>1) Jumlah Responden : Isikan jumlah responden yang telah mengisi kuesioner.
                        </br>2) Nilai Total Hasil Kuesioner Per Sub Karakteristik : Isikan jumlah total nilai hasil kuesioner dari pertanyaan untuk sub karakteristik tersebut.</p>
                        <p><b>CATATAN : </b>
                        </br>*Jumlah responden suatu sub karakteristik <b>HARUS SAMA</b> dengan jumlah responden sub karakteristik yang lain. 
                        Contoh: Jumlah responden sub karakteristik Functional Completeness = 10, maka Jumlah responden untuk setiap sub karakteristik yang lain adalah 10.<p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal_4" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3>STEP 4 : Lihat Hasil Pengukuran</h3>
                        <p>Langkah keempat yaitu melihat hasil pengukuran.</p>
                        <p>Pilih menu <b>HASIL</b>.</p>
                        <p>Setelah melakukan pengukuran aplikasi, anda akan dapat melihat hasil dari pengukuran yang telah anda lakukan.
                        Laporan hasil pengukuran ini berisi:
                        </br>1) Nilai Karakteristik
                        </br>2) Deskripsi Nilai Karakteristik
                        </br>3) Nilai Aplikasi 
                        </br>4) Deskripsi Nilai Aplikasi</p>
                        <p><b>KETERANGAN:</b>
                        </br>1) Nilai Karakteristik : Nilai ini adalah nilai kualitas aplikasi anda pada bagian karakteristik tertentu yang merupakan akumulasi dari nilai-nilai sub karakteristik yang dimiliki oleh karakteristik tersebut.
                        </br>2) Deskripsi Nilai Karakteristik: Ini adalah deskripsi dari nilai karakteristik. 
                        </br>3) Nilai Aplikasi: Nilai ini adalah nilai kualitas keseluruhan aplikasi anda yang merupakan akumulasi dari nilai-nilai karakteristik.
                        </br>4) Deskripsi Nilai Aplikasi : Ini merupakan deskripsi dari nilai aplikasi.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal_5" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3>STEP 5 : Unduh Hasil Pengukuran</h3>
                        <p>Langkah kelima yaitu mengunduh hasil pengukuran.</p>
                        <p>Pilih menu <b>EXPORT TO PDF</b></p>
                        <p>Langkah ini merupakan langkah pilihan yang bisa anda lakukan jika ingin menyimpan hasil pengukuan aplikasi anda.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>    
    </div>
@endsection
