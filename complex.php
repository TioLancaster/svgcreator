<?php

	include_once('SVGCreator/Element.php');
	include_once('SVGCreator/Elements/Rect.php');
	include_once('SVGCreator/Elements/Group.php');
	include_once('SVGCreator/Elements/Svg.php');
	include_once('SVGCreator/Elements/Circle.php');
	include_once('SVGCreator/Elements/Marker.php');
	include_once('SVGCreator/Elements/Defs.php');
	include_once('SVGCreator/Elements/Line.php');
	include_once('SVGCreator/Elements/Path.php');
	include_once('SVGCreator/ComplexFigures/LineEndArrow.php');


	$attributesSvg = array(
							'width' => 1000,
							'height' => 1000
						  );

	$svg = new \SVGCreator\Elements\Svg($attributesSvg);

	$lineEndArrow = new \SVGCreator\ComplexFigures\LineEndArrow(20, 60, 250, 500);

	$svg->append($lineEndArrow->getElement());

	$elementString = $svg->getString();
	$svg->saveElementAsFile('sd.svg');
?>

<?=$elementString;?>