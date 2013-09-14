<?php

	include_once('SVGCreator/Element.php');
	include_once('SVGCreator/SVGException.php');
	include_once('SVGCreator/Elements/Rect.php');
	include_once('SVGCreator/Elements/Group.php');
	include_once('SVGCreator/Elements/Svg.php');
	include_once('SVGCreator/Elements/Circle.php');
	include_once('SVGCreator/Elements/Marker.php');
	include_once('SVGCreator/Elements/Defs.php');
	include_once('SVGCreator/Elements/Line.php');
	include_once('SVGCreator/Elements/Path.php');

	$elementString = '';

	$attributesSvg = array(
							'width' => 1000,
							'height' => 1000
						  );

	$svg = new \SVGCreator\Elements\Svg($attributesSvg);

	$rect = new \SVGCreator\Elements\Rect();
	$rect->attr('width', 25)
		->attr('height', 10)
		->attr('style', 'fill:rgb(0,0,255);')
		->attr('x', 50)
		->attr('y', 60);

	$svg->append($rect);

	$g = new \SVGCreator\Elements\Group();
	$svg->append($g)
			->attr('id', 'group1')
			->append(new \SVGCreator\Elements\Rect())
			->attr('width', 50)
			->attr('height', 100)
			->attr('x', 150)
			->attr('y', 200)
			->attr('fill', 'red');

	$svg->append(new \SVGCreator\Elements\Rect())
			->attr('width', 50)
			->attr('height', 100)
			->attr('x', 250)
			->attr('y', 100)
			->attr('fill', 'blue');


	$svg->append(new \SVGCreator\Elements\Circle())
			->attr('r', 8)
			->attr('cx', 500)
			->attr('cy', 500)
			->attr('fill', '#6aa84f')
			->attr('stroke', '#000')
			->attr('stroke-width', '5px');


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
?>

<?=$elementString;?>