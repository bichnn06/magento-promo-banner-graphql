# Magento Promo Banner GraphQl

Magento Promo Banner GraphQl is a part of Promo Banner extension that add GraphQL features, this support for PWA Studio.
## 1. How to install

Run the following command in Magento 2 root folder:

```
composer require mageplaza/module-promo-banner-graphql
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

**Note:**
Promo Banner GraphQL requires installing [Mageplaza Promo Banner](https://www.mageplaza.com/magento-2-promo-banner/) in your Magento installation.

## 2. How to use

To perform GraphQL queries in Magento, please do the following requirements:

- Use Magento 2.3.x or higher. Set your site to [developer mode](https://www.mageplaza.com/devdocs/enable-disable-developer-mode-magento-2.html).
- Set GraphQL endpoint as `http://<magento2-server>/graphql` in url box, click **Set endpoint**.
  (e.g. `http://dev.site.com/graphql`)
- To view the queries that the **Mageplaza Promo Banner GraphQL** extension supports, you can look in `Docs > Query` in the right corner

## 3. Devdocs

- [Rest API & examples](https://documenter.getpostman.com/view/10589000/TVt1A5LK)
- [GraphQL & examples](https://documenter.getpostman.com/view/10589000/TVt1A5Qb)

## 4. Contribute to this module

Feel free to **Fork** and contribute to this module and create a pull request so we will merge your changes main branch.

## 5. Get Support

- Feel free to [contact us](https://www.mageplaza.com/contact.html) if you have any further questions.
- Like this project, Give us a **Star** ![star](https://i.imgur.com/S8e0ctO.png)