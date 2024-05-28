---
title: Release Notes
editLink: true
outline: deep
---

::: warning We strongly recommend migrating to the current version
If you have applications using previous versions, we highly recommend migrating to the current version. Please note that the current version does not support functionalities from earlier versions as its source code has been completely rewritten.
:::

# Release Notes

## [3.0.0] - 2024-05-27

### Changed

- Adjusted the handling of Laravel's native helpers by adding the `Number` class, which is currently included in the Laravel core.

### Removed

- Removed the `Helper` class that functioned as a dynamic accessor to the classes defined within the Helpers folder.
