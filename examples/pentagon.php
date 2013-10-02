<?php

	include_once('../src/SVGCreator/Element.php');
	include_once('../src/SVGCreator/SVGException.php');
	include_once('../src/SVGCreator/Elements/Rect.php');
	include_once('../src/SVGCreator/Elements/Group.php');
	include_once('../src/SVGCreator/Elements/Svg.php');
	include_once('../src/SVGCreator/Elements/Circle.php');
	include_once('../src/SVGCreator/Elements/Marker.php');
	include_once('../src/SVGCreator/Elements/Defs.php');
	include_once('../src/SVGCreator/Elements/Line.php');
	include_once('../src/SVGCreator/Elements/Path.php');
	include_once('../src/SVGCreator/Elements/Polygon.php');
	include_once('../src/SVGCreator/ComplexFigures/ComplexPolygon.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Complex Examples</title>
	</head>

	<body>
		<section>
			<?php
				$attributesSvg = array(
							'width' => 1000,
							'height' => 1000
						  );

				$svg = new \SVGCreator\Elements\Svg($attributesSvg);

				$attributesComplex = array(
											'fill' => 'red',
											'stroke' => 'blue'
											);

				// Triangle
				$complexElement = new \SVGCreator\ComplexFigures\ComplexPolygon(50, 50, 50, 3, $attributesComplex);

				$svg->append($complexElement->getElement());

				// Square
				$complexElement = new \SVGCreator\ComplexFigures\ComplexPolygon(125, 125, 50, 4, $attributesComplex);
				$svg->append($complexElement->getElement());

				// Square rotated
				$attributesComplex = array(
											'fill' => 'red',
											'stroke' => 'blue',
											'transform' => 'rotate(-45, 125, 125)'
											);
				$complexElement = new \SVGCreator\ComplexFigures\ComplexPolygon(250, 250, 50, 4, $attributesComplex);
				$svg->append($complexElement->getElement());

				// Pentagon
				$attributesComplex = array(
											'fill' => 'red',
											'stroke' => 'blue'
											);
				$complexElement = new \SVGCreator\ComplexFigures\ComplexPolygon(50, 250, 50, 5, $attributesComplex);

				$svg->append($complexElement->getElement());

				// Hexagon
				$complexElement = new \SVGCreator\ComplexFigures\ComplexPolygon(200, 250, 50, 6, $attributesComplex);
				$svg->append($complexElement->getElement());

				// Octagon
				$complexElement = new \SVGCreator\ComplexFigures\ComplexPolygon(400, 250, 50, 8, $attributesComplex);
				$svg->append($complexElement->getElement());

				echo $svg->getString();
			?>
		</section>
	</body>
</html>