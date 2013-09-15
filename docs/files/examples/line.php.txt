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
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Line Example</title>
	</head>

	<body>
		<section>
			<?php
				$attributesSvg = array(
							'width' => 1000,
							'height' => 1000
						  );

				$svg = new \SVGCreator\Elements\Svg($attributesSvg);

				$svg->append(\SVGCreator\Element::LINE)
					->attr('x1', 100)
					->attr('y1', 100)
					->attr('x2', 325)
					->attr('y2', 250)
					->attr('stroke', 'blue');

				$circle = new \SVGCreator\Elements\Circle();

				$circle->attr('cx', 250)
					->attr('cy', 140)
					->attr('fill', 'green')
					->attr('r', 20)
					->attr('stroke', 'cyan')
					->attr('stroke-width', '5px');

				$svg->append($circle);

				echo $svg->getString();
			?>
		</section>
	</body>
</html>
