-- 1. CREATE DATABASE
CREATE DATABASE IF NOT EXISTS sekolahku;
USE sekolahku;

-- 2. CREATE TABLE users
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  gender ENUM('L', 'P'),
  birth_date DATE
);

INSERT INTO users (name, gender, birth_date) VALUES
('Andi', 'L', '2000-01-10'),
('Budi', 'L', '2001-03-15'),
('Citra', 'P', '2000-07-22');

-- 3. CREATE TABLE courses
CREATE TABLE courses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  course_name VARCHAR(100),
  mentor_name VARCHAR(100),
  mentor_degree VARCHAR(50)
);

INSERT INTO courses (course_name, mentor_name, mentor_degree) VALUES
('Matematika', 'Drs. Surya', 'Sarjana'),
('Fisika', 'Dr. Tono', 'Doktor'),
('Kimia', 'S.Pd. Wati', 'Sarjana');

-- 4. CREATE TABLE userCourse
CREATE TABLE userCourse (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  course_id INT,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (course_id) REFERENCES courses(id)
);

INSERT INTO userCourse (user_id, course_id) VALUES
(1, 1),
(1, 2),
(2, 2),
(3, 3);

-- 5. JOIN ALL - daftar peserta dan mata kuliah
SELECT u.name AS NamaSiswa, c.course_name AS MataKuliah, c.mentor_name AS Mentor, c.mentor_degree AS Gelar
FROM userCourse uc
JOIN users u ON uc.user_id = u.id
JOIN courses c ON uc.course_id = c.id;

-- 6. Mentor bergelar sarjana
SELECT u.name, c.course_name, c.mentor_name
FROM userCourse uc
JOIN users u ON uc.user_id = u.id
JOIN courses c ON uc.course_id = c.id
WHERE c.mentor_degree = 'Sarjana';

-- 7. Mentor bukan sarjana
SELECT u.name, c.course_name, c.mentor_name
FROM userCourse uc
JOIN users u ON uc.user_id = u.id
JOIN courses c ON uc.course_id = c.id
WHERE c.mentor_degree != 'Sarjana';

-- 8. Jumlah peserta per mata kuliah
SELECT c.course_name, COUNT(uc.user_id) AS jumlah_peserta
FROM userCourse uc
JOIN courses c ON uc.course_id = c.id
GROUP BY c.course_name;

-- 9. Total fee per mentor (Rp 2.000.000 per peserta)
SELECT c.mentor_name, COUNT(uc.user_id) AS total_peserta,
COUNT(uc.user_id) * 2000000 AS total_fee
FROM userCourse uc
JOIN courses c ON uc.course_id = c.id
GROUP BY c.mentor_name;
