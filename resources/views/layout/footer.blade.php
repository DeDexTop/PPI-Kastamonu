<footer class="footer">
    <div class="container-fluid py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5 py-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-beige mb-4">Link Cepat</h4>
                    <a class="btn btn-link" href="/tentang" style="color: #F5E8C7">Tentang</a>
                    <a class="btn btn-link" href="/aktivitas" style="color: #F5E8C7">Aktivitas</a>
                    <a class="btn btn-link" href="/kastulis" style="color: #F5E8C7">Kastulis</a>
                    <a class="btn btn-link" href="/kabinet" style="color: #F5E8C7">Kabinet</a>
                    <a class="btn btn-link" href="/blog" style="color: #F5E8C7">Blog</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-beige mb-4">Media Kami</h4>
                    <a class="btn text-beige" style="cursor: pointer; display: flex; align-items: center;" href="https://www.tiktok.com/@ppi.kastamonu" target="_blank" rel="noopener noreferrer"><i class="fab fa-tiktok text-beige"></i>TikTok</a>
                    <a class="btn text-beige" style="cursor: pointer; display: flex; align-items: center;" href="https://www.instagram.com/ppikastamonu/" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram text-beige"></i>Instagram</a>
                    <a class="btn text-beige" style="cursor: pointer; display: flex; align-items: center;" href="https://www.youtube.com/@ppikastamonu2021" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube text-beige"></i>YouTube</a>
                    <a class="btn text-beige" style="cursor: pointer; display: flex; align-items: center;" href="mailto:ppikastamonu@gmail.com" target="_blank" rel="noopener noreferrer"><i class="fas fa-envelope text-beige"></i>ppikastamonu@gmail.com</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="/galeri"><h4 class="text-beige mb-4">Galeri</h4></a>
                    <div class="row g-2">
                        @forelse($footerImages as $image)

                            <div class="col-4">
                                <a href="/galeri">
                                    <img
                                        class="img-fluid w-100"
                                        src="{{ asset('storage/'.$image['image_path']) }}"
                                        alt="Galeri"
                                        style="height:90px; object-fit:cover; border-radius:10px;">
                                </a>
                            </div>

                        @empty

                            <div class="col-12 text-center py-3">
                                <p class="text-beige mb-0">
                                    Belum ada gambar di galeri.
                                </p>
                            </div>
                        </div>

                        @endforelse
                </div>
            </div>
            <div class="copyright pt-5 text-white">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="fw-semi-bold text-beige" href="/dashboard">PPI Kastamonu</a>, Semua Hak Dilindungi Undang-undang
                    </div>
                    <div class="col-md-6 text-center text-md-end mb-3 mb-md-0">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Dirancang Oleh <a class="fw-semi-bold text-beige" href="https://htmlcodex.com" target="_blank">HTML Codex</a>
                    </div>
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                       Dikembangkan Oleh <a class="fw-semi-bold text-beige" href="/profile">M. Arief Aliman</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>