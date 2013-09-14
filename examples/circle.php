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
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Circle Example</title>
	</head>

	<body>
		<section>
			<?php
				$attributesSvg = array(
							'width' => 1000,
							'height' => 1000
						  );

				$svg = new \SVGCreator\Elements\Svg($attributesSvg);

				$svg->append(\SVGCreator\Element::CIRCLE)
					->attr('cx', 100)
					->attr('cy', 100)
					->attr('fill', '#ff0000')
					->attr('r', 50)
					->attr('stroke', '#000000')
					->attr('stroke-width', '5px');

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