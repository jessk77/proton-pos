-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2020 at 06:49 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `atomikp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `padre` int(255) DEFAULT NULL,
  `estatus` int(255) NOT NULL DEFAULT '1',
  `usuario_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(255) NOT NULL,
  `contacto` varchar(100) NOT NULL,
  `tel_movil` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `no_ext` varchar(50) NOT NULL,
  `no_int` varchar(50) NOT NULL,
  `colonia` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `razon_social` varchar(255) NOT NULL,
  `calle_f` varchar(100) NOT NULL,
  `no_ext_f` varchar(50) NOT NULL,
  `no_int_f` varchar(50) NOT NULL,
  `colonia_f` varchar(100) NOT NULL,
  `municipio_f` varchar(100) NOT NULL,
  `estado_f` varchar(100) NOT NULL,
  `cp_f` varchar(255) NOT NULL,
  `estatus` int(255) NOT NULL DEFAULT '1',
  `rfc` varchar(50) NOT NULL,
  `usuario_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE `empresas` (
  `id` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `logotipo` varchar(255) NOT NULL,
  `web` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `usuario_id` int(255) NOT NULL,
  `tk_size_logo` varchar(255) NOT NULL,
  `tk_encabezado` text NOT NULL,
  `tk_pie` text NOT NULL,
  `tk_mensaje` text NOT NULL,
  `tasa_imp` varchar(255) NOT NULL DEFAULT 'IVA',
  `porcentaje_imp` decimal(10,2) NOT NULL DEFAULT '16.00',
  `simbolo_moneda` varchar(255) NOT NULL DEFAULT '$',
  `impuesto` int(255) NOT NULL,
  `tk_logo` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gastos`
--

CREATE TABLE `gastos` (
  `id` int(255) NOT NULL,
  `concepto` varchar(255) NOT NULL,
  `monto` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estatus` int(255) NOT NULL DEFAULT '1',
  `usuario_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
--

CREATE TABLE `inventario` (
  `id` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `stock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log_stock`
--

CREATE TABLE `log_stock` (
  `id` int(255) NOT NULL,
  `usuario_id` int(255) NOT NULL,
  `producto_id` int(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `cantidad` int(255) NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `icono` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permisos`
--

CREATE TABLE `permisos` (
  `id` int(255) NOT NULL,
  `empleado_id` int(255) NOT NULL,
  `submenu_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(255) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `observaciones` text NOT NULL,
  `unidad` varchar(100) NOT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` bigint(255) NOT NULL,
  `estatus` int(255) NOT NULL DEFAULT '1',
  `precio_mayoreo` decimal(10,0) NOT NULL,
  `piezas_mayoreo` decimal(10,0) NOT NULL,
  `impuestos` int(255) NOT NULL,
  `categoria` int(255) NOT NULL,
  `stock_maximo` int(255) NOT NULL,
  `stock_minimo` int(255) NOT NULL,
  `usuario_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(255) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `contacto` varchar(100) NOT NULL,
  `tel_movil` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `usuario_id` int(255) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `no_ext` varchar(50) NOT NULL,
  `no_int` varchar(50) NOT NULL,
  `colonia` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `razon_social` varchar(255) NOT NULL,
  `calle_f` varchar(100) NOT NULL,
  `no_ext_f` varchar(50) NOT NULL,
  `no_int_f` varchar(50) NOT NULL,
  `colonia_f` varchar(100) NOT NULL,
  `municipio_f` varchar(100) NOT NULL,
  `estado_f` varchar(100) NOT NULL,
  `cp_f` varchar(100) NOT NULL,
  `banco` varchar(50) NOT NULL,
  `no_cuenta` varchar(100) NOT NULL,
  `clabe` varchar(100) NOT NULL,
  `observaciones` text NOT NULL,
  `estatus` int(255) NOT NULL DEFAULT '1',
  `rfc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` int(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `menu_id` int(255) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `tel_movil` varchar(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `permisos_id` int(255) NOT NULL,
  `estatus` int(255) NOT NULL DEFAULT '1',
  `plan` varchar(255) NOT NULL DEFAULT '0',
  `fecha_plan` date DEFAULT NULL,
  `usuario_padre` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `id` int(255) NOT NULL,
  `cliente_id` int(255) NOT NULL,
  `estatus` int(255) NOT NULL DEFAULT '1',
  `descuento` decimal(10,2) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` decimal(10,2) NOT NULL,
  `usuario_id` int(255) NOT NULL DEFAULT '1',
  `tipo_pago` int(255) NOT NULL,
  `motivo_cancelacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ventas_detalle`
--

CREATE TABLE `ventas_detalle` (
  `id` int(255) NOT NULL,
  `producto_id` int(255) NOT NULL,
  `cantidad` int(255) NOT NULL,
  `venta_id` int(255) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `tipo_precio` int(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_stock`
--
ALTER TABLE `log_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_codigo` (`codigo`);

--
-- Indexes for table `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_stock`
--
ALTER TABLE `log_stock`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
