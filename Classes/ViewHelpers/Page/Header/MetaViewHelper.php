<?php
namespace FluidTYPO3\Vhs\ViewHelpers\Page\Header;

/*
 * This file is part of the FluidTYPO3/Vhs project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

use FluidTYPO3\Vhs\Traits\TagViewHelperTrait;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

/**
 * ViewHelper used to render a meta tag
 *
 * If you use the ViewHelper in a plugin it has to be USER
 * not USER_INT, what means it has to be cached!
 *
 * @author Georg Ringer
 * @package Vhs
 * @subpackage ViewHelpers\Page\Header
 */
class MetaViewHelper extends AbstractTagBasedViewHelper {

	use TagViewHelperTrait;

	/**
	 * @var    string
	 */
	protected $tagName = 'meta';

	/**
	 * Arguments initialization
	 *
	 * @return void
	 */
	public function initializeArguments() {
		$this->registerTagAttribute('name', 'string', 'Name property of meta tag');
		$this->registerTagAttribute('content', 'string', 'Content of meta tag');
		$this->registerTagAttribute('http-equiv', 'string', 'Property: http-equiv');
		$this->registerTagAttribute('scheme', 'string', 'Property: scheme');
		$this->registerTagAttribute('lang', 'string', 'Property: lang');
		$this->registerTagAttribute('dir', 'string', 'Property: dir');
	}

	/**
	 * Render method
	 *
	 * @return void
	 */
	public function render() {
		if ('BE' === TYPO3_MODE) {
			return;
		}
		if (TRUE === isset($this->arguments['content']) && FALSE === empty($this->arguments['content'])) {
			$GLOBALS['TSFE']->getPageRenderer()->addMetaTag($this->renderTag($this->tagName));
		}
	}

}
