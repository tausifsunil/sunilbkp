<?php
declare(strict_types=1);

namespace Graphql\Createquery\Model\Resolver;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

/**
 * CMS Pages field resolver
 */
class CategoryList implements ResolverInterface
{
    public function __construct(
        \Magento\Cms\Api\PageRepositoryInterface $pageRepositoryInterface,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollection
    ) {
        $this->pageRepositoryInterface = $pageRepositoryInterface;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->_storeManager = $storeManager;
        $this->_categoryCollection = $categoryCollection;
    }

    /**
     * @inheritdoc
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        $categoriesData = $this->getCategories();
        return $categoriesData;
    }

    /**
     * @return array
     * @throws GraphQlNoSuchEntityException
     */
    private function getCategories(): array
    {
        try { 
                
            $categories = $this->_categoryCollection->create()                              
                ->addAttributeToSelect('*')
                // ->addAttributeToFilter('level',2)
                ->setStore($this->_storeManager->getStore()); //categories from current store will be fetched
             $CategoryList['list'] = [];
                foreach($categories as $category) {
                     $CategoryList['list'][$category->getId()]['uid'] = base64_encode($category->getId());
                    $CategoryList['list'][$category->getId()]['name'] = $category->getName();
                    $CategoryList['list'][$category->getId()]['parent_uid'] = base64_encode($category->getParentId());
                    $CategoryList['list'][$category->getId()]['children_count'] = $category->getChildrenCount();
                    $CategoryList['list'][$category->getId()]['url_key'] = $category->getUrlKey();
                    $CategoryList['list'][$category->getId()]['url_path'] = $category->getUrlPath();
                    $CategoryList['list'][$category->getId()]['image'] = $category->getImage();
                    $CategoryList['list'][$category->getId()]['description'] = $category->getDescription();
                    $CategoryList['list'][$category->getId()]['meta_title'] = $category->getMetaTitle();
                    $CategoryList['list'][$category->getId()]['meta_keywords'] = $category->getMetaKeywords();
                    $CategoryList['list'][$category->getId()]['meta_description'] = $category->getMetaDescription();
                }

        } catch (NoSuchEntityException $e) {
            throw new GraphQlNoSuchEntityException(__($e->getMessage()), $e);
        }
            return $CategoryList;
    }
}
