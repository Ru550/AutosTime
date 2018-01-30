
/*INSERCION INICIAL*/
INSERT INTO usuario VALUES
(2,2,1,'usuario1',1,'usuario1@gmail.com',SHA1('user1'),'images/fUsuarios/usuario8.jpg','U1',CURDATE(),NULL),
(3,2,1,'usuaria2',2,'usuaria2@gmail.com',SHA1('user2'),'images/fUsuarios/usuaria2.jpg','U2',CURDATE(),NULL);
/*insert into audio values (1,1,'Boneless','Steve Aoki','musica/Borro_Cassette_Maluma.mp3');*/

INSERT INTO galeria_fotos VALUES
(1,'Foto1','...','images/fGaleriaInicial/foto1.jpg','2016-06-18'),
(2,'Foto2','...','images/fGaleriaInicial/foto2.jpg','2016-06-19'),
(3,'Foto3','...','images/fGaleriaInicial/foto3.jpg','2016-06-26'),
(4,'Foto4','...','images/fGaleriaInicial/foto4.jpg','2016-06-18'),
(5,'Foto5','...','images/fGaleriaInicial/foto5.jpg','2016-06-21'),
(6,'Foto6','...','images/fGaleriaInicial/foto6.jpg','2016-06-01');
INSERT INTO usuario_galeria_fotos VALUES(1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,2,5),(6,3,6);
INSERT INTO usuario_votos_galeria_fotos VALUES(1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,1,5),(6,1,6),(7,2,1),(8,2,2),(9,3,1);

/*HUMOR*/
INSERT INTO galeria_humor VALUES
(1,'Imagen1','...','images/fGaleriaHumor/imagen1.jpg','2016-03-18'),
(2,'Imagen2','...','images/fGaleriaHumor/imagen2.jpg','2016-03-18'),
(3,'Imagen3','...','images/fGaleriaHumor/imagen3.jpg','2016-03-18'),
(4,'Imagen4','...','images/fGaleriaHumor/imagen4.jpg','2016-03-18'),
(5,'Imagen5','...','images/fGaleriaHumor/imagen5.jpg','2016-03-18'),
(6,'Imagen6','...','images/fGaleriaHumor/imagen6.jpg','2016-03-18'),
(7,'Imagen7','...','images/fGaleriaHumor/imagen7.jpg','2016-03-18'),
(8,'Imagen8','...','images/fGaleriaHumor/imagen8.jpg','2016-03-18'),
(9,'Imagen9','...','images/fGaleriaHumor/imagen9.jpg','2016-03-18'),
(10,'Imagen10','...','images/fGaleriaHumor/imagen10.jpg','2016-03-18'),
(11,'Imagen11','...','images/fGaleriaHumor/imagen11.jpg','2016-03-18'),
(12,'Imagen12','...','images/fGaleriaHumor/imagen12.jpg','2016-03-18'),
(13,'Imagen13','...','images/fGaleriaHumor/imagen13.jpg','2016-03-18'),
(14,'Imagen14','...','images/fGaleriaHumor/imagen14.jpg','2016-03-18'),
(15,'Imagen15','...','images/fGaleriaHumor/imagen15.jpg','2016-03-18');

/*SELFIES*/
INSERT INTO galeria_selfie VALUES
(1,'Foto1','...','images/fGaleriaSelfies/foto1.jpg','2016-03-18'),
(2,'Foto2','...','images/fGaleriaSelfies/foto2.jpg','2016-03-19'),
(3,'Foto3','...','images/fGaleriaSelfies/foto3.jpg','2016-03-26'),
(4,'Foto4','...','images/fGaleriaSelfies/foto4.jpg','2016-04-18'),
(5,'Foto5','...','images/fGaleriaSelfies/foto5.jpg','2016-04-21'),
(6,'Foto6','...','images/fGaleriaSelfies/foto6.jpg','2016-05-01'),
(7,'Foto7','...','images/fGaleriaSelfies/foto7.jpg','2016-05-01'),
(8,'Foto8','...','images/fGaleriaSelfies/foto8.jpg','2016-05-01');
INSERT INTO usuario_selfie VALUES 
(1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,2,5),(6,3,6),(7,1,7),(8,2,8);
INSERT INTO usuario_votos_selfie VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,1,5),(6,1,6),(7,2,1),(8,2,2),(9,3,1);

