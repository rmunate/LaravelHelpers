---
title: Contributing
editLink: true
outline: deep
---

<script setup>
import { VPTeamMembers } from 'vitepress/theme'

const members = [
  {
    avatar: 'https://avatars.githubusercontent.com/u/91748598?v=4',
    name: 'Raúl Mauricio Uñate Castro',
    title: 'Creator',
    links: [
      { icon: 'github', link: 'https://github.com/rmunate'},
    ]
  },{
    avatar: 'https://avatars.githubusercontent.com/u/79948570?v=4',
    name: 'Carlos Giovanni Rodriguez',
    title: 'Developer',
    links: [
      { icon: 'github', link: 'https://github.com/Tutox0073'},
    ]
  },{
    avatar: 'https://avatars.githubusercontent.com/u/52323838?v=4',
    name: 'Wilmer A. Sanchez Saez',
    title: 'Developer',
    links: [
      { icon: 'github', link: 'https://github.com/wilmersaz'},
    ]
  },{
    avatar: 'https://avatars.githubusercontent.com/u/51100789?v=4',
    name: 'John Alejandro Diaz Pinilla',
    title: 'Developer',
    links: [
      { icon: 'github', link: 'https://github.com/alejandrodiazpinilla'},
    ]
  },{
    avatar: 'https://avatars.githubusercontent.com/u/52427080?v=4',
    name: 'Jorge Hernan Castañeda',
    title: 'Developer',
    links: [
      { icon: 'github', link: 'https://github.com/jhcastaneda'},
    ]
  }
]
</script>

# Contributing

## Contributing changes

Fork the repository and open a pull request against `master`. Include the reason for the change and a regression test when changing package behavior.

Run the integration tests with a supported PHP version and an up-to-date Composer 2:

```shell
composer install
composer test
```

To test a specific supported Laravel major without editing `composer.json`:

```shell
composer update --with "laravel/framework:^13.0"
composer test
```

The tests use temporary Laravel applications and require `intl` for the number formatting case. Build or preview the docs with Node.js 24 and npm:

```shell
npm ci
npm run docs:build
npm run docs:preview
```

## Publishing

1. In GitHub, set **Settings → Pages → Build and deployment → Source** to **GitHub Actions**. The documentation workflow builds on pull requests and deploys only from `master`, including manual runs from that branch.
2. Merge the changes and verify that the PHP matrix and documentation deployment are green on `master`.
3. Tag that commit and push the tag to publish the Composer version:

   ```shell
   git tag -a v4.0.0 -m "Laravel Helpers 4.0.0"
   git push origin v4.0.0
   ```

4. Confirm that [Packagist](https://packagist.org/packages/rmunate/laravel_helpers) lists `4.0.0`. Packagist reads Git tags; if it does not refresh automatically, check the repository integration in Packagist. The Pages workflow publishes the site, not the Composer package.

## Developers and Contributors

<VPTeamMembers size="small" :members="members" />

## License
This project is under the [MIT License](https://choosealicense.com/licenses/mit/).

🌟 Support My Projects! 🚀

[![Become a Sponsor](https://img.shields.io/badge/-Become%20a%20Sponsor-blue?style=for-the-badge&logo=github)](https://github.com/sponsors/rmunate)

Make any contributions you see fit; the code is entirely yours. Together, we can do amazing things and improve the world of development. Your support is invaluable. ✨

If you have ideas, suggestions, or just want to collaborate, we are open to everything! Join our community and be part of our journey to success! 🌐👩‍💻👨‍💻