<?php

namespace FondOfSpryker\Glue\ProductListCustomersRestApi\Processor\Expander;

use FondOfSpryker\Glue\ProductListCustomersRestApi\Dependency\Client\ProductListCustomersRestApiToProductListCustomerClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class CustomerExpander implements CustomerExpanderInterface
{
    /**
     * @var \FondOfSpryker\Glue\ProductListCustomersRestApi\Dependency\Client\ProductListCustomersRestApiToProductListCustomerClientInterface
     */
    protected $productListCustomerClient;

    /**
     * @param \FondOfSpryker\Glue\ProductListCustomersRestApi\Dependency\Client\ProductListCustomersRestApiToProductListCustomerClientInterface $productListCustomerClient
     */
    public function __construct(
        ProductListCustomersRestApiToProductListCustomerClientInterface $productListCustomerClient
    ) {
        $this->productListCustomerClient = $productListCustomerClient;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expand(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        return $this->productListCustomerClient->expandCustomerWithProductListIds($customerTransfer);
    }
}
