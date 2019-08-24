<?php
/**
* @category Extrembler
* @package Extrembler_Base
* @author  Extrembler <gaurangpadhiyar1993@gmail.com>
*/
namespace Extrembler\Base\Block\Adminhtml;

class About extends \Magento\Backend\Block\Template implements \Magento\Framework\Data\Form\Element\Renderer\RendererInterface
{
    protected $_helper;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Extrembler\Base\Helper\Data $helper,
        array $data = []
    ) {
        $this->_helper      = $helper;
        parent::__construct($context, $data);
    }

    /**
     * Render fieldset html
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
    */
    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $element = null;
        $this->_helper->getModuleDetails('Extrembler_Base');
        $html = $this->getHtml();
        if($html != ''){
            return $html;
        }
        return false;
    }

    /**
    * Prepare Html for render
    */
    public function getHtml()
    {
        $module = str_replace('\\', ' ', $this->_helper->_module['module']);
        $version = $this->_helper->_module['version'];
        $class = get_class($this->_helper);
        $logopath = $class::EXTREMBLER_LOGO;

        $html = <<<HTML
                <div style="background:url('$logopath') no-repeat #e7efef; border:1px solid #ccc; min-height:100px; margin:5px 0; padding:30px 15px 15px 140px;">
                    <div style="padding:15px 15px 15px 140px;">
                        <p><strong>$module v $version</strong><br /></p>
                        <p>Review and Share, Follow us on social account <a href="https://www.facebook.com/coffeewithmagento" target="_blank">Facebook</a></p>
                        <p>Website: <a href="https://coffeewithmagento.blogspot.com/" target="_blank">https://coffeewithmagento.blogspot.com/</a></p>
                        <p>
                            If you have any questions send email at gaurangpadhiyar1993@gmail.com
                        </p>
                        <p>Find more extension <a target="_blank" href="https://github.com/Extrembler">Here</a></p>
                    </div>
                </div>
HTML;
        return $html;
    }
}
