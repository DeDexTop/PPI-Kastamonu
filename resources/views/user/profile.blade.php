@extends('layout.main')

@section('containers')
    <div class="container-fluid py-5 bg-cream" style="padding-left:0; padding-right:0;">
        <div class="container mb-5" style="margin-top:100px">

            {{-- Header --}}
            <div class="service-title text-center mb-5 wow fadeIn">
                <h1 class="display-5 text-red">Developer</h1>
                <p class="fs-6 text-muted px-2">
                    Website ini dikembangkan sebagai media informasi resmi
                    PPI Kastamonu untuk memudahkan penyampaian informasi kepada
                    mahasiswa Indonesia di Universitas Kastamonu.
                </p>
            </div>

            <div class="row align-items-center g-5 text-center text-lg-start">

                {{-- Foto --}}
                <div class="col-lg-4 text-center wow fadeInLeft center">
                    <img src="{{ asset('img/developer.jpg') }}" class="img-fluid developer-photo" alt="Developer">
                </div>

                {{-- Biodata --}}
                <div class="col-lg-8 wow fadeInRight">

                    <h2 class="text-red mb-3">
                        Muhammad Arief Aliman
                    </h2>

                    <p class="text-muted mb-4 px-2 px-lg-0">
                        Mahasiswa Universitas Kastamonu yang memiliki minat
                        dalam bidang Web Development, Game Development,
                        dan Software Engineering.
                    </p>

                    <div class="px-2 px-lg-0">
                        <table class="table table-borderless developer-table mx-auto ms-lg-0">
                            <tr>
                                <th>Universitas</th>
                                <td class="separator">:</td>
                                <td>Kastamonu University</td>
                            </tr>

                            <tr>
                                <th>Program Studi</th>
                                <td class="separator">:</td>
                                <td>Computer Engineering</td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td class="separator">:</td>
                                <td><a href="mailto:4r1efaliman@gmail.com" target="_blank"
                                        class="text-decoration-none text-red">
                                        4r1efaliman@gmail.com
                                    </a></td>
                            </tr>

                            <tr>
                                <th>GitHub</th>
                                <td class="separator">:</td>
                                <td>
                                    <a href="https://github.com/DeDexTop" target="_blank"
                                        class="text-decoration-none text-red">
                                        github.com/DeDexTop
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>

            </div>

            {{-- Tentang --}}
            <div class="row mt-5">
                <div class="col-lg-12 wow fadeIn text-center text-lg-start px-4 px-lg-3">

                    <h3 class="text-red mb-3">
                        Tentang Website
                    </h3>

                    <p class="text-muted text-justify-custom" style="line-height: 1.9;">
                        Website ini dibuat sebagai media informasi dan dokumentasi
                        kegiatan PPI Kastamonu. Seluruh sistem dikembangkan
                        menggunakan Laravel Framework dengan konsep MVC,
                        sehingga pengelolaan data seperti blog, aktivitas,
                        kabinet, divisi, anggota, dan galeri dapat dilakukan
                        secara lebih mudah melalui halaman administrator.
                    </p>

                    <p class="text-muted text-justify-custom" style="line-height: 1.9;">
                        Semoga website ini dapat memberikan manfaat bagi seluruh
                        mahasiswa Indonesia yang ada di Universitas Kastamonu maupun di tempat lain, serta menjadi
                        sarana penyebaran informasi yang lebih efektif.
                    </p>

                </div>
            </div>

        </div>
    </div>

    <style>
        /* STYLE UTAMA LAYAR DESKTOP */
        .developer-photo {
            width: 280px;
            height: 280px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0 12px 30px rgba(0, 0, 0, .15);
            border: 6px solid #fff;
        }

        .developer-table {
            max-width: 100%;
        }

        .developer-table th {
            color: #333;
            font-weight: 600;
            width: 150px;
            white-space: nowrap;
        }

        .developer-table td {
            color: #666;
        }

        .developer-table .separator {
            width: 20px;
        }

        .text-red {
            color: #dc3545;
        }

        .developer-table a:hover {
            color: #a71d2a;
            text-decoration: underline !important;
        }

        .text-justify-custom {
            text-align: justify;
        }

        /* RESPONSIVE: KHUSUS TAMPILAN LAYAR HP (MOBILE) */
        @media (max-width: 991px) {

            /* Mengubah tabel menjadi layout vertikal yang rapi di HP */
            .developer-table,
            .developer-table tbody,
            .developer-table tr,
            .developer-table th,
            .developer-table td {
                display: block;
                width: 100% !important;
                text-align: center !important;
            }

            .center {
                display: flex;
                justify-content: center;
            }

            /* Menyembunyikan titik dua (:) karena tidak diperlukan lagi saat layout vertikal */
            .developer-table .separator {
                display: none;
            }

            .developer-table tr {
                margin-bottom: 15px;
            }

            .developer-table th {
                padding-bottom: 2px !important;
            }

            .developer-table td {
                padding-top: 0 !important;
                margin-bottom: 5px;
            }

            /* Membuat perataan teks deskripsi tengah di HP agar seimbang */
            .text-justify-custom {
                text-align: center;
            }
        }
    </style>
@endsection
