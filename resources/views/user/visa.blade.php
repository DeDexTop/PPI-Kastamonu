@extends('layout.main') {{-- Ganti dengan nama master layout Anda jika berbeda --}}

@section('containers')
    <!-- Hero Section / Header Halaman -->
    <section class="py-5 bg-cream" style="margin-top: 100px;">
        <div class="container my-4">
            <div class="row align-items-center">
                <div class="col-lg-7 text-center text-lg-start">
                    <span class="fw-bold px-3 py-1 rounded-pill small"
                        style="background-color: rgba(204, 41, 43, 0.1); color: #cc292b;">
                        Panduan Pemberangkatan Mandiri
                    </span>
                    <h1 class="display-5 fw-bold mt-3 mb-4" style="color: #222;">
                        Pengurusan <span style="color: #cc292b;">Visa Pelajar</span> Turki
                    </h1>
                    <p class="lead text-muted mb-4" style="max-width: 600px;">
                        Panduan lengkap tata cara pengajuan Visa Pelajar (Student Visa) resmi melalui Gateway resmi
                        Kedutaan Turki di Indonesia sebelum keberangkatan menuju Kota Kastamonu.
                    </p>
                    <a href="https://vfsglobal.com" target="_blank" class="btn px-4 py-2 fw-bold text-white shadow-sm"
                        style="background-color: #cc292b; border-radius: 30px;">
                        Kunjungi Situs Gateway Visa <i class="fa-solid fa-arrow-up-right-from-square ms-2"></i>
                    </a>
                </div>
                <div class="col-lg-5 d-none d-lg-block text-center">
                    <i class="fa-solid fa-passport" style="font-size: 180px; color: rgba(204, 41, 43, 0.15);"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Konten Utama -->
    <section class="py-5" style="background-color: #fff;">
        <div class="container">

            <!-- Bagian Alur Pengajuan Visa -->
            <div class="text-center mb-5">
                <h2 class="fw-bold" style="color: #222;">Tahapan Pengajuan <span style="position: relative;">Visa<span
                            style="position: absolute; bottom: -8px; left: 25%; width: 50%; height: 3px; background-color: #cc292b; border-radius: 2px;"></span></span>
                </h2>
                <p class="text-muted mt-3">Ikuti alur berikut dari persiapan berkas hingga pengambilan paspor</p>
            </div>

            <div class="row g-4 mb-5">
                <!-- Langkah 1 -->
                <div class="col-md-4">
                    <div class="card h-100 p-4 border-0 shadow-sm bg-cream" style="border-radius: 15px;">
                        <div class="d-flex align-items-center justify-content-center mb-3 rounded-circle"
                            style="width: 50px; height: 50px; background-color: #cc292b; color: #fff;">
                            <h4 class="m-0 fw-bold text-cream">1</h4>
                        </div>
                        <h5 class="fw-bold mb-2">Janji Temu (Appointment)</h5>
                        <p class="text-muted small m-0">Membuat akun dan menjadwalkan hari kedatangan wawancara/penyerahan
                            berkas secara online melalui situs resmi agen Gateway Visa Turki yang ditunjuk.</p>
                    </div>
                </div>
                <!-- Langkah 2 -->
                <div class="col-md-4">
                    <div class="card h-100 p-4 border-0 shadow-sm bg-cream" style="border-radius: 15px;">
                        <div class="d-flex align-items-center justify-content-center mb-3 rounded-circle"
                            style="width: 50px; height: 50px; background-color: #cc292b; color: #fff;">
                            <h4 class="m-0 fw-bold text-cream">2</h4>
                        </div>
                        <h5 class="fw-bold mb-2">Penyerahan & Wawancara</h5>
                        <p class="text-muted small m-0">Datang ke kantor Gateway sesuai jadwal untuk menyerahkan dokumen
                            fisik, melakukan rekam biometrik (sidik jari), wawancara singkat, dan membayar biaya visa.</p>
                    </div>
                </div>
                <!-- Langkah 3 -->
                <div class="col-md-4">
                    <div class="card h-100 p-4 border-0 shadow-sm bg-cream" style="border-radius: 15px;">
                        <div class="d-flex align-items-center justify-content-center mb-3 rounded-circle"
                            style="width: 50px; height: 50px; background-color: #cc292b; color: #fff;">
                            <h4 class="m-0 fw-bold text-cream">3</h4>
                        </div>
                        <h5 class="fw-bold mb-2">Proses & Pengambilan</h5>
                        <p class="text-muted small m-0">Proses peninjauan oleh kedutaan memakan waktu sekitar 14-30 hari
                            kerja. Anda akan menerima notifikasi jika paspor berstempel visa sudah siap diambil atau
                            dikirim.</p>
                    </div>
                </div>
            </div>

            <!-- Bagian Persyaratan Dokumen & Info Biaya -->
            <div class="row align-items-start mt-5 pt-4">
                <!-- Kolom Kiri: Daftar Berkas Fisik Visa -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h3 class="fw-bold mb-4" style="color: #222;">Dokumen Persyaratan Visa</h3>
                    <p class="text-muted mb-4">Seluruh dokumen ini wajib disiapkan dalam bentuk fisik (asli) beserta
                        salinannya (fotokopi) saat datang ke janji temu:</p>

                    <div class="d-flex align-items-start mb-4">
                        <i class="fa-solid fa-circle-check mt-1 me-3 fs-5" style="color: #cc292b;"></i>
                        <div>
                            <h6 class="fw-bold mb-1" style="color: #222;">Paspor Asli & Fotokopi</h6>
                            <p class="text-muted small m-0" style="line-height: 1.5;">Masa berlaku paspor minimal 6 bulan
                                terhitung sejak tanggal rencana masuk ke wilayah Turki.</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <i class="fa-solid fa-circle-check mt-1 me-3 fs-5" style="color: #cc292b;"></i>
                        <div>
                            <h6 class="fw-bold mb-1" style="color: #222;">Letter of Acceptance (LoA) Resmi</h6>
                            <p class="text-muted small m-0" style="line-height: 1.5;">Surat bukti penerimaan asli yang
                                diterbitkan oleh pihak Kastamonu Üniversitesi.</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <i class="fa-solid fa-circle-check mt-1 me-3 fs-5" style="color: #cc292b;"></i>
                        <div>
                            <h6 class="fw-bold mb-1" style="color: #222;">Formulir Permohonan Visa</h6>
                            <p class="text-muted small m-0" style="line-height: 1.5;">Telah diisi secara online, dicetak
                                (print), dan ditandatangani oleh pemohon visa.</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <i class="fa-solid fa-circle-check mt-1 me-3 fs-5" style="color: #cc292b;"></i>
                        <div>
                            <h6 class="fw-bold mb-1" style="color: #222;">Dokumen Keuangan (Rekening Koran)</h6>
                            <p class="text-muted small m-0" style="line-height: 1.5;">Bukti tabungan sponsor/orang tua
                                selama 3 bulan terakhir yang menunjukkan kecukupan dana hidup di Turki.</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <i class="fa-solid fa-circle-check mt-1 me-3 fs-5" style="color: #cc292b;"></i>
                        <div>
                            <h6 class="fw-bold mb-1" style="color: #222;">Asuransi Kesehatan Turki Resmi</h6>
                            <p class="text-muted small m-0" style="line-height: 1.5;">
                                Anda <strong>tidak perlu</strong> membeli asuransi perjalanan mandiri dari Indonesia dan
                                <strong>tidak diperbolehkan</strong> menggunakan asuransi dari agen pihak ketiga luar.
                                Sesuai regulasi terbaru, asuransi kesehatan resmi standar imigrasi Turki ini <strong>sudah
                                    otomatis diproses dan diterbitkan langsung di tempat</strong> oleh petugas VFS Global
                                saat Anda datang menyerahkan berkas fisik (biaya sudah termasuk di dalam paket terpadu USD
                                180).
                            </p>
                        </div>
                    </div>


                    <div class="d-flex align-items-start">
                        <i class="fa-solid fa-circle-check mt-1 me-3 fs-5" style="color: #cc292b;"></i>
                        <div>
                            <h6 class="fw-bold mb-1" style="color: #222;">Foto Biometrik & SKCK</h6>
                            <p class="text-muted small m-0" style="line-height: 1.5;">2 lembar foto biometrik 5x5 latar
                                putih dan SKCK aktif dari Polres yang telah diterjemahkan ke bahasa Inggris.</p>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Kotak Informasi Tambahan (Senada dengan Halaman Mandiri) -->
                <div class="col-lg-6">
                    <!-- Kotak 1: Catatan Estimasi Waktu (Merah Transparan Khas) -->
                    <div class="p-4 border-start border-4 shadow-sm mb-4"
                        style="background-color: rgba(204, 41, 43, 0.03); border-color: #cc292b !important; border-radius: 0 15px 15px 0;">
                        <h5 class="fw-bold d-flex align-items-center mb-2" style="color: #cc292b;">
                            <i class="fa-solid fa-clock me-2"></i> Estimasi Waktu Pengurusan
                        </h5>
                        <p class="text-muted small m-0" style="line-height: 1.6;">
                            Sangat disarankan untuk mengajukan visa pelajar minimal <strong>1 hingga 2 bulan sebelum jadwal
                                keberangkatan kuliah</strong>. Hal ini penting untuk mengantisipasi adanya antrean slot
                            janji temu atau berkas tambahan yang mendadak diminta oleh pihak kedutaan.
                        </p>
                    </div>

                    <!-- Kotak 2: Komponen Biaya Visa Terperinci (Krem) -->
                    <div class="p-4 border-start border-4 shadow-sm mb-4"
                        style="background-color: #faf6ee; border-color: #4a4a4a !important; border-radius: 0 15px 15px 0;">
                        <h5 class="fw-bold d-flex align-items-center mb-3" style="color: #4a4a4a;">
                            <i class="fa-solid fa-wallet me-2"></i> Rincian Biaya Pengurusan Visa
                        </h5>
                        <p class="text-muted small mb-3" style="line-height: 1.5;">
                            Pengurusan Visa Pelajar Mandiri mewajibkan pemohon membayar dua komponen biaya utama saat datang
                            ke kantor Gateway (VFS Global):
                        </p>

                        <!-- Detail Komponen Biaya 1 -->
                        <div class="mb-3 pt-2 border-top" style="border-top: 1px dashed rgba(0,0,0,0.1) !important;">
                            <!-- Menggunakan row & col agar responsif di HP -->
                            <div class="row g-2 mb-2 align-items-center">
                                <div class="col-sm-7 col-12">
                                    <span class="small fw-bold text-dark d-block">1. Biaya Stiker Visa Resmi
                                        Kedutaan</span>
                                </div>
                                <div class="col-sm-5 col-12 text-sm-end">
                                    <span class="small fw-bold d-inline-block px-2 py-1 rounded"
                                        style="color: #cc292b; background-color: rgba(204, 41, 43, 0.05);">USD 105 -
                                        110</span>
                                </div>
                            </div>
                            <p class="text-muted small m-0" style="line-height: 1.4; font-size: 0.85rem;">
                                *Biaya wajib cetak visa dari pemerintah Turki (dibayarkan dalam mata uang Dollar USD tunai
                                dengan kondisi lembaran uang yang mulus tanpa lipatan/coretan).
                            </p>
                        </div>

                        <!-- Detail Komponen Biaya 2 -->
                        <div class="mb-3 pt-2 border-top" style="border-top: 1px dashed rgba(0,0,0,0.1) !important;">
                            <!-- Menggunakan row & col agar responsif di HP -->
                            <div class="row g-2 mb-2 align-items-center">
                                <div class="col-sm-7 col-12">
                                    <span class="small fw-bold text-dark d-block">2. Biaya Layanan Jasa Gateway
                                        (VFS)</span>
                                </div>
                                <div class="col-sm-5 col-12 text-sm-end">
                                    <span class="small fw-bold d-inline-block px-2 py-1 rounded"
                                        style="color: #cc292b; background-color: rgba(204, 41, 43, 0.05);">Rp 1.100k - Rp
                                        1.300k</span>
                                </div>
                            </div>
                            <p class="text-muted small m-0" style="line-height: 1.4; font-size: 0.85rem;">
                                *Biaya administrasi pihak ketiga untuk penanganan dokumen, perekaman sidik jari biometrik,
                                dan pengiriman berkas (dibayarkan dalam Rupiah tunai/kartu).
                            </p>
                        </div>

                        <!-- Catatan Kaki Kotak -->
                        <div class="pt-2 border-top" style="border-top: 1px dashed rgba(0,0,0,0.1) !important;">
                            <p class="text-muted small m-0" style="font-size: 0.8rem; color: #6c757d; line-height: 1.4;">
                                *Catatan: Nominal di atas merupakan perkiraan berdasarkan tarif reguler saat ini dan dapat
                                berubah sewaktu-waktu mengikuti fluktuasi kurs mata uang asing serta kebijakan terbaru pihak
                                imigrasi.
                            </p>
                        </div>
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
