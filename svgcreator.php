<?php
	include_once('SVGCreator/Element.php');
	include_once('SVGCreator/SVGCreator.php');
	include_once('SVGCreator/SVGException.php');
	include_once('SVGCreator/Elements/Rect.php');
	include_once('SVGCreator/Elements/Group.php');
	include_once('SVGCreator/Elements/Svg.php');
	include_once('SVGCreator/Elements/Circle.php');
	include_once('SVGCreator/Elements/Marker.php');
	include_once('SVGCreator/Elements/Defs.php');
	include_once('SVGCreator/Elements/Line.php');
	include_once('SVGCreator/Elements/Path.php');



	$svgCreator = new \SVGCreator\SVGCreator(1000, 1000);
	$svgCreator->append(\SVGCreator\SVGCreator::RECT)
				->attr('width', 100)
				->attr('height', 200)
				->attr('x', 250)
				->attr('y', 60)
				->attr('fill', '#ff0000');

	$svgCreator->append(\SVGCreator\SVGCreator::CIRCLE)
				->attr('r', 10)
				->attr('cx', 40)
				->attr('cy', 50)
				->attr('fill', "#333333");

	$defs = $svgCreator->append(new \SVGCreator\Elements\Defs());

	$defs->append(\SVGCreator\SVGCreator::MARKER)
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

	$svgCreator->append(new \SVGCreator\Elements\Line())
		 ->attr('x1', 20)
		 ->attr('y1', 60)
		 ->attr('x2', 250)
		 ->attr('y2', 500)
		 ->attr('style', 'stroke: #6aa84f; stroke-width: 2px;')
		 ->attr('marker-end', 'url(#arrow)');

	$string = $svgCreator->getString();

	echo $string;
?>
