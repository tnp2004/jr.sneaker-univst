CREATE TABLE sneakers (
    id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(255) NOT NULL,
    brand VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    in_stock INT NOT NULL,
    image_name VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

INSERT INTO sneakers (name, brand, description, price, in_stock, image_name) VALUES 
('Air Jordan 1', 'Nike', 'สนีกเกอร์จอร์แดนสุดคลาสสิก สีแดงและขาว.', 3200.00, 15, 'air_jordan_1.webp'),
('Yeezy Boost 350 V2', 'Adidas', 'สนีกเกอร์ Yeezy ที่สวมใส่สบายและมีสไตล์.', 5400.00, 10, 'yeezy_boost_350_v2.webp'),
('Dunk Low Retro', 'Nike', 'สนีกเกอร์ Dunk ทรงเตี้ย สไตล์ย้อนยุค.', 3000.00, 5, 'dunk_low_retro.webp'),
('New Balance 550', 'New Balance', 'สนีกเกอร์สไตล์บาสเกตบอลวินเทจ.', 2600.00, 12, 'new_balance_550.webp'),
('Converse Chuck 70', 'Converse', 'รองเท้า Chuck Taylor สุดคลาสสิกตลอดกาล.', 2100.00, 8, 'converse_chuck_70.webp'),
('Air Max 97', 'Nike', 'ดีไซน์ลอนคลื่นที่เป็นเอกลักษณ์ พร้อมระบบรองรับอากาศเต็มความยาว.', 3500.00, 18, 'air_max_97.webp'),
('UltraBoost 22', 'Adidas', 'รองเท้าวิ่งสมรรถนะสูง พร้อมเทคโนโลยี Boost.', 5000.00, 9, 'ultraboost_22.webp'),
('Samba OG', 'Adidas', 'ดีไซน์ล้ำยุคพร้อมสีสันสดใสและพื้นหนา.', 2600.00, 14, 'samba_og.webp'),
('Reebok Club C 85', 'Reebok', 'สนีกเกอร์สไตล์เทนนิสสุดคลาสสิก ดีไซน์สะอาดตา.', 2200.00, 6, 'reebok_club_c_85.webp'),
('Vans Old Skool', 'Vans', 'รองเท้าสเก็ตบอร์ดสุดคลาสสิก พร้อมแถบข้างอันเป็นเอกลักษณ์.', 1400.00, 11, 'vans_old_skool.webp');

CREATE TABLE users (
    id INT AUTO_INCREMENT NOT NULL,
    username VARCHAR(36) NOT NULL,
    password VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO users (username, password) VALUES 
('admin', 'admin123'),
('user', 'user123');