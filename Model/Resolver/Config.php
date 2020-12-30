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

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Mageplaza\PromoBanner\Helper\Data;
use Mageplaza\PromoBanner\Model\Api\PromoBannerRepository;

/**
 * Class Config
 * @package Mageplaza\PromoBannerGraphQl\Model\Resolver
 */
class Config implements ResolverInterface
{
    /**
     * @var Data
     */
    private $helperData;

    /**
     * @var PromoBannerRepository
     */
    private $promoBannerRepository;

    /**
     * Config constructor.
     *
     * @param Data $helperData
     * @param PromoBannerRepository $promoBannerRepository
     */
    public function __construct(
        Data $helperData,
        PromoBannerRepository $promoBannerRepository
    ) {
        $this->helperData            = $helperData;
        $this->promoBannerRepository = $promoBannerRepository;
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        if (!$this->helperData->isEnabled()) {
            throw new GraphQlInputException(__('Module is disabled'));
        }

        try {
            return $this->promoBannerRepository->getConfig();
        } catch (\Exception $e) {
            throw new GraphQlInputException(__($e->getMessage()));
        }
    }
}
