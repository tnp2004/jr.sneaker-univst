CREATE TABLE sneaker (
    sneakerID INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(255) NOT NULL,
    brand VARCHAR(255) NOT NULL,
    description VARCHAR(500) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    amount INT NOT NULL,
    image_url VARCHAR(500) NOT NULL,
    PRIMARY KEY(sneakerID)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

INSERT INTO sneaker (name, brand, description, price, amount, image_url) VALUES 
('Air Jordan 1', 'Nike', 'สนีกเกอร์จอร์แดนสุดคลาสสิก สีแดงและขาว.', 3200.00, 15, 'https://www.jdsports.co.th/cdn/shop/files/jd_DQ8426-061_b.jpg?v=1726152594&width=1007'),
('Yeezy Boost 350 V2', 'Adidas', 'สนีกเกอร์ Yeezy ที่สวมใส่สบายและมีสไตล์.', 5400.00, 10, 'https://www.jdsports.co.th/cdn/shop/files/jd_HP7870-W_a.jpg?v=1726205946&width=1007'),
('Dunk Low Retro', 'Nike', 'สนีกเกอร์ Dunk ทรงเตี้ย สไตล์ย้อนยุค.', 3000.00, 5, 'https://www.jdsports.co.th/cdn/shop/files/jd_DD1391-100_b.jpg?v=1726150271&width=1007'),
('New Balance 550', 'New Balance', 'สนีกเกอร์สไตล์บาสเกตบอลวินเทจ.', 2600.00, 12, 'https://www.jdsports.co.th/cdn/shop/files/jd_BB550CPD_b.jpg?v=1727254945&width=1007'),
('Converse Chuck 70', 'Converse', 'รองเท้า Chuck Taylor สุดคลาสสิกตลอดกาล.', 2100.00, 8, 'https://www.jdsports.co.th/cdn/shop/files/jd_162050C_b.jpg?v=1728952378&width=1007'),
('Air Max 97', 'Nike', 'ดีไซน์ลอนคลื่นที่เป็นเอกลักษณ์ พร้อมระบบรองรับอากาศเต็มความยาว.', 3500.00, 18, 'https://www.jdsports.co.th/cdn/shop/files/jd_921826-023_b.jpg?v=1726145565&width=1007'),
('UltraBoost 22', 'Adidas', 'รองเท้าวิ่งสมรรถนะสูง พร้อมเทคโนโลยี Boost.', 5000.00, 9, 'https://www.jdsports.co.th/cdn/shop/files/jd_GX5592_b.jpg?v=1733936650&width=1007'),
('Samba OG', 'Adidas', 'ดีไซน์ล้ำยุคพร้อมสีสันสดใสและพื้นหนา.', 2600.00, 14, 'https://www.jdsports.co.th/cdn/shop/files/jd_B75806_b.jpg?v=1726147495&width=1007'),
('Reebok Club C 85', 'Reebok', 'สนีกเกอร์สไตล์เทนนิสสุดคลาสสิก ดีไซน์สะอาดตา.', 2200.00, 6, 'https://i8.amplience.net/i/jpl/jd_ANZ0125021_b?qlt=92&w=750&h=531&v=1&fmt=auto'),
('Vans Old Skool', 'Vans', 'รองเท้าสเก็ตบอร์ดสุดคลาสสิก พร้อมแถบข้างอันเป็นเอกลักษณ์.', 1400.00, 11, 'https://www.jdsports.co.th/cdn/shop/files/jd_VN000D3HY28_b.jpg?v=1728562002&width=1007');