/*NOTICIAS*/
INSERT INTO noticia VALUES
(1,'Noticia 1','Este es el resumen de la noticia 1','descripción ...','https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa','2016-03-22',24),
(2,'Noticia 2','Este es el resumen de la noticia 2','descripcion ...','https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa','2016-03-22',20),
(3,'Noticia 3','Este es el resumen de la noticia 3','descripcion ...','https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa','2016-03-22',25),
(4,'Noticia 4','Este es el resumen de la noticia 4','descripcion ...','https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa','2016-03-23',13),
(5,'Noticia 5','Este es el resumen de la noticia 5','descripcion ...','https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa','2016-03-23',40),
(6,'Noticia 6','Este es el resumen de la noticia 6','descripcion ...','https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa','2016-03-23',24),
(7,'Noticia 7','Este es el resumen de la noticia 7','descripcion ...','https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa','2016-03-23',20),
(8,'Noticia 8','Este es el resumen de la noticia 8','descripcion ...','https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa','2016-03-24',25),
(9,'Noticia 9','Este es el resumen de la noticia 9','descripcion ...','https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa','2016-03-24',13),
(10,'Noticia 10','Este es el resumen de la noticia 10','descripcion ...','https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa','2016-03-24',14);

INSERT INTO usuario_noticia VALUES
(1,3,1),(2,2,2),(3,3,3),(4,1,4),(5,3,5),
(6,2,6),(7,1,7),(8,2,8),(9,3,9),(10,1,10);
INSERT INTO foto_noticia VALUES
(1,1,1,'images/fNoticias/noticia1/foto1.jpg'),
(2,1,2,'images/fNoticias/noticia1/foto2.jpg'),
(3,1,3,'images/fNoticias/noticia1/foto3.jpg'),
(4,1,4,'images/fNoticias/noticia1/foto4.jpg'),
(5,1,5,'images/fNoticias/noticia1/foto5.jpg'),
(6,2,1,'images/fNoticias/noticia2/foto1.jpg'),
(7,2,2,'images/fNoticias/noticia2/foto2.jpg'),
(8,2,3,'images/fNoticias/noticia2/foto3.jpg'),
(9,3,1,'images/fNoticias/noticia3/foto1.jpg'),
(10,3,2,'images/fNoticias/noticia3/foto2.jpg'),
(11,3,3,'images/fNoticias/noticia3/foto3.jpg'),
(12,4,1,'images/fNoticias/noticia4/foto1.jpg'),
(13,4,2,'images/fNoticias/noticia4/foto2.jpg'),
(14,4,3,'images/fNoticias/noticia4/foto3.jpg'),
(15,5,1,'images/fNoticias/noticia5/foto1.jpg'),
(16,5,2,'images/fNoticias/noticia5/foto2.jpg'),
(17,5,3,'images/fNoticias/noticia5/foto3.jpg'),
(18,6,1,'images/fNoticias/noticia6/foto1.jpg'),
(19,6,2,'images/fNoticias/noticia6/foto2.jpg'),
(20,6,3,'images/fNoticias/noticia6/foto3.jpg'),
(21,7,1,'images/fNoticias/noticia7/foto1.jpg'),
(22,7,2,'images/fNoticias/noticia7/foto2.jpg'),
(23,7,3,'images/fNoticias/noticia7/foto3.jpg'),
(24,8,1,'images/fNoticias/noticia8/foto1.jpg'),
(25,8,2,'images/fNoticias/noticia8/foto2.jpg'),
(26,8,3,'images/fNoticias/noticia8/foto3.jpg'),
(27,9,1,'images/fNoticias/noticia9/foto1.jpg'),
(28,9,2,'images/fNoticias/noticia9/foto2.jpg'),
(29,9,3,'images/fNoticias/noticia9/foto3.jpg'),
(30,10,1,'images/fNoticias/noticia10/foto1.jpg'),
(31,10,2,'images/fNoticias/noticia10/foto2.jpg'),
(32,10,3,'images/fNoticias/noticia10/foto3.jpg');
INSERT INTO comentario_noticia VALUES
(1,2,1,'Donde estan?','Donde se encuentran ubicados?','2016-03-16 10:12:35'),
(2,3,1,'Hola','Nos encontramos en la avenida Reforma','2016-03-15 10:30:05'),
(3,2,1,'Que servicios?','Que tipo de servicios tienen?','2016-03-16 10:35:45'),
(4,3,1,'Tenemos 3','1.-Externo, 2.-Interno y 3.-Completo.','2016-03-15 10:38:25'),
(5,2,1,'Completo','Como es el completo?','2016-03-16 10:40:55'),
(6,3,1,'Todo','Se realiza lavado externo e interno.','2016-03-15 10:41:05'),
(7,2,1,'Lavan motor?','Lavan Motor y todo?','2016-03-15 10:45:15'),
(8,3,1,'No','Es pura lamina y sillones, el que tu comentas es servicio.','2016-03-16 10:47:35'),
(9,2,1,'Lo tienen','Tambien le realizan servicio?','2016-03-15 10:48:20'),
(10,3,1,'Si','Si si usted lo requiere lo hacemos.','2016-03-16 10:50:35'),
(11,2,1,'Muy bien','Entonces iré mañana','2016-03-15 10:52:22'),
(12,3,1,'Perfecto','Por acá lo esperamos.','2016-03-16 10:57:39'),
(13,1,1,'Quiero ir','Me pueden mandar info a mi correo?','2016-03-16 10:44:43'),
(14,3,1,'Claro','Envianos un correo y con gusto te indicamos la ubicacion en maps','2016-03-16 10:46:01'),
(15,1,1,'Va','Gracias!','2016-03-16 10:48:10'),
(16,2,1,'Se puso chido','Se puso bien chingon este evento','2016-03-17 11:30:15'),
(17,2,2,'Vientos','Me gusto el evento','2016-03-17 12:45:40'),
(18,3,3,'Chingon','Estuvo chido','2016-03-17 11:24:23');

