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
        "{$imageComparisonSliderShortKey}_handle_bgcolor" => [
            'label' => "LLL:EXT:$extKey/Resources/Private/Language/locallang.xlf:handle_bgcolor.label",
            'exclude' => true,
            'config' => [
                'type' => 'color',
                'default' => null,
                'nullable' => true,
            ],
        ],
        "{$imageComparisonSliderShortKey}_handle_color" => [
            'label' => "LLL:EXT:$extKey/Resources/Private/Language/locallang.xlf:handle_color.label",
            'exclude' => true,
            'config' => [
                'type' => 'color',
                'default' => null,
                'nullable' => true,
            ],
        ],
        "{$imageComparisonSliderShortKey}_divider_color" => [
            'label' => "LLL:EXT:$extKey/Resources/Private/Language/locallang.xlf:divider_color.label",
            'exclude' => true,
            'config' => [
                'type' => 'color',
                'default' => null,
                'nullable' => true,
            ],
        ],
        "{$imageComparisonSliderShortKey}_divider_width" => [
            'label' => "LLL:EXT:$extKey/Resources/Private/Language/locallang.xlf:divider_width.label",
            'description' => "LLL:EXT:$extKey/Resources/Private/Language/locallang.xlf:divider_width.hint",
            'exclude' => true,
            'config' => [
                'type' => 'number',
                'format' => 'integer',
                'range' => [
                    'lower' => 0,
                    'upper' => 100,
                ],
                'default' => null,
                'nullable' => true,
            ],
        ],
    ];

    ExtensionManagementUtility::addTCAcolumns(
        'tt_content',
        $comparisonSliderColumns,
    );

    $GLOBALS['TCA']['tt_content']['palettes']["{$imageComparisonSliderShortKey}_handle"] = [
        'label' => "LLL:EXT:$extKey/Resources/Private/Language/locallang.xlf:palette.handle",
        'showitem' => '',
    ];
    $GLOBALS['TCA']['tt_content']['palettes']["{$imageComparisonSliderShortKey}_divider"] = [
        'label' => "LLL:EXT:$extKey/Resources/Private/Language/locallang.xlf:palette.divider",
        'showitem' => '',
    ];

    ExtensionManagementUtility::addFieldsToPalette(
        'tt_content',
        "{$imageComparisonSliderShortKey}_handle",
        "{$imageComparisonSliderShortKey}_handle_bgcolor,{$imageComparisonSliderShortKey}_handle_color",
    );

    ExtensionManagementUtility::addFieldsToPalette(
        'tt_content',
        "{$imageComparisonSliderShortKey}_divider",
        "{$imageComparisonSliderShortKey}_divider_color,{$imageComparisonSliderShortKey}_divider_width",
    );

    $comparisonSliderFieldString = "--palette--;;header,--div--;LLL:EXT:$extKey/Resources/Private/Language/locallang.xlf:tab.slider,{$imageComparisonSliderShortKey}_original_image,{$imageComparisonSliderShortKey}_comparison_image,{$imageComparisonSliderShortKey}_vertical,{$imageComparisonSliderShortKey}_starting_position,--palette--;;{$imageComparisonSliderShortKey}_handle,--palette--;;{$imageComparisonSliderShortKey}_divider";

    ExtensionManagementUtility::addToAllTCAtypes(
        'tt_content',
        $comparisonSliderFieldString,
        $imageComparisonSliderElementKey,
        'before:sys_language_uid'
    );
})();
