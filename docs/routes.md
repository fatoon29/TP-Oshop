# Routes

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Dans les shoe | 5 categories | - |
| `/public-url/with-sub-folder/[and-dynamic-part]` | `GET` ou `POST` | `ControllerName` | `methodName` | Titre de la page | Description of page's content | Explain here the dynamics parts of your URL (`[]`) |
| /legal-mentions/ | GET | MainController | legalMentions | Mentions légales | Boring content blabla |  |
| /catalog/category/[i:id]/ | GET | CatalogController | productsByCategory | (the category name) | Products related to selected category | id => the id of the selected category (primary key) |
| /catalog/type/[i:id]/ | GET | CatalogController | productsByType | (the type name) | Products related to selected product type | id => the id of the selected type (primary key) |
| /catalog/brand/[i:id]/ | GET | CatalogController | productsByBrand | (the brand name) | Products related to selected brand | id => the id of the selected brand (primary key) |
| /catalog/product/[i:id]/ | GET | CatalogController | productDetails | (the product name) | All the product details | id => the selected product primary key (id) |