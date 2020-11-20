
CREATE DATABASE music_chord;


use music_chord;


CREATE TABLE usuarios (
id          int(255) auto_increment not null, 
nombre      varchar (255) not null,
apellidos   varchar (255),
email       varchar (255) not null,
password    varchar (255) not null,
imagen      varchar (255) not null,
rol         varchar(20) not null,
fecha       date,
CONSTRAINT pk_usuarios PRIMARY KEY (id)
)Engine=InnoDB;

CREATE TABLE categorias(
id      int(255) auto_increment not null,
nombre  varchar(255) not null,
CONSTRAINT pk_categorias PRIMARY KEY (id)
)Engine=InnoDB;

CREATE TABLE entradas (
id              int (255) auto_increment not null,
usuario_id      int(255) not null,
categoria_id    int(255) not null, 
titulo          varchar(255) not null,
artista         varchar (255) not null,
descripcion     varchar(255) not null,
fecha           date,
CONSTRAINT pk_entradas PRIMARY KEY (id),
CONSTRAINT fk_entrada_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios (id),
CONSTRAINT fk_entrada_categoria FOREIGN KEY (categoria_id) REFERENCES categorias (id) 
)Engine=InnoDB;

CREATE TABLE pedidos (
id          int(255) auto_increment not null,
usuario_id  int(255) not null,
categoria_id int(255) not null,
estado      varchar(20) not null,
fecha       date,
hora        date,
CONSTRAINT pk_pedidos PRIMARY KEY (id),
CONSTRAINT fk_pedido_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
CONSTRAINT fk_pedido_categoria FOREIGN KEY (categoria_id) REFERENCES categorias(id)
)Engine=InnoDB;

CREATE TABLE favoritos (
id          int(255) auto_increment not null,
usuario_id  int(255) not null,
categoria_id int(255) not null,
estado      varchar(20) not null,
fecha       date, 
hora        date,
CONSTRAINT pk_favoritos PRIMARY KEY (id),
CONSTRAINT fk_favorito_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios (id),
CONSTRAINT fk_favorito_categoria FOREIGN KEY (categoria_id) REFERENCES categorias (id)
)Engine=InnoDb; 