/*EVENTOS*/
INSERT INTO evento VALUES 
(1,'Evento 1','Este es el resumen del EVENTO 1','Descripcion 1 ...','2016-05-21','10:00:00','2016-03-23',34,'www.facebook.com/AutosTimeYa','www.twitter.com/AutosTimeYa'),
(2,'Evento 2','Este es el resumen del EVENTO 2','Descripcion 2 ...','2016-05-21','10:00:00','2016-03-23',41,'www.facebook.com/AutosTimeYa','www.twitter.com/AutosTimeYa'),
(3,'Evento 3','Este es el resumen del EVENTO 3  Aqui se describe una breve redaccion del evento','Descripcion 3 ...','2016-05-21','10:00:00','2016-03-23',23,'www.facebook.com/AutosTimeYa','www.twitter.com/AutosTimeYa'),
(4,'Evento 4','Este es el resumen del EVENTO 4','Descripcion 4 ...','2016-05-21','10:00:00','2016-03-23',22,'www.facebook.com/AutosTimeYa','www.twitter.com/AutosTimeYa'),
(5,'Evento 5','Este es el resumen del EVENTO 5 Aqui se describe una breve redaccion del evento','Descripcion 5 ...','2016-05-21','10:00:00','2016-03-23',26,'www.facebook.com/AutosTimeYa','www.twitter.com/AutosTimeYa'),
(6,'Evento 6','Este es el resumen del EVENTO 6','Descripcion 6 ...','2016-05-21','10:00:00','2016-03-23',36,'www.facebook.com/AutosTimeYa','www.twitter.com/AutosTimeYa'),
(7,'Evento 7','Este es el resumen del EVENTO 7','Descripcion 7 ...','2016-05-21','10:00:00','2016-03-23',43,'www.facebook.com/AutosTimeYa','www.twitter.com/AutosTimeYa'),
(8,'Evento 8','Este es el resumen del EVENTO 8','Descripcion 8 ...','2016-05-21','10:00:00','2016-03-23',34,'www.facebook.com/AutosTimeYa','www.twitter.com/AutosTimeYa'),
(9,'Evento 9','Este es el resumen del EVENTO 9','Descripcion 9 ...','2016-05-21','10:00:00','2016-03-23',25,'www.facebook.com/AutosTimeYa','www.twitter.com/AutosTimeYa'),
(10,'Evento 10','Este es el resumen del EVENTO 10','Descripcion 10 ...','2016-05-21','10:00:00','2016-03-23',56,'www.facebook.com/AutosTimeYa','www.twitter.com/AutosTimeYa');
INSERT INTO usuario_evento VALUES
(1,1,1),(2,2,2),(3,3,3),(4,1,4),(5,2,5),
(6,3,6),(7,1,7),(8,2,8),(9,3,9),(10,1,10);
INSERT INTO foto_evento VALUES
(1,1,1,'images/fEventos/evento1/foto1.jpg'),
(2,1,2,'images/fEventos/evento1/foto2.jpg'),
(3,1,3,'images/fEventos/evento1/foto3.jpg'),
(4,1,4,'images/fEventos/evento1/foto4.jpg'),
(5,1,5,'images/fEventos/evento1/foto5.jpg'),
(6,2,1,'images/fEventos/evento2/foto1.jpg'),
(7,2,2,'images/fEventos/evento2/foto2.jpg'),
(8,2,3,'images/fEventos/evento2/foto3.jpg'),
(9,3,1,'images/fEventos/evento3/foto1.jpg'),
(10,3,2,'images/fEventos/evento3/foto2.jpg'),
(11,3,3,'images/fEventos/evento3/foto3.jpg'),
(12,4,1,'images/fEventos/evento4/foto1.jpg'),
(13,4,2,'images/fEventos/evento4/foto2.jpg'),
(14,4,3,'images/fEventos/evento4/foto3.jpg'),
(15,5,1,'images/fEventos/evento5/foto1.jpg'),
(16,5,2,'images/fEventos/evento5/foto2.jpg'),
(17,5,3,'images/fEventos/evento5/foto3.jpg'),
(18,6,1,'images/fEventos/evento6/foto1.jpg'),
(19,6,2,'images/fEventos/evento6/foto2.jpg'),
(20,6,3,'images/fEventos/evento6/foto3.jpg'),
(21,7,1,'images/fEventos/evento7/foto1.jpg'),
(22,7,2,'images/fEventos/evento7/foto2.jpg'),
(23,7,3,'images/fEventos/evento7/foto3.jpg'),
(24,8,1,'images/fEventos/evento8/foto1.jpg'),
(25,8,2,'images/fEventos/evento8/foto2.jpg'),
(26,8,3,'images/fEventos/evento8/foto3.jpg'),
(27,9,1,'images/fEventos/evento9/foto1.jpg'),
(28,9,2,'images/fEventos/evento9/foto2.jpg'),
(29,9,3,'images/fEventos/evento9/foto3.jpg'),
(30,10,1,'images/fEventos/evento10/foto1.jpg'),
(31,10,2,'images/fEventos/evento10/foto2.jpg'),
(32,10,3,'images/fEventos/evento10/foto3.jpg'),
(33,10,4,'images/fEventos/evento10/foto4.jpg'),
(34,10,5,'images/fEventos/evento10/foto5.jpg'),
(35,10,6,'images/fEventos/evento10/foto6.jpg');
INSERT INTO comentario_evento VALUES
(1,2,10,'Chido','Se ve que estuvo chingon el evento', '2016-03-16 10:12:35'),
(2,3,10,'Bueno','Estuvo bueno este evento','2016-03-15 10:30:05'),
(3,2,10,'Quiero ir','Tu fuiste a ese evento?','2016-03-16 10:35:45'),
(4,3,10,'Si fui','Si yo asistí, se pone bastante bien.','2016-03-15 10:38:25'),
(5,2,10,'Como puedo ir','Como te enteras de los eventos? Quiero ir','2016-03-16 10:40:55'),
(6,1,10,'Aqui','En nuestra pagina, los organizadores suben informacion o en nuestras redes sociales.','2016-03-15 10:41:05'),
(7,3,10,'Aqui','Así es yo me entero Aqui o en el facebook.','2016-03-15 10:45:15'),
(8,2,10,'Vientos','Muy bien, Gracias espero ir al siguiente','2016-03-16 10:47:35'),
(9,3,10,'Claro','Muy bien, te los recomiendo','2016-03-15 10:48:20'),
(10,2,10,'Se ve chido','Si se ve que está chingon, y cobran?','2016-03-16 10:50:35'),
(11,3,10,'Algunos','Algunos eventos si, otros no y algunos ofrecen descuentos con mencionar esta pagina','2016-03-15 10:52:22'),
(12,2,10,'Neta','Orale que chingon, voy a estar atento','2016-03-16 10:57:39'),
(13,1,10,'Cupon descuento','Vi que ya pusieron un cupon de descuento','2016-03-17 11:41:20'),
(14,3,10,'Si','Si, yo ntambien lo vi ayer','2016-03-17 11:45:30'),
(15,2,10,'Va','Voy a checar, Chido!','2016-03-17 11:56:40'),
(16,2,10,'Ya tengo','Ya consegui mi cupon de descuento','2016-03-17 11:59:56');

