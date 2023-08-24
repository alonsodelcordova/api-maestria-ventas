-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-08-2023 a las 03:53:48
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `api_maestria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id_almacen` int(11) NOT NULL COMMENT 'PK',
  `almacen` text NOT NULL COMMENT 'Nombre del almacen',
  `fecha_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'fecha de creacion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla de Almacenes';

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id_almacen`, `almacen`, `fecha_create`) VALUES
(1, 'Almacen Principal', '2023-08-18 01:20:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL COMMENT 'pk',
  `categoria` text NOT NULL COMMENT 'nombre categoria',
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'fecha creacion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Categoria del Producto';

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`, `fecha_creacion`) VALUES
(1, 'Colombianas', '2023-08-17 23:30:07'),
(2, 'Argentinas', '2023-08-17 23:30:15'),
(3, 'Cubanas', '2023-08-17 23:30:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cilindros`
--

CREATE TABLE `cilindros` (
  `id_cilindro` int(11) NOT NULL,
  `id_almacen` int(11) NOT NULL,
  `codigo` varchar(25) NOT NULL,
  `id_tipogas` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `serie` varchar(25) NOT NULL,
  `modelo` varchar(25) NOT NULL,
  `volumen` int(11) NOT NULL,
  `id_unidad` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` int(11) NOT NULL DEFAULT 1 COMMENT 'Activo[1] Inactivo[0]'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Cilindros del Sistema';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL COMMENT 'pk',
  `documento` text CHARACTER SET utf8 NOT NULL COMMENT 'RUC o DNI',
  `ruc` char(11) CHARACTER SET utf8 NOT NULL COMMENT 'numero de documento',
  `razon_social` text CHARACTER SET utf8 NOT NULL COMMENT 'nombre del cliente',
  `direccion` text CHARACTER SET utf8 NOT NULL COMMENT 'direccion del cliente',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'fecha registro'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Clientes';

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `documento`, `ruc`, `razon_social`, `direccion`, `fecha_registro`) VALUES
(1, 'RUC', '20554230165', 'CLIMATIZACION ASIS S.A.C.', 'AV. LOS FICUS MZA. O2 LOTE. 2 URB.  VISTA ALEGRE DE VILLA  (IGLESIA SAN FRANCISCO DE ASIS)', '2021-03-09 22:03:56'),
(2, 'RUC', '20483894814', 'ECO', 'NRO. S/N CAS.  CHAPAIRA  (FRENTE A CASERIO CHAPAIRA)', '2021-03-09 22:07:16'),
(3, 'RUC', '20530184596', 'ECOSAC AGRICOLA S.A.C.', 'CAR.CHAPAIRA NRO. S N CAS.  CHAPAIRA  (FRENTE AL CASERIO CHAPAIRA)', '2021-03-09 22:09:32'),
(4, 'RUC', '20525342914', 'FACTORIA AQUILINO MARTINEZ PAZOS SOCIEDAD COMERCIAL DE RESPONSABILIDAD LIMITADA', 'CAL.HUAYNA CAPAC NRO. 1111 A.H.  CAMPO POLO  (CDRA. 19 DE AV. PROGRESO)', '2021-03-09 22:10:27'),
(5, 'RUC', '20529932881', 'SERVICIOS PESQUEROS DISMAR SOCIEDAD ANONIMA CERRADA', 'CAL.LOS LAURELES NRO. 311 A.H.  VICTOR RAUL  (A ESPALDAS DEL ESTADIO)', '2021-03-09 22:14:03'),
(7, 'RUC', '20600411978', 'SANEAMIENTO Y SOLUCIONES S.A.C.', 'AV. JOSE CARLOS MARIATEGUI NRO. 517 SAN MARTIN  (A 1 CDRA. DE CIRCUNVALACION)', '2021-03-09 22:14:51'),
(8, 'RUC', '20605353810', 'INOXIDABLES PIURA M & N S.R.L.', 'MZA. E LOTE. 12 PQ. RESID. MONTEVERDE II 3 ETAPA  (CERCA A CENTRO RECREAT. ACUALANDIA)', '2021-03-09 22:16:07'),
(9, 'RUC', '20525871747', 'FACTONOR E.I.R.L.', 'MZA. X LOTE. 8A Z.I.  ZONA INDUSTRIAL  (PARTE POSTERIOR DE EMAUS)', '2021-03-09 22:22:56'),
(10, 'RUC', '20601158257', 'TORNERIA Y SOLDADURA DE CALIDAD SOCIEDAD ANONIMA CERRADA', 'SUB LOTE 2 B2A MZA. 231 Z.I.  SECCION A  (A ESPALDAS DE COSTA GAS)', '2021-03-09 22:23:44'),
(11, 'RUC', '20483899379', 'CORPORACION CRUZ SOCIEDAD ANONIMA CERRADA', 'MZA. 246 LOTE. 03 Z.I.  ZONA INDUSTRIAL PIURA  (ESPALDAS DE AGENCIA EPPO)', '2021-03-09 22:24:36'),
(12, 'RUC', '10036888291', 'SOSA MENDOZA ANA MARIA', 'CAL. LA BREA 513 A.H. SANTA TERESITA      ', '2021-03-09 22:25:21'),
(13, 'RUC', '20115886381', 'DOIG CONTRATISTAS GENERALES SRL', 'JR. DOMINGO SAVIO NRO. 175 URB.  ANGAMOS', '2021-03-09 22:26:21'),
(14, 'RUC', '20356922311', 'SEAFROST S.A.C.', 'MZA. D LOTE. 01 Z.I.  II', '2021-03-09 22:26:58'),
(15, 'RUC', '20523552903', 'PETREVEN PERU S.A', 'CAL.MENDIBURU NRO. 878 INT. 602 (878 880)', '2021-03-09 22:27:47'),
(16, 'RUC', '20399222070', 'TURISMO EXPRESO SAMANGA SRLTDA', 'MZA. 247 LOTE. 07 Z.I.  PQ. IN. ZONA  INDUSTRIAL  (ESPALDAS DE DIARIO EL CORREO)', '2021-03-09 22:28:48'),
(17, 'RUC', '20525250041', 'CLINICA SAN JUAN BOSCO Y AGUSTIN S.R.L.', 'AV. JOSE OLAYA NRO. 358 URB.  MIRAFLORES', '2021-03-09 22:29:32'),
(18, 'RUC', '20440928758', 'FACTORIA LIBERTAD SOCIED.COMER.RESP.LTDA', 'CAL.CUZCO NRO. 523', '2021-03-09 22:30:38'),
(19, 'RUC', '20100049857', 'COLD IMPORT S A', 'AV. ANGAMOS OESTE NRO. 686', '2021-03-09 22:33:04'),
(20, 'RUC', '20526176261', 'CLINICA SAN PEDRO APOSTOL S.R.L.', 'AV. GRAU NRO. 636 CENT. MANCORA', '2021-03-09 22:34:15'),
(21, 'RUC', '20603241631', 'GRUPO MEDICO SAN GABRIEL S.A.C.', 'II ETAPA MZA. C LOTE. 09 URB.  MIRAFLORES LADO NORTE  (DETRAS DEL HOTEL MEMOS)', '2021-03-09 22:34:49'),
(22, 'RUC', '20525256082', 'CERAMICOS PIURA S.A.C.', 'AV. RAMON CASTILLA NRO. 151 CERCADO CASTILLA  (II PISO CERCA AL CIVA)', '2021-03-09 22:35:31'),
(23, 'RUC', '20602550363', 'ESPECIALIDADES OFTALMOLOGICAS DR SULCA S.R.L.', 'CAL.LIMA NRO. 365 CENT. PIURA  (DIAGONAL AL COLEGIO DE ABOGADOS)', '2021-03-09 22:36:20'),
(24, 'RUC', '20484251861', 'PRODUCTORA ANDINA DE CONGELADOS S.R.L.', 'CAR.TAMBOGRANDE KM. 2.1 MZA. C LOTE. 05 Z.I.  Z. INDUSTRIAL MUNICIPAL 1', '2021-03-09 22:37:02'),
(25, 'RUC', '20606340924', 'SHIELDEXT S.A.C.', 'MZA. O´ LOTE. 23 INT. 01 URB.  SANTA ANA  (PARALELO AL REAL PLAZA)', '2021-03-09 22:37:39'),
(26, 'RUC', '20398257830', 'IMPEX RICO PEZ SRLTDA', 'III ETAPA MZA. B LOTE. 17 Z.I.  PIURA', '2021-03-09 22:38:03'),
(27, 'RUC', '20603441380', 'FROZEN SOLUTIONS TECH S.A.C.', 'CAL.GRANADA NRO. 128 URB.  MAYORAZGO 2DA ETAPA', '2021-03-09 22:38:28'),
(28, 'RUC', '20606789204', 'LADRILLERA EL MANA S.A.C.', 'MZA. D LOTE. 09 A.H.  CIUDAD DEL SOL', '2021-03-09 22:38:55'),
(29, 'RUC', '20525904424', '\'OFTALMOLOGOS ASOCIADOS VER S.A.C.\'', 'MZA. X LOTE. 17 URB.  MIRAFLORES', '2021-03-09 22:39:49'),
(30, 'RUC', '20526026889', 'AGROINDUSTRIAS Y SERVICIOS GENERALES FAZA E.I.R.L.', 'AV. RAMON CASTILLA MZA. A LOTE. 19 A.H.  VATE MANRIQUE  (FRENTE A VILLA NAZARETH)', '2021-03-09 22:40:21'),
(31, 'RUC', '20603551274', 'CERAMICOS EL ROBLE S.A.C.', 'MZA. B LOTE. 8 C.P.  LUCAS CUTIVALU  (KM 15.5 CARRETERA PIURA PAITA)', '2021-03-09 22:40:51'),
(32, 'RUC', '20184107610', 'SISTEM HIDRAULIC Y REPRES GRALES SRLTDA', 'AV. CESAR VALLEJO NRO. 564 URB.  PIURA', '2021-03-09 22:41:24'),
(33, 'RUC', '10442146468', 'NEIRA CALLE SEGUNDO HORACIO', ' CACERES 101        ', '2021-03-09 22:42:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobante`
--

CREATE TABLE `comprobante` (
  `id_comprobante` int(11) NOT NULL,
  `comprobante` char(80) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comprobante`
--

INSERT INTO `comprobante` (`id_comprobante`, `comprobante`) VALUES
(1, 'Boleta'),
(2, 'Factura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `id_detalleventa` int(11) NOT NULL COMMENT 'PK',
  `id_comprobante` int(11) NOT NULL COMMENT 'Boleta o Factura',
  `serie` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'serie del comprobante',
  `codigo` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'correlativo',
  `id_metodopago` int(11) NOT NULL COMMENT 'Efectivo',
  `id_cliente` int(11) NOT NULL COMMENT 'cliente al que se vende el producto',
  `id_producto` text NOT NULL COMMENT 'Producto',
  `cantidad` int(11) DEFAULT NULL COMMENT 'Cantidad por producto',
  `id_medida` int(11) DEFAULT NULL COMMENT 'Unidad de Medida',
  `precio_venta` float DEFAULT NULL COMMENT 'Precio x Producto',
  `total` float DEFAULT NULL COMMENT 'Total x Producto',
  `id_vendedor` int(11) NOT NULL COMMENT 'El que registra la venta',
  `orden_compra` varchar(150) DEFAULT NULL,
  `subtotal` decimal(10,2) NOT NULL COMMENT 'Subtotal',
  `igv` decimal(10,2) NOT NULL COMMENT 'IGV',
  `total_i` decimal(10,2) NOT NULL COMMENT 'Total del comprobante',
  `id_pago` int(11) NOT NULL COMMENT 'Efectivo[1] Credito[2]',
  `fecha_vencimiento` date NOT NULL COMMENT 'Solo si es venta al credito',
  `fecha_creacion` date NOT NULL,
  `fecha_actualizacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Venta de Gases';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex`
--

CREATE TABLE `kardex` (
  `codigo_transaccion` varchar(15) NOT NULL COMMENT 'Codigo unico de transaccion',
  `id_producto` int(11) NOT NULL COMMENT 'FK Producto',
  `id_operacion` int(11) NOT NULL COMMENT 'Entrada[1] | Salid[2]',
  `id_movimiento` int(11) NOT NULL COMMENT 'Movimiento',
  `id_usuario` int(11) DEFAULT NULL COMMENT 'usuario de la accion',
  `cantidad` int(11) NOT NULL COMMENT 'cantidad a cambiar',
  `fecha_creacion` date NOT NULL COMMENT 'fecha actual del servidor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Graba entradas y salidas de productos al inventario';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodopago`
--

CREATE TABLE `metodopago` (
  `id_metodopago` int(11) NOT NULL,
  `metodopago` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Metodo de pago';

--
-- Volcado de datos para la tabla `metodopago`
--

INSERT INTO `metodopago` (`id_metodopago`, `metodopago`) VALUES
(1, 'Efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id_movimiento` int(11) NOT NULL COMMENT 'llave primaria',
  `movimiento` text NOT NULL COMMENT 'describe movimiento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Motivo de movimientos';

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id_movimiento`, `movimiento`) VALUES
(1, 'Apertura Stock'),
(2, 'Aumento de Stock'),
(3, 'Error Apertura Stock'),
(4, 'Devolucion Producto'),
(5, 'Transferencia entre almacenes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones`
--

CREATE TABLE `operaciones` (
  `id_operacion` int(11) NOT NULL,
  `operacion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Operaciones en el sistema';

--
-- Volcado de datos para la tabla `operaciones`
--

INSERT INTO `operaciones` (`id_operacion`, `operacion`) VALUES
(1, 'entrada'),
(2, 'salida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL COMMENT 'PK',
  `id_categoria` int(11) NOT NULL COMMENT 'categoria',
  `id_unidad` int(11) NOT NULL COMMENT 'Unidad medida del producto',
  `idAlmacen` int(11) NOT NULL COMMENT 'almacen dnde se regsitra',
  `codigo` varchar(25) COLLATE utf8_spanish_ci NOT NULL COMMENT 'codigo unico',
  `nombre` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre del producto',
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'descripcion',
  `stock` int(11) NOT NULL COMMENT 'stock inicial',
  `precio_venta` float NOT NULL COMMENT 'precio de venta',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'fecha de registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Productos a la venta';

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_categoria`, `id_unidad`, `idAlmacen`, `codigo`, `nombre`, `descripcion`, `stock`, `precio_venta`, `fecha_registro`) VALUES
(1, 13, 1, 1, 'gqBsqzZn2e17b', 'Oxigeno Medicinal', 'Oxigeno Medicinal', 984, 59, '2022-01-06 04:13:33'),
(2, 13, 1, 1, 'nDQNtkPFqXa2B', 'Oxigeno Industrial', 'Oxigeno Industrial', 999999, 25, '2022-12-09 15:57:37'),
(3, 13, 1, 1, 'c33T6FCL1ifPS', 'Nitrogeno', 'Nitrogeno', 99999, 25, '2022-12-09 15:57:29'),
(4, 13, 1, 1, 'APKQpaXJMyloE', 'Argon', 'Argon', 9999, 15, '2022-11-14 02:36:48'),
(5, 13, 1, 1, 'eqKptielB24lI', 'Agamix', 'Agamix', 9999, 25, '2022-11-14 02:36:41'),
(6, 13, 1, 1, 'B3TXXkBby0cRk', 'Acetileno', 'Acetileno', 9999, 15, '2022-11-14 02:36:35'),
(7, 13, 1, 1, 'ILCbu31yE2K2U', 'Helio', 'Helio', 9999, 20, '2022-11-14 02:36:29'),
(8, 13, 1, 1, '41nDD99iisVHz', 'producto prueba', 'producto prueba', 9999, 12.959, '2022-12-08 04:40:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL COMMENT 'pk',
  `ruc_proveedor` char(11) CHARACTER SET utf8 NOT NULL COMMENT 'RUC',
  `razon_social` text NOT NULL COMMENT 'razon social',
  `direccion_fiscal` text NOT NULL COMMENT 'direccion',
  `estado_empresa` text NOT NULL COMMENT 'estado empresa',
  `condicion_empresa` text NOT NULL COMMENT 'condicion'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `ruc_proveedor`, `razon_social`, `direccion_fiscal`, `estado_empresa`, `condicion_empresa`) VALUES
(1, '20508879441', 'REPRESENTACIONES Y SERVICIOS ORTEGA SAC', 'JR. HUAROCHIRI NRO. 781 INT. 1', 'ACTIVO', 'HABIDO'),
(2, '20338570041', 'LINDE PERU S.R.L.', 'AV. ALFREDO BENAVIDES NRO. 801 INT. PI11 URB.  MIRAFLORES  (AV.PASEO DE LA REPUBLICA5887 5895,PISO11)', 'ACTIVO', 'HABIDO'),
(3, '20484290173', 'OXIGAS DEL PERU SOCIEDAD COMERCIAL DE RESPONSABILIDAD LIMITADA', 'JR. YAHUAR HUACA NRO. 341 A.H.  CAMPO POLO  (1 CDRA ANTES DE I.E MIGUEL CORTES)', 'ACTIVO', 'HABIDO'),
(4, '20184107610', 'SISTEM HIDRAULIC Y REPRES GRALES SRLTDA', 'AV. CESAR VALLEJO NRO. 564 URB. PIURA', 'ACTIVO', 'HABIDO'),
(5, '20606866420', 'SERVICIOS GENERALES INDUSTRIALES LALO E.I.R.L.', 'JR. COMERCIO NRO. 1266 MONTE SULLON (FRENTE PARQUE LA AMISTAD)', 'ACTIVO', 'HABIDO'),
(6, '10442146468', 'NEIRA CALLE SEGUNDO HORACIO', 'CACERES Num. 101', 'ACTIVO', 'HABIDO'),
(7, '20516367670', 'OXYMAN COMERCIAL S.A.C.', 'PIURA', 'ACTIVO', 'HABIDO'),
(8, '20545673593', 'CRIOGAS S.A.C', 'CAL.MANUEL ARISPE N° 237 URB. CHALACA CALLAO', 'ACTIVO', 'HABIDO'),
(9, '20382072023', 'AIR PRODUCTS PERU S.A.', 'PIURA', 'ACTIVO', 'HABIDO'),
(10, '20557931156', 'DISERVAL S.A.C.', 'AV.NESTOR GAMBETTA MZA. B-21 LOTE 05 CALLAO', 'ACTIVO', 'HABIDO'),
(11, '20607948675', 'INDUSTRIAS CRIOGENICAS DEL PERU', 'MZA. E LOTE S/N PARQ. IND. LAMBAYEQUE-CHICLAYO-PIMENTEL', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_gases`
--

CREATE TABLE `tipo_gases` (
  `id_tipogas` int(11) NOT NULL COMMENT 'PK',
  `codigo` char(4) NOT NULL COMMENT 'codigo',
  `descripcion` varchar(60) NOT NULL COMMENT 'describe gas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tipo de Gases Comercializados';

--
-- Volcado de datos para la tabla `tipo_gases`
--

INSERT INTO `tipo_gases` (`id_tipogas`, `codigo`, `descripcion`) VALUES
(1, '010', 'Oxigeno Industrial'),
(2, '015', 'Oxigeno Medicinal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `id_unidad` int(11) NOT NULL COMMENT 'pk',
  `unidad` text NOT NULL COMMENT 'descripcion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Unidad del Gas';

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`id_unidad`, `unidad`) VALUES
(1, 'M3'),
(2, 'KG'),
(3, 'UND'),
(4, 'lata'),
(5, 'Galon'),
(6, 'caja'),
(7, 'millar'),
(8, 'Lb'),
(9, 'L'),
(10, 'Barril'),
(11, 'mts'),
(12, 'servicio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL COMMENT 'pk',
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'usuario',
  `password` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'contraseña',
  `perfil` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'perfil de usuario',
  `estado` int(11) NOT NULL COMMENT 'activo(1)',
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Usuarios del sistema';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Administrador', 1, '2023-08-13 13:26:41', '2023-08-13 18:26:41'),
(2, 'ADOLFO', 'GCALVO', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG\r\n', 'Administrador', 1, '2021-09-15 22:53:26', '2021-09-16 09:08:05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id_almacen`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cilindros`
--
ALTER TABLE `cilindros`
  ADD PRIMARY KEY (`id_cilindro`),
  ADD KEY `id_almacen` (`id_almacen`),
  ADD KEY `id_tipogas` (`id_tipogas`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `ruc_dni` (`ruc`);

--
-- Indices de la tabla `comprobante`
--
ALTER TABLE `comprobante`
  ADD PRIMARY KEY (`id_comprobante`);

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD PRIMARY KEY (`id_detalleventa`);

--
-- Indices de la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD PRIMARY KEY (`codigo_transaccion`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_operacion` (`id_operacion`);

--
-- Indices de la tabla `metodopago`
--
ALTER TABLE `metodopago`
  ADD PRIMARY KEY (`id_metodopago`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id_movimiento`);

--
-- Indices de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  ADD PRIMARY KEY (`id_operacion`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD UNIQUE KEY `ru_proveedor` (`ruc_proveedor`);

--
-- Indices de la tabla `tipo_gases`
--
ALTER TABLE `tipo_gases`
  ADD PRIMARY KEY (`id_tipogas`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`id_unidad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id_almacen` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cilindros`
--
ALTER TABLE `cilindros`
  MODIFY `id_cilindro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `comprobante`
--
ALTER TABLE `comprobante`
  MODIFY `id_comprobante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  MODIFY `id_detalleventa` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK';

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id_movimiento` int(11) NOT NULL AUTO_INCREMENT COMMENT 'llave primaria', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  MODIFY `id_operacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipo_gases`
--
ALTER TABLE `tipo_gases`
  MODIFY `id_tipogas` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id_unidad` int(11) NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD CONSTRAINT `kardex_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
