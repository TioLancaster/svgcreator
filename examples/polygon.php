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
	include_once('../src/SVGCreator/Elements/Text.php');
	include_once('../src/SVGCreator/Elements/Polygon.php');

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Polygon Example</title>
	</head>

	<body>
		<section>
			<?php
				$attributesSvg = array(
							'width' => 1000,
							'height' => 1000
						  );

				$svg = new \SVGCreator\Elements\Svg($attributesSvg);

				$svg->append(\SVGCreator\Element::POLYGON)
					->attr('fill', 'red')
					->attr('stroke', 'blue')
					->attr('points', '100,200 300,50 400,40')
					->attr('transform', 'rotate(45,100,200)');

				$svg->append(\SVGCreator\Element::CIRCLE)
					->attr('cx', 450)
					->attr('cy', 350)
					->attr('fill', 'green')
					->attr('r', 20)
					->attr('stroke', 'cyan')
					->attr('stroke-width', '5px');

				echo $svg->getString();
			?>
		</section>
	</body>
</html>