/*HOY NECESITO*/
INSERT INTO hoy_necesito VALUES
(1,'Lavado de Autos','Este es el resumen del hoy necesito 1','Ofrezco el servicio de lavado de autos','2016-03-23',35,'https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa'),
(2,'Mecanica en General','Este es el resumen del hoy necesito 2','Ofrezco el servicio de mecánica en general','2016-03-23',39,'https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa'),
(3,'Chofer Turismo','Este es el resumen del hoy necesito 3','Ofrezco mis servicios de chofer de Turismo','2016-03-23',30,'https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa'),
(4,'Pulido y encerado','Este es el resumen del hoy necesito 4','Ofrezco el servicio de pulido y encerado','2016-03-23',33,'https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa'),
(5,'Pintura','Este es el resumen del hoy necesito 5','Ofrezco el servicio de pintura automotriz, se igualan colores.','2016-03-23',31,'https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa'),
(6,'Hojalateria','Este es el resumen del hoy necesito 6','Ofrezco el servicio de Hojalateria y pintura','2016-03-23',35,'https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa'),
(7,'Grua','Este es el resumen del hoy necesito 7','Ofrezco el servicio de grua, para transportar autos','2016-03-23',39,'https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa'),
(8,'Lavado de interiores', 'Este es el resumen del hoy necesito 8','Ofrezco el servicio de lavado de interiores','2016-03-23',38,'https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa'),
(9,'Refacciones','Este es el resumen del hoy necesito 9','Ofrezco el servicio de refacciones para todos los autos','2016-03-23',32,'https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa'),
(10,'Llantas','Este es el resumen del hoy necesito 10','Ofrezco el servicio de renovacion de llantas','2016-03-23',65,'https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa');
INSERT INTO usuario_hoy_necesito VALUES
(1,3,1),(2,2,2),(3,3,3),(4,1,4),(5,3,5),(6,2,6),(7,1,7),(8,2,8),(9,3,9),(10,1,10);
INSERT INTO foto_hoy_necesito VALUES
(1,1,1,'images/fHoyNecesito/hoyNecesito1/foto1.jpg'),
(2,1,2,'images/fHoyNecesito/hoyNecesito1/foto2.jpg'),
(3,1,3,'images/fHoyNecesito/hoyNecesito1/foto3.jpg'),
(4,1,4,'images/fHoyNecesito/hoyNecesito1/foto4.jpg'),
(5,1,5,'images/fHoyNecesito/hoyNecesito1/foto5.jpg'),
(6,2,1,'images/fHoyNecesito/hoyNecesito2/foto1.jpg'),
(7,2,2,'images/fHoyNecesito/hoyNecesito2/foto2.jpg'),
(8,2,3,'images/fHoyNecesito/hoyNecesito2/foto3.jpg'),
(9,3,1,'images/fHoyNecesito/hoyNecesito3/foto1.jpg'),
(10,3,2,'images/fHoyNecesito/hoyNecesito3/foto2.jpg'),
(11,3,3,'images/fHoyNecesito/hoyNecesito3/foto3.jpg'),
(12,4,1,'images/fHoyNecesito/hoyNecesito4/foto1.jpg'),
(13,4,2,'images/fHoyNecesito/hoyNecesito4/foto2.jpg'),
(14,4,3,'images/fHoyNecesito/hoyNecesito4/foto3.jpg'),
(15,5,1,'images/fHoyNecesito/hoyNecesito5/foto1.jpg'),
(16,5,2,'images/fHoyNecesito/hoyNecesito5/foto2.jpg'),
(17,5,3,'images/fHoyNecesito/hoyNecesito5/foto3.jpg'),
(18,6,1,'images/fHoyNecesito/hoyNecesito6/foto1.jpg'),
(19,6,2,'images/fHoyNecesito/hoyNecesito6/foto2.jpg'),
(20,6,3,'images/fHoyNecesito/hoyNecesito6/foto3.jpg'),
(21,7,1,'images/fHoyNecesito/hoyNecesito7/foto1.jpg'),
(22,7,2,'images/fHoyNecesito/hoyNecesito7/foto2.jpg'),
(23,7,3,'images/fHoyNecesito/hoyNecesito7/foto3.jpg'),
(24,8,1,'images/fHoyNecesito/hoyNecesito8/foto1.jpg'),
(25,8,2,'images/fHoyNecesito/hoyNecesito8/foto2.jpg'),
(26,8,3,'images/fHoyNecesito/hoyNecesito8/foto3.jpg'),
(27,9,1,'images/fHoyNecesito/hoyNecesito9/foto1.jpg'),
(28,9,2,'images/fHoyNecesito/hoyNecesito9/foto2.jpg'),
(29,9,3,'images/fHoyNecesito/hoyNecesito9/foto3.jpg'),
(30,10,1,'images/fHoyNecesito/hoyNecesito10/foto1.jpg'),
(31,10,2,'images/fHoyNecesito/hoyNecesito10/foto2.jpg'),
(32,10,3,'images/fHoyNecesito/hoyNecesito10/foto3.jpg');
INSERT INTO comentario_hoy_necesito VALUES
(1,2,10,'Donde estan?','Donde se encuentran ubicados?','2016-03-16 10:12:35'),
(2,3,10,'Hola','Nos encontramos en la avenida Reforma','2016-03-15 10:30:05'),
(3,2,10,'Que servicios?','Que tipo de servicios tienen?','2016-03-16 10:35:45'),
(4,3,10,'Tenemos 3','1.-Externo, 2.-Interno y 3.-Completo.','2016-03-15 10:38:25'),
(5,2,10,'Completo','Como es el completo?','2016-03-16 10:40:55'),
(6,3,10,'Todo','Se realiza lavado externo e interno.','2016-03-15 10:41:05'),
(7,2,10,'Lavan motor?','Lavan Motor y todo?','2016-03-15 10:45:15'),
(8,3,10,'No','Es pura lamina y sillones, el que tu comentas es servicio.','2016-03-16 10:47:35'),
(9,2,10,'Lo tienen','Tambien le realizan servicio?','2016-03-15 10:48:20'),
(10,3,10,'Si','Si si usted lo requiere lo hacemos.','2016-03-16 10:50:35'),
(11,2,10,'Muy bien','Entonces iré mañana','2016-03-15 10:52:22'),
(12,3,10,'Perfecto','Por acá lo esperamos.','2016-03-16 10:57:39'),
(13,1,10,'Quiero ir','Me pueden mandar info a mi correo?','2016-03-16 10:44:43'),
(14,3,10,'Claro','Envianos un correo y con gusto te indicamos la ubicacion en maps','2016-03-16 10:46:01'),
(15,1,10,'Va','Gracias!','2016-03-16 10:48:10');

