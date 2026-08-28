@extends('layout.main')

@section('containers')
    <section class="py-5 bg-cream" style="margin-top: 100px;">
        <div class="container my-4">
            <div class="row align-items-center">
                <div class="col-lg-7 text-center text-lg-start">
                    <span class="fw-bold px-3 py-1 rounded-pill small"
                        style="background-color: rgba(204, 41, 43, 0.1); color: #D32F2F">
                        Regulasi & Kebijakan Situs
                    </span>
                    <h1 class="display-5 fw-bold mt-3 mb-4" style="color: #222;">
                        Ketentuan <span style="color: #D32F2F;">Layanan</span>
                    </h1>
                    <p class="lead text-muted mb-4" style="max-width: 600px;">
                        Syarat dan ketentuan penggunaan seluruh fasilitas, informasi, serta konten resmi yang diterbitkan
                        pada website Perhimpunan Pelajar Indonesia (PPI) Kastamonu.
                    </p>
                    @php
                        $bulan = [
                            1 => 'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember',
                        ];
                    @endphp
                    <p class="small text-muted">Terakhir diperbarui: {{ $bulan[date('n')] }} {{ date('Y') }}</p>
                </div>
                <div class="col-lg-5 d-none d-lg-block text-center">
                    <i class="fa-solid fa-scale-balanced" style="font-size: 160px; color: rgba(204, 41, 43, 0.15);"></i>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5" style="background-color: #fff;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="mb-5">
                        <h4 class="fw-bold text-dark mb-3">1. Penerimaan Ketentuan</h4>
                        <p class="text-muted" style="line-height: 1.6;">
                            Dengan mengakses dan menggunakan website PPI Kastamonu, Anda dianggap telah membaca, memahami,
                            dan menyetujui untuk terikat dengan seluruh syarat dan ketentuan layanan yang berlaku di halaman
                            ini. Jika Anda tidak menyetujui bagian apa pun dari ketentuan ini, Anda disarankan untuk tidak
                            melanjutkan penggunaan situs ini.
                        </p>
                    </div>
                    <div class="mb-5">
                        <h4 class="fw-bold text-dark mb-3">2. Hak Kekayaan Intelektual & Batasan Konten</h4>
                        <p class="text-muted mb-3" style="line-height: 1.6;">
                            Seluruh aset digital yang dipublikasikan di dalam situs ini—termasuk namun tidak terbatas pada
                            teks artikel, draf panduan pendaftaran mandiri, modul visa, dokumentasi foto aktivitas, desain
                            grafis, logo organisasi, dan susunan kode sistem—adalah hak milik intelektual sah dari
                            <strong>PPI Kastamonu</strong>, kecuali dinyatakan lain.
                        </p>
                        <div class="p-4 border-start border-4 shadow-sm mb-3"
                            style="background-color: rgba(204, 41, 43, 0.03); border-color: #D32F2F !important; border-radius: 0 15px 15px 0;">
                            <h6 class="fw-bold mb-2" style="color: #D32F2F;">
                                <i class="fa-solid fa-circle-exclamation me-2"></i> Ketentuan Pengutipan & Penyalinan:
                            </h6>
                            <p class="text-muted small m-0" style="line-height: 1.6;">
                                Anda <strong>dilarang keras</strong> menyalin, menggandakan, memodifikasi, atau
                                memperjualbelikan konten panduan dari situs ini demi kepentingan komersial pribadi atau
                                lembaga/agen eksternal tanpa izin tertulis dari pengurus PPI Kastamonu. Pengutipan informasi
                                untuk kepentingan edukasi personal atau referensi blog diperbolehkan dengan syarat wajib
                                **mencantumkan tautan aktif (backlink) menuju halaman sumber website PPI Kastamonu**.
                            </p>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h4 class="fw-bold text-dark mb-3">3. Penafian Tanggung Jawab (Disclaimer)</h4>
                        <p class="text-muted mb-3" style="line-height: 1.6;">
                            Materi informasi pendaftaran mandiri, regulasi visa apostille, dan daftar referensi agensi
                            kuliah disusun berdasarkan pengalaman faktual serta kebijakan imigrasi terkini dari otoritas
                            terkait. PPI Kastamonu berkomitmen penuh menjaga akurasi data tersebut.
                        </p>
                        <p class="text-muted" style="line-height: 1.6;">
                            Namun demikian, PPI Kastamonu tidak bertanggung jawab atas segala kerugian finansial, kendala
                            administrasi berkas, atau penolakan visa yang terjadi akibat kelalaian pribadi pengguna,
                            perubahan regulasi mendadak dari pemerintah Turki/VFS Global, maupun sengketa kontrak kerja sama
                            antara calon mahasiswa dengan lembaga agensi eksternal.
                        </p>
                    </div>
                    <div class="mb-5">
                        <h4 class="fw-bold text-dark mb-3">4. Batasan Penggunaan Formulir Kontak</h4>
                        <p class="text-muted" style="line-height: 1.6;">
                            Saat memanfaatkan fitur pengiriman pesan pada halaman "Hubungi Kami", Anda dilarang mengirimkan
                            data palsu, memalsukan identitas alamat email, atau menyebarkan tautan berisi malware, materi
                            iklan ilegal (spam), serta konten yang mengandung unsur SARA. Sistem web kami dilengkapi dengan
                            fitur keamanan sensor otomatis dan berhak memblokir pengirim yang terindikasi melakukan
                            aktivitas bot berbahaya.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h4 class="fw-bold text-dark mb-3">5. Perubahan Ketentuan Layanan</h4>
                        <p class="text-muted" style="line-height: 1.6;">
                            Pengurus PPI Kastamonu memiliki hak mutlak untuk memperbarui, mengubah, atau mengganti sebagian
                            maupun seluruh isi poin Ketentuan Layanan ini sewaktu-waktu tanpa pemberitahuan tertulis
                            sebelumnya kepada pengguna. Perubahan akan langsung berlaku aktif begitu diunggah di halaman
                            ini.
                        </p>
                    </div>
                    <div class="p-4 border-start border-4 shadow-sm mt-5"
                        style="background-color: #faf6ee; border-color: #4a4a4a !important; border-radius: 0 15px 15px 0;">
                        <h5 class="fw-bold d-flex align-items-center mb-2" style="color: #4a4a4a;">
                            <i class="fa-solid fa-envelope-open-text me-2"></i> Pertanyaan Mengenai Regulasi?
                        </h5>
                        <p class="text-muted small m-0" style="line-height: 1.5;">
                            Jika Anda memiliki pertanyaan, keberatan, atau memerlukan izin tertulis terkait penggunaan aset
                            materi konten di website ini, silakan hubungi tim Hubungan Masyarakat kami melalui halaman <a
                                href="/kontak" class="fw-bold" style="color: #D32F2F;">Hubungi
                                Kami</a> atau mengirim surel resmi ke alamat email organisasi:
                            <strong>ppikastamonu@gmail.com</strong>.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
