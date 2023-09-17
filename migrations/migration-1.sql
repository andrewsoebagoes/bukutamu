CREATE TABLE keperluan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    keperluan VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE tamu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_tamu VARCHAR(100) NOT NULL,
    provinsi_id INT NOT NULL,
    provinsi VARCHAR(100) NOT NULL,
    kabupaten_id INT NOT NULL,
    kabupaten VARCHAR(100) NOT NULL,
    kecamatan_id INT NOT NULL,
    kecamatan VARCHAR(100) NOT NULL,
    desa_id INT NOT NULL,
    desa VARCHAR(100) NOT NULL,
    latitude VARCHAR (50) NOT NULL,
    longitute VARCHAR (50) NOT NULL,
    data_ananda TEXT NOT NULL,
    asalsekolah VARCHAR(100) NOT NULL,
    no_wa VARCHAR(15) NOT NULL,
    keperluan_id INT NOT NULL,
    is_folow_up INT NULL,
    status VARCHAR(50) NULL,
    CONSTRAINT fk_tamu_keperluan_id FOREIGN KEY (keperluan_id) REFERENCES keperluan(id) ON DELETE CASCADE

);