@extends('layout.main') {{-- Ganti dengan nama master layout Anda jika berbeda --}}

@section('containers')
    <!-- Hero Section / Header Halaman -->
    <section class="py-5 bg-cream" style="margin-top: 100px;">
        <div class="container my-4">
            <div class="row align-items-center">
                <div class="col-lg-7 text-center text-lg-start">
                    <span class="fw-bold px-3 py-1 rounded-pill small"
                        style="background-color: rgba(204, 41, 43, 0.1); color: #cc292b;">
                        Legalitas Berkas Internasional
                    </span>
                    <h1 class="display-5 fw-bold mt-3 mb-4" style="color: #222;">
                        Panduan <span style="color: #cc292b;">Apostille</span> Kemenkumham
                    </h1>
                    <p class="lead text-muted mb-4" style="max-width: 600px;">
                        Sesuai regulasi internasional terbaru, semua berkas pendidikan asal Indonesia wajib dilegalisasi
                        melalui sertifikat Apostille AHU Kemenkumham agar sah diakui di Turki.
                    </p>
                    <a href="https://ahu.go.id" target="_blank" class="btn px-4 py-2 fw-bold text-white shadow-sm"
                        style="background-color: #cc292b; border-radius: 30px;">
                        Buka Portal Apostille Online <i class="fa-solid fa-arrow-up-right-from-square ms-2"></i>
                    </a>
                </div>
                <div class="col-lg-5 d-none d-lg-block text-center">
                    <i class="fa-solid fa-stamp" style="font-size: 180px; color: rgba(204, 41, 43, 0.15);"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Konten Utama -->
    <section class="py-5" style="background-color: #fff;">
        <div class="container">

            <!-- Bagian Alur Langkah Kerja -->
            <div class="text-center mb-5">
                <h2 class="fw-bold" style="color: #222;">Tahapan Proses <span style="position: relative;">Apostille<span
                            style="position: absolute; bottom: -8px; left: 25%; width: 50%; height: 3px; background-color: #cc292b; border-radius: 2px;"></span></span>
                </h2>
                <p class="text-muted mt-3">Alur pengurusan sertifikasi dokumen publik dari rumah secara mandiri </p>
            </div>

            <div class="row g-4 mb-5">
                <!-- Langkah 1 -->
                <div class="col-md-3">
                    <div class="card h-100 p-4 border-0 shadow-sm bg-cream" style="border-radius: 15px;">
                        <div class="d-flex align-items-center justify-content-center mb-3 rounded-circle"
                            style="width: 45px; height: 45px; background-color: #cc292b; color: #fff;">
                            <h5 class="m-0 fw-bold text-cream">1</h5>
                        </div>
                        <h6 class="fw-bold mb-2">Registrasi Akun</h6>
                        <p class="text-muted small m-0">Buka situs resmi <strong>apostille.ahu.go.id</strong>, buat akun
                            baru menggunakan data NIK KTP Anda, dan tunggu verifikasi email.</p>
                    </div>
                </div>
                <!-- Langkah 2 -->
                <div class="col-md-3">
                    <div class="card h-100 p-4 border-0 shadow-sm bg-cream" style="border-radius: 15px;">
                        <div class="d-flex align-items-center justify-content-center mb-3 rounded-circle"
                            style="width: 45px; height: 45px; background-color: #cc292b; color: #fff;">
                            <h5 class="m-0 fw-bold text-cream">2</h5>
                        </div>
                        <h6 class="fw-bold mb-2">Unggah Dokumen</h6>
                        <p class="text-muted small m-0">Pilih negara tujuan (Turki), unggah hasil scan berkas, lalu masukkan
                            nama pejabat/kepala sekolah yang menandatangani ijazah asli Anda.</p>
                    </div>
                </div>
                <!-- Langkah 3 -->
                <div class="col-md-3">
                    <div class="card h-100 p-4 border-0 shadow-sm bg-cream" style="border-radius: 15px;">
                        <div class="d-flex align-items-center justify-content-center mb-3 rounded-circle"
                            style="width: 45px; height: 45px; background-color: #cc292b; color: #fff;">
                            <h5 class="m-0 fw-bold text-cream">3</h5>
                        </div>
                        <h6 class="fw-bold mb-2">Bayar PNBP</h6>
                        <p class="text-muted small m-0">Setelah permohonan disetujui melalui email, lakukan pembayaran kode
                            billing PNBP sebesar <strong>Rp 150.000 per dokumen</strong> melalui bank atau kantor pos.
                        </p>
                    </div>
                </div>
                <!-- Langkah 4 -->
                <div class="col-md-3">
                    <div class="card h-100 p-4 border-0 shadow-sm bg-cream" style="border-radius: 15px;">
                        <div class="d-flex align-items-center justify-content-center mb-3 rounded-circle"
                            style="width: 45px; height: 45px; background-color: #cc292b; color: #fff;">
                            <h5 class="m-0 fw-bold text-cream">4</h5>
                        </div>
                        <h6 class="fw-bold mb-2">Cetak Stiker</h6>
                        <p class="text-muted small m-0">Datang ke Kantor Wilayah (Kanwil) Kemenkumham di provinsi Anda untuk
                            mencetak stiker fisik Apostille dan menempelkannya pada berkas asli.</p>
                    </div>
                </div>
            </div>

            <!-- Bagian Ketentuan Dokumen & Kotak Perhatian -->
            <div class="row align-items-start mt-5 pt-4">

                <!-- KOLOM 1: BERKAS YANG HARUS DI-APOSTILLE (DITULIS DULUAN AGAR DI HP DI ATAS) -->
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <h3 class="fw-bold mb-4" style="color: #222;">Berkas yang Wajib Di-Apostille</h3>
                    <p class="text-muted mb-4">Pastikan dokumen utama berikut telah melalui proses penempelan stiker
                        Apostille sebelum dibawa ke Turki :</p>

                    <div class="d-flex align-items-start mb-4">
                        <i class="fa-solid fa-circle-check mt-1 me-3 fs-5" style="color: #cc292b;"></i>
                        <div>
                            <h6 class="fw-bold mb-1" style="color: #222;">Ijazah SMA / Sederajat (Asli)</h6>
                            <p class="text-muted small m-0" style="line-height: 1.5;">Dokumen kelulusan asli. Jika nama
                                kepala sekolah belum terdaftar di database AHU, sistem akan meminta Anda mengunggah berkas
                                spesimen tanda tangan dari sekolah terlebih dahulu.</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <i class="fa-solid fa-circle-check mt-1 me-3 fs-5" style="color: #cc292b;"></i>
                        <div>
                            <h6 class="fw-bold mb-1" style="color: #222;">Transkrip Nilai Akademik (Asli)</h6>
                            <p class="text-muted small m-0" style="line-height: 1.5;">Lembar rincian nilai ujian akhir
                                sekolah. Pendaftaran Apostille untuk transkrip nilai dihitung sebagai satu dokumen terpisah
                                dari ijazah.</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <i class="fa-solid fa-circle-check mt-1 me-3 fs-5" style="color: #cc292b;"></i>
                        <div>
                            <h6 class="fw-bold mb-1" style="color: #222;">SKCK Kepolisian (Opsional)</h6>
                            <p class="text-muted small m-0" style="line-height: 1.5;">Disarankan untuk turut di-Apostille
                                jika Anda mengurus visa pelajar mandiri, guna mempermudah pemberkasan administrasi imigrasi
                                saat pembuatan izin tinggal di Kota Kastamonu.</p>
                        </div>
                    </div>
                </div>

                <!-- KOLOM 2: KOTAK INFORMASI & WARNING (DI HP OTOMATIS JATUH KE BAWAH) -->
                <div class="col-lg-5">
                    <!-- Kotak 1: Aturan Urutan Penerjemah (Merah Transparan) -->
                    <div class="p-4 border-start border-4 shadow-sm mb-4"
                        style="background-color: rgba(204, 41, 43, 0.03); border-color: #cc292b !important; border-radius: 0 15px 15px 0;">
                        <h5 class="fw-bold d-flex align-items-center mb-2" style="color: #cc292b;">
                            <i class="fa-solid fa-arrow-down-a-z me-2"></i> Perhatikan Urutan Proses!
                        </h5>
                        <p class="text-muted small m-0" style="line-height: 1.6;">
                            Urutan yang benar adalah: <strong>Lakukan Apostille pada dokumen asli berbahasa Indonesia
                                terlebih dahulu</strong>. Setelah stiker fisik resmi ditempelkan oleh petugas Kanwil
                            Kemenkumham, barulah dokumen beserta stiker tersebut difotokopi dan dibawa ke Penerjemah
                            Tersumpah (*Sworn Translator*) untuk diterjemahkan ke bahasa Turki/Inggris. Jangan dibalik!
                        </p>
                    </div>

                    <!-- Kotak 2: Lokasi Cetak Wilayah (Krem) -->
                    <div class="p-4 border-start border-4 shadow-sm mb-4"
                        style="background-color: #faf6ee; border-color: #4a4a4a !important; border-radius: 0 15px 15px 0;">
                        <h5 class="fw-bold d-flex align-items-center mb-2" style="color: #4a4a4a;">
                            <i class="fa-solid fa-map-location-dot me-2"></i> Tidak Perlu ke Jakarta
                        </h5>
                        <p class="text-muted small m-0" style="line-height: 1.5;">
                            Pencetakan stiker fisik Apostille saat ini <strong>sudah bisa dilakukan di Kantor Wilayah
                                (Kanwil) Kemenkumham yang ada di ibukota provinsi masing-masing</strong> di seluruh
                            Indonesia. Anda tidak perlu melakukan perjalanan jauh ke Jakarta atau mengeluarkan biaya lebih
                            untuk biro jasa.
                        </p>
                    </div>
                </div>
                <div class="mb-4 mt-5">
                    <a href="/pendaftaran/mandiri" class="text-decoration-none fw-bold small" style="color: #cc292b;">
                        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Panduan Mandiri
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
