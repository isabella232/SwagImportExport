<?php

declare(strict_types=1);
/**
 * (c) shopware AG <info@shopware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SwagImportExport\Tests\Functional\Components\_fixtures;

class DataSetBrokenProductImages
{
    /**
     * @return array<string, array<int, array<string, string>>>
     */
    public static function getDataSet(): array
    {
        return [
            'default' => [
                 [
                     'ordernumber' => 'SW10002.3',
                     'image' => 'file:///test/help.jpg',
                     'main' => '2',
                     'description' => ';',
                     'position' => '1',
                     'width' => '0',
                     'height' => '0',
                     'relations' => '{Flascheninhalt:0,5 Liter}',
                 ],
                 [
                     'ordernumber' => 'SW10002.3',
                     'image' => 'file:///test/testme.png',
                     'main' => '2',
                     'description' => ';',
                     'position' => '2',
                     'width' => '0',
                     'height' => '0',
                     'relations' => '{Flascheninhalt:0,5 Liter}&{Flascheninhalt:1,5 Liter}',
                 ],
                 [
                     'ordernumber' => 'SW10003',
                     'image' => 'file:///test/logtest/log.jpg',
                     'main' => '2',
                     'description' => ';',
                     'position' => '1',
                     'width' => '0',
                     'height' => '0',
                     'relations' => ';',
                 ],
                 [
                     'ordernumber' => 'SW10004',
                     'image' => 'https://shopware.dev.shop/media/image/d5/2d/07/LatteMacchiato502bc1efd65b6.jpg',
                     'main' => '2',
                     'description' => ';',
                     'position' => '1',
                     'width' => '0',
                     'height' => '0',
                     'relations' => ';',
                 ],
                 [
                     'ordernumber' => 'SW10005.1',
                     'image' => 'https://shopware.dev.shop/media/image/35/44/4c/Emmelkamper_Holunderlikoer_700ml.jpg',
                     'main' => '2',
                     'description' => 'Emmelkamper Holunderlikör 0,7 Liter',
                     'position' => '1',
                     'width' => '0',
                     'height' => '0',
                     'relations' => '{Flascheninhalt:0,7 Liter}',
                 ],
                 [
                     'ordernumber' => 'SW10006',
                     'image' => 'https://shopware.dev.shop/media/image/bf/b2/1f/Cigar_Special.jpg',
                     'main' => '2',
                     'description' => ';',
                     'position' => '1',
                     'width' => '0',
                     'height' => '0',
                     'relations' => ';',
                 ],
                 [
                     'ordernumber' => 'SW10005.1',
                     'image' => 'https://shopware.dev.shop/media/image/72/fa/56/Emmelkamper_Holunderlikoer_200ml-1.jpg',
                     'main' => '2',
                     'description' => 'Emmelkamper Holunderlikör 0,2 Liter',
                     'position' => '2',
                     'width' => '0',
                     'height' => '0',
                     'relations' => '{Flascheninhalt:0,2 Liter}',
                 ],
                 [
                     'ordernumber' => 'SW10007.1',
                     'image' => 'https://shopware.dev.shop/media/image/56/b0/d6/WacholderFlasche_frei.jpg',
                     'main' => '2',
                     'description' => ';',
                     'position' => '1',
                     'width' => '0',
                     'height' => '0',
                     'relations' => ';',
                 ],
                 [
                     'ordernumber' => 'SW10008',
                     'image' => 'https://shopware.dev.shop/media/image/4f/c8/02/Lagerkorn_TS.jpg',
                     'main' => '2',
                     'description' => ';',
                     'position' => '1',
                     'width' => '0',
                     'height' => '0',
                     'relations' => ';',
                 ],
                 [
                     'ordernumber' => 'SW10009',
                     'image' => 'https://shopware.dev.shop/media/image/22/47/f5/Lagerkorn_XO.jpg',
                     'main' => '2',
                     'description' => ';',
                     'position' => '1',
                     'width' => '0',
                     'height' => '0',
                     'relations' => ';',
                 ],
                 [
                     'ordernumber' => 'SW10010',
                     'image' => 'https://shopware.dev.shop/media/image/9f/ec/b9/Glas_Muensterlaender_Aperitif_Imagefoto.jpg',
                     'main' => '2',
                     'description' => ';',
                     'position' => '1',
                     'width' => '0',
                     'height' => '0',
                     'relations' => ';',
                 ],
                 [
                     'ordernumber' => 'SW10011',
                     'image' => 'https://shopware.dev.shop/media/image/13/a8/09/Muensterlaender_Aperitif-Box.jpg',
                     'main' => '2',
                     'description' => ';',
                     'position' => '1',
                     'width' => '0',
                     'height' => '0',
                     'relations' => ';',
                 ],
                 [
                     'ordernumber' => 'SW10012',
                     'image' => 'https://shopware.dev.shop/media/image/fb/49/18/KobraVodka.jpg',
                     'main' => '2',
                     'description' => ';',
                     'position' => '1',
                     'width' => '0',
                     'height' => '0',
                     'relations' => ';',
                 ],
                 [
                     'ordernumber' => 'SW10013',
                     'image' => 'https://shopware.dev.shop/media/image/d7/ee/cb/Tee-weiss-Pai-Mu-Tan-Dose.jpg',
                     'main' => '2',
                     'description' => ';',
                     'position' => '1',
                     'width' => '0',
                     'height' => '0',
                     'relations' => ';',
                 ],
                 [
                     'ordernumber' => 'SW10013',
                     'image' => 'https://shopware.dev.shop/media/image/2e/e5/ee/Tee-weiss-Pai-Mu-Tan-Schale.jpg',
                     'main' => '2',
                     'description' => ';',
                     'position' => '2',
                     'width' => '0',
                     'height' => '0',
                     'relations' => ';',
                 ],
                 [
                     'ordernumber' => 'SW10013',
                     'image' => 'https://shopware.dev.shop/media/image/2a/bf/7d/Tee-weiss-Pai-Mu-Tan.jpg',
                     'main' => '2',
                     'description' => ';',
                     'position' => '3',
                     'width' => '0',
                     'height' => '0',
                     'relations' => ';',
                 ],
                 [
                     'ordernumber' => 'SW10014',
                     'image' => 'https://shopware.dev.shop/media/image/23/8d/ed/Tee-weiss-Silver-Yin-Zhen-Anbaugebiet.jpg',
                     'main' => '2',
                     'description' => ';',
                     'position' => '1',
                     'width' => '0',
                     'height' => '0',
                     'relations' => ';',
                 ],
                 [
                     'ordernumber' => 'SW10014',
                     'image' => 'file:///test/non/existent/file.jpg',
                     'main' => '2',
                     'description' => ';',
                     'position' => '2',
                     'width' => '0',
                     'height' => '0',
                     'relations' => ';',
                 ],
                 [
                     'ordernumber' => 'SW10014',
                     'image' => 'https://shopware.dev.shop/media/image/f9/fc/52/Tee-weiss-Silver-Yin-Zhen-Schale.jpg',
                     'main' => '2',
                     'description' => ';',
                     'position' => '3',
                     'width' => '0',
                     'height' => '0',
                     'relations' => ';',
                 ],
            ],
        ];
    }

    /**
     * @return array<string, array<int, array<string, string>>>
     */
    public static function getFixedDataSet(): array
    {
        return [
            'default' => [
                [
                    'ordernumber' => 'SW10002.3',
                    'image' => 'file:///test/help.jpg',
                    'main' => '2',
                    'description' => ';',
                    'position' => '1',
                    'width' => '0',
                    'height' => '0',
                    'relations' => '{Flascheninhalt:0,5 Liter}',
                ],
                [
                    'ordernumber' => 'SW10002.3',
                    'image' => 'file:///test/testme.png',
                    'main' => '2',
                    'description' => ';',
                    'position' => '2',
                    'width' => '0',
                    'height' => '0',
                    'relations' => '{Flascheninhalt:0,5 Liter}&{Flascheninhalt:1,5 Liter}',
                ],
                [
                    'ordernumber' => 'SW10003',
                    'image' => 'file:///test/logtest/log.jpg',
                    'main' => '2',
                    'description' => ';',
                    'position' => '1',
                    'width' => '0',
                    'height' => '0',
                    'relations' => ';',
                ],
                [
                    'ordernumber' => 'SW10004',
                    'image' => 'https://shopware.dev.shop/media/image/d5/2d/07/LatteMacchiato502bc1efd65b6.jpg',
                    'main' => '2',
                    'description' => ';',
                    'position' => '1',
                    'width' => '0',
                    'height' => '0',
                    'relations' => ';',
                ],
                [
                    'ordernumber' => 'SW10005.1',
                    'image' => 'https://shopware.dev.shop/media/image/35/44/4c/Emmelkamper_Holunderlikoer_700ml.jpg',
                    'main' => '2',
                    'description' => 'Emmelkamper Holunderlikör 0,7 Liter',
                    'position' => '1',
                    'width' => '0',
                    'height' => '0',
                    'relations' => '{Flascheninhalt:0,7 Liter}',
                ],
                [
                    'ordernumber' => 'SW10006',
                    'image' => 'https://shopware.dev.shop/media/image/bf/b2/1f/Cigar_Special.jpg',
                    'main' => '2',
                    'description' => ';',
                    'position' => '1',
                    'width' => '0',
                    'height' => '0',
                    'relations' => ';',
                ],
                [
                    'ordernumber' => 'SW10005.1',
                    'image' => 'https://shopware.dev.shop/media/image/72/fa/56/Emmelkamper_Holunderlikoer_200ml-1.jpg',
                    'main' => '2',
                    'description' => 'Emmelkamper Holunderlikör 0,2 Liter',
                    'position' => '2',
                    'width' => '0',
                    'height' => '0',
                    'relations' => '{Flascheninhalt:0,2 Liter}',
                ],
                [
                    'ordernumber' => 'SW10007.1',
                    'image' => 'https://shopware.dev.shop/media/image/56/b0/d6/WacholderFlasche_frei.jpg',
                    'main' => '2',
                    'description' => ';',
                    'position' => '1',
                    'width' => '0',
                    'height' => '0',
                    'relations' => ';',
                ],
                [
                    'ordernumber' => 'SW10008',
                    'image' => 'https://shopware.dev.shop/media/image/4f/c8/02/Lagerkorn_TS.jpg',
                    'main' => '2',
                    'description' => ';',
                    'position' => '1',
                    'width' => '0',
                    'height' => '0',
                    'relations' => ';',
                ],
                [
                    'ordernumber' => 'SW10009',
                    'image' => 'https://shopware.dev.shop/media/image/22/47/f5/Lagerkorn_XO.jpg',
                    'main' => '2',
                    'description' => ';',
                    'position' => '1',
                    'width' => '0',
                    'height' => '0',
                    'relations' => ';',
                ],
                [
                    'ordernumber' => 'SW10010',
                    'image' => 'https://shopware.dev.shop/media/image/9f/ec/b9/Glas_Muensterlaender_Aperitif_Imagefoto.jpg',
                    'main' => '2',
                    'description' => ';',
                    'position' => '1',
                    'width' => '0',
                    'height' => '0',
                    'relations' => ';',
                ],
                [
                    'ordernumber' => 'SW10011',
                    'image' => 'https://shopware.dev.shop/media/image/13/a8/09/Muensterlaender_Aperitif-Box.jpg',
                    'main' => '2',
                    'description' => ';',
                    'position' => '1',
                    'width' => '0',
                    'height' => '0',
                    'relations' => ';',
                ],
                [
                    'ordernumber' => 'SW10012',
                    'image' => 'https://shopware.dev.shop/media/image/fb/49/18/KobraVodka.jpg',
                    'main' => '2',
                    'description' => ';',
                    'position' => '1',
                    'width' => '0',
                    'height' => '0',
                    'relations' => ';',
                ],
                [
                    'ordernumber' => 'SW10013',
                    'image' => 'https://shopware.dev.shop/media/image/d7/ee/cb/Tee-weiss-Pai-Mu-Tan-Dose.jpg',
                    'main' => '2',
                    'description' => ';',
                    'position' => '1',
                    'width' => '0',
                    'height' => '0',
                    'relations' => ';',
                ],
                [
                    'ordernumber' => 'SW10013',
                    'image' => 'https://shopware.dev.shop/media/image/2e/e5/ee/Tee-weiss-Pai-Mu-Tan-Schale.jpg',
                    'main' => '2',
                    'description' => ';',
                    'position' => '2',
                    'width' => '0',
                    'height' => '0',
                    'relations' => ';',
                ],
                [
                    'ordernumber' => 'SW10013',
                    'image' => 'https://shopware.dev.shop/media/image/2a/bf/7d/Tee-weiss-Pai-Mu-Tan.jpg',
                    'main' => '2',
                    'description' => ';',
                    'position' => '3',
                    'width' => '0',
                    'height' => '0',
                    'relations' => ';',
                ],
                [
                    'ordernumber' => 'SW10014',
                    'image' => 'https://shopware.dev.shop/media/image/23/8d/ed/Tee-weiss-Silver-Yin-Zhen-Anbaugebiet.jpg',
                    'main' => '2',
                    'description' => ';',
                    'position' => '1',
                    'width' => '0',
                    'height' => '0',
                    'relations' => ';',
                ],
                [
                    'ordernumber' => 'SW10014',
                    'image' => 'file:///test/non/existent/file.jpg',
                    'main' => '2',
                    'description' => ';',
                    'position' => '2',
                    'width' => '0',
                    'height' => '0',
                    'relations' => ';',
                ],
                [
                    'ordernumber' => 'SW10014',
                    'image' => 'https://shopware.dev.shop/media/image/f9/fc/52/Tee-weiss-Silver-Yin-Zhen-Schale.jpg',
                    'main' => '2',
                    'description' => ';',
                    'position' => '3',
                    'width' => '0',
                    'height' => '0',
                    'relations' => ';',
                ],
            ],
        ];
    }
}