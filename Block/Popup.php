<?php

namespace Sunarc\HomepagePopup\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Cms\Block\Block as cmsBlock;

/**
 * Class Popup
 * @package Sunarc\HomepagePopup\Block
 */
class Popup extends \Magento\Framework\View\Element\Template
{
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;
    /**
     * @var cmsBlock
     */
    protected $cmsblock;

    /**
     *
     */
    const XM_PATH_POPUP_ENABLE = 'popup/general/enable';
    /**
     *
     */
    const XM_PATH_POPUP_BLOCK = 'popup/general/popup_block';

    /**
     * Popup constructor.
     * @param ScopeConfigInterface $scopeConfig
     * @param cmsBlock $cmsblock
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        cmsBlock $cmsblock,
        Template\Context $context,
        array $data = []
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->cmsblock = $cmsblock;
        parent::__construct($context, $data);
    }

    // Get Popup Module Enable / Disable Status

    /**
     * @return mixed
     */
    public function getPopupStatus()
    {
        return $this->scopeConfig->getValue(self::XM_PATH_POPUP_ENABLE);
    }

    // Get Popup Module Selected Block Id

    /**
     * @return mixed
     */
    public function getPopupBlockId()
    {
        return $this->scopeConfig->getValue(self::XM_PATH_POPUP_BLOCK);
    }

    // Get Selected Block Content

    /**
     * @return mixed
     */
    public function getCmsBlockContent()
    {
        $blockId = $this->getPopupBlockId();
        $cmsblock = $this->cmsblock->setBlockId($blockId)->toHtml();
        return $cmsblock;
    }
}
