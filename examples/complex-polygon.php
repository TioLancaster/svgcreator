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

				$complexElement = new \SVGCreator\ComplexFigures\ComplexPolygon(150, 150, 30, 5, array(
					"fill" => "#6aa84f"
					));

				$svg->append($complexElement->getElement());

				$complexElement = new \SVGCreator\ComplexFigures\ComplexPolygon(400, 400, 50, 10, array(
					"fill" => "#ff0000"
					));

				$svg->append($complexElement->getElement());

				$complexElement = new \SVGCreator\ComplexFigures\ComplexPolygon(150, 800, 40, 3, array(
					"fill" => "#00ffff"
					));

				$svg->append($complexElement->getElement());

				echo $svg->getString();
			?>
		</section>
	</body>
</html>