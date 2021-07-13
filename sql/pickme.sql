-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2021 a las 21:58:54
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pickme`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alternativas`
--

CREATE TABLE `alternativas` (
  `idAlternativa` int(111) NOT NULL,
  `nameAlternativa` varchar(100) NOT NULL,
  `urlSitio` tinytext NOT NULL,
  `urlLogo` tinytext NOT NULL,
  `idEncuesta` int(111) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alternativas`
--

INSERT INTO `alternativas` (`idAlternativa`, `nameAlternativa`, `urlSitio`, `urlLogo`, `idEncuesta`) VALUES
(17, 'Cola cao', 'http://www.colacao.es', 'https://es.wikipedia.org/wiki/Archivo:Logo_de_Cola_Cao.jpg', 51),
(18, 'Nike', 'http://www.nike.com', 'https://www.brandemia.org/wp-content/uploads/2011/09/logo_nike_principal.jpg', 70),
(19, 'Adidas', 'https://www.adidas.es/', 'https://1000marcas.net/wp-content/uploads/2019/11/Adidas-logo.png', 70),
(20, 'Puma', 'https://eu.puma.com/es/es/home', 'https://1000marcas.net/wp-content/uploads/2019/12/Puma-Logo.png', 70),
(24, 'Cola cao', 'http://www.colacao.es', 'https://es.wikipedia.org/wiki/Archivo:Logo_de_Cola_Cao.jpg', 69),
(25, 'Nesquik', 'http://www.nesquik.es', 'https://upload.wikimedia.org/wikipedia/commons/4/48/Dell_Logo.svg', 69),
(27, 'PickME Versión A', 'http://www.colacao.es', 'https://upload.wikimedia.org/wikipedia/commons/9/9c/Logo_de_Cola_Cao.jpg', 76),
(28, 'PickME Versión B', 'http://www.nesquik.es', 'https://upload.wikimedia.org/wikipedia/commons/4/48/Dell_Logo.svg', 76),
(29, 'Nike', 'https://www.nike.com/es/', 'https://logos-marcas.com/wp-content/uploads/2020/04/Nike-Logo.png', 78),
(30, 'Adidas', 'https://www.adidas.es/', 'https://logodownload.org/wp-content/uploads/2014/07/adidas-logo.png', 78);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `idEncuesta` int(111) NOT NULL,
  `nameEncuesta` varchar(100) NOT NULL,
  `typeEncuesta` tinytext NOT NULL,
  `sizeEncuesta` int(1) NOT NULL,
  `numencuestados` int(111) DEFAULT 0,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `visible` bit(1) DEFAULT b'1',
  `creador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`idEncuesta`, `nameEncuesta`, `typeEncuesta`, `sizeEncuesta`, `numencuestados`, `fecha`, `visible`, `creador`) VALUES
