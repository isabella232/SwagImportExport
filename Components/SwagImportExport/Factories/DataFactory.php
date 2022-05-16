<?php
/**
 * (c) shopware AG <info@shopware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Shopware\Components\SwagImportExport\Factories;

use Doctrine\ORM\EntityRepository;
use Shopware\Components\SwagImportExport\DataIO;
use Shopware\Components\SwagImportExport\DataManagers\Articles\ArticleDataManager;
use Shopware\Components\SwagImportExport\DataManagers\CategoriesDataManager;
use Shopware\Components\SwagImportExport\DataManagers\CustomerDataManager;
use Shopware\Components\SwagImportExport\DataManagers\NewsletterDataManager;
use Shopware\Components\SwagImportExport\DbAdapters\AddressDbAdapter;
use Shopware\Components\SwagImportExport\DbAdapters\ArticlesDbAdapter;
use Shopware\Components\SwagImportExport\DbAdapters\ArticlesImagesDbAdapter;
use Shopware\Components\SwagImportExport\DbAdapters\ArticlesInStockDbAdapter;
use Shopware\Components\SwagImportExport\DbAdapters\ArticlesPricesDbAdapter;
use Shopware\Components\SwagImportExport\DbAdapters\ArticlesTranslationsDbAdapter;
use Shopware\Components\SwagImportExport\DbAdapters\CategoriesDbAdapter;
use Shopware\Components\SwagImportExport\DbAdapters\CategoryTranslationDbAdapter;
use Shopware\Components\SwagImportExport\DbAdapters\CustomerCompleteDbAdapter;
use Shopware\Components\SwagImportExport\DbAdapters\CustomerDbAdapter;
use Shopware\Components\SwagImportExport\DbAdapters\DataDbAdapter;
use Shopware\Components\SwagImportExport\DbAdapters\MainOrdersDbAdapter;
use Shopware\Components\SwagImportExport\DbAdapters\NewsletterDbAdapter;
use Shopware\Components\SwagImportExport\DbAdapters\OrdersDbAdapter;
use Shopware\Components\SwagImportExport\DbAdapters\TranslationsDbAdapter;
use Shopware\Components\SwagImportExport\Logger\Logger;
use Shopware\Components\SwagImportExport\Session\Session;
use Shopware\Components\SwagImportExport\Utils\DataColumnOptions;
use Shopware\Components\SwagImportExport\Utils\DataFilter;
use Shopware\Components\SwagImportExport\Utils\DataLimit;
use Shopware\CustomModels\ImportExport\Session as SessionEntity;

class DataFactory extends \Enlight_Class implements \Enlight_Hook
{
    /** @var EntityRepository */
    private $sessionRepository;

    /**
     * @param Session $dataSession
     *
     * @return DataIO
     */
    public function createDataIO(DataDbAdapter $dbAdapter, $dataSession, Logger $logger)
    {
        $uploadPathProvider = Shopware()->Container()->get('swag_import_export.upload_path_provider');

        return new DataIO($dbAdapter, $dataSession, $logger, $uploadPathProvider);
    }

    /**
     * Returns the necessary adapter
     *
     * @param string $adapterType
     */
    public function createDbAdapter($adapterType): DataDbAdapter
    {
        $event = $this->fireCreateFactoryEvent($adapterType);
        if ($event && $event instanceof \Enlight_Event_EventArgs
            && $event->getReturn() instanceof DataDbAdapter
        ) {
            return $event->getReturn();
        }

        switch ($adapterType) {
            case DataDbAdapter::CATEGORIES_ADAPTER:
                return $this->getCategoriesDbAdapter();
            case DataDbAdapter::ARTICLE_ADAPTER:
                return $this->getArticlesDbAdapter();
            case DataDbAdapter::ARTICLE_INSTOCK_ADAPTER:
                return $this->getArticlesInStockDbAdapter();
            case DataDbAdapter::ARTICLE_TRANSLATION_ADAPTER:
                return $this->createArticlesTranslationsDbAdapter();
            case DataDbAdapter::ARTICLE_PRICE_ADAPTER:
                return $this->getArticlesPricesDbAdapter();
            case DataDbAdapter::ARTICLE_IMAGE_ADAPTER:
                return $this->createArticlesImagesDbAdapter();
            case DataDbAdapter::ORDER_ADAPTER:
                return $this->getOrdersDbAdapter();
            case DataDbAdapter::MAIN_ORDER_ADAPTER:
                return $this->getMainOrdersDbAdapter();
            case DataDbAdapter::CUSTOMER_ADAPTER:
                return $this->getCustomerDbAdapter();
            case DataDbAdapter::CUSTOMER_COMPLETE_ADAPTER:
                return $this->getCustomerCompleteDbAdapter();
            case DataDbAdapter::NEWSLETTER_RECIPIENTS_ADAPTER:
                return $this->getNewsletterDbAdapter();
            case DataDbAdapter::TRANSLATION_ADAPTER:
                return $this->createTranslationsDbAdapter();
            case DataDbAdapter::ADDRESS_ADAPTER:
                return $this->getAddressDbAdapter();
            case DataDbAdapter::CATEGORIES_TRANSLATION_ADAPTER:
                return $this->getCategoriesTranslationsDbAdapter();
            default:
                throw new \Exception('Db adapter type is not valid');
        }
    }

    /**
     * Return necessary data manager
     *
     * @param string $managerType
     *
     * @return object dbAdapter
     */
    public function createDataManager($managerType)
    {
        switch ($managerType) {
            case DataDbAdapter::CATEGORIES_ADAPTER:
                return $this->getCategoryDataManager();
            case DataDbAdapter::ARTICLE_ADAPTER:
                return $this->getArticleDataManager();
            case DataDbAdapter::CUSTOMER_ADAPTER:
                return $this->getCustomerDataManager();
            case DataDbAdapter::NEWSLETTER_RECIPIENTS_ADAPTER:
                return $this->getNewsletterDataManager();
        }
    }

    /**
     * @param array $data
     *
     * @return Session
     */
    public function loadSession($data)
    {
        $sessionId = $data['sessionId'];

        $sessionEntity = $this->getSessionRepository()->findOneBy(['id' => $sessionId]);

        if (!$sessionEntity) {
            $sessionEntity = new SessionEntity();
        }

        return $this->createSession($sessionEntity);
    }

    /**
     * Returns columnOptions adapter
     *
     * @return \Shopware\Components\SwagImportExport\Utils\DataColumnOptions
     */
    public function createColOpts($options)
    {
        return new DataColumnOptions($options);
    }

    /**
     * Returns limit adapter
     *
     * @return \Shopware\Components\SwagImportExport\Utils\DataLimit
     */
    public function createLimit(array $limit)
    {
        return new DataLimit($limit);
    }

    /**
     * @param array<string, mixed> $filter
     *
     * @return \Shopware\Components\SwagImportExport\Utils\DataFilter
     */
    public function createFilter($filter)
    {
        return new DataFilter($filter);
    }

    /**
     * Helper Method to get access to the session repository.
     *
     * @return EntityRepository
     */
    public function getSessionRepository()
    {
        if ($this->sessionRepository === null) {
            $this->sessionRepository = Shopware()->Models()->getRepository(SessionEntity::class);
        }

        return $this->sessionRepository;
    }

    /**
     * @param string $adapterType
     *
     * @return \Enlight_Event_EventArgs|null
     */
    protected function fireCreateFactoryEvent($adapterType)
    {
        return Shopware()->Events()->notifyUntil(
            'Shopware_Components_SwagImportExport_Factories_CreateDbAdapter',
            ['subject' => $this, 'adapterType' => $adapterType]
        );
    }

    /**
     * @return Session
     */
    protected function createSession(SessionEntity $sessionEntity)
    {
        return new Session($sessionEntity);
    }

    protected function getCategoryDataManager(): CategoriesDataManager
    {
        return Shopware()->Container()->get(CategoriesDataManager::class);
    }

    protected function getArticleDataManager(): ArticleDataManager
    {
        return Shopware()->Container()->get(ArticleDataManager::class);
    }

    protected function getCustomerDataManager(): CustomerDataManager
    {
        return Shopware()->Container()->get(CustomerDataManager::class);
    }

    protected function getNewsletterDataManager(): NewsletterDataManager
    {
        return Shopware()->Container()->get(NewsletterDataManager::class);
    }

    protected function getCategoriesDbAdapter(): CategoriesDbAdapter
    {
        return Shopware()->Container()->get(CategoriesDbAdapter::class);
    }

    protected function getArticlesDbAdapter(): ArticlesDbAdapter
    {
        return Shopware()->Container()->get(ArticlesDbAdapter::class);
    }

    protected function getArticlesInStockDbAdapter(): ArticlesInStockDbAdapter
    {
        return Shopware()->Container()->get(ArticlesInStockDbAdapter::class);
    }

    protected function createArticlesTranslationsDbAdapter(): ArticlesTranslationsDbAdapter
    {
        return Shopware()->Container()->get(ArticlesTranslationsDbAdapter::class);
    }

    protected function getCategoriesTranslationsDbAdapter(): CategoryTranslationDbAdapter
    {
        return Shopware()->Container()->get(CategoryTranslationDbAdapter::class);
    }

    protected function getArticlesPricesDbAdapter(): ArticlesPricesDbAdapter
    {
        return Shopware()->Container()->get(ArticlesPricesDbAdapter::class);
    }

    protected function createArticlesImagesDbAdapter(): ArticlesImagesDbAdapter
    {
        return Shopware()->Container()->get(ArticlesImagesDbAdapter::class);
    }

    protected function getCustomerDbAdapter(): CustomerDbAdapter
    {
        return Shopware()->Container()->get(CustomerDbAdapter::class);
    }

    protected function getCustomerCompleteDbAdapter(): CustomerCompleteDbAdapter
    {
        return Shopware()->Container()->get(CustomerCompleteDbAdapter::class);
    }

    protected function getOrdersDbAdapter(): OrdersDbAdapter
    {
        return Shopware()->Container()->get(OrdersDbAdapter::class);
    }

    protected function getMainOrdersDbAdapter(): MainOrdersDbAdapter
    {
        return Shopware()->Container()->get(MainOrdersDbAdapter::class);
    }

    protected function getNewsletterDbAdapter(): NewsletterDbAdapter
    {
        return Shopware()->Container()->get(NewsletterDbAdapter::class);
    }

    /**
     * @return TranslationsDbAdapter
     */
    protected function createTranslationsDbAdapter()
    {
        $proxyAdapter = Shopware()->Hooks()
            ->getProxy(TranslationsDbAdapter::class);

        return new $proxyAdapter();
    }

    /**
     * @return AddressDbAdapter
     */
    private function getAddressDbAdapter()
    {
        return Shopware()->Container()->get(AddressDbAdapter::class);
    }
}
