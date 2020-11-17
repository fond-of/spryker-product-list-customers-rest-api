<?php

namespace FondOfSpryker\Glue\ProductListCustomersRestApi;

use FondOfSpryker\Glue\ProductListCustomersRestApi\Dependency\Client\ProductListCustomersRestApiToProductListCustomerClientInterface;
use FondOfSpryker\Glue\ProductListCustomersRestApi\Processor\Expander\CustomerExpander;
use FondOfSpryker\Glue\ProductListCustomersRestApi\Processor\Expander\CustomerExpanderInterface;
use Spryker\Glue\Kernel\AbstractFactory;

class ProductListCustomersRestApiFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Glue\ProductListCustomersRestApi\Processor\Expander\CustomerExpanderInterface
     */
    public function createCustomerExpander(): CustomerExpanderInterface
    {
        return new CustomerExpander($this->getProductListCustomerClient());
    }

    /**
     * @return \FondOfSpryker\Glue\ProductListCustomersRestApi\Dependency\Client\ProductListCustomersRestApiToProductListCustomerClientInterface
     */
    protected function getProductListCustomerClient(): ProductListCustomersRestApiToProductListCustomerClientInterface
    {
        return $this->getProvidedDependency(ProductListCustomersRestApiDependencyProvider::CLIENT_PRODUCT_LIST_CUSTOMER);
    }
}
