<?php

namespace FondOfSpryker\Glue\ProductListCustomersRestApi\Plugin\CustomersRestApiExtension;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\ProductListCustomersRestApi\Processor\Expander\CustomerExpanderInterface;
use FondOfSpryker\Glue\ProductListCustomersRestApi\ProductListCustomersRestApiFactory;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class ProductListCustomerExpanderPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\ProductListCustomersRestApi\Plugin\CustomersRestApiExtension\ProductListCustomerExpanderPlugin
     */
    protected $productListCustomerExpanderPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\ProductListCustomersRestApi\ProductListCustomersRestApiFactory
     */
    protected $productListCustomersRestApiFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface
     */
    protected $restRequestInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\ProductListCustomersRestApi\Processor\Expander\CustomerExpanderInterface
     */
    protected $customerExpanderInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->productListCustomersRestApiFactoryMock = $this->getMockBuilder(ProductListCustomersRestApiFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restRequestInterfaceMock = $this->getMockBuilder(RestRequestInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerExpanderInterfaceMock = $this->getMockBuilder(CustomerExpanderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerExpanderPlugin = new class (
            $this->productListCustomersRestApiFactoryMock
        ) extends ProductListCustomerExpanderPlugin {
            /**
             * @var \FondOfSpryker\Glue\ProductListCustomersRestApi\ProductListCustomersRestApiFactory
             */
            protected $productListCustomersRestApiFactory;

            /**
             * @param \FondOfSpryker\Glue\ProductListCustomersRestApi\ProductListCustomersRestApiFactory $productListCustomersRestApiFactory
             */
            public function __construct(ProductListCustomersRestApiFactory $productListCustomersRestApiFactory)
            {
                $this->productListCustomersRestApiFactory = $productListCustomersRestApiFactory;
            }

            /**
             * @return \FondOfSpryker\Glue\ProductListCustomersRestApi\ProductListCustomersRestApiFactory
             */
            public function getFactory(): ProductListCustomersRestApiFactory
            {
                return $this->productListCustomersRestApiFactory;
            }
        };
    }

    /**
     * @return void
     */
    public function testExpand(): void
    {
        $this->productListCustomersRestApiFactoryMock->expects($this->atLeastOnce())
            ->method('createCustomerExpander')
            ->willReturn($this->customerExpanderInterfaceMock);

        $this->customerExpanderInterfaceMock->expects($this->atLeastOnce())
            ->method('expand')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->productListCustomerExpanderPlugin->expand(
                $this->customerTransferMock,
                $this->restRequestInterfaceMock
            )
        );
    }
}
