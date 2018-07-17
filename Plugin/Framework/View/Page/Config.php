<?php

namespace DisappointedMoose\Robots\Plugin\Framework\View\Page;

use DisappointedMoose\Robots\Helper\Data as RobotsHelper;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Registry;
use Magento\Cms\Model\Page;

class Config
{

    /**
     * @var Http
     */
    protected $request;

    /**
     * @var Registry
     */
    protected $registry;

    /**
     * @var RobotsHelper
     */
    protected $helper;

    /**
     * @var Page
     */
    protected $cmsPage;


    public function __construct(
        RobotsHelper $helper,
        Http $request,
        Registry $registry,
        Page $page
    )
    {
        $this->helper = $helper;
        $this->request = $request;
        $this->registry = $registry;
        $this->cmsPage = $page;
    }

    /**
     * @param \Magento\Framework\View\Page\Config $config
     * @param string $robots
     * @return string
     */
    public function afterGetRobots(
        \Magento\Framework\View\Page\Config $config,
        $robots
    )
    {
        $new_robots = '';
        $full_action_name = $this->request->getFullActionName();

        switch ($full_action_name) {
            case RobotsHelper::FULL_ACTION_NAME_CATEGORY:
                $currentCategory = $this->registry->registry('current_category');
                $new_robots = $this->helper->getRobotsForCategory($currentCategory);
                break;

            case RobotsHelper::FULL_ACTION_NAME_PRODUCT:
                $currentProduct = $this->registry->registry('current_product');
                $new_robots = $this->helper->getRobotsForProduct($currentProduct);
                break;

            case RobotsHelper::FULL_ACTION_NAME_CMS_HOMEPAGE:
            case RobotsHelper::FULL_ACTION_NAME_CMS_PAGE:
                $new_robots = $this->helper->getRobotsForCmsPage($this->cmsPage);
                break;
        }

        if (!empty($new_robots)) {
            $robots = $new_robots;
        }

        return $robots;
    }
}