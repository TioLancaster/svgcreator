<?php

	include_once('../SVGCreator/Element.php');
	include_once('../SVGCreator/SVGException.php');
	include_once('../SVGCreator/Elements/Rect.php');
	include_once('../SVGCreator/Elements/Group.php');
	include_once('../SVGCreator/Elements/Svg.php');
	include_once('../SVGCreator/Elements/Circle.php');
	include_once('../SVGCreator/Elements/Marker.php');
	include_once('../SVGCreator/Elements/Defs.php');
	include_once('../SVGCreator/Elements/Line.php');
	include_once('../SVGCreator/Elements/Path.php');
	include_once('../SVGCreator/ComplexFigures/LineEndArrow.php');
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

				$complexElement = new \SVGCreator\ComplexFigures\LineEndArrow(5, 10, 155, 235);

				$svg->append($complexElement->getElement());

				echo $svg->getString();
			?>
		</section>
	</body>
</html>