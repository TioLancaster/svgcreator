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
		<title>Rect Example</title>
	</head>

	<body>
		<section>
			<?php
				$attributesSvg = array(
							'width' => 1000,
							'height' => 1000
						  );

				$svg = new \SVGCreator\Elements\Svg($attributesSvg);

				$svg->append(\SVGCreator\Element::RECT)
					->attr('width', 25)
					->attr('height', 10)
					->attr('style', 'fill:rgb(0,0,255);')
					->attr('x', 50)
					->attr('y', 60);

				$svg->append(new \SVGCreator\Elements\Rect())
					->attr('width', 45)
					->attr('height', 40)
					->attr('fill', '#ff0000')
					->attr('x', 300)
					->attr('y', 250);

				echo $svg->getString();
			?>
		</section>
	</body>
</html>