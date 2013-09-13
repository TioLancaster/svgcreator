<?php

	include_once('SVGCreator/Element.php');
	include_once('SVGCreator/Elements/Rect.php');
	include_once('SVGCreator/Elements/Group.php');
	include_once('SVGCreator/Elements/Svg.php');
	include_once('SVGCreator/Elements/Circle.php');


	$attributesSvg = array(
							'width' => 1000,
							'height' => 1000
						  );

	$svg = new \SVGCreator\Elements\Svg($attributesSvg);

	$rect = new \SVGCreator\Elements\Rect();
	$svg->append($rect)
		->attr('width', 25)
		->attr('height', 10)
		->attr('style', 'fill:rgb(0,0,255);')
		->attr('x', 50)
		->attr('y', 60);

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

	$elementString = $svg->getString();
?>

<?=$elementString;?>