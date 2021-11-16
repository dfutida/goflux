DROP DATABASE IF EXISTS `goflux`;
CREATE SCHEMA IF NOT EXISTS `goflux` DEFAULT CHARACTER SET utf8;

USE goflux;

CREATE TABLE IF NOT EXISTS embarcador (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NULL,
doc VARCHAR(30) NULL,
about VARCHAR(255) NULL,
active tinyint NULL,
site varchar(100)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS oferta (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_customer INT(6),
`from` VARCHAR(255) NULL,
`to` VARCHAR(255) NULL,
initial_value DECIMAL(10, 2) DEFAULT 0.00,
amount DECIMAL(10, 2) DEFAULT 0.00,
amount_type VARCHAR(255) NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS lance (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_provider INT(6),
id_offer INT(6),
value DECIMAL(10, 2) DEFAULT 0.00,
amountv DECIMAL(10, 2) DEFAULT 0.00
) ENGINE=InnoDB;

INSERT INTO embarcador (name, doc, about, active, site) VALUES ('goFlux Brasil', '13.922.002/0001-80', 'goFlux, uma empresa especializada em inovar na contratação de fretes', true, 'https://goflux.com.br/');
INSERT INTO embarcador (name, doc, about, active, site) VALUES ('Google Brasil', '05.270.765/0001-65', 'Google, uma empresa inovadora na área de Tecnologia', true, 'https://www.google.com/');
INSERT INTO embarcador (name, doc, about, active, site) VALUES ('Fênix', '93.593.604/0001-70', 'Fênix Editorial, editoras e publicações de ePub, livros digitais.', true, 'https://bennueditora.com.br/');
INSERT INTO embarcador (name, doc, about, active, site) VALUES ('Bennu', '31.231.655/0001-02', 'Bennu Editora, livros e publicações de materiais digitais e impressos.', true, 'https://bennueditora.com.br/');
INSERT INTO embarcador (name, doc, about, active, site) VALUES ('Globo', '65.405.107/0001-65', 'Globo, Rede de televisão.', false, 'https://g1.globo.com/');
INSERT INTO embarcador (name, doc, about, active, site) VALUES ('Record', '00.547.018/0001-08', 'Record, Rede de televisão.', true, 'https://recordtv.r7.com/');
INSERT INTO embarcador (name, doc, about, active, site) VALUES ('RedeTV', '68.834.048/0001-39', 'RedeTV, Rede de televisão.', true, 'https://www.redetv.uol.com.br/');
INSERT INTO embarcador (name, doc, about, active, site) VALUES ('BMW', '95.819.856/0001-08', 'BMW, é uma empresa alemã, fabricante de automóveis e motocicletas', true, 'https://www.bmw.com.br/');
INSERT INTO embarcador (name, doc, about, active, site) VALUES ('Volkswagen', '75.611.214/0001-01', 'Volkswagen, fabricante de automóveis.', true, 'https://www.vw.com.br/');
INSERT INTO embarcador (name, doc, about, active, site) VALUES ('Honda', '67.747.488/0001-96', 'Honda, empresa japonesa fabricante de automóveis e motocicletas.', true, 'https://www.honda.com.br/');
INSERT INTO embarcador (name, doc, about, active, site) VALUES ('Kawasaki', '68.641.329/0001-75', 'Kawasaki, empresa japonesa fabricante de equipamentos de transporte.', true, 'https://www.kawasakibrasil.com/');
INSERT INTO embarcador (name, doc, about, active, site) VALUES ('Yamaha', '25.777.241/0001-72', 'Yamaha, empresa japonesa fabricante de motocicletas e instrumentos musicais.', true, 'https://www.yamaha-motor.com.br/');
INSERT INTO embarcador (name, doc, about, active, site) VALUES ('Ducati', '35.737.583/0001-12', 'Ducati Motor Holding é uma fábrica italiana de motocicletas', false, 'https://www.ducati.com/');
INSERT INTO embarcador (name, doc, about, active, site) VALUES ('Harley-Davidson', '10.352.124/0001-90', 'Harley-Davidson, dedica-se à fabricação de motos de grande porte e cilindrada.', true, 'https://www.harley-davidson.com/');
INSERT INTO embarcador (name, doc, about, active, site) VALUES ('Tagima', '27.470.541/0001-30', 'Tagima é uma empresa brasileira produtora de guitarras e outros instrumentos musicais.', false, 'https://tagima.com.br/');
INSERT INTO embarcador (name, doc, about, active, site) VALUES ('Gibson', '60.204.735/0001-69', 'A Gibson Brands, Inc. foi uma das maiores empresas fabricante de guitarras do mundo', true, 'https://www.gibson.com/');
INSERT INTO embarcador (name, doc, about, active, site) VALUES ('Dell', '36.199.357/0001-98', 'Dell, é uma empresa de hardware de computador dos Estados Unidos', false, 'https://www.dell.com/');
INSERT INTO embarcador (name, doc, about, active, site) VALUES ('Asus', '39.675.560/0001-81', 'A ASUS é a terceira maior fabricante de notebooks para o consumidor final e fabricante das mais vendidas e mais premiadas placas-mães do mundo', true, 'https://www.asus.com/');

INSERT INTO oferta (id_customer, `from`, `to`, initial_value, amount, amount_type) VALUES (230, 'Porto Alegre - RS', 'São Paulo - SP', 130.00, 300.00, 'TON');
INSERT INTO oferta (id_customer, `from`, `to`, initial_value, amount, amount_type) VALUES (231, 'Rio Branco - AC', 'São Paulo - SP', 230.00, 470.00, 'TIM');
INSERT INTO oferta (id_customer, `from`, `to`, initial_value, amount, amount_type) VALUES (232, 'Maceió - AL', 'Porto Alegre - RS', 450.00, 760.00, 'GEO');
INSERT INTO oferta (id_customer, `from`, `to`, initial_value, amount, amount_type) VALUES (233, 'Macapá - AM', 'Rio Branco - AC', 150.00, 550.00, 'ITA');
INSERT INTO oferta (id_customer, `from`, `to`, initial_value, amount, amount_type) VALUES (234, 'Salvador - BA', 'Fortaleza - CE', 390.00, 650.00, 'OTO');
INSERT INTO oferta (id_customer, `from`, `to`, initial_value, amount, amount_type) VALUES (235, 'São Luís - MA', 'Campo Grande - MS', 280.00, 320.00, 'OLA');

INSERT INTO lance (id_provider, id_offer, value, amountv) VALUES (120, 15, 105.00, 230.00);
INSERT INTO lance (id_provider, id_offer, value, amountv) VALUES (121, 16, 210.00, 330.00);
INSERT INTO lance (id_provider, id_offer, value, amountv) VALUES (122, 17, 150.00, 430.00);
INSERT INTO lance (id_provider, id_offer, value, amountv) VALUES (123, 18, 320.00, 510.00);
INSERT INTO lance (id_provider, id_offer, value, amountv) VALUES (124, 19, 390.00, 480.00);
INSERT INTO lance (id_provider, id_offer, value, amountv) VALUES (125, 20, 140.00, 290.00);