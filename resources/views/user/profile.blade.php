@extends('layout.main')

@section('containers')

<div class="container-fluid py-5 bg-cream">
    <div class="container">

        {{-- Header --}}
        <div class="service-title text-center mb-5 wow fadeIn">
            <h1 class="display-5 text-red">Developer</h1>
            <p class="fs-6 text-muted">
                Website ini dikembangkan sebagai media informasi resmi
                PPI Kastamonu untuk memudahkan penyampaian informasi kepada
                mahasiswa Indonesia di Universitas Kastamonu.
            </p>
        </div>

        <div class="row align-items-center g-5">

            {{-- Foto --}}
            <div class="col-lg-4 text-center wow fadeInLeft">
                <img
                    src="{{ asset('img/developer.jpg') }}"
                    class="img-fluid developer-photo"
                    alt="Developer"
                >
            </div>

            {{-- Biodata --}}
            <div class="col-lg-8 wow fadeInRight">

                <h2 class="text-red mb-3">
                    Muhammad Arief Aliman
                </h2>

                <p class="text-muted mb-4">
                    Mahasiswa Universitas Kastamonu yang memiliki minat
                    dalam bidang Web Development, Game Development,
                    dan Software Engineering.
                </p>

                <table class="table table-borderless developer-table">
                    <tr>
                        <th>Universitas</th>
                        <td>: Kastamonu University</td>
                    </tr>

                    <tr>
                        <th>Program Studi</th>
                        <td>: Computer Engineering</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>: 4r1efaliman@gmail.com</td>
                    </tr>

                    <tr>
                        <th>GitHub</th>
                        <td>
                            :
                            <a href="https://github.com/DeDexTop"
                               target="_blank"
                               class="text-decoration-none text-red">
                                github.com/DeDexTop
                            </a>
                        </td>
                    </tr>

                </table>

            </div>

        </div>

        {{-- Tentang --}}
        <div class="row mt-5">

            <div class="col-lg-12 wow fadeIn">

                <h3 class="text-red mb-3">
                    Tentang Website
                </h3>

                <p class="text-muted" style="text-align: justify; line-height: 1.9;">
                    Website ini dibuat sebagai media informasi dan dokumentasi
                    kegiatan PPI Kastamonu. Seluruh sistem dikembangkan
                    menggunakan Laravel Framework dengan konsep MVC,
                    sehingga pengelolaan data seperti blog, aktivitas,
                    kabinet, divisi, anggota, dan galeri dapat dilakukan
                    secara lebih mudah melalui halaman administrator.
                </p>

                <p class="text-muted" style="text-align: justify; line-height: 1.9;">
                    Semoga website ini dapat memberikan manfaat bagi seluruh
                    mahasiswa Indonesia di Universitas Kastamonu serta menjadi
                    sarana penyebaran informasi yang lebih efektif.
                </p>

            </div>

        </div>

    </div>
</div>

<style>

.developer-photo{
    width:280px;
    height:280px;
    object-fit:cover;
    border-radius:50%;
    box-shadow:0 12px 30px rgba(0,0,0,.15);
    border:6px solid #fff;
}

.developer-table th{
    color:#333;
    font-weight:600;
}

.developer-table td{
    color:#666;
}

.developer-table a:hover{
    color:#c62828;
}

</style>

@endsection