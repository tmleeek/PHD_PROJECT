<?php
/**
 * Magento Webshopapps Shipping Module
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category   Webshopapps
 * @package    Webshopapps_Wsacommon
 * @copyright  Copyright (c) 2012 Zowta Ltd (http://www.webshopapps.com)
 * @license    http://www.webshopapps.com/license/license.txt
 * @author     Karen Baker <sales@webshopapps.com>
 */

class Webshopapps_Wsacommon_System_ConfigController   extends Mage_Adminhtml_Controller_Action
{


    /*
     * Export shipping table rates in csv format
     *
     */
    public function exportmatrixAction()
    {
        $website    = Mage::app()->getWebsite($this->getRequest()->getParam('website'))->getId();
        $fileInfo = Mage::getModel('wsacommon/export_csv')->createCSV($website);
        if (!strpos($fileInfo[0], '.csv')) {
            $fileInfo[0] = 'blank.csv';
        }
        $this->_prepareDownloadResponse($fileInfo[0], $fileInfo[1]);
    }

}