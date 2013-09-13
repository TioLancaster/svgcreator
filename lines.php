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


	$attributesSvg = array(
							'width' => 1000,
							'height' => 1000
						  );

	$svg = new \SVGCreator\Elements\Svg($attributesSvg);

	$defs = $svg->append(new \SVGCreator\Elements\Defs());

	$defs->append(new \SVGCreator\Elements\Marker())
		->attr("id", "arrow")
        ->attr("viewBox", "0 0 10 10")
        ->attr("refX", 0)
        ->attr("refY", 5)
        ->attr("markerUnits", "strokeWidth")
        ->attr("markerWidth", 4)
        ->attr("markerHeight", 4)
        ->attr("orient", "auto")
        ->attr("fill", "#6aa84f")
        ->attr("stroke", "stroke")
        ->append(new \SVGCreator\Elements\Path())
        ->attr("d", "M 0 0 L 10 5 L 0 10 z");

	$svg->append(new \SVGCreator\Elements\Line())
		 ->attr('x1', 20)
		 ->attr('y1', 60)
		 ->attr('x2', 250)
		 ->attr('y2', 500)
		 ->attr('style', 'stroke: #6aa84f; stroke-width: 2px;')
		 ->attr('marker-end', 'url(#arrow)');

	$elementString = $svg->getString();

	// <line x1="116" y1="101" x2="81" y2="19" timeevent="100.230" filter_type="11" marker-end="url(#allshots-1369-color-0)" style="stroke: #6aa84f; stroke-width: 2px;"></line>
?>

<?=$elementString;?>