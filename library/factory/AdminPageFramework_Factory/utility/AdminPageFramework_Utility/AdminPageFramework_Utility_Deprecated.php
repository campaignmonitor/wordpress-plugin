<?php
/**
 Admin Page Framework v3.5.12 by Michael Uno
 Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
 <http://en.michaeluno.jp/admin-page-framework>
 Copyright (c) 2013-2015, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT>
 */
abstract class CampaignMonitor_AdminPageFramework_Utility_Deprecated {
    public static function getCorrespondingArrayValue($vSubject, $sKey, $sDefault = '', $bBlankToDefault = false) {
        if (!isset($vSubject)) {
            return $sDefault;
        }
        if ($bBlankToDefault && $vSubject == '') {
            return $sDefault;
        }
        if (!is_array($vSubject)) {
            return ( string )$vSubject;
        }
        if (isset($vSubject[$sKey])) {
            return $vSubject[$sKey];
        }
        return $sDefault;
    }
    static public function isAssociativeArray(array $aArray) {
        return ( bool )count(array_filter(array_keys($aArray), 'is_string'));
    }
    public static function getArrayDimension($array) {
        return (is_array(reset($array))) ? self::getArrayDimension(reset($array)) + 1 : 1;
    }
    protected function getFieldElementByKey($asElement, $sKey, $asDefault = '') {
        if (!is_array($asElement) || !isset($sKey)) {
            return $asElement;
        }
        $aElements = & $asElement;
        return isset($aElements[$sKey]) ? $aElements[$sKey] : $asDefault;
    }
    static public function shiftTillTrue(array $aArray) {
        foreach ($aArray as & $vElem) {
            if ($vElem) {
                break;
            }
            unset($vElem);
        }
        return array_values($aArray);
    }
    static public function generateAttributes(array $aAttributes) {
        $_sQuoteCharactor = "'";
        $_aOutput = array();
        foreach ($aAttributes as $sAttribute => $sProperty) {
            if (in_array(gettype($sProperty), array('array', 'object'))) {
                continue;
            }
            $_aOutput[] = "{$sAttribute}={$_sQuoteCharactor}{$sProperty}{$_sQuoteCharactor}";
        }
        return implode(' ', $_aOutput);
    }
}