/*COMPRA-VENTA*/
INSERT INTO compra_venta VALUES 
(1,'Vendo Ibiza','Este es el resumen de la compra venta 1','Auto estandard 5 vel. llantas nuevas','Ibiza',2012,'Estandar','Gasolina','$120,000','45,000 km',1,'2016-03-23',45,'https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa'),
(2,'Cambio Ibiza','Este es el resumen de la compra venta 2','Automático 5 vel.','Ibiza',2013,'Automático','Gasolina','$150,000','40,000 km',1,'2016-03-23',25,'https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa'),
(3,'Vendo Leon','Este es el resumen de la compra venta 3','Auto estandard 5 vel...','Leon',2013,'Estandar','Gasolina','$100,000','55,000 km',1,'2016-03-23',15,'https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa'),
(4,'Cambio Ford Lobo','Este es el resumen de la compra venta 4','Auto estandard 5 vel.','Ford Lobo',2011,'Estandar','Gasolina','$170,000','65,000 km',1,'2016-03-23',45,'https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa'),
(5,'Busco comprar','Este es el resumen de la compra venta 5','Auto estandar en buenas condiciones.','Auto chico',2013,'Estandar','Gasolina','$120,000','85,000 km',1,'2016-03-23',35,'https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa'),
(6,'Vendo Chevy','Este es el resumen de la compra venta 6','Auto estandard 5 vel. recien ajustado','Chevy',2000,'Estandar','Gasolina','$120,000','95,000 km',1,'2016-03-23',25,'https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa'),
(7,'Vendo Lambo','Este es el resumen de la compra venta 7','Auto estandard 6 vel.','Lambo',2014,'Estandar','Gasolina','$120,000','65,000 km',1,'2016-03-23',15,'https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa'),
(8,'Vendo Mustang','Este es el resumen de la compra venta 8','Auto estandard 5 vel. con Nitro','Mustang',1986,'Estandar','Gasolina','$120,000','105,000 km',1,'2016-03-23',55,'https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa'),
(9,'Vendo Atos','Este es el resumen de la compra venta 9','Automatico 5 vel. tuneado','Atos',2010,'Automatico','Gasolina','$120,000','35,000 km',1,'2016-03-23',35,'https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa'),
(10,'Cambio Combi','Este es el resumen de la compra venta 10','Auto estandard 5 vel. Recien remodelada','Combi',2006,'Estandar','Gasolina','$120,000','75,000 km',1,'2016-03-23',45,'https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa'),
(11,'Vendo Monza','Este es el resumen de la compra venta 11','Auto estandard 5 vel. como nuevo','Monza',2004,'Estandar','Gasolina','$120,000','95,000 km',1,'2016-03-23',85,'https://www.facebook.com/AutosTimeYa','https://twitter.com/AutosTimeYa');
INSERT INTO usuario_compra_venta VALUES
(1,3,1),(2,2,2),(3,3,3),(4,1,4),(5,2,5),
(6,3,6),(7,3,7),(8,2,8),(9,2,9),(10,3,10);
INSERT INTO foto_compra_venta VALUES
(1,1,1,'images/fCompraVenta/compraVenta1/foto1.jpg'),
(2,1,2,'images/fCompraVenta/compraVenta1/foto2.jpg'),
(3,1,3,'images/fCompraVenta/compraVenta1/foto3.jpg'),
(4,1,4,'images/fCompraVenta/compraVenta1/foto4.jpg'),
(5,1,5,'images/fCompraVenta/compraVenta1/foto5.jpg'),
(6,2,1,'images/fCompraVenta/compraVenta2/foto1.jpg'),
(7,2,2,'images/fCompraVenta/compraVenta2/foto2.jpg'),
(8,2,3,'images/fCompraVenta/compraVenta2/foto3.jpg'),
(9,3,1,'images/fCompraVenta/compraVenta3/foto1.jpg'),
(10,3,2,'images/fCompraVenta/compraVenta3/foto2.jpg'),
(11,3,3,'images/fCompraVenta/compraVenta3/foto3.jpg'),
(12,4,1,'images/fCompraVenta/compraVenta4/foto1.jpg'),
(13,4,2,'images/fCompraVenta/compraVenta4/foto2.jpg'),
(14,4,3,'images/fCompraVenta/compraVenta4/foto3.jpg'),
(15,5,1,'images/fCompraVenta/compraVenta5/foto1.jpg'),
(16,5,2,'images/fCompraVenta/compraVenta5/foto2.jpg'),
(17,5,3,'images/fCompraVenta/compraVenta5/foto3.jpg'),
(18,6,1,'images/fCompraVenta/compraVenta6/foto1.jpg'),
(19,6,2,'images/fCompraVenta/compraVenta6/foto2.jpg'),
(20,6,3,'images/fCompraVenta/compraVenta6/foto3.jpg'),
(21,7,1,'images/fCompraVenta/compraVenta7/foto1.jpg'),
(22,7,2,'images/fCompraVenta/compraVenta7/foto2.jpg'),
(23,7,3,'images/fCompraVenta/compraVenta7/foto3.jpg'),
(24,8,1,'images/fCompraVenta/compraVenta8/foto1.jpg'),
(25,8,2,'images/fCompraVenta/compraVenta8/foto2.jpg'),
(26,8,3,'images/fCompraVenta/compraVenta8/foto3.jpg'),
(27,9,1,'images/fCompraVenta/compraVenta9/foto1.jpg'),
(28,9,2,'images/fCompraVenta/compraVenta9/foto2.jpg'),
(29,9,3,'images/fCompraVenta/compraVenta9/foto3.jpg'),
(30,10,1,'images/fCompraVenta/compraVenta10/foto1.jpg'),
(31,10,2,'images/fCompraVenta/compraVenta10/foto2.jpg'),
(32,10,3,'images/fCompraVenta/compraVenta10/foto3.jpg');
INSERT INTO comentario_compra_venta VALUES
(1,2,1,'Lo tienes?','Hola me interesa, todavia lo tienes?','2016-03-16 10:12:35'),
(2,3,1,'Hola','Si, todavia lo tengo disponible','2016-03-15 10:30:05'),
(3,2,1,'Perfecto','Tiene alguna falla o debe algo?','2016-03-16 10:35:45'),
(4,3,1,'Papeles en linea','Todo al 100, no le falla nada. Papeles al corriente.','2016-03-15 10:38:25'),
(5,2,1,'Cuanto?','Cuanto es lo menos?','2016-03-16 10:40:55'),
(6,3,1,'$115','Lo menos que puedo aceptar son $115,000.00','2016-03-15 10:41:05'),
(7,2,1,'$110','Tengo $110,000.00 para hoy. Te interesa?','2016-03-15 10:45:15'),
(8,3,1,'Podria ser','Podria ser, si estas dispuesto de cerrar el trato mañana.','2016-03-16 10:47:35'),
(9,2,1,'Si','Pero primero quisiera probarlo','2016-03-15 10:48:20'),
(10,3,1,'Claro','Puedes hacerle las pruebas que quieras.','2016-03-16 10:50:35'),
(11,2,1,'Muy bien','Entonces iré mañana','2016-03-15 10:52:22'),
(12,3,1,'Perfecto','Por acá nos vemos. Cualquier duda por whatsapp me puedes contactar.','2016-03-16 10:57:39'),
(13,2,1,'Va','Yo te contacto por ahí','2016-03-15 11:02:21'),
(14,1,1,'Me Interesa','Me interesa, para mañana, estaria dispuesto','2016-03-17 10:30:25'),
(15,2,1,'Si lo tengo', 'Hola si lo tengo todavia, para el primero que llegue','2016-03-17 10:32:30'),
(16,3,1,'Yo lo quiero','A mi me interesa por la tarde con dinero en mano','2016-03-17 10:35:01'),
(17,2,1,'El primero','Para el primero que llegue con $ en mano','2016-03-17 10:36:59');



