<?php

namespace VanPattenMedia\Twig;

use Twig_Extension;

use Exception;

class Pluralize extends Twig_Extension
{

	/**
	 * Returns the name of this extension
	 *
	 * @return string
	 */
	public function getName()
	{
		return 'pluralize';
	}

	/**
	 * Returns the functions this extension adds
	 *
	 * @return array
	 */
	public function getFunctions()
	{
		return [
			new \Twig_SimpleFunction( 'pluralize', [ $this, 'getPluralizedString' ] )
		];
	}

	/**
	 * Get a plural variation of a string
	 *
	 * @param  integer      $count The count that forms the basis of the
	 *                               pluralizer. Passed into sprintf
	 * @param  string       $one   The string to display when the count
	 *                               is 1. Use sprintf syntax, if desired
	 * @param  string       $many  The string to display when the count
	 *                               is not 1 or 0. Use sprintf syntax,
	 *                               if desired
	 * @param  string|null  $none  The string to display when the count
	 *                               is 0. Use sprintf syntax, if desired
	 * @return string
	 */
	public function getPluralizedString( $count, $one, $many, $none = null )
	{
		// Make sure $count is a numeric value
		if ( ! is_numeric( $count ) )
			throw new Exception( '$count must be numeric.' );

		// If the option for $none is null, use the option for $many
		if ( $none === null )
			$none = $many;

		// Handle 0
		switch( $count ) {
			case 0:
				$string = $none;
				break;
			case 1:
				$string = $one;
				break;
			default:
				$string = $many;
				break;
		}

		// Return the result
		return sprintf( $string, $count );
	}

}
