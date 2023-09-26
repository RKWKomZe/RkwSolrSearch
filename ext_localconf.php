<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(
    function($extKey)
    {

        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_userauth.php']['postUserLookUp'][] =
            \FSL\Searchmaster\Hooks\CustomSolrFlexForm::class . '->overwrite';

        $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\ApacheSolrForTypo3\Solr\Domain\Search\Uri\SearchUriBuilder::class] = [
            'className' => \FSL\Searchmaster\XClasses\Solr\Domain\Search\Uri\SearchUriBuilder::class
        ];
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\ApacheSolrForTypo3\Solr\Controller\SearchController::class] = [
            'className' => \FSL\Searchmaster\XClasses\Solr\Controller\SearchController::class
        ];

    },
    $_EXTKEY
);
