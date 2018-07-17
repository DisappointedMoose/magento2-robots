<?php

namespace DisappointedMoose\Robots\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Category;
use Magento\Cms\Model\Page;

class Data extends AbstractHelper
{
    const ROBOTS_ATTRIBUTE_CODE = 'disappointed_robots';
    const FULL_ACTION_NAME_PRODUCT = 'catalog_product_view';
    const FULL_ACTION_NAME_CATEGORY = 'catalog_category_view';
    const FULL_ACTION_NAME_CMS_HOMEPAGE = 'cms_index_index';
    const FULL_ACTION_NAME_CMS_PAGE = 'cms_page_view';

    /**
     * @param Category $category
     * @return string
     */
    public function getRobotsForCategory(Category $category)
    {
        if ($category->getData(self::ROBOTS_ATTRIBUTE_CODE) > 0) {
            $robots = $category->getResource()->getAttribute(self::ROBOTS_ATTRIBUTE_CODE)->getFrontend()->getValue($category);
        } else {
            $robots = '';
        }

        return $robots;
    }

    /**
     * @param Product $product
     * @return string
     */
    public function getRobotsForProduct(Product $product)
    {
        if ($product->getData(self::ROBOTS_ATTRIBUTE_CODE) > 0) {
            $robots = $product->getResource()->getAttribute(self::ROBOTS_ATTRIBUTE_CODE)->getFrontend()->getValue($product);
        } else {
            $robots = '';
        }

        return $robots;
    }

    /**
     * @param Page $cmsPage
     * @return mixed
     */
    public function getRobotsForCmsPage(Page $cmsPage)
    {
        return $cmsPage->getData(self::ROBOTS_ATTRIBUTE_CODE);
    }
}