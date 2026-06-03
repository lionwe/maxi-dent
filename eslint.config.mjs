export default [
    // глобальні ігнори
    {
        ignores: [
            "wp-admin/**",
            "wp-includes/**",
            "wp-content/plugins/**",
            "node_modules/**",
            "vendor/**",
            "wp-content/themes/maxi-dent/dist/**"
        ]
    },

    // JS вихідники теми (ES-модулі в браузері)
    {
        files: ["wp-content/themes/maxi-dent/assets/js/**/*.js"],
        languageOptions: {
            ecmaVersion: 2021,
            sourceType: "module",
            globals: {
                window: "readonly",
                document: "readonly",
                navigator: "readonly",
                console: "readonly",
                setTimeout: "readonly",
                clearTimeout: "readonly",
                requestAnimationFrame: "readonly",
                cancelAnimationFrame: "readonly",
                FormData: "readonly",
                fetch: "readonly",
                URL: "readonly",
                HTMLElement: "readonly",
                HTMLSlotElement: "readonly",
                ResizeObserver: "readonly",
                trustedTypes: "readonly",
                self: "readonly",
                getComputedStyle: "readonly",
            }
        },
        rules: {
            "no-unused-vars": "warn",
            "no-undef": "error",
            "no-console": "off"
        }
    },

    // webpack / postcss (Node, commonjs)
    {
        files: [
            "wp-content/themes/maxi-dent/webpack.config.js",
            "wp-content/themes/maxi-dent/postcss.config.js"
        ],
        languageOptions: {
            ecmaVersion: 2021,
            sourceType: "commonjs",
            globals: {
                require: "readonly",
                module: "writable",
                __dirname: "readonly",
                process: "readonly"
            }
        },
        rules: {}
    }
];
