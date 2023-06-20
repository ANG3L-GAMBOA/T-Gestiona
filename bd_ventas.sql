create database bd_ventas;

use bd_ventas;

create table tb_marca (
	codigo_marca char(5) not null primary key,
    marca varchar(30) not null
);

create table tb_categoria (
	codigo_categoria char(5) not null primary key,
    categoria varchar(40) not null
);

create table tb_producto (
	codigo_producto char(5) not null primary key,
    producto varchar(40) not null,
    stock_disponible int,
    costo float,
    ganancia float,
    producto_codigo_marca char(5) not null,
    producto_codigo_categoria char(5) not null,
    foreign key (producto_codigo_marca) references tb_marca (codigo_marca),
    foreign key (producto_codigo_categoria) references tb_categoria (codigo_categoria)
);

-- Registrar datos en Marcas
insert into tb_marca values
('M0001', 'Sony'),
('M0002', 'LG');

-- Registrar datos en Categorías
insert into tb_categoria values
('C0001', 'Cómputo'),
('C0002', 'Electrodomésticos');

-- Registrar datos en Productos
insert into tb_producto values
('P0001', 'Lavadoraa 13 Kg.', 52, 1365.28, 0.24, 'M0002', 'C0002');

insert into tb_producto values
('P0002', 'PC Gamer Core i7 16GB', 27, 2865.28, 0.17, 'M0002', 'C0001');

-- Procedimientos Almacenados (Store Procedure)
-- Listar Marcas
delimiter $$
create procedure sp_listar_marca()
begin
	select * from tb_marca order by marca asc;
end; $$

call sp_listar_marca();

-- drop procedure sp_listar_marca;

-- Listar Categorías
delimiter $$
create procedure sp_listar_categoria()
begin
	select * from tb_categoria order by categoria asc;
end; $$

call sp_listar_categoria();

-- Listar Producto
delimiter $$
create procedure sp_listar_producto()
begin
	select tb1.codigo_producto, tb1.producto, tb1.stock_disponible,
		   tb1.costo, tb1.ganancia, tb2.marca, tb3.categoria
    from tb_producto tb1 inner join tb_marca tb2 on
    (tb1.producto_codigo_marca = tb2.codigo_marca) inner join tb_categoria tb3 on
    (tb1.producto_codigo_categoria = tb3.codigo_categoria)
    order by tb1.producto asc;
end; $$

call sp_listar_producto();

-- drop procedure sp_listar_producto;

-- Buscar Producto por Código
delimiter &&
create procedure sp_buscar_producto_por_codigo(in codigo char(5))
begin
	select * from tb_producto
    where codigo_producto = codigo;
end; &&

call sp_buscar_producto_por_codigo('P0002');

-- Filtrar Producto por nombre
delimiter &&
create procedure sp_filtrar_producto(in valor varchar(40))
begin
	select tb1.codigo_producto, tb1.producto, tb1.stock_disponible,
		   tb1.costo, tb1.ganancia, tb2.marca, tb3.categoria
    from tb_producto tb1 inner join tb_marca tb2 on
    (tb1.producto_codigo_marca = tb2.codigo_marca) inner join tb_categoria tb3 on
    (tb1.producto_codigo_categoria = tb3.codigo_categoria)
    where tb1.producto like concat(valor, '%');
end; &&

call sp_filtrar_producto('L');

-- Registrar un Producto
delimiter &&
create procedure sp_registrar_producto(
	in cod_prod char(5), in prod varchar(40),
	in stk int, in cst float, in gnc float,
    in cod_mar char(5), in cod_cat char(5))
begin
	insert into tb_producto values
    (cod_prod, prod, stk, cst, gnc, cod_mar, cod_cat);
end; &&

call sp_registrar_producto(
	'P0003', 'Televisor LED 60', 83, 1994.63, 0.23, 'M0001', 'C0002');

-- Editar un Producto
delimiter &&
create procedure sp_editar_producto(
	in cod_prod char(5), in prod varchar(40),
	in stk int, in cst float, in gnc float,
    in cod_mar char(5), in cod_cat char(5))
begin
	update tb_producto set
    producto = prod, stock_disponible = stk,
    costo = cst, ganancia = gnc,
    producto_codigo_marca = cod_mar, producto_codigo_categoria = cod_cat
    where codigo_producto = cod_prod;
end; &&

call sp_editar_producto(
	'P0003', 'Televisor QLED 60', 85, 2994.63, 0.22, 'M0001', 'C0002');

-- Borrar un Producto
delimiter &&
create procedure sp_borrar_producto(in codigo char(5))
begin
	delete from tb_producto
    where codigo_producto = codigo;
end; &&

call sp_borrar_producto('P0003');





