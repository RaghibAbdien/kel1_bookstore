@extends('layouts.dashboard')

@section('page-title', 'Landing Page')

@section('content')
    <!-- Home Section -->
    <section id="home" class="section text-white"
        style="background: url('https://source.unsplash.com/1600x900/?bookstore') center/cover no-repeat; height: 100vh; display: flex; align-items: center; justify-content: center; text-align: center;">
        <div>
            <h1 style="font-size: 4rem; font-weight: bold; color: white; text-shadow: 2px 2px 8px rgba(0,0,0,0.7);">Selamat
                Datang di Kel1_Bookstore</h1>
            <p style="font-size: 1.5rem; margin: 20px 0;">Temukan Inspirasi, Jelajahi Pengetahuan</p>
            <a href="/bookstore"
                style="background-color: #007bff; color: white; padding: 10px 20px; border: none; text-decoration: none; font-size: 1.2rem; border-radius: 5px;">Jelajahi
                Buku</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section" style="padding: 60px 0;">
        <div class="container">
            <h2 class="section-title" style="font-size: 2.5rem; text-align: center; margin-bottom: 40px;">Tentang Kami</h2>
            <div class="row">
                <div class="col-md-6">
                    <img src="https://source.unsplash.com/1000x600/?bookstore" alt="Toko Buku"
                        style="width: 100%; border-radius: 10px;">
                </div>
                <div class="col-md-6">
                    <h3 style="font-size: 2rem;">Cerita Kami</h3>
                    <p>Kel1_Bookstore hadir untuk memenuhi hasrat pecinta buku. Kami percaya bahwa setiap buku adalah pintu
                        gerbang menuju dunia baru pengetahuan dan imajinasi.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Catalog Section -->
    <section id="catalog" class="section bg-light" style="padding: 60px 0;">
        <div class="container">
            <h2 class="section-title" style="font-size: 2.5rem; text-align: center; margin-bottom: 40px;">Katalog Buku</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card" style="box-shadow: 0 4px 8px rgba(0,0,0,0.1); transition: transform 0.3s;">
                        <img src="https://source.unsplash.com/400x600/?book,fiction" class="card-img-top" alt="Buku Fiksi">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 1.5rem;">Fiksi Terbaru</h5>
                            <p class="card-text">Koleksi novel terkini yang menarik.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card" style="box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                        <img src="https://source.unsplash.com/400x600/?book,science" class="card-img-top" alt="Buku Sains">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 1.5rem;">Sains & Pengetahuan</h5>
                            <p class="card-text">Buku-buku ilmiah terpilih.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="section" style="padding: 60px 0; background-color: #f8f9fa;">
        <div class="container">
            <h2 class="section-title" style="font-size: 2.5rem; text-align: center; margin-bottom: 40px;">Testimoni Pembaca
            </h2>
            <div class="carousel" style="text-align: center;">
                <div style="padding: 20px;">
                    <blockquote style="font-size: 1.2rem; font-style: italic; color: #555;">
                        "Koleksi buku di Kel1_Bookstore luar biasa! Selalu menemukan buku yang saya cari."
                    </blockquote>
                    <footer style="font-size: 1rem; color: #888;">— Sarah, Pembaca Setia</footer>
                </div>
                <div style="padding: 20px;">
                    <blockquote style="font-size: 1.2rem; font-style: italic; color: #555;">
                        "Pelayanan yang ramah dan suasana toko yang nyaman."
                    </blockquote>
                    <footer style="font-size: 1rem; color: #888;">— Budi, Penggemar Buku</footer>
                </div>
            </div>
        </div>
    </section>

    <!-- News & Blog Section -->
    <section id="blog" class="section bg-light" style="padding: 60px 0;">
        <div class="container">
            <h2 class="section-title" style="font-size: 2.5rem; text-align: center; margin-bottom: 40px;">Berita & Blog</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card" style="box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                        <img src="https://source.unsplash.com/400x250/?reading,book" class="card-img-top" alt="Blog Post">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 1.5rem;">Tips Membaca Efektif</h5>
                            <p style="color: #555;">Panduan praktis untuk meningkatkan kebiasaan membaca.</p>
                            <a href="#"
                                style="color: white; background-color: #007bff; padding: 10px 15px; border-radius: 5px;">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card" style="box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                        <img src="https://source.unsplash.com/400x250/?bookshelf,library" class="card-img-top"
                            alt="Blog Post">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 1.5rem;">Rekomendasi Buku Bulan Ini</h5>
                            <p style="color: #555;">Temukan buku-buku terbaik pilihan kami.</p>
                            <a href="#"
                                style="color: white; background-color: #007bff; padding: 10px 15px; border-radius: 5px;">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card" style="box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                        <img src="https://source.unsplash.com/400x250/?author,book" class="card-img-top" alt="Blog Post">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 1.5rem;">Wawancara Penulis</h5>
                            <p style="color: #555;">Temui penulis lokal berbakat.</p>
                            <a href="#"
                                style="color: white; background-color: #007bff; padding: 10px 15px; border-radius: 5px;">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section" style="padding: 60px 0;">
        <div class="container">
            <h2 class="section-title" style="font-size: 2.5rem; text-align: center; margin-bottom: 40px;">Hubungi Kami
            </h2>
            <div class="row">
                <div class="col-md-6">
                    <form>
                        <div style="margin-bottom: 15px;">
                            <label for="name" style="display: block; font-weight: bold;">Nama</label>
                            <input type="text" id="name" style="width: 100%; padding: 10px;">
                        </div>
                        <div style="margin-bottom: 15px;">
                            <label for="email" style="display: block; font-weight: bold;">Email</label>
                            <input type="email" id="email" style="width: 100%; padding: 10px;">
                        </div>
                        <div style="margin-bottom: 15px;">
                            <label for="message" style="display: block; font-weight: bold;">Pesan</label>
                            <textarea id="message" rows="4" style="width: 100%; padding: 10px;"></textarea>
                        </div>
                        <button type="submit"
                            style="background-color: #007bff; color: white; padding: 10px 20px; border: none;">Kirim
                            Pesan</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h4 style="font-size: 1.8rem;">Informasi Kontak</h4>
                    <p>
                        <strong>Alamat:</strong> Jl. Buku Raya No. 42, Jakarta<br>
                        <strong>Telepon:</strong> (021) 1234-5678<br>
                        <strong>Email:</strong> info@kel1bookstore.com
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer" style="text-align: center; padding: 20px 0; background-color: #333; color: white;">
        <div>
            <p>&copy; 2024 Kel1_Bookstore. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

@endsection
