import { defineConfig } from 'vitepress'

export default defineConfig({
    title: "Laravel Helpers",
    description: "Your own integrated solutions with Laravel's Core! 💻✨",
    lang: 'en-US',
    lastUpdated: true,
    base: '/LaravelHelpers',
    themeConfig: {
        footer: {
            message: 'Released under the MIT License.',
            copyright: 'Copyright © 2021-2024 Raul Mauricio Uñate'
        },
        editLink: {
            pattern: 'https://github.com/rmunate/LaravelHelpers/tree/main/docs/:path'
        },
        logo: '/img/logo.png',
        nav: [
            {
                text: 'Docs ^3.0',
                link: '/',
            }
        ],
        sidebar: [
            {
                text: 'Getting Started',
                collapsed: false,
                items: [
                    {text: 'Introduction', link: '/home'},
                    {text: 'Installation', link: '/getting-started/installation'},
                    {text: 'Versions', link: '/getting-started/versions'},
                    {text: 'Release Notes', link: '/getting-started/changelog'},
                ]
            }, {
                text: 'Usage',
                collapsed: true,
                items: [
                    {text: 'Default Classes', link: '/usage/default-classes'},
                    {text: 'Personalized Classes', link: '/usage/personalized-classes'},
                    {text: 'Global Functions', link: '/usage/global-functions'}
                ]
            }, {
                text: 'Added Methods',
                collapsed: true,
                items: [
                    {text: 'Strings', link: '/methods/strings'}
                ]
            },{
                text: 'Contribute',
                collapsed: true,
                items: [
                    {text: 'Bug Report', link: '/contribute/report-bugs'},
                    {text: 'Contribution', link: '/contribute/contribution'}
                ]
            }
        ],
        socialLinks: [
            {icon: 'github', link: 'https://github.com/rmunate/LaravelHelpers'}
        ],
        search: {
            provider: 'local'
        }
    },
    head: [
        ['link', {
                rel: 'stylesheet',
                href: '/LaravelHelpers/css/style.css'
            }
        ],
        ['link', {
                rel: 'icon',
                href: '/LaravelHelpers/img/logo.png',
                type: 'image/png'
            }
        ],
        ['meta', {
                property: 'og:image',
                content: '/LaravelHelpers/img/logo-github.png'
            }
        ],
        ['meta', {
                property: 'og:image:secure_url',
                content: '/LaravelHelpers/img/logo-github.png'
            }
        ],
        ['meta', {
                property: 'og:image:width',
                content: '600'
            }
        ],
        ['meta', {
                property: 'og:image:height',
                content: '400'
            }
        ],
        ['meta', {
                property: 'og:title',
                content: 'Laravel Helpers'
            }
        ],
        ['meta', {
                property: 'og:description',
                content: "Your own integrated solutions with Laravel's Core! 💻✨"
            }
        ],
        ['meta', {
                property: 'og:url',
                content: 'https://rmunate.github.io/LaravelHelpers/'
            }
        ],
        ['meta', {
                property: 'og:type',
                content: 'website'
            }
        ]
    ],

})