(1, 'Original', 'destinatarios', 0, 0, '2021-05-03 22:00:00', b'1', 1),
(19, 'Original_copia', 'destinatarios', 0, 0, '2021-05-03 22:00:00', b'1', 1),
(21, 'nueva', 'destinatarios', 0, 0, '2021-05-04 22:00:00', b'1', 1),
(35, 'editable', 'expertos', 0, 0, '2021-05-04 22:00:00', b'0', 1),
(45, 'aaa', 'destinatarios', 0, 0, '2021-05-04 22:00:00', b'1', 1),
(46, 'bbb', 'destinatarios', 0, 0, '2021-05-04 22:00:00', b'1', 1),
(47, 'Marcas de ordenador', 'destinatarios', 0, 0, '2021-05-05 22:00:00', b'1', 1),
(48, 'nuevaaa', 'destinatarios', 0, 0, '2021-05-05 22:00:00', b'1', 1),
(49, '0605', 'destinatarios', 0, 0, '2021-05-05 22:00:00', b'1', 1),
(50, '0607', 'destinatarios', 0, 0, '2021-05-05 22:00:00', b'1', 1),
(51, '0608', 'destinatarios', 0, 0, '2021-05-05 22:00:00', b'1', 1),
(69, 'sada', 'destinatarios', 0, 1, '2021-05-10 22:00:00', b'1', 1),
(70, 'zapatillas', 'destinatarios', 0, 129, '2021-05-14 22:00:00', b'1', 9),
(72, 'Prueba', 'expertos', 0, 0, '2021-05-18 22:00:00', b'1', 9),
(73, 'Prueba_copia', 'expertos', 0, 0, '2021-05-18 22:00:00', b'1', 9),
(74, 'Prueba_copia_copia', 'expertos', 0, 100, '2021-05-18 22:00:00', b'1', 9),
(75, 'Prueba_copia_copia_copia', 'expertos', 0, 0, '2021-05-18 22:00:00', b'1', 9),
(76, 'Autotest sobre PickME', 'destinatarios', 0, 5, '2021-06-05 18:28:10', b'1', 9),
(77, 'fdads', 'destinatarios', 0, 0, '2021-06-30 11:03:31', b'1', 9),
(78, 'ejemplo', 'destinatarios', 0, 2, '2021-06-30 18:13:01', b'1', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestastests`
--

CREATE TABLE `encuestastests` (
  `idEncuesta` int(111) NOT NULL,
  `idTest` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `encuestastests`
--

INSERT INTO `encuestastests` (`idEncuesta`, `idTest`) VALUES
(35, 8),
(46, 1),
(46, 2),
(46, 3),
(46, 4),
(46, 5),
(46, 6),
(46, 7),
(46, 8),
(47, 1),
(47, 3),
(47, 5),
(47, 7),
(50, 1),
(69, 8),
(69, 9),
(70, 1),
(70, 2),
(70, 5),
(70, 6),
(70, 9),
(70, 10),
(76, 1),
(76, 4),
(76, 5),
(76, 8),
(76, 9),
(78, 1),
(78, 3),
(78, 5),
(78, 7),
(78, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `idEtiqueta` int(111) NOT NULL,
  `nameEtiqueta` varchar(111) NOT NULL,
  `numValores` int(111) NOT NULL,
  `output` bit(1) NOT NULL,
  `maxValor` int(111) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`idEtiqueta`, `nameEtiqueta`, `numValores`, `output`, `maxValor`) VALUES
(1, 'ten', 1, b'0', 10),
(2, 'number', 1, b'0', NULL),
(3, 'sus', 5, b'0', 0),
(4, 'small', 3, b'0', 0),
(5, 'medium', 5, b'0', 0),
(6, 'big', 7, b'0', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `idPregunta` int(111) NOT NULL,
  `idTest` int(111) NOT NULL,
  `texto` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`idPregunta`, `idTest`, `texto`) VALUES
(5, 1, 'Creo que me gustará visitar con frecuencia este website'),
(6, 1, 'Encontré el website innecesariamente complejo'),
(7, 1, 'Pensé que era fácil utilizar este website'),
(8, 1, 'Creo que necesitaría del apoyo de un experto para recorrer el website'),
(9, 1, 'Encontré las funciones del website bastante bien integradas'),
(10, 1, 'Pensé que había demasiada inconsistencia en el website'),
(11, 1, 'Imagino que la mayoría de las personas aprenderían muy rápidamente a utilizar el website'),
(12, 1, 'Encontré el website muy grande al recorrerlo'),
(13, 1, 'Me sentí muy confiado en el manejo del website'),
(14, 1, 'Necesito aprender muchas cosas antes de manejarme en el website'),
(73, 2, 'Las características y funcionalidades cumplen objetivos y metas que suele realizar el usuario.'),
(74, 2, 'Las características y la funcionalidad admiten los flujos de trabajo deseados por los usuarios.'),
(75, 2, 'Las tareas de uso frecuente están disponibles (por ejemplo, de fácil acceso desde la página de inicio) y están bien implementadas (por ejemplo, hay accesos directos disponibles).'),
(76, 2, 'Se tiene en cuenta el nivel de habilidad de los usuarios (por ejemplo, atajos para usuarios expertos, ayuda e instrucciones para usuarios principiantes).'),
(77, 2, 'Las llamadas a acciones (por ejemplo, registrarse, añadir a la cesta, enviar) son claras, bien etiquetadas y se puede hacer click sobre ellas.'),
(78, 2, 'La página de inicio / landing proporciona una un aspecto limpio y proporciona una visión general del contenido, las características y las funcionalidades disponibles.'),
(79, 2, 'La página de inicio es eficaz orientando y dirigiendo a los usuarios a la información o tareas deseadas.'),
(80, 2, 'El diseño de la página de inicio es claro y limpio con suficiente espacio en blanco.'),
(81, 2, 'Los usuarios pueden acceder fácilmente al sitio o a la aplicación (por ejemplo, la URL es predecible y es devuelta por los motores de búsqueda).'),
(82, 2, 'El esquema de navegación (por ejemplo, menú) es fácil de encontrar, intuitivo y consistente.'),
(83, 2, 'La navegación tiene suficiente flexibilidad para permitir a los usuarios navegar por los medios deseados (por ejemplo, buscar, navegar por tipo, navegar por su nombre, más reciente, etc...). '),
(84, 2, 'La estructura de sitios o aplicaciones es clara, fácil de entender y permite al usuario cumplir sus objetivos.'),
(85, 2, 'Los enlaces son claros, descriptivos y bien etiquetados.'),
(86, 2, 'Se admiten funciones estándar del navegador (por ejemplo, atrás, adelante, favoritos).'),
(87, 2, 'El lugar donde se encuentra está claramente indicado (por ejemplo, en la ruta de navegación, un elemento de menú resaltado).'),
(88, 2, 'Los usuarios pueden volver fácilmente a la página de inicio o a un punto de inicio relevante.'),
(89, 2, 'Se proporciona un mapa o un índice de sitio claro y bien estructurado (siempre que sea necesario).'),
(90, 2, 'Existe una función de búsqueda, fácil de encontrar y fácil de usar está disponible en todas partes (donde sea deseable).'),
(91, 2, 'La interfaz de búsqueda es adecuada para cumplir con los objetivos de usuario (por ejemplo, multiparametrización, resultados priorizados, filtrado de resultados de búsqueda).'),
(92, 2, 'El servicio de búsqueda se ocupa correctamente de las búsquedas que más se repiten (por ejemplo, mostrando los resultados más populares), errores ortográficos y abreviaturas.'),
(93, 2, 'Los resultados de búsqueda se muestran correctamente, son relevantes, completos y precisos.'),
(94, 2, 'Se lanza una alerta de forma rápida por una acción (por ejemplo, después de una acción correcta o infructuosa).'),
(95, 2, 'Los usuarios pueden deshacer, volver y cambiar o cancelar fácilmente acciones; o al menos se les da la oportunidad de confirmar una acción antes de comprometerse (por ejemplo, antes de realizar un pedido).'),
(96, 2, 'Los usuarios pueden realizar aportaciones fácilmente (por ejemplo, por correo electrónico o un formulario de comentarios / contáctenos).'),
(97, 2, 'Los formularios y procesos complejos se dividen en pasos y secciones fácilmente entendibles. Cuando se realiza un proceso, existe un indicador de progreso con números claros o etapas numeradas.'),
(98, 2, 'Cuando se solicita información, se pide una cantidad minima de la misma, y se justifica su solicitud (por ejemplo, fecha de nacimiento, número de teléfono).'),
(99, 2, 'Los campos de formulario obligatorios y opcionales se indican claramente.'),
(100, 2, 'Se utilizan los campos de entrada adecuados (por ejemplo, un calendario para la selección de fechas, un desplegable para una selección) y se indican los formatos necesarios.'),
(101, 2, 'Cuando sea necesario, se proporciona ayuda e instrucciones (por ejemplo, una tanda de ejemplos, información que se considere necesaria).'),
(102, 2, 'Los errores se muestran claramente, son fácilmente identificables y aparecen en la ubicación adecuada (por ejemplo, adyacente al campo de entrada de datos, adyacente al formulario, etc...).'),
(103, 2, 'Los mensajes de error son concisos, escritos en lenguaje fácil de entender y describen lo que ha ocurrido y qué acción es necesaria para enmendarlos.'),
(104, 2, 'Se han tenido en cuenta los errores comunes del usuario (por ejemplo, campos que faltan, formatos no válidos, selecciones no válidas) y, en la medida de lo posible, se han evitado.'),
(105, 2, 'Los usuarios pueden recuperar un proceso fácilmente (es decir, no tienen que empezar de nuevo) por algún error cometido.'),
(106, 2, 'El contenido disponible (por ejemplo, textos, imágenes, vídeos) es apropiado y suficientemente relevante, y lo suficientemente detallado para el usuario.'),
(107, 2, 'Los enlaces a otros contenidos útiles y relevantes (por ejemplo, páginas relacionadas o sitios web externos) están disponibles y se muestran en contexto.'),
(108, 2, 'El lenguaje, la terminología y el tono utilizados son apropiados y fácilmente comprendidos por el público objetivo.'),
(109, 2, 'Los términos, el idioma y el tono utilizados son consitentes (por ejemplo, se utiliza el mismo término cada vez).'),
(110, 2, 'El texto y el contenido son legibles y escaneables, con buena tipografía y contraste visual correcto.'),
(111, 2, 'Se proporciona ayuda en línea y esta es adecuada para los usuarios (por ejemplo, está escrito en un lenguaje fácil de entender y sólo utiliza términos conocidos).'),
(112, 2, 'La ayuda en línea es concisa, fácil de leer y escrita en un lenguaje fácil de entender.'),
(113, 2, 'Acceder a la ayuda en línea no impide a los usuarios reanudar su trabajo donde lo dejaron tras acceder a la ayuda.'),
(114, 2, 'Los usuarios pueden obtener fácilmente más ayuda (por ejemplo, teléfono o dirección de correo electrónico).'),
(115, 2, 'El rendimiento del sitio o de la aplicación no lastra la experiencia del usuario (por ejemplo, descargas lentas de páginas, retrasos prolongados).'),
(116, 2, 'Los errores y los problemas de confiabilidad no inhiben la experiencia del usuario.'),
(117, 2, 'Se admiten varias configuraciones por parte del usuario (por ejemplo, navegadores, resoluciones específicas, otros dispositivos).'),
(118, 3, 'Las características y funcionalidades cumplen objetivos y metas que suele realizar el usuario.'),
(119, 3, 'Las características y la funcionalidad admiten los flujos de trabajo deseados por los usuarios.'),
(120, 3, 'Las tareas de uso frecuente están disponibles (por ejemplo, de fácil acceso desde la página de inicio) y están bien implementadas (por ejemplo, hay accesos directos disponibles).'),
(121, 3, 'Se tiene en cuenta el nivel de habilidad de los usuarios (por ejemplo, atajos para usuarios expertos, ayuda e instrucciones para usuarios principiantes).'),
(122, 3, 'Las llamadas a acciones (por ejemplo, registrarse, añadir a la cesta, enviar) son claras, bien etiquetadas y se puede hacer click sobre ellas.'),
(123, 3, 'La página de inicio / landing proporciona una un aspecto limpio y proporciona una visión general del contenido, las características y las funcionalidades disponibles.'),
(124, 3, 'La página de inicio es eficaz orientando y dirigiendo a los usuarios a la información o tareas deseadas.'),
(125, 3, 'El diseño de la página de inicio es claro y limpio con suficiente espacio en blanco.'),
(126, 3, 'Los usuarios pueden acceder fácilmente al sitio o a la aplicación (por ejemplo, la URL es predecible y es devuelta por los motores de búsqueda).'),
(127, 3, 'El esquema de navegación (por ejemplo, menú) es fácil de encontrar, intuitivo y consistente.'),
(128, 3, 'La navegación tiene suficiente flexibilidad para permitir a los usuarios navegar por los medios deseados (por ejemplo, buscar, navegar por tipo, navegar por su nombre, más reciente, etc...). '),
(129, 3, 'La estructura de sitios o aplicaciones es clara, fácil de entender y permite al usuario cumplir sus objetivos.'),
(130, 3, 'Los enlaces son claros, descriptivos y bien etiquetados.'),
(131, 3, 'Se admiten funciones estándar del navegador (por ejemplo, atrás, adelante, favoritos).'),
(132, 3, 'El lugar donde se encuentra está claramente indicado (por ejemplo, en la ruta de navegación, un elemento de menú resaltado).'),
(133, 3, 'Los usuarios pueden volver fácilmente a la página de inicio o a un punto de inicio relevante.'),
(134, 3, 'Se proporciona un mapa o un índice de sitio claro y bien estructurado (siempre que sea necesario).'),
(135, 3, 'Existe una función de búsqueda, fácil de encontrar y fácil de usar está disponible en todas partes (donde sea deseable).'),
(136, 3, 'La interfaz de búsqueda es adecuada para cumplir con los objetivos de usuario (por ejemplo, multiparametrización, resultados priorizados, filtrado de resultados de búsqueda).'),
(137, 3, 'El servicio de búsqueda se ocupa correctamente de las búsquedas que más se repiten (por ejemplo, mostrando los resultados más populares), errores ortográficos y abreviaturas.'),
(138, 3, 'Los resultados de búsqueda se muestran correctamente, son relevantes, completos y precisos.'),
(139, 3, 'Se lanza una alerta de forma rápida por una acción (por ejemplo, después de una acción correcta o infructuosa).'),
(140, 3, 'Los usuarios pueden deshacer, volver y cambiar o cancelar fácilmente acciones; o al menos se les da la oportunidad de confirmar una acción antes de comprometerse (por ejemplo, antes de realizar un pedido).'),
(141, 3, 'Los usuarios pueden realizar aportaciones fácilmente (por ejemplo, por correo electrónico o un formulario de comentarios / contáctenos).'),
(142, 3, 'Los formularios y procesos complejos se dividen en pasos y secciones fácilmente entendibles. Cuando se realiza un proceso, existe un indicador de progreso con números claros o etapas numeradas.'),
(143, 3, 'Cuando se solicita información, se pide una cantidad minima de la misma, y se justifica su solicitud (por ejemplo, fecha de nacimiento, número de teléfono).'),
(144, 3, 'Los campos de formulario obligatorios y opcionales se indican claramente.'),
(145, 3, 'Se utilizan los campos de entrada adecuados (por ejemplo, un calendario para la selección de fechas, un desplegable para una selección) y se indican los formatos necesarios.'),
(146, 3, 'Cuando sea necesario, se proporciona ayuda e instrucciones (por ejemplo, una tanda de ejemplos, información que se considere necesaria).'),
(147, 3, 'Los errores se muestran claramente, son fácilmente identificables y aparecen en la ubicación adecuada (por ejemplo, adyacente al campo de entrada de datos, adyacente al formulario, etc...).'),
(148, 3, 'Los mensajes de error son concisos, escritos en lenguaje fácil de entender y describen lo que ha ocurrido y qué acción es necesaria para enmendarlos.'),
(149, 3, 'Se han tenido en cuenta los errores comunes del usuario (por ejemplo, campos que faltan, formatos no válidos, selecciones no válidas) y, en la medida de lo posible, se han evitado.'),
(150, 3, 'Los usuarios pueden recuperar un proceso fácilmente (es decir, no tienen que empezar de nuevo) por algún error cometido.'),
(151, 3, 'El contenido disponible (por ejemplo, textos, imágenes, vídeos) es apropiado y suficientemente relevante, y lo suficientemente detallado para el usuario.'),
(152, 3, 'Los enlaces a otros contenidos útiles y relevantes (por ejemplo, páginas relacionadas o sitios web externos) están disponibles y se muestran en contexto.'),
(153, 3, 'El lenguaje, la terminología y el tono utilizados son apropiados y fácilmente comprendidos por el público objetivo.'),
(154, 3, 'Los términos, el idioma y el tono utilizados son consitentes (por ejemplo, se utiliza el mismo término cada vez).'),
(155, 3, 'El texto y el contenido son legibles y escaneables, con buena tipografía y contraste visual correcto.'),
(156, 3, 'Se proporciona ayuda en línea y esta es adecuada para los usuarios (por ejemplo, está escrito en un lenguaje fácil de entender y sólo utiliza términos conocidos).'),
(157, 3, 'La ayuda en línea es concisa, fácil de leer y escrita en un lenguaje fácil de entender.'),
(158, 3, 'Acceder a la ayuda en línea no impide a los usuarios reanudar su trabajo donde lo dejaron tras acceder a la ayuda.'),
(159, 3, 'Los usuarios pueden obtener fácilmente más ayuda (por ejemplo, teléfono o dirección de correo electrónico).'),
(160, 3, 'El rendimiento del sitio o de la aplicación no lastra la experiencia del usuario (por ejemplo, descargas lentas de páginas, retrasos prolongados).'),
(161, 3, 'Los errores y los problemas de confiabilidad no inhiben la experiencia del usuario.'),
(162, 3, 'Se admiten varias configuraciones por parte del usuario (por ejemplo, navegadores, resoluciones específicas, otros dispositivos).'),
(163, 4, 'Las características y funcionalidades cumplen objetivos y metas que suele realizar el usuario.'),
(164, 4, 'Las características y la funcionalidad admiten los flujos de trabajo deseados por los usuarios.'),
(165, 4, 'Las tareas de uso frecuente están disponibles (por ejemplo, de fácil acceso desde la página de inicio) y están bien implementadas (por ejemplo, hay accesos directos disponibles).'),
(166, 4, 'Se tiene en cuenta el nivel de habilidad de los usuarios (por ejemplo, atajos para usuarios expertos, ayuda e instrucciones para usuarios principiantes).'),
(167, 4, 'Las llamadas a acciones (por ejemplo, registrarse, añadir a la cesta, enviar) son claras, bien etiquetadas y se puede hacer click sobre ellas.'),
(168, 4, 'La página de inicio / landing proporciona una un aspecto limpio y proporciona una visión general del contenido, las características y las funcionalidades disponibles.'),
(169, 4, 'La página de inicio es eficaz orientando y dirigiendo a los usuarios a la información o tareas deseadas.'),
(170, 4, 'El diseño de la página de inicio es claro y limpio con suficiente espacio en blanco.'),
(171, 4, 'Los usuarios pueden acceder fácilmente al sitio o a la aplicación (por ejemplo, la URL es predecible y es devuelta por los motores de búsqueda).'),
(172, 4, 'El esquema de navegación (por ejemplo, menú) es fácil de encontrar, intuitivo y consistente.'),
(173, 4, 'La navegación tiene suficiente flexibilidad para permitir a los usuarios navegar por los medios deseados (por ejemplo, buscar, navegar por tipo, navegar por su nombre, más reciente, etc...). '),
(174, 4, 'La estructura de sitios o aplicaciones es clara, fácil de entender y permite al usuario cumplir sus objetivos.'),
(175, 4, 'Los enlaces son claros, descriptivos y bien etiquetados.'),
(176, 4, 'Se admiten funciones estándar del navegador (por ejemplo, atrás, adelante, favoritos).'),
(177, 4, 'El lugar donde se encuentra está claramente indicado (por ejemplo, en la ruta de navegación, un elemento de menú resaltado).'),
(178, 4, 'Los usuarios pueden volver fácilmente a la página de inicio o a un punto de inicio relevante.'),
(179, 4, 'Se proporciona un mapa o un índice de sitio claro y bien estructurado (siempre que sea necesario).'),
(180, 4, 'Existe una función de búsqueda, fácil de encontrar y fácil de usar está disponible en todas partes (donde sea deseable).'),
(181, 4, 'La interfaz de búsqueda es adecuada para cumplir con los objetivos de usuario (por ejemplo, multiparametrización, resultados priorizados, filtrado de resultados de búsqueda).'),
(182, 4, 'El servicio de búsqueda se ocupa correctamente de las búsquedas que más se repiten (por ejemplo, mostrando los resultados más populares), errores ortográficos y abreviaturas.'),
(183, 4, 'Los resultados de búsqueda se muestran correctamente, son relevantes, completos y precisos.'),
(184, 4, 'Se lanza una alerta de forma rápida por una acción (por ejemplo, después de una acción correcta o infructuosa).'),
(185, 4, 'Los usuarios pueden deshacer, volver y cambiar o cancelar fácilmente acciones; o al menos se les da la oportunidad de confirmar una acción antes de comprometerse (por ejemplo, antes de realizar un pedido).'),
(186, 4, 'Los usuarios pueden realizar aportaciones fácilmente (por ejemplo, por correo electrónico o un formulario de comentarios / contáctenos).'),
(187, 4, 'Los formularios y procesos complejos se dividen en pasos y secciones fácilmente entendibles. Cuando se realiza un proceso, existe un indicador de progreso con números claros o etapas numeradas.'),
(188, 4, 'Cuando se solicita información, se pide una cantidad minima de la misma, y se justifica su solicitud (por ejemplo, fecha de nacimiento, número de teléfono).'),
(189, 4, 'Los campos de formulario obligatorios y opcionales se indican claramente.'),
(190, 4, 'Se utilizan los campos de entrada adecuados (por ejemplo, un calendario para la selección de fechas, un desplegable para una selección) y se indican los formatos necesarios.'),
(191, 4, 'Cuando sea necesario, se proporciona ayuda e instrucciones (por ejemplo, una tanda de ejemplos, información que se considere necesaria).'),
(192, 4, 'Los errores se muestran claramente, son fácilmente identificables y aparecen en la ubicación adecuada (por ejemplo, adyacente al campo de entrada de datos, adyacente al formulario, etc...).'),
(193, 4, 'Los mensajes de error son concisos, escritos en lenguaje fácil de entender y describen lo que ha ocurrido y qué acción es necesaria para enmendarlos.'),
(194, 4, 'Se han tenido en cuenta los errores comunes del usuario (por ejemplo, campos que faltan, formatos no válidos, selecciones no válidas) y, en la medida de lo posible, se han evitado.'),
(195, 4, 'Los usuarios pueden recuperar un proceso fácilmente (es decir, no tienen que empezar de nuevo) por algún error cometido.'),
(196, 4, 'El contenido disponible (por ejemplo, textos, imágenes, vídeos) es apropiado y suficientemente relevante, y lo suficientemente detallado para el usuario.'),
(197, 4, 'Los enlaces a otros contenidos útiles y relevantes (por ejemplo, páginas relacionadas o sitios web externos) están disponibles y se muestran en contexto.'),
(198, 4, 'El lenguaje, la terminología y el tono utilizados son apropiados y fácilmente comprendidos por el público objetivo.'),
(199, 4, 'Los términos, el idioma y el tono utilizados son consitentes (por ejemplo, se utiliza el mismo término cada vez).'),
(200, 4, 'El texto y el contenido son legibles y escaneables, con buena tipografía y contraste visual correcto.'),
(201, 4, 'Se proporciona ayuda en línea y esta es adecuada para los usuarios (por ejemplo, está escrito en un lenguaje fácil de entender y sólo utiliza términos conocidos).'),
(202, 4, 'La ayuda en línea es concisa, fácil de leer y escrita en un lenguaje fácil de entender.'),
(203, 4, 'Acceder a la ayuda en línea no impide a los usuarios reanudar su trabajo donde lo dejaron tras acceder a la ayuda.'),
(204, 4, 'Los usuarios pueden obtener fácilmente más ayuda (por ejemplo, teléfono o dirección de correo electrónico).'),
(205, 4, 'El rendimiento del sitio o de la aplicación no lastra la experiencia del usuario (por ejemplo, descargas lentas de páginas, retrasos prolongados).'),
(206, 4, 'Los errores y los problemas de confiabilidad no inhiben la experiencia del usuario.'),
(207, 4, 'Se admiten varias configuraciones por parte del usuario (por ejemplo, navegadores, resoluciones específicas, otros dispositivos).'),
(211, 9, '¿Qué posibilidades hay de que recomiende este producto a un amigo o colega?'),
(254, 6, 'Cómo considera la diferencia de contraste entre los rótulos de la pagina y el lugar donde se encuentran.\r\n'),
(255, 7, 'Cómo considera la diferencia de contraste entre los rótulos de la pagina y el lugar donde se encuentran.\r\n'),
(256, 8, 'Cómo considera la diferencia de contraste entre los rótulos de la pagina y el lugar donde se encuentran.\r\n'),
(257, 6, 'Cómo considera la diferencia entre la barra o los elementos de navegación respecto al contenido estático de la web.\r\n'),
(258, 7, 'Cómo considera la diferencia entre la barra o los elementos de navegación respecto al contenido estático de la web.\r\n'),
(259, 8, 'Cómo considera la diferencia entre la barra o los elementos de navegación respecto al contenido estático de la web.\r\n'),
(260, 6, 'Cómo considera la diferencia de contraste entre el contraste entre los párrafos y el fondo de los mismos.\r\n'),
(261, 7, 'Cómo considera la diferencia de contraste entre el contraste entre los párrafos y el fondo de los mismos.\r\n'),
(262, 8, 'Cómo considera la diferencia de contraste entre el contraste entre los párrafos y el fondo de los mismos.\r\n'),
(263, 6, 'Cómo considera la diferencia de contraste entre los marcos de los elementos multimedia y el resto del contenido.\r\n'),
(264, 7, 'Cómo considera la diferencia de contraste entre los marcos de los elementos multimedia y el resto del contenido.\r\n'),
(265, 8, 'Cómo considera la diferencia de contraste entre los marcos de los elementos multimedia y el resto del contenido.\r\n'),
(266, 6, 'Cómo considera la diferencia de contraste entre los iconos y los elementos contextuales donde se sitúan.\r\n'),
(267, 7, 'Cómo considera la diferencia de contraste entre los iconos y los elementos contextuales donde se sitúan.\r\n'),
(268, 8, 'Cómo considera la diferencia de contraste entre los iconos y los elementos contextuales donde se sitúan.\r\n'),
(269, 6, 'Cómo considera la diferencia de contraste entre los botones y los textos que se incluyen en ellos.\r\n'),
(270, 7, 'Cómo considera la diferencia de contraste entre los botones y los textos que se incluyen en ellos.\r\n'),
(271, 8, 'Cómo considera la diferencia de contraste entre los botones y los textos que se incluyen en ellos.\r\n'),
(272, 6, 'Cómo considera la diferencia de contraste entre los separadores y los elementos que intenta dividir.\r\n'),
(273, 7, 'Cómo considera la diferencia de contraste entre los separadores y los elementos que intenta dividir.\r\n'),
(274, 8, 'Cómo considera la diferencia de contraste entre los separadores y los elementos que intenta dividir.\r\n'),
(275, 6, 'Cómo considera la diferencia de contraste entre los efectos interactivos/animados de la página.\r\n'),
(276, 7, 'Cómo considera la diferencia de contraste entre los efectos interactivos/animados de la página.\r\n'),
(277, 8, 'Cómo considera la diferencia de contraste entre los efectos interactivos/animados de la página.\r\n'),
(278, 6, 'Cómo considera la diferencia de contraste entre el pie de página y el resto de la página.\r\n'),
(279, 7, 'Cómo considera la diferencia de contraste entre el pie de página y el resto de la página.\r\n'),
(280, 8, 'Cómo considera la diferencia de contraste entre el pie de página y el resto de la página.\r\n'),
(281, 6, 'Cómo considera la diferencia entre el fondo de pantalla del website y el resto de elementos inmediatamente superiores.\r\n'),
(282, 7, 'Cómo considera la diferencia entre el fondo de pantalla del website y el resto de elementos inmediatamente superiores.\r\n'),
(283, 8, 'Cómo considera la diferencia entre el fondo de pantalla del website y el resto de elementos inmediatamente superiores.\r\n'),
(287, 5, '¿Qué número de errores ha obtenido en el test WAVE?\r\n'),
(288, 5, '¿Qué número de alertas ha obtenido en el test WAVE?\r\n'),
(289, 5, '¿Qué número de características especiales ha obtenido en el test WAVE?\r\n'),
(303, 10, 'Maximo 1\r\n'),
(304, 10, 'Maximo 2\r\n'),
(305, 10, 'Maximo 3\r\n'),
(306, 10, 'Maximo 4\r\n'),
(307, 10, 'Maximo 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `idRespuesta` int(111) NOT NULL,
  `idEncuesta` int(111) NOT NULL,
  `idTest` int(111) NOT NULL,
  `idAlternativa` int(111) NOT NULL,
  `idUsers` int(11) DEFAULT NULL,
  `resultado` decimal(10,0) NOT NULL,
  `elementos` tinytext DEFAULT NULL,
  `rol` varchar(40) NOT NULL DEFAULT 'Predeterminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`idRespuesta`, `idEncuesta`, `idTest`, `idAlternativa`, `idUsers`, `resultado`, `elementos`, `rol`) VALUES
(206, 70, 1, 18, 9, '53', 'Marginal', 'Predeterminado'),
(207, 70, 1, 19, 9, '50', 'Marginal', 'Predeterminado'),
(208, 70, 1, 20, 9, '45', 'Marginal', 'Predeterminado'),
(221, 70, 5, 18, 9, '38', 'Muy mejorable', 'Predeterminado'),
(222, 70, 5, 19, 9, '81', 'Excepcional', 'Predeterminado'),
(223, 70, 5, 20, 9, '100', 'Excepcional', 'Predeterminado'),
(224, 70, 2, 18, 9, '72', 'Buena', 'Predeterminado'),
(225, 70, 2, 19, 9, '68', 'Moderada', 'Predeterminado'),
(226, 70, 2, 20, 9, '60', 'Moderada', 'Predeterminado'),
(227, 70, 6, 18, 9, '97', 'Excelente', 'Predeterminado'),
(228, 70, 6, 19, 9, '70', 'Buena', 'Predeterminado'),
(229, 70, 6, 20, 9, '37', 'Pobre', 'Predeterminado'),
(262, 70, 9, 18, 9, '90', NULL, 'Predeterminado'),
(263, 70, 9, 19, 9, '100', NULL, 'Predeterminado'),
(264, 70, 9, 20, 9, '50', NULL, 'Predeterminado'),
(265, 70, 1, 18, 2, '50', 'Marginal', 'Predeterminado'),
(266, 70, 1, 19, 2, '50', 'Marginal', 'Predeterminado'),
(267, 70, 1, 20, 2, '50', 'Marginal', 'Predeterminado'),
(268, 70, 2, 18, 2, '67', 'Moderada', 'Predeterminado'),
(269, 70, 2, 19, 2, '67', 'Moderada', 'Predeterminado'),
(270, 70, 2, 20, 2, '67', 'Moderada', 'Predeterminado'),
(271, 70, 5, 18, 2, '75', 'Excepcional', 'Predeterminado'),
(272, 70, 5, 19, 2, '75', 'Excepcional', 'Predeterminado'),
(273, 70, 5, 20, 2, '75', 'Excepcional', 'Predeterminado'),
(274, 70, 6, 18, 2, '67', 'Moderada', 'Predeterminado'),
(275, 70, 6, 19, 2, '67', 'Moderada', 'Predeterminado'),
(276, 70, 6, 20, 2, '67', 'Moderada', 'Predeterminado'),
(318, 70, 9, 18, 10, '100', NULL, 'Predeterminado'),
(319, 70, 9, 19, 10, '0', NULL, 'Predeterminado'),
(320, 70, 9, 20, 10, '50', NULL, 'Predeterminado'),
(321, 70, 6, 18, 10, '100', 'Excelente', 'Predeterminado'),
(322, 70, 6, 19, 10, '67', 'Moderada', 'Predeterminado'),
(323, 70, 6, 20, 10, '33', 'Muy pobre', 'Predeterminado'),
(324, 70, 5, 18, 10, '38', 'Muy mejorable', 'Predeterminado'),
(325, 70, 5, 19, 10, '81', 'Excepcional', 'Predeterminado'),
(326, 70, 5, 20, 10, '100', 'Excepcional', 'Predeterminado'),
(327, 70, 2, 18, 10, '100', 'Excelente', 'Predeterminado'),
(328, 70, 2, 19, 10, '67', 'Moderada', 'Predeterminado'),
(329, 70, 2, 20, 10, '33', 'Pobre', 'Predeterminado'),
(363, 70, 1, 18, 10, '88', 'Aceptable tipo A', 'Predeterminado'),
(364, 70, 1, 19, 10, '83', 'Aceptable tipo A', 'Predeterminado'),
(365, 70, 1, 20, 10, '50', 'Marginal', 'Predeterminado'),
(366, 70, 10, 18, 9, '59', 'Moderada', 'Predeterminado'),
(367, 70, 10, 19, 9, '65', 'Moderada', 'Predeterminado'),
(368, 70, 10, 20, 9, '66', 'Moderada', 'Predeterminado'),
(369, 76, 1, 27, 9, '50', 'Marginal', 'Predeterminado'),
(370, 76, 1, 28, 9, '55', 'Marginal', 'Predeterminado'),
(371, 76, 4, 27, 9, '57', 'Moderada', 'Predeterminado'),
(372, 76, 4, 28, 9, '57', 'Moderada', 'Predeterminado'),
(373, 76, 5, 27, 9, '74', 'Buena', 'Predeterminado'),
(374, 76, 5, 28, 9, '75', 'Buena', 'Predeterminado'),
(375, 76, 8, 27, 9, '70', 'Buena', 'Predeterminado'),
(376, 76, 8, 28, 9, '74', 'Buena', 'Predeterminado'),
(377, 76, 9, 27, 9, '90', NULL, 'Predeterminado'),
(378, 76, 9, 28, 9, '80', NULL, 'Predeterminado'),
(379, 78, 9, 29, 9, '10', NULL, 'Especialista'),
(380, 78, 9, 30, 9, '20', NULL, 'Especialista'),
(381, 78, 5, 29, 9, '75', 'Buena', 'Predeterminado'),
(382, 78, 5, 30, 9, '75', 'Excepcional', 'Predeterminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tests`
--

CREATE TABLE `tests` (
  `idTest` int(111) NOT NULL,
  `nameTest` varchar(100) NOT NULL,
  `descripcionTest` tinytext NOT NULL,
  `tipoTest` tinytext DEFAULT NULL,
  `idEtiqueta` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tests`
--

INSERT INTO `tests` (`idTest`, `nameTest`, `descripcionTest`, `tipoTest`, `idEtiqueta`) VALUES
(1, 'SUS', 'La escala de usabilidad del sistema (SUS) proporciona una herramienta confiable para medir la usabilidad, consiste en un cuestionario con varias opciones de respuesta para los encuestados.', 'destinatarios', 3),
(2, 'Encuesta Usabilidad pequeno', 'Un test de usabilidad web es una evaluación que te permite saber cuán eficiente y satisfactorio es tu sitio web para el usuario cuando lo visita. Esto se reduce a aspectos como su simplicidad, coherencia y accesibilidad, en general, el objetivo es conoc', 'destinatarios', 4),
(3, 'Encuesta Usabilidad mediano', 'Un test de usabilidad web es una evaluación que te permite saber cuán eficiente y satisfactorio es tu sitio web para el usuario cuando lo visita. Esto se reduce a aspectos como su simplicidad, coherencia y accesibilidad, en general, el objetivo es conoc', 'destinatarios', 5),
(4, 'Encuesta Usabilidad grande', 'Un test de usabilidad web es una evaluación que te permite saber cuán eficiente y satisfactorio es tu sitio web para el usuario cuando lo visita. Esto se reduce a aspectos como su simplicidad, coherencia y accesibilidad, en general, el objetivo es conoc', 'destinatarios', 6),
(5, 'Wave', 'WAVE es un conjunto de herramientas de evaluación que ayuda a identificar los elementos más problematicos para la accesibilidad de personas con discapacidades.', 'expertos', 5),
(6, 'Contraste pequeno', 'El test de contraste es un test que mide el uso adecuado de colores y de representación de la interfaz con especial atención en que puedan hacer uso del sistema personas con algún tipo de discapacidad visual.', 'expertos', 4),
(7, 'Contraste mediano', 'El test de contraste es un test que mide el uso adecuado de colores y de representación de la interfaz con especial atención en que puedan hacer uso del sistema personas con algún tipo de discapacidad visual.', 'expertos', 5),
(8, 'Contraste grande', 'El test de contraste es un test que mide el uso adecuado de colores y de representación de la interfaz con especial atención en que puedan hacer uso del sistema personas con algún tipo de discapacidad visual.', 'expertos', 6),
(9, 'NPS', 'El Net Promoter Score mide con que asiduidad es recomendado su producto, haciendo especial hincapié en quien puede llegar a ser un potencial promotor o detractor del mismo.', 'destinatarios', 1),
(10, 'MaximoTest', 'Es una prueba', 'destinatarios', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testsetiquetas`
--

CREATE TABLE `testsetiquetas` (
  `idTest` int(111) NOT NULL,
  `idEtiqueta` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `testsetiquetas`
--

INSERT INTO `testsetiquetas` (`idTest`, `idEtiqueta`) VALUES
(1, 3),
(2, 4),
(3, 5),
(4, 6),
(5, 2),
(6, 4),
(7, 5),
(8, 6),
(9, 1),
(10, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` varchar(100) NOT NULL,
  `emailUsers` varchar(100) NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `privilegio` int(11) DEFAULT 1,
  `conocimiento` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`, `privilegio`, `conocimiento`) VALUES
(1, 'alex', 'alex@correo.es', '$2y$10$NT0C/VTfPsyWmdrLusMiAex/FLVSc3ImwCKVX9eYfxPEMGeIjxLr6', 3, 1),
(2, 'rosana', 'rosana@ugr.es', '$2y$10$CsBWsxIttqPq4LHxvGAu2ufLr/.lyxlZhzIF1CGwg7ktWgUFgIt2S', 2, 1),
(5, 'a', 'a@correo.es', '$2y$10$rVb4PUv6b28KdBKFK/RYXOYJCEbPtb95l.Mma4W.rGPwuTlj3kQBe', 1, 1),
(9, 'test', 'test@ugr.es', '$2y$10$570JuYuTQLo4yPPC4.grhu70hGxNJ7JJjD.M.xXwVuR0Wc5SvP2Ga', 3, 1),
(10, 'paco', 'paco@ugr.es', '$2y$10$2yulZOs1gadPVOCQulNf7e52KfIOsBxjSWsthoU8IslhT/SSWTzru', 1, 1),
(11, 'a2', 'a2@correo.es', '$2y$10$Sp5SJWHKUya4uQCeitSV6eBKYm8i.gcOWr1EhoX2ZiOTNTmBOcsu.', 1, 1),
(12, 'a2a', 'a2a@correo.es', '$2y$10$BX73S9wsscAOSxkQyJPQ1u36ulhAPRRKNnTcxviHv/h4iEC.38clu', 1, 1),
(13, 'nuevousuario', 'nuevousuario@hotmail.es', '$2y$10$z5KoZ05.tDXPk7xxljqwWOX.I98J2kS4lCPaYi4aPcxPAHZ7zXYJy', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alternativas`
--
ALTER TABLE `alternativas`
  ADD PRIMARY KEY (`idAlternativa`),
  ADD KEY `alternativas_ibfk_1` (`idEncuesta`);

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`idEncuesta`),
  ADD UNIQUE KEY `nameEncuesta` (`nameEncuesta`),
  ADD KEY `encuestas_ibfk_1` (`creador`);

--
-- Indices de la tabla `encuestastests`
--
ALTER TABLE `encuestastests`
  ADD PRIMARY KEY (`idEncuesta`,`idTest`),
  ADD KEY `encuestastests_ibfk_2` (`idTest`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`idEtiqueta`),
  ADD UNIQUE KEY `nameEtiqueta` (`nameEtiqueta`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`idPregunta`,`idTest`),
  ADD KEY `preguntas_ibfk_1` (`idTest`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`idRespuesta`,`idEncuesta`,`idTest`),
  ADD KEY `respuestas_ibfk_1` (`idTest`),
  ADD KEY `respuestas_ibfk_2` (`idEncuesta`),
  ADD KEY `respuestas_ibfk_3` (`idAlternativa`);

--
-- Indices de la tabla `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`idTest`),
  ADD UNIQUE KEY `nameTest` (`nameTest`),
  ADD KEY `idEtiqueta` (`idEtiqueta`);

--
-- Indices de la tabla `testsetiquetas`
--
ALTER TABLE `testsetiquetas`
  ADD PRIMARY KEY (`idTest`,`idEtiqueta`),
  ADD KEY `testsetiquetas_ibfk_2` (`idEtiqueta`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`),
  ADD UNIQUE KEY `uidUsers` (`uidUsers`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alternativas`
--
ALTER TABLE `alternativas`
  MODIFY `idAlternativa` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `idEncuesta` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `idEtiqueta` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `idPregunta` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `idRespuesta` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=383;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alternativas`
--
ALTER TABLE `alternativas`
  ADD CONSTRAINT `alternativas_ibfk_1` FOREIGN KEY (`idEncuesta`) REFERENCES `encuestas` (`idEncuesta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD CONSTRAINT `encuestas_ibfk_1` FOREIGN KEY (`creador`) REFERENCES `users` (`idUsers`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `encuestastests`
--
ALTER TABLE `encuestastests`
  ADD CONSTRAINT `encuestastests_ibfk_1` FOREIGN KEY (`idEncuesta`) REFERENCES `encuestas` (`idEncuesta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `encuestastests_ibfk_2` FOREIGN KEY (`idTest`) REFERENCES `tests` (`idTest`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`idTest`) REFERENCES `tests` (`idTest`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`idTest`) REFERENCES `tests` (`idTest`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respuestas_ibfk_2` FOREIGN KEY (`idEncuesta`) REFERENCES `encuestas` (`idEncuesta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respuestas_ibfk_3` FOREIGN KEY (`idAlternativa`) REFERENCES `alternativas` (`idAlternativa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_ibfk_1` FOREIGN KEY (`idEtiqueta`) REFERENCES `etiquetas` (`idEtiqueta`);

--
-- Filtros para la tabla `testsetiquetas`
--
ALTER TABLE `testsetiquetas`
  ADD CONSTRAINT `testsetiquetas_ibfk_1` FOREIGN KEY (`idTest`) REFERENCES `tests` (`idTest`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `testsetiquetas_ibfk_2` FOREIGN KEY (`idEtiqueta`) REFERENCES `etiquetas` (`idEtiqueta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
