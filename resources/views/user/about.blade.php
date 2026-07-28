@extends('layout.main')

@section('containers')
    <div class=" container-fluid py-5 bg-cream" style="padding-left: 0px; padding-right:0px">
        <div class="container mb-4">
            <div class="card border-0">
                <div class="card-body bg-cream">
                    <h3 class="display-1 text-start text-red pe-3">Tentang Kami</h3>
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.2s">
                            <div class="about-img">
                                <img class="img-fluid w-100" src="{{ asset('img/musta.JPG') }}" alt="Image" style="border-radius: 15px">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h1 class="display-6 mb-4 wow fadeIn" data-wow-delay="0.2s">Perhimpunan Pelajar Indonesia di Kastamonu</h1>
                            <p class="mb-4 wow fadeIn text-danger" data-wow-delay="0.3s"></p>
                            <div class="row g-4 pt-2">
                                <div class=" wow fadeIn" data-wow-delay="0.4s">
                                    <div class="h-100">
                                        <h3>Fungsi: </h3>
                                        <p class="text-dark"><i class="fa fa-check text-red me-2"></i>Wadah berhimpunnya pelajar Indonesia di Kastamonu untuk mencapai cita-cita pembinaan anggota, pendalaman ilmu dan pengembangan potensi, serta penyaluran partisipasi dan pengabdian sosial.</p>
                                        <p class="text-dark"><i class="fa fa-check text-red me-2"></i>Wadah peningkatan kesadaran berpikir jernih, tajam, solutif dan berorientasi ke masa depan.</p>
                                        <h3>Tujuan: </h3>
                                        <p class="text-dark"><i class="fa fa-check text-red me-2"></i>Membentuk pelajar yang beriman, bertakwa dan memiliki kepribadian yang luhur, pengetahuan yang dalam, wawasan yang luas, kemampuan yang handal, serta kepedulian sosial yang tinggi.</p>
                                        <p class="text-dark mb-0"><i class="fa fa-check text-red me-2"></i>Membina pelajar agar mampu berperan aktif dalam pembangunan umat, bangsa dan negara.</p>
                                        <p class="text-dark mb-0"><i class="fa fa-check text-red me-2"></i>Memperjuangkan aspirasi dan kepentingan pelajar baik pada tingkat lokal maupun global.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 bg-cream">
        <div class="container mb-3">
            <div class="card border-0">
                <div class="card-body bg-cream">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6">
                            <div class="rounded wow fadeIn" data-wow-delay="0.5s">
                                <div class="about-img">
                                    <img class="img-fluid w-100" src="{{ asset('img/Logo ppi.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h1 class="display-6 mb-4 wow fadeIn text-red" data-wow-delay="0.2s">Makna Logo Kami</h1>
                            <p class="text-dark wow fadeIn" data-wow-delay="0.4s"><i class="fa fa-check text-red me-2"></i>Bentuk dasar bawang putih dikarenakan bawang putih merupakan indentitas dari kota Kastamonu karena Kastamonu merupakan kota penghasil bawang putih terbaik di Turki.</p>
                            <p class="text-dark wow fadeIn" data-wow-delay="0.5s"><i class="fa fa-check text-red me-2"></i>Ujung Pena yang mengusung di tengah dikarenakan pena merupakan simbol dari pelajar.</p>
                            <p class="text-dark wow fadeIn" data-wow-delay="0.5s"><i class="fa fa-check text-red me-2"></i>Di bagian kiri terdapat ruang berwarna merah dan putih melambakngakan bendera merah putih dengan makna identitas negara Indonesia.</p>
                            <p class="text-dark wow fadeIn" data-wow-delay="0.6s"><i class="fa fa-check text-red me-2"></i>Di sebelah kanan terdapat bulan sabit dan bintang di latar belakangi oleh warna merah menggambarkan bendera Turki yang mana kami pelajar Indonesia sedang mengenyam pendidikan di Turki.</p>
                            <p class="text-dark wow fadeIn" data-wow-delay="0.6s"><i class="fa fa-check text-red me-2"></i>Bulan sabit kuning terbalik merupakan lambang Kastamonun Belediyesi.</p>
                            <p class="text-dark wow fadeIn" data-wow-delay="0.6s"><i class="fa fa-check text-red me-2"></i>Di bagian tengah bawah terdapat siluet-siluet penunjuk kota kastamonu.</p>
                            <p class="text-dark wow fadeIn" data-wow-delay="0.6s"><i class="fa fa-check text-red me-2"></i>Sungai yang meruncing di akhir melambangkan satu tujuan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5 bg-cream">
        <div class="container mb-4">
            <div class="card border-0 bg-cream">
                <div class="card-body">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6">
                            <div class="rounded wow fadeIn" data-wow-delay="0.5s">
                                <img class="img-fluid w-100" style="border-radius: 15px" src="{{ asset('img/kastam.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h1 class="display-6 mb-4 wow fadeIn text-red" data-wow-delay="0.2s">Kastamonu</h1>
                            <p class="text-dark wow fadeIn" data-wow-delay="0.4s">Provinsi Kastamonu terletak di wilayah Laut Hitam Barat antara 'Lintang Utara dan 33’46' Bujur 41’21 Timur. Luas area 13.108km². Ketinggian rata-rata provinsi ini adalah 775 m diatas permukaan laut. Berbatasan dengan Provinsi Sinop di sebelah barat, Provinsi Karabük dan Bartın di sebelah timur, Provinsi Çankırı di selatan, dan Provinsi Çorum di tenggara. Seluruh bagian utara provinsi membentuk garis pantai menuju Laut Hitam, dan panjang garis pantai Provinsi Kastamonu adalah 170km. Ada dua jenis iklim yang berlaku di Seluruh Provinsi Kastamonu. Provinsi di bagian utara memiliki iklim Laut Hitam dan di bagian selatan memiliki iklim benua. Pada periode musim dingin, curah hujan menyumbang dari curah hujan tahunan dan 27% 18% dari curah hujan pada periode musim panas. Suhu tahunan rata-rata di pusat Kastamonu adalah sekitar 9,8°C.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection