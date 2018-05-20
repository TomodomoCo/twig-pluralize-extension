<?php

namespace NikoVonLas\Twig;

use Twig_Extension;
use Exception;

class Pluralize extends Twig_Extension
{
	public function getName() {
		return 'pluralize';
	}

	public function getFunctions() {
		return [
			new \Twig_SimpleFunction( 'pluralize', [ $this, 'getPluralizedString' ] )
		];
	}

	public function getPluralizedString($count, $before == null, $after) {
		if (!is_numeric($count)) {
			throw new Exception('$count must be numeric.');
		}

		$cases  = array(2, 0, 1, 1, 1, 2);
		if (empty($before)) {
			return $count.' '.$after[ ($count%100>4 && $count%100<20)? 2: $cases[min($count%10, 5)] ];
		} else {
			return $before[($count%100>4 && $count%100<20)? 2: $cases[min($count%10, 5)]].' '.$count.' '.$after[($count%100>4 && $count%100<20)? 2: $cases[min($count%10, 5)]];
		}
	}

}
