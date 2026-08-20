@extends('layout.main') {{-- Ganti dengan nama master layout Anda jika berbeda --}}

@section('containers')
    <!-- Hero Section / Header Halaman -->
    <section class="py-5 bg-cream" style="margin-top: 100px;">
        <div class="container my-4">
            <div class="row align-items-center">
                <div class="col-lg-7 text-center text-lg-start">
                    <span class="fw-bold px-3 py-1 rounded-pill small"
                        style="background-color: rgba(204, 41, 43, 0.1); color: #cc292b;">
                        Panduan Resmi PPI Kastamonu
                    </span>
                    <h1 class="display-5 fw-bold mt-3 mb-4" style="color: #222;">
                        Pendaftaran Jalur <span style="color: #cc292b;">Mandiri</span>
                    </h1>
                    <p class="lead text-muted mb-4" style="max-width: 600px;">
                        Kuliah di Kastamonu University tanpa perantara. Panduan lengkap tata cara pendaftaran, persyaratan
                        berkas, hingga alur seleksi resmi untuk mahasiswa internasional.
                    </p>
                    <a href="https://kastamonu.edu.tr" target="_blank" class="btn px-4 py-2 fw-bold text-white shadow-sm"
                        style="background-color: #cc292b; border-radius: 30px;">
                        Kunjungi Situs Resmi Kampus <i class="fa-solid fa-arrow-up-right-from-square ms-2"></i>
                    </a>
                </div>
                <div class="col-lg-5 d-none d-lg-block text-center">
                    <i class="fa-solid fa-graduation-cap" style="font-size: 180px; color: rgba(204, 41, 43, 0.15);"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Konten Utama -->
    <section class="py-5" style="background-color: #fff;">
        <div class="container">

            <!-- Bagian Alur Pendaftaran -->
            <div class="text-center mb-5">
                <h2 class="fw-bold" style="color: #222;">Alur Pendaftaran <span style="position: relative;">Mandiri<span
                            style="position: absolute; bottom: -8px; left: 25%; width: 50%; height: 3px; background-color: #cc292b; border-radius: 2px;"></span></span>
                </h2>
                <p class="text-muted mt-3">Langkah-langkah yang harus Anda lalui dari awal hingga dinyatakan diterima</p>
            </div>

            <div class="row g-4 mb-5">
                <!-- Langkah 1 -->
                <div class="col-md-4">
                    <div class="card h-100 p-4 border-0 shadow-sm bg-cream" style="border-radius: 15px;">
                        <div class="d-flex align-items-center justify-content-center mb-3 rounded-circle"
                            style="width: 50px; height: 50px; background-color: #cc292b; color: #fff;">
                            <h4 class="m-0 fw-bold text-cream">1</h4>
                        </div>
                        <h5 class="fw-bold mb-2">Persiapan Berkas</h5>
                        <p class="text-muted small m-0">Siapkan seluruh dokumen wajib dan pastikan hasil pindai (scan)
                            terlihat jelas sebelum diunggah ke sistem otomasi universitas.</p>
                    </div>
                </div>
                <!-- Langkah 2 -->
                <div class="col-md-4">
                    <div class="card h-100 p-4 border-0 shadow-sm bg-cream" style="border-radius: 15px;">
                        <div class="d-flex align-items-center justify-content-center mb-3 rounded-circle"
                            style="width: 50px; height: 50px; background-color: #cc292b; color: #fff;">
                            <h4 class="m-0 fw-bold text-cream">2</h4>
                        </div>
                        <h5 class="fw-bold mb-2">Pengisian Otomasi & Biaya</h5>
                        <p class="text-muted small m-0">Buka portal pendaftaran mahasiswa asing (*Yabancı Uyruklu Öğrenci
                            Otomasyonu*), isi data diri, pilih program studi impian Anda, dan selesaikan pembayaran
                            administrasi.</p>
                    </div>
                </div>
                <!-- Langkah 3 -->
                <div class="col-md-4">
                    <div class="card h-100 p-4 border-0 shadow-sm bg-cream" style="border-radius: 15px;">
                        <div class="d-flex align-items-center justify-content-center mb-3 rounded-circle"
                            style="width: 50px; height: 50px; background-color: #cc292b; color: #fff;">
                            <h4 class="m-0 fw-bold text-cream">3</h4>
                        </div>
                        <h5 class="fw-bold mb-2">Pengumuman LoA</h5>
                        <p class="text-muted small m-0">Pantau hasil seleksi melalui akun pendaftaran Anda. Jika dinyatakan
                            lulus, unduh *Letter of Acceptance* (LoA) resmi untuk pengurusan berkas keberangkatan.</p>
                    </div>
                </div>
            </div>

            <!-- Bagian Persyaratan Dokumen & Ketentuan Kampus -->
            <div class="row mt-5 pt-4">
                <!-- KOLOM KIRI: DOKUMEN WAJIB -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h3 class="fw-bold mb-3" style="color: #222;">Dokumen yang Wajib Disiapkan</h3>
                    <p class="text-muted mb-4">Berikut adalah berkas-berkas yang diperlukan untuk mengunggah pendaftaran
                        Anda:</p>

                    <div class="pe-lg-3">
                        <!-- Berkas 1 -->
                        <div class="d-flex align-items-start mb-4">
                            <i class="fa-solid fa-circle-check mt-1 me-3" style="color: #cc292b;"></i>
                            <div>
                                <h6 class="fw-bold mb-1" style="color: #222;">Paspor / Ikamet</h6>
                                <p class="text-muted small m-0" style="line-height: 1.5;">Kartu identitas resmi yang masih
                                    aktif selama masa pendaftaran berlangsung.</p>
                            </div>
                        </div>

                        <!-- Berkas 2 -->
                        <div class="d-flex align-items-start mb-4">
                            <i class="fa-solid fa-circle-check mt-1 me-3" style="color: #cc292b;"></i>
                            <div>
                                <h6 class="fw-bold mb-1" style="color: #222;">Foto Biometrik Standar Ikamet</h6>
                                <p class="text-muted small m-0" style="line-height: 1.5;">Foto terbaru dengan latar belakang
                                    putih sesuai dengan standar imigrasi Turki.</p>
                            </div>
                        </div>

                        <!-- Berkas 3 -->
                        <div class="d-flex align-items-start mb-4">
                            <i class="fa-solid fa-circle-check mt-1 me-3" style="color: #cc292b;"></i>
                            <div>
                                <h6 class="fw-bold mb-1" style="color: #222;">Ijazah SMA (Transkrip Nilai) / YÖS</h6>
                                <p class="text-muted small m-0" style="line-height: 1.5;">Berkas ijazah asli sekolah
                                    menengah yang menampilkan nilai atau sertifikat hasil ujian YÖS yang Anda ikuti.</p>
                            </div>
                        </div>

                        <!-- Berkas 4 -->
                        <div class="d-flex align-items-start mb-4">
                            <i class="fa-solid fa-circle-check mt-1 me-3" style="color: #cc292b;"></i>
                            <div>
                                <h6 class="fw-bold mb-1" style="color: #222;">Terjemahan Ijazah & Transkrip Nilai</h6>
                                <p class="text-muted small m-0" style="line-height: 1.5;">Wajib diterjemahkan ke dalam
                                    Bahasa Turki atau Bahasa Inggris oleh penerjemah tersumpah.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- KOLOM KANAN: KOTAK INFORMASI ATAS -->
                <div class="col-lg-6">
                    <!-- Kotak 1: Ketentuan Pilihan Jurusan (Merah Transparan) -->
                    <div class="p-4 border-start border-4 shadow-sm mb-4"
                        style="background-color: rgba(204, 41, 43, 0.03); border-color: #cc292b !important; border-radius: 0 15px 15px 0;">
                        <h5 class="fw-bold d-flex align-items-center" style="color: #cc292b;">
                            <i class="fa-solid fa-list-ol me-2"></i> Ketentuan Pilihan Jurusan
                        </h5>
                        <p class="text-muted small mt-2 mb-3" style="line-height: 1.5;">
                            Saat mengisi formulir pendaftaran mahasiswa internasional di portal universitas, Anda diberikan
                            kesempatan untuk memilih beberapa program studi sekaligus dengan batas:
                        </p>
                        <h3 class="fw-bold mb-2" style="color: #222;">Maksimal 8 Jurusan</h3>
                        <p class="text-muted small m-0" style="font-size: 0.85rem;">
                            *Gunakan kesempatan ini untuk menyusun strategi pilihan jurusan utama hingga alternatif secara
                            urut berdasarkan minat Anda.
                        </p>
                    </div>

                    <!-- Kotak 2: Biaya Pendaftaran Resmi (Krem) -->
                    <div class="p-4 border-start border-4 shadow-sm mb-4"
                        style="background-color: #faf6ee; border-color: #4a4a4a !important; border-radius: 0 15px 15px 0;">
                        <h5 class="fw-bold d-flex align-items-center" style="color: #4a4a4a;">
                            <i class="fa-solid fa-receipt me-2"></i> Biaya Pendaftaran Resmi
                        </h5>
                        <p class="text-muted small mt-2 mb-2" style="line-height: 1.5;">
                            Setiap pendaftar jalur internasional (mandiri) dikenakan biaya administrasi pendaftaran dari
                            pihak kampus sebesar:
                        </p>
                        <h4 class="fw-bold mb-2" style="color: #222;">1.000 TL <span
                                class="fs-6 fw-normal text-muted">(Seribu Lira Turki)</span></h4>
                        <p class="text-muted small m-0" style="font-size: 0.85rem; color: #6c757d; line-height: 1.4;">
                            *Biaya disetorkan langsung ke rekening resmi Kastamonu Üniversitesi melalui sistem pembayaran
                            otomasi saat melakukan submit berkas.
                        </p>
                    </div>
                </div>
            </div>

            <!-- BARIS BARU KHUSUS KOTAK KONTAK (Memanjang Penuh di Bawah Keduanya) -->
            <div class="row mt-2">
                <div class="col-12">
                    <!-- Kotak 3: Kontak Hubung Universitas (Abu-abu Terang) -->
                    <div class="p-4 border-start border-4 shadow-sm"
                        style="background-color: #f8f9fa; border-color: #6c757d !important; border-radius: 0 15px 15px 0;">
                        <h5 class="fw-bold d-flex align-items-center" style="color: #333;">
                            <i class="fa-solid fa-circle-info me-2"></i> Kontak Hubung Universitas
                        </h5>
                        <p class="text-muted small mt-2 mb-3" style="line-height: 1.5;">
                            Jika Anda mengalami kendala teknis pada portal otomasi kampus, Anda dapat menghubungi kantor
                            International Student Office (ISO) Kastamonu University:
                        </p>
                        <div class="pt-3 border-top" style="border-top: 1px dashed rgba(0,0,0,0.1) !important;">
                            <p class="small m-0 text-muted" style="line-height: 1.6; font-size: 0.9rem;">
                                <strong>Email ISO:</strong> <span class="text-dark">iso@kastamonu.edu.tr</span> <br>
                                <strong>Telepon ISO:</strong> <span class="text-dark">+90 366 280 10 00 (ext. 1234)</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================= SECTION REGISTRASI ULANG KAMPUS ================= -->
            <section class="py-5 mt-5" style="border-top: 1px solid rgba(0,0,0,0.05);">
                <div class="row align-items-start">

                    <!-- KOLOM KANAN: DAFTAR BERKAS REGISTRASI FISIK -->
                    <div class="col-lg-7 order-lg-1">
                        <h3 class="fw-bold mb-3" style="color: #222;">Berkas Registrasi Ulang Kampus</h3>
                        <p class="text-muted mb-4">Selamat jika Anda dinyatakan lulus! Jika sudah menerima LoA resmi,
                            siapkan
                            berkas fisik berikut untuk diserahkan ke universitas saat tiba di Kastamonu:</p>

                        <div class="pe-lg-4">
                            <!-- Berkas 1 -->
                            <div class="d-flex align-items-start mb-4">
                                <i class="fa-solid fa-file-invoice mt-1 me-3 fs-5" style="color: #cc292b;"></i>
                                <div>
                                    <h6 class="fw-bold mb-1" style="color: #222;">Letter of Acceptance (LoA) / Hasil
                                        Kelulusan</h6>
                                    <p class="text-muted small m-0" style="line-height: 1.5;">Surat bukti penerimaan
                                        mahasiswa baru yang dicetak langsung dari portal pendaftaran online universitas.</p>
                                </div>
                            </div>

                            <!-- Berkas 2 -->
                            <div class="d-flex align-items-start mb-4">
                                <i class="fa-solid fa-passport mt-1 me-3 fs-5" style="color: #cc292b;"></i>
                                <div>
                                    <h6 class="fw-bold mb-1" style="color: #222;">Paspor Asli & Salinan (Fotokopi)</h6>
                                    <p class="text-muted small m-0" style="line-height: 1.5;">Membawa paspor asli beserta
                                        halaman depan dan halaman yang tertera visa masuk Turki (jika ada).</p>
                                </div>
                            </div>

                            <!-- Berkas 3 -->
                            <div class="d-flex align-items-start mb-4">
                                <i class="fa-solid fa-file mt-1 me-3 fs-5" style="color: #cc292b;"></i>
                                <div>
                                    <h6 class="fw-bold mb-1" style="color: #222;">Ijazah Asli, Transkrip & Terjemahan
                                        Resmi</h6>
                                    <p class="text-muted small m-0" style="line-height: 1.5;">Membawa dokumen asli sekolah
                                        beserta dokumen hasil terjemahan tersumpah bahasa Turki/Inggris yang telah
                                        disiapkan. <strong>Ijazah Asli dan Transkrip nilai harus sudah di-Apostille terlebih
                                            dahulu. <a href="/pendaftaran/apostille" class="fw-bold"
                                                style="color: #cc292b; text-decoration: underline;">
                                                Lihat Panduan Cara Apostille Kemenkumham Di Sini.
                                            </a>
                                        </strong>
                                    </p>
                                </div>
                            </div>

                            <!-- Berkas 4 -->
                            <div class="d-flex align-items-start mb-4">
                                <i class="fa-solid fa-stamp mt-1 me-3 fs-5" style="color: #cc292b;"></i>
                                <div>
                                    <h6 class="fw-bold mb-1" style="color: #222;">Sertifikat Penyetaraan Ijazah (Denklik
                                        Belgesi)</h6>
                                    <p class="text-muted small m-0" style="line-height: 1.5;">Surat resmi penyetaraan
                                        ijazah SMA Indonesia ke sistem sekolah Turki. Dapat diurus di Kedutaan Besar Turki
                                        di Jakarta atau di Dinas Pendidikan (Milli Eğitim Müdürlüğü) saat tiba di Turki.</p>
                                </div>
                            </div>

                            <!-- Berkas 5 -->
                            <div class="d-flex align-items-start mb-4">
                                <i class="fa-solid fa-images mt-1 me-3 fs-5" style="color: #cc292b;"></i>
                                <div>
                                    <h6 class="fw-bold mb-1" style="color: #222;">Pasfoto Biometrik Tambahan</h6>
                                    <p class="text-muted small m-0" style="line-height: 1.5;">Siapkan cetak fisik foto
                                        biometrik berlatar belakang putih ukuran standar Turki sebanyak 4-6 lembar untuk
                                        arsip data universitas.</p>
                                </div>
                            </div>

                            <!-- Berkas 6 -->
                            <div class="d-flex align-items-start mb-4">
                                <i class="fa-solid fa-receipt mt-1 me-3 fs-5" style="color: #cc292b;"></i>
                                <div>
                                    <h6 class="fw-bold mb-1" style="color: #222;">Bukti Bayar Spp Semester Ganjil (Harc
                                        Makbuzu)</h6>
                                    <p class="text-muted small m-0" style="line-height: 1.5;">Resi atau struk bukti
                                        setoran bank untuk pembayaran uang kuliah semester pertama sesuai dengan tarif
                                        jurusan masing-masing.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- KOLOM KIRI: INFO DAFTAR JURUSAN & PERINGATAN (KREATIVE BOX) -->
                    <div class="col-lg-5 mb-4 mb-lg-0 order-lg-2">
                        <!-- Kotak Peringatan Penting (Merah Transparan Khas) -->
                        <div class="p-4 border-start border-4 shadow-sm mb-4"
                            style="background-color: rgba(204, 41, 43, 0.03); border-color: #cc292b !important; border-radius: 0 15px 15px 0;">
                            <h5 class="fw-bold d-flex align-items-center" style="color: #cc292b;">
                                <i class="fa-solid fa-triangle-exclamation me-2"></i> Perhatian Penting!
                            </h5>
                            <p class="text-muted small mt-2 mb-0" style="line-height: 1.6;">
                                Semua dokumen fisik asli dari Indonesia <strong class="text-red">wajib dibawa</strong> saat
                                keberangkatan ke
                                Turki. Proses registrasi ulang dilakukan secara langsung secara tatap muka di kantor
                                International Student Office (ISO) Kastamonu University.
                            </p>
                        </div>

                        <!-- Tambahan Pentingnya Visa Pelajar dengan Tombol Tautan -->
                        <div class="p-4 border-start border-4 shadow-sm mb-4"
                            style="background-color: #faf6ee; border-color: #cc292b !important; border-radius: 0 15px 15px 0;">
                            <h6 class="fw-bold d-flex align-items-center mb-2" style="color: #cc292b;">
                                <i class="fa-solid fa-passport me-2"></i> Kewajiban Visa Pelajar
                            </h6>
                            <p class="text-muted small m-0" style="line-height: 1.6;">
                                Anda diwajibkan untuk <strong class="text-red">membuat Visa Pelajar (Student Visa)</strong>
                                di Kedutaan
                                Besar Turki di Jakarta sebelum berangkat. Memiliki Visa Pelajar resmi di perlukan untuk
                                proses
                                registrasi di kampus dan untuk penerbitan izin tinggal (Ikamet) di Kastamonu.
                            </p>

                            <!-- TAMBAHAN: Tombol Tautan Menuju Halaman Panduan Visa -->
                            <div class="mt-4 pt-2 border-top" style="border-top: 1px dashed rgba(0,0,0,0.1) !important;">
                                <a href="/pendaftaran/visa-pelajar"
                                    class="btn btn-sm text-white w-100 fw-bold py-2 shadow-sm"
                                    style="background-color: #cc292b; border-radius: 8px; font-size: 0.85rem;">
                                    Lihat Panduan Cara Membuat Visa Pelajar <i class="fa-solid fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>


                        <!-- Kotak Tambahan: Alur Setelah Datang -->
                        <div class="p-4 border-start border-4 shadow-sm"
                            style="background-color: #faf6ee; border-color: #4a4a4a !important; border-radius: 0 15px 15px 0;">
                            <h6 class="fw-bold mb-2" style="color: #222;">Setelah Registrasi Kampus:</h6>
                            <p class="text-muted small m-0" style="line-height: 1.5;">
                                Setelah menyerahkan berkas fisik ke kampus, Anda akan mendapatkan Nomor Induk Mahasiswa
                                (Öğrenci Numarası) aktif untuk kebutuhan pengurusan izin tinggal (Ikamet) di Kota Kastamonu.
                            </p>
                        </div>
                    </div>

                </div>
            </section>

        </div>
    </section>
@endsection
