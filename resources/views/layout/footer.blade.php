<footer class="footer">

    <div class="container py-5">

        <div class="row g-5">


            {{-- BRAND --}}
            <div class="col-lg-4 col-md-6">

                <h4>
                    PPI Kastamonu
                </h4>


                <p class="mb-4">
                    Persatuan Pelajar Indonesia Kastamonu
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




            {{-- LINK --}}
            <div class="col-lg-4 col-md-6">


                <h4>
                    Link Cepat
                </h4>


                <div class="footer-links">


                    <a href="/tentang" class="btn btn-link text-start">

                        Tentang Kami

                    </a>


                    <a href="/aktivitas" class="btn btn-link text-start">

                        Aktivitas

                    </a>


                    <a href="/kastulis" class="btn btn-link text-start">

                        Kastulis

                    </a>


                    <a href="/kabinet" class="btn btn-link text-start">

                        Kabinet

                    </a>


                    <a href="/blog" class="btn btn-link text-start">

                        Blog

                    </a>


                </div>


            </div>





            {{-- GALERI --}}
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





        {{-- COPYRIGHT --}}

        <div class="copyright">


            <div class="row align-items-center">


                <div class="col-lg-4 text-center text-lg-start mb-3 mb-lg-0">

                    © {{ date('Y') }}

                    <a href="/dashboard">
                        PPI Kastamonu
                    </a>

                    <br>

                    Semua Hak Dilindungi.

                </div>



                <div class="col-lg-4 text-center mb-3">
                    Dirancang oleh
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
