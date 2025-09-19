<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Drop existing tables if they exist
        DB::statement('DROP TABLE IF EXISTS transaksi_items');
        DB::statement('DROP TABLE IF EXISTS transaksis');
        DB::statement('DROP TABLE IF EXISTS produksi_bahans');
        DB::statement('DROP TABLE IF EXISTS produksis');
        DB::statement('DROP TABLE IF EXISTS pesanan_items');
        DB::statement('DROP TABLE IF EXISTS pesanans');
        DB::statement('DROP TABLE IF EXISTS bahan_bakus');
        DB::statement('DROP TABLE IF EXISTS produks');
        DB::statement('DROP TABLE IF EXISTS stok_bahan_bakus');
        DB::statement('DROP TABLE IF EXISTS pengaturans');

        // Create master_bahan_baku table
        DB::statement("
            CREATE TABLE master_bahan_baku (
                id INT AUTO_INCREMENT PRIMARY KEY,
                kode_bahan VARCHAR(50) NOT NULL UNIQUE,
                nama_bahan VARCHAR(255) NOT NULL,
                satuan VARCHAR(50) NOT NULL,
                harga_per_satuan DECIMAL(15,2) NOT NULL DEFAULT 0,
                deskripsi TEXT,
                status ENUM('aktif', 'nonaktif') DEFAULT 'aktif',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )
        ");

        // Create bahan_baku table (operational)
        DB::statement("
            CREATE TABLE bahan_baku (
                id INT AUTO_INCREMENT PRIMARY KEY,
                master_bahan_id INT NOT NULL,
                kode_bahan VARCHAR(50) NOT NULL,
                nama_bahan VARCHAR(255) NOT NULL,
                satuan VARCHAR(50) NOT NULL,
                harga_per_satuan DECIMAL(15,2) NOT NULL DEFAULT 0,
                stok DECIMAL(15,2) NOT NULL DEFAULT 0,
                tanggal_masuk DATE NOT NULL,
                tanggal_kadaluarsa DATE,
                status ENUM('aktif', 'nonaktif') DEFAULT 'aktif',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (master_bahan_id) REFERENCES master_bahan_baku(id) ON DELETE CASCADE
            )
        ");

        // Create produks table
        DB::statement("
            CREATE TABLE produks (
                id INT AUTO_INCREMENT PRIMARY KEY,
                kode_produk VARCHAR(50) NOT NULL UNIQUE,
                nama_produk VARCHAR(255) NOT NULL,
                satuan VARCHAR(50) NOT NULL,
                harga_jual DECIMAL(15,2) NOT NULL DEFAULT 0,
                deskripsi TEXT,
                status ENUM('aktif', 'nonaktif') DEFAULT 'aktif',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )
        ");

        // Create pesanans table
        DB::statement("
            CREATE TABLE pesanans (
                id INT AUTO_INCREMENT PRIMARY KEY,
                kode_pesanan VARCHAR(50) NOT NULL UNIQUE,
                tanggal_pesanan DATE NOT NULL,
                nama_pelanggan VARCHAR(255) NOT NULL,
                alamat TEXT,
                no_telepon VARCHAR(20),
                status ENUM('pending', 'diproses', 'selesai', 'dibatalkan') DEFAULT 'pending',
                total_harga DECIMAL(15,2) NOT NULL DEFAULT 0,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )
        ");

        // Create pesanan_items table
        DB::statement("
            CREATE TABLE pesanan_items (
                id INT AUTO_INCREMENT PRIMARY KEY,
                pesanan_id INT NOT NULL,
                produk_id INT NOT NULL,
                jumlah DECIMAL(15,2) NOT NULL,
                harga_satuan DECIMAL(15,2) NOT NULL,
                subtotal DECIMAL(15,2) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (pesanan_id) REFERENCES pesanans(id) ON DELETE CASCADE,
                FOREIGN KEY (produk_id) REFERENCES produks(id) ON DELETE CASCADE
            )
        ");

        // Create produksis table
        DB::statement("
            CREATE TABLE produksis (
                id INT AUTO_INCREMENT PRIMARY KEY,
                kode_produksi VARCHAR(50) NOT NULL UNIQUE,
                tanggal_produksi DATE NOT NULL,
                produk_id INT NOT NULL,
                jumlah_produksi DECIMAL(15,2) NOT NULL,
                status ENUM('pending', 'diproses', 'selesai', 'dibatalkan') DEFAULT 'pending',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (produk_id) REFERENCES produks(id) ON DELETE CASCADE
            )
        ");

        // Create produksi_bahans table
        DB::statement("
            CREATE TABLE produksi_bahans (
                id INT AUTO_INCREMENT PRIMARY KEY,
                produksi_id INT NOT NULL,
                bahan_baku_id INT NOT NULL,
                jumlah_digunakan DECIMAL(15,2) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (produksi_id) REFERENCES produksis(id) ON DELETE CASCADE,
                FOREIGN KEY (bahan_baku_id) REFERENCES bahan_baku(id) ON DELETE CASCADE
            )
        ");

        // Create transaksis table
        DB::statement("
            CREATE TABLE transaksis (
                id INT AUTO_INCREMENT PRIMARY KEY,
                kode_transaksi VARCHAR(50) NOT NULL UNIQUE,
                tanggal_transaksi DATE NOT NULL,
                jenis_transaksi ENUM('penjualan', 'pembelian') NOT NULL,
                total DECIMAL(15,2) NOT NULL DEFAULT 0,
                keterangan TEXT,
                status ENUM('pending', 'selesai', 'dibatalkan') DEFAULT 'pending',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )
        ");

        // Create transaksi_items table
        DB::statement("
            CREATE TABLE transaksi_items (
                id INT AUTO_INCREMENT PRIMARY KEY,
                transaksi_id INT NOT NULL,
                produk_id INT,
                bahan_baku_id INT,
                jumlah DECIMAL(15,2) NOT NULL,
                harga_satuan DECIMAL(15,2) NOT NULL,
                subtotal DECIMAL(15,2) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (transaksi_id) REFERENCES transaksis(id) ON DELETE CASCADE,
                FOREIGN KEY (produk_id) REFERENCES produks(id) ON DELETE SET NULL,
                FOREIGN KEY (bahan_baku_id) REFERENCES bahan_baku(id) ON DELETE SET NULL
            )
        ");

        // Create stok_bahan_baku table (for FIFO tracking)
        DB::statement("
            CREATE TABLE stok_bahan_baku (
                id INT AUTO_INCREMENT PRIMARY KEY,
                bahan_baku_id INT NOT NULL,
                jumlah_masuk DECIMAL(15,2) NOT NULL DEFAULT 0,
                jumlah_keluar DECIMAL(15,2) NOT NULL DEFAULT 0,
                sisa_stok DECIMAL(15,2) NOT NULL DEFAULT 0,
                tanggal DATE NOT NULL,
                keterangan VARCHAR(255),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (bahan_baku_id) REFERENCES bahan_baku(id) ON DELETE CASCADE
            )
        ");

        // Create pengaturans table
        DB::statement("
            CREATE TABLE pengaturans (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nama_pengaturan VARCHAR(255) NOT NULL UNIQUE,
                nilai TEXT,
                tipe VARCHAR(50) DEFAULT 'string',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )
        ");

        // Create indexes for better performance
        DB::statement('CREATE INDEX idx_master_bahan_kode ON master_bahan_baku(kode_bahan)');
        DB::statement('CREATE INDEX idx_bahan_master_id ON bahan_baku(master_bahan_id)');
        DB::statement('CREATE INDEX idx_bahan_kode ON bahan_baku(kode_bahan)');
        DB::statement('CREATE INDEX idx_produk_kode ON produks(kode_produk)');
        DB::statement('CREATE INDEX idx_pesanan_kode ON pesanans(kode_pesanan)');
        DB::statement('CREATE INDEX idx_pesanan_status ON pesanans(status)');
        DB::statement('CREATE INDEX idx_produksi_kode ON produksis(kode_produksi)');
        DB::statement('CREATE INDEX idx_produksi_status ON produksis(status)');
        DB::statement('CREATE INDEX idx_transaksi_kode ON transaksis(kode_transaksi)');
        DB::statement('CREATE INDEX idx_transaksi_jenis ON transaksis(jenis_transaksi)');
        DB::statement('CREATE INDEX idx_stok_bahan_id ON stok_bahan_baku(bahan_baku_id)');
        DB::statement('CREATE INDEX idx_pengaturan_nama ON pengaturans(nama_pengaturan)');

        // Insert sample data for master_bahan_baku
        DB::statement("
            INSERT INTO master_bahan_baku (kode_bahan, nama_bahan, satuan, harga_per_satuan, deskripsi, status) VALUES
            ('MBB001', 'Tempurung Kelapa Kering', 'kg', 5000.00, 'Tempurung kelapa yang sudah dikeringkan untuk bahan baku arang', 'aktif'),
            ('MBB002', 'Kayu Bakar', 'kg', 8000.00, 'Kayu bakar untuk proses pembakaran', 'aktif'),
            ('MBB003', 'Bahan Pengikat', 'kg', 12000.00, 'Bahan pengikat untuk proses produksi', 'aktif')
        ");

        // Insert sample data for produks
        DB::statement("
            INSERT INTO produks (kode_produk, nama_produk, satuan, harga_jual, deskripsi, status) VALUES
            ('PRD001', 'Arang Tempurung Premium', 'kg', 25000.00, 'Arang tempurung kelapa berkualitas premium', 'aktif'),
            ('PRD002', 'Arang Tempurung Ekonomis', 'kg', 18000.00, 'Arang tempurung kelapa untuk kebutuhan sehari-hari', 'aktif'),
            ('PRD003', 'Briket Arang', 'kg', 20000.00, 'Briket arang dari tempurung kelapa', 'aktif')
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop all created tables in reverse order
        DB::statement('DROP TABLE IF EXISTS pengaturans');
        DB::statement('DROP TABLE IF EXISTS stok_bahan_baku');
        DB::statement('DROP TABLE IF EXISTS transaksi_items');
        DB::statement('DROP TABLE IF EXISTS transaksis');
        DB::statement('DROP TABLE IF EXISTS produksi_bahans');
        DB::statement('DROP TABLE IF EXISTS produksis');
        DB::statement('DROP TABLE IF EXISTS pesanan_items');
        DB::statement('DROP TABLE IF EXISTS pesanans');
        DB::statement('DROP TABLE IF EXISTS bahan_baku');
        DB::statement('DROP TABLE IF EXISTS master_bahan_baku');
        DB::statement('DROP TABLE IF EXISTS produks');
    }
};
