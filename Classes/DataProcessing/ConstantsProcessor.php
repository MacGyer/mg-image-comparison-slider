<?php

namespace MacGyer\MgImageComparisonSlider\DataProcessing;

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

/**
 * Adapted from BK2K bootstrap_package ConstantProcessor.
 *
 * Minimal TypoScript configuration
 * Will assign all available typoscript constants for a key to template view.
 * The default key that is used is `mg_image_comparison_slider` and the default variable
 * is `default_settings`.
 *
 * 10 = MacGyer\MgImageComparisonSlider\DataProcessing\ConstantsProcessor
 *
 *
 * Advanced TypoScript configuration
 *
 * 10 = MacGyer\MgImageComparisonSlider\DataProcessing\ConstantsProcessor
 * 10 {
 *   key = yourKey
 *   as = someSettings
 * }
 */
class ConstantsProcessor implements DataProcessorInterface
{
    public function process(ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration, array $processedData)
    {
        $key = (string)$cObj->stdWrapValue('key', $processorConfiguration);
        if ($key === '') {
            $key = 'mg_image_comparison_slider';
        }

        $constants = $this->prepareConstants($cObj->getRequest(), $key);

        $targetVariableName = (string)$cObj->stdWrapValue('as', $processorConfiguration);
        if ($targetVariableName !== '') {
            $processedData[$targetVariableName] = $constants;
        } else {
            $processedData['default_settings'] = $constants;
        }

        return $processedData;
    }

    protected function prepareConstants(ServerRequestInterface $request, string $key): array
    {
        $constants = $this->getConstantsByPrefix($request, $key);
        $constants = $this->unflatten($constants);

        return $constants;
    }

    protected function getConstantsByPrefix(ServerRequestInterface $request, string $prefix, bool $stripPrefix = true): array
    {
        $settings = $request->getAttribute('frontend.typoscript')->getFlatSettings();

        $constants = array_filter(
            $settings,
            function (string $name) use ($prefix) {
                return strpos($name, $prefix . '.') === 0;
            },
            ARRAY_FILTER_USE_KEY
        );

        if ($stripPrefix === false) {
            return $constants;
        }

        $processedConstants = [];
        foreach ($constants as $name => $value) {
            $processedConstants[substr($name, strlen($prefix . '.'))] = $value;
        }

        return $processedConstants;
    }

    protected function unflatten(array $input): array
    {
        $output = [];
        foreach ($input as $key => $value) {
            $parts = explode('.', $key);
            $nested = &$output;
            while (count($parts) > 1) {
                $nested = &$nested[array_shift($parts)];
                if (!is_array($nested)) {
                    $nested = [];
                }
            }
            $nested[array_shift($parts)] = $value;
        }

        return $output;
    }
}
