<?php

namespace FondOfSpryker\Glue\ProductListCustomersRestApi\Dependency\Client;

use Generated\Shared\Transfer\CustomerTransfer;

interface ProductListCustomersRestApiToProductListCustomerClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerWithProductListIds(
        CustomerTransfer $customerTransfer
    ): CustomerTransfer;
}
