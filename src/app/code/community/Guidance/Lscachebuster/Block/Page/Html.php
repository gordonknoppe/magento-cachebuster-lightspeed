<?php
/**
 * Rewrite Lightspeed block to parse html first
 *
 * @category   Guidance
 * @package    Lscachebuster
 * @copyright  Copyright (c) 2013 Guidance Solutions (http://www.guidance.com)
 * @author     Guidance Magento Team <magento@guidance.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 */
class Guidance_Lscachebuster_Block_Page_Html extends TinyBrick_LightSpeed_Block_Page_Html
{
    protected function _afterToHtml($html)
    {
        /** @var $helper Guidance_Cachebuster_Helper_Data */
        $helper = Mage::helper('guidance_cachebuster');
        if ($helper->isEnabled()) {
            $parser = $helper->getParser();
            $html = $parser->parseHtml($html);
        }
        return parent::_afterToHtml($html);
    }
}
