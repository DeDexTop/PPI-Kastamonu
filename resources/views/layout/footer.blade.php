<footer class="footer">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <h4>
                    PPI Kastamonu
                </h4>
                <p class="mb-4">
                    Perhimpunan Pelajar Indonesia Kastamonu
                    sebagai wadah mahasiswa Indonesia
                    untuk berkembang, berkarya, dan
                    mempererat hubungan kekeluargaan.
                </p>
                <div class="d-flex gap-3 link-center">
                    <a href="https://www.instagram.com/ppikastamonu/" target="_blank" class="social-circle">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.tiktok.com/@ppi.kastamonu" target="_blank" class="social-circle">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="https://www.youtube.com/@ppikastamonu2021" target="_blank" class="social-circle">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <h4>
                    Link Cepat
                </h4>
                <div class="row">
                    <div class="col-6">
                        <div class="footer-links">
                            <a href="/tentang" class="btn btn-link text-start p-0 mb-2" style="font-size: 0.9rem;">
                                Tentang Kami
                            </a>
                            <a href="/aktivitas" class="btn btn-link text-start p-0 mb-2" style="font-size: 0.9rem;">
                                Aktivitas
                            </a>
                            <a href="/kastulis" class="btn btn-link text-start p-0 mb-2" style="font-size: 0.9rem;">
                                Kastulis
                            </a>
                            <a href="/kabinet" class="btn btn-link text-start p-0 mb-2" style="font-size: 0.9rem;">
                                Kabinet
                            </a>
                            <a href="/blog" class="btn btn-link text-start p-0 mb-2" style="font-size: 0.9rem;">
                                Blog
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="footer-links border-start ps-3"
                            style="border-color: rgba(255,255,255,0.1) !important;">
                            <span class="d-block fw-bold mb-2 small text-cream" style="letter-spacing: 0.5px;">INFO
                                KULIAH</span>
                            <a href="/pendaftaran/mandiri" class="btn btn-link text-start p-0 mb-2"
                                style="font-size: 0.85rem;">
                                Jalur Mandiri
                            </a>
                            <a href="/pendaftaran/apostille" class="btn btn-link text-start p-0 mb-2"
                                style="font-size: 0.85rem;">
                                Apostille
                            </a>
                            <a href="/pendaftaran/visa-pelajar" class="btn btn-link text-start p-0 mb-2"
                                style="font-size: 0.85rem;">
                                Visa Pelajar
                            </a>
                            <a href="/pendaftaran/agen" class="btn btn-link text-start p-0 mb-2"
                                style="font-size: 0.85rem;">
                                Referensi Agen
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <a href="/galeri" class="text-decoration-none">
                    <h4>
                        Galeri
                    </h4>
                </a>
                @if ($footerImages->count())
                    <div class="row g-2 footer-gallery">
                        @foreach ($footerImages as $image)
                            <div class="col-4">
                                <a href="/galeri">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Gallery PPI Kastamonu">
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>
                        Belum ada gambar di galeri.
                    </p>
                @endif
            </div>
        </div>
        <div class="copyright">
            <div class="row align-items-center">
                <div class="col-lg-4 text-center text-lg-start mb-3 mb-lg-0">
                    © {{ date('Y') }}
                    <a href="/dashboard">
                        PPI Kastamonu
                    </a>
                    Semua Hak Dilindungi
                    <br>
                    <a href="/terms-of-service">Ketentuan Layanan</a>
                </div>
                <div class="col-lg-4 text-center mb-3">
                    Desain Dasar Oleh
                    <a class="text-beige fw-bold" href="https://htmlcodex.com" target="_blank">
                        HTML Codex
                    </a>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    Dikembangkan Oleh
                    <a href="/profile">
                        M. Arief Aliman
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
