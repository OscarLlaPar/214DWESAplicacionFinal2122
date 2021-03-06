use DB214DWESProyectoTema5;

insert into T01_Usuario values
('admin', SHA2('adminpaso',256), 'Usuario administrador', null, 0, 'administrador', null),
('albertoF',SHA2('albertoFpaso',256),'AlbertoF', null, 0, 'usuario', null),
('outmane',SHA2('outmanepaso',256),'Outmane', null, 0, 'usuario', null),
('rodrigo',SHA2('rodrigopaso',256),'Rodrigo', null, 0, 'usuario', null),
('isabel',SHA2('isabelpaso',256),'Isabel', null, 0, 'usuario', null),
('david',SHA2('davidpaso',256),'David', null, 0, 'usuario', null),
('aroa',SHA2('aroapaso',256),'Aroa', null, 0, 'usuario', null),
('johanna',SHA2('johannapaso',256),'Johanna', null, 0, 'usuario', null),
('oscar',SHA2('oscarpaso',256),'Oscar', null, 0, 'usuario', null),
('sonia',SHA2('soniapaso',256),'Sonia', null, 0, 'usuario', null),
('heraclio',SHA2('heracliopaso',256),'Heraclio', null, 0, 'usuario', null),
('amor',SHA2('amorpaso',256),'Amor', null, 0, 'usuario', null),
('antonio',SHA2('antoniopaso',256),'Antonio', null, 0, 'usuario', null),
('pruebaA',SHA2('pruebaApaso',256),'Usuario de prueba 1', null, 0, 'usuario', null),
('prueabaB',SHA2('pruebaBpaso',256),'Usuario de prueba 2', null, 0, 'usuario', null),
('pruebaC',SHA2('pruebaCpaso',256),'Usuario de prueba 3', null, 0, 'usuario', null),
('pruebaD',SHA2('pruebaDpaso',256),'Usuario de prueba 4', null, 0, 'usuario', null);

insert into T02_Departamento values
("UNO", "Primer departamento", UNIX_TIMESTAMP(), 30.45, null),
("DOS", "Segundo departamento", UNIX_TIMESTAMP(), 66.66, null),
("TRE", "Tercer departamento", UNIX_TIMESTAMP(), 1.11, null);