@extends('layout.main')

@section('containers')
    <style>
        .contact-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(0, 0, 0, 0.03);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        }

        .contact-info-icon {
            width: 50px;
            height: 50px;
            background-color: #fff5f5;
            color: #dc3545;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            margin-right: 15px;
            flex-shrink: 0;
            border: 1px solid rgba(220, 53, 69, 0.1);
        }

        .form-modern .form-control {
            border: 1px solid rgba(0, 0, 0, 0.08) !important;
            background-color: #ffffff !important;
            padding: 12px 18px;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .form-modern .form-control:focus {
            border-color: rgba(220, 53, 69, 0.4) !important;
            box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.1) !important;
        }

        .map-wrapper {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(0, 0, 0, 0.03);
            height: 100%;
            min-height: 350px;
        }

        .social-link-item {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ffffff;
            color: #495057;
            border: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 50%;
            text-decoration: none;
            transition: all 0.2s ease;
            font-size: 1rem;
        }

        .social-link-item:hover {
            color: #ffffff;
            background-color: #dc3545;
            border-color: #dc3545;
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(220, 53, 69, 0.25);
        }
    </style>

    <section class="section-padding bg-cream">

        <div class="container" style="margin-top: 50px">

            <!-- Header -->
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold mt-3">
                    Hubungi
                    <span class="text-red">Kami</span>
                </h1>
                <div class="divider"></div>
                <p class="mx-auto text-muted mb-4" style="max-width:700px;">
                    Punya pertanyaan mengenai perkuliahan di Kastamonu, kemitraan, atau kegiatan organisasi?
                    Silakan hubungi kami melalui informasi di bawah atau kirimkan pesan langsung kepada kami.
                </p>
            </div>

            <div class="row g-4 justify-content-center mb-5">
                <!-- Info Kontak Kiri -->
                <div class="col-lg-5 d-flex flex-column g-4">

                    <!-- Alamat -->
                    <div class="contact-card p-4 mb-3 d-flex align-items-center">
                        <div class="contact-info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Alamat Sekretariat</h5>
                            <p class="text-muted mb-0">Kastamonu, Turki</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="contact-card p-4 mb-3 d-flex align-items-center">
                        <div class="contact-info-icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Email Resmi</h5>
                            <p class="text-muted mb-0">ppikastamonu@gmail.com</p>
                        </div>
                    </div>

                    <!-- Media Sosial -->
                    <div class="contact-card p-4 grow">
                        <h5 class="fw-bold mb-3">Media Sosial</h5>
                        <p class="text-muted mb-4">Ikuti perkembangan aktivitas terkini kami melalui saluran resmi berikut:
                        </p>
                        <div class="d-flex gap-3">
                            <a href="https://instagram.com/ppi.kastamonu" target="_blank" class="social-link-item">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://www.youtube.com/@ppikastamonu2021" target="_blank" class="social-link-item">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a href="https://www.tiktok.com/@ppi.kastamonu" target="_blank" class="social-link-item">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>

                </div>

                <!-- Formulir Kontak Kanan -->
                <div class="col-lg-7">
                    <div class="contact-card p-5 h-100">
                        <h3 class="fw-bold mb-4 text-red">Kirim Pesan</h3>

                        @if (session('success'))
                            <div id="success-alert" class="alert alert-success border-0 shadow-sm mb-4"
                                style="border-radius: 8px; transition: opacity 0.5s ease;">
                                {{ session('success') }}
                            </div>
                        @endif


                        <form action="{{ url('/kontak/send') }}" method="POST" class="form-modern">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-muted small">Nama Lengkap</label>
                                        <input type="text" name="name" class="form-control" placeholder="Nama Anda"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-muted small">Alamat Email</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="email@contoh.com" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-muted small">Subjek</label>
                                <input type="text" name="subject" class="form-control" placeholder="Judul keperluan Anda"
                                    required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold text-muted small">Pesan</label>
                                <textarea name="message" class="form-control" rows="5" placeholder="Tuliskan pesan Anda di sini..." required></textarea>
                            </div>

                            <button type="submit" class="btn btn-modern bg-red text-white w-100 py-3 fw-bold"
                                style="border-radius: 8px;">
                                Kirim Pesan <i class="fas fa-paper-plane ms-2"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Bagian Peta / Google Maps Terintegrasi -->
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="map-wrapper">
                        <!-- Ganti URL src di bawah ini dengan koordinat atau link embed map Kastamonu University / Kastamonu kota yang Anda inginkan -->
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2991.564926775626!2d33.7698164!3d41.4269622!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4084fa0a26570527%3A0xcd2dc99013330c9a!2sKastamonu%20Universitesi!5e0!3m2!1sid!2sid!4v1785986502720!5m2!1sid!2sid"
                            width="100%" height="100%" style="border:0; min-height: 350px;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var alertElement = document.getElementById("success-alert");

            if (alertElement) {
                setTimeout(function() {
                    alertElement.style.opacity = "0";

                    setTimeout(function() {
                        alertElement.remove();
                    }, 500);

                }, 4000);
            }
        });
    </script>
@endsection
