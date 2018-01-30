USE autostime;

CREATE TABLE contacto_por_email(
	id_contacto_por_email INT NOT NULL AUTO_INCREMENT,
	titulo                VARCHAR(25) NOT NULL,
	descripcion           VARCHAR(500) NOT NULL,
	nombre                VARCHAR(50) NULL,
	email                 VARCHAR(50) NULL,
	fecha_envio           DATE NOT NULL,
    PRIMARY KEY (id_contacto_por_email)
);

CREATE TABLE estatus(
	id_estatus       INT NOT NULL AUTO_INCREMENT,
	descripcion      VARCHAR(20) NULL,
    PRIMARY KEY (id_estatus)
);

INSERT INTO estatus VALUES(1,'Activo'),(2,'Inactivo');

CREATE TABLE tipo_usuario(
	id_tipo_usuario       INT NOT NULL AUTO_INCREMENT,
	descripcion           VARCHAR(20) NULL,
    PRIMARY KEY (id_tipo_usuario)
);

INSERT INTO tipo_usuario VALUES(1,'Administrador'),(2,'Usuario Sistema');

CREATE TABLE sexo(
	id_sexo			INT NOT NULL AUTO_INCREMENT,
    descripcion		VARCHAR(30) NULL,
    PRIMARY KEY (id_sexo)
);

INSERT INTO sexo VALUES(1,'Macho Alfa Lomo Plateado'),(2,'Dama');

CREATE TABLE usuario(  
	id_usuario            INT NOT NULL AUTO_INCREMENT,
    id_tipo_usuario       INTEGER NOT NULL,
	id_estatus            INTEGER NOT NULL,
	nombre                VARCHAR(60) NOT NULL,
    id_sexo				  INTEGER NOT NULL,
	email                 VARCHAR(50) NOT NULL,
	PASSWORD              VARCHAR(40) NOT NULL,
	ubicacion_foto        VARCHAR(500) NULL,
	apodo                 VARCHAR(30) NULL,
	fecha_alta            DATE NOT NULL,
	fecha_baja            DATE NULL,
    PRIMARY KEY (id_usuario),
    INDEX (id_usuario),
    INDEX (nombre),
    INDEX (apodo),
    FOREIGN KEY (id_estatus) REFERENCES estatus(id_estatus),
    FOREIGN KEY (id_tipo_usuario) REFERENCES tipo_usuario(id_tipo_usuario),
    FOREIGN KEY (id_sexo) REFERENCES sexo(id_sexo)
);

INSERT INTO usuario VALUES(1,1,1,'Luis Marin',1,'luismarin.glez@gmail.com',SHA1('lu15k1k3'),'images/fUsuarios/usuario1.jpg','RuSSo',CURDATE(),NULL);

/*select * from usuario where password = sha1('lu15k1k3')*/

/*GALERIA DE FOTOS*/
CREATE TABLE galeria_fotos(  
	id_galeria_fotos      INT NOT NULL AUTO_INCREMENT,
	titulo		      VARCHAR(20) NULL,
	descripcion           VARCHAR(50) NULL,
	ubicacion_foto        VARCHAR(500) NOT NULL,
    fecha_alta		  	  DATE,
	PRIMARY KEY (id_galeria_fotos)
);

CREATE TABLE usuario_galeria_fotos(
	id_usuario_galeria_fotos	INT NOT NULL AUTO_INCREMENT,
    id_usuario					INTEGER NOT NULL,
    id_galeria_fotos			INTEGER NOT NULL,
    PRIMARY KEY (id_usuario_galeria_fotos),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_galeria_fotos) REFERENCES galeria_fotos(id_galeria_fotos)
);

CREATE TABLE usuario_votos_galeria_fotos(
	id_usuario_votos_galeria_fotos	INT NOT NULL AUTO_INCREMENT,
    id_usuario			INTEGER NOT NULL,
    id_galeria_fotos	INTEGER NOT NULL,
    PRIMARY KEY (id_usuario_votos_galeria_fotos),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_galeria_fotos) REFERENCES galeria_fotos(id_galeria_fotos)
);

/*GALERIA DE HUMOR*/
CREATE TABLE galeria_humor(  
	id_humor	      INT NOT NULL AUTO_INCREMENT,
	titulo		      VARCHAR(50) NULL,
	descripcion           TEXT NULL,
	ubicacion_foto        VARCHAR(500) NOT NULL,
	fecha_alta		DATE,
	PRIMARY KEY (id_humor)
);

/*GALERIA DE SELFIES*/
CREATE TABLE galeria_selfie(  
	id_selfie	      INT NOT NULL AUTO_INCREMENT,
	titulo		      VARCHAR(10) NULL,
	descripcion           VARCHAR(30) NULL,
	ubicacion_foto        VARCHAR(500) NOT NULL,
	fecha_alta		DATE,
	PRIMARY KEY (id_selfie)
);

