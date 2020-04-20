<?php

namespace FondOfSpryker\Glue\ProductListCustomersRestApi\Processor\Expander;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\ProductListCustomersRestApi\Dependency\Client\ProductListCustomersRestApiToProductListCustomerClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class CustomerExpanderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\ProductListCustomersRestApi\Processor\Expander\CustomerExpander
     */
    protected $customerExpander;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\ProductListCustomersRestApi\Dependency\Client\ProductListCustomersRestApiToProductListCustomerClientInterface
     */
    protected $productListCustomersRestApiToProductListCustomerClientInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->productListCustomersRestApiToProductListCustomerClientInterfaceMock = $this->getMockBuilder(ProductListCustomersRestApiToProductListCustomerClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerExpander = new CustomerExpander(
            $this->productListCustomersRestApiToProductListCustomerClientInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testExpand(): void
    {
        $this->productListCustomersRestApiToProductListCustomerClientInterfaceMock->expects($this->atLeastOnce())
            ->method('expandCustomerWithProductListIds')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->customerExpander->expand(
                $this->customerTransferMock
            )
        );
    }
}
