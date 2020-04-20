<?php

namespace FondOfSpryker\Glue\ProductListCustomersRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\ProductListCustomersRestApi\Dependency\Client\ProductListCustomersRestApiToProductListCustomerClientInterface;
use FondOfSpryker\Glue\ProductListCustomersRestApi\Processor\Expander\CustomerExpanderInterface;
use Spryker\Glue\Kernel\Container;

class ProductListCustomersRestApiFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\ProductListCustomersRestApi\ProductListCustomersRestApiFactory
     */
    protected $productListCustomersRestApiFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\ProductListCustomersRestApi\Dependency\Client\ProductListCustomersRestApiToProductListCustomerClientInterface
     */
    protected $productListCustomersRestApiToProductListCustomerClientInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomersRestApiToProductListCustomerClientInterfaceMock = $this->getMockBuilder(ProductListCustomersRestApiToProductListCustomerClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomersRestApiFactory = new ProductListCustomersRestApiFactory();
        $this->productListCustomersRestApiFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreateCustomerExpander(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(ProductListCustomersRestApiDependencyProvider::CLIENT_PRODUCT_LIST_CUSTOMER)
            ->willReturn($this->productListCustomersRestApiToProductListCustomerClientInterfaceMock);

        $this->assertInstanceOf(
            CustomerExpanderInterface::class,
            $this->productListCustomersRestApiFactory->createCustomerExpander()
        );
    }
}