CREATE TABLE usuario_selfie(
	id_usuario_selfie	INT NOT NULL AUTO_INCREMENT,
    id_usuario					INTEGER NOT NULL,
    id_selfie			INTEGER NOT NULL,
    PRIMARY KEY (id_usuario_selfie),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_selfie) REFERENCES galeria_selfie(id_selfie)
);

CREATE TABLE usuario_votos_selfie(
	id_usuario_votos_selfie	INT NOT NULL AUTO_INCREMENT,
    id_usuario				INTEGER NOT NULL,
    id_selfie				INTEGER NOT NULL,
    PRIMARY KEY (id_usuario_votos_selfie),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_selfie) REFERENCES galeria_selfie(id_selfie)
);


/*EVENTOS*/
CREATE TABLE evento(  
	id_evento       INT NOT NULL AUTO_INCREMENT,
	titulo          VARCHAR(25) NULL,
	resumen		VARCHAR(200) NOT NULL,
	descripcion     TEXT NULL,
	fecha		DATE NOT NULL,
	hora		TIME NOT NULL,
	fecha_alta	DATE NOT NULL,
	cont_visitas	INTEGER NOT NULL,
	url_facebook	VARCHAR(100) NULL,
	url_twitter	VARCHAR(100) NULL,
	PRIMARY KEY (id_evento)
);

CREATE TABLE usuario_evento(  
	id_usuario_evento     INT NOT NULL AUTO_INCREMENT,
	id_usuario            INTEGER NULL,
	id_evento             INTEGER NULL,
    PRIMARY KEY (id_usuario_evento),
	FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_evento) REFERENCES evento(id_evento)
);

CREATE TABLE foto_evento(  
	id_foto_evento        INT NOT NULL AUTO_INCREMENT,
	id_evento             INTEGER NULL,
	numero_foto           INTEGER NULL,
	ubicacion_foto        VARCHAR(500) NOT NULL,
    PRIMARY KEY(id_foto_evento),
    INDEX (id_evento),
    FOREIGN KEY (id_evento) REFERENCES evento(id_evento)
);

CREATE TABLE comentario_evento(
	id_comentario_evento  INT NOT NULL AUTO_INCREMENT,
	id_usuario            		INTEGER NULL,
	id_evento		  		INTEGER NOT NULL,
	titulo                		VARCHAR(25) NULL,
	descripcion           		VARCHAR(500) NULL,
	fecha                 		TIMESTAMP NULL,	
	PRIMARY KEY(id_comentario_evento),
    INDEX (id_usuario),
    INDEX (id_evento),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_evento) REFERENCES evento(id_evento)
);

/*HOY NECESITO*/
CREATE TABLE hoy_necesito(  
    id_hoy_necesito       INT NOT NULL AUTO_INCREMENT,
    titulo                VARCHAR(50) NULL,
    resumen				  VARCHAR(200) NOT NULL,
    descripcion           TEXT NULL,
    fecha				  DATE NOT NULL,
    cont_visitas		  INTEGER NOT NULL,
    url_facebook	VARCHAR(100) NULL,
    url_twitter	VARCHAR(100) NULL,
    PRIMARY KEY (id_hoy_necesito),
    INDEX (id_hoy_necesito)
);

CREATE TABLE usuario_hoy_necesito(
	id_usuario_hoy_necesito INT NOT NULL AUTO_INCREMENT,
	id_usuario            	INTEGER NOT NULL,
	id_hoy_necesito       	INTEGER NOT NULL,
    PRIMARY KEY (id_usuario_hoy_necesito),
    INDEX (id_usuario),
    INDEX (id_hoy_necesito),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_hoy_necesito) REFERENCES hoy_necesito(id_hoy_necesito)
);

CREATE TABLE foto_hoy_necesito(  
	id_foto_hoy_necesito  INT NOT NULL AUTO_INCREMENT,
	id_hoy_necesito       INTEGER NULL,
	numero_foto           INTEGER NULL,
	ubicacion_foto        VARCHAR(500) NOT NULL,
     PRIMARY KEY(id_foto_hoy_necesito),
    INDEX (id_hoy_necesito),
    FOREIGN KEY (id_hoy_necesito) REFERENCES hoy_necesito(id_hoy_necesito)
);

CREATE TABLE comentario_hoy_necesito(
	id_comentario_hoy_necesito  INT NOT NULL AUTO_INCREMENT,
	id_usuario            		INTEGER NULL,
	id_hoy_necesito		  		INTEGER NOT NULL,
	titulo                		VARCHAR(25) NULL,
	descripcion           		VARCHAR(500) NULL,
	fecha                 		TIMESTAMP NULL,	
	PRIMARY KEY(id_comentario_hoy_necesito),
    INDEX (id_usuario),
    INDEX (id_hoy_necesito),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_hoy_necesito) REFERENCES hoy_necesito(id_hoy_necesito)
);

