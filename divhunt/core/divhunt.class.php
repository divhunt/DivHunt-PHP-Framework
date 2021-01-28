<?php

    // Global
    include 'divhunt.modes.php';
    include 'divhunt.helper.php';

    // Functions
    include 'functions/configure.php';
    include 'functions/log.php';
    include 'functions/class.php';
    include 'functions/trigger.php';

    // Methods
    include 'methods/configure.php';
    include 'methods/modes.php';
    include 'methods/triggers.php';
    include 'methods/config.php';
    include 'methods/load.php';
    include 'methods/info.php';

    // Mode: App
    include 'modes/app/methods.php';

    // Mode: Ajax
    include 'modes/ajax/methods.php';

    // Mode: Spa
    include 'modes/spa/methods.php';

    // Mode: Develop
    include 'modes/develop/methods.php';

    // Mode: Build
    include 'modes/build/methods.php';

    // Mode: Docs
    include 'modes/docs/methods.php';
    include 'modes/docs/project.php';
    include 'modes/docs/page.php';
    include 'modes/docs/section.php';
    include 'modes/docs/function.php';
    include 'modes/docs/block.php';

    class DivHunt
    {
        // Global
        use \DivHuntModes;

        // Functions
        use \DivHuntFunctionConfigure; 
        use \DivHuntFunctionLog; 
        use \DivHuntFunctionClass; 
        use \DivHuntFunctionTrigger;

        // Methods
        use \DivHuntMethodsConfigure;
        use \DivHuntMethodsModes;
        use \DivHuntMethodsTriggers;
        use \DivHuntMethodsConfig;
        use \DivHuntMethodsLoad;
        use \DivHuntMethodsInfo;

        // Mode: App
        use \DivHuntAppMethods;

        // Mode: Ajax
        use \DivHuntAjaxMethods;

        // Mode: Spa
        use \DivHuntSpaMethods;

        // Mode: Develop
        use \DivHuntDevelopMethods;

        // Mode: Build
        use \DivHuntBuildMethods;

        // Mode: Docs
        use \DivHuntDocsMethods;
        use \DivHuntDocsProject;
        use \DivHuntDocsPage;
        use \DivHuntDOcsSection;
        use \DivHuntDOcsFunction;
        use \DivHuntDOcsBlock;

    	/**
         * Data that will be stored after framework configuration
         *
         * @var array
         */

    	private static $config = [];

        /**
         * All loaded properties
         *
         * @var array
         */

        private static $load = [];

        /**
         * Framework triggers
         *
         * @var array
         */

        private static $triggers = [];

        /**
         * Framework available modes
         *
         * @var array
         */

        private static $modes = ['app', 'ajax', 'spa', 'develop', 'build', 'docs'];

        /**
         * Framework mode, default app, this will indicate how framework will work
         *
         * @var array
         */

        private static $mode = 'app';

        /**
         * All data which may be needed for 'app' load will be stored here
         *
         * @var array
         */

        private static $app;

        /**
         * All data which may be needed for 'ajax' load will be stored here
         *
         * @var array
         */

        private static $ajax;

        /**
         * All data which may be needed for 'spa' load will be stored here
         *
         * @var array
         */

        private static $spa;

        /**
         * All data which may be needed for 'develop' load will be stored here
         *
         * @var array
         */

        private static $develop;

        /**
         * All data which may be needed for 'build' load will be stored here
         *
         * @var array
         */

        private static $build;

        /**
         * All data which may be needed for 'docs' load will be stored here
         *
         * @var array
         */

        private static $docs;
    }

    DivHunt::modes();