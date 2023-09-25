CREATE DATABASE tienda;
USE tienda;
/*COSA IMPORTANTE
las claves unicas deben tener un limite de caracteres menor a mil; esto debe ser para impedir comparaciones excesivas*/
CREATE TABLE usuarios(
    id INT AUTO_INCREMENT,
    rol VARCHAR(255) DEFAULT 'cliente',
    telefono VARCHAR(255),
    img_url VARCHAR(255),
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    fecha DATE NOT NULL,
    CONSTRAINT pk_usuarios PRIMARY KEY (id),
    CONSTRAINT uq_usuarios UNIQUE (email),
)
CREATE TABLE categorias(
    id INT AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    CONSTRAINT pk_categorias PRIMARY KEY (id),
    CONSTRAINT uq_categorias UNIQUE (nombre)
)
CREATE TABLE productos(
    id INT AUTO_INCREMENT NOT NULL,
    img_url VARCHAR(255),
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    precio INT NOT NULL,
    descuento INT,
    categorias VARCHAR(255),
    stock INT,
    CONSTRAINT pk_productos PRIMARY KEY (id),
    CONSTRAINT uq_productos UNIQUE (nombre),
    CONSTRAINT fk_productos_categorias FOREIGN KEY (categorias) REFERENCES categorias(id)
)
CREATE TABLE pedidos(
    id INT AUTO_INCREMENT,
    usuario_id INT,
    fecha DATE,
    monto INT,
    envio INT,
    ubicacion VARCHAR(255),
    productos_id VARCHAR(255),
    estado VARCHAR(255) DEFAULT 'Realizado',
    CONSTRAINT pk_pedidos PRIMARY KEY (id),
    CONSTRAINT fk_pedidos_usuarios FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
)
