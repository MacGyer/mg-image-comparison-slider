<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die('Access denied.');

(function () {
    $extKey = 'mg_image_comparison_slider';
    $vendor = 'MacGyer';

    // Add custom content elements
    $imageComparisonSliderElementKey = mb_strtolower($vendor) . '_imagecomparisonslider';
    $imageComparisonSliderShortKey = 'tx_' . str_replace('_', '', $extKey);

    if (!is_array($GLOBALS['TCA']['tt_content']['types'][$imageComparisonSliderElementKey] ?? false)) {
        $GLOBALS['TCA']['tt_content']['types'][$imageComparisonSliderElementKey] = [
            'showitem' => $GLOBALS['TCA']['tt_content']['types'][1]['showitem']
        ];
    }

    ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'label' => "LLL:EXT:$extKey/Resources/Private/Language/locallang.xlf:ce.imagecomparisonslider.title",
            'value' => $imageComparisonSliderElementKey,
            'icon' => 'mg-image-comparison-slider_ce',
            'group' => 'interactive',
            'description' => "LLL:EXT:$extKey/Resources/Private/Language/locallang.xlf:ce.imagecomparisonslider.description",
        ],
    );

    $comparisonSliderColumns = [
        "{$imageComparisonSliderShortKey}_original_image" => [
            'label' => "LLL:EXT:$extKey/Resources/Private/Language/locallang.xlf:original_image.label",
            'exclude' => true,
            'config' => [
                'type' => 'file',
                'allowed' => ['jpg', 'jpeg', 'png', 'webp'],
                'minitems' => 1,
                'maxitems' => 1,
            ],
        ],
        "{$imageComparisonSliderShortKey}_comparison_image" => [
            'label' => "LLL:EXT:$extKey/Resources/Private/Language/locallang.xlf:comparison_image.label",
            'exclude' => true,
            'config' => [
                'type' => 'file',
                'allowed' => ['jpg', 'jpeg', 'png', 'webp'],
                'minitems' => 1,
                'maxitems' => 1,
            ],
        ],
        "{$imageComparisonSliderShortKey}_vertical" => [
            'label' => "LLL:EXT:$extKey/Resources/Private/Language/locallang.xlf:vertical.label",
            'exclude' => true,
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
            ],
        ],
        "{$imageComparisonSliderShortKey}_starting_position" => [
            'label' => "LLL:EXT:$extKey/Resources/Private/Language/locallang.xlf:starting_position.label",
            'description' => "LLL:EXT:$extKey/Resources/Private/Language/locallang.xlf:starting_position.hint",
            'exclude' => true,
            'config' => [
                'type' => 'number',
                'format' => 'integer',
                'range' => [
                    'lower' => 0,
                    'upper' => 100,
                ],
                'slider' => [
                    'step' => 1,
                ],
                'default' => 50,
            ],
        ],
    ];

    ExtensionManagementUtility::addTCAcolumns(
        'tt_content',
        $comparisonSliderColumns,
    );

    $comparisonSliderFieldString = "--palette--;;header,--div--;LLL:EXT:$extKey/Resources/Private/Language/locallang.xlf:tab.slider,{$imageComparisonSliderShortKey}_original_image,{$imageComparisonSliderShortKey}_comparison_image,{$imageComparisonSliderShortKey}_vertical,{$imageComparisonSliderShortKey}_starting_position";

    ExtensionManagementUtility::addToAllTCAtypes(
        'tt_content',
        $comparisonSliderFieldString,
        $imageComparisonSliderElementKey,
        'before:sys_language_uid'
    );
})();
