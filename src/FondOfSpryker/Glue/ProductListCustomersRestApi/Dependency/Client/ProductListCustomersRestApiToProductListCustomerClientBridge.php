<?php

namespace FondOfSpryker\Glue\ProductListCustomersRestApi\Dependency\Client;

use FondOfSpryker\Client\ProductListCustomer\ProductListCustomerClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class ProductListCustomersRestApiToProductListCustomerClientBridge implements ProductListCustomersRestApiToProductListCustomerClientInterface
{
    /**
     * @var \FondOfSpryker\Client\ProductListCustomer\ProductListCustomerClientInterface
     */
    protected $productListCustomerClient;

    /**
     * @param \FondOfSpryker\Client\ProductListCustomer\ProductListCustomerClientInterface $productListCustomerClient
     */
    public function __construct(ProductListCustomerClientInterface $productListCustomerClient)
    {
        $this->productListCustomerClient = $productListCustomerClient;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerWithProductListIds(
        CustomerTransfer $customerTransfer
    ): CustomerTransfer {
        return $this->productListCustomerClient->expandCustomerWithProductListIds($customerTransfer);
    }
}
