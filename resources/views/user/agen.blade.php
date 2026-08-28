@extends('layout.main') 

@section('containers')
    <section class="py-5 bg-cream">
        <div class="container" style="margin-top: 100px;">
            <div class="row align-items-center">
                <div class="col-lg-7 text-center text-lg-start">
                    <span class="fw-bold px-3 py-1 rounded-pill small"
                        style="background-color: rgba(204, 41, 43, 0.1); color: #D32F2F;">
                        Informasi Pendaftaran Eksternal
                    </span>
                    <h1 class="display-5 fw-bold mt-3 mb-4" style="color: #222;">
                        Referensi <span style="color: #D32F2F;">Agen Kuliah</span> Turki
                    </h1>
                    <p class="lead text-muted mb-4" style="max-width: 600px;">
                        Daftar lembaga konsultasi pendidikan ke Turki yang rekam jejak alumninya tercatat aktif menempuh
                        studi di Kastamonu University.
                    </p>
                    <a href="#daftar-agen" class="btn px-4 py-2 fw-bold text-white shadow-sm"
                        style="background-color: #D32F2F; border-radius: 30px;">
                        Lihat Daftar Lembaga <i class="fa-solid fa-arrow-down ms-2"></i>
                    </a>
                </div>
                <div class="col-lg-5 d-none d-lg-block text-center">
                    <i class="fa-solid fa-building-columns" style="font-size: 160px; color: rgba(204, 41, 43, 0.15);"></i>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5" id="daftar-agen" style="background-color: #fff;">
        <div class="container">
            <div class="p-4 border-start border-4 shadow-sm mb-5"
                style="background-color: rgba(204, 41, 43, 0.03); border-color: #D32F2F !important; border-radius: 0 15px 15px 0;">
                <h5 class="fw-bold d-flex align-items-center" style="color: #D32F2F;">
                    <i class="fa-solid fa-scale-balanced me-2"></i> Catatan Penting (Disclaimer)
                </h5>
                <p class="text-muted small mt-2 mb-0" style="line-height: 1.6;">
                    PPI Kastamonu <strong>tidak menjalin kemitraan komersial atau kerja sama resmi</strong> dengan
                    lembaga/agen manapun. Daftar di bawah ini murni disajikan sebagai referensi informasi berdasarkan tren
                    agensi yang paling sering digunakan oleh mahasiswa Indonesia di Kastamonu University sebelumnya. Segala
                    bentuk biaya, transaksi, dan kesepakatan kontrak adalah tanggung jawab penuh antara calon mahasiswa dan
                    pihak agensi terkait.
                </p>
            </div>
            <div class="text-center mb-5">
                <h2 class="fw-bold" style="color: #222;">Lembaga Referensi Alumni</h2>
                <p class="text-muted mt-2">Silakan hubungi kontak resmi agensi untuk berkonsultasi mengenai program
                    keberangkatan mereka</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="d-flex flex-column gap-4">
                        <div class="p-4 border-0 shadow-sm bg-cream" style="border-radius: 15px;">
                            <div class="row align-items-center g-3">
                                <div class="col-md-2 text-center">
                                    <div class="d-flex align-items-center justify-content-center text-white fw-bold shadow-sm mx-auto rounded-circle"
                                        style="width: 75px; height: 75px; background-color: #D32F2F; font-size: 1.8rem; letter-spacing: 1px;">
                                        M
                                    </div>
                                </div>
                                <div class="col-md-7 text-center text-md-start">
                                    <h4 class="fw-bold mb-1 text-dark">Mumtaza</h4>
                                    <h6 class="fw-bold mb-2 text-red small">Lembaga Pembinaan & Konsultan Internasional
                                        (Bojonegoro)</h6>
                                    <p class="text-muted small m-0" style="line-height: 1.6;">
                                        Lembaga senior yang berpengalaman sejak 2009 dalam menjembatani studi ke Timur
                                        Tengah dan Turki. Memiliki perwakilan resmi di Turki dan reputasi kuat dalam
                                        menyediakan program pembinaan pra-keberangkatan serta pengurusan legalitas dokumen
                                        yang terstruktur.
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <div class="d-flex flex-column gap-2">
                                        <a href="https://turki.mumtazacenter.com/" target="_blank"
                                            class="btn btn-sm text-white fw-bold py-2 shadow-sm bg-red w-100"
                                            style="border-radius: 8px; font-size: 0.85rem;">
                                            <i class="fa-solid fa-globe me-2"></i> Kunjungi Web Resmi
                                        </a>
                                        <a href="https://www.instagram.com/mumtazaturkiye?igsi=MTl3dDFrZHFxMmJjdQ==" target="_blank"
                                            class="btn btn-sm btn-light fw-bold py-2 border bg-cream w-100"
                                            style="border-radius: 8px; font-size: 0.85rem; color: #4a4a4a;">
                                            <i class="fa-brands fa-instagram me-2"></i> Instagram
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-0 shadow-sm bg-cream" style="border-radius: 15px;">
                            <div class="row align-items-center g-3">
                                <div class="col-md-2 text-center">
                                    <div class="d-flex align-items-center justify-content-center text-white fw-bold shadow-sm mx-auto rounded-circle"
                                        style="width: 75px; height: 75px; background-color: #4a4a4a; font-size: 1.8rem; letter-spacing: 1px;">
                                        MI
                                    </div>
                                </div>
                                <div class="col-md-7 text-center text-md-start">
                                    <h4 class="fw-bold mb-1 text-dark">Misafir</h4>
                                    <h6 class="fw-bold mb-2 text-red small">PT Musafir Sahabat Abadi (Bekasi)</h6>
                                    <p class="text-muted small m-0" style="line-height: 1.6;">
                                        Agensi aktif yang berdiri sejak 2018/2020 dan telah meloloskan 500+ pelajar ke PTN
                                        Turki. Sangat intensif dalam pendampingan berkas, kelas bahasa (TÖMER), persiapan
                                        ujian YÖS, hingga pengawalan pencarian tempat tinggal saat mahasiswa baru tiba di
                                        kota tujuan.
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <div class="d-flex flex-column gap-2">
                                        <a href="https://kuliahditurki.id/" target="_blank"
                                            class="btn btn-sm text-white w-100 fw-bold py-2 shadow-sm bg-red"
                                            style="border-radius: 8px; font-size: 0.85rem;">
                                            <i class="fa-solid fa-globe me-2"></i> Kunjungi Web Resmi
                                        </a>
                                        <a href="https://www.instagram.com/misafir_id?igsi=MTVvZWlteGk0d2tnZg==" target="_blank"
                                            class="btn btn-sm btn-light w-100 fw-bold py-2 border bg-cream"
                                            style="border-radius: 8px; font-size: 0.85rem; color: #4a4a4a;">
                                            <i class="fa-brands fa-instagram me-2"></i> Instagram
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-0 shadow-sm bg-cream" style="border-radius: 15px;">
                            <div class="row align-items-center g-3">
                                <div class="col-md-2 text-center">
                                    <div class="d-flex align-items-center justify-content-center text-white fw-bold shadow-sm mx-auto rounded-circle"
                                        style="width: 75px; height: 75px; background-color: #D32F2F; font-size: 1.8rem; letter-spacing: 1px;">
                                        SIT
                                    </div>
                                </div>
                                <div class="col-md-7 text-center text-md-start">
                                    <h4 class="fw-bold mb-1 text-dark">Studies In Turkiye (SIT)</h4>
                                    <h6 class="fw-bold mb-2 text-red small">Platform Integrasi &amp; Konsultan Studi Turki
                                    </h6>
                                    <p class="text-muted small m-0" style="line-height: 1.6;">
                                        Platform edutech dan agensi khusus yang menjembatani pendaftaran ke puluhan
                                        universitas negeri dan swasta di Turki. Menyediakan konsultasi jurusan yang
                                        transparan, alur pendaftaran efisien, serta keunggulan dalam jaminan akses alokasi
                                        akomodasi di berbagai kota.
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <div class="d-flex flex-column gap-2">
                                        <a href="https://www.studiesinturkey.com/" target="_blank"
                                            class="btn btn-sm text-white w-100 fw-bold py-2 shadow-sm bg-red"
                                            style="border-radius: 8px; font-size: 0.85rem;">
                                            <i class="fa-solid fa-globe me-2"></i> Kunjungi Web Resmi
                                        </a>
                                        <a href="https://www.instagram.com/studiesinturkiye.id?igsi=cHZqeXJrMGU3dWR0" target="_blank"
                                            class="btn btn-sm btn-light w-100 fw-bold py-2 border bg-cream"
                                            style="border-radius: 8px; font-size: 0.85rem; color: #4a4a4a;">
                                            <i class="fa-brands fa-instagram me-2"></i> Instagram
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5 pt-4">
                <div class="col-12">
                    <div class="p-4 border-start border-4 shadow-sm"
                        style="background-color: #faf6ee; border-color: #6c757d !important; border-radius: 0 15px 15px 0;">
                        <h5 class="fw-bold d-flex align-items-center mb-2" style="color: #333;">
                            <i class="fa-solid fa-graduation-cap me-2"></i> Ingin Hemat Biaya? Coba Jalur Mandiri
                        </h5>
                        <p class="text-muted small mb-3" style="line-height: 1.5;">
                            Pendaftaran langsung ke portal resmi Kastamonu University sebenarnya tidak sesulit yang
                            dibayangkan. PPI Kastamonu telah menyediakan modul panduan lengkap langkah demi langkah untuk
                            melakukan registrasi mandiri dari rumah tanpa biaya perantara.
                        </p>
                        <a href="/pendaftaran/mandiri" class="btn btn-sm text-white fw-bold px-4 py-2 shadow-sm"
                            style="background-color: #4a4a4a; border-radius: 8px; font-size: 0.85rem;">
                            Buka Panduan Jalur Mandiri <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