/*COMPRA-VENTA*/
CREATE TABLE compra_venta(  
    id_compra_venta     INT NOT NULL AUTO_INCREMENT,
    titulo              VARCHAR(50) NOT NULL,
    resumen		VARCHAR(200) NOT NULL,
    descripcion         TEXT NOT NULL,
    marca 		VARCHAR(50)  NULL,
    modelo		INTEGER  NULL,
    transmision		VARCHAR(50)  NULL,
    tipo_combustible 	VARCHAR(50)  NULL,
    precio		VARCHAR(25)  NULL,
    kilometraje    	VARCHAR(25)  NULL,
    id_estatus		INTEGER NOT NULL,
    fecha		DATE NOT NULL,
    cont_visitas	INTEGER NOT NULL,
    url_facebook	VARCHAR(100) NULL,
    url_twitter		VARCHAR(100) NULL,
    PRIMARY KEY (id_compra_venta),
    FOREIGN KEY (id_estatus) REFERENCES estatus(id_estatus)
);

CREATE TABLE usuario_compra_venta(  
	id_usuario_compra_venta 	INT NOT NULL AUTO_INCREMENT,
	id_usuario            		INTEGER NULL,
	id_compra_venta         	INTEGER NULL,
    PRIMARY KEY (id_usuario_compra_venta),
	FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_compra_venta) REFERENCES compra_venta(id_compra_venta)
);

CREATE TABLE foto_compra_venta(  
	id_foto_compra_venta  INT NOT NULL AUTO_INCREMENT,
	id_compra_venta       INTEGER NULL,
	numero_foto           INTEGER NULL,
	ubicacion_foto        VARCHAR(500) NOT NULL,
    PRIMARY KEY(id_foto_compra_venta),
    INDEX (id_compra_venta),
    FOREIGN KEY (id_compra_venta) REFERENCES compra_venta(id_compra_venta)
);

CREATE TABLE comentario_compra_venta(
	id_comentario_compra_venta  INT NOT NULL AUTO_INCREMENT,
	id_usuario            		INTEGER NULL,
	id_compra_venta		  		INTEGER NOT NULL,
	titulo                		VARCHAR(25) NULL,
	descripcion           		TEXT NOT NULL,
	fecha                 		TIMESTAMP NULL,	
	PRIMARY KEY(id_comentario_compra_venta),
    INDEX (titulo),
    INDEX (id_compra_venta),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_compra_venta) REFERENCES compra_venta(id_compra_venta)
);

/*NOTICIAS*/
CREATE TABLE noticia(
	id_noticia		INT NOT NULL AUTO_INCREMENT,
	titulo          VARCHAR(25) NOT NULL,
	resumen			VARCHAR(200) NOT NULL,
	descripcion     TEXT NOT NULL,
	url_facebook	VARCHAR(100) NULL,
	url_twitter		VARCHAR(100) NULL,
	fecha			DATE NOT NULL,
	cont_visitas	INTEGER NOT NULL,
    PRIMARY KEY(id_noticia),
    INDEX(titulo)
);

CREATE TABLE usuario_noticia(
	id_usuario_noticia INT NOT NULL AUTO_INCREMENT,
	id_usuario         	INTEGER NOT NULL,
	id_noticia       	INTEGER NOT NULL,
    PRIMARY KEY (id_usuario_noticia),
    INDEX (id_usuario),
    INDEX (id_noticia),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_noticia) REFERENCES noticia(id_noticia)
);

CREATE TABLE foto_noticia(
	id_foto_noticia  INT NOT NULL AUTO_INCREMENT,
	id_noticia       INTEGER NULL,
	numero_foto      INTEGER NULL,
	ubicacion_foto   VARCHAR(500) NOT NULL,
	PRIMARY KEY(id_foto_noticia),
    INDEX (id_noticia),
    FOREIGN KEY (id_noticia) REFERENCES noticia(id_noticia)
);

CREATE TABLE comentario_noticia(
	id_comentario_noticia  INT NOT NULL AUTO_INCREMENT,
	id_usuario            		INTEGER NULL,
	id_noticia		  	INTEGER NOT NULL,
	titulo                		VARCHAR(25) NULL,
	descripcion           		VARCHAR(500) NULL,
	fecha                 		TIMESTAMP NULL,	
	PRIMARY KEY(id_comentario_noticia),
    INDEX (id_usuario),
    INDEX (id_noticia),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_noticia) REFERENCES noticia(id_noticia)
);

CREATE TABLE audio(
    id_audio		INT NOT NULL AUTO_INCREMENT,
    id_usuario		INTEGER NOT NULL,
    nombre			VARCHAR(30) NOT NULL,
    artista			VARCHAR(30) NOT NULL,
    ubicacion_audio VARCHAR(500) NOT NULL,
    PRIMARY KEY (id_audio),
	FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);