/*Falta Terminar la consulta con la ubicacion de la imagen y el contador de comentarios
Select  noticia.id_noticia, noticia.titulo, noticia.resumen, noticia.fecha, count(id_comentario_noticia) as cont_comentarios, noticia.cont_visitas, foto_noticia.ubicacion_foto
From noticia 
left Join comentario_noticia
on noticia.id_noticia = comentario_noticia.id_noticia
left Join foto_noticia
on noticia.id_noticia = foto_noticia.id_noticia
where foto_noticia.numero_foto = 1
group by noticia.id_noticia
Order By noticia.id_noticia Desc Limit 1;

select count(id_comentario_noticia) From comentario_noticia
where id_noticia=1;


GALERIA INICIAL DE VOTOS
select galeria_fotos.id_galeria_fotos, ubicacion_foto, count(usuarios_votos_galeria_fotos.id_galeria_fotos) as cont_votos 
From galeria_fotos 
Join usuarios_votos_galeria_fotos
On galeria_fotos.id_galeria_fotos = usuarios_votos_galeria_fotos.id_galeria_fotos
where galeria_fotos.fecha_alta between LAST_DAY(curdate() - INTERVAL 1 MONTH) + INTERVAL 1 DAY and LAST_DAY(curdate())
Group By usuarios_votos_galeria_fotos.id_galeria_fotos
Order By cont_votos Desc Limit 15;

EVENTOS
Select evento.id_evento, evento.titulo, evento.resumen, evento.fecha, count(id_comentario_evento) as cont_comentarios_evento, evento.cont_visitas, foto_evento.ubicacion_foto
From evento Left Join comentario_evento On evento.id_evento = comentario_evento.id_evento Left Join foto_evento On evento.id_evento = foto_evento.id_evento
Where foto_evento.numero_foto = 1 Group By evento.id_evento Order By evento.id_evento Desc Limit 10;

HOY NECESITO
Select hoy_necesito.id_hoy_necesito, hoy_necesito.titulo, hoy_necesito.resumen, hoy_necesito.fecha, count(id_comentario_hoy_necesito) as cont_comentarios_hoy_necesito,
hoy_necesito.cont_visitas, foto_hoy_necesito.ubicacion_foto
From hoy_necesito Left Join comentario_hoy_necesito On hoy_necesito.id_hoy_necesito = comentario_hoy_necesito.id_hoy_necesito
Left Join foto_hoy_necesito On hoy_necesito.id_hoy_necesito = foto_hoy_necesito.id_hoy_necesito
Group By hoy_necesito.id_hoy_necesito Desc Limit 10



COMPRA / VENTA
Select compra_venta.id_compra_venta, compra_venta.titulo, compra_venta.resumen, compra_venta.marca, compra_venta.modelo, compra_venta.precio, compra_venta.fecha,
count(id_comentario_compra_venta) as cont_comentarios, compra_venta.cont_visitas, foto_compra_venta.ubicacion_foto
From compra_venta Left Join comentario_compra_venta On compra_venta.id_compra_venta = comentario_compra_venta.id_compra_venta
Left Join foto_compra_venta On compra_venta.id_compra_venta = foto_compra_venta.id_compra_venta
Where foto_compra_venta.numero_foto = 1 Group By compra_venta.id_compra_venta Desc Limit 10

SELFIES
select galeria_selfie.id_selfie, galeria_selfie.titulo, galeria_selfie.descripcion, galeria_selfie.ubicacion_foto, galeria_selfie.fecha_alta, count(usuario_votos_selfie.id_selfie) as votos
from galeria_selfie 
left join usuario_votos_selfie
on galeria_selfie.id_selfie = usuario_votos_selfie.id_selfie
group by galeria_selfie.id_selfie Desc limit 1;

select galeria_selfie.id_selfie, galeria_selfie.titulo, galeria_selfie.descripcion, galeria_selfie.ubicacion_foto, galeria_selfie.fecha_alta
from galeria_selfie 
Order By galeria_selfie.id_selfie Desc

HUMOR
select id_humor, titulo, descripcion, ubicacion_foto, fecha_alta from galeria_humor order by id_humor Desc limit 1*/


