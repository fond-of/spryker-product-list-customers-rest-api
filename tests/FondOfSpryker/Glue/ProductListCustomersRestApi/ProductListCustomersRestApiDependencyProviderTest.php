<?php

namespace FondOfSpryker\Glue\ProductListCustomersRestApi;

use Codeception\Test\Unit;
use Spryker\Glue\Kernel\Container;

class ProductListCustomersRestApiDependencyProviderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\ProductListCustomersRestApi\ProductListCustomersRestApiDependencyProvider
     */
    protected $productListCustomersRestApiDependencyProvider;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\Kernel\Container
     */
    protected $containerMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomersRestApiDependencyProvider = new ProductListCustomersRestApiDependencyProvider();
    }

    /**
     * @return void
     */
    public function testProvideDependencies(): void
    {
        $this->assertInstanceOf(
            Container::class,
            $this->productListCustomersRestApiDependencyProvider->provideDependencies(
                $this->containerMock
            )
        );
    }
}
