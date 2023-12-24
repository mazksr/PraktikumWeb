-- Ini cuma buat tes kemarin, dah gk kepake sih, tpi krn disuruh kumpul database jdi ku kumpul juga hehe....

CREATE DATABASE IF NOT EXISTS harpard;

USE harpard;

CREATE TABLE IF NOT EXISTS mahasiswa(
   			nim VARCHAR(255) NOT NULL PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            fakultas VARCHAR(255) NOT NULL,
            jurusan VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL);
            
INSERT INTO mahasiswa VALUES('H071221030', 'Joy Abrian Rantepasang', 'MIPA', 'Sistem Informasi', 'ordinarystupidguy'),
									 ('H071221089', 'Andi Muhammad Haikal Lukman', 'MIPA', 'Sistem Informasi', 'pengagumRahasia'),
									 ('D071221001', 'Arlon Julio Malaka', 'Teknik', 'Teknik Industri', 'orangrandompokoknyaini'),
									 ('F031201001', 'Sultan Abdul Jalil', 'Ilmu Budaya', 'Sastra Arab', 'sumpahinijugarandom'),
									 ('B011221001', 'Muhammad Asqolani Prianata', 'Hukum', 'Ilmu Hukum', 'inilagiorangrandom'),
									 ('A011221030', 'Muh. Akbar', 'Ekonomi Bisnis', 'Ekonomi Pembangunan', 'sayadakkenall');

SELECT * FROM mahasiswa WHERE nim != 'admin';