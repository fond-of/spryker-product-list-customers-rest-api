<?php

namespace FondOfSpryker\Glue\ProductListCustomersRestApi\Dependency\Client;

use Codeception\Test\Unit;
use FondOfSpryker\Client\ProductListCustomer\ProductListCustomerClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class ProductListCustomersRestApiToProductListCustomerClientBridgeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\ProductListCustomersRestApi\Dependency\Client\ProductListCustomersRestApiToProductListCustomerClientBridge
     */
    protected $productListCustomersRestApiToProductListCustomerClientBridge;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\ProductListCustomer\ProductListCustomerClientInterface
     */
    protected $productListCustomerClientInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->productListCustomerClientInterfaceMock = $this->getMockBuilder(ProductListCustomerClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomersRestApiToProductListCustomerClientBridge = new ProductListCustomersRestApiToProductListCustomerClientBridge(
            $this->productListCustomerClientInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testExpandCustomerWithProductListIds(): void
    {
        $this->productListCustomerClientInterfaceMock->expects($this->atLeastOnce())
            ->method('expandCustomerWithProductListIds')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->productListCustomersRestApiToProductListCustomerClientBridge->expandCustomerWithProductListIds(
                $this->customerTransferMock
            )
        );
    }
}
