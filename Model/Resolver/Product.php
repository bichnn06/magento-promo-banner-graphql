<?php
/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mageplaza
 * @package     Mageplaza_PromoBannerGraphQl
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

declare(strict_types=1);

namespace Mageplaza\PromoBannerGraphQl\Model\Resolver;

use Exception;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Model\ProductRepository;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Mageplaza\PromoBanner\Helper\Data;

/**
 * Class Product
 * @package Mageplaza\PromoBannerGraphQl\Model\Resolver
 */
class Product implements ResolverInterface
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * @var Data
     */
    private $helperData;

    /**
     * Product constructor.
     *
     * @param ProductRepository $productRepository
     * @param Data $helperData
     */
    public function __construct(
        ProductRepository $productRepository,
        Data $helperData
    ) {
        $this->productRepository = $productRepository;
        $this->helperData        = $helperData;
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        if (!isset($value['model'])) {
            throw new GraphQlInputException(__('"model" value should be specified'));
        }

        try {
            /* @var $product ProductInterface */
            $product = $this->productRepository->get($value['model']->getSku());

            return $this->helperData->isEnabled() && $product->getExtensionAttributes()
                ? $product->getExtensionAttributes()->getMpPromoBanners()
                : [];
        } catch (Exception $e) {
            throw new GraphQlInputException(__($e->getMessage()));
        }
    }
}
