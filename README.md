# Wix

Wix is a Laravel package to integrate Wix. It provides:
1. SDK for interacting with Wix API.
2. Database for representing Wix resources in your app.

## Github
https://github.com/storessuite/wix.git

## Implementation
1. `composer require storessuite/wix`
2. `php artisan migrate`
3. Setup `.env`
```
WIX_APP_ID=<Your wix app's ID>
WIX_CLIENT_SECRET=<Your wix app's client secret>
```
4. Add a route `${APP_URL}/wix/oauth/complete`. You will receive `state` and `wixSiteId` at this endpoint after installation is complete. This can be a good place to create a connection between wix site and authenticated user.

## Requirements
1. PHP 8.3 or higher
2. Laravel 11 or higher

## Contribution

### Conventions

#### Database table naming convention
- `_id` = ID of a resource on Wix. For example: ID of Wix product is stored as `_id` in `wix_products` table.
- Append all tables with `wix_`. This will group all Wix related tables together.
- Pivot tables have related tables names in singular form. For example: `wix_site_wix_site_contributor` is a pivot table for `wix_sites` and `wix_site_constributors` tables.
- Tables names should be plural word of the resource. For example: `wix_products`. For certain words, there is no trailing `s`. For example: table `media` should represent all media related data.

#### Model convention
- All relations should ommit the word `Wix`. For example: `variants()` defines a relationship for `WixVariant`.