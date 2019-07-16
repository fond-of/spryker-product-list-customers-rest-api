<?php

namespace FondOfSpryker\Glue\ProductListCustomersRestApi;

use FondOfSpryker\Glue\ProductListCustomersRestApi\Dependency\Client\ProductListCustomersRestApiToProductListCustomerClientBridge;
use Spryker\Glue\Kernel\AbstractBundleDependencyProvider;
use Spryker\Glue\Kernel\Container;

class ProductListCustomersRestApiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CLIENT_PRODUCT_LIST_CUSTOMER = 'CLIENT_PRODUCT_LIST_CUSTOMER';

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    public function provideDependencies(Container $container): Container
    {
        $container = parent::provideDependencies($container);

        $container = $this->addProductLustCustomerClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    protected function addProductLustCustomerClient(Container $container): Container
    {
        $container[static::CLIENT_PRODUCT_LIST_CUSTOMER] = function (Container $container) {
            return new ProductListCustomersRestApiToProductListCustomerClientBridge(
                $container->getLocator()->productListCustomer()->client()
            );
        };

        return $container;
    }
}
