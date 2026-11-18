import { defineConfig } from 'vitepress'

const base = '/LaravelHelpers/'
const siteUrl = `https://rmunate.github.io${base}`
const description = 'Generate application helpers and extend Laravel native helpers.'

export default defineConfig({
    title: 'Laravel Helpers',
    description,
    lang: 'en-US',
    lastUpdated: true,
    base,
    themeConfig: {
        footer: {
            message: 'Released under the MIT License.',
            copyright: 'Copyright © 2021-present Raul Mauricio Uñate'
        },
        editLink: {
            pattern: 'https://github.com/rmunate/LaravelHelpers/edit/master/docs/:path'
        },
        logo: '/img/logo.png',
        nav: [
            {
                text: 'Docs 4.x',
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
            },
            {
                text: 'Usage',
                collapsed: true,
                items: [
                    {text: 'Default Classes', link: '/usage/default-classes'},
                    {text: 'Personalized Classes', link: '/usage/personalized-classes'},
                    {text: 'Global Functions', link: '/usage/global-functions'}
                ]
            },
            {
                text: 'Added Methods',
                collapsed: true,
                items: [
                    {text: 'Strings', link: '/methods/strings'}
                ]
            },
            {
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
                href: `${base}css/style.css`
            }
        ],
        ['link', {
                rel: 'icon',
                href: `${base}img/logo.png`,
                type: 'image/png'
            }
        ],
        ['meta', {
                property: 'og:image',
                content: `${siteUrl}img/logo-github.png`
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
                content: description
            }
        ],
        ['meta', {
                property: 'og:url',
                content: siteUrl
            }
        ],
        ['meta', {
                property: 'og:type',
                content: 'website'
            }
        ]
